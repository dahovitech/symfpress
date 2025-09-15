<?php

namespace App\Controller\Admin;

use App\Service\ThemeManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Contrôleur d'exemple pour la gestion des thèmes via le service ThemeManager
 */
#[Route('/admin/themes', name: 'admin_themes_')]
#[IsGranted('ROLE_ADMIN')]
class ThemeExampleController extends AbstractController
{
    public function __construct(
        private ThemeManager $themeManager
    ) {}

    /**
     * Page d'administration des thèmes
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $activeTheme = $this->themeManager->getActiveTheme();
        $availableThemes = $this->themeManager->getAvailableThemes();
        $themeStats = $this->themeManager->getThemeStats();
        
        // Enrichir les données des thèmes avec leurs informations
        $themesData = [];
        foreach ($availableThemes as $themeName => $themePath) {
            $themeInfo = $this->themeManager->getThemeInfo($themeName);
            $themesData[] = [
                'name' => $themeName,
                'path' => $themePath,
                'info' => $themeInfo,
                'screenshot' => $this->themeManager->getThemeScreenshot($themeName),
                'is_active' => $themeName === $activeTheme,
                'is_valid' => $this->themeManager->validateTheme($themeName)
            ];
        }

        return $this->render('admin/themes/index.html.twig', [
            'active_theme' => $activeTheme,
            'themes' => $themesData,
            'stats' => $themeStats
        ]);
    }

    /**
     * Activation d'un thème via AJAX
     */
    #[Route('/activate/{themeName}', name: 'activate', methods: ['POST'])]
    public function activate(string $themeName): JsonResponse
    {
        try {
            // Vérifier que le thème existe
            if (!$this->themeManager->themeExists($themeName)) {
                return $this->json([
                    'success' => false,
                    'message' => "Le thème '{$themeName}' n'existe pas."
                ], Response::HTTP_NOT_FOUND);
            }

            // Valider le thème
            if (!$this->themeManager->validateTheme($themeName)) {
                return $this->json([
                    'success' => false,
                    'message' => "Le thème '{$themeName}' n'est pas valide (structure incorrecte)."
                ], Response::HTTP_BAD_REQUEST);
            }

            // Activer le thème
            $success = $this->themeManager->activateTheme($themeName);

            if ($success) {
                $this->addFlash('success', "Le thème '{$themeName}' a été activé avec succès.");
                
                return $this->json([
                    'success' => true,
                    'message' => "Thème '{$themeName}' activé avec succès.",
                    'active_theme' => $this->themeManager->getActiveTheme()
                ]);
            } else {
                return $this->json([
                    'success' => false,
                    'message' => "Erreur lors de l'activation du thème '{$themeName}'."
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur inattendue s\'est produite.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Informations détaillées d'un thème
     */
    #[Route('/info/{themeName}', name: 'info', methods: ['GET'])]
    public function info(string $themeName): JsonResponse
    {
        if (!$this->themeManager->themeExists($themeName)) {
            return $this->json([
                'error' => "Le thème '{$themeName}' n'existe pas."
            ], Response::HTTP_NOT_FOUND);
        }

        $themeInfo = $this->themeManager->getThemeInfo($themeName);
        $themePath = $this->themeManager->getThemePath($themeName);
        $screenshot = $this->themeManager->getThemeScreenshot($themeName);
        $isValid = $this->themeManager->validateTheme($themeName);
        $isActive = $this->themeManager->getActiveTheme() === $themeName;

        return $this->json([
            'name' => $themeName,
            'info' => $themeInfo,
            'path' => $themePath,
            'screenshot' => $screenshot,
            'is_valid' => $isValid,
            'is_active' => $isActive
        ]);
    }

    /**
     * API pour obtenir les statistiques des thèmes
     */
    #[Route('/stats', name: 'stats', methods: ['GET'])]
    public function stats(): JsonResponse
    {
        $stats = $this->themeManager->getThemeStats();
        
        // Ajouter des informations supplémentaires
        $stats['themes_info'] = [];
        foreach ($stats['themes_list'] as $themeName) {
            $stats['themes_info'][$themeName] = [
                'info' => $this->themeManager->getThemeInfo($themeName),
                'valid' => $this->themeManager->validateTheme($themeName),
                'screenshot' => $this->themeManager->getThemeScreenshot($themeName)
            ];
        }

        return $this->json($stats);
    }

    /**
     * Validation d'un thème
     */
    #[Route('/validate/{themeName}', name: 'validate', methods: ['GET'])]
    public function validate(string $themeName): JsonResponse
    {
        if (!$this->themeManager->themeExists($themeName)) {
            return $this->json([
                'exists' => false,
                'valid' => false,
                'message' => "Le thème '{$themeName}' n'existe pas."
            ]);
        }

        $isValid = $this->themeManager->validateTheme($themeName);
        $validationDetails = [];

        if ($isValid) {
            $validationDetails = [
                'directory_exists' => true,
                'templates_directory_exists' => true,
                'base_template_exists' => true
            ];
        } else {
            // Détails de validation pour debug
            $themePath = $this->themeManager->getThemePath($themeName);
            $validationDetails = [
                'directory_exists' => is_dir($themePath),
                'templates_directory_exists' => is_dir($themePath . '/templates'),
                'base_template_exists' => file_exists($themePath . '/templates/base.html.twig')
            ];
        }

        return $this->json([
            'exists' => true,
            'valid' => $isValid,
            'validation_details' => $validationDetails,
            'theme_info' => $this->themeManager->getThemeInfo($themeName)
        ]);
    }

    /**
     * Prévisualisation d'un thème (mock - à implémenter selon besoins)
     */
    #[Route('/preview/{themeName}', name: 'preview', methods: ['GET'])]
    public function preview(string $themeName): Response
    {
        if (!$this->themeManager->themeExists($themeName)) {
            throw $this->createNotFoundException("Le thème '{$themeName}' n'existe pas.");
        }

        if (!$this->themeManager->validateTheme($themeName)) {
            $this->addFlash('error', "Le thème '{$themeName}' n'est pas valide.");
            return $this->redirectToRoute('admin_themes_index');
        }

        $themeInfo = $this->themeManager->getThemeInfo($themeName);
        $screenshot = $this->themeManager->getThemeScreenshot($themeName);

        return $this->render('admin/themes/preview.html.twig', [
            'theme_name' => $themeName,
            'theme_info' => $themeInfo,
            'screenshot' => $screenshot
        ]);
    }
}
