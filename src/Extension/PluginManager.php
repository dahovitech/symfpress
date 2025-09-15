<?php

namespace App\Extension;

use App\Extension\Event\PluginEvent;
use App\Extension\Interface\PluginInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Psr\Log\LoggerInterface;

/**
 * Gestionnaire principal des plugins SymfPress
 * Inspiré de WordPress mais adapté à Symfony
 */
class PluginManager
{
    private array $loadedPlugins = [];
    private array $activePlugins = [];
    private array $pluginMetadata = [];
    private string $pluginsDirectory;
    
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private HookManager $hookManager,
        private LoggerInterface $logger,
        string $projectDir
    ) {
        $this->pluginsDirectory = $projectDir . '/plugins';
        $this->ensurePluginsDirectory();
    }
    
    /**
     * Charge tous les plugins disponibles
     */
    public function loadPlugins(): void
    {
        if (!is_dir($this->pluginsDirectory)) {
            return;
        }
        
        $finder = new Finder();
        $finder->directories()->in($this->pluginsDirectory)->depth(0);
        
        foreach ($finder as $pluginDir) {
            $pluginName = $pluginDir->getBasename();
            $this->loadPlugin($pluginName);
        }
    }
    
    /**
     * Charge un plugin spécifique
     */
    public function loadPlugin(string $pluginName): bool
    {
        try {
            $pluginPath = $this->pluginsDirectory . '/' . $pluginName;
            $configPath = $pluginPath . '/plugin.yaml';
            
            if (!file_exists($configPath)) {
                $this->logger->warning("Configuration manquante pour le plugin {$pluginName}");
                return false;
            }
            
            $config = Yaml::parseFile($configPath);
            $this->pluginMetadata[$pluginName] = $config;
            
            // Vérifier les dépendances
            if (!$this->checkDependencies($config)) {
                $this->logger->error("Dépendances non satisfaites pour le plugin {$pluginName}");
                return false;
            }
            
            // Charger la classe principale du plugin
            $mainClass = $config['main_class'] ?? null;
            if ($mainClass && class_exists($mainClass)) {
                $plugin = new $mainClass();
                
                if ($plugin instanceof PluginInterface) {
                    $this->loadedPlugins[$pluginName] = $plugin;
                    $plugin->load($this->hookManager);
                    
                    $this->logger->info("Plugin {$pluginName} chargé avec succès");
                    return true;
                }
            }
            
            $this->logger->error("Impossible de charger la classe principale du plugin {$pluginName}");
            return false;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors du chargement du plugin {$pluginName}: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Active un plugin
     */
    public function activatePlugin(string $pluginName): bool
    {
        if (!isset($this->loadedPlugins[$pluginName])) {
            if (!$this->loadPlugin($pluginName)) {
                return false;
            }
        }
        
        $plugin = $this->loadedPlugins[$pluginName];
        
        try {
            $plugin->activate();
            $this->activePlugins[$pluginName] = $plugin;
            
            // Déclencher l'événement d'activation
            $event = new PluginEvent($pluginName, $plugin);
            $this->eventDispatcher->dispatch($event, 'plugin.activated');
            
            $this->logger->info("Plugin {$pluginName} activé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de l'activation du plugin {$pluginName}: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Désactive un plugin
     */
    public function deactivatePlugin(string $pluginName): bool
    {
        if (!isset($this->activePlugins[$pluginName])) {
            return false;
        }
        
        $plugin = $this->activePlugins[$pluginName];
        
        try {
            $plugin->deactivate();
            unset($this->activePlugins[$pluginName]);
            
            // Déclencher l'événement de désactivation
            $event = new PluginEvent($pluginName, $plugin);
            $this->eventDispatcher->dispatch($event, 'plugin.deactivated');
            
            $this->logger->info("Plugin {$pluginName} désactivé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la désactivation du plugin {$pluginName}: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Désinstalle un plugin
     */
    public function uninstallPlugin(string $pluginName): bool
    {
        if (isset($this->activePlugins[$pluginName])) {
            $this->deactivatePlugin($pluginName);
        }
        
        if (!isset($this->loadedPlugins[$pluginName])) {
            return false;
        }
        
        $plugin = $this->loadedPlugins[$pluginName];
        
        try {
            $plugin->uninstall();
            unset($this->loadedPlugins[$pluginName]);
            unset($this->pluginMetadata[$pluginName]);
            
            // Déclencher l'événement de désinstallation
            $event = new PluginEvent($pluginName, $plugin);
            $this->eventDispatcher->dispatch($event, 'plugin.uninstalled');
            
            $this->logger->info("Plugin {$pluginName} désinstallé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la désinstallation du plugin {$pluginName}: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Retourne tous les plugins chargés
     */
    public function getLoadedPlugins(): array
    {
        return $this->loadedPlugins;
    }
    
    /**
     * Retourne tous les plugins actifs
     */
    public function getActivePlugins(): array
    {
        return $this->activePlugins;
    }
    
    /**
     * Retourne les métadonnées d'un plugin
     */
    public function getPluginMetadata(string $pluginName): ?array
    {
        return $this->pluginMetadata[$pluginName] ?? null;
    }
    
    /**
     * Vérifie si un plugin est actif
     */
    public function isPluginActive(string $pluginName): bool
    {
        return isset($this->activePlugins[$pluginName]);
    }
    
    /**
     * Vérifier les dépendances d'un plugin
     */
    private function checkDependencies(array $config): bool
    {
        $dependencies = $config['dependencies'] ?? [];
        
        foreach ($dependencies as $dependency => $version) {
            // Vérifier les dépendances Symfony
            if ($dependency === 'symfony') {
                // Vérification basique de la version Symfony
                continue;
            }
            
            // Vérifier les plugins dépendants
            if (strpos($dependency, 'plugin:') === 0) {
                $requiredPlugin = substr($dependency, 7);
                if (!$this->isPluginActive($requiredPlugin)) {
                    return false;
                }
            }
        }
        
        return true;
    }
    
    /**
     * Assure que le répertoire des plugins existe
     */
    private function ensurePluginsDirectory(): void
    {
        if (!is_dir($this->pluginsDirectory)) {
            mkdir($this->pluginsDirectory, 0755, true);
        }
    }
    
    /**
     * Installe un plugin depuis un fichier ZIP
     */
    public function installPluginFromZip(string $zipPath): bool
    {
        try {
            $zip = new \ZipArchive();
            $result = $zip->open($zipPath);
            
            if ($result !== TRUE) {
                throw new \Exception("Impossible d'ouvrir le fichier ZIP");
            }
            
            // Extraire le nom du plugin depuis le premier répertoire
            $pluginName = null;
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                if (strpos($filename, '/') !== false) {
                    $pluginName = explode('/', $filename)[0];
                    break;
                }
            }
            
            if (!$pluginName) {
                throw new \Exception("Structure du plugin invalide");
            }
            
            $targetPath = $this->pluginsDirectory . '/' . $pluginName;
            
            if (is_dir($targetPath)) {
                throw new \Exception("Le plugin {$pluginName} existe déjà");
            }
            
            $zip->extractTo($this->pluginsDirectory);
            $zip->close();
            
            $this->logger->info("Plugin {$pluginName} installé avec succès");
            return true;
            
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de l'installation du plugin: " . $e->getMessage());
            return false;
        }
    }
}
