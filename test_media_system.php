<?php

require_once 'vendor/autoload.php';

use App\Service\MediaManager;
use App\Entity\Media;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

/** @var MediaManager $mediaManager */
$slugger = $container->get('slugger');
$uploadsDir = $kernel->getProjectDir() . '/public/uploads';
$mediaManager = new MediaManager($entityManager, $slugger, $uploadsDir);

echo "=== TEST DU SYSTÈME DE GESTION DES MÉDIAS ===\n\n";

// 1. Vérifier les extensions PHP nécessaires
echo "1. Vérification des extensions PHP :\n";
$requiredExtensions = ['gd', 'exif', 'fileinfo'];
foreach ($requiredExtensions as $extension) {
    $status = extension_loaded($extension) ? '✓' : '❌';
    echo "   $status Extension $extension\n";
}

// 2. Vérifier les répertoires
echo "\n2. Vérification des répertoires :\n";
$uploadsDir = $kernel->getProjectDir() . '/public/uploads';
$thumbnailsDir = $uploadsDir . '/thumbnails';

echo "   ✓ Répertoire uploads : $uploadsDir\n";
echo "     Existe : " . (is_dir($uploadsDir) ? 'Oui' : 'Non') . "\n";
echo "     Permissions : " . (is_writable($uploadsDir) ? 'Écriture OK' : 'Pas d\'écriture') . "\n";

echo "   ✓ Répertoire thumbnails : $thumbnailsDir\n";
echo "     Existe : " . (is_dir($thumbnailsDir) ? 'Oui' : 'Non') . "\n";
if (is_dir($thumbnailsDir)) {
    echo "     Permissions : " . (is_writable($thumbnailsDir) ? 'Écriture OK' : 'Pas d\'écriture') . "\n";
}

// 3. Vérifier la taille max d'upload
echo "\n3. Configuration PHP :\n";
echo "   ✓ Taille max upload : " . ini_get('upload_max_filesize') . "\n";
echo "   ✓ Taille max POST : " . ini_get('post_max_size') . "\n";
echo "   ✓ Limite mémoire : " . ini_get('memory_limit') . "\n";

// 4. Tester les médias existants
echo "\n4. Médias existants :\n";
$mediaRepo = $entityManager->getRepository(Media::class);
$medias = $mediaRepo->findAll();
echo "   ✓ Nombre total de médias : " . count($medias) . "\n";

foreach ($medias as $media) {
    echo "   - {$media->getOriginalName()} ({$media->getMimeType()})\n";
    echo "     Fichier : {$media->getPath()}\n";
    echo "     URL : {$media->getUrl()}\n";
    
    $fullPath = $uploadsDir . '/' . $media->getPath();
    $exists = file_exists($fullPath) ? 'Existe' : 'MANQUANT';
    echo "     Status fichier : $exists\n";
    
    if ($media->isImage() && file_exists($fullPath)) {
        echo "     Dimensions : {$media->getWidth()}x{$media->getHeight()}\n";
        
        // Tester la génération de miniature
        try {
            $thumbnail = $mediaManager->generateThumbnail($media, 150, 150);
            if ($thumbnail) {
                echo "     ✓ Miniature générée : $thumbnail\n";
                $thumbPath = $kernel->getProjectDir() . '/public' . $thumbnail;
                echo "     ✓ Miniature existe : " . (file_exists($thumbPath) ? 'Oui' : 'Non') . "\n";
            } else {
                echo "     ❌ Échec génération miniature\n";
            }
        } catch (Exception $e) {
            echo "     ❌ Erreur miniature : " . $e->getMessage() . "\n";
        }
    }
    echo "\n";
}

// 5. Test de validation de types de fichiers
echo "5. Test validation types de fichiers :\n";
$testFiles = [
    'test.jpg' => 'image/jpeg',
    'test.png' => 'image/png',
    'test.pdf' => 'application/pdf',
    'test.txt' => 'text/plain',
    'test.exe' => 'application/x-executable'
];

foreach ($testFiles as $filename => $mimeType) {
    // Créer un mock d'UploadedFile pour tester
    $tempFile = tempnam(sys_get_temp_dir(), 'test');
    file_put_contents($tempFile, 'test content');
    
    try {
        $uploadedFile = new UploadedFile($tempFile, $filename, $mimeType, null, true);
        $isValid = $mediaManager->isValidFileType($uploadedFile);
        $status = $isValid ? '✓ Autorisé' : '❌ Refusé';
        echo "   $status $filename ($mimeType)\n";
    } catch (Exception $e) {
        echo "   ❌ Erreur test $filename : " . $e->getMessage() . "\n";
    }
    
    unlink($tempFile);
}

// 6. Statistiques du stockage
echo "\n6. Statistiques de stockage :\n";
try {
    $stats = $mediaManager->getStorageStats();
    echo "   ✓ Nombre total de fichiers : " . $stats['total_files'] . "\n";
    echo "   ✓ Taille totale : " . number_format($stats['total_size'] / 1024 / 1024, 2) . " MB\n";
    
    if (isset($stats['by_type']) && is_array($stats['by_type'])) {
        echo "   ✓ Répartition par type :\n";
        foreach ($stats['by_type'] as $type => $count) {
            echo "     - $type : $count fichier(s)\n";
        }
    }
} catch (Exception $e) {
    echo "   ❌ Erreur statistiques : " . $e->getMessage() . "\n";
}

echo "\n=== TEST TERMINÉ ===\n";
