<?php

namespace App\Service;

use App\Exception\SecurityException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\IpUtils;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * Service de sécurité pour la validation IP et User-Agent
 * Gère les contrôles de sécurité des requêtes entrantes
 */
class SecurityService
{
    private const SUSPICIOUS_USER_AGENTS = [
        'wget',
        'curl',
        'python-requests',
        'bot',
        'crawler',
        'spider',
        'scraper',
        'scanner',
        'nikto',
        'sqlmap',
        'nmap',
    ];

    private const BLOCKED_IP_PATTERNS = [
        // Exemple de patterns d'IP bloquées (à configurer selon vos besoins)
        // '192.168.1.0/24',
        // '10.0.0.0/8',
    ];

    private const ALLOWED_IP_PATTERNS = [
        // Exemple de patterns d'IP autorisées (à configurer selon vos besoins)
        // '127.0.0.1/32',
        // '::1/128',
    ];

    private ?AuditService $auditService = null;

    public function __construct(
        private LoggerInterface $logger,
        private Security $security
    ) {
    }

    /**
     * Injecte le service d'audit (injection optionnelle pour éviter les dépendances circulaires)
     *
     * @param AuditService $auditService
     */
    public function setAuditService(AuditService $auditService): void
    {
        $this->auditService = $auditService;
    }

    /**
     * Valide l'adresse IP de la requête
     *
     * @param Request $request
     * @throws SecurityException Si l'IP n'est pas autorisée
     */
    public function validateIp(Request $request): void
    {
        $clientIp = $request->getClientIp();
        
        if (!$clientIp) {
            $this->logger->warning('Requête sans IP client détectable', [
                'request_uri' => $request->getRequestUri(),
                'user_agent' => $request->headers->get('User-Agent'),
            ]);
            throw SecurityException::unauthorizedAccess('IP client non détectable');
        }

        // Vérification des IP bloquées
        foreach (self::BLOCKED_IP_PATTERNS as $pattern) {
            if (IpUtils::checkIp($clientIp, $pattern)) {
                $context = [
                    'ip' => $clientIp,
                    'pattern' => $pattern,
                    'request_uri' => $request->getRequestUri(),
                ];
                
                $this->logger->warning('IP bloquée détectée', $context);
                
                if ($this->auditService) {
                    $this->auditService->logSecurity('ip_blocked', $context);
                }
                
                throw SecurityException::unauthorizedAccess("IP bloquée : {$clientIp}");
            }
        }

        // Si des IP spécifiques sont autorisées, vérifier
        if (!empty(self::ALLOWED_IP_PATTERNS)) {
            $isAllowed = false;
            foreach (self::ALLOWED_IP_PATTERNS as $pattern) {
                if (IpUtils::checkIp($clientIp, $pattern)) {
                    $isAllowed = true;
                    break;
                }
            }
            
            if (!$isAllowed) {
                $context = [
                    'ip' => $clientIp,
                    'request_uri' => $request->getRequestUri(),
                ];
                
                $this->logger->warning('IP non whitelistée', $context);
                
                if ($this->auditService) {
                    $this->auditService->logSecurity('ip_not_whitelisted', $context);
                }
                
                throw SecurityException::unauthorizedAccess("IP non autorisée : {$clientIp}");
            }
        }
    }

    /**
     * Valide le User-Agent de la requête
     *
     * @param Request $request
     * @throws SecurityException Si le User-Agent est suspect ou invalide
     */
    public function validateUserAgent(Request $request): void
    {
        $userAgent = $request->headers->get('User-Agent', '');

        // User-Agent vide ou absent
        if (empty($userAgent)) {
            $context = [
                'ip' => $request->getClientIp(),
                'request_uri' => $request->getRequestUri(),
            ];
            
            $this->logger->warning('User-Agent vide détecté', $context);
            
            if ($this->auditService) {
                $this->auditService->logSecurity('empty_user_agent', $context);
            }
            
            throw SecurityException::authenticationFailed('User-Agent manquant ou vide');
        }

        // User-Agent trop court (potentiellement suspect)
        if (strlen($userAgent) < 10) {
            $context = [
                'ip' => $request->getClientIp(),
                'user_agent' => $userAgent,
                'request_uri' => $request->getRequestUri(),
            ];
            
            $this->logger->warning('User-Agent suspect (trop court)', $context);
            
            if ($this->auditService) {
                $this->auditService->logSecurity('suspicious_short_user_agent', $context);
            }
            
            throw SecurityException::authenticationFailed("User-Agent suspect (trop court) : {$userAgent}");
        }

        // Vérification des User-Agents suspects
        $userAgentLower = strtolower($userAgent);
        foreach (self::SUSPICIOUS_USER_AGENTS as $suspiciousPattern) {
            if (strpos($userAgentLower, $suspiciousPattern) !== false) {
                $context = [
                    'ip' => $request->getClientIp(),
                    'user_agent' => $userAgent,
                    'pattern_matched' => $suspiciousPattern,
                    'request_uri' => $request->getRequestUri(),
                ];
                
                $this->logger->warning('User-Agent suspect détecté', $context);
                
                if ($this->auditService) {
                    $this->auditService->logSecurity('suspicious_user_agent', $context);
                }
                
                throw SecurityException::authenticationFailed("User-Agent suspect détecté : {$userAgent} (pattern : {$suspiciousPattern})");
            }
        }
    }

