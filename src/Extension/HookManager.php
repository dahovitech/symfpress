<?php

namespace App\Extension;

use Psr\Log\LoggerInterface;

/**
 * Gestionnaire des hooks SymfPress
 * Système de hooks similaire à WordPress mais optimisé pour Symfony
 */
class HookManager
{
    private array $filters = [];
    private array $actions = [];
    
    public function __construct(
        private LoggerInterface $logger
    ) {}
    
    /**
     * Ajoute un filtre (équivalent add_filter de WordPress)
     * 
     * @param string $hookName Nom du hook
     * @param callable $callback Fonction à exécuter
     * @param int $priority Priorité (plus petit = plus prioritaire)
     * @param int $acceptedArgs Nombre d'arguments acceptés
     */
    public function addFilter(string $hookName, callable $callback, int $priority = 10, int $acceptedArgs = 1): void
    {
        if (!isset($this->filters[$hookName])) {
            $this->filters[$hookName] = [];
        }
        
        if (!isset($this->filters[$hookName][$priority])) {
            $this->filters[$hookName][$priority] = [];
        }
        
        $this->filters[$hookName][$priority][] = [
            'callback' => $callback,
            'accepted_args' => $acceptedArgs
        ];
        
        // Trier par priorité
        ksort($this->filters[$hookName]);
        
        $this->logger->debug("Filtre ajouté pour le hook '{$hookName}' avec priorité {$priority}");
    }
    
    /**
     * Applique les filtres (équivalent apply_filters de WordPress)
     * 
     * @param string $hookName Nom du hook
     * @param mixed $value Valeur à filtrer
     * @param mixed ...$args Arguments supplémentaires
     * @return mixed Valeur filtrée
     */
    public function applyFilters(string $hookName, mixed $value, mixed ...$args): mixed
    {
        if (!isset($this->filters[$hookName])) {
            return $value;
        }
        
        $allArgs = array_merge([$value], $args);
        
        foreach ($this->filters[$hookName] as $priority => $callbacks) {
            foreach ($callbacks as $callbackData) {
                $callback = $callbackData['callback'];
                $acceptedArgs = $callbackData['accepted_args'];
                
                try {
                    $filteredArgs = array_slice($allArgs, 0, $acceptedArgs);
                    $value = call_user_func_array($callback, $filteredArgs);
                    $allArgs[0] = $value; // Mettre à jour la valeur filtrée
                } catch (\Exception $e) {
                    $this->logger->error("Erreur dans le filtre '{$hookName}': " . $e->getMessage());
                }
            }
        }
        
        return $value;
    }
    
    /**
     * Ajoute une action (équivalent add_action de WordPress)
     * 
     * @param string $hookName Nom du hook
     * @param callable $callback Fonction à exécuter
     * @param int $priority Priorité
     * @param int $acceptedArgs Nombre d'arguments acceptés
     */
    public function addAction(string $hookName, callable $callback, int $priority = 10, int $acceptedArgs = 1): void
    {
        if (!isset($this->actions[$hookName])) {
            $this->actions[$hookName] = [];
        }
        
        if (!isset($this->actions[$hookName][$priority])) {
            $this->actions[$hookName][$priority] = [];
        }
        
        $this->actions[$hookName][$priority][] = [
            'callback' => $callback,
            'accepted_args' => $acceptedArgs
        ];
        
        // Trier par priorité
        ksort($this->actions[$hookName]);
        
        $this->logger->debug("Action ajoutée pour le hook '{$hookName}' avec priorité {$priority}");
    }
    
    /**
     * Exécute les actions (équivalent do_action de WordPress)
     * 
     * @param string $hookName Nom du hook
     * @param mixed ...$args Arguments à passer
     */
    public function doAction(string $hookName, mixed ...$args): void
    {
        if (!isset($this->actions[$hookName])) {
            return;
        }
        
        foreach ($this->actions[$hookName] as $priority => $callbacks) {
            foreach ($callbacks as $callbackData) {
                $callback = $callbackData['callback'];
                $acceptedArgs = $callbackData['accepted_args'];
                
                try {
                    $filteredArgs = array_slice($args, 0, $acceptedArgs);
                    call_user_func_array($callback, $filteredArgs);
                } catch (\Exception $e) {
                    $this->logger->error("Erreur dans l'action '{$hookName}': " . $e->getMessage());
                }
            }
        }
    }
    
