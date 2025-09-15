<?php

/**
 * Script de test des corrections média
 * 
 * Vérifie que les corrections appliquées fonctionnent correctement
 * après résolution des conflits de merge.
 * 
 * @author Prudence ASSOGBA <jprud67@gmail.com>
 * @date 2025-09-14 12:53:42
 */

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Finder\Finder;

class MediaCorrectionsTest
{
    private array $errors = [];
    private array $warnings = [];
    private array $success = [];
    
    public function runTests(): void
    {
        echo "\n🔍 Test des corrections média - Symfpress\n";
        echo "==========================================\n\n";
        
        $this->testPostTypeQueryBuilder();
        $this->testPageTypeExists();
        $this->testMediaTemplates();
        $this->testMediaController();
        
        $this->displayResults();
    }
    
    private function testPostTypeQueryBuilder(): void
    {
        echo "📝 Test PostType.php - Query Builder...\n";
        
        $file = __DIR__ . '/src/Form/PostType.php';
        if (!file_exists($file)) {
            $this->errors[] = "PostType.php n'existe pas";
            return;
        }
        
        $content = file_get_contents($file);
        
        // Test 1: Vérifier mimeType au lieu de type
        if (strpos($content, "m.mimeType LIKE :type") !== false) {
            $this->success[] = "✅ PostType utilise bien 'm.mimeType'";
        } else {
            $this->errors[] = "❌ PostType n'utilise pas 'm.mimeType' - BUG NON CORRIGÉ";
        }
        
        // Test 2: Vérifier createdAt au lieu de uploadedAt
        if (strpos($content, "m.createdAt") !== false) {
            $this->success[] = "✅ PostType utilise bien 'm.createdAt'";
        } else {
            $this->errors[] = "❌ PostType n'utilise pas 'm.createdAt' - BUG NON CORRIGÉ";
        }
        
        // Test 3: Vérifier les attributs CSS
        if (strpos($content, "media-selector") !== false) {
            $this->success[] = "✅ PostType a les classes CSS améliorées";
        } else {
            $this->warnings[] = "⚠️  PostType pourrait manquer les classes CSS";
        }
    }
    
    private function testPageTypeExists(): void
    {
        echo "📄 Test PageType.php - Existence...\n";
        
        $file = __DIR__ . '/src/Form/PageType.php';
        if (file_exists($file)) {
            $this->success[] = "✅ PageType.php existe";
            
            $content = file_get_contents($file);
            if (strpos($content, "m.mimeType LIKE :type") !== false) {
                $this->success[] = "✅ PageType utilise la query correcte";
            } else {
                $this->errors[] = "❌ PageType a une query incorrecte";
            }
        } else {
            $this->errors[] = "❌ PageType.php manquant - fonctionnalité page incomplète";
        }
    }
    
    private function testMediaTemplates(): void
    {
        echo "🎨 Test Templates - Miniatures...\n";
        
        $templates = [
            'templates/admin/media/index.html.twig',
            'templates/admin/media/selector.html.twig',
            'templates/admin/posts/form.html.twig'
        ];
        
        foreach ($templates as $template) {
            $file = __DIR__ . '/' . $template;
            if (!file_exists($file)) {
                $this->errors[] = "❌ Template manquant: " . basename($template);
                continue;
            }
            
            $content = file_get_contents($file);
            
            // Test miniatures optimisées
            if (strpos($content, "admin_media_thumbnail") !== false) {
                $this->success[] = "✅ " . basename($template) . " utilise les miniatures";
            } else {
                $this->warnings[] = "⚠️  " . basename($template) . " n'utilise pas les miniatures";
            }
            
            // Test fallback d'images
            if (strpos($content, "onerror") !== false) {
                $this->success[] = "✅ " . basename($template) . " a le fallback d'erreur";
            } else {
                $this->warnings[] = "⚠️  " . basename($template) . " manque le fallback";
            }
        }
    }
    
    private function testMediaController(): void
    {
        echo "🎛️  Test MediaController.php - Gestion erreurs...\n";
        
        $file = __DIR__ . '/src/Controller/Admin/MediaController.php';
        if (!file_exists($file)) {
            $this->errors[] = "❌ MediaController.php manquant";
            return;
        }
        
        $content = file_get_contents($file);
        
        // Test gestion d'erreurs améliorée
        if (strpos($content, "try {") !== false && strpos($content, "catch") !== false) {
            $this->success[] = "✅ MediaController a la gestion d'erreurs";
        } else {
            $this->warnings[] = "⚠️  MediaController pourrait manquer la gestion d'erreurs";
        }
        
        // Test limites de dimensions
        if (strpos($content, "min(max(") !== false) {
            $this->success[] = "✅ MediaController valide les dimensions";
        } else {
            $this->warnings[] = "⚠️  MediaController pourrait manquer la validation des dimensions";
        }
    }
    
    private function displayResults(): void
    {
        echo "\n📊 RÉSULTATS DES TESTS\n";
        echo "=====================\n\n";
        
        if (!empty($this->success)) {
            echo "🎉 SUCCÈS (" . count($this->success) . "):";
            foreach ($this->success as $success) {
                echo "\n   $success";
            }
            echo "\n\n";
        }
        
        if (!empty($this->warnings)) {
            echo "⚠️  AVERTISSEMENTS (" . count($this->warnings) . "):";
            foreach ($this->warnings as $warning) {
                echo "\n   $warning";
            }
            echo "\n\n";
        }
        
        if (!empty($this->errors)) {
            echo "🚨 ERREURS CRITIQUES (" . count($this->errors) . "):";
            foreach ($this->errors as $error) {
                echo "\n   $error";
            }
            echo "\n\n";
            echo "❌ RÉSOLUTION REQUISE: Consultez RESOLUTION_CONFLITS_MEDIA.md\n";
        } else {
            echo "✅ TOUTES LES CORRECTIONS SONT PRÉSENTES!\n";
            echo "🚀 Les bugs média ont été correctement résolus.\n";
        }
        
        $totalTests = count($this->success) + count($this->warnings) + count($this->errors);
        echo "\n📈 Total: $totalTests tests effectués\n";
        echo "📅 Testé le: " . date('Y-m-d H:i:s') . "\n";
    }
}

// Exécution du test
if (php_sapi_name() === 'cli') {
    $test = new MediaCorrectionsTest();
    $test->runTests();
} else {
    echo "<pre>";
    $test = new MediaCorrectionsTest();
    $test->runTests();
    echo "</pre>";
}