    /**
     * Effectue une validation complète de la requête (IP + User-Agent)
     *
     * @param Request $request
     * @throws SecurityException Si la requête n'est pas valide
     */
    public function validateRequest(Request $request): void
    {
        try {
            // Validation IP (lance une exception si invalide)
            $this->validateIp($request);
            
            // Validation User-Agent (lance une exception si invalide)
            $this->validateUserAgent($request);

            // Vérifications additionnelles
            $this->performAdditionalSecurityChecks($request);

        } catch (SecurityException $e) {
            // Re-lancer l'exception de sécurité
            throw $e;
        } catch (\Exception $e) {
            // Transformer toute autre exception en SecurityException
            throw SecurityException::authenticationFailed('Erreur lors de la validation de la requête : ' . $e->getMessage(), $e);
        }
    }

    /**
     * Version legacy qui retourne un tableau pour la rétrocompatibilité
     * @deprecated Utilisez validateRequest() à la place
     */
    public function validateRequestLegacy(Request $request): array
    {
        $result = [
            'is_valid' => true,
            'errors' => [],
            'warnings' => [],
        ];

        try {
            $this->validateRequest($request);
        } catch (SecurityException $e) {
            $result['is_valid'] = false;
            $result['errors'][] = $e->getMessage();
        }

        return $result;
    }

