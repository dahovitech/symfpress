<?php

namespace App\Controller\Admin;

use App\Extension\PluginManager;
use App\Extension\ThemeManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/extensions')]
#[IsGranted('ROLE_ADMIN')]
class ExtensionController extends AbstractController
{
    public function __construct(
        private PluginManager $pluginManager,
        private ThemeManager $themeManager
    ) {}
    
    #[Route('', name: 'admin_extensions_index')]
    public function index(): Response
    {
        return $this->render('admin/extensions/index.html.twig', [
            'pluginsCount' => count($this->pluginManager->getLoadedPlugins()),
            'themesCount' => count($this->themeManager->getAvailableThemes()),
        ]);
    }
    
    #[Route('/plugins', name: 'admin_plugins_index')]
    public function pluginsIndex(): Response
    {
        $this->pluginManager->loadPlugins();
        
        return $this->render('admin/extensions/plugins/index.html.twig', [
            'loadedPlugins' => $this->pluginManager->getLoadedPlugins(),
            'activePlugins' => $this->pluginManager->getActivePlugins(),
            'pluginMetadata' => $this->getAllPluginMetadata(),
        ]);
    }
    
    #[Route('/plugins/activate/{pluginName}', name: 'admin_plugins_activate')]
    public function activatePlugin(string $pluginName): Response
    {
        $success = $this->pluginManager->activatePlugin($pluginName);
        
        if ($success) {
            $this->addFlash('success', "Plugin '{$pluginName}' activé avec succès.");
        } else {
            $this->addFlash('error', "Erreur lors de l'activation du plugin '{$pluginName}'.");
        }
        
        return $this->redirectToRoute('admin_plugins_index');
    }
    
    #[Route('/plugins/deactivate/{pluginName}', name: 'admin_plugins_deactivate')]
    public function deactivatePlugin(string $pluginName): Response
    {
        $success = $this->pluginManager->deactivatePlugin($pluginName);
        
        if ($success) {
            $this->addFlash('success', "Plugin '{$pluginName}' désactivé avec succès.");
        } else {
            $this->addFlash('error', "Erreur lors de la désactivation du plugin '{$pluginName}'.");
        }
        
        return $this->redirectToRoute('admin_plugins_index');
    }
    
    #[Route('/plugins/uninstall/{pluginName}', name: 'admin_plugins_uninstall')]
    public function uninstallPlugin(string $pluginName): Response
    {
        $success = $this->pluginManager->uninstallPlugin($pluginName);
        
        if ($success) {
            $this->addFlash('success', "Plugin '{$pluginName}' désinstallé avec succès.");
        } else {
            $this->addFlash('error', "Erreur lors de la désinstallation du plugin '{$pluginName}'.");
        }
        
        return $this->redirectToRoute('admin_plugins_index');
    }
    
    #[Route('/plugins/upload', name: 'admin_plugins_upload', methods: ['POST'])]
    public function uploadPlugin(Request $request): Response
    {
        $uploadedFile = $request->files->get('plugin_file');
        
        if (!$uploadedFile instanceof UploadedFile) {
            $this->addFlash('error', 'Aucun fichier sélectionné.');
            return $this->redirectToRoute('admin_plugins_index');
        }
        
        if ($uploadedFile->getClientMimeType() !== 'application/zip') {
            $this->addFlash('error', 'Le fichier doit être un archive ZIP.');
            return $this->redirectToRoute('admin_plugins_index');
        }
        
        $tempPath = $uploadedFile->getPathname();
        $success = $this->pluginManager->installPluginFromZip($tempPath);
        
        if ($success) {
            $this->addFlash('success', 'Plugin installé avec succès.');
        } else {
            $this->addFlash('error', 'Erreur lors de l\'installation du plugin.');
        }
        
        return $this->redirectToRoute('admin_plugins_index');
    }
    
    #[Route('/themes', name: 'admin_themes_index')]
    public function themesIndex(): Response
    {
        $this->themeManager->discoverThemes();
        
        return $this->render('admin/extensions/themes/index.html.twig', [
            'availableThemes' => $this->themeManager->getAvailableThemes(),
            'activeTheme' => $this->themeManager->getActiveTheme(),
            'themeMetadata' => $this->getAllThemeMetadata(),
        ]);
    }
    
    #[Route('/themes/activate/{themeName}', name: 'admin_themes_activate')]
    public function activateTheme(string $themeName): Response
    {
        // Découvrir les thèmes avant l'activation
        $this->themeManager->discoverThemes();
        
        $success = $this->themeManager->activateTheme($themeName);
        
        if ($success) {
            $this->addFlash('success', "Thème '{$themeName}' activé avec succès.");
        } else {
            $this->addFlash('error', "Erreur lors de l'activation du thème '{$themeName}'.");
        }
        
        return $this->redirectToRoute('admin_themes_index');
    }
    
    #[Route('/themes/delete/{themeName}', name: 'admin_themes_delete')]
    public function deleteTheme(string $themeName): Response
    {
        $success = $this->themeManager->deleteTheme($themeName);
        
        if ($success) {
            $this->addFlash('success', "Thème '{$themeName}' supprimé avec succès.");
        } else {
            $this->addFlash('error', "Erreur lors de la suppression du thème '{$themeName}'.");
        }
        
        return $this->redirectToRoute('admin_themes_index');
    }
    
    #[Route('/themes/upload', name: 'admin_themes_upload', methods: ['POST'])]
    public function uploadTheme(Request $request): Response
    {
        $uploadedFile = $request->files->get('theme_file');
        
        if (!$uploadedFile instanceof UploadedFile) {
            $this->addFlash('error', 'Aucun fichier sélectionné.');
            return $this->redirectToRoute('admin_themes_index');
        }
        
        if ($uploadedFile->getClientMimeType() !== 'application/zip') {
            $this->addFlash('error', 'Le fichier doit être un archive ZIP.');
            return $this->redirectToRoute('admin_themes_index');
        }
        
        $tempPath = $uploadedFile->getPathname();
        $success = $this->themeManager->installThemeFromZip($tempPath);
        
        if ($success) {
            $this->addFlash('success', 'Thème installé avec succès.');
        } else {
            $this->addFlash('error', 'Erreur lors de l\'installation du thème.');
        }
        
        return $this->redirectToRoute('admin_themes_index');
    }
    
    /**
     * Récupère toutes les métadonnées des plugins
     */
    private function getAllPluginMetadata(): array
    {
        $metadata = [];
        foreach ($this->pluginManager->getLoadedPlugins() as $name => $plugin) {
            $metadata[$name] = $this->pluginManager->getPluginMetadata($name);
        }
        return $metadata;
    }
    
    /**
     * Récupère toutes les métadonnées des thèmes
     */
    private function getAllThemeMetadata(): array
    {
        $metadata = [];
        foreach ($this->themeManager->getAvailableThemes() as $name => $path) {
            $metadata[$name] = $this->themeManager->getThemeMetadata($name);
        }
        return $metadata;
    }
}
