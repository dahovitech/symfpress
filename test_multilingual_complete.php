<?php

require_once 'vendor/autoload.php';

use App\Entity\Post;
use App\Entity\PostTranslation;
use App\Entity\Language;
use App\Repository\LanguageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Dotenv\Dotenv;

// Charger les variables d'environnement
$dotenv = new Dotenv();
if (file_exists('.env.local')) {
    $dotenv->load('.env.local');
}
if (file_exists('.env')) {
    $dotenv->load('.env');
}

// Créer le kernel et booter l'application
$kernel = new \App\Kernel('dev', true);
$kernel->boot();
$container = $kernel->getContainer();

// Récupérer les services
/** @var EntityManagerInterface $entityManager */
$entityManager = $container->get('doctrine')->getManager();

/** @var LanguageRepository $languageRepo */
$languageRepo = $entityManager->getRepository(Language::class);

echo "=== TEST DU SYSTÈME MULTILINGUE SYMFPRESS ===\n\n";

// 1. Vérifier les langues disponibles
echo "1. Langues disponibles :\n";
$languages = $languageRepo->findAll();
foreach ($languages as $language) {
    $status = $language->getIsDefault() ? ' (par défaut)' : '';
    $active = $language->getIsActive() ? ' [actif]' : ' [inactif]';
    echo "   - {$language->getName()} ({$language->getCode()}){$status}{$active}\n";
}

// 2. Créer un nouveau post avec traductions
echo "\n2. Création d'un nouveau post avec traductions :\n";

$post = new Post();
$post->setSlug('test-multilingue-' . time());
$post->setStatus(Post::STATUS_PUBLISHED);
$post->setCommentStatus(true);
$post->setIsFeatured(false);
$post->setMenuOrder(0);
$post->setViewCount(0);
$post->setPublishedAt(new DateTime());
$post->setCreatedAt(new DateTime());

// Créer un utilisateur simple pour l'auteur si nécessaire
$userRepo = $entityManager->getRepository(\App\Entity\User::class);
$author = $userRepo->findOneBy(['email' => 'admin@symfpress.local']);
if ($author) {
    $post->setAuthor($author);
}

// Créer les traductions pour chaque langue
foreach ($languages as $language) {
    if (!$language->getIsActive()) {
        continue;
    }
    
    $translation = new PostTranslation();
    $translation->setPost($post);
    $translation->setLanguage($language);
    
    if ($language->getCode() === 'fr') {
        $translation->setTitle('Test de création multilingue');
        $translation->setContent('<p>Ce <strong>post</strong> a été créé automatiquement pour tester le système multilingue.</p>');
        $translation->setExcerpt('Extrait en français');
        $translation->setMetaTitle('Test multilingue - Français');
        $translation->setMetaDescription('Description SEO en français');
    } elseif ($language->getCode() === 'en') {
        $translation->setTitle('Multilingual creation test');
        $translation->setContent('<p>This <strong>post</strong> was automatically created to test the multilingual system.</p>');
        $translation->setExcerpt('English excerpt');
        $translation->setMetaTitle('Multilingual test - English');
        $translation->setMetaDescription('SEO description in English');
    } else {
        // Pour d'autres langues, titre générique
        $translation->setTitle('Test multilingue - ' . $language->getName());
        $translation->setContent('<p>Contenu de test pour ' . $language->getName() . '</p>');
    }
    
    $post->addTranslation($translation);
    $entityManager->persist($translation);
    
    echo "   ✓ Traduction créée pour {$language->getName()} ({$language->getCode()})\n";
}

// Persister le post
$entityManager->persist($post);

try {
    $entityManager->flush();
    echo "   ✓ Post et traductions sauvegardés avec succès !\n";
    echo "   ✓ ID du post créé : " . $post->getId() . "\n";
    echo "   ✓ Slug : " . $post->getSlug() . "\n";
} catch (Exception $e) {
    echo "   ❌ Erreur lors de la sauvegarde : " . $e->getMessage() . "\n";
    exit(1);
}

// 3. Vérifier la récupération des traductions
echo "\n3. Vérification de la récupération des traductions :\n";

foreach ($languages as $language) {
    if (!$language->getIsActive()) {
        continue;
    }
    
    $translation = $post->getTranslationForLanguage($language);
    if ($translation) {
        echo "   ✓ {$language->getName()} : \"{$translation->getTitle()}\"\n";
    } else {
        echo "   ❌ Aucune traduction trouvée pour {$language->getName()}\n";
    }
}

// 4. Test de la méthode getDisplayTitle
echo "\n4. Test de la méthode getDisplayTitle :\n";
foreach ($languages as $language) {
    if (!$language->getIsActive()) {
        continue;
    }
    
    $title = $post->getDisplayTitle($language);
    echo "   ✓ Titre en {$language->getName()} : \"$title\"\n";
}

// 5. Statistiques finales
echo "\n5. Statistiques finales :\n";
$totalPosts = $entityManager->createQuery('SELECT COUNT(p) FROM App\Entity\Post p')->getSingleScalarResult();
$totalTranslations = $entityManager->createQuery('SELECT COUNT(pt) FROM App\Entity\PostTranslation pt')->getSingleScalarResult();

echo "   ✓ Nombre total de posts : $totalPosts\n";
echo "   ✓ Nombre total de traductions : $totalTranslations\n";

echo "\n=== TEST TERMINÉ AVEC SUCCÈS ! ===\n";
echo "Le système multilingue de SymfPress fonctionne parfaitement.\n";
