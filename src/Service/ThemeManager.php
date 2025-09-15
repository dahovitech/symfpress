<?php

namespace App\Service;

use App\Entity\Setting;
use App\Repository\SettingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Service ThemeManager pour la gestion centralisée des thèmes
 * 
 * Gère l'activation, la désactivation, et le chargement des thèmes
 * avec persistance en base de données via l'entity Setting.
 */
class ThemeManager
{
    // Constantes pour les chemins et configuration
    public const THEMES_DIRECTORY = '/themes';
    public const ACTIVE_THEME_KEY = 'active_theme';
    public const DEFAULT_THEME = 'modern-blog';
    public const THEME_CONFIG_FILE = 'theme.yaml';
    public const CACHE_PREFIX = 'theme_';
    public const CACHE_TTL = 3600; // 1 heure

    private string $themesPath;
    private array $availableThemes = [];
    private array $themesInfo = [];
    private bool $initialized = false;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private SettingRepository $settingRepository,
        private LoggerInterface $logger,
        private CacheItemPoolInterface $cache,
        private string $projectDir
    ) {
        $this->themesPath = $projectDir . self::THEMES_DIRECTORY;
    }

    /**
     * Initialise le service en chargeant les thèmes disponibles
     */
    private function initialize(): void
    {
        if ($this->initialized) {
            return;
        }

        $this->discoverThemes();
        $this->initialized = true;
    }

    /**
     * Active un thème et le sauvegarde en base
     */
    public function activateTheme(string $themeName): bool
    {
        $this->initialize();

        if (!$this->validateTheme($themeName)) {
            $this->logger->error("Impossible d'activer le thème '{$themeName}' : thème invalide");
            return false;
        }

        try {
            // Sauvegarder en base de données
            $this->settingRepository->setValue(
                self::ACTIVE_THEME_KEY,
                $themeName,
                'Thème actif du site'
            );

            // Vider le cache
            $this->clearThemeCache();

            $this->logger->info("Thème '{$themeName}' activé avec succès");
            return true;

        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de l'activation du thème '{$themeName}' : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Récupère le thème actuellement actif
     */
    public function getActiveTheme(): string
    {
        $this->initialize();

        try {
            // Essayer de récupérer depuis le cache
            $cacheKey = self::CACHE_PREFIX . 'active';
            $cachedTheme = $this->cache->get($cacheKey, function() {
                $activeTheme = $this->settingRepository->getValue(self::ACTIVE_THEME_KEY);
                
                // Si aucun thème n'est défini ou si le thème actif n'existe plus
                if (!$activeTheme || !$this->validateTheme($activeTheme)) {
                    $activeTheme = $this->getDefaultTheme();
                    
                    // Sauvegarder le thème par défaut
                    if ($activeTheme) {
                        $this->settingRepository->setValue(
                            self::ACTIVE_THEME_KEY,
                            $activeTheme,
                            'Thème actif du site (défaut)'
                        );
                    }
                }

                return $activeTheme;
            });

            return $cachedTheme ?: self::DEFAULT_THEME;

        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la récupération du thème actif : " . $e->getMessage());
            return self::DEFAULT_THEME;
        }
    }

    /**
     * Liste tous les thèmes disponibles
     */
    public function getAvailableThemes(): array
    {
        $this->initialize();
        return $this->availableThemes;
    }

    /**
     * Valide qu'un thème existe et est valide
     */
    public function validateTheme(string $themeName): bool
    {
        $this->initialize();

        if (!isset($this->availableThemes[$themeName])) {
            return false;
        }

        $themePath = $this->availableThemes[$themeName];
        
        // Vérifier que le répertoire existe
        if (!is_dir($themePath)) {
            return false;
        }

        // Vérifier que le répertoire templates existe
        $templatesPath = $themePath . '/templates';
        if (!is_dir($templatesPath)) {
            return false;
        }

        // Vérifier qu'il y a au moins un template de base
        $baseTemplate = $templatesPath . '/base.html.twig';
        if (!file_exists($baseTemplate)) {
            return false;
        }

        return true;
    }

    /**
     * Récupère les informations d'un thème (theme.yaml)
     */
    public function getThemeInfo(string $themeName): ?array
    {
        $this->initialize();

        if (!isset($this->themesInfo[$themeName])) {
            return null;
        }

        return $this->themesInfo[$themeName];
    }

    /**
     * Découvre tous les thèmes disponibles
     */
    private function discoverThemes(): void
    {
        if (!is_dir($this->themesPath)) {
            $this->logger->warning("Le répertoire des thèmes n'existe pas : {$this->themesPath}");
            $this->ensureThemesDirectory();
            return;
        }

        try {
            $finder = new Finder();
            $finder->directories()->in($this->themesPath)->depth(0);

            foreach ($finder as $themeDir) {
                $themeName = $themeDir->getBasename();
                $themePath = $themeDir->getRealPath();
                
                $this->availableThemes[$themeName] = $themePath;
                $this->loadThemeInfo($themeName, $themePath);
            }

            $this->logger->info(sprintf("Découverte de %d thème(s)", count($this->availableThemes)));

        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la découverte des thèmes : " . $e->getMessage());
        }
    }

    /**
     * Charge les informations d'un thème depuis theme.yaml
     */
    private function loadThemeInfo(string $themeName, string $themePath): void
    {
        $configPath = $themePath . '/' . self::THEME_CONFIG_FILE;

        if (!file_exists($configPath)) {
            // Créer des informations par défaut
            $this->themesInfo[$themeName] = [
                'name' => ucfirst(str_replace('-', ' ', $themeName)),
                'description' => "Thème {$themeName}",
                'version' => '1.0.0',
                'author' => 'Inconnu',
                'screenshot' => null,
                'supports' => [],
                'requirements' => [],
                'features' => []
            ];
            return;
        }

        try {
            $themeConfig = Yaml::parseFile($configPath);
            
            // Valider et normaliser la configuration
            $this->themesInfo[$themeName] = array_merge([
                'name' => ucfirst(str_replace('-', ' ', $themeName)),
                'description' => '',
                'version' => '1.0.0',
                'author' => 'Inconnu',
                'screenshot' => null,
                'supports' => [],
                'requirements' => [],
                'features' => []
            ], $themeConfig);

            $this->logger->debug("Configuration du thème '{$themeName}' chargée");

        } catch (ParseException $e) {
            $this->logger->error("Erreur de parsing YAML pour le thème '{$themeName}' : " . $e->getMessage());
            
            // Utiliser les informations par défaut en cas d'erreur
            $this->themesInfo[$themeName] = [
                'name' => ucfirst(str_replace('-', ' ', $themeName)),
                'description' => "Thème {$themeName} (configuration invalide)",
                'version' => '1.0.0',
                'author' => 'Inconnu',
                'screenshot' => null,
                'supports' => [],
                'requirements' => [],
                'features' => []
            ];
        }
    }

    /**
     * Récupère le thème par défaut
     */
    private function getDefaultTheme(): ?string
    {
        // Vérifier si le thème par défaut configuré existe
        if (isset($this->availableThemes[self::DEFAULT_THEME])) {
            return self::DEFAULT_THEME;
        }

        // Sinon, prendre le premier thème disponible
        $themes = array_keys($this->availableThemes);
        return !empty($themes) ? $themes[0] : null;
    }

    /**
     * Assure que le répertoire des thèmes existe
     */
    private function ensureThemesDirectory(): void
    {
        if (!is_dir($this->themesPath)) {
            try {
                mkdir($this->themesPath, 0755, true);
                $this->logger->info("Répertoire des thèmes créé : {$this->themesPath}");
            } catch (\Exception $e) {
                $this->logger->error("Impossible de créer le répertoire des thèmes : " . $e->getMessage());
            }
        }
    }

    /**
     * Vide le cache des thèmes
     */
    private function clearThemeCache(): void
    {
        try {
            $this->cache->delete(self::CACHE_PREFIX . 'active');
            $this->logger->debug("Cache des thèmes vidé");
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la suppression du cache : " . $e->getMessage());
        }
    }

    /**
     * Récupère le chemin absolu d'un thème
     */
    public function getThemePath(string $themeName): ?string
    {
        $this->initialize();
        return $this->availableThemes[$themeName] ?? null;
    }

    /**
     * Vérifie si un thème existe
     */
    public function themeExists(string $themeName): bool
    {
        $this->initialize();
        return isset($this->availableThemes[$themeName]);
    }

    /**
     * Récupère l'URL du screenshot d'un thème
     */
    public function getThemeScreenshot(string $themeName): ?string
    {
        $themeInfo = $this->getThemeInfo($themeName);
        if (!$themeInfo || !isset($this->availableThemes[$themeName])) {
            return null;
        }

        // Si un screenshot est spécifié dans la configuration
        if (isset($themeInfo['screenshot']) && $themeInfo['screenshot']) {
            $screenshotPath = $this->availableThemes[$themeName] . '/' . $themeInfo['screenshot'];
            if (file_exists($screenshotPath)) {
                return '/themes/' . $themeName . '/' . $themeInfo['screenshot'];
            }
        }

        // Chercher un screenshot par défaut
        $possibleScreenshots = ['screenshot.png', 'screenshot.jpg', 'preview.png', 'preview.jpg'];
        foreach ($possibleScreenshots as $screenshot) {
            $screenshotPath = $this->availableThemes[$themeName] . '/' . $screenshot;
            if (file_exists($screenshotPath)) {
                return '/themes/' . $themeName . '/' . $screenshot;
            }
        }

        return null;
    }

    /**
     * Récupère des statistiques sur les thèmes
     */
    public function getThemeStats(): array
    {
        $this->initialize();

        return [
            'total_themes' => count($this->availableThemes),
            'active_theme' => $this->getActiveTheme(),
            'themes_list' => array_keys($this->availableThemes),
            'themes_path' => $this->themesPath
        ];
    }

    /**
     * Supprime un thème
     */
    public function deleteTheme(string $themeName): bool
    {
        $this->initialize();

        // Empêcher la suppression du thème actif
        if ($this->getActiveTheme() === $themeName) {
            $this->logger->error("Impossible de supprimer le thème actif '{$themeName}'");
            return false;
        }

        if (!isset($this->availableThemes[$themeName])) {
            $this->logger->error("Le thème '{$themeName}' n'existe pas");
            return false;
        }

        try {
            $themePath = $this->availableThemes[$themeName];
            
            // Supprimer le répertoire du thème
            $this->removeDirectory($themePath);
            
            // Retirer du cache et des listes
            unset($this->availableThemes[$themeName]);
            unset($this->themesInfo[$themeName]);
            
            $this->clearThemeCache();
            
            $this->logger->info("Thème '{$themeName}' supprimé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la suppression du thème '{$themeName}': " . $e->getMessage());
            return false;
        }
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
                throw new \Exception("Impossible d'ouvrir le fichier ZIP: code {$result}");
            }
            
            // Extraire le nom du thème depuis la structure
            $themeName = null;
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                if (strpos($filename, '/') !== false) {
                    $parts = explode('/', $filename);
                    $themeName = $parts[0];
                    break;
                }
            }
            
            if (!$themeName) {
                throw new \Exception("Structure du thème invalide - nom de thème non trouvé");
            }
            
            $targetPath = $this->themesPath . '/' . $themeName;
            
            // Vérifier si le thème existe déjà
            if (is_dir($targetPath)) {
                throw new \Exception("Le thème '{$themeName}' existe déjà");
            }
            
            // Extraire le ZIP
            $zip->extractTo($this->themesPath);
            $zip->close();
            
            // Valider la structure du thème installé
            if (!$this->validateThemeStructure($targetPath)) {
                // Nettoyer en cas d'erreur
                $this->removeDirectory($targetPath);
                throw new \Exception("Structure du thème invalide après installation");
            }
            
            // Recharger les thèmes disponibles
            $this->availableThemes[$themeName] = $targetPath;
            $this->loadThemeInfo($themeName, $targetPath);
            
            $this->clearThemeCache();
            
            $this->logger->info("Thème '{$themeName}' installé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de l'installation du thème: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Valide la structure d'un thème
     */
    private function validateThemeStructure(string $themePath): bool
    {
        if (!is_dir($themePath)) {
            return false;
        }
        
        $templatesPath = $themePath . '/templates';
        if (!is_dir($templatesPath)) {
            return false;
        }
        
        // Vérifier qu'il y a au moins un fichier template
        $finder = new Finder();
        $finder->files()->in($templatesPath)->name('*.twig');
        
        return $finder->count() > 0;
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
