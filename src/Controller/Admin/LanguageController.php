<?php

namespace App\Controller\Admin;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use App\Service\LanguageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/languages')]
#[IsGranted('ROLE_ADMIN')]
class LanguageController extends AbstractController
{
    public function __construct(
        private readonly LanguageRepository $languageRepository,
        private readonly LanguageService $languageService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'admin_languages_index')]
    public function index(Request $request): Response
    {
        $languages = $this->languageRepository->findBy([], ['isDefault' => 'DESC', 'name' => 'ASC']);
        
        return $this->render('admin/languages/index.html.twig', [
            'languages' => $languages,
            'currentLanguage' => $this->languageService->detectLanguage($request)
        ]);
    }

    #[Route('/new', name: 'admin_languages_new')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_languages_edit')]
    public function edit(Request $request, Language $language): Response
    {
        return $this->createOrEdit($request, $language);
    }

    #[Route('/{id}/delete', name: 'admin_languages_delete', methods: ['POST'])]
    public function delete(Request $request, Language $language): Response
    {
        if (!$this->isCsrfTokenValid('delete_language_' . $language->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        // Empêcher la suppression de la langue par défaut
        if ($language->getIsDefault()) {
            $this->addFlash('error', 'Impossible de supprimer la langue par défaut.');
            return $this->redirectToRoute('admin_languages_index');
        }

        // Vérifier s'il y a du contenu dans cette langue
        $hasContent = $this->checkLanguageHasContent($language);
        if ($hasContent) {
            $this->addFlash('error', 'Impossible de supprimer cette langue car elle contient du contenu.');
            return $this->redirectToRoute('admin_languages_index');
        }

        $languageName = $language->getName();
        $this->entityManager->remove($language);
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('Langue "%s" supprimée avec succès.', $languageName));
        return $this->redirectToRoute('admin_languages_index');
    }

    #[Route('/{id}/toggle-active', name: 'admin_languages_toggle_active', methods: ['POST'])]
    public function toggleActive(Request $request, Language $language): Response
    {
        if (!$this->isCsrfTokenValid('toggle_active_' . $language->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        // Empêcher la désactivation de la langue par défaut
        if ($language->getIsDefault() && $language->getIsActive()) {
            $this->addFlash('error', 'Impossible de désactiver la langue par défaut.');
            return $this->redirectToRoute('admin_languages_index');
        }

        $language->setIsActive(!$language->getIsActive());
        $this->entityManager->flush();

        $status = $language->getIsActive() ? 'activée' : 'désactivée';
        $this->addFlash('success', sprintf('Langue "%s" %s.', $language->getName(), $status));
        
        return $this->redirectToRoute('admin_languages_index');
    }

    #[Route('/{id}/set-default', name: 'admin_languages_set_default', methods: ['POST'])]
    public function setDefault(Request $request, Language $language): Response
    {
        if (!$this->isCsrfTokenValid('set_default_' . $language->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        // Retirer le statut par défaut des autres langues
        $allLanguages = $this->languageRepository->findAll();
        foreach ($allLanguages as $lang) {
            $lang->setIsDefault(false);
        }

        // Définir cette langue comme langue par défaut et l'activer
        $language->setIsDefault(true);
        $language->setIsActive(true);
        
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('"%s" est maintenant la langue par défaut.', $language->getName()));
        return $this->redirectToRoute('admin_languages_index');
    }

    private function createOrEdit(Request $request, ?Language $language = null): Response
    {
        $isEdit = $language !== null;
        
        if (!$isEdit) {
            $language = new Language();
        }

        if ($request->isMethod('POST')) {
            return $this->handleFormSubmission($request, $language, $isEdit);
        }

        return $this->render('admin/languages/form.html.twig', [
            'language' => $language,
            'isEdit' => $isEdit
        ]);
    }

    private function handleFormSubmission(Request $request, Language $language, bool $isEdit): Response
    {
        $data = $request->request->all();

        // Validation des données
        if (empty($data['code']) || empty($data['name'])) {
            $this->addFlash('error', 'Le code et le nom de la langue sont obligatoires.');
            return $this->createOrEdit($request, $language);
        }

        // Vérifier l'unicité du code de langue
        if (!$isEdit || $language->getCode() !== $data['code']) {
            $existingLanguage = $this->languageRepository->findOneBy(['code' => $data['code']]);
            if ($existingLanguage) {
                $this->addFlash('error', 'Ce code de langue existe déjà.');
                return $this->createOrEdit($request, $language);
            }
        }

        // Mettre à jour les propriétés
        $language->setCode(trim($data['code']));
        $language->setName(trim($data['name']));
        $language->setIsActive(isset($data['is_active']));

        // Gestion du statut par défaut
        if (isset($data['is_default']) && !$language->getIsDefault()) {
            // Retirer le statut par défaut des autres langues
            $allLanguages = $this->languageRepository->findAll();
            foreach ($allLanguages as $lang) {
                if ($lang !== $language) {
                    $lang->setIsDefault(false);
                }
            }
            $language->setIsDefault(true);
            $language->setIsActive(true); // Une langue par défaut doit être active
        } elseif (!isset($data['is_default'])) {
            $language->setIsDefault(false);
        }

        try {
            if (!$isEdit) {
                $this->entityManager->persist($language);
            }
            $this->entityManager->flush();

            $message = $isEdit ? 'Langue modifiée avec succès.' : 'Langue créée avec succès.';
            $this->addFlash('success', $message);

            return $this->redirectToRoute('admin_languages_index');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit($request, $language);
        }
    }

    private function checkLanguageHasContent(Language $language): bool
    {
        // Vérifier s'il y a des traductions dans cette langue
        $postTranslations = $this->entityManager->getRepository(\App\Entity\PostTranslation::class)
            ->findBy(['language' => $language], null, 1);
        
        $pageTranslations = $this->entityManager->getRepository(\App\Entity\PageTranslation::class)
            ->findBy(['language' => $language], null, 1);
        
        $categoryTranslations = $this->entityManager->getRepository(\App\Entity\CategoryTranslation::class)
            ->findBy(['language' => $language], null, 1);
        
        $tagTranslations = $this->entityManager->getRepository(\App\Entity\TagTranslation::class)
            ->findBy(['language' => $language], null, 1);

        return !empty($postTranslations) || !empty($pageTranslations) || 
               !empty($categoryTranslations) || !empty($tagTranslations);
    }
}
