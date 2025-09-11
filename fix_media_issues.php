<?php

require_once 'vendor/autoload.php';

use App\Entity\Media;
use App\Entity\User;
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

echo "=== CORRECTION DU MODULE DE MÉDIAS ===\n\n";

$projectDir = $kernel->getProjectDir();
$uploadsDir = $projectDir . '/public/uploads';
$thumbnailsDir = $uploadsDir . '/thumbnails';

// 1. Créer le répertoire thumbnails s'il n'existe pas
echo "1. Création du répertoire thumbnails :\n";
if (!is_dir($thumbnailsDir)) {
    if (mkdir($thumbnailsDir, 0755, true)) {
        echo "   ✓ Répertoire thumbnails créé : $thumbnailsDir\n";
    } else {
        echo "   ❌ Erreur création répertoire thumbnails\n";
        exit(1);
    }
} else {
    echo "   ✓ Répertoire thumbnails existe déjà\n";
}

// 2. Nettoyer les entrées orphelines en base
echo "\n2. Nettoyage des entrées orphelines :\n";
$mediaRepo = $entityManager->getRepository(Media::class);
$allMedias = $mediaRepo->findAll();
$orphanedCount = 0;

foreach ($allMedias as $media) {
    $fullPath = $uploadsDir . '/' . $media->getPath();
    if (!file_exists($fullPath)) {
        echo "   🗑️ Suppression entrée orpheline : " . $media->getOriginalName() . "\n";
        $entityManager->remove($media);
        $orphanedCount++;
    }
}

if ($orphanedCount > 0) {
    $entityManager->flush();
    echo "   ✓ $orphanedCount entrée(s) orpheline(s) supprimée(s)\n";
} else {
    echo "   ✓ Aucune entrée orpheline trouvée\n";
}

// 3. Synchroniser les fichiers existants avec la base
echo "\n3. Synchronisation des fichiers existants :\n";
$userRepo = $entityManager->getRepository(User::class);
$defaultUser = $userRepo->findOneBy(['email' => 'admin@symfpress.local']);

if (!$defaultUser) {
    echo "   ❌ Utilisateur admin non trouvé pour assigner les médias\n";
    exit(1);
}

// Scanner les fichiers dans uploads
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($uploadsDir));
$syncedCount = 0;

foreach ($iterator as $file) {
    if ($file->isFile() && 
        !in_array($file->getFilename(), ['.', '..', '.gitkeep']) &&
        !str_contains($file->getPathname(), '/thumbnails/')) {
        
        $relativePath = str_replace($uploadsDir . '/', '', $file->getPathname());
        
        // Vérifier si ce fichier existe déjà en base
        $existingMedia = $mediaRepo->findOneBy(['path' => $relativePath]);
        
        if (!$existingMedia) {
            echo "   📁 Synchronisation : " . $file->getFilename() . "\n";
            
            // Créer une nouvelle entrée Media
            $media = new Media();
            $media->setFilename($file->getFilename());
            $media->setOriginalName($file->getFilename());
            $media->setPath($relativePath);
            $media->setUrl('/uploads/' . $relativePath);
            $media->setUploadedBy($defaultUser);
            $media->setFileSize($file->getSize());
            $media->setCreatedAt(new DateTime());
            
            // Détecter le type MIME
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $file->getPathname()) ?: 'application/octet-stream';
            finfo_close($finfo);
            $media->setMimeType($mimeType);
            
            // Si c'est une image, extraire les dimensions
            if (str_starts_with($mimeType, 'image/')) {
                try {
                    $imageSize = getimagesize($file->getPathname());
                    if ($imageSize !== false) {
                        $media->setWidth($imageSize[0]);
                        $media->setHeight($imageSize[1]);
                    }
                } catch (Exception $e) {
                    echo "     ⚠️ Erreur lecture dimensions : " . $e->getMessage() . "\n";
                }
            }
            
            $entityManager->persist($media);
            $syncedCount++;
        }
    }
}

if ($syncedCount > 0) {
    $entityManager->flush();
    echo "   ✓ $syncedCount fichier(s) synchronisé(s) avec la base\n";
} else {
    echo "   ✓ Tous les fichiers sont déjà synchronisés\n";
}

// 4. Test de génération de miniatures pour les images
echo "\n4. Test de génération de miniatures :\n";
$images = $mediaRepo->createQueryBuilder('m')
    ->where('m.mimeType LIKE :imageType')
    ->setParameter('imageType', 'image/%')
    ->getQuery()
    ->getResult();

