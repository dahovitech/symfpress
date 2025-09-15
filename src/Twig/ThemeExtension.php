<?php

namespace App\Twig;

use App\Service\TemplateResolver;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Extension Twig pour les thèmes
 * Permet d'utiliser facilement les templates de thème depuis les contrôleurs
 */
class ThemeExtension extends AbstractExtension
{
    public function __construct(
        private readonly TemplateResolver $templateResolver
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('theme_template', [$this, 'getThemeTemplate']),
            new TwigFunction('theme_exists', [$this, 'themeTemplateExists']),
            new TwigFunction('active_theme', [$this, 'getActiveTheme']),
        ];
    }

    /**
     * Récupère le chemin d'un template de thème
     */
    public function getThemeTemplate(string $templateName): string
    {
        // Si c'est déjà un template de thème, le retourner tel quel
        if (str_starts_with($templateName, '@theme/')) {
            return $templateName;
        }
        
        // Essayer de trouver le template dans le thème actif
        if ($this->templateResolver->templateExistsInTheme($templateName)) {
            return '@theme/' . $templateName;
        }
        
        // Fallback vers le template par défaut
        return $templateName;
    }

    /**
     * Vérifie si un template existe dans le thème actif
     */
    public function themeTemplateExists(string $templateName): bool
    {
        return $this->templateResolver->templateExistsInTheme($templateName);
    }

    /**
     * Récupère le thème actif
     */
    public function getActiveTheme(): string
    {
        return $this->templateResolver->getActiveTheme();
    }
}
