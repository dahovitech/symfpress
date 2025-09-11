<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\MenuTranslation;
use App\Entity\Page;
use App\Entity\Post;
use App\Entity\Category;
use App\Entity\Tag;
use App\Repository\MenuRepository;
use App\Repository\PageRepository;
use App\Repository\PostRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Service\LanguageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/menus')]
#[IsGranted('ROLE_EDITOR')]
class MenuController extends AbstractController
{
    public function __construct(
        private readonly MenuRepository $menuRepository,
        private readonly PageRepository $pageRepository,
        private readonly PostRepository $postRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly TagRepository $tagRepository,
        private readonly LanguageService $languageService,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'admin_menus_index')]
    public function index(Request $request): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        $location = $request->query->get('location', 'primary');
        
        // Récupérer les menus par emplacement et organiser hiérarchiquement
        $menus = $this->menuRepository->findByLocationHierarchical($location);
        
        // Récupérer tous les emplacements disponibles
        $locations = $this->getAvailableLocations();
        
        return $this->render('admin/menus/index.html.twig', [
            'menus' => $menus,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'currentLocation' => $location,
            'locations' => $locations
        ]);
    }

    #[Route('/new', name: 'admin_menus_new')]
    #[IsGranted('ROLE_EDITOR')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_menus_edit')]
    public function edit(Request $request, Menu $menu): Response
    {
        return $this->createOrEdit($request, $menu);
    }

    #[Route('/{id}/show', name: 'admin_menus_show')]
    public function show(Request $request, Menu $menu): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        return $this->render('admin/menus/show.html.twig', [
            'menu' => $menu,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages()
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_menus_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Menu $menu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$menu->getId(), $request->request->get('_token'))) {
            $this->menuRepository->remove($menu, true);
            $this->addFlash('success', 'Élément de menu supprimé avec succès.');
        }
        
        return $this->redirectToRoute('admin_menus_index', ['location' => $menu->getLocation()]);
    }

    #[Route('/reorder', name: 'admin_menus_reorder', methods: ['POST'])]
    public function reorder(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!$data || !isset($data['items'])) {
            return new JsonResponse(['success' => false, 'message' => 'Données invalides']);
        }
        
        try {
            $this->updateMenuOrder($data['items']);
            $this->entityManager->flush();
            
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    #[Route('/builder/{location}', name: 'admin_menus_builder')]
    public function builder(Request $request, string $location): Response
    {
        $currentLanguage = $this->languageService->detectLanguage($request);
        $menus = $this->menuRepository->findByLocationHierarchical($location);
        
        // Récupérer les contenus disponibles pour la construction du menu
        $availableContent = [
            'pages' => $this->pageRepository->findBy(['status' => 'published'], ['menuOrder' => 'ASC']),
            'categories' => $this->categoryRepository->findBy([], ['menuOrder' => 'ASC']),
            'tags' => $this->tagRepository->findBy([], ['createdAt' => 'DESC'])
        ];
        
        return $this->render('admin/menus/builder.html.twig', [
            'menus' => $menus,
            'location' => $location,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'availableContent' => $availableContent,
            'menuTypes' => $this->getMenuTypes()
        ]);
    }

    private function createOrEdit(Request $request, ?Menu $menu = null): Response
    {
        $isEdit = $menu !== null;
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        if (!$isEdit) {
            $menu = new Menu();
            $menu->setLocation($request->query->get('location', 'primary'));
        }
        
        if ($request->isMethod('POST')) {
            return $this->handleFormSubmission($request, $menu, $isEdit);
        }
        
        // Récupérer les données pour le formulaire
        $availableParents = $this->menuRepository->findAvailableParents($menu);
        $availableContent = [
            'pages' => $this->pageRepository->findBy(['status' => 'published'], ['menuOrder' => 'ASC']),
            'posts' => $this->postRepository->findBy(['status' => 'published'], ['publishedAt' => 'DESC']),
            'categories' => $this->categoryRepository->findBy([], ['menuOrder' => 'ASC']),
            'tags' => $this->tagRepository->findBy([], ['createdAt' => 'DESC'])
        ];
        
        return $this->render('admin/menus/form.html.twig', [
            'menu' => $menu,
            'isEdit' => $isEdit,
            'currentLanguage' => $currentLanguage,
            'availableLanguages' => $this->languageService->getAvailableLanguages(),
            'availableParents' => $availableParents,
            'availableContent' => $availableContent,
            'menuTypes' => $this->getMenuTypes(),
            'locations' => $this->getAvailableLocations()
        ]);
    }

    private function handleFormSubmission(Request $request, Menu $menu, bool $isEdit): Response
    {
        $data = $request->request->all();
        $currentLanguage = $this->languageService->detectLanguage($request);
        
        // Mettre à jour les propriétés du menu
        $menu->setType($data['type'] ?? Menu::TYPE_CUSTOM);
        $menu->setLocation($data['location'] ?? 'primary');
        $menu->setUrl($data['url'] ?? null);
        $menu->setTarget($data['target'] ?? '_self');
        $menu->setCssClass($data['css_class'] ?? null);
        $menu->setMenuOrder((int)($data['menu_order'] ?? 0));
        $menu->setIsActive($data['is_active'] ?? true);
        
        // Parent menu
        if (!empty($data['parent_id'])) {
            $parent = $this->menuRepository->find($data['parent_id']);
            $menu->setParent($parent);
        } else {
            $menu->setParent(null);
        }
        
        // Lier le contenu selon le type
        $this->linkMenuContent($menu, $data);
        
        if (!$isEdit) {
            $menu->setCreatedAt(new \DateTime());
        } else {
            $menu->setUpdatedAt(new \DateTime());
        }
        
        // Gestion des traductions
        $translation = $menu->getTranslationForLanguage($currentLanguage);
        if (!$translation) {
            $translation = new MenuTranslation();
            $translation->setMenu($menu);
            $translation->setLanguage($currentLanguage);
            $menu->addTranslation($translation);
        }
        
        $translation->setTitle($data['title'] ?? '');
        $translation->setDescription($data['description'] ?? '');
        
        try {
            $this->menuRepository->save($menu, true);
            $this->addFlash('success', $isEdit ? 'Élément de menu modifié avec succès.' : 'Élément de menu créé avec succès.');
            
            return $this->redirectToRoute('admin_menus_edit', ['id' => $menu->getId()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit($request, $menu);
        }
    }
    
    private function linkMenuContent(Menu $menu, array $data): void
    {
        // Reset all content links
        $menu->setPage(null);
        $menu->setPost(null);
        $menu->setCategory(null);
        $menu->setTag(null);
        
        switch ($menu->getType()) {
            case Menu::TYPE_PAGE:
                if (!empty($data['page_id'])) {
                    $page = $this->pageRepository->find($data['page_id']);
                    $menu->setPage($page);
                }
                break;
                
            case Menu::TYPE_POST:
                if (!empty($data['post_id'])) {
                    $post = $this->postRepository->find($data['post_id']);
                    $menu->setPost($post);
                }
                break;
                
            case Menu::TYPE_CATEGORY:
                if (!empty($data['category_id'])) {
                    $category = $this->categoryRepository->find($data['category_id']);
                    $menu->setCategory($category);
                }
                break;
                
            case Menu::TYPE_TAG:
                if (!empty($data['tag_id'])) {
                    $tag = $this->tagRepository->find($data['tag_id']);
                    $menu->setTag($tag);
                }
                break;
        }
    }
    
    private function updateMenuOrder(array $items, ?Menu $parent = null, int $order = 0): void
    {
        foreach ($items as $item) {
            $menu = $this->menuRepository->find($item['id']);
            if ($menu) {
                $menu->setParent($parent);
                $menu->setMenuOrder($order++);
                
                if (isset($item['children']) && !empty($item['children'])) {
                    $this->updateMenuOrder($item['children'], $menu, 0);
                }
            }
        }
    }
    
    private function getMenuTypes(): array
    {
        return [
            Menu::TYPE_CUSTOM => 'Lien personnalisé',
            Menu::TYPE_HOME => 'Page d\'accueil',
            Menu::TYPE_PAGE => 'Page',
            Menu::TYPE_POST => 'Article',
            Menu::TYPE_CATEGORY => 'Catégorie',
            Menu::TYPE_TAG => 'Tag'
        ];
    }
    
    private function getAvailableLocations(): array
    {
        return [
            'primary' => 'Menu principal',
            'secondary' => 'Menu secondaire',
            'footer' => 'Menu pied de page',
            'social' => 'Menu réseaux sociaux'
        ];
    }
}
