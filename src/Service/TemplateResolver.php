<?php

namespace App\Service;

use App\Repository\SettingRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Finder\Finder;
use Twig\Environment;

/**
 * Service pour résoudre les chemins de templates selon le thème actif
 * Gère les fallbacks vers le thème par défaut et les templates de base
 */
class TemplateResolver
{
    private const DEFAULT_THEME = 'modern-blog';
    private const ACTIVE_THEME_KEY = 'active_theme';
    
    private ?string $activeTheme = null;
    private array $templatePaths = [];
    private string $themesDirectory;
    private string $baseTemplatesDirectory;

    public function __construct(
        private SettingRepository $settingRepository,
        private LoggerInterface $logger,
        private Environment $twig,
        string $projectDir
    ) {
        $this->themesDirectory = $projectDir . '/themes';
        $this->baseTemplatesDirectory = $projectDir . '/templates';
        $this->loadActiveTheme();
        $this->setupTemplatePaths();
    }

    /**
     * Charge le thème actif depuis la base de données
     */
    private function loadActiveTheme(): void
    {
        try {
            $this->activeTheme = $this->settingRepository->getValue(
                self::ACTIVE_THEME_KEY,
                self::DEFAULT_THEME
            );
            
            $this->logger->info("Thème actif chargé: {$this->activeTheme}");
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors du chargement du thème actif: " . $e->getMessage());
            $this->activeTheme = self::DEFAULT_THEME;
        }
    }

    /**
     * Configure les chemins de templates dans Twig
     * SOLUTION: Utilise des namespaces spécifiques pour isoler les thèmes de l'admin
     */
    public function setupTemplatePaths(): void
    {
        try {
            $loader = $this->twig->getLoader();
            
            // IMPORTANT: Ne pas utiliser prependPath() sur le namespace principal
            // pour éviter que les thèmes interfèrent avec l'admin
            
            if ($this->activeTheme) {
                $themeTemplatesPath = $this->themesDirectory . '/' . $this->activeTheme . '/templates';
                
                if (is_dir($themeTemplatesPath)) {
                    // Ajouter le thème UNIQUEMENT avec des namespaces spécifiques
                    $loader->addPath($themeTemplatesPath, 'theme');
                    $loader->addPath($themeTemplatesPath, '__theme__'); // Backward compatibility
                    
                    // Ajouter aussi des chemins spécifiques pour les types de templates
                    $frontendThemePath = $themeTemplatesPath . '/frontend';
                    if (is_dir($frontendThemePath)) {
                        $loader->addPath($frontendThemePath, 'theme_frontend');
                    }
                    
                    $this->templatePaths['theme'] = $themeTemplatesPath;
                    $this->logger->info("Thème configuré avec namespace isolé: {$themeTemplatesPath}");
                }
            }
            
            // Templates de base de l'application (restent prioritaires sur le namespace principal)
            if (is_dir($this->baseTemplatesDirectory)) {
                $this->templatePaths['base'] = $this->baseTemplatesDirectory;
                $this->logger->info("Templates de base prioritaires: {$this->baseTemplatesDirectory}");
            }
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la configuration des chemins de templates: " . $e->getMessage());
        }
    }

    /**
     * Efface les anciens chemins de thèmes
     */
    private function clearThemePaths(): void
    {
        try {
            $loader = $this->twig->getLoader();
            
            // Tenter de supprimer les anciens namespaces s'ils existent
            if (method_exists($loader, 'setPaths')) {
                $namespaces = ['__theme__', '__default_theme__'];
                
                foreach ($namespaces as $namespace) {
                    try {
                        // Réinitialiser les chemins du namespace à un tableau vide
                        $loader->setPaths([], $namespace);
                        $this->logger->debug("Namespace '{$namespace}' vidé");
                    } catch (\Exception $e) {
                        // Ignorer les erreurs de namespace inexistant
                        $this->logger->debug("Impossible de vider le namespace '{$namespace}': " . $e->getMessage());
                    }
                }
            }
        } catch (\Exception $e) {
            $this->logger->warning("Impossible d'effacer les anciens chemins: " . $e->getMessage());
        }
    }

