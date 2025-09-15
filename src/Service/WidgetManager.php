<?php

namespace App\Service;

use App\Entity\Widget;
use App\Entity\WidgetZone;
use App\Extension\ThemeManager;
use App\Repository\WidgetRepository;
use App\Repository\WidgetZoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * Service de gestion des widgets
 * Gère la création, modification et organisation des widgets
 */
class WidgetManager
{
    public const DEFAULT_WIDGETS_TYPES = [
        'text' => 'Texte',
        'menu' => 'Menu de navigation',
        'recent_posts' => 'Articles récents',
        'categories' => 'Catégories',
        'search' => 'Recherche',
        'custom_html' => 'HTML personnalisé'
    ];

    public const DEFAULT_ZONES = [
        'sidebar' => ['title' => 'Barre latérale', 'description' => 'Zone latérale principale'],
        'header' => ['title' => 'En-tête', 'description' => 'Zone d\'en-tête du site'],
        'footer' => ['title' => 'Pied de page', 'description' => 'Zone de pied de page'],
        'content_top' => ['title' => 'Haut du contenu', 'description' => 'Zone au-dessus du contenu principal'],
        'content_bottom' => ['title' => 'Bas du contenu', 'description' => 'Zone en dessous du contenu principal']
    ];

    private EntityManagerInterface $entityManager;
    private WidgetRepository $widgetRepository;
    private WidgetZoneRepository $widgetZoneRepository;
    private LoggerInterface $logger;
    private ThemeManager $themeManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        WidgetRepository $widgetRepository,
        WidgetZoneRepository $widgetZoneRepository,
        LoggerInterface $logger,
        ThemeManager $themeManager
    ) {
        $this->entityManager = $entityManager;
        $this->widgetRepository = $widgetRepository;
        $this->widgetZoneRepository = $widgetZoneRepository;
        $this->logger = $logger;
        $this->themeManager = $themeManager;
    }

    /**
     * Crée un nouveau widget
     */
    public function createWidget(
        string $name,
        string $type,
        WidgetZone $zone,
        ?string $content = null,
        array $settings = [],
        ?string $theme = null
    ): Widget {
        $widget = new Widget();
        $widget->setName($name)
               ->setType($type)
               ->setZone($zone)
               ->setContent($content)
               ->setSettings($settings)
               ->setTheme($theme)
               ->setSortOrder($zone->getNextSortOrder());

        $this->widgetRepository->save($widget, true);
        
        $this->logger->info('Widget créé', [
            'widget_id' => $widget->getId(),
            'name' => $name,
            'type' => $type,
            'zone' => $zone->getName()
        ]);

        return $widget;
    }

    /**
     * Met à jour un widget existant
     */
    public function updateWidget(
        Widget $widget,
        ?string $name = null,
        ?string $content = null,
        ?array $settings = null,
        ?bool $isActive = null
    ): Widget {
        if ($name !== null) {
            $widget->setName($name);
        }
        if ($content !== null) {
            $widget->setContent($content);
        }
        if ($settings !== null) {
            $widget->setSettings($settings);
        }
        if ($isActive !== null) {
            $widget->setIsActive($isActive);
        }

        $this->widgetRepository->save($widget, true);
        
        $this->logger->info('Widget mis à jour', [
            'widget_id' => $widget->getId(),
            'name' => $widget->getName()
        ]);

        return $widget;
    }

    /**
     * Crée une nouvelle zone de widgets
     */
    public function createWidgetZone(
        string $name,
        string $title,
        ?string $description = null,
        ?string $theme = null,
        array $settings = []
    ): WidgetZone {
        if ($this->widgetZoneRepository->nameExists($name)) {
            throw new \InvalidArgumentException("Une zone avec le nom '{$name}' existe déjà.");
        }

        $zone = new WidgetZone();
        $zone->setName($name)
             ->setTitle($title)
             ->setDescription($description)
             ->setTheme($theme)
             ->setSettings($settings);

        $this->widgetZoneRepository->save($zone, true);
        
        $this->logger->info('Zone de widgets créée', [
            'zone_id' => $zone->getId(),
            'name' => $name,
            'title' => $title
        ]);

        return $zone;
    }

    /**
     * Obtient les widgets pour une zone et un thème spécifiques
     */
    public function getWidgetsForZone(string $zoneName, ?string $theme = null): array
    {
        if ($theme === null) {
            $theme = $this->themeManager->getActiveTheme();
        }

        return $this->widgetRepository->findActiveForZoneName($zoneName, $theme);
    }

    /**
     * Obtient toutes les zones pour un thème donné
     */
    public function getZonesForTheme(?string $theme = null): array
    {
        if ($theme === null) {
            $theme = $this->themeManager->getActiveTheme();
        }

        return $this->widgetZoneRepository->findForTheme($theme);
    }

    /**
     * Déplace un widget vers le haut
     */
    public function moveWidgetUp(Widget $widget): bool
    {
        $result = $this->widgetRepository->moveUp($widget);
        
        if ($result) {
            $this->logger->info('Widget déplacé vers le haut', [
                'widget_id' => $widget->getId(),
                'name' => $widget->getName()
            ]);
        }

        return $result;
    }

    /**
     * Déplace un widget vers le bas
     */
    public function moveWidgetDown(Widget $widget): bool
    {
        $result = $this->widgetRepository->moveDown($widget);
        
        if ($result) {
            $this->logger->info('Widget déplacé vers le bas', [
                'widget_id' => $widget->getId(),
                'name' => $widget->getName()
            ]);
        }

        return $result;
    }

    /**
     * Active ou désactive un widget
     */
    public function toggleWidget(Widget $widget): Widget
    {
        $widget->setIsActive(!$widget->isActive());
        $this->widgetRepository->save($widget, true);
        
        $this->logger->info('Widget ' . ($widget->isActive() ? 'activé' : 'désactivé'), [
            'widget_id' => $widget->getId(),
            'name' => $widget->getName()
        ]);

        return $widget;
    }

    /**
     * Supprime un widget
     */
    public function deleteWidget(Widget $widget): void
    {
        $widgetId = $widget->getId();
        $widgetName = $widget->getName();
        
        $this->widgetRepository->remove($widget, true);
        
        $this->logger->info('Widget supprimé', [
            'widget_id' => $widgetId,
            'name' => $widgetName
        ]);
    }

    /**
     * Supprime une zone de widgets et tous ses widgets
     */
    public function deleteWidgetZone(WidgetZone $zone): void
    {
        $zoneId = $zone->getId();
        $zoneName = $zone->getName();
        $widgetCount = $zone->getActiveWidgetCount();
        
        $this->widgetZoneRepository->remove($zone, true);
        
        $this->logger->info('Zone de widgets supprimée', [
            'zone_id' => $zoneId,
            'name' => $zoneName,
            'deleted_widgets' => $widgetCount
        ]);
    }

    /**
     * Initialise les zones par défaut si elles n'existent pas
     */
    public function initializeDefaultZones(): void
    {
        foreach (self::DEFAULT_ZONES as $name => $config) {
            if (!$this->widgetZoneRepository->findByName($name)) {
                $this->createWidgetZone(
                    $name,
                    $config['title'],
                    $config['description']
                );
            }
        }
    }

    /**
     * Obtient les types de widgets disponibles
     */
    public function getAvailableWidgetTypes(): array
    {
        return self::DEFAULT_WIDGETS_TYPES;
    }

    /**
     * Vérifie si un type de widget est valide
     */
    public function isValidWidgetType(string $type): bool
    {
        return array_key_exists($type, self::DEFAULT_WIDGETS_TYPES);
    }

    /**
     * Obtient les statistiques des widgets
     */
    public function getWidgetStats(): array
    {
        return [
            'by_type' => $this->widgetRepository->getStatsByType(),
            'by_zone' => $this->widgetRepository->getStatsByZone(),
            'zones_stats' => $this->widgetZoneRepository->getStats()
        ];
    }

    /**
     * Recherche des widgets
     */
    public function searchWidgets(string $searchTerm): array
    {
        return $this->widgetRepository->search($searchTerm);
    }

    /**
     * Recherche des zones
     */
    public function searchZones(string $searchTerm): array
    {
        return $this->widgetZoneRepository->search($searchTerm);
    }

    /**
     * Clone un widget vers une autre zone
     */
    public function cloneWidget(Widget $widget, WidgetZone $targetZone, ?string $newName = null): Widget
    {
        $clonedWidget = new Widget();
        $clonedWidget->setName($newName ?: $widget->getName() . ' (Copie)')
                     ->setType($widget->getType())
                     ->setContent($widget->getContent())
                     ->setSettings($widget->getSettings())
                     ->setTheme($widget->getTheme())
                     ->setZone($targetZone)
                     ->setSortOrder($targetZone->getNextSortOrder())
                     ->setIsActive($widget->isActive());

        $this->widgetRepository->save($clonedWidget, true);
        
        $this->logger->info('Widget cloné', [
            'original_widget_id' => $widget->getId(),
            'cloned_widget_id' => $clonedWidget->getId(),
            'target_zone' => $targetZone->getName()
        ]);

        return $clonedWidget;
    }
}
