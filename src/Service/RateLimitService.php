<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * Service de gestion du rate limiting pour l'application
 * Centralise la logique de limitation des requêtes pour différents endpoints
 */
class RateLimitService
{
    private array $limiters = [];

    public function __construct(
        private RateLimiterFactory $loginLimiter,
        private RateLimiterFactory $apiLimiter,
        private RateLimiterFactory $adminSensitiveLimiter,
        private RateLimiterFactory $contentModificationLimiter,
        private RateLimiterFactory $mediaUploadLimiter,
        private RateLimiterFactory $passwordResetLimiter,
        private RateLimiterFactory $searchLimiter,
        private RateLimiterFactory $securityStrictLimiter,
        private Security $security
    ) {
        $this->limiters = [
            'login' => $this->loginLimiter,
            'api' => $this->apiLimiter,
            'admin_sensitive' => $this->adminSensitiveLimiter,
            'content_modification' => $this->contentModificationLimiter,
            'media_upload' => $this->mediaUploadLimiter,
            'password_reset' => $this->passwordResetLimiter,
            'search' => $this->searchLimiter,
            'security_strict' => $this->securityStrictLimiter,
        ];
    }

    /**
     * Applique une limitation de requêtes pour un type donné
     *
     * @param string $limiterType Type de limiteur à utiliser
     * @param Request $request Requête HTTP courante
     * @param string|null $identifier Identifiant personnalisé (par défaut: IP)
     * @throws TooManyRequestsHttpException Si la limite est dépassée
     */
    public function checkLimit(string $limiterType, Request $request, ?string $identifier = null): void
    {
        if (!isset($this->limiters[$limiterType])) {
            throw new \InvalidArgumentException(sprintf('Limiteur "%s" non défini', $limiterType));
        }

        $limiter = $this->limiters[$limiterType];
        
        // Génère un identifiant unique basé sur l'IP et optionnellement l'utilisateur
        $key = $this->generateLimiterKey($request, $identifier);
        
        $limit = $limiter->create($key);
        
        if (!$limit->consume()->isAccepted()) {
            $retryAfter = $limit->getRetryAfter();
            
            throw new TooManyRequestsHttpException(
                $retryAfter->getTimestamp() - time(),
                sprintf(
                    'Trop de requêtes pour le type "%s". Veuillez réessayer dans %d secondes.',
                    $limiterType,
                    $retryAfter->getTimestamp() - time()
                )
            );
        }
    }

    /**
     * Vérifie si une limitation est proche d'être atteinte
     *
     * @param string $limiterType Type de limiteur
     * @param Request $request Requête HTTP courante
     * @param string|null $identifier Identifiant personnalisé
     * @param int $threshold Seuil d'alerte (pourcentage)
     * @return bool True si le seuil est atteint
     */
    public function isNearLimit(string $limiterType, Request $request, ?string $identifier = null, int $threshold = 80): bool
    {
        if (!isset($this->limiters[$limiterType])) {
            return false;
        }

        $limiter = $this->limiters[$limiterType];
        $key = $this->generateLimiterKey($request, $identifier);
        $limit = $limiter->create($key);
        
        $remaining = $limit->getRemainingTokens();
        $total = $limit->getLimit();
        
        $usagePercent = (($total - $remaining) / $total) * 100;
        
        return $usagePercent >= $threshold;
    }

    /**
     * Obtient les informations sur l'état actuel d'une limitation
     *
     * @param string $limiterType Type de limiteur
     * @param Request $request Requête HTTP courante
     * @param string|null $identifier Identifiant personnalisé
     * @return array Informations sur la limitation
     */
    public function getLimitInfo(string $limiterType, Request $request, ?string $identifier = null): array
    {
        if (!isset($this->limiters[$limiterType])) {
            return [];
        }

        $limiter = $this->limiters[$limiterType];
        $key = $this->generateLimiterKey($request, $identifier);
        $limit = $limiter->create($key);
        
        return [
            'limit' => $limit->getLimit(),
            'remaining' => $limit->getRemainingTokens(),
            'reset_time' => $limit->getRetryAfter()?->getTimestamp(),
            'window' => $limit->getWindow(),
        ];
    }

    /**
     * Génère une clé unique pour le limiteur
     *
     * @param Request $request Requête HTTP courante
     * @param string|null $identifier Identifiant personnalisé
     * @return string Clé unique
     */
    private function generateLimiterKey(Request $request, ?string $identifier = null): string
    {
        $baseKey = $request->getClientIp();
        
        // Ajoute l'identifiant utilisateur si authentifié
        $user = $this->security->getUser();
        if ($user && method_exists($user, 'getUserIdentifier')) {
            $baseKey .= '_' . $user->getUserIdentifier();
        }
        
        // Ajoute l'identifiant personnalisé si fourni
        if ($identifier) {
            $baseKey .= '_' . $identifier;
        }
        
        return hash('sha256', $baseKey);
    }

    /**
     * Réinitialise manuellement une limitation (utile pour les tests ou administration)
     *
     * @param string $limiterType Type de limiteur
     * @param Request $request Requête HTTP courante
     * @param string|null $identifier Identifiant personnalisé
     */
    public function resetLimit(string $limiterType, Request $request, ?string $identifier = null): void
    {
        if (!isset($this->limiters[$limiterType])) {
            return;
        }

        $limiter = $this->limiters[$limiterType];
        $key = $this->generateLimiterKey($request, $identifier);
        $limit = $limiter->create($key);
        
        $limit->reset();
    }
}