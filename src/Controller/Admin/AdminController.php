<?php

namespace App\Controller\Admin;

use App\Entity\Language;
use App\Entity\Post;
use App\Entity\Page;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Comment;
use App\Entity\Media;
use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\PageRepository;
use App\Repository\CommentRepository;
use App\Repository\MediaRepository;
use App\Repository\UserRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Repository\MenuRepository;
use App\Service\LanguageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_EDITOR')]
class AdminController extends AbstractController
{
    public function __construct(
        private readonly LanguageService $languageService,
        private readonly PostRepository $postRepository,
        private readonly PageRepository $pageRepository,
        private readonly CommentRepository $commentRepository,
        private readonly MediaRepository $mediaRepository,
        private readonly UserRepository $userRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly TagRepository $tagRepository,
        private readonly MenuRepository $menuRepository
    ) {
    }

    #[Route('/', name: 'admin_dashboard')]
    public function dashboard(Request $request): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        // Statistiques générales
        $stats = [
            'posts' => [
                'published' => count($this->postRepository->findPublished()),
                'drafts' => count($this->postRepository->findBy(['status' => Post::STATUS_DRAFT])),
                'total' => $this->postRepository->count([])
            ],
            'pages' => [
                'published' => count($this->pageRepository->findPublished()),
                'drafts' => count($this->pageRepository->findBy(['status' => Page::STATUS_DRAFT])),
                'total' => $this->pageRepository->count([])
            ],
            'comments' => [
                'pending' => count($this->commentRepository->findBy(['status' => Comment::STATUS_PENDING])),
                'approved' => count($this->commentRepository->findBy(['status' => Comment::STATUS_APPROVED])),
                'total' => $this->commentRepository->count([])
            ],
            'media' => [
                'total' => $this->mediaRepository->count([]),
                'images' => count($this->mediaRepository->findImages()),
                'totalSize' => $this->mediaRepository->getTotalFileSize()
            ],
            'users' => [
                'total' => $this->userRepository->count([]),
                'active' => count($this->userRepository->findBy(['isActive' => true]))
            ],
            'categories' => [
                'total' => $this->categoryRepository->count([]),
                'withPosts' => count($this->categoryRepository->findWithPostCount())
            ],
            'tags' => [
                'total' => $this->tagRepository->count([]),
                'withColor' => count($this->tagRepository->findBy(['color' => '%']))
            ],
            'menus' => [
                'total' => $this->menuRepository->count([]),
                'active' => count($this->menuRepository->findBy(['isActive' => true]))
            ]
        ];
        
        // Contenu récent
        $recentPosts = $this->postRepository->findBy([], ['createdAt' => 'DESC'], 5);
        $recentComments = $this->commentRepository->findRecentApproved(5);
        $recentMedia = $this->mediaRepository->findRecent(5);
        
        // Activité récente
        $recentUsers = $this->userRepository->findBy([], ['createdAt' => 'DESC'], 5);
        $recentCategories = $this->categoryRepository->findBy([], ['createdAt' => 'DESC'], 3);
        $recentMenus = $this->menuRepository->findBy([], ['createdAt' => 'DESC'], 3);
        
        return $this->render('admin/dashboard.html.twig', [
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'stats' => $stats,
            'recentPosts' => $recentPosts,
            'recentComments' => $recentComments,
            'recentMedia' => $recentMedia,
            'recentUsers' => $recentUsers,
            'recentCategories' => $recentCategories,
            'recentMenus' => $recentMenus
        ]);
    }

    #[Route('/switch-language/{code}', name: 'admin_switch_language')]
    public function switchLanguage(string $code): Response
    {
        $language = $this->languageService->switchLanguage($code);
        
        if ($language) {
            $this->addFlash('success', sprintf('Langue changée vers : %s', $language->getName()));
        } else {
            $this->addFlash('error', 'Langue non trouvée');
        }
        
        return $this->redirectToRoute('admin_dashboard');
    }
}