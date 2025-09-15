<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\User;
use App\Exception\MediaException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class MediaManager
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly SluggerInterface $slugger,
        #[Autowire('%kernel.project_dir%/public/uploads')] private readonly string $uploadsDirectory
    ) {
        // Créer le répertoire d'upload si il n'existe pas
        if (!is_dir($this->uploadsDirectory)) {
            mkdir($this->uploadsDirectory, 0755, true);
        }
    }

    public function uploadFile(UploadedFile $file, User $user): Media
    {
        // Vérifier que le fichier est valide
        if (!$file->isValid()) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Fichier invalide ou corrompu');
        }
        
        // Stratégie robuste : copier immédiatement le fichier temporaire si possible
        $tempPath = $file->getPathname();
        $tempBackupPath = null;
        $originalTempPath = $tempPath; // Conserver le chemin original pour le move() final
        
        if (file_exists($tempPath) && is_readable($tempPath)) {
            // Créer une copie immédiate du fichier temporaire
            $tempBackupPath = sys_get_temp_dir() . '/' . 'symfony_upload_backup_' . uniqid() . '.tmp';
            if (copy($tempPath, $tempBackupPath)) {
                // Utiliser immédiatement la copie de sauvegarde pour éviter les problèmes de timing
                $tempPath = $tempBackupPath;
            } else {
                $tempBackupPath = null; // Échec de la copie, on continue normalement
            }
        }
        
        // Si le fichier temporaire n'est pas accessible et qu'on n'a pas de copie de sauvegarde
        if (!file_exists($tempPath) || !is_readable($tempPath)) {
            if ($tempBackupPath && file_exists($tempBackupPath)) {
                // Utiliser notre copie de sauvegarde
                $tempPath = $tempBackupPath;
            } else {
                throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier temporaire n\'existe pas ou n\'est pas lisible');
            }
        }

        // Vérifier le type de fichier
        if (!$this->isValidFileType($file)) {
            $allowedTypes = [
                'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml',
                'application/pdf', 'text/plain', 'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/zip', 'application/x-rar-compressed'
            ];
            throw MediaException::invalidFileType(
                $file->getClientOriginalName(),
                $file->getMimeType() ?: 'unknown',
                $allowedTypes
            );
        }

        // Vérifier la taille du fichier
        $maxSize = $this->getMaxFileSize();
        if ($file->getSize() > $maxSize) {
            throw MediaException::fileTooLarge($file->getClientOriginalName(), $file->getSize(), $maxSize);
        }

        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $extension = $file->guessExtension();
        
        if (!$extension) {
            throw MediaException::corruptedFile($file->getClientOriginalName());
        }
        
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $extension;
        
        // Organiser par année/mois
        $date = new \DateTime();
        $yearMonth = $date->format('Y/m');
        $uploadPath = $this->uploadsDirectory . '/' . $yearMonth;
        
        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0755, true)) {
                throw MediaException::filePermissionDenied($uploadPath, 'création du répertoire');
            }
        }
        
        try {
            // Vérifier une dernière fois que le fichier est toujours accessible avant le transfert
            if (!file_exists($tempPath) || !is_readable($tempPath)) {
                throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier temporaire n\'est plus accessible avant le transfert');
            }
            
            // Gérer le transfert final selon le type de fichier source
            if ($tempBackupPath && $tempPath === $tempBackupPath) {
                // Utiliser copy() pour la copie de sauvegarde
                if (!copy($tempPath, $uploadPath . '/' . $newFilename)) {
                    throw new \Exception('Échec de la copie du fichier de sauvegarde');
                }
            } else {
                // Utiliser move() pour le fichier original
                $file->move($uploadPath, $newFilename);
            }
        } catch (\Exception $e) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), $e->getMessage(), $e);
        } finally {
            // Nettoyer le fichier de sauvegarde temporaire si il existe
            if ($tempBackupPath && file_exists($tempBackupPath)) {
                unlink($tempBackupPath);
            }
        }
        
        $fullPath = $uploadPath . '/' . $newFilename;
        $relativePath = $yearMonth . '/' . $newFilename;
        
        // Vérifier que le fichier a bien été créé
        if (!file_exists($fullPath)) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier n\'a pas été créé sur le serveur');
        }
        
        // Créer l'entité Media
        $media = new Media();
        $media->setFilename($newFilename);
        $media->setOriginalName($file->getClientOriginalName());
        $media->setMimeType($file->getMimeType() ?? 'application/octet-stream');
        $media->setFileSize($file->getSize());
        $media->setPath($relativePath);
        $media->setUrl('/uploads/' . $relativePath);
        $media->setUploadedBy($user);
        
        // Traitement spécifique aux images
        if ($this->isImage($file->getMimeType())) {
            try {
                $this->processImage($fullPath, $media);
            } catch (\Exception $e) {
                throw MediaException::imageProcessingError('traitement des métadonnées', $newFilename, $e);
            }
        }
        
        try {
            $this->entityManager->persist($media);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            // Nettoyer le fichier uploadé en cas d'erreur de base de données
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Erreur lors de l\'enregistrement en base : ' . $e->getMessage(), $e);
        }
        
        return $media;
    }
    
    public function uploadFiles(array $files, User $user): array
    {
        $uploadedMedias = [];
        
        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                try {
                    $uploadedMedias[] = $this->uploadFile($file, $user);
                } catch (\Exception $e) {
                    // Log l'erreur mais continue avec les autres fichiers
                    error_log('Erreur upload fichier ' . $file->getClientOriginalName() . ': ' . $e->getMessage());
                }
            }
        }
        
        return $uploadedMedias;
    }
    
    public function deleteMedia(Media $media): void
    {
        $fullPath = $this->uploadsDirectory . '/' . $media->getPath();
        
        if (file_exists($fullPath)) {
            if (!unlink($fullPath)) {
                throw MediaException::filePermissionDenied($fullPath, 'suppression');
            }
        }
        
        try {
            // Supprimer les miniatures si elles existent
            $this->deleteThumbnails($media);
            
            $this->entityManager->remove($media);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            throw MediaException::uploadFailed($media->getOriginalName(), 'Erreur lors de la suppression : ' . $e->getMessage(), $e);
        }
    }
    
    public function updateMedia(Media $media, array $data): Media
    {
        if (isset($data['alt'])) {
            $media->setAlt($data['alt']);
        }
        
        if (isset($data['description'])) {
            $media->setDescription($data['description']);
        }
        
        if (isset($data['caption'])) {
            $media->setCaption($data['caption']);
        }
        
        $media->setUpdatedAt(new \DateTime());
        
        $this->entityManager->flush();
        
        return $media;
    }
    
    public function generateThumbnail(Media $media, int $width = 300, int $height = 300): string
    {
        if (!$media->isImage()) {
            throw MediaException::imageProcessingError('génération de miniature', $media->getFilename(), 
                new \InvalidArgumentException('Le média n\'est pas une image'));
        }
        
        $sourcePath = $this->uploadsDirectory . '/' . $media->getPath();
        
        if (!file_exists($sourcePath)) {
            throw MediaException::fileNotFound($sourcePath);
        }
        
        $thumbnailDir = $this->uploadsDirectory . '/thumbnails';
        if (!is_dir($thumbnailDir)) {
            if (!mkdir($thumbnailDir, 0755, true)) {
                throw MediaException::filePermissionDenied($thumbnailDir, 'création du répertoire');
            }
        }
        
        $thumbnailFilename = pathinfo($media->getFilename(), PATHINFO_FILENAME) . 
                            "_{$width}x{$height}." . 
                            pathinfo($media->getFilename(), PATHINFO_EXTENSION);
        
        $thumbnailPath = $thumbnailDir . '/' . $thumbnailFilename;
        
        if (file_exists($thumbnailPath)) {
            return '/uploads/thumbnails/' . $thumbnailFilename;
        }
        
        try {
            $imageType = exif_imagetype($sourcePath);
            
            if (!$imageType) {
                throw MediaException::corruptedFile($media->getFilename());
            }
            
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    $sourceImage = imagecreatefromjpeg($sourcePath);
                    break;
                case IMAGETYPE_PNG:
                    $sourceImage = imagecreatefrompng($sourcePath);
                    break;
                case IMAGETYPE_GIF:
                    $sourceImage = imagecreatefromgif($sourcePath);
                    break;
                case IMAGETYPE_WEBP:
                    $sourceImage = imagecreatefromwebp($sourcePath);
                    break;
                default:
                    throw MediaException::invalidFileType($media->getFilename(), 'image/' . image_type_to_extension($imageType, false));
            }
            
            if (!$sourceImage) {
                throw MediaException::corruptedFile($media->getFilename());
            }
            
            $sourceWidth = imagesx($sourceImage);
            $sourceHeight = imagesy($sourceImage);
            
            // Calculer les dimensions en gardant les proportions
            $ratio = min($width / $sourceWidth, $height / $sourceHeight);
            $newWidth = (int) ($sourceWidth * $ratio);
            $newHeight = (int) ($sourceHeight * $ratio);
            
            // Créer la miniature
            $thumbnail = imagecreatetruecolor($newWidth, $newHeight);
            
            if (!$thumbnail) {
                imagedestroy($sourceImage);
                throw MediaException::imageProcessingError('création de la miniature', $media->getFilename());
            }
            
            // Préserver la transparence pour PNG
            if ($imageType === IMAGETYPE_PNG) {
                imagealphablending($thumbnail, false);
                imagesavealpha($thumbnail, true);
                $transparent = imagecolorallocatealpha($thumbnail, 255, 255, 255, 127);
                imagefilledrectangle($thumbnail, 0, 0, $newWidth, $newHeight, $transparent);
            }
            
            if (!imagecopyresampled(
                $thumbnail, $sourceImage, 0, 0, 0, 0,
                $newWidth, $newHeight, $sourceWidth, $sourceHeight
            )) {
                imagedestroy($sourceImage);
                imagedestroy($thumbnail);
                throw MediaException::imageProcessingError('redimensionnement', $media->getFilename());
            }
            
            // Sauvegarder la miniature
            $saved = false;
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    $saved = imagejpeg($thumbnail, $thumbnailPath, 85);
                    break;
                case IMAGETYPE_PNG:
                    $saved = imagepng($thumbnail, $thumbnailPath);
                    break;
                case IMAGETYPE_GIF:
                    $saved = imagegif($thumbnail, $thumbnailPath);
                    break;
                case IMAGETYPE_WEBP:
                    $saved = imagewebp($thumbnail, $thumbnailPath, 85);
                    break;
            }
            
            imagedestroy($sourceImage);
            imagedestroy($thumbnail);
            
            if (!$saved) {
                throw MediaException::imageProcessingError('sauvegarde de la miniature', $media->getFilename());
            }
            
            return '/uploads/thumbnails/' . $thumbnailFilename;
            
        } catch (MediaException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw MediaException::imageProcessingError('génération de miniature', $media->getFilename(), $e);
        }
    }
    
    public function getStorageStats(): array
    {
        $repository = $this->entityManager->getRepository(Media::class);
        
        return [
            'total_files' => $repository->count([]),
            'total_size' => $repository->getTotalFileSize(),
            'by_type' => $repository->countByMimeType(),
            'recent_files' => $repository->findRecent(5)
        ];
    }
    
    private function processImage(string $fullPath, Media $media): void
    {
        try {
            $imageSize = getimagesize($fullPath);
            if ($imageSize !== false) {
                $media->setWidth($imageSize[0]);
                $media->setHeight($imageSize[1]);
            }
        } catch (\Exception $e) {
            // Ignorer les erreurs de traitement d'image
        }
    }
    
    private function deleteThumbnails(Media $media): void
    {
        if (!$media->isImage()) {
            return;
        }
        
        $thumbnailDir = $this->uploadsDirectory . '/thumbnails';
        $baseName = pathinfo($media->getFilename(), PATHINFO_FILENAME);
        
        // Supprimer toutes les miniatures correspondantes
        $pattern = $thumbnailDir . '/' . $baseName . '_*x*.*';
        $thumbnails = glob($pattern);
        
        foreach ($thumbnails as $thumbnail) {
            if (file_exists($thumbnail)) {
                unlink($thumbnail);
            }
        }
    }
    
    private function isImage(?string $mimeType): bool
    {
        return $mimeType && str_starts_with($mimeType, 'image/');
    }
    
    public function isValidFileType(UploadedFile $file): bool
    {
        $allowedTypes = [
            // Images
            'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml',
            // Documents
            'application/pdf', 'text/plain', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            // Archives
            'application/zip', 'application/x-rar-compressed'
        ];
        
        return in_array($file->getMimeType(), $allowedTypes);
    }
    
    public function getMaxFileSize(): int
    {
        // Retourner la taille max en bytes (10MB par défaut)
        $maxSize = ini_get('upload_max_filesize');
        return $this->convertToBytes($maxSize ?: '10M');
    }
    
    private function convertToBytes(string $size): int
    {
        $size = trim($size);
        $unit = strtolower($size[strlen($size) - 1]);
        $value = (int) substr($size, 0, -1);
        
        switch ($unit) {
            case 'g': $value *= 1024;
            case 'm': $value *= 1024;
            case 'k': $value *= 1024;
        }
        
        return $value;
    }
}