<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\User;
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
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $extension = $file->guessExtension();
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $extension;
        
        // Organiser par année/mois
        $date = new \DateTime();
        $yearMonth = $date->format('Y/m');
        $uploadPath = $this->uploadsDirectory . '/' . $yearMonth;
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        
        try {
            $file->move($uploadPath, $newFilename);
        } catch (\Exception $e) {
            throw new \RuntimeException('Erreur lors de l\'upload du fichier: ' . $e->getMessage());
        }
        
        $fullPath = $uploadPath . '/' . $newFilename;
        $relativePath = $yearMonth . '/' . $newFilename;
        
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
            $this->processImage($fullPath, $media);
        }
        
        $this->entityManager->persist($media);
        $this->entityManager->flush();
        
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
    
    public function deleteMedia(Media $media): bool
    {
        try {
            $fullPath = $this->uploadsDirectory . '/' . $media->getPath();
            
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            
            // Supprimer les miniatures si elles existent
            $this->deleteThumbnails($media);
            
            $this->entityManager->remove($media);
            $this->entityManager->flush();
            
            return true;
        } catch (\Exception $e) {
            error_log('Erreur suppression média: ' . $e->getMessage());
            return false;
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
    
    public function generateThumbnail(Media $media, int $width = 300, int $height = 300): ?string
    {
        if (!$media->isImage()) {
            return null;
        }
        
        $sourcePath = $this->uploadsDirectory . '/' . $media->getPath();
        
        if (!file_exists($sourcePath)) {
            return null;
        }
        
        $thumbnailDir = $this->uploadsDirectory . '/thumbnails';
        if (!is_dir($thumbnailDir)) {
            mkdir($thumbnailDir, 0755, true);
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
                    return null;
            }
            
            if (!$sourceImage) {
                return null;
            }
            
            $sourceWidth = imagesx($sourceImage);
            $sourceHeight = imagesy($sourceImage);
            
            // Calculer les dimensions en gardant les proportions
            $ratio = min($width / $sourceWidth, $height / $sourceHeight);
            $newWidth = (int) ($sourceWidth * $ratio);
            $newHeight = (int) ($sourceHeight * $ratio);
            
            // Créer la miniature
            $thumbnail = imagecreatetruecolor($newWidth, $newHeight);
            
            // Préserver la transparence pour PNG
            if ($imageType === IMAGETYPE_PNG) {
                imagealphablending($thumbnail, false);
                imagesavealpha($thumbnail, true);
                $transparent = imagecolorallocatealpha($thumbnail, 255, 255, 255, 127);
                imagefilledrectangle($thumbnail, 0, 0, $newWidth, $newHeight, $transparent);
            }
            
            imagecopyresampled(
                $thumbnail, $sourceImage, 0, 0, 0, 0,
                $newWidth, $newHeight, $sourceWidth, $sourceHeight
            );
            
            // Sauvegarder la miniature
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    imagejpeg($thumbnail, $thumbnailPath, 85);
                    break;
                case IMAGETYPE_PNG:
                    imagepng($thumbnail, $thumbnailPath);
                    break;
                case IMAGETYPE_GIF:
                    imagegif($thumbnail, $thumbnailPath);
                    break;
                case IMAGETYPE_WEBP:
                    imagewebp($thumbnail, $thumbnailPath, 85);
                    break;
            }
            
            imagedestroy($sourceImage);
            imagedestroy($thumbnail);
            
            return '/uploads/thumbnails/' . $thumbnailFilename;
            
        } catch (\Exception $e) {
            error_log('Erreur génération miniature: ' . $e->getMessage());
            return null;
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