    /**
     * Vérifie si une IP est dans une liste noire locale
     *
     * @param string $ip
     * @return bool
     */
    public function isIpBlacklisted(string $ip): bool
    {
        // Ici vous pourriez intégrer une base de données de réputation IP
        // ou des services externes comme AbuseIPDB, MaxMind, etc.
        
        foreach (self::BLOCKED_IP_PATTERNS as $pattern) {
            if (IpUtils::checkIp($ip, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Analyse le User-Agent pour détecter des patterns suspects
     *
     * @param string $userAgent
     * @return array
     */
    public function analyzeUserAgent(string $userAgent): array
    {
        $analysis = [
            'is_suspicious' => false,
            'is_bot' => false,
            'is_browser' => false,
            'confidence' => 0,
            'details' => [],
        ];

        if (empty($userAgent)) {
            $analysis['is_suspicious'] = true;
            $analysis['details'][] = 'User-Agent vide';
            return $analysis;
        }

        // Détection de bots légitimes
        $legitimateBots = ['googlebot', 'bingbot', 'facebookbot', 'twitterbot'];
        foreach ($legitimateBots as $bot) {
            if (stripos($userAgent, $bot) !== false) {
                $analysis['is_bot'] = true;
                $analysis['details'][] = "Bot légitime détecté: {$bot}";
                break;
            }
        }

        // Détection de navigateurs
        $browsers = ['chrome', 'firefox', 'safari', 'edge', 'opera'];
        foreach ($browsers as $browser) {
            if (stripos($userAgent, $browser) !== false) {
                $analysis['is_browser'] = true;
                $analysis['details'][] = "Navigateur détecté: {$browser}";
                break;
            }
        }

        // Détection d'outils suspects
        foreach (self::SUSPICIOUS_USER_AGENTS as $suspicious) {
            if (stripos($userAgent, $suspicious) !== false) {
                $analysis['is_suspicious'] = true;
                $analysis['details'][] = "Pattern suspect: {$suspicious}";
                break;
            }
        }

        // Calcul du score de confiance
        if ($analysis['is_browser']) {
            $analysis['confidence'] += 70;
        }
        if ($analysis['is_bot'] && !$analysis['is_suspicious']) {
            $analysis['confidence'] += 50;
        }
        if ($analysis['is_suspicious']) {
            $analysis['confidence'] = max(0, $analysis['confidence'] - 80);
        }

        return $analysis;
    }

    /**
     * Vérifications de sécurité supplémentaires
     *
     * @param Request $request
     * @throws SecurityException Si des éléments suspects sont détectés
     */
    private function performAdditionalSecurityChecks(Request $request): void
    {
        // Vérification de headers suspects
        $suspiciousHeaders = [
            'X-Forwarded-For',
            'X-Real-IP',
            'X-Originating-IP',
        ];

        foreach ($suspiciousHeaders as $header) {
            if ($request->headers->has($header)) {
                $headerValue = $request->headers->get($header);
                if ($this->containsSuspiciousContent($headerValue)) {
                    $context = [
                        'header' => $header,
                        'value' => $headerValue,
                        'ip' => $request->getClientIp(),
                    ];
                    
                    $this->logger->warning('Header suspect détecté', $context);
                    
                    if ($this->auditService) {
                        $this->auditService->logSecurity('suspicious_header', $context);
                    }
                    
                    throw SecurityException::authenticationFailed("Header suspect détecté : {$header} = {$headerValue}");
                }
            }
        }

        // Vérification de la cohérence des headers
        $this->validateHeaderConsistency($request);
    }

    /**
     * Vérifie si le contenu contient des éléments suspects
     *
     * @param string $content
     * @return bool
     */
    private function containsSuspiciousContent(string $content): bool
    {
        $suspiciousPatterns = [
            '/(\d+\.){3}\d+/',  // Multiples IP
            '/[<>"\']/',         // Caractères de script
            '/union\s+select/i', // SQL injection
            '/<script/i',        // XSS
        ];

        foreach ($suspiciousPatterns as $pattern) {
            if (preg_match($pattern, $content)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Valide la cohérence entre différents headers
     *
     * @param Request $request
     * @throws SecurityException Si des incohérences flagrantes sont détectées
     */
    private function validateHeaderConsistency(Request $request): void
    {
        // Exemple : vérifier la cohérence Accept-Language vs User-Agent
        $acceptLanguage = $request->headers->get('Accept-Language', '');
        $userAgent = $request->headers->get('User-Agent', '');

        // Détection d'incohérences flagrantes (exemple basique)
        if (stripos($userAgent, 'firefox') !== false && 
            stripos($acceptLanguage, 'en-US') === false && 
            !empty($acceptLanguage)) {
            // Pour l'instant, on log seulement car c'est un cas limite
            $this->logger->info('Incohérence potentielle entre User-Agent et Accept-Language', [
                'user_agent' => $userAgent,
                'accept_language' => $acceptLanguage,
                'ip' => $request->getClientIp(),
            ]);
        }
    }

    /**
     * Génère un score de risque pour une requête
     *
     * @param Request $request
     * @return int Score de 0 (sûr) à 100 (très risqué)
     */
    public function calculateRiskScore(Request $request): int
    {
        $score = 0;

        // Validation IP
        if (!$this->validateIp($request)) {
            $score += 40;
        }

        // Analyse User-Agent
        $userAgent = $request->headers->get('User-Agent', '');
        $uaAnalysis = $this->analyzeUserAgent($userAgent);
        
        if ($uaAnalysis['is_suspicious']) {
            $score += 30;
        }

        if (empty($userAgent)) {
            $score += 20;
        }

        // Vérifications supplémentaires
        if ($request->headers->has('X-Forwarded-For')) {
            $score += 10;
        }

        // Headers manquants typiques d'un navigateur
        $expectedHeaders = ['Accept', 'Accept-Language', 'Accept-Encoding'];
        foreach ($expectedHeaders as $header) {
            if (!$request->headers->has($header)) {
                $score += 5;
            }
        }

        return min(100, $score);
    }

    /**
     * Vérifie l'authentification d'un utilisateur avec gestion d'exception
     *
     * @param mixed $user
     * @param string $context Contexte de la vérification
     * @throws SecurityException Si l'utilisateur n'est pas authentifié ou autorisé
     */
    public function requireAuthentication($user, string $context = ''): void
    {
        if (!$user) {
            throw SecurityException::authenticationFailed($context ? "Authentification requise pour : {$context}" : 'Authentification requise');
        }
    }

    /**
     * Vérifie les permissions d'un utilisateur avec gestion d'exception
     *
     * @param mixed $user
     * @param string $permission Permission requise
     * @param string $resource Ressource concernée (optionnel)
     * @throws SecurityException Si l'utilisateur n'a pas les permissions requises
     */
    public function requirePermission($user, string $permission, string $resource = ''): void
    {
        if (!$user) {
            throw SecurityException::authenticationFailed('Utilisateur non authentifié');
        }

        // Ici vous pouvez implémenter votre logique de vérification des permissions
        // Exemple basique pour démonstration
        if (method_exists($user, 'hasPermission') && !$user->hasPermission($permission)) {
            $message = $resource ? 
                "Permission '{$permission}' requise pour accéder à '{$resource}'" :
                "Permission '{$permission}' requise";
            throw SecurityException::insufficientPermissions($message);
        }
    }

    /**
     * Valide un token avec gestion d'exception
     *
     * @param string $token Token à valider
     * @param string $expectedType Type de token attendu
     * @throws SecurityException Si le token est invalide
     */
    public function validateToken(string $token, string $expectedType = ''): void
    {
        if (empty($token)) {
            throw SecurityException::invalidToken($expectedType ?: 'token');
        }

        // Ici vous pouvez implémenter votre logique de validation de token
        // Exemple basique pour démonstration
        if (strlen($token) < 32) {
            throw SecurityException::invalidToken($expectedType ?: 'token');
        }
    }
}
