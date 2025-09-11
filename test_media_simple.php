<?php

require_once 'vendor/autoload.php';

use App\Entity\Media;
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

// Récupérer l'EntityManager
/** @var EntityManagerInterface $entityManager */
$entityManager = $container->get('doctrine')->getManager();

echo "=== TEST SIMPLIFIÉ DU SYSTÈME DE MÉDIAS ===\n\n";

// 1. Vérifier les extensions PHP nécessaires
echo "1. Extensions PHP :\n";
$extensions = ['gd' => 'Traitement d\'images', 'exif' => 'Métadonnées images', 'fileinfo' => 'Détection MIME'];
foreach ($extensions as $ext => $desc) {
    $status = extension_loaded($ext) ? '✓' : '❌';
    echo "   $status $ext ($desc)\n";
}

// 2. Vérifier les répertoires
echo "\n2. Répertoires :\n";
$projectDir = $kernel->getProjectDir();
$uploadsDir = $projectDir . '/public/uploads';
$thumbnailsDir = $uploadsDir . '/thumbnails';

echo "   Répertoire uploads : $uploadsDir\n";
echo "   - Existe : " . (is_dir($uploadsDir) ? '✓ Oui' : '❌ Non') . "\n";
echo "   - Permissions : " . (is_writable($uploadsDir) ? '✓ Écriture OK' : '❌ Pas d\'écriture') . "\n";

echo "   Répertoire thumbnails : $thumbnailsDir\n";
echo "   - Existe : " . (is_dir($thumbnailsDir) ? '✓ Oui' : '❌ Non') . "\n";
if (is_dir($thumbnailsDir)) {
    echo "   - Permissions : " . (is_writable($thumbnailsDir) ? '✓ Écriture OK' : '❌ Pas d\'écriture') . "\n";
}

// 3. Configuration PHP
echo "\n3. Configuration PHP :\n";
echo "   ✓ Taille max upload : " . ini_get('upload_max_filesize') . "\n";
echo "   ✓ Taille max POST : " . ini_get('post_max_size') . "\n";
echo "   ✓ Limite mémoire : " . ini_get('memory_limit') . "\n";

// 4. Examiner les médias en base
echo "\n4. Médias en base de données :\n";
try {
    $mediaRepo = $entityManager->getRepository(Media::class);
    $medias = $mediaRepo->findAll();
    echo "   ✓ Nombre total : " . count($medias) . "\n\n";

    if (empty($medias)) {
        echo "   ℹ️ Aucun média trouvé en base de données.\n";
    } else {
        foreach ($medias as $media) {
            echo "   📁 " . $media->getOriginalName() . "\n";
            echo "      Type : " . $media->getMimeType() . "\n";
            echo "      Taille : " . number_format($media->getFileSize() / 1024, 2) . " KB\n";
            echo "      Chemin : " . $media->getPath() . "\n";
            echo "      URL : " . $media->getUrl() . "\n";
            
            $fullPath = $uploadsDir . '/' . $media->getPath();
            $fileExists = file_exists($fullPath);
            echo "      Fichier physique : " . ($fileExists ? '✓ Existe' : '❌ MANQUANT') . "\n";
            
            if ($media->isImage()) {
                echo "      Image : {$media->getWidth()}x{$media->getHeight()}\n";
                
                if ($fileExists) {
                    // Test simple de génération de miniature
                    $thumbPattern = $thumbnailsDir . '/' . pathinfo($media->getFilename(), PATHINFO_FILENAME) . '_*x*.*';
                    $thumbnails = glob($thumbPattern);
                    echo "      Miniatures : " . count($thumbnails) . " trouvée(s)\n";
                    foreach ($thumbnails as $thumb) {
                        echo "        - " . basename($thumb) . "\n";
                    }
                }
            }
            echo "\n";
        }
    }
} catch (Exception $e) {
    echo "   ❌ Erreur accès base de données : " . $e->getMessage() . "\n";
}

// 5. Test des fonctions GD
echo "5. Test des fonctions GD :\n";
if (extension_loaded('gd')) {
    $gdInfo = gd_info();
    echo "   ✓ Version GD : " . $gdInfo['GD Version'] . "\n";
    echo "   ✓ Support JPEG : " . (isset($gdInfo['JPEG Support']) && $gdInfo['JPEG Support'] ? 'Oui' : 'Non') . "\n";
    echo "   ✓ Support PNG : " . (isset($gdInfo['PNG Support']) && $gdInfo['PNG Support'] ? 'Oui' : 'Non') . "\n";
    echo "   ✓ Support GIF : " . (isset($gdInfo['GIF Create Support']) && $gdInfo['GIF Create Support'] ? 'Oui' : 'Non') . "\n";
    echo "   ✓ Support WebP : " . (function_exists('imagewebp') ? 'Oui' : 'Non') . "\n";
} else {
    echo "   ❌ Extension GD non disponible\n";
}

// 6. Vérifier les fichiers d'upload existants dans le système de fichiers
echo "\n6. Fichiers dans le système de fichiers :\n";
if (is_dir($uploadsDir)) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($uploadsDir));
    $files = [];
    foreach ($iterator as $file) {
        if ($file->isFile() && !in_array($file->getFilename(), ['.', '..', '.gitkeep'])) {
            $files[] = $file->getPathname();
        }
    }
    
    echo "   ✓ Fichiers trouvés : " . count($files) . "\n";
    foreach (array_slice($files, 0, 10) as $file) { // Afficher seulement les 10 premiers
        $relativePath = str_replace($uploadsDir . '/', '', $file);
        $size = number_format(filesize($file) / 1024, 2);
        echo "     - $relativePath ($size KB)\n";
    }
    
    if (count($files) > 10) {
        echo "     ... et " . (count($files) - 10) . " autres fichiers\n";
    }
} else {
    echo "   ❌ Répertoire uploads non trouvé\n";
}

echo "\n=== DIAGNOSTIC TERMINÉ ===\n";
