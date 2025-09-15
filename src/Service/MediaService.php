<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\User;
use App\Exception\MediaException;
use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class MediaService
{
    private const UPLOAD_DIR = 'uploads';
    private const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB
    private const ALLOWED_EXTENSIONS = [
        'jpg', 'jpeg', 'png', 'gif', 'webp',
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx',
        'mp4', 'avi', 'mov', 'webm',
        'mp3', 'wav', 'ogg'
    ];
    
    private const ALLOWED_MIME_TYPES = [
        'image/jpeg', 'image/png', 'image/gif', 'image/webp',
        'application/pdf',
        'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'video/mp4', 'video/x-msvideo', 'video/quicktime', 'video/webm',
        'audio/mpeg', 'audio/wav', 'audio/ogg'
    ];
    
    private const MALICIOUS_PATTERNS = [
        '/<\?php/', // PHP tags
        '/<script/', // JavaScript
        '/javascript:/', // JavaScript protocol
        '/vbscript:/', // VBScript protocol
        '/data:/', // Data URLs
        '/<iframe/', // iframes
        '/<object/', // objects
        '/<embed/', // embeds
        '/<form/', // forms
        '/\x00/', // null bytes
        '/\.\.\//', // directory traversal
        '/\.\.\\\\//' // Windows path traversal
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
        $this->validateFileName($originalName);
        
        $extension = $file->guessExtension() ?: $file->getClientOriginalExtension();
        
        try {
            // Validation du type MIME réel avec finfo
            $this->validateMimeType($file);
            
            // Scan du contenu malveillant
            $this->scanMaliciousContent($file);
        } catch (MediaException $e) {
            // Si la validation échoue à cause d'un fichier temporaire inaccessible,
            // on tente une validation alternative moins stricte
            if (strpos($e->getMessage(), 'temporaire') !== false) {
                $this->validateFileAlternative($file);
            } else {
                throw $e;
            }
        }
        
        // Générer un nom de fichier unique et sécurisé
        $safeFilename = $this->generateSafeFilename($originalName);
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
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier uploadé n\'est pas valide');
        }
        
        // Vérifier que le fichier temporaire existe et est lisible
        $tempPath = $file->getPathname();
        if (!file_exists($tempPath) || !is_readable($tempPath)) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier temporaire n\'existe pas ou n\'est pas lisible');
        }
        
        if ($file->getSize() > self::MAX_FILE_SIZE) {
            throw MediaException::fileTooLarge($file->getClientOriginalName(), $file->getSize(), self::MAX_FILE_SIZE);
        }
        
        $extension = $file->guessExtension() ?: $file->getClientOriginalExtension();
        if (!in_array(strtolower($extension), self::ALLOWED_EXTENSIONS)) {
            throw MediaException::invalidFileType($file->getClientOriginalName(), $extension, self::ALLOWED_EXTENSIONS);
        }
    }
    
    private function validateFileName(string $fileName): void
    {
        // Validation stricte du nom de fichier
        if (empty($fileName)) {
            throw MediaException::uploadFailed($fileName, 'Le nom de fichier ne peut pas être vide');
        }
        
        // Vérifier la longueur
        if (strlen($fileName) > 255) {
            throw MediaException::uploadFailed($fileName, 'Le nom de fichier est trop long (max: 255 caractères)');
        }
        
        // Vérifier les caractères interdits et le path traversal
        if (preg_match('/[\x00-\x1f\x7f<>:"|\?\*\\\\\/%]/', $fileName)) {
            throw MediaException::uploadFailed($fileName, 'Le nom de fichier contient des caractères interdits');
        }
        
        // Protection contre path traversal
        if (strpos($fileName, '..') !== false || strpos($fileName, './') !== false || strpos($fileName, '.\\') !== false) {
            throw MediaException::uploadFailed($fileName, 'Le nom de fichier contient des séquences de traversée de répertoire interdites');
        }
        
        // Vérifier que ce n'est pas un nom de fichier système Windows
        $reservedNames = ['CON', 'PRN', 'AUX', 'NUL', 'COM1', 'COM2', 'COM3', 'COM4', 'COM5', 'COM6', 'COM7', 'COM8', 'COM9', 'LPT1', 'LPT2', 'LPT3', 'LPT4', 'LPT5', 'LPT6', 'LPT7', 'LPT8', 'LPT9'];
        $fileNameUpper = strtoupper(pathinfo($fileName, PATHINFO_FILENAME));
        if (in_array($fileNameUpper, $reservedNames)) {
            throw MediaException::uploadFailed($fileName, 'Le nom de fichier utilise un nom réservé du système');
        }
    }
    
    private function validateMimeType(UploadedFile $file): void
    {
        // Validation du MIME type réel avec finfo
        if (!function_exists('finfo_open')) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Extension finfo non disponible pour la validation');
        }
        
        $tempPath = $file->getPathname();
        
        // Vérifier à nouveau que le fichier temporaire est accessible
        if (!file_exists($tempPath) || !is_readable($tempPath)) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier temporaire n\'est pas accessible pour la validation MIME');
        }
        
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (!$finfo) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Impossible d\'initialiser la validation du type MIME');
        }
        
        $realMimeType = finfo_file($finfo, $tempPath);
        finfo_close($finfo);
        
        if (!$realMimeType) {
            throw MediaException::corruptedFile($file->getClientOriginalName());
        }
        
        // Vérifier que le type MIME réel est autorisé
        if (!in_array($realMimeType, self::ALLOWED_MIME_TYPES)) {
            throw MediaException::invalidFileType($file->getClientOriginalName(), $realMimeType, self::ALLOWED_MIME_TYPES);
        }
        
        // Vérifier la cohérence entre extension et MIME type
        $extension = strtolower($file->guessExtension() ?: $file->getClientOriginalExtension());
        if (!$this->isMimeTypeConsistentWithExtension($realMimeType, $extension)) {
            throw MediaException::corruptedFile($file->getClientOriginalName());
        }
    }
    
    private function scanMaliciousContent(UploadedFile $file): void
    {
        $tempPath = $file->getPathname();
        
        // Vérifier que le fichier temporaire est accessible
        if (!file_exists($tempPath) || !is_readable($tempPath)) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier temporaire n\'est pas accessible pour le scan de sécurité');
        }
        
        // Lire le début du fichier pour détecter du contenu malveillant
        $handle = fopen($tempPath, 'r');
        if (!$handle) {
            throw MediaException::filePermissionDenied($tempPath, 'lecture pour analyse de sécurité');
        }
        
        $content = fread($handle, 8192); // Lire les 8KB premiers
        fclose($handle);
        
        if ($content === false) {
            throw MediaException::corruptedFile($file->getClientOriginalName());
        }
        
        // Vérifier les patterns malveillants
        foreach (self::MALICIOUS_PATTERNS as $pattern) {
            if (preg_match($pattern, $content)) {
                throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier contient du contenu potentiellement malveillant');
            }
        }
        
        // Vérification spécifique pour les images
        $mimeType = $file->getMimeType();
        if (strpos($mimeType, 'image/') === 0) {
            $this->validateImageContent($file);
        }
    }
    
    private function validateImageContent(UploadedFile $file): void
    {
        $tempPath = $file->getPathname();
        
        // Vérifier que le fichier temporaire est accessible
        if (!file_exists($tempPath) || !is_readable($tempPath)) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Le fichier temporaire n\'est pas accessible pour la validation d\'image');
        }
        
        // Vérifier que le fichier est vraiment une image valide
        $imageInfo = @getimagesize($tempPath);
        if (!$imageInfo) {
            throw MediaException::corruptedFile($file->getClientOriginalName());
        }
        
        // Vérifier les métadonnées EXIF pour détecter du contenu suspect
        if (function_exists('exif_read_data') && in_array($imageInfo['mime'], ['image/jpeg', 'image/tiff'])) {
            $exifData = @exif_read_data($tempPath);
            if ($exifData && isset($exifData['Comments'])) {
                foreach (self::MALICIOUS_PATTERNS as $pattern) {
                    if (preg_match($pattern, $exifData['Comments'])) {
                        throw MediaException::uploadFailed($file->getClientOriginalName(), 'Les métadonnées de l\'image contiennent du contenu suspect');
                    }
                }
            }
        }
    }
    
    private function isMimeTypeConsistentWithExtension(string $mimeType, string $extension): bool
    {
        $mimeToExtension = [
            'image/jpeg' => ['jpg', 'jpeg'],
            'image/png' => ['png'],
            'image/gif' => ['gif'],
            'image/webp' => ['webp'],
            'application/pdf' => ['pdf'],
            'application/msword' => ['doc'],
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => ['docx'],
            'application/vnd.ms-excel' => ['xls'],
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => ['xlsx'],
            'application/vnd.ms-powerpoint' => ['ppt'],
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => ['pptx'],
            'video/mp4' => ['mp4'],
            'video/x-msvideo' => ['avi'],
            'video/quicktime' => ['mov'],
            'video/webm' => ['webm'],
            'audio/mpeg' => ['mp3'],
            'audio/wav' => ['wav'],
            'audio/ogg' => ['ogg']
        ];
        
        return isset($mimeToExtension[$mimeType]) && in_array($extension, $mimeToExtension[$mimeType]);
    }
    
    private function generateSafeFilename(string $originalName): string
    {
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        
        // Supprimer tous les caractères non alphanumériques sauf tirets et underscores
        $safeFilename = preg_replace('/[^a-zA-Z0-9\-_]/', '', $filename);
        
        // Limiter la longueur
        $safeFilename = substr($safeFilename, 0, 50);
        
        // S'assurer qu'il n'est pas vide
        if (empty($safeFilename)) {
            $safeFilename = 'fichier';
        }
        
        return $this->slugger->slug($safeFilename);
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
    
    /**
     * Validation alternative pour les cas où le fichier temporaire n'est pas accessible
     */
    private function validateFileAlternative(UploadedFile $file): void
    {
        // Validation basique sans accès au fichier temporaire
        $mimeType = $file->getClientMimeType();
        $extension = strtolower($file->guessExtension() ?: $file->getClientOriginalExtension());
        
        // Vérifier que le type MIME déclaré est autorisé
        if (!in_array($mimeType, self::ALLOWED_MIME_TYPES)) {
            throw MediaException::invalidFileType($file->getClientOriginalName(), $mimeType, self::ALLOWED_MIME_TYPES);
        }
        
        // Vérifier la cohérence entre extension et MIME type déclaré
        if (!$this->isMimeTypeConsistentWithExtension($mimeType, $extension)) {
            throw MediaException::uploadFailed($file->getClientOriginalName(), 'Incohérence entre l\'extension et le type MIME déclaré');
        }
        
        // Log d'avertissement pour indiquer que la validation stricte a été contournée
        error_log("MediaService: Validation alternative utilisée pour " . $file->getClientOriginalName() . " (fichier temporaire inaccessible)");
    }
}