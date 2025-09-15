<?php

namespace App\Twig;

use App\Service\HtmlPurifierService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\Markup;

/**
 * Extension Twig pour la sécurisation du contenu HTML
 */
class SecurityExtension extends AbstractExtension
{
    public function __construct(
        private HtmlPurifierService $htmlPurifierService
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('purify', [$this, 'purify'], ['is_safe' => ['html']]),
            new TwigFilter('purify_strict', [$this, 'purifyStrict'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Purifie le contenu HTML pour prévenir les attaques XSS
     */
    public function purify(?string $content): Markup
    {
        if (null === $content) {
            return new Markup('', 'UTF-8');
        }

        $purifiedContent = $this->htmlPurifierService->purify($content);
        
        return new Markup($purifiedContent, 'UTF-8');
    }

    /**
     * Version stricte de purification (formatage minimal)
     */
    public function purifyStrict(?string $content): Markup
    {
        if (null === $content) {
            return new Markup('', 'UTF-8');
        }

        $purifiedContent = $this->htmlPurifierService->purifyStrict($content);
        
        return new Markup($purifiedContent, 'UTF-8');
    }

    public function getName(): string
    {
        return 'app_security_extension';
    }
}