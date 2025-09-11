<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Page;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Comment;
use App\Repository\PostRepository;
use App\Repository\PageRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Repository\MenuRepository;
use App\Service\LanguageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FrontendController extends AbstractController
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly PageRepository $pageRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly TagRepository $tagRepository,
        private readonly MenuRepository $menuRepository,
        private readonly LanguageService $languageService
    ) {
    }

    #[Route('/', name: 'frontend_home')]
    public function home(): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        // Articles récents
        $posts = $this->postRepository->findPublishedWithPagination(1, 6);
        
        // Articles à la une
        $featuredPosts = $this->postRepository->findFeatured(3);
        
        // Catégories principales
        $categories = $this->categoryRepository->findRootCategories();
        
        return $this->render('frontend/home.html.twig', [
            'posts' => $posts,
            'featuredPosts' => $featuredPosts,
            'categories' => $categories,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/articles', name: 'frontend_posts')]
    #[Route('/articles/page/{page}', name: 'frontend_posts_paginated', requirements: ['page' => '\d+'])]
    public function posts(Request $request, int $page = 1): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        $limit = 10;
        
        $posts = $this->postRepository->findPublishedWithPagination($page, $limit);
        $totalPosts = $this->postRepository->countPublished();
        $totalPages = ceil($totalPosts / $limit);
        
        return $this->render('frontend/posts/index.html.twig', [
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/article/{slug}', name: 'frontend_post_show')]
    public function postShow(string $slug): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        $post = $this->postRepository->findBySlugAndLanguage($slug, $currentLanguage);
        if (!$post) {
            throw $this->createNotFoundException('Article non trouvé');
        }
        
        // Incrémenter le compteur de vues
        $post->incrementViewCount();
        $this->postRepository->save($post, true);
        
        // Articles liés
        $relatedPosts = $this->postRepository->findRelatedPosts($post, 3);
        
        // Commentaires approuvés
        $comments = $post->getPublishedComments();
        
        return $this->render('frontend/posts/show.html.twig', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'comments' => $comments,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/page/{slug}', name: 'frontend_page_show')]
    public function pageShow(string $slug): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        $page = $this->pageRepository->findBySlugAndLanguage($slug, $currentLanguage);
        if (!$page) {
            throw $this->createNotFoundException('Page non trouvée');
        }
        
        // Commentaires approuvés si activés
        $comments = $page->getCommentStatus() ? $page->getPublishedComments() : [];
        
        return $this->render('frontend/pages/show.html.twig', [
            'page' => $page,
            'comments' => $comments,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/categorie/{slug}', name: 'frontend_category_show')]
    #[Route('/categorie/{slug}/page/{page}', name: 'frontend_category_show_paginated', requirements: ['page' => '\d+'])]
    public function categoryShow(string $slug, int $page = 1): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        $category = $this->categoryRepository->findBySlug($slug);
        if (!$category) {
            throw $this->createNotFoundException('Catégorie non trouvée');
        }
        
        $limit = 10;
        $posts = $this->postRepository->findByCategory($category->getId(), $page, $limit);
        $totalPosts = count($category->getPosts());
        $totalPages = ceil($totalPosts / $limit);
        
        return $this->render('frontend/categories/show.html.twig', [
            'category' => $category,
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/tag/{slug}', name: 'frontend_tag_show')]
    #[Route('/tag/{slug}/page/{page}', name: 'frontend_tag_show_paginated', requirements: ['page' => '\d+'])]
    public function tagShow(string $slug, int $page = 1): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        $tag = $this->tagRepository->findBySlug($slug);
        if (!$tag) {
            throw $this->createNotFoundException('Tag non trouvé');
        }
        
        $limit = 10;
        $posts = $this->postRepository->findByTag($tag->getId(), $page, $limit);
        $totalPosts = count($tag->getPosts());
        $totalPages = ceil($totalPosts / $limit);
        
        return $this->render('frontend/tags/show.html.twig', [
            'tag' => $tag,
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/recherche', name: 'frontend_search')]
    public function search(Request $request): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        $query = $request->query->get('q', '');
        $page = (int) $request->query->get('page', 1);
        $limit = 10;
        
        $posts = [];
        $pages = [];
        $totalResults = 0;
        
        if ($query) {
            $posts = $this->postRepository->searchPosts($query, $currentLanguage, $page, $limit);
            $pages = $this->pageRepository->searchPages($query, $currentLanguage);
            $totalResults = count($posts) + count($pages);
        }
        
        return $this->render('frontend/search.html.twig', [
            'query' => $query,
            'posts' => $posts,
            'pages' => $pages,
            'totalResults' => $totalResults,
            'currentPage' => $page,
            'currentLanguage' => $currentLanguage
        ]);
    }

    #[Route('/sitemap.xml', name: 'frontend_sitemap')]
    public function sitemap(): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        $posts = $this->postRepository->findPublished();
        $pages = $this->pageRepository->findForSitemap();
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        
        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml');
        
        return $this->render('frontend/sitemap.xml.twig', [
            'posts' => $posts,
            'pages' => $pages,
            'categories' => $categories,
            'tags' => $tags,
            'currentLanguage' => $currentLanguage
        ], $response);
    }

    #[Route('/rss.xml', name: 'frontend_rss')]
    public function rss(): Response
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        $posts = $this->postRepository->findBy([], ['publishedAt' => 'DESC'], 20);
        
        $response = new Response();
        $response->headers->set('Content-Type', 'application/rss+xml');
        
        return $this->render('frontend/rss.xml.twig', [
            'posts' => $posts,
            'currentLanguage' => $currentLanguage
        ], $response);
    }
}