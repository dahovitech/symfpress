<?php

namespace App\Controller;

use App\Service\LanguageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/language', name: 'language_')]
class LanguageController extends AbstractController
{
    public function __construct(
        private readonly LanguageService $languageService
    ) {
    }

    #[Route('/switch/{code}', name: 'switch', methods: ['GET', 'POST'])]
    public function switchLanguage(
        string $code, 
        Request $request
    ): Response {
        // Tenter de changer de langue
        $language = $this->languageService->switchLanguage($code);
        
        if (!$language) {
            $this->addFlash('error', 'Langue non disponible');
        } else {
            $this->addFlash('success', 'Langue changée vers ' . $language->getName());
        }

        // Rediriger vers la page de référence ou l'accueil
        $referer = $request->headers->get('referer');
        if ($referer && $this->isSafeUrl($referer, $request)) {
            return new RedirectResponse($referer);
        }

        return $this->redirectToRoute('frontend_homepage');
    }

    #[Route('/switch-ajax/{code}', name: 'switch_ajax', methods: ['POST'])]
    public function switchLanguageAjax(
        string $code, 
        Request $request
    ): JsonResponse {
        // Tenter de changer de langue
        $language = $this->languageService->switchLanguage($code);
        
        if (!$language) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Langue non disponible'
            ], 400);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'Langue changée vers ' . $language->getName(),
            'language' => [
                'code' => $language->getCode(),
                'name' => $language->getName()
            ]
        ]);
    }

    #[Route('/current', name: 'current', methods: ['GET'])]
    public function getCurrentLanguage(): JsonResponse
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        
        return new JsonResponse([
            'code' => $currentLanguage->getCode(),
            'name' => $currentLanguage->getName(),
            'is_default' => $currentLanguage->getIsDefault()
        ]);
    }

    #[Route('/available', name: 'available', methods: ['GET'])]
    public function getAvailableLanguages(): JsonResponse
    {
        $languages = $this->languageService->getAvailableLanguages();
        
        $languagesData = array_map(function($language) {
            return [
                'code' => $language->getCode(),
                'name' => $language->getName(),
                'is_default' => $language->getIsDefault()
            ];
        }, $languages);

        return new JsonResponse([
            'languages' => $languagesData,
            'is_multilingual' => $this->languageService->isMultiLanguageEnabled()
        ]);
    }

    /**
     * Vérifie si l'URL de redirection est sûre
     */
    private function isSafeUrl(string $url, Request $request): bool
    {
        // Vérifier que l'URL appartient au même domaine
        $parsedUrl = parse_url($url);
        if (!$parsedUrl || !isset($parsedUrl['host'])) {
            return true; // URL relative, considérée comme sûre
        }

        $currentHost = $request->getHttpHost();
        return $parsedUrl['host'] === $currentHost;
    }
}
