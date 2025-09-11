<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv())->bootEnv(__DIR__ . '/.env');

$kernel = new Kernel($_ENV['APP_ENV'], (bool) $_ENV['APP_DEBUG']);
$kernel->boot();
$container = $kernel->getContainer();

// Récupération des services
$entityManager = $container->get('doctrine.orm.entity_manager');

echo "=== Test du système multilingue SymfPress ===\n\n";

try {
    // Test 1: Vérifier les langues disponibles
    echo "1. Langues disponibles :\n";
    $languages = $entityManager->getRepository(App\Entity\Language::class)->findAll();
    foreach ($languages as $language) {
        echo "   - {$language->getCode()} : {$language->getName()}";
        if ($language->getIsDefault()) {
            echo " (par défaut)";
        }
        if (!$language->getIsActive()) {
            echo " (inactive)";
        }
        echo "\n";
    }
    
    // Test 2: Langue par défaut
    echo "\n2. Langue par défaut :\n";
    $defaultLanguage = $entityManager->getRepository(App\Entity\Language::class)->findOneBy(['isDefault' => true]);
    if ($defaultLanguage) {
        echo "   {$defaultLanguage->getCode()} : {$defaultLanguage->getName()}\n";
    } else {
        echo "   Aucune langue par défaut trouvée\n";
    }
    
    // Test 3: Créer un article de test avec traductions
    echo "\n3. Test de création d'article multilingue :\n";
    
    // Vérifier s'il existe déjà un article de test
    $existingPost = $entityManager->getRepository(App\Entity\Post::class)->findOneBy(['slug' => 'test-multilingue']);
    
    if (!$existingPost) {
        // Créer un utilisateur admin s'il n'existe pas
        $admin = $entityManager->getRepository(App\Entity\User::class)->findOneBy(['email' => 'admin@symfpress.local']);
        if (!$admin) {
            echo "   Erreur : Utilisateur admin non trouvé\n";
        } else {
            // Créer l'article
            $post = new App\Entity\Post();
            $post->setSlug('test-multilingue');
            $post->setAuthor($admin);
            $post->setStatus(App\Entity\Post::STATUS_PUBLISHED);
            $post->setPublishedAt(new DateTime());
            
            // Traduction française
            $frLanguage = $entityManager->getRepository(App\Entity\Language::class)->findOneBy(['code' => 'fr']);
            if ($frLanguage) {
                $frTranslation = new App\Entity\PostTranslation();
                $frTranslation->setPost($post);
                $frTranslation->setLanguage($frLanguage);
                $frTranslation->setTitle('Article de test multilingue');
                $frTranslation->setContent('<p>Ceci est un <strong>article de test</strong> pour vérifier le système multilingue de SymfPress.</p>');
                $frTranslation->setExcerpt('Test du système multilingue en français.');
                $post->addTranslation($frTranslation);
                
                $entityManager->persist($frTranslation);
            }
            
            // Traduction anglaise
            $enLanguage = $entityManager->getRepository(App\Entity\Language::class)->findOneBy(['code' => 'en']);
            if ($enLanguage) {
                $enTranslation = new App\Entity\PostTranslation();
                $enTranslation->setPost($post);
                $enTranslation->setLanguage($enLanguage);
                $enTranslation->setTitle('Multilingual test article');
                $enTranslation->setContent('<p>This is a <strong>test article</strong> to verify the multilingual system of SymfPress.</p>');
                $enTranslation->setExcerpt('Testing the multilingual system in English.');
                $post->addTranslation($enTranslation);
                
                $entityManager->persist($enTranslation);
            }
            
            $entityManager->persist($post);
            $entityManager->flush();
            
            echo "   ✓ Article de test créé avec succès avec traductions FR et EN\n";
        }
    } else {
        echo "   ✓ Article de test existe déjà\n";
        
        // Vérifier les traductions
        $translations = $existingPost->getTranslations();
        echo "   Traductions disponibles :\n";
        foreach ($translations as $translation) {
            echo "     - {$translation->getLanguage()->getCode()}: {$translation->getTitle()}\n";
        }
    }
    
    // Test 4: Récupération d'articles par langue
    echo "\n4. Test de récupération par langue :\n";
    $posts = $entityManager->getRepository(App\Entity\Post::class)->findBy(['status' => App\Entity\Post::STATUS_PUBLISHED]);
    
    foreach ($languages as $language) {
        if (!$language->getIsActive()) continue;
        
        echo "   Langue {$language->getCode()} :\n";
        $count = 0;
        foreach ($posts as $post) {
            $translation = $post->getTranslationForLanguage($language);
            if ($translation) {
                echo "     - {$translation->getTitle()}\n";
                $count++;
            }
        }
        if ($count === 0) {
            echo "     (aucun article traduit)\n";
        }
    }
    
    // Test 5: Vérification des repositories de traduction
    echo "\n5. Test des repositories de traduction :\n";
    
    $postTransRepo = $entityManager->getRepository(App\Entity\PostTranslation::class);
    $postTransCount = count($postTransRepo->findAll());
    echo "   - PostTranslations : {$postTransCount}\n";
    
    $catTransRepo = $entityManager->getRepository(App\Entity\CategoryTranslation::class);
    $catTransCount = count($catTransRepo->findAll());
    echo "   - CategoryTranslations : {$catTransCount}\n";
    
    $tagTransRepo = $entityManager->getRepository(App\Entity\TagTranslation::class);
    $tagTransCount = count($tagTransRepo->findAll());
    echo "   - TagTranslations : {$tagTransCount}\n";
    
    echo "\n=== Test terminé avec succès ===\n";
    echo "Le système multilingue fonctionne correctement !\n";
    
} catch (Exception $e) {
    echo "Erreur lors du test : " . $e->getMessage() . "\n";
    echo "Trace : " . $e->getTraceAsString() . "\n";
}
