<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\CategoryTranslation;
use App\Repository\CategoryRepository;
use App\Service\LanguageService;
use App\Service\SlugService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/categories')]
#[IsGranted('ROLE_EDITOR')]
class CategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly LanguageService $languageService,
        private readonly SlugService $slugService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'admin_categories_index')]
    public function index(Request $request): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        $categories = $this->categoryRepository->findBy([], ['menuOrder' => 'ASC', 'createdAt' => 'DESC']);
        
        return $this->render('admin/categories/index.html.twig', [
            'categories' => $categories,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages()
        ]);
    }

    #[Route('/new', name: 'admin_categories_new')]
    #[IsGranted('ROLE_EDITOR')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_categories_edit')]
    public function edit(Request $request, Category $category): Response
    {
        return $this->createOrEdit($request, $category);
    }

    #[Route('/{id}/show', name: 'admin_categories_show')]
    public function show(Request $request, Category $category): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        return $this->render('admin/categories/show.html.twig', [
            'category' => $category,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages()
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_categories_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Category $category): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            // Vérifier s'il y a des articles associés
            if ($category->getPostCount() > 0) {
                $this->addFlash('error', 'Impossible de supprimer une catégorie contenant des articles.');
            } else {
                $this->categoryRepository->remove($category, true);
                $this->addFlash('success', 'Catégorie supprimée avec succès.');
            }
        }
        
        return $this->redirectToRoute('admin_categories_index');
    }

    private function createOrEdit(Request $request, ?Category $category = null): Response
    {
        $isEdit = $category !== null;
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        if (!$isEdit) {
            $category = new Category();
        }
        
        if ($request->isMethod('POST')) {
            return $this->handleFormSubmission($request, $category, $isEdit);
        }
        
        // Récupérer les catégories pour la sélection parente (exclure la catégorie courante et ses enfants)
        $availableParents = $this->categoryRepository->findAvailableParents($category);
        
        return $this->render('admin/categories/form.html.twig', [
            'category' => $category,
            'isEdit' => $isEdit,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'availableParents' => $availableParents
        ]);
    }

    private function handleFormSubmission(Request $request, Category $category, bool $isEdit): Response
    {
        $data = $request->request->all();
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        // Générer le slug si nouvelle catégorie
        if (!$isEdit && empty($data['slug'])) {
            $baseSlug = $this->slugService->generate($data['name'] ?? 'nouvelle-categorie');
            $slug = $this->slugService->makeUnique($baseSlug, function($testSlug) {
                return $this->categoryRepository->findOneBy(['slug' => $testSlug]) !== null;
            });
            $category->setSlug($slug);
        } elseif (!empty($data['slug'])) {
            $category->setSlug($data['slug']);
        }
        
        // Mettre à jour les propriétés de la catégorie
        $category->setColor($data['color'] ?? null);
        $category->setIcon($data['icon'] ?? null);
        $category->setMenuOrder((int)($data['menu_order'] ?? 0));
        
        // Parent category
        if (!empty($data['parent_id'])) {
            $parent = $this->categoryRepository->find($data['parent_id']);
            $category->setParent($parent);
        } else {
            $category->setParent(null);
        }
        
        if (!$isEdit) {
            $category->setCreatedAt(new \DateTime());
        } else {
            $category->setUpdatedAt(new \DateTime());
        }
        
        // Gestion des traductions
        $translation = $category->getTranslationForLanguage($currentLanguage);
        if (!$translation) {
            $translation = new CategoryTranslation();
            $translation->setCategory($category);
            $translation->setLanguage($currentLanguage);
            $category->addTranslation($translation);
        }
        
        $translation->setName($data['name'] ?? '');
        $translation->setDescription($data['description'] ?? '');
        $translation->setMetaTitle($data['meta_title'] ?? '');
        $translation->setMetaDescription($data['meta_description'] ?? '');
        
        try {
            $this->categoryRepository->save($category, true);
            $this->addFlash('success', $isEdit ? 'Catégorie modifiée avec succès.' : 'Catégorie créée avec succès.');
            
            return $this->redirectToRoute('admin_categories_edit', ['id' => $category->getId()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit($request, $category);
        }
    }
}
