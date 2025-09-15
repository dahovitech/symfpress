<?php

namespace App\Service;

use App\Entity\Widget;
use App\Entity\WidgetZone;
use App\Repository\PostRepository;
use Twig\Environment;
use Psr\Log\LoggerInterface;

/**
 * Service de rendu des widgets
 * Gère l'affichage et le rendu HTML des widgets
 */
class WidgetRenderer
{
    private Environment $twig;
    private WidgetManager $widgetManager;
    private PostRepository $postRepository;
    private LoggerInterface $logger;
    private array $renderedCache = [];

    public function __construct(
        Environment $twig,
        WidgetManager $widgetManager,
        PostRepository $postRepository,
        LoggerInterface $logger
    ) {
        $this->twig = $twig;
        $this->widgetManager = $widgetManager;
        $this->postRepository = $postRepository;
        $this->logger = $logger;
    }

    /**
     * Rend une zone de widgets complète
     */
    public function renderZone(string $zoneName, ?string $theme = null): string
    {
        $cacheKey = $zoneName . '_' . ($theme ?: 'default');
        
        if (isset($this->renderedCache[$cacheKey])) {
            return $this->renderedCache[$cacheKey];
        }

        try {
            $widgets = $this->widgetManager->getWidgetsForZone($zoneName, $theme);
            
            if (empty($widgets)) {
                return '';
            }

            $renderedWidgets = [];
            foreach ($widgets as $widget) {
                $renderedWidget = $this->renderWidget($widget);
                if (!empty($renderedWidget)) {
                    $renderedWidgets[] = $renderedWidget;
                }
            }

            if (empty($renderedWidgets)) {
                return '';
            }

            $output = $this->twig->render('widgets/zone.html.twig', [
                'zone_name' => $zoneName,
                'widgets' => $renderedWidgets,
                'widget_count' => count($renderedWidgets)
            ]);

            $this->renderedCache[$cacheKey] = $output;
            return $output;

        } catch (\Exception $e) {
            $this->logger->error('Erreur lors du rendu de la zone de widgets', [
                'zone_name' => $zoneName,
                'theme' => $theme,
                'error' => $e->getMessage()
            ]);
            return '';
        }
    }

    /**
     * Rend un widget individuel
     */
    public function renderWidget(Widget $widget): string
    {
        if (!$widget->isActive()) {
            return '';
        }

        try {
            $data = $this->getWidgetData($widget);
            
            $templateName = $this->getWidgetTemplate($widget);
            
            return $this->twig->render($templateName, [
                'widget' => $widget,
                'data' => $data,
                'settings' => $widget->getSettings()
            ]);

        } catch (\Exception $e) {
            $this->logger->error('Erreur lors du rendu du widget', [
                'widget_id' => $widget->getId(),
                'widget_type' => $widget->getType(),
                'error' => $e->getMessage()
            ]);
            return '';
        }
    }

    /**
     * Obtient les données spécifiques pour un widget
     */
    private function getWidgetData(Widget $widget): array
    {
        switch ($widget->getType()) {
            case 'recent_posts':
                return $this->getRecentPostsData($widget);
            case 'categories':
                return $this->getCategoriesData($widget);
            case 'menu':
                return $this->getMenuData($widget);
            case 'text':
            case 'custom_html':
            case 'search':
            default:
                return [];
        }
    }

    /**
     * Obtient les données pour le widget "Articles récents"
     */
    private function getRecentPostsData(Widget $widget): array
    {
        $limit = $widget->getSetting('limit', 5);
        $showDate = $widget->getSetting('show_date', true);
        $showExcerpt = $widget->getSetting('show_excerpt', false);
        
        try {
            $posts = $this->postRepository->findPublishedWithPagination(1, $limit);
            
            return [
                'posts' => $posts['items'] ?? [],
                'show_date' => $showDate,
                'show_excerpt' => $showExcerpt
            ];
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de la récupération des articles récents', [
                'widget_id' => $widget->getId(),
                'error' => $e->getMessage()
            ]);
            return ['posts' => []];
        }
    }

    /**
     * Obtient les données pour le widget "Catégories"
     */
    private function getCategoriesData(Widget $widget): array
    {
        $showCount = $widget->getSetting('show_count', true);
        
        try {
            // TODO: Implémenter la logique des catégories quand l'entité Category sera créée
            return [
                'categories' => [],
                'show_count' => $showCount
            ];
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de la récupération des catégories', [
                'widget_id' => $widget->getId(),
                'error' => $e->getMessage()
            ]);
            return ['categories' => []];
        }
    }

    /**
     * Obtient les données pour le widget "Menu"
     */
    private function getMenuData(Widget $widget): array
    {
        $menuItems = $widget->getSetting('menu_items', []);
        
        return [
            'menu_items' => $menuItems
        ];
    }

    /**
     * Détermine le template à utiliser pour un widget
     */
    private function getWidgetTemplate(Widget $widget): string
    {
        $type = $widget->getType();
        
        // Essayer d'abord le template spécifique au thème
        $themeTemplate = "widgets/{$type}_widget.html.twig";
        if ($this->templateExists($themeTemplate)) {
            return $themeTemplate;
        }
        
        // Fallback vers le template générique
        return "widgets/base_widget.html.twig";
    }

    /**
     * Vérifie si un template existe
     */
    private function templateExists(string $templateName): bool
    {
        try {
            $this->twig->load($templateName);
            return true;
        } catch (\Twig\Error\LoaderError $e) {
            return false;
        }
    }

    /**
     * Rend tous les widgets d'une zone sous forme de tableau
     */
    public function renderZoneAsArray(string $zoneName, ?string $theme = null): array
    {
        try {
            $widgets = $this->widgetManager->getWidgetsForZone($zoneName, $theme);
            
            $renderedWidgets = [];
            foreach ($widgets as $widget) {
                $renderedWidget = $this->renderWidget($widget);
                if (!empty($renderedWidget)) {
                    $renderedWidgets[] = [
                        'widget' => $widget,
                        'html' => $renderedWidget
                    ];
                }
            }

            return $renderedWidgets;

        } catch (\Exception $e) {
            $this->logger->error('Erreur lors du rendu de la zone comme tableau', [
                'zone_name' => $zoneName,
                'theme' => $theme,
                'error' => $e->getMessage()
            ]);
            return [];
        }
    }

    /**
     * Efface le cache de rendu
     */
    public function clearCache(): void
    {
        $this->renderedCache = [];
    }

    /**
     * Vérifie si une zone a des widgets à afficher
     */
    public function hasWidgets(string $zoneName, ?string $theme = null): bool
    {
        $widgets = $this->widgetManager->getWidgetsForZone($zoneName, $theme);
        return !empty($widgets);
    }

    /**
     * Obtient le nombre de widgets actifs dans une zone
     */
    public function getWidgetCount(string $zoneName, ?string $theme = null): int
    {
        $widgets = $this->widgetManager->getWidgetsForZone($zoneName, $theme);
        return count($widgets);
    }
}
