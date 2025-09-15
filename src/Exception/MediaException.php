<?php

namespace App\Exception;

/**
 * Exception spécialisée pour les erreurs liées aux médias et uploads
 * 
 * Cette exception est levée lors de problèmes avec les fichiers uploadés,
 * la gestion des médias, ou les opérations sur les fichiers.
 */
class MediaException extends \Exception
{
    /**
     * Code d'erreur pour fichier trop volumineux
     */
    public const FILE_TOO_LARGE = 5001;

    /**
     * Code d'erreur pour type de fichier non autorisé
     */
    public const INVALID_FILE_TYPE = 5002;

    /**
     * Code d'erreur pour fichier corrompu
     */
    public const CORRUPTED_FILE = 5003;

    /**
     * Code d'erreur pour erreur d'upload
     */
    public const UPLOAD_FAILED = 5004;

    /**
     * Code d'erreur pour fichier introuvable
     */
    public const FILE_NOT_FOUND = 5005;

    /**
     * Code d'erreur pour erreur de traitement d'image
     */
    public const IMAGE_PROCESSING_ERROR = 5006;

    /**
     * Code d'erreur pour quota de stockage dépassé
     */
    public const STORAGE_QUOTA_EXCEEDED = 5007;

    /**
     * Code d'erreur pour permissions insuffisantes sur fichier
     */
    public const FILE_PERMISSION_DENIED = 5008;

    /**
     * Constructeur de l'exception média
     *
     * @param string $message Message d'erreur
     * @param int $code Code d'erreur (utiliser les constantes de classe)
     * @param \Throwable|null $previous Exception précédente pour le chaînage
     */
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Crée une exception pour fichier trop volumineux
     *
     * @param string $filename Nom du fichier
     * @param int $size Taille du fichier en bytes
     * @param int $maxSize Taille maximum autorisée en bytes
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function fileTooLarge(string $filename, int $size, int $maxSize, \Throwable $previous = null): self
    {
        $sizeFormatted = self::formatBytes($size);
        $maxSizeFormatted = self::formatBytes($maxSize);
        $message = "Le fichier '{$filename}' est trop volumineux ({$sizeFormatted}). Taille maximum autorisée : {$maxSizeFormatted}";
        return new static($message, self::FILE_TOO_LARGE, $previous);
    }

    /**
     * Crée une exception pour type de fichier non autorisé
     *
     * @param string $filename Nom du fichier
     * @param string $type Type détecté
     * @param array $allowedTypes Types autorisés
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function invalidFileType(string $filename, string $type, array $allowedTypes = [], \Throwable $previous = null): self
    {
        $message = "Le fichier '{$filename}' a un type non autorisé ({$type})";
        if (!empty($allowedTypes)) {
            $message .= ". Types autorisés : " . implode(', ', $allowedTypes);
        }
        return new static($message, self::INVALID_FILE_TYPE, $previous);
    }

    /**
     * Crée une exception pour fichier corrompu
     *
     * @param string $filename Nom du fichier
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function corruptedFile(string $filename, \Throwable $previous = null): self
    {
        $message = "Le fichier '{$filename}' est corrompu ou illisible";
        return new static($message, self::CORRUPTED_FILE, $previous);
    }

    /**
     * Crée une exception pour échec d'upload
     *
     * @param string $filename Nom du fichier
     * @param string $reason Raison de l'échec
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function uploadFailed(string $filename, string $reason = '', \Throwable $previous = null): self
    {
        $message = "Échec de l'upload du fichier '{$filename}'";
        if ($reason) {
            $message .= " : {$reason}";
        }
        return new static($message, self::UPLOAD_FAILED, $previous);
    }

    /**
     * Crée une exception pour fichier introuvable
     *
     * @param string $path Chemin du fichier
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function fileNotFound(string $path, \Throwable $previous = null): self
    {
        $message = "Fichier introuvable : {$path}";
        return new static($message, self::FILE_NOT_FOUND, $previous);
    }

    /**
     * Crée une exception pour erreur de traitement d'image
     *
     * @param string $operation Opération tentée
     * @param string $filename Nom du fichier
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function imageProcessingError(string $operation, string $filename = '', \Throwable $previous = null): self
    {
        $message = "Erreur lors du traitement d'image : {$operation}";
        if ($filename) {
            $message .= " sur le fichier '{$filename}'";
        }
        return new static($message, self::IMAGE_PROCESSING_ERROR, $previous);
    }

    /**
     * Crée une exception pour quota de stockage dépassé
     *
     * @param int $currentUsage Usage actuel en bytes
     * @param int $quota Quota maximum en bytes
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function storageQuotaExceeded(int $currentUsage, int $quota, \Throwable $previous = null): self
    {
        $usageFormatted = self::formatBytes($currentUsage);
        $quotaFormatted = self::formatBytes($quota);
        $message = "Quota de stockage dépassé ({$usageFormatted}/{$quotaFormatted})";
        return new static($message, self::STORAGE_QUOTA_EXCEEDED, $previous);
    }

    /**
     * Crée une exception pour permissions insuffisantes sur fichier
     *
     * @param string $path Chemin du fichier
     * @param string $operation Opération tentée
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function filePermissionDenied(string $path, string $operation = '', \Throwable $previous = null): self
    {
        $message = "Permissions insuffisantes sur le fichier : {$path}";
        if ($operation) {
            $message .= " pour l'opération : {$operation}";
        }
        return new static($message, self::FILE_PERMISSION_DENIED, $previous);
    }

    /**
     * Formate la taille en bytes en format lisible
     *
     * @param int $bytes Taille en bytes
     * @return string Taille formatée
     */
    private static function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
