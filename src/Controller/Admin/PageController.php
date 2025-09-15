<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Entity\PageTranslation;
use App\Entity\Media;
use App\Form\PageType;
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

    #[Route('/{id}/toggle-status', name: 'admin_pages_toggle_status', methods: ['POST'])]
    public function toggleStatus(Request $request, Page $page): Response
    {
        // Vérifier que l'utilisateur peut modifier cette page
        if (!$this->isGranted('ROLE_EDITOR') && $page->getAuthor() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        
        if ($this->isCsrfTokenValid('toggle'.$page->getId(), $request->request->get('_token'))) {
            $newStatus = $page->getStatus() === Page::STATUS_PUBLISHED ? Page::STATUS_DRAFT : Page::STATUS_PUBLISHED;
            $page->setStatus($newStatus);
            
            if ($newStatus === Page::STATUS_PUBLISHED && !$page->getPublishedAt()) {
                $page->setPublishedAt(new \DateTime());
            }
            
            $this->pageRepository->save($page, true);
            
            $this->addFlash('success', sprintf('Statut changé vers : %s', $newStatus));
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
        
        // Créer le formulaire
        $form = $this->createForm(PageType::class, $page);
        
        // Pré-remplir les données de traduction si en édition
        if ($isEdit) {
            $this->fillTranslationData($form, $page, $currentLanguage);
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->handleFormSubmission($form, $page, $isEdit);
        }
        
        return $this->render('admin/pages/form.html.twig', [
            'form' => $form->createView(),
            'page' => $page,
            'isEdit' => $isEdit,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
        ]);
    }

    private function handleFormSubmission($form, Page $page, bool $isEdit): Response
    {
        $formData = $form->getExtraData();
        
        // Générer le slug si nouvelle page et pas déjà défini
        if (!$isEdit && empty($page->getSlug()) && !empty($formData['translations_data'])) {
            $currentLanguage = $this->languageService->getCurrentLanguage();
            $translations = $formData['translations_data'];
            $title = $translations[$currentLanguage->getCode()]['title'] ?? 'nouvelle-page';
            
            $baseSlug = $this->slugService->generate($title);
            $slug = $this->slugService->makeUnique($baseSlug, function($testSlug) {
                return $this->pageRepository->findOneBy(['slug' => $testSlug]) !== null;
            });
            $page->setSlug($slug);
        }
        
        // Gérer la date de publication
        if ($page->getStatus() === Page::STATUS_PUBLISHED && !$page->getPublishedAt()) {
            $page->setPublishedAt(new \DateTime());
        }
        
        // Traiter les données de traduction
        if (isset($formData['translations_data'])) {
            $this->handleTranslationData($page, $formData['translations_data']);
        }
        
        try {
            if (!$isEdit) {
                $this->entityManager->persist($page);
            }
            $this->entityManager->flush();
            
            $message = $isEdit ? 'Page modifiée avec succès.' : 'Page créée avec succès.';
            $this->addFlash('success', $message);
            
            return $this->redirectToRoute('admin_pages_index');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit(new Request(), $page);
        }
    }
    
    private function fillTranslationData($form, Page $page, $currentLanguage): void
    {
        $availableLanguages = $this->languageService->getAvailableLanguages();
        
        foreach ($availableLanguages as $language) {
            $prefix = 'translation_' . $language->getCode();
            $translation = $page->getTranslationForLanguage($language);
            
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
    
    private function handleTranslationData(Page $page, array $translationsData): void
    {
        foreach ($translationsData as $languageCode => $data) {
            $language = $this->languageService->getLanguageFromCode($languageCode);
            if (!$language) {
                continue;
            }
            
            // Trouver ou créer la traduction
            $translation = $page->getTranslationForLanguage($language);
            if (!$translation) {
                $translation = new PageTranslation();
                $translation->setPage($page);
                $translation->setLanguage($language);
                $page->addTranslation($translation);
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