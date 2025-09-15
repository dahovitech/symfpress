<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\Markup;

/**
 * Extension Twig pour les filtres de contenu
 */
class ContentExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('apply_filter', [$this, 'applyFilter'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Applique un filtre au contenu selon le contexte donné
     * 
     * @param mixed $content Le contenu à filtrer
     * @param string $context Le contexte du filtre (ex: 'post_title', 'post_content')
     * @return Markup
     */
    public function applyFilter($content, string $context = ''): Markup
    {
        if (null === $content) {
            return new Markup('', 'UTF-8');
        }

        // Convertir en string si nécessaire
        $stringContent = (string) $content;

        // Appliquer des filtres selon le contexte
        $filteredContent = match($context) {
            'post_title' => $this->filterPostTitle($stringContent),
            'post_content' => $this->filterPostContent($stringContent),
            'post_excerpt' => $this->filterPostExcerpt($stringContent),
            default => $stringContent
        };

        return new Markup($filteredContent, 'UTF-8');
    }

    /**
     * Filtre spécifique pour les titres d'articles
     */
    private function filterPostTitle(string $title): string
    {
        // Nettoyage basique du titre
        $title = trim($title);
        
        // Échapper les caractères HTML potentiellement dangereux
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8', false);
        
        return $title;
    }

    /**
     * Filtre spécifique pour le contenu d'articles
     */
    private function filterPostContent(string $content): string
    {
        // Pour le contenu, on peut appliquer des transformations plus complexes
        return $content;
    }

    /**
     * Filtre spécifique pour les extraits d'articles
     */
    private function filterPostExcerpt(string $excerpt): string
    {
        // Nettoyage et formatage de l'extrait
        $excerpt = trim($excerpt);
        return $excerpt;
    }

    public function getName(): string
    {
        return 'app_content_extension';
    }
}
