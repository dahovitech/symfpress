<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\PostTranslation;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Media;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Repository\MediaRepository;
use App\Service\LanguageService;
use App\Service\SlugService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/posts')]
#[IsGranted('ROLE_AUTHOR')]
class PostController extends AbstractController
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly TagRepository $tagRepository,
        private readonly MediaRepository $mediaRepository,
        private readonly LanguageService $languageService,
        private readonly SlugService $slugService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'admin_posts_index')]
    public function index(Request $request): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        $status = $request->query->get('status');
        $search = $request->query->get('search');
        
        $queryBuilder = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->orderBy('p.createdAt', 'DESC');
        
        if ($status) {
            $queryBuilder->andWhere('p.status = :status')
                         ->setParameter('status', $status);
        }
        
        if ($search) {
            $queryBuilder->andWhere('t.title LIKE :search OR t.content LIKE :search')
                         ->setParameter('search', '%' . $search . '%');
        }
        
        // Limiter aux posts de l'utilisateur si pas admin/éditeur
        if (!$this->isGranted('ROLE_EDITOR')) {
            $queryBuilder->andWhere('p.author = :user')
                         ->setParameter('user', $this->getUser());
        }
        
        $posts = $queryBuilder->getQuery()->getResult();
        
        return $this->render('admin/posts/index.html.twig', [
            'posts' => $posts,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'currentStatus' => $status,
            'currentSearch' => $search
        ]);
    }

    #[Route('/new', name: 'admin_posts_new')]
    #[IsGranted('ROLE_AUTHOR')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_posts_edit')]
    public function edit(Request $request, Post $post): Response
    {
        // Vérifier que l'utilisateur peut modifier ce post
        if (!$this->isGranted('ROLE_EDITOR') && $post->getAuthor() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        
        return $this->createOrEdit($request, $post);
    }

    #[Route('/{id}/delete', name: 'admin_posts_delete', methods: ['POST'])]
    #[IsGranted('ROLE_EDITOR')]
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $this->postRepository->remove($post, true);
            $this->addFlash('success', 'Article supprimé avec succès.');
        }
        
        return $this->redirectToRoute('admin_posts_index');
    }

    #[Route('/{id}/toggle-status', name: 'admin_posts_toggle_status', methods: ['POST'])]
    public function toggleStatus(Request $request, Post $post): Response
    {
        // Vérifier que l'utilisateur peut modifier ce post
        if (!$this->isGranted('ROLE_EDITOR') && $post->getAuthor() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        
        if ($this->isCsrfTokenValid('toggle'.$post->getId(), $request->request->get('_token'))) {
            $newStatus = $post->getStatus() === Post::STATUS_PUBLISHED ? Post::STATUS_DRAFT : Post::STATUS_PUBLISHED;
            $post->setStatus($newStatus);
            
            if ($newStatus === Post::STATUS_PUBLISHED && !$post->getPublishedAt()) {
                $post->setPublishedAt(new \DateTime());
            }
            
            $this->postRepository->save($post, true);
            
            $this->addFlash('success', sprintf('Statut changé vers : %s', $newStatus));
        }
        
        return $this->redirectToRoute('admin_posts_index');
    }

    private function createOrEdit(Request $request, ?Post $post = null): Response
    {
        $isEdit = $post !== null;
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        if (!$isEdit) {
            $post = new Post();
            $post->setAuthor($this->getUser());
        }
        
        // Créer le formulaire
        $form = $this->createForm(PostType::class, $post);
        
        // Pré-remplir les données de traduction si en édition
        if ($isEdit) {
            $this->fillTranslationData($form, $post, $currentLanguage);
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->handleFormSubmission($form, $post, $isEdit);
        }
        
        return $this->render('admin/posts/form.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
            'isEdit' => $isEdit,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
        ]);
    }

    private function handleFormSubmission($form, Post $post, bool $isEdit): Response
    {
        $formData = $form->getExtraData();
        
        // Générer le slug si nouveau post et pas déjà défini
        if (!$isEdit && empty($post->getSlug()) && !empty($formData['translations_data'])) {
            $currentLanguage = $this->languageService->getCurrentLanguage();
            $translations = $formData['translations_data'];
            $title = $translations[$currentLanguage->getCode()]['title'] ?? 'nouveau-post';
            
            $baseSlug = $this->slugService->generate($title);
            $slug = $this->slugService->makeUnique($baseSlug, function($testSlug) {
                return $this->postRepository->findOneBy(['slug' => $testSlug]) !== null;
            });
            $post->setSlug($slug);
        }
        
        // Gérer la date de publication
        if ($post->getStatus() === Post::STATUS_PUBLISHED && !$post->getPublishedAt()) {
            $post->setPublishedAt(new \DateTime());
        }
        
        // Traiter les données de traduction
        if (isset($formData['translations_data'])) {
            $this->handleTranslationData($post, $formData['translations_data']);
        }
        
        try {
            if (!$isEdit) {
                $this->entityManager->persist($post);
            }
            $this->entityManager->flush();
            
            $message = $isEdit ? 'Article modifié avec succès.' : 'Article créé avec succès.';
            $this->addFlash('success', $message);
            
            return $this->redirectToRoute('admin_posts_index');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit(new Request(), $post);
        }
    }
    
    private function findOrCreateTag(string $name): Tag
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        // Chercher un tag existant
        $tags = $this->tagRepository->searchTags($name);
        foreach ($tags as $tag) {
            $translation = $tag->getTranslationForLanguage($currentLanguage);
            if ($translation && strtolower($translation->getName()) === strtolower($name)) {
                return $tag;
            }
        }
        
        // Créer un nouveau tag
        $tag = new Tag();
        $slug = $this->slugService->generate($name);
        $tag->setSlug($this->slugService->makeUnique($slug, function($testSlug) {
            return $this->tagRepository->findOneBy(['slug' => $testSlug]) !== null;
        }));
        
        $translation = new \App\Entity\TagTranslation();
        $translation->setTag($tag);
        $translation->setLanguage($currentLanguage);
        $translation->setName($name);
        $tag->addTranslation($translation);
        
        $this->entityManager->persist($tag);
        
        return $tag;
    }
    
    private function fillTranslationData($form, Post $post, Language $currentLanguage): void
    {
        $availableLanguages = $this->languageService->getAvailableLanguages();
        
        foreach ($availableLanguages as $language) {
            $prefix = 'translation_' . $language->getCode();
            $translation = $post->getTranslationForLanguage($language);
            
            if ($translation) {
                $fields = [
                    'title' => $translation->getTitle(),
                    'content' => $translation->getContent(),
                    'excerpt' => $translation->getExcerpt(),
                    'metaTitle' => $translation->getMetaTitle(),
                    'metaDescription' => $translation->getMetaDescription(),
                    'metaKeywords' => $translation->getMetaKeywords(),
                ];
                
                foreach ($fields as $field => $value) {
                    $fieldName = $prefix . '_' . $field;
                    if ($form->has($fieldName)) {
                        $form->get($fieldName)->setData($value);
                    }
                }
            }
        }
    }
    
    private function handleTranslationData(Post $post, array $translationsData): void
    {
        foreach ($translationsData as $languageCode => $data) {
            $language = $this->languageService->getLanguageFromCode($languageCode);
            if (!$language) {
                continue;
            }
            
            // Trouver ou créer la traduction
            $translation = $post->getTranslationForLanguage($language);
            if (!$translation) {
                $translation = new PostTranslation();
                $translation->setPost($post);
                $translation->setLanguage($language);
                $post->addTranslation($translation);
            }
            
            // Mettre à jour les données
            $translation->setTitle($data['title'] ?? '');
            $translation->setContent($data['content'] ?? '');
            $translation->setExcerpt($data['excerpt'] ?? '');
            $translation->setMetaTitle($data['metaTitle'] ?? '');
            $translation->setMetaDescription($data['metaDescription'] ?? '');
            $translation->setMetaKeywords($data['metaKeywords'] ?? '');
        }
    }
}