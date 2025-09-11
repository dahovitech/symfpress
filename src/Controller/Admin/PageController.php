<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Entity\PageTranslation;
use App\Entity\Media;
use App\Repository\PageRepository;
use App\Repository\MediaRepository;
use App\Service\LanguageService;
use App\Service\SlugService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/pages')]
#[IsGranted('ROLE_AUTHOR')]
class PageController extends AbstractController
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly MediaRepository $mediaRepository,
        private readonly LanguageService $languageService,
        private readonly SlugService $slugService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'admin_pages_index')]
    public function index(Request $request): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        $pages = $this->pageRepository->findBy([], ['menuOrder' => 'ASC', 'createdAt' => 'DESC']);
        
        return $this->render('admin/pages/index.html.twig', [
            'pages' => $pages,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages()
        ]);
    }

    #[Route('/new', name: 'admin_pages_new')]
    #[IsGranted('ROLE_AUTHOR')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_pages_edit')]
    public function edit(Request $request, Page $page): Response
    {
        // Vérifier que l'utilisateur peut modifier cette page
        if (!$this->isGranted('ROLE_EDITOR') && $page->getAuthor() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        
        return $this->createOrEdit($request, $page);
    }

    #[Route('/{id}/delete', name: 'admin_pages_delete', methods: ['POST'])]
    #[IsGranted('ROLE_EDITOR')]
    public function delete(Request $request, Page $page): Response
    {
        if ($this->isCsrfTokenValid('delete'.$page->getId(), $request->request->get('_token'))) {
            $this->pageRepository->remove($page, true);
            $this->addFlash('success', 'Page supprimée avec succès.');
        }
        
        return $this->redirectToRoute('admin_pages_index');
    }

    private function createOrEdit(Request $request, ?Page $page = null): Response
    {
        $isEdit = $page !== null;
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        if (!$isEdit) {
            $page = new Page();
            $page->setAuthor($this->getUser());
        }
        
        if ($request->isMethod('POST')) {
            return $this->handleFormSubmission($request, $page, $isEdit);
        }
        
        // Préparer les données pour le formulaire
        $parentPages = $this->pageRepository->findBy(['parent' => null]);
        $medias = $this->mediaRepository->findImages();
        $templates = $this->getAvailableTemplates();
        
        return $this->render('admin/pages/form.html.twig', [
            'page' => $page,
            'isEdit' => $isEdit,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'parentPages' => $parentPages,
            'medias' => $medias,
            'templates' => $templates
        ]);
    }

    private function handleFormSubmission(Request $request, Page $page, bool $isEdit): Response
    {
        $data = $request->request->all();
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        // Générer le slug si nouvelle page
        if (!$isEdit && empty($data['slug'])) {
            $baseSlug = $this->slugService->generate($data['title'] ?? 'nouvelle-page');
            $slug = $this->slugService->makeUnique($baseSlug, function($testSlug) {
                return $this->pageRepository->findOneBy(['slug' => $testSlug]) !== null;
            });
            $page->setSlug($slug);
        } elseif (!empty($data['slug'])) {
            $page->setSlug($data['slug']);
        }
        
        // Mettre à jour les propriétés de la page
        $page->setStatus($data['status'] ?? Page::STATUS_DRAFT);
        $page->setCommentStatus($data['comment_status'] ?? false);
        $page->setMenuOrder((int)($data['menu_order'] ?? 0));
        $page->setTemplate($data['template'] ?? 'default');
        
        if ($data['status'] === Page::STATUS_PUBLISHED && !$page->getPublishedAt()) {
            $page->setPublishedAt(new \DateTime());
        }
        
        // Page parente
        if (!empty($data['parent_id'])) {
            $parent = $this->pageRepository->find($data['parent_id']);
            $page->setParent($parent);
        } else {
            $page->setParent(null);
        }
        
        // Image à la une
        if (!empty($data['featured_image_id'])) {
            $featuredImage = $this->mediaRepository->find($data['featured_image_id']);
            $page->setFeaturedImage($featuredImage);
        }
        
        // Gestion des traductions
        $translation = $page->getTranslationForLanguage($currentLanguage);
        if (!$translation) {
            $translation = new PageTranslation();
            $translation->setPage($page);
            $translation->setLanguage($currentLanguage);
            $page->addTranslation($translation);
        }
        
        $translation->setTitle($data['title'] ?? '');
        $translation->setContent($data['content'] ?? '');
        $translation->setExcerpt($data['excerpt'] ?? '');
        $translation->setMetaTitle($data['meta_title'] ?? '');
        $translation->setMetaDescription($data['meta_description'] ?? '');
        $translation->setMetaKeywords($data['meta_keywords'] ?? '');
        
        try {
            $this->pageRepository->save($page, true);
            $this->addFlash('success', $isEdit ? 'Page modifiée avec succès.' : 'Page créée avec succès.');
            
            return $this->redirectToRoute('admin_pages_edit', ['id' => $page->getId()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit($request, $page);
        }
    }
    
    private function getAvailableTemplates(): array
    {
        return [
            'default' => 'Modèle par défaut',
            'full-width' => 'Pleine largeur',
            'sidebar-left' => 'Barre latérale à gauche',
            'sidebar-right' => 'Barre latérale à droite',
            'landing' => 'Page d\'atterrissage',
            'contact' => 'Contact'
        ];
    }
}