    /**
     * Résout un template en cherchant dans l'ordre de priorité
     * SOLUTION: Gère les namespaces sans interférer avec l'admin
     */
    public function resolveTemplate(string $templateName): string
    {
        // IMPORTANT: Ne pas altérer les templates avec des namespaces spécifiques
        // comme admin/* ou security/* pour éviter l'interférence
        
        // Si le template commence par admin/, security/, ou autres namespaces critiques,
        // retourner tel quel pour que Twig utilise les templates par défaut
        $criticalNamespaces = ['admin/', 'security/', 'base.html.twig'];
        
        foreach ($criticalNamespaces as $namespace) {
            if (str_starts_with($templateName, $namespace) || $templateName === 'base.html.twig') {
                $this->logger->debug("Template critique, pas de résolution de thème: {$templateName}");
                return $templateName;
            }
        }
        
        // Pour les templates frontend, chercher dans le thème d'abord
        if (str_starts_with($templateName, 'frontend/')) {
            $searchPaths = [
                '@theme/' . $templateName,
                '@theme/' . str_replace('frontend/', '', $templateName),
                $templateName // Fallback vers les templates de base
            ];
        } else {
            // Pour les autres templates, utiliser l'ordre standard
            $searchPaths = [
                '@theme/' . $templateName,
                $templateName // Templates de base
            ];
        }

        foreach ($searchPaths as $templatePath) {
            try {
                // Vérifier si le template existe
                $this->twig->getLoader()->getSourceContext($templatePath);
                $this->logger->debug("Template résolu: {$templatePath}");
                return $templatePath;
            } catch (\Exception $e) {
                // Template non trouvé, continuer la recherche
                continue;
            }
        }

        // Si aucun template n'est trouvé, retourner le nom original
        // Twig lèvera une exception appropriée
        $this->logger->debug("Template utilisé par défaut: {$templateName}");
        return $templateName;
    }

    /**
     * Vérifie si un template existe dans le thème actif
     */
    public function templateExistsInTheme(string $templateName, ?string $themeName = null): bool
    {
        $theme = $themeName ?? $this->activeTheme;
        
        if (!$theme) {
            return false;
        }

        $templatePath = $this->themesDirectory . '/' . $theme . '/templates/' . $templateName;
        return file_exists($templatePath);
    }

    /**
     * Récupère la liste des templates disponibles dans le thème actif
     */
    public function getThemeTemplates(?string $themeName = null): array
    {
        $theme = $themeName ?? $this->activeTheme;
        $templates = [];
        
        if (!$theme) {
            return $templates;
        }

        $templatesPath = $this->themesDirectory . '/' . $theme . '/templates';
        
        if (!is_dir($templatesPath)) {
            return $templates;
        }

        try {
            $finder = new Finder();
            $finder->files()->in($templatesPath)->name('*.twig');

            foreach ($finder as $file) {
                $relativePath = $file->getRelativePathname();
                $templates[] = $relativePath;
            }

            sort($templates);
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la récupération des templates: " . $e->getMessage());
        }

        return $templates;
    }

    /**
     * Change le thème actif
     */
    public function setActiveTheme(string $themeName): bool
    {
        try {
            // Valider que le thème existe
            $themePath = $this->themesDirectory . '/' . $themeName;
            if (!is_dir($themePath)) {
                $this->logger->error("Thème non trouvé: {$themeName}");
                return false;
            }

            $templatesPath = $themePath . '/templates';
            if (!is_dir($templatesPath)) {
                $this->logger->error("Répertoire templates manquant pour le thème: {$themeName}");
                return false;
            }

            // Sauvegarder en base de données
            $this->settingRepository->setValue(
                self::ACTIVE_THEME_KEY,
                $themeName,
                'theme',
                'Thème actif de l\'application'
            );

            // Mettre à jour le thème en cours
            $this->activeTheme = $themeName;
            
            // Reconfigurer les chemins de templates
            $this->setupTemplatePaths();
            
            $this->logger->info("Thème actif changé vers: {$themeName}");
            return true;

        } catch (\Exception $e) {
            $this->logger->error("Erreur lors du changement de thème: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Retourne le thème actuellement actif
     */
    public function getActiveTheme(): string
    {
        return $this->activeTheme ?? self::DEFAULT_THEME;
    }

    /**
     * Retourne tous les chemins de templates configurés
     */
    public function getTemplatePaths(): array
    {
        return $this->templatePaths;
    }

    /**
     * Vérifie si un thème est disponible
     */
    public function isThemeAvailable(string $themeName): bool
    {
        $themePath = $this->themesDirectory . '/' . $themeName;
        $templatesPath = $themePath . '/templates';
        
        return is_dir($themePath) && is_dir($templatesPath);
    }

    /**
     * Récupère la liste des thèmes disponibles
     */
    public function getAvailableThemes(): array
    {
        $themes = [];
        
        if (!is_dir($this->themesDirectory)) {
            return $themes;
        }

        try {
            $finder = new Finder();
            $finder->directories()->in($this->themesDirectory)->depth(0);

            foreach ($finder as $themeDir) {
                $themeName = $themeDir->getBasename();
                $templatesPath = $themeDir->getRealPath() . '/templates';
                
                // Vérifier que le thème a un répertoire templates
                if (is_dir($templatesPath)) {
                    $themes[] = $themeName;
                }
            }

            sort($themes);
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la récupération des thèmes: " . $e->getMessage());
        }

        return $themes;
    }
}
