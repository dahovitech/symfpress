<?php

/**
 * Script de test pour diagnostiquer les problèmes de gestion des langues dans l'admin
 */

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

// Configuration de la base de données
$host = $_ENV['DATABASE_HOST'] ?? 'localhost';
$port = $_ENV['DATABASE_PORT'] ?? '3306';
$dbname = $_ENV['DATABASE_NAME'] ?? 'symfpress';
$user = $_ENV['DATABASE_USER'] ?? 'root';
$password = $_ENV['DATABASE_PASSWORD'] ?? '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== DIAGNOSTIC DU SYSTÈME MULTILINGUE ===\n\n";
    
    // Vérifier si la table language existe
    $stmt = $pdo->query("SHOW TABLES LIKE 'language'");
    if ($stmt->rowCount() == 0) {
        echo "❌ ERREUR: La table 'language' n'existe pas!\n";
        echo "   Vous devez exécuter les migrations: php bin/console doctrine:migrations:migrate\n\n";
        exit(1);
    }
    
    echo "✅ Table 'language' trouvée\n\n";
    
    // Vérifier les langues existantes
    $stmt = $pdo->query("SELECT * FROM language ORDER BY isDefault DESC, name ASC");
    $languages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($languages)) {
        echo "❌ PROBLÈME: Aucune langue configurée dans la base de données!\n";
        echo "   Solutions:\n";
        echo "   1. Ajoutez manuellement une langue par défaut:\n";
        echo "      INSERT INTO language (code, name, isDefault, isActive) VALUES ('fr', 'Français', 1, 1);\n";
        echo "   2. Ou utilisez les fixtures: php bin/console doctrine:fixtures:load\n\n";
        
        // Créer automatiquement la langue française par défaut
        try {
            $stmt = $pdo->prepare("INSERT INTO language (code, name, isDefault, isActive) VALUES ('fr', 'Français', 1, 1)");
            $stmt->execute();
            echo "✅ Langue française créée automatiquement comme langue par défaut\n\n";
            
            // Relire les langues
            $stmt = $pdo->query("SELECT * FROM language ORDER BY isDefault DESC, name ASC");
            $languages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "❌ Impossible de créer la langue par défaut: " . $e->getMessage() . "\n\n";
            exit(1);
        }
    }
    
    echo "📊 LANGUES CONFIGURÉES:\n";
    foreach ($languages as $language) {
        $status = [];
        if ($language['isDefault']) $status[] = 'Défaut';
        if ($language['isActive']) $status[] = 'Active';
        else $status[] = 'Inactive';
        
        echo sprintf("   - %s (%s): %s\n", 
            $language['name'], 
            $language['code'], 
            implode(', ', $status)
        );
    }
    echo "\n";
    
    // Vérifier les utilisateurs admin
    $stmt = $pdo->query("SELECT * FROM user WHERE JSON_CONTAINS(roles, '\"ROLE_ADMIN\"')");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($admins)) {
        echo "❌ PROBLÈME: Aucun utilisateur avec le rôle ROLE_ADMIN!\n";
        echo "   Le lien 'Langues' ne sera pas visible dans le menu admin.\n";
        echo "   Solutions:\n";
        echo "   1. Ajoutez le rôle ROLE_ADMIN à un utilisateur existant\n";
        echo "   2. Créez un utilisateur admin via: php bin/console app:create-admin\n\n";
    } else {
        echo "✅ Utilisateurs ADMIN trouvés:\n";
        foreach ($admins as $admin) {
            echo "   - " . $admin['email'] . "\n";
        }
        echo "\n";
    }
    
    // Vérifier les routes
    echo "🔍 ROUTES D'ADMINISTRATION DES LANGUES:\n";
    $routes = [
        'admin_languages_index' => '/admin/languages/',
        'admin_languages_new' => '/admin/languages/new',
        'admin_languages_edit' => '/admin/languages/{id}/edit',
        'admin_languages_delete' => '/admin/languages/{id}/delete',
    ];
    
    foreach ($routes as $name => $path) {
        echo "   - $name: $path\n";
    }
    echo "\n";
    
    // Vérifier les templates
    echo "📁 TEMPLATES REQUIS:\n";
    $templates = [
        'templates/admin/languages/index.html.twig',
        'templates/admin/languages/form.html.twig'
    ];
    
    foreach ($templates as $template) {
        if (file_exists(__DIR__ . '/' . $template)) {
            echo "   ✅ $template\n";
        } else {
            echo "   ❌ $template (MANQUANT)\n";
        }
    }
    echo "\n";
    
    echo "=== DIAGNOSTIC TERMINÉ ===\n";
    echo "Si le lien 'Langues' n'est toujours pas accessible, vérifiez:\n";
    echo "1. Que vous êtes connecté avec un utilisateur ayant ROLE_ADMIN\n";
    echo "2. Que les routes sont bien chargées (cache:clear si nécessaire)\n";
    echo "3. Que les templates existent bien\n\n";
    
} catch (PDOException $e) {
    echo "❌ ERREUR DE CONNEXION À LA BASE DE DONNÉES:\n";
    echo "   " . $e->getMessage() . "\n\n";
    echo "Vérifiez votre configuration dans le fichier .env\n";
    exit(1);
}
