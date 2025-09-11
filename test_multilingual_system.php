<?php

/**
 * Script de test pour vérifier le fonctionnement du système multilingue
 */

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

// Configuration de la base de données SQLite
$connectionParams = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/var/data.db',
];

try {
    $connection = DriverManager::getConnection($connectionParams);
    
    echo "=== TEST DU SYSTÈME MULTILINGUE ===\n\n";
    
    // 1. Vérifier les langues
    echo "1. LANGUES DISPONIBLES:\n";
    $languages = $connection->fetchAllAssociative("SELECT * FROM language ORDER BY is_default DESC, name ASC");
    foreach ($languages as $language) {
        $status = [];
        if ($language['is_default']) $status[] = 'Défaut';
        if ($language['is_active']) $status[] = 'Active';
        else $status[] = 'Inactive';
        
        echo sprintf("   - %s (%s): %s\n", 
            $language['name'], 
            $language['code'], 
            implode(', ', $status)
        );
    }
    echo "\n";
    
    // 2. Vérifier les articles avec traductions
    echo "2. ARTICLES AVEC TRADUCTIONS:\n";
    $posts = $connection->fetchAllAssociative("
        SELECT p.id, p.slug, p.status, COUNT(pt.id) as translation_count
        FROM post p 
        LEFT JOIN post_translation pt ON p.id = pt.post_id 
        GROUP BY p.id, p.slug, p.status
        ORDER BY p.id DESC
        LIMIT 10
    ");
    
    if (empty($posts)) {
        echo "   Aucun article trouvé.\n";
    } else {
        foreach ($posts as $post) {
            echo sprintf("   - Post #%d (%s): %s - %d traduction(s)\n", 
                $post['id'], 
                $post['slug'], 
                $post['status'],
                $post['translation_count']
            );
        }
    }
    echo "\n";
    
    // 3. Vérifier les traductions d'articles
    echo "3. DÉTAIL DES TRADUCTIONS D'ARTICLES:\n";
    $translations = $connection->fetchAllAssociative("
        SELECT pt.id, pt.post_id, pt.title, l.name as language_name, l.code
        FROM post_translation pt 
        JOIN language l ON pt.language_id = l.id
        ORDER BY pt.post_id, l.is_default DESC
        LIMIT 20
    ");
    
    if (empty($translations)) {
        echo "   Aucune traduction trouvée.\n";
    } else {
        $currentPostId = null;
        foreach ($translations as $translation) {
            if ($translation['post_id'] !== $currentPostId) {
                echo sprintf("\n   Post #%d:\n", $translation['post_id']);
                $currentPostId = $translation['post_id'];
            }
            echo sprintf("     - [%s] %s\n", 
                $translation['code'], 
                $translation['title'] ?: '(sans titre)'
            );
        }
    }
    echo "\n";
    
    // 4. Vérifier la configuration des utilisateurs admin
    echo "4. UTILISATEURS ADMIN:\n";
    $admins = $connection->fetchAllAssociative("
        SELECT id, email, roles 
        FROM user 
        WHERE roles LIKE '%ROLE_ADMIN%'
    ");
    
    if (empty($admins)) {
        echo "   ❌ PROBLÈME: Aucun utilisateur ADMIN trouvé!\n";
    } else {
        foreach ($admins as $admin) {
            echo sprintf("   - %s (ID: %d)\n", $admin['email'], $admin['id']);
        }
    }
    echo "\n";
    
    // 5. Test des routes importantes
    echo "5. ROUTES CRITIQUES À TESTER:\n";
    echo "   Administration des langues:\n";
    echo "     - http://localhost:8000/admin/languages/\n";
    echo "     - http://localhost:8000/admin/languages/new\n";
    echo "   \n";
    echo "   Administration des articles:\n";
    echo "     - http://localhost:8000/admin/posts/\n";
    echo "     - http://localhost:8000/admin/posts/new\n";
    echo "\n";
    
    // 6. Conseils de débogage
    echo "6. CONSEILS DE DÉBOGAGE:\n";
    echo "   - Connectez-vous avec: admin@symfpress.local\n";
    echo "   - Vérifiez le cache Symfony: php bin/console cache:clear\n";
    echo "   - Activez le mode debug si nécessaire\n";
    echo "   - Consultez les logs: var/log/dev.log\n";
    echo "\n";
    
    echo "=== TEST TERMINÉ ===\n";
    
} catch (Exception $e) {
    echo "❌ ERREUR: " . $e->getMessage() . "\n";
    exit(1);
}
