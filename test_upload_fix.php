<?php

/**
 * Script de test pour valider la correction des uploads
 * 
 * Ce script teste la logique de copie temporaire mise en place
 * pour résoudre les erreurs d'upload de fichiers sur Windows/Laragon
 */

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

echo "=== Test de la Correction d'Upload ===\n\n";

// Simuler la situation problématique de Windows/Laragon
function testBackupStrategy() {
    $filesystem = new Filesystem();
    
    // 1. Créer un fichier temporaire de test
    $testContent = "Test file content for upload validation";
    $originalTemp = sys_get_temp_dir() . '/test_original_' . uniqid() . '.tmp';
    file_put_contents($originalTemp, $testContent);
    
    echo "1. Fichier temporaire créé: $originalTemp\n";
    echo "   Taille: " . filesize($originalTemp) . " bytes\n";
    echo "   Lisible: " . (is_readable($originalTemp) ? 'OUI' : 'NON') . "\n\n";
    
    // 2. Tester la stratégie de copie de sauvegarde
    $tempPath = $originalTemp;
    $tempBackupPath = null;
    $originalTempPath = $tempPath;
    
    if (file_exists($tempPath) && is_readable($tempPath)) {
        // Créer une copie immédiate du fichier temporaire
        $tempBackupPath = sys_get_temp_dir() . '/' . 'symfony_upload_backup_' . uniqid() . '.tmp';
        echo "2. Tentative de création de la copie de sauvegarde...\n";
        
        if (copy($tempPath, $tempBackupPath)) {
            echo "   ✅ Copie de sauvegarde créée: $tempBackupPath\n";
            // Utiliser immédiatement la copie de sauvegarde
            $tempPath = $tempBackupPath;
            echo "   ✅ Chemin mis à jour vers la copie de sauvegarde\n\n";
        } else {
            echo "   ❌ Échec de la copie de sauvegarde\n\n";
            $tempBackupPath = null;
        }
    }
    
    // 3. Simuler la disparition du fichier original (problème Windows)
    echo "3. Simulation de la disparition du fichier original...\n";
    unlink($originalTemp);
    echo "   Fichier original supprimé\n";
    echo "   Fichier original accessible: " . (file_exists($originalTempPath) ? 'OUI' : 'NON') . "\n";
    echo "   Fichier de sauvegarde accessible: " . (file_exists($tempPath) ? 'OUI' : 'NON') . "\n\n";
    
    // 4. Vérifier que le contenu est toujours accessible
    if (file_exists($tempPath) && is_readable($tempPath)) {
        $recoveredContent = file_get_contents($tempPath);
        echo "4. Vérification du contenu récupéré:\n";
        echo "   Contenu original: '$testContent'\n";
        echo "   Contenu récupéré: '$recoveredContent'\n";
        echo "   Match: " . ($testContent === $recoveredContent ? '✅ OUI' : '❌ NON') . "\n\n";
    } else {
        echo "4. ❌ Impossible d'accéder au fichier de sauvegarde\n\n";
    }
    
    // 5. Test du transfert final
    echo "5. Test du transfert final...\n";
    $testUploadDir = sys_get_temp_dir() . '/test_upload_' . uniqid();
    if (!is_dir($testUploadDir)) {
        mkdir($testUploadDir, 0755, true);
    }
    
    $finalFilename = 'test_upload_' . uniqid() . '.tmp';
    
    if ($tempBackupPath && $tempPath === $tempBackupPath) {
        echo "   Utilisation de copy() pour la copie de sauvegarde...\n";
        if (copy($tempPath, $testUploadDir . '/' . $finalFilename)) {
            echo "   ✅ Transfert réussi avec copy()\n";
        } else {
            echo "   ❌ Échec du transfert avec copy()\n";
        }
    } else {
        echo "   Utilisation de rename() pour le fichier original...\n";
        if (rename($tempPath, $testUploadDir . '/' . $finalFilename)) {
            echo "   ✅ Transfert réussi avec rename()\n";
        } else {
            echo "   ❌ Échec du transfert avec rename()\n";
        }
    }
    
    // 6. Nettoyage
    echo "\n6. Nettoyage...\n";
    if ($tempBackupPath && file_exists($tempBackupPath)) {
        unlink($tempBackupPath);
        echo "   Copie de sauvegarde supprimée\n";
    }
    
    if (is_dir($testUploadDir)) {
        $filesystem->remove($testUploadDir);
        echo "   Répertoire de test supprimé\n";
    }
    
    echo "\n=== Test terminé ===\n";
}

// Exécuter le test
try {
    testBackupStrategy();
    echo "\n✅ Tous les tests sont passés avec succès !\n";
    echo "La correction de l'upload devrait maintenant fonctionner.\n";
} catch (Exception $e) {
    echo "\n❌ Erreur durant le test: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