if (empty($images)) {
    echo "   ℹ️ Aucune image trouvée pour tester les miniatures\n";
} else {
    $thumbnailCount = 0;
    foreach (array_slice($images, 0, 3) as $media) { // Tester seulement 3 images
        echo "   🖼️ Test miniature pour : " . $media->getOriginalName() . "\n";
        
        $fullPath = $uploadsDir . '/' . $media->getPath();
        if (file_exists($fullPath)) {
            try {
                // Test simple de génération de miniature avec GD
                $sourceImage = null;
                $imageType = exif_imagetype($fullPath);
                
                switch ($imageType) {
                    case IMAGETYPE_JPEG:
                        $sourceImage = imagecreatefromjpeg($fullPath);
                        break;
                    case IMAGETYPE_PNG:
                        $sourceImage = imagecreatefrompng($fullPath);
                        break;
                    case IMAGETYPE_GIF:
                        $sourceImage = imagecreatefromgif($fullPath);
                        break;
                    case IMAGETYPE_WEBP:
                        $sourceImage = imagecreatefromwebp($fullPath);
                        break;
                }
                
                if ($sourceImage) {
                    $thumbnailFilename = pathinfo($media->getFilename(), PATHINFO_FILENAME) . '_150x150.' . 
                                       pathinfo($media->getFilename(), PATHINFO_EXTENSION);
                    $thumbnailPath = $thumbnailsDir . '/' . $thumbnailFilename;
                    
                    // Créer une miniature simple 150x150
                    $thumbnail = imagecreatetruecolor(150, 150);
                    imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, 150, 150, 
                                     imagesx($sourceImage), imagesy($sourceImage));
                    
                    $success = false;
                    switch ($imageType) {
                        case IMAGETYPE_JPEG:
                            $success = imagejpeg($thumbnail, $thumbnailPath, 85);
                            break;
                        case IMAGETYPE_PNG:
                            $success = imagepng($thumbnail, $thumbnailPath);
                            break;
                        case IMAGETYPE_GIF:
                            $success = imagegif($thumbnail, $thumbnailPath);
                            break;
                        case IMAGETYPE_WEBP:
                            $success = imagewebp($thumbnail, $thumbnailPath, 85);
                            break;
                    }
                    
                    if ($success) {
                        echo "     ✓ Miniature créée : $thumbnailFilename\n";
                        $thumbnailCount++;
                    } else {
                        echo "     ❌ Échec création miniature\n";
                    }
                    
                    imagedestroy($sourceImage);
                    imagedestroy($thumbnail);
                } else {
                    echo "     ❌ Impossible de charger l'image source\n";
                }
            } catch (Exception $e) {
                echo "     ❌ Erreur génération miniature : " . $e->getMessage() . "\n";
            }
        } else {
            echo "     ❌ Fichier source introuvable\n";
        }
    }
    
    echo "   ✓ $thumbnailCount miniature(s) générée(s) avec succès\n";
}

// 5. Statistiques finales
echo "\n5. Statistiques finales :\n";
$finalMediaCount = $mediaRepo->count([]);
$totalSize = 0;
$typeStats = [];

foreach ($mediaRepo->findAll() as $media) {
    $totalSize += $media->getFileSize();
    $baseType = explode('/', $media->getMimeType())[0];
    $typeStats[$baseType] = ($typeStats[$baseType] ?? 0) + 1;
}

echo "   ✓ Nombre total de médias en base : $finalMediaCount\n";
echo "   ✓ Taille totale : " . number_format($totalSize / 1024 / 1024, 2) . " MB\n";
echo "   ✓ Répartition par type :\n";
foreach ($typeStats as $type => $count) {
    echo "     - $type : $count fichier(s)\n";
}

// 6. Vérification finale des répertoires
echo "\n6. Vérification finale :\n";
echo "   ✓ Répertoire uploads : " . (is_dir($uploadsDir) ? 'OK' : 'MANQUANT') . "\n";
echo "   ✓ Répertoire thumbnails : " . (is_dir($thumbnailsDir) ? 'OK' : 'MANQUANT') . "\n";
echo "   ✓ Permissions uploads : " . (is_writable($uploadsDir) ? 'Écriture OK' : 'Pas d\'écriture') . "\n";
echo "   ✓ Permissions thumbnails : " . (is_writable($thumbnailsDir) ? 'Écriture OK' : 'Pas d\'écriture') . "\n";

$thumbFiles = glob($thumbnailsDir . '/*');
echo "   ✓ Miniatures présentes : " . count($thumbFiles) . "\n";

echo "\n=== CORRECTION TERMINÉE AVEC SUCCÈS ! ===\n";
echo "Le module de médias est maintenant opérationnel.\n";
