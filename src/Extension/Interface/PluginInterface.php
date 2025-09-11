<?php

namespace App\Extension\Interface;

use App\Extension\HookManager;

/**
 * Interface que doivent implémenter tous les plugins SymfPress
 */
interface PluginInterface
{
    /**
     * Charge le plugin et enregistre ses hooks
     * Cette méthode est appelée lors du chargement initial du plugin
     * 
     * @param HookManager $hookManager Gestionnaire des hooks
     */
    public function load(HookManager $hookManager): void;
    
    /**
     * Active le plugin
     * Cette méthode est appelée lorsque l'utilisateur active le plugin
     * Utilisée pour initialiser les données, créer des tables, etc.
     */
    public function activate(): void;
    
    /**
     * Désactive le plugin
     * Cette méthode est appelée lorsque l'utilisateur désactive le plugin
     * Utilisée pour nettoyer les données temporaires, désactiver les crons, etc.
     */
    public function deactivate(): void;
    
    /**
     * Désinstalle le plugin
     * Cette méthode est appelée lors de la suppression complète du plugin
     * Utilisée pour supprimer toutes les données, tables, fichiers, etc.
     */
    public function uninstall(): void;
    
    /**
     * Retourne les informations du plugin
     * 
     * @return array Métadonnées du plugin (nom, version, description, etc.)
     */
    public function getInfo(): array;
}
