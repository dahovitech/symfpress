<?php

namespace App\Twig;

use App\Entity\Menu;
use App\Entity\Language;
use App\Repository\MenuRepository;
use App\Service\LanguageService;
use Doctrine\Common\Collections\Collection;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\Environment;

class MenuExtension extends AbstractExtension
{
    public function __construct(
        private readonly MenuRepository $menuRepository,
        private readonly LanguageService $languageService
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_menus', [$this, 'getMenus']),
            new TwigFunction('get_menus_by_location', [$this, 'getMenusByLocation']),
            new TwigFunction('render_menu', [$this, 'renderMenu'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
            new TwigFunction('has_menus', [$this, 'hasMenus']),
            new TwigFunction('get_menu_locations', [$this, 'getMenuLocations']),
        ];
    }

    /**
     * Récupère tous les menus actifs
     */
    public function getMenus(?Language $language = null): array
    {
        $language = $language ?? $this->languageService->getCurrentLanguage();
        return $this->menuRepository->findActiveMenus($language);
    }

    /**
     * Récupère les menus par emplacement
     */
    public function getMenusByLocation(string $location, ?Language $language = null): array
    {
        $language = $language ?? $this->languageService->getCurrentLanguage();
        return $this->menuRepository->findByLocationHierarchical($location, $language);
    }

    /**
     * Rend un menu complet avec HTML
     */
    public function renderMenu(Environment $twig, string $location, array $options = []): string
    {
        $language = $this->languageService->getCurrentLanguage();
        $menus = $this->getMenusByLocation($location, $language);

        if (empty($menus)) {
            return '';
        }

        $defaultOptions = [
            'menu_class' => 'navbar-nav',
            'item_class' => 'nav-item',
            'link_class' => 'nav-link',
            'dropdown_class' => 'dropdown',
            'dropdown_menu_class' => 'dropdown-menu',
            'dropdown_item_class' => 'dropdown-item',
            'active_class' => 'active',
            'template' => 'partials/menu.html.twig'
        ];

        $options = array_merge($defaultOptions, $options);

        try {
            return $twig->render($options['template'], [
                'menus' => $menus,
                'location' => $location,
                'options' => $options,
                'current_language' => $language
            ]);
        } catch (\Exception $e) {
            // Fallback vers un rendu HTML simple si le template n'existe pas
            return $this->renderMenuFallback($menus, $options);
        }
    }

    /**
     * Vérifie si des menus existent pour un emplacement
     */
    public function hasMenus(string $location): bool
    {
        $menus = $this->getMenusByLocation($location);
        return !empty($menus);
    }

    /**
     * Récupère la liste des emplacements de menus disponibles
     */
    public function getMenuLocations(): array
    {
        return [
            'primary' => 'Menu principal',
            'secondary' => 'Menu secondaire',
            'footer' => 'Menu pied de page',
            'social' => 'Menu réseaux sociaux'
        ];
    }

    /**
     * Rendu HTML de fallback pour les menus
     */
    private function renderMenuFallback(array $menus, array $options): string
    {
        if (empty($menus)) {
            return '';
        }

        $html = sprintf('<ul class="%s">', $options['menu_class']);
        
        foreach ($menus as $menu) {
            $html .= $this->renderMenuItem($menu, $options);
        }
        
        $html .= '</ul>';
        
        return $html;
    }

    /**
     * Rend un élément de menu individuel
     */
    private function renderMenuItem(Menu $menu, array $options, int $level = 0): string
    {
        $language = $this->languageService->getCurrentLanguage();
        $translation = $menu->getTranslationForLanguage($language);
        $title = $translation?->getTitle() ?? $menu->getDisplayTitle($language);
        $url = $menu->getComputedUrl() ?? '#';
        $target = $menu->getTarget() ?? '_self';
        $cssClass = $menu->getCssClass() ?? '';
        
        // Classes CSS
        $itemClass = $options['item_class'];
        $linkClass = $options['link_class'];
        
        if ($cssClass) {
            $linkClass .= ' ' . $cssClass;
        }
        
        // Vérifier si c'est un lien actif
        // TODO: Implémenter la détection de lien actif basée sur l'URL courante
        
        // Gérer les sous-menus
        $hasChildren = !$menu->getChildren()->isEmpty();
        if ($hasChildren) {
            $itemClass .= ' ' . $options['dropdown_class'];
            $linkClass .= ' dropdown-toggle';
        }
        
        $html = sprintf('<li class="%s">', $itemClass);
        
        if ($hasChildren) {
            $html .= sprintf(
                '<a class="%s" href="%s" target="%s" data-bs-toggle="dropdown" aria-expanded="false">%s</a>',
                $linkClass,
                htmlspecialchars($url),
                $target,
                htmlspecialchars($title)
            );
            
            // Sous-menu
            $html .= sprintf('<ul class="%s">', $options['dropdown_menu_class']);
            foreach ($menu->getChildren() as $child) {
                if ($child->isActive()) {
                    $childOptions = $options;
                    $childOptions['item_class'] = '';
                    $childOptions['link_class'] = $options['dropdown_item_class'];
                    $html .= $this->renderMenuItem($child, $childOptions, $level + 1);
                }
            }
            $html .= '</ul>';
        } else {
            $html .= sprintf(
                '<a class="%s" href="%s" target="%s">%s</a>',
                $linkClass,
                htmlspecialchars($url),
                $target,
                htmlspecialchars($title)
            );
        }
        
        $html .= '</li>';
        
        return $html;
    }
}
