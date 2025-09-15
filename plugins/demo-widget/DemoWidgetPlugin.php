<?php

namespace DemoWidgetPlugin;

use App\Extension\Interface\PluginInterface;
use App\Extension\HookManager;

/**
 * Plugin de démonstration pour SymfPress
 * Montre comment créer un plugin avec des hooks
 */
class DemoWidgetPlugin implements PluginInterface
{
    private HookManager $hookManager;
    
    public function load(HookManager $hookManager): void
    {
        $this->hookManager = $hookManager;
        
        // Ajouter des hooks pour le plugin
        $this->registerHooks();
    }
    
    public function activate(): void
    {
        // Actions à effectuer lors de l'activation
        // Par exemple : créer des tables, ajouter des données par défaut, etc.
        
        // Ici on pourrait ajouter des données d'exemple
        $this->createExampleData();
    }
    
    public function deactivate(): void
    {
        // Actions à effectuer lors de la désactivation
        // Par exemple : désactiver les crons, nettoyer les caches, etc.
        
        // Supprimer tous les hooks de ce plugin
        $this->hookManager->removePluginHooks(self::class);
    }
    
    public function uninstall(): void
    {
        // Actions à effectuer lors de la désinstallation
        // Par exemple : supprimer les tables, les données, etc.
        
        $this->removeAllData();
    }
    
    public function getInfo(): array
    {
        return [
            'name' => 'Widget de Démonstration',
            'description' => 'Plugin de démonstration qui ajoute un widget personnalisé',
            'version' => '1.0.0',
            'author' => 'SymfPress Team',
            'website' => 'https://symfpress.example.com'
        ];
    }
    
    /**
     * Enregistre les hooks du plugin
     */
    private function registerHooks(): void
    {
        // Hook pour ajouter du contenu dans la sidebar
        $this->hookManager->addFilter('sidebar_content', [$this, 'addSidebarWidget'], 10, 1);
        
        // Hook pour ajouter du CSS personnalisé
        $this->hookManager->addAction('head_content', [$this, 'addCustomCSS'], 10);
        
        // Hook pour modifier le titre des articles
        $this->hookManager->addFilter('post_title', [$this, 'modifyPostTitle'], 10, 1);
        
        // Hook pour ajouter du contenu après chaque article
        $this->hookManager->addAction('after_post_content', [$this, 'addPostFooter'], 10, 1);
    }
    
    /**
     * Ajoute un widget dans la sidebar
     */
    public function addSidebarWidget(string $content): string
    {
        $widget = '
        <div class="widget demo-widget">
            <h3>🚀 Widget de Démonstration</h3>
            <div class="widget-content">
                <p>Ce widget a été ajouté par le plugin de démonstration !</p>
                <ul>
                    <li>✅ Plugin chargé avec succès</li>
                    <li>✅ Hooks fonctionnels</li>
                    <li>✅ Architecture extensible</li>
                </ul>
                <p><small>Plugin v1.0.0 par SymfPress Team</small></p>
            </div>
        </div>';
        
        return $content . $widget;
    }
    
    /**
     * Ajoute du CSS personnalisé
     */
    public function addCustomCSS(): void
    {
        echo '
        <style>
        .demo-widget {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .demo-widget h3 {
            margin-top: 0;
            color: #fff;
            font-size: 1.2em;
        }
        .demo-widget ul {
            list-style: none;
            padding-left: 0;
        }
        .demo-widget li {
            padding: 5px 0;
        }
        .demo-widget small {
            opacity: 0.8;
        }
        </style>';
    }
    
    /**
     * Modifie le titre des articles
     */
    public function modifyPostTitle(string $title): string
    {
        // Ajouter un emoji au début du titre
        return '📝 ' . $title;
    }
    
    /**
     * Ajoute du contenu après chaque article
     */
    public function addPostFooter($post): void
    {
        echo '
        <div class="demo-plugin-footer" style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-left: 4px solid #667eea; border-radius: 5px;">
            <p><strong>💡 Cet article a été enrichi par le plugin de démonstration !</strong></p>
            <p style="margin: 0; font-size: 0.9em; color: #666;">
                Ce message démontre comment un plugin peut ajouter du contenu après chaque article grâce au système de hooks de SymfPress.
            </p>
        </div>';
    }
    
    /**
     * Crée des données d'exemple lors de l'activation
     */
    private function createExampleData(): void
    {
        // Ici on pourrait ajouter des données en base
        // Par exemple : options du plugin, contenu par défaut, etc.
        
        // Pour la démonstration, on simule juste la création
        error_log("Plugin Demo Widget : Données d'exemple créées");
    }
    
    /**
     * Supprime toutes les données lors de la désinstallation
     */
    private function removeAllData(): void
    {
        // Ici on supprimerait les données du plugin
        // Par exemple : tables, options, fichiers, etc.
        
        // Pour la démonstration, on simule juste la suppression
        error_log("Plugin Demo Widget : Toutes les données supprimées");
    }
}
