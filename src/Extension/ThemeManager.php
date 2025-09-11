<?php

namespace App\Extension;

use App\Extension\Event\ThemeEvent;
use App\Extension\Interface\ThemeInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Psr\Log\LoggerInterface;
use Twig\Environment;

/**
 * Gestionnaire des thèmes SymfPress
 * Système de thèmes inspiré de WordPress avec support Twig
 */
class ThemeManager
{
    private array $availableThemes = [];
    private ?string $activeTheme = null;
    private string $themesDirectory;
    private array $themeMetadata = [];
    
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private LoggerInterface $logger,
        private Environment $twig,
        string $projectDir
    ) {
        $this->themesDirectory = $projectDir . '/themes';
        $this->ensureThemesDirectory();
    }
    
    /**
     * Découvre et charge tous les thèmes disponibles
     */
    public function discoverThemes(): void
    {
        if (!is_dir($this->themesDirectory)) {
            return;
        }
        
        $finder = new Finder();
        $finder->directories()->in($this->themesDirectory)->depth(0);
        
        foreach ($finder as $themeDir) {
            $themeName = $themeDir->getBasename();
            $this->loadThemeMetadata($themeName);
        }
    }
    
    /**
     * Charge les métadonnées d'un thème
     */
    private function loadThemeMetadata(string $themeName): void
    {
        $themePath = $this->themesDirectory . '/' . $themeName;
        $configPath = $themePath . '/theme.yaml';
        
        if (!file_exists($configPath)) {
            // Fallback : essayer de créer des métadonnées basiques
            $this->themeMetadata[$themeName] = [
                'name' => ucfirst($themeName),
                'description' => "Thème {$themeName}",
                'version' => '1.0.0',
                'author' => 'Unknown',
                'screenshot' => null,
                'supports' => []
            ];
            return;
        }
        
        try {
            $metadata = Yaml::parseFile($configPath);
            $this->themeMetadata[$themeName] = $metadata;
            $this->availableThemes[$themeName] = $themePath;
            
            $this->logger->info("Métadonnées du thème {$themeName} chargées");
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors du chargement des métadonnées du thème {$themeName}: " . $e->getMessage());
        }
    }
    
    /**
     * Active un thème
     */
    public function activateTheme(string $themeName): bool
    {
        if (!isset($this->availableThemes[$themeName])) {
            $this->logger->error("Thème {$themeName} non trouvé");
            return false;
        }
        
        try {
            // Désactiver le thème actuel s'il y en a un
            if ($this->activeTheme) {
                $this->deactivateCurrentTheme();
            }
            
            $this->activeTheme = $themeName;
            
            // Ajouter le chemin du thème à Twig
            $themePath = $this->availableThemes[$themeName];
            $this->twig->getLoader()->addPath($themePath . '/templates', $themeName);
            
            // Vérifier s'il y a un fichier de fonctions du thème
            $functionsFile = $themePath . '/functions.php';
            if (file_exists($functionsFile)) {
                require_once $functionsFile;
            }
            
            // Déclencher l'événement d'activation du thème
            $event = new ThemeEvent($themeName, $this->themeMetadata[$themeName]);
            $this->eventDispatcher->dispatch($event, 'theme.activated');
            
            $this->logger->info("Thème {$themeName} activé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de l'activation du thème {$themeName}: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Désactive le thème actuel
     */
    public function deactivateCurrentTheme(): void
    {
        if (!$this->activeTheme) {
            return;
        }
        
        try {
            // Déclencher l'événement de désactivation
            $event = new ThemeEvent($this->activeTheme, $this->themeMetadata[$this->activeTheme]);
            $this->eventDispatcher->dispatch($event, 'theme.deactivated');
            
            $this->logger->info("Thème {$this->activeTheme} désactivé");
            $this->activeTheme = null;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la désactivation du thème: " . $e->getMessage());
        }
    }
    
    /**
     * Retourne le thème actif
     */
    public function getActiveTheme(): ?string
    {
        return $this->activeTheme;
    }
    
    /**
     * Retourne tous les thèmes disponibles
     */
    public function getAvailableThemes(): array
    {
        return $this->availableThemes;
    }
    
    /**
     * Retourne les métadonnées d'un thème
     */
    public function getThemeMetadata(string $themeName): ?array
    {
        return $this->themeMetadata[$themeName] ?? null;
    }
    
    /**
     * Installe un thème depuis un fichier ZIP
     */
    public function installThemeFromZip(string $zipPath): bool
    {
        try {
            $zip = new \ZipArchive();
            $result = $zip->open($zipPath);
            
            if ($result !== TRUE) {
                throw new \Exception("Impossible d'ouvrir le fichier ZIP");
            }
            
            // Extraire le nom du thème depuis le premier répertoire
            $themeName = null;
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                if (strpos($filename, '/') !== false) {
                    $themeName = explode('/', $filename)[0];
                    break;
                }
            }
            
            if (!$themeName) {
                throw new \Exception("Structure du thème invalide");
            }
            
            $targetPath = $this->themesDirectory . '/' . $themeName;
            
            if (is_dir($targetPath)) {
                throw new \Exception("Le thème {$themeName} existe déjà");
            }
            
            $zip->extractTo($this->themesDirectory);
            $zip->close();
            
            // Charger les métadonnées du nouveau thème
            $this->loadThemeMetadata($themeName);
            
            $this->logger->info("Thème {$themeName} installé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de l'installation du thème: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Supprime un thème
     */
    public function deleteTheme(string $themeName): bool
    {
        if ($this->activeTheme === $themeName) {
            $this->logger->error("Impossible de supprimer le thème actif {$themeName}");
            return false;
        }
        
        if (!isset($this->availableThemes[$themeName])) {
            $this->logger->error("Thème {$themeName} non trouvé");
            return false;
        }
        
        try {
            $themePath = $this->availableThemes[$themeName];
            
            // Supprimer récursivement le répertoire du thème
            $this->removeDirectory($themePath);
            
            unset($this->availableThemes[$themeName]);
            unset($this->themeMetadata[$themeName]);
            
            $this->logger->info("Thème {$themeName} supprimé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la suppression du thème {$themeName}: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Vérifie si un template existe dans le thème actif
     */
    public function templateExists(string $templateName): bool
    {
        if (!$this->activeTheme) {
            return false;
        }
        
        $templatePath = $this->availableThemes[$this->activeTheme] . '/templates/' . $templateName;
        return file_exists($templatePath);
    }
    
    /**
     * Retourne le chemin d'un template dans le thème actif
     */
    public function getTemplatePath(string $templateName): ?string
    {
        if (!$this->activeTheme) {
            return null;
        }
        
        $templatePath = $this->availableThemes[$this->activeTheme] . '/templates/' . $templateName;
        return file_exists($templatePath) ? $templatePath : null;
    }
    
    /**
     * Retourne l'URL du screenshot d'un thème
     */
    public function getThemeScreenshot(string $themeName): ?string
    {
        if (!isset($this->availableThemes[$themeName])) {
            return null;
        }
        
        $metadata = $this->themeMetadata[$themeName];
        if (isset($metadata['screenshot'])) {
            return '/themes/' . $themeName . '/' . $metadata['screenshot'];
        }
        
        // Chercher un screenshot par défaut
        $themePath = $this->availableThemes[$themeName];
        $possibleScreenshots = ['screenshot.png', 'screenshot.jpg', 'preview.png', 'preview.jpg'];
        
        foreach ($possibleScreenshots as $screenshot) {
            if (file_exists($themePath . '/' . $screenshot)) {
                return '/themes/' . $themeName . '/' . $screenshot;
            }
        }
        
        return null;
    }
    
    /**
     * Assure que le répertoire des thèmes existe
     */
    private function ensureThemesDirectory(): void
    {
        if (!is_dir($this->themesDirectory)) {
            mkdir($this->themesDirectory, 0755, true);
        }
    }
    
    /**
     * Supprime récursivement un répertoire
     */
    private function removeDirectory(string $path): void
    {
        if (!is_dir($path)) {
            return;
        }
        
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        
        rmdir($path);
    }
}
