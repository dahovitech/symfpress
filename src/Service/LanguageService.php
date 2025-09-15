<?php

namespace App\Service;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class LanguageService
{
    private const SESSION_LANGUAGE_KEY = 'symfpress_language';
    private const DEFAULT_LOCALE = 'fr';
    
    private ?Language $currentLanguage = null;
    
    public function __construct(
        private readonly LanguageRepository $languageRepository,
        private readonly RequestStack $requestStack
    ) {
    }

    public function getCurrentLanguage(): Language
    {
        if ($this->currentLanguage === null) {
            $this->currentLanguage = $this->detectLanguage();
        }
        
        return $this->currentLanguage;
    }

    public function setCurrentLanguage(Language $language): void
    {
        $this->currentLanguage = $language;
        $session = $this->requestStack->getSession();
        if ($session) {
            $session->set(self::SESSION_LANGUAGE_KEY, $language->getCode());
        }
    }

    public function detectLanguage(Request $request = null): Language
    {
        // 1. Vérifier le paramètre de requête en premier (priorité)
        if ($request && $request->query->has('language')) {
            $languageCode = $request->query->get('language');
            
            // Validation du code de langue
            if ($this->isValidLanguageCode($languageCode)) {
                $language = $this->languageRepository->findByCode($languageCode);
                if ($language) {
                    // Optionnel: mettre à jour la session pour persistance
                    $this->setCurrentLanguage($language);
                    return $language;
                }
            }
        }

        // 2. Vérifier si une langue est déjà en session
        $session = $this->requestStack->getSession();
        $sessionLanguageCode = $session ? $session->get(self::SESSION_LANGUAGE_KEY) : null;
        if ($sessionLanguageCode) {
            $language = $this->languageRepository->findByCode($sessionLanguageCode);
            if ($language) {
                return $language;
            }
        }

        // 3. Détecter depuis l'URL si une requête est fournie
        if ($request) {
            $pathInfo = $request->getPathInfo();
            if (preg_match('#^/([a-z]{2})(/.*)?$#', $pathInfo, $matches)) {
                $languageCode = $matches[1];
                $language = $this->languageRepository->findByCode($languageCode);
                if ($language) {
                    return $language;
                }
            }
        }

        // 4. Détecter depuis les préférences du navigateur
        if ($request) {
            $acceptLanguage = $request->headers->get('Accept-Language', '');
            $preferredLanguages = $this->parseAcceptLanguage($acceptLanguage);
            
            foreach ($preferredLanguages as $languageCode) {
                $language = $this->languageRepository->findByCode($languageCode);
                if ($language) {
                    return $language;
                }
            }
        }

        // 5. Retourner la langue par défaut
        $defaultLanguage = $this->languageRepository->findDefault();
        if ($defaultLanguage) {
            return $defaultLanguage;
        }

        // 6. Fallback : créer ou trouver une langue française
        $fallbackLanguage = $this->languageRepository->findByCode(self::DEFAULT_LOCALE);
        if (!$fallbackLanguage) {
            $fallbackLanguage = new Language();
            $fallbackLanguage->setCode(self::DEFAULT_LOCALE);
            $fallbackLanguage->setName('Français');
            $fallbackLanguage->setIsDefault(true);
            $this->languageRepository->save($fallbackLanguage, true);
        }

        return $fallbackLanguage;
    }

    public function getAvailableLanguages(): array
    {
        return $this->languageRepository->findActive();
    }

    public function isMultiLanguageEnabled(): bool
    {
        return count($this->getAvailableLanguages()) > 1;
    }

    public function getLanguageFromCode(string $code): ?Language
    {
        return $this->languageRepository->findByCode($code);
    }

    public function generateLocalizedUrl(string $route, array $parameters = [], ?Language $language = null): string
    {
        if (!$language) {
            $language = $this->getCurrentLanguage();
        }
        
        // Ajouter le préfixe de langue si nécessaire
        if ($this->isMultiLanguageEnabled() && !$language->getIsDefault()) {
            $parameters['_locale'] = $language->getCode();
        }
        
        // TODO: Intégrer avec le UrlGenerator de Symfony
        return $route; // Placeholder
    }

    private function parseAcceptLanguage(string $acceptLanguage): array
    {
        $languages = [];
        $parts = explode(',', $acceptLanguage);
        
        foreach ($parts as $part) {
            $part = trim($part);
            if (preg_match('/^([a-z]{2})(-[A-Z]{2})?(;q=([0-9.]+))?$/', $part, $matches)) {
                $languages[] = $matches[1];
            }
        }
        
        return $languages;
    }

    public function getDefaultLanguage(): ?Language
    {
        return $this->languageRepository->findDefault();
    }

    public function switchLanguage(string $languageCode): ?Language
    {
        $language = $this->languageRepository->findByCode($languageCode);
        if ($language) {
            $this->setCurrentLanguage($language);
            return $language;
        }
        
        return null;
    }

    /**
     * Valide un code de langue
     */
    private function isValidLanguageCode(string $languageCode): bool
    {
        // Validation basique : 2 lettres minuscules
        return preg_match('/^[a-z]{2}$/', $languageCode) === 1;
    }
}