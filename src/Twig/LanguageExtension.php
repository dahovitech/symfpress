<?php

namespace App\Twig;

use App\Entity\Language;
use App\Service\LanguageService;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class LanguageExtension extends AbstractExtension
{
    public function __construct(
        private readonly LanguageService $languageService,
        private readonly UrlGeneratorInterface $urlGenerator
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_current_language', [$this, 'getCurrentLanguage']),
            new TwigFunction('get_available_languages', [$this, 'getAvailableLanguages']),
            new TwigFunction('is_multilingual', [$this, 'isMultilingual']),
            new TwigFunction('language_switch_url', [$this, 'getLanguageSwitchUrl']),
            new TwigFunction('render_language_selector', [$this, 'renderLanguageSelector'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Obtient la langue courante
     */
    public function getCurrentLanguage(): Language
    {
        return $this->languageService->getCurrentLanguage();
    }

    /**
     * Obtient toutes les langues disponibles
     */
    public function getAvailableLanguages(): array
    {
        return $this->languageService->getAvailableLanguages();
    }

    /**
     * Vérifie si le site est multilingue
     */
    public function isMultilingual(): bool
    {
        return $this->languageService->isMultiLanguageEnabled();
    }

    /**
     * Génère l'URL pour changer de langue
     */
    public function getLanguageSwitchUrl(string $languageCode): string
    {
        return $this->urlGenerator->generate('language_switch', [
            'code' => $languageCode
        ]);
    }

    /**
     * Rend un sélecteur de langue HTML
     */
    public function renderLanguageSelector(array $options = []): string
    {
        // Si le site n'est pas multilingue, ne rien afficher
        if (!$this->isMultilingual()) {
            return '';
        }

        $currentLanguage = $this->getCurrentLanguage();
        $availableLanguages = $this->getAvailableLanguages();

        // Options par défaut
        $defaultOptions = [
            'type' => 'dropdown', // dropdown, buttons, flags
            'show_flags' => false,
            'show_names' => true,
            'show_codes' => false,
            'container_class' => 'language-selector',
            'button_class' => 'btn btn-sm btn-outline-secondary',
            'dropdown_class' => 'form-select form-select-sm',
            'link_class' => '',
            'current_class' => 'active',
        ];

        $options = array_merge($defaultOptions, $options);

        return $this->generateLanguageSelector($currentLanguage, $availableLanguages, $options);
    }

    /**
     * Génère le HTML du sélecteur de langue
     */
    private function generateLanguageSelector(Language $currentLanguage, array $languages, array $options): string
    {
        switch ($options['type']) {
            case 'dropdown':
                return $this->generateDropdownSelector($currentLanguage, $languages, $options);
            case 'buttons':
                return $this->generateButtonSelector($currentLanguage, $languages, $options);
            case 'flags':
                return $this->generateFlagSelector($currentLanguage, $languages, $options);
            default:
                return $this->generateDropdownSelector($currentLanguage, $languages, $options);
        }
    }

    /**
     * Génère un sélecteur dropdown
     */
    private function generateDropdownSelector(Language $currentLanguage, array $languages, array $options): string
    {
        $html = '<div class="' . htmlspecialchars($options['container_class']) . '">';
        $html .= '<select class="' . htmlspecialchars($options['dropdown_class']) . '" onchange="changeLanguage(this.value)">';
        
        foreach ($languages as $language) {
            $selected = $language->getId() === $currentLanguage->getId() ? 'selected' : '';
            $text = $this->getLanguageDisplayText($language, $options);
            
            $html .= sprintf(
                '<option value="%s" %s>%s</option>',
                htmlspecialchars($language->getCode()),
                $selected,
                htmlspecialchars($text)
            );
        }
        
        $html .= '</select>';
        $html .= '</div>';

        // Ajouter le JavaScript pour le changement de langue
        $html .= $this->getLanguageChangeScript();

        return $html;
    }

    /**
     * Génère un sélecteur avec boutons
     */
    private function generateButtonSelector(Language $currentLanguage, array $languages, array $options): string
    {
        $html = '<div class="' . htmlspecialchars($options['container_class']) . ' btn-group" role="group">';
        
        foreach ($languages as $language) {
            $isActive = $language->getId() === $currentLanguage->getId();
            $buttonClass = $options['button_class'];
            if ($isActive) {
                $buttonClass .= ' ' . $options['current_class'];
            }
            
            $text = $this->getLanguageDisplayText($language, $options);
            $url = $this->getLanguageSwitchUrl($language->getCode());
            
            $html .= sprintf(
                '<a href="%s" class="%s" %s>%s</a>',
                htmlspecialchars($url),
                htmlspecialchars($buttonClass),
                $isActive ? 'aria-current="true"' : '',
                htmlspecialchars($text)
            );
        }
        
        $html .= '</div>';

        return $html;
    }

    /**
     * Génère un sélecteur avec drapeaux
     */
    private function generateFlagSelector(Language $currentLanguage, array $languages, array $options): string
    {
        $html = '<div class="' . htmlspecialchars($options['container_class']) . ' language-flags">';
        
        foreach ($languages as $language) {
            $isActive = $language->getId() === $currentLanguage->getId();
            $linkClass = $options['link_class'];
            if ($isActive) {
                $linkClass .= ' ' . $options['current_class'];
            }
            
            $text = $this->getLanguageDisplayText($language, $options);
            $url = $this->getLanguageSwitchUrl($language->getCode());
            
            // Générer le chemin du drapeau
            $flagPath = '/images/flags/' . strtolower($language->getCode()) . '.svg';
            
            $html .= sprintf(
                '<a href="%s" class="%s" title="%s" %s>
                    <img src="%s" alt="%s" class="flag-icon" onerror="this.style.display=\'none\'; this.nextSibling.style.display=\'inline\';">
                    <span style="display:none;">%s</span>
                </a>',
                htmlspecialchars($url),
                htmlspecialchars($linkClass),
                htmlspecialchars($language->getName()),
                $isActive ? 'aria-current="true"' : '',
                htmlspecialchars($flagPath),
                htmlspecialchars($language->getName()),
                htmlspecialchars($language->getCode())
            );
        }
        
        $html .= '</div>';

        return $html;
    }

    /**
     * Obtient le texte à afficher pour une langue
     */
    private function getLanguageDisplayText(Language $language, array $options): string
    {
        $parts = [];
        
        if ($options['show_names']) {
            $parts[] = $language->getName();
        }
        
        if ($options['show_codes']) {
            $parts[] = '(' . strtoupper($language->getCode()) . ')';
        }
        
        return implode(' ', $parts) ?: $language->getName();
    }

    /**
     * Génère le script JavaScript pour le changement de langue
     */
    private function getLanguageChangeScript(): string
    {
        return '<script>
            function changeLanguage(languageCode) {
                window.location.href = "' . $this->urlGenerator->generate('language_switch', ['code' => '']) . '" + languageCode;
            }
        </script>';
    }
}
