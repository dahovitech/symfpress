<?php

namespace App\Twig;

use App\Service\WidgetRenderer;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Extension Twig pour l'affichage des widgets
 */
class WidgetExtension extends AbstractExtension
{
    private WidgetRenderer $widgetRenderer;

    public function __construct(WidgetRenderer $widgetRenderer)
    {
        $this->widgetRenderer = $widgetRenderer;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_widget_zone', [$this, 'renderWidgetZone'], ['is_safe' => ['html']]),
            new TwigFunction('has_widgets', [$this, 'hasWidgets']),
            new TwigFunction('widget_count', [$this, 'getWidgetCount']),
            new TwigFunction('widgets_as_array', [$this, 'getWidgetsAsArray']),
        ];
    }

    /**
     * Rend une zone de widgets complète
     */
    public function renderWidgetZone(string $zoneName, ?string $theme = null): string
    {
        return $this->widgetRenderer->renderZone($zoneName, $theme);
    }

    /**
     * Vérifie si une zone a des widgets à afficher
     */
    public function hasWidgets(string $zoneName, ?string $theme = null): bool
    {
        return $this->widgetRenderer->hasWidgets($zoneName, $theme);
    }

    /**
     * Obtient le nombre de widgets dans une zone
     */
    public function getWidgetCount(string $zoneName, ?string $theme = null): int
    {
        return $this->widgetRenderer->getWidgetCount($zoneName, $theme);
    }

    /**
     * Obtient les widgets d'une zone sous forme de tableau
     */
    public function getWidgetsAsArray(string $zoneName, ?string $theme = null): array
    {
        return $this->widgetRenderer->renderZoneAsArray($zoneName, $theme);
    }
}
