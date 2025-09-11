<?php

/**
 * Script de test pour le système d'extensibilité SymfPress
 * Teste les plugins, thèmes et hooks
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Extension\HookManager;
use App\Extension\PluginManager;
use App\Extension\ThemeManager;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Psr\Log\NullLogger;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

echo "🚀 Test du Système d'Extensibilité SymfPress\n";
echo "=" . str_repeat("=", 50) . "\n\n";

// 1. Test du HookManager
echo "📋 1. Test du HookManager\n";
echo "-" . str_repeat("-", 30) . "\n";

$logger = new NullLogger();
$hookManager = new HookManager($logger);

// Test des filtres
$hookManager->addFilter('test_filter', function($value) {
    return $value . ' [modifié par filtre]';
}, 10, 1);

$result = $hookManager->applyFilters('test_filter', 'Texte original');
echo "✅ Filtre appliqué : $result\n";

// Test des actions
$actionExecuted = false;
$hookManager->addAction('test_action', function() use (&$actionExecuted) {
    $actionExecuted = true;
}, 10, 0);

$hookManager->doAction('test_action');
echo "✅ Action exécutée : " . ($actionExecuted ? 'OUI' : 'NON') . "\n";

// Test des priorités
$hookManager->addFilter('priority_test', function($value) {
    return $value . ' [priorité 5]';
}, 5, 1);

$hookManager->addFilter('priority_test', function($value) {
    return $value . ' [priorité 15]';
}, 15, 1);

$priorityResult = $hookManager->applyFilters('priority_test', 'Test');
echo "✅ Priorités respectées : $priorityResult\n";

echo "\n";

// 2. Test du PluginManager
echo "🔌 2. Test du PluginManager\n";
echo "-" . str_repeat("-", 30) . "\n";

$eventDispatcher = new EventDispatcher();
$pluginManager = new PluginManager($eventDispatcher, $hookManager, $logger, __DIR__);

// Vérifier les répertoires
$pluginsDir = __DIR__ . '/plugins';
if (is_dir($pluginsDir)) {
    echo "✅ Répertoire plugins existant : $pluginsDir\n";
    
    $finder = new \Symfony\Component\Finder\Finder();
    $finder->directories()->in($pluginsDir)->depth(0);
    
    foreach ($finder as $pluginDir) {
        $pluginName = $pluginDir->getBasename();
        echo "📦 Plugin découvert : $pluginName\n";
        
        $configPath = $pluginDir->getRealPath() . '/plugin.yaml';
        if (file_exists($configPath)) {
            echo "   ✅ Configuration trouvée\n";
            
            $config = \Symfony\Component\Yaml\Yaml::parseFile($configPath);
            echo "   📝 Nom : " . ($config['name'] ?? 'Non défini') . "\n";
            echo "   📝 Version : " . ($config['version'] ?? 'Non définie') . "\n";
        } else {
            echo "   ❌ Configuration manquante\n";
        }
    }
    
    // Charger les plugins
    $pluginManager->loadPlugins();
    $loadedPlugins = $pluginManager->getLoadedPlugins();
    echo "✅ Plugins chargés : " . count($loadedPlugins) . "\n";
    
    foreach ($loadedPlugins as $name => $plugin) {
        echo "   🔌 $name : " . get_class($plugin) . "\n";
    }
    
} else {
    echo "❌ Répertoire plugins non trouvé : $pluginsDir\n";
}

echo "\n";

// 3. Test du ThemeManager
echo "🎨 3. Test du ThemeManager\n";
echo "-" . str_repeat("-", 30) . "\n";

$twig = new Environment(new ArrayLoader([]));
$themeManager = new ThemeManager($eventDispatcher, $logger, $twig, __DIR__);

// Vérifier les répertoires
$themesDir = __DIR__ . '/themes';
if (is_dir($themesDir)) {
    echo "✅ Répertoire themes existant : $themesDir\n";
    
    $themeManager->discoverThemes();
    $availableThemes = $themeManager->getAvailableThemes();
    
    echo "✅ Thèmes découverts : " . count($availableThemes) . "\n";
    
    foreach ($availableThemes as $name => $path) {
        echo "   🎨 $name : $path\n";
        
        $metadata = $themeManager->getThemeMetadata($name);
        if ($metadata) {
            echo "      📝 Nom : " . ($metadata['name'] ?? 'Non défini') . "\n";
            echo "      📝 Version : " . ($metadata['version'] ?? 'Non définie') . "\n";
            echo "      📝 Auteur : " . ($metadata['author'] ?? 'Non défini') . "\n";
        }
    }
    
} else {
    echo "❌ Répertoire themes non trouvé : $themesDir\n";
}

echo "\n";

// 4. Test d'intégration
echo "🔗 4. Test d'Intégration\n";
echo "-" . str_repeat("-", 30) . "\n";

// Test de la chaîne complète : Plugin -> Hook -> Filtre
if (!empty($loadedPlugins)) {
    echo "🧪 Test de la chaîne plugin -> hook -> filtre...\n";
    
    // Simuler un contenu de sidebar
    $sidebarContent = '<div>Contenu original</div>';
    $filteredContent = $hookManager->applyFilters('sidebar_content', $sidebarContent);
    
    if ($filteredContent !== $sidebarContent) {
        echo "✅ Plugin a modifié le contenu via les hooks\n";
        echo "   📤 Original : " . strlen($sidebarContent) . " caractères\n";
        echo "   📥 Modifié : " . strlen($filteredContent) . " caractères\n";
    } else {
        echo "⚠️  Aucune modification détectée (normal si aucun plugin actif)\n";
    }
    
    // Test des hooks d'action
    echo "🧪 Test des hooks d'action...\n";
    $hookManager->doAction('head_content');
    echo "✅ Hook d'action 'head_content' exécuté\n";
    
} else {
    echo "⚠️  Aucun plugin chargé pour tester l'intégration\n";
}

echo "\n";

// 5. Résumé
echo "📊 5. Résumé des Tests\n";
echo "-" . str_repeat("-", 30) . "\n";

$hooksCount = count($hookManager->getRegisteredFilters()) + count($hookManager->getRegisteredActions());
$pluginsCount = count($loadedPlugins ?? []);
$themesCount = count($availableThemes ?? []);

echo "🎯 Hooks enregistrés : $hooksCount\n";
echo "🔌 Plugins détectés : $pluginsCount\n";
echo "🎨 Thèmes détectés : $themesCount\n";

echo "\n";

if ($hooksCount > 0 && $pluginsCount > 0 && $themesCount > 0) {
    echo "🎉 SUCCÈS : Le système d'extensibilité SymfPress est opérationnel !\n";
    echo "✨ Tous les composants sont fonctionnels et prêts à l'utilisation.\n";
} else {
    echo "⚠️  ATTENTION : Certains composants ne sont pas complètement configurés.\n";
    echo "💡 Vérifiez que les répertoires plugins/ et themes/ contiennent du contenu.\n";
}

echo "\n";
echo "🏁 Test terminé !\n";
echo "=" . str_repeat("=", 50) . "\n";