    /**
     * Supprime un filtre
     * 
     * @param string $hookName Nom du hook
     * @param callable $callback Callback à supprimer
     * @param int $priority Priorité
     */
    public function removeFilter(string $hookName, callable $callback, int $priority = 10): bool
    {
        if (!isset($this->filters[$hookName][$priority])) {
            return false;
        }
        
        foreach ($this->filters[$hookName][$priority] as $key => $callbackData) {
            if ($callbackData['callback'] === $callback) {
                unset($this->filters[$hookName][$priority][$key]);
                
                // Nettoyer les arrays vides
                if (empty($this->filters[$hookName][$priority])) {
                    unset($this->filters[$hookName][$priority]);
                }
                if (empty($this->filters[$hookName])) {
                    unset($this->filters[$hookName]);
                }
                
                $this->logger->debug("Filtre supprimé pour le hook '{$hookName}'");
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Supprime une action
     * 
     * @param string $hookName Nom du hook
     * @param callable $callback Callback à supprimer
     * @param int $priority Priorité
     */
    public function removeAction(string $hookName, callable $callback, int $priority = 10): bool
    {
        if (!isset($this->actions[$hookName][$priority])) {
            return false;
        }
        
        foreach ($this->actions[$hookName][$priority] as $key => $callbackData) {
            if ($callbackData['callback'] === $callback) {
                unset($this->actions[$hookName][$priority][$key]);
                
                // Nettoyer les arrays vides
                if (empty($this->actions[$hookName][$priority])) {
                    unset($this->actions[$hookName][$priority]);
                }
                if (empty($this->actions[$hookName])) {
                    unset($this->actions[$hookName]);
                }
                
                $this->logger->debug("Action supprimée pour le hook '{$hookName}'");
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Vérifie si un hook a des callbacks attachés
     */
    public function hasFilter(string $hookName): bool
    {
        return isset($this->filters[$hookName]) && !empty($this->filters[$hookName]);
    }
    
    /**
     * Vérifie si un hook a des actions attachées
     */
    public function hasAction(string $hookName): bool
    {
        return isset($this->actions[$hookName]) && !empty($this->actions[$hookName]);
    }
    
    /**
     * Retourne tous les hooks de filtres enregistrés
     */
    public function getRegisteredFilters(): array
    {
        return array_keys($this->filters);
    }
    
    /**
     * Retourne toutes les actions enregistrées
     */
    public function getRegisteredActions(): array
    {
        return array_keys($this->actions);
    }
    
    /**
     * Supprime tous les hooks d'un plugin spécifique
     * Utile lors de la désactivation d'un plugin
     */
    public function removePluginHooks(string $pluginClass): void
    {
        // Parcourir tous les filtres
        foreach ($this->filters as $hookName => $priorities) {
            foreach ($priorities as $priority => $callbacks) {
                foreach ($callbacks as $key => $callbackData) {
                    if (is_array($callbackData['callback']) && 
                        is_object($callbackData['callback'][0]) && 
                        get_class($callbackData['callback'][0]) === $pluginClass) {
                        unset($this->filters[$hookName][$priority][$key]);
                    }
                }
                
                // Nettoyer les arrays vides
                if (empty($this->filters[$hookName][$priority])) {
                    unset($this->filters[$hookName][$priority]);
                }
            }
            
            if (empty($this->filters[$hookName])) {
                unset($this->filters[$hookName]);
            }
        }
        
        // Parcourir toutes les actions
        foreach ($this->actions as $hookName => $priorities) {
            foreach ($priorities as $priority => $callbacks) {
                foreach ($callbacks as $key => $callbackData) {
                    if (is_array($callbackData['callback']) && 
                        is_object($callbackData['callback'][0]) && 
                        get_class($callbackData['callback'][0]) === $pluginClass) {
                        unset($this->actions[$hookName][$priority][$key]);
                    }
                }
                
                // Nettoyer les arrays vides
                if (empty($this->actions[$hookName][$priority])) {
                    unset($this->actions[$hookName][$priority]);
                }
            }
            
            if (empty($this->actions[$hookName])) {
                unset($this->actions[$hookName]);
            }
        }
        
        $this->logger->info("Hooks du plugin '{$pluginClass}' supprimés");
    }
}
