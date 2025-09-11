<?php

namespace App\Extension\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Événement déclenché lors des actions sur les thèmes
 */
class ThemeEvent extends Event
{
    public function __construct(
        private string $themeName,
        private array $themeMetadata
    ) {}
    
    /**
     * Retourne le nom du thème
     */
    public function getThemeName(): string
    {
        return $this->themeName;
    }
    
    /**
     * Retourne les métadonnées du thème
     */
    public function getThemeMetadata(): array
    {
        return $this->themeMetadata;
    }
}
