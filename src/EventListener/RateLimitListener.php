<?php

namespace App\EventListener;

use App\Service\RateLimitService;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Psr\Log\LoggerInterface;

/**
 * Event Listener pour appliquer automatiquement le rate limiting
 * selon les routes et les types d'actions
 */
#[AsEventListener(event: KernelEvents::REQUEST, priority: 10)]
class RateLimitListener
{
    public function __construct(
        private RateLimitService $rateLimitService,
        private LoggerInterface $logger
    ) {}

    /**
     * Applique le rate limiting sur les requêtes entrantes
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        // Ignore les sous-requêtes
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $pathInfo = $request->getPathInfo();
        $method = $request->getMethod();

        try {
            // Applique les limitations selon les routes
            $this->applyRouteBasedLimiting($request, $pathInfo, $method);
        } catch (TooManyRequestsHttpException $e) {
            // Log les tentatives de dépassement de limite
            $this->logger->warning('Rate limit exceeded', [
                'ip' => $request->getClientIp(),
                'path' => $pathInfo,
                'method' => $method,
                'user_agent' => $request->headers->get('User-Agent'),
                'message' => $e->getMessage()
            ]);
            
            throw $e;
        }
    }

    /**
     * Applique les limitations selon les routes spécifiques
     */
    private function applyRouteBasedLimiting(Request $request, string $pathInfo, string $method): void
    {
        // Limitation pour les tentatives de connexion
        if ($this->isLoginAttempt($pathInfo, $method)) {
            $this->rateLimitService->checkLimit('login', $request);
            return;
        }

        // Limitation stricte pour les requêtes de réinitialisation de mot de passe
        if ($this->isPasswordResetAttempt($pathInfo, $method)) {
            $this->rateLimitService->checkLimit('password_reset', $request);
            return;
        }

        // Limitation pour les routes API
        if ($this->isApiRoute($pathInfo)) {
            $this->rateLimitService->checkLimit('api', $request);
            return;
        }

        // Limitation pour les actions administratives sensibles
        if ($this->isAdminSensitiveAction($pathInfo, $method)) {
            $this->rateLimitService->checkLimit('admin_sensitive', $request);
            return;
        }

        // Limitation pour les modifications de contenu
        if ($this->isContentModificationAction($pathInfo, $method)) {
            $this->rateLimitService->checkLimit('content_modification', $request);
            return;
        }

        // Limitation pour les uploads de médias
        if ($this->isMediaUploadAction($pathInfo, $method)) {
            $this->rateLimitService->checkLimit('media_upload', $request);
            return;
        }

        // Limitation pour les recherches
        if ($this->isSearchAction($pathInfo, $method)) {
            $this->rateLimitService->checkLimit('search', $request);
            return;
        }
    }

    /**
     * Détermine si c'est une tentative de connexion
     */
    private function isLoginAttempt(string $pathInfo, string $method): bool
    {
        return $method === 'POST' && (
            $pathInfo === '/login' ||
            str_starts_with($pathInfo, '/login/') ||
            str_contains($pathInfo, 'authenticate')
        );
    }

    /**
     * Détermine si c'est une tentative de réinitialisation de mot de passe
     */
    private function isPasswordResetAttempt(string $pathInfo, string $method): bool
    {
        return $method === 'POST' && (
            str_contains($pathInfo, 'password-reset') ||
            str_contains($pathInfo, 'forgot-password') ||
            str_contains($pathInfo, 'reset-password')
        );
    }

    /**
     * Détermine si c'est une route API
     */
    private function isApiRoute(string $pathInfo): bool
    {
        return str_starts_with($pathInfo, '/api/');
    }

    /**
     * Détermine si c'est une action administrative sensible
     */
    private function isAdminSensitiveAction(string $pathInfo, string $method): bool
    {
        if (!str_starts_with($pathInfo, '/admin/')) {
            return false;
        }

        // Actions sensibles : suppression, modification des utilisateurs, paramètres système
        $sensitivePatterns = [
            '/admin/user.*/(delete|edit)',
            '/admin/settings',
            '/admin/system',
            '/admin/.*/delete',
            '/admin/permissions',
            '/admin/roles'
        ];

        foreach ($sensitivePatterns as $pattern) {
            if (preg_match('#' . $pattern . '#', $pathInfo)) {
                return in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE']);
            }
        }

        return false;
    }

    /**
     * Détermine si c'est une action de modification de contenu
     */
    private function isContentModificationAction(string $pathInfo, string $method): bool
    {
        if (!in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            return false;
        }

        $contentPatterns = [
            '/admin/post',
            '/admin/page',
            '/admin/category',
            '/admin/tag',
            '/admin/menu',
            '/admin/comment'
        ];

        foreach ($contentPatterns as $pattern) {
            if (str_starts_with($pathInfo, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Détermine si c'est un upload de média
     */
    private function isMediaUploadAction(string $pathInfo, string $method): bool
    {
        return $method === 'POST' && (
            str_contains($pathInfo, '/admin/media/upload') ||
            str_contains($pathInfo, '/upload') ||
            str_starts_with($pathInfo, '/admin/media')
        );
    }

    /**
     * Détermine si c'est une action de recherche
     */
    private function isSearchAction(string $pathInfo, string $method): bool
    {
        return str_contains($pathInfo, '/search') || 
               ($method === 'GET' && $pathInfo === '/' && !empty($_GET['q']));
    }
}