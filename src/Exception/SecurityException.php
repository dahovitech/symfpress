<?php

namespace App\Exception;

/**
 * Exception spécialisée pour les erreurs liées à la sécurité
 * 
 * Cette exception est levée lorsque des problèmes de sécurité sont détectés,
 * tels que des tentatives d'accès non autorisé, des erreurs d'authentification
 * ou de validation des permissions.
 */
class SecurityException extends \Exception
{
    /**
     * Code d'erreur pour accès non autorisé
     */
    public const UNAUTHORIZED_ACCESS = 4001;

    /**
     * Code d'erreur pour authentification échouée
     */
    public const AUTHENTICATION_FAILED = 4002;

    /**
     * Code d'erreur pour permissions insuffisantes
     */
    public const INSUFFICIENT_PERMISSIONS = 4003;

    /**
     * Code d'erreur pour token invalide ou expiré
     */
    public const INVALID_TOKEN = 4004;

    /**
     * Code d'erreur pour tentative de CSRF
     */
    public const CSRF_ATTACK = 4005;

    /**
     * Constructeur de l'exception de sécurité
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
     * Crée une exception pour accès non autorisé
     *
     * @param string $resource Ressource tentée d'être accédée
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function unauthorizedAccess(string $resource = '', \Throwable $previous = null): self
    {
        $message = $resource ? "Accès non autorisé à la ressource : {$resource}" : "Accès non autorisé";
        return new static($message, self::UNAUTHORIZED_ACCESS, $previous);
    }

    /**
     * Crée une exception pour échec d'authentification
     *
     * @param string $details Détails de l'échec
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function authenticationFailed(string $details = '', \Throwable $previous = null): self
    {
        $message = $details ? "Échec de l'authentification : {$details}" : "Échec de l'authentification";
        return new static($message, self::AUTHENTICATION_FAILED, $previous);
    }

    /**
     * Crée une exception pour permissions insuffisantes
     *
     * @param string $action Action tentée
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function insufficientPermissions(string $action = '', \Throwable $previous = null): self
    {
        $message = $action ? "Permissions insuffisantes pour : {$action}" : "Permissions insuffisantes";
        return new static($message, self::INSUFFICIENT_PERMISSIONS, $previous);
    }

    /**
     * Crée une exception pour token invalide
     *
     * @param string $tokenType Type de token
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function invalidToken(string $tokenType = '', \Throwable $previous = null): self
    {
        $message = $tokenType ? "Token {$tokenType} invalide ou expiré" : "Token invalide ou expiré";
        return new static($message, self::INVALID_TOKEN, $previous);
    }

    /**
     * Crée une exception pour tentative de CSRF
     *
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function csrfAttack(\Throwable $previous = null): self
    {
        return new static("Tentative d'attaque CSRF détectée", self::CSRF_ATTACK, $previous);
    }
}
