<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\User;
use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class MediaService
{
    private const UPLOAD_DIR = 'uploads';
    private const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB
    private const ALLOWED_EXTENSIONS = [
        'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg',
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx',
        'mp4', 'avi', 'mov', 'webm',
        'mp3', 'wav', 'ogg'
    ];
    
    public function __construct(
        private readonly MediaRepository $mediaRepository,
        private readonly SluggerInterface $slugger,
        private readonly string $projectDir
    ) {
    }
    
    public function uploadFile(UploadedFile $file, User $user, ?string $alt = null, ?string $description = null): Media
    {
        $this->validateFile($file);
        
        $originalName = $file->getClientOriginalName();
        $extension = $file->guessExtension() ?: $file->getClientOriginalExtension();
        
        // Générer un nom de fichier unique
        $safeFilename = $this->slugger->slug(pathinfo($originalName, PATHINFO_FILENAME));
        $filename = $safeFilename . '-' . uniqid() . '.' . $extension;
        
        // Créer le répertoire de destination
        $uploadPath = $this->getUploadPath();
        $this->ensureDirectoryExists($uploadPath);
        
        // Déplacer le fichier
        $file->move($uploadPath, $filename);
        
        // Créer l'entité Media
        $media = new Media();
        $media->setFilename($filename);
        $media->setOriginalName($originalName);
        $media->setMimeType($file->getMimeType() ?: $file->getClientMimeType());
        $media->setFileSize($file->getSize());
        $media->setPath(self::UPLOAD_DIR . '/' . $filename);
        $media->setUrl('/' . self::UPLOAD_DIR . '/' . $filename);
        $media->setUploadedBy($user);
        
        if ($alt) {
            $media->setAlt($alt);
        }
        
        if ($description) {
            $media->setDescription($description);
        }
        
        // Obtenir les dimensions pour les images
        if ($media->isImage()) {
            $this->setImageDimensions($media, $uploadPath . '/' . $filename);
        }
        
        $this->mediaRepository->save($media, true);
        
        return $media;
    }
    
    public function deleteFile(Media $media): bool
    {
        $filePath = $this->projectDir . '/public/' . $media->getPath();
        
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        
        $this->mediaRepository->remove($media, true);
        
        return true;
    }
    
    public function updateMedia(Media $media, ?string $alt = null, ?string $description = null, ?string $caption = null): Media
    {
        if ($alt !== null) {
            $media->setAlt($alt);
        }
        
        if ($description !== null) {
            $media->setDescription($description);
        }
        
        if ($caption !== null) {
            $media->setCaption($caption);
        }
        
        $media->setUpdatedAt(new \DateTime());
        $this->mediaRepository->save($media, true);
        
        return $media;
    }
    
    public function generateThumbnail(Media $media, int $width = 150, int $height = 150): ?string
    {
        if (!$media->isImage()) {
            return null;
        }
        
        $originalPath = $this->projectDir . '/public/' . $media->getPath();
        if (!file_exists($originalPath)) {
            return null;
        }
        
        $thumbnailDir = $this->getUploadPath() . '/thumbnails';
        $this->ensureDirectoryExists($thumbnailDir);
        
        $thumbnailName = pathinfo($media->getFilename(), PATHINFO_FILENAME) . "_{$width}x{$height}." . $media->getExtension();
        $thumbnailPath = $thumbnailDir . '/' . $thumbnailName;
        
        if (file_exists($thumbnailPath)) {
            return '/' . self::UPLOAD_DIR . '/thumbnails/' . $thumbnailName;
        }
        
        // Créer la miniature
        if ($this->createThumbnail($originalPath, $thumbnailPath, $width, $height)) {
            return '/' . self::UPLOAD_DIR . '/thumbnails/' . $thumbnailName;
        }
        
        return $media->getUrl();
    }
    
    private function validateFile(UploadedFile $file): void
    {
        if (!$file->isValid()) {
            throw new \InvalidArgumentException('Le fichier uploadé n\'est pas valide.');
        }
        
        if ($file->getSize() > self::MAX_FILE_SIZE) {
            throw new \InvalidArgumentException('Le fichier est trop volumineux (max: ' . (self::MAX_FILE_SIZE / 1024 / 1024) . 'MB).');
        }
        
        $extension = $file->guessExtension() ?: $file->getClientOriginalExtension();
        if (!in_array(strtolower($extension), self::ALLOWED_EXTENSIONS)) {
            throw new \InvalidArgumentException('Type de fichier non autorisé.');
        }
    }
    
    private function getUploadPath(): string
    {
        return $this->projectDir . '/public/' . self::UPLOAD_DIR;
    }
    
    private function ensureDirectoryExists(string $directory): void
    {
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }
    
    private function setImageDimensions(Media $media, string $filePath): void
    {
        if (function_exists('getimagesize')) {
            $imageInfo = getimagesize($filePath);
            if ($imageInfo) {
                $media->setWidth($imageInfo[0]);
                $media->setHeight($imageInfo[1]);
            }
        }
    }
    
    private function createThumbnail(string $sourcePath, string $destPath, int $width, int $height): bool
    {
        if (!extension_loaded('gd')) {
            return false;
        }
        
        $imageInfo = getimagesize($sourcePath);
        if (!$imageInfo) {
            return false;
        }
        
        $sourceWidth = $imageInfo[0];
        $sourceHeight = $imageInfo[1];
        $mimeType = $imageInfo['mime'];
        
        // Créer l'image source
        $sourceImage = match($mimeType) {
            'image/jpeg' => imagecreatefromjpeg($sourcePath),
            'image/png' => imagecreatefrompng($sourcePath),
            'image/gif' => imagecreatefromgif($sourcePath),
            'image/webp' => imagecreatefromwebp($sourcePath),
            default => null
        };
        
        if (!$sourceImage) {
            return false;
        }
        
        // Calculer les nouvelles dimensions en conservant le ratio
        $ratio = min($width / $sourceWidth, $height / $sourceHeight);
        $newWidth = intval($sourceWidth * $ratio);
        $newHeight = intval($sourceHeight * $ratio);
        
        // Créer la miniature
        $thumbnail = imagecreatetruecolor($newWidth, $newHeight);
        
        // Préserver la transparence pour PNG et GIF
        if ($mimeType === 'image/png' || $mimeType === 'image/gif') {
            imagealphablending($thumbnail, false);
            imagesavealpha($thumbnail, true);
            $transparent = imagecolorallocatealpha($thumbnail, 255, 255, 255, 127);
            imagefilledrectangle($thumbnail, 0, 0, $newWidth, $newHeight, $transparent);
        }
        
        imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);
        
        // Sauvegarder la miniature
        $result = match($mimeType) {
            'image/jpeg' => imagejpeg($thumbnail, $destPath, 85),
            'image/png' => imagepng($thumbnail, $destPath),
            'image/gif' => imagegif($thumbnail, $destPath),
            'image/webp' => imagewebp($thumbnail, $destPath, 85),
            default => false
        };
        
        imagedestroy($sourceImage);
        imagedestroy($thumbnail);
        
        return $result;
    }
}