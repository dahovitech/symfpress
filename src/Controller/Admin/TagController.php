<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Entity\TagTranslation;
use App\Repository\TagRepository;
use App\Service\LanguageService;
use App\Service\SlugService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/tags')]
#[IsGranted('ROLE_EDITOR')]
class TagController extends AbstractController
{
    public function __construct(
        private readonly TagRepository $tagRepository,
        private readonly LanguageService $languageService,
        private readonly SlugService $slugService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'admin_tags_index')]
    public function index(Request $request): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        $tags = $this->tagRepository->findBy([], ['createdAt' => 'DESC']);
        
        return $this->render('admin/tags/index.html.twig', [
            'tags' => $tags,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages()
        ]);
    }

    #[Route('/new', name: 'admin_tags_new')]
    #[IsGranted('ROLE_EDITOR')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_tags_edit')]
    public function edit(Request $request, Tag $tag): Response
    {
        return $this->createOrEdit($request, $tag);
    }

    #[Route('/{id}/delete', name: 'admin_tags_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Tag $tag): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tag->getId(), $request->request->get('_token'))) {
            $this->tagRepository->remove($tag, true);
            $this->addFlash('success', 'Tag supprimé avec succès.');
        }
        
        return $this->redirectToRoute('admin_tags_index');
    }

    private function createOrEdit(Request $request, ?Tag $tag = null): Response
    {
        $isEdit = $tag !== null;
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        if (!$isEdit) {
            $tag = new Tag();
        }
        
        if ($request->isMethod('POST')) {
            return $this->handleFormSubmission($request, $tag, $isEdit);
        }
        
        return $this->render('admin/tags/form.html.twig', [
            'tag' => $tag,
            'isEdit' => $isEdit,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages()
        ]);
    }

    private function handleFormSubmission(Request $request, Tag $tag, bool $isEdit): Response
    {
        $data = $request->request->all();
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        // Générer le slug si nouveau tag
        if (!$isEdit && empty($data['slug'])) {
            $baseSlug = $this->slugService->generate($data['name'] ?? 'nouveau-tag');
            $slug = $this->slugService->makeUnique($baseSlug, function($testSlug) {
                return $this->tagRepository->findOneBy(['slug' => $testSlug]) !== null;
            });
            $tag->setSlug($slug);
        } elseif (!empty($data['slug'])) {
            $tag->setSlug($data['slug']);
        }
        
        // Mettre à jour les propriétés du tag
        $tag->setColor($data['color'] ?? null);
        
        if (!$isEdit) {
            $tag->setCreatedAt(new \DateTime());
        } else {
            $tag->setUpdatedAt(new \DateTime());
        }
        
        // Gestion des traductions
        $translation = $tag->getTranslationForLanguage($currentLanguage);
        if (!$translation) {
            $translation = new TagTranslation();
            $translation->setTag($tag);
            $translation->setLanguage($currentLanguage);
            $tag->addTranslation($translation);
        }
        
        $translation->setName($data['name'] ?? '');
        $translation->setDescription($data['description'] ?? '');
        $translation->setMetaTitle($data['meta_title'] ?? '');
        $translation->setMetaDescription($data['meta_description'] ?? '');
        
        try {
            $this->tagRepository->save($tag, true);
            $this->addFlash('success', $isEdit ? 'Tag modifié avec succès.' : 'Tag créé avec succès.');
            
            return $this->redirectToRoute('admin_tags_edit', ['id' => $tag->getId()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit($request, $tag);
        }
    }
}