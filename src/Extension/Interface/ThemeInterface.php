<?php

namespace App\Extension\Interface;

/**
 * Interface optionnelle que peuvent implémenter les thèmes SymfPress
 * pour des fonctionnalités avancées
 */
interface ThemeInterface
{
    /**
     * Initialise le thème
     * Appelé lors de l'activation du thème
     */
    public function initialize(): void;
    
    /**
     * Configure le thème
     * Permet de définir les options et paramètres du thème
     */
    public function configure(): array;
    
    /**
     * Nettoie le thème
     * Appelé lors de la désactivation du thème
     */
    public function cleanup(): void;
    
    /**
     * Retourne les zones de widgets supportées par le thème
     */
    public function getSupportedWidgetAreas(): array;
    
    /**
     * Retourne les fonctionnalités supportées par le thème
     */
    public function getSupportedFeatures(): array;
}
