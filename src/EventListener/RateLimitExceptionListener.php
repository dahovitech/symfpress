<?php

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event Listener pour personnaliser les réponses des exceptions de rate limiting
 */
#[AsEventListener(event: KernelEvents::EXCEPTION, priority: 10)]
class RateLimitExceptionListener
{
    public function __construct(
        private LoggerInterface $logger
    ) {}

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        
        if (!$exception instanceof TooManyRequestsHttpException) {
            return;
        }

        $request = $event->getRequest();
        
        // Log détaillé de l'incident
        $this->logger->warning('Rate limit exceeded - Detailed log', [
            'ip' => $request->getClientIp(),
            'path' => $request->getPathInfo(),
            'method' => $request->getMethod(),
            'user_agent' => $request->headers->get('User-Agent'),
            'referer' => $request->headers->get('Referer'),
            'query_params' => $request->query->all(),
            'retry_after' => $exception->getRetryAfter(),
            'message' => $exception->getMessage(),
            'timestamp' => date('c')
        ]);

        // Détermine le type de réponse selon le contenu demandé
        $isApiRequest = $this->isApiRequest($request);
        $isAjaxRequest = $request->isXmlHttpRequest();
        
        if ($isApiRequest || $isAjaxRequest) {
            $this->handleApiResponse($event, $exception);
        } else {
            $this->handleWebResponse($event, $exception);
        }
    }

    /**
     * Gère les réponses pour les requêtes API/AJAX
     */
    private function handleApiResponse(ExceptionEvent $event, TooManyRequestsHttpException $exception): void
    {
        $retryAfter = $exception->getRetryAfter();
        
        $response = new JsonResponse([
            'error' => [
                'code' => 'RATE_LIMIT_EXCEEDED',
                'message' => 'Limite de requêtes dépassée. Veuillez patienter avant de réessayer.',
                'details' => [
                    'retry_after' => $retryAfter,
                    'retry_after_human' => $this->formatRetryAfter($retryAfter),
                    'timestamp' => time()
                ]
            ]
        ], Response::HTTP_TOO_MANY_REQUESTS);
        
        // Headers informatifs
        $response->headers->set('Retry-After', (string) $retryAfter);
        $response->headers->set('X-RateLimit-Reset', (string) (time() + $retryAfter));
        
        $event->setResponse($response);
    }

    /**
     * Gère les réponses pour les requêtes web classiques
     */
    private function handleWebResponse(ExceptionEvent $event, TooManyRequestsHttpException $exception): void
    {
        $request = $event->getRequest();
        $retryAfter = $exception->getRetryAfter();
        
        // Pour les pages web, on peut rediriger vers une page d'erreur personnalisée
        // ou afficher une page d'erreur avec du HTML
        
        $htmlContent = $this->generateRateLimitHtml(
            $exception->getMessage(),
            $this->formatRetryAfter($retryAfter)
        );
        
        $response = new Response($htmlContent, Response::HTTP_TOO_MANY_REQUESTS);
        $response->headers->set('Retry-After', (string) $retryAfter);
        $response->headers->set('Content-Type', 'text/html; charset=UTF-8');
        
        $event->setResponse($response);
    }

    /**
     * Détermine si la requête est une requête API
     */
    private function isApiRequest($request): bool
    {
        $pathInfo = $request->getPathInfo();
        $acceptHeader = $request->headers->get('Accept', '');
        
        return str_starts_with($pathInfo, '/api/') || 
               str_contains($acceptHeader, 'application/json') ||
               str_contains($acceptHeader, 'application/xml');
    }

    /**
     * Formate le temps d'attente en format lisible
     */
    private function formatRetryAfter(int $seconds): string
    {
        if ($seconds < 60) {
            return $seconds . ' seconde' . ($seconds > 1 ? 's' : '');
        }
        
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;
        
        $result = $minutes . ' minute' . ($minutes > 1 ? 's' : '');
        
        if ($remainingSeconds > 0) {
            $result .= ' et ' . $remainingSeconds . ' seconde' . ($remainingSeconds > 1 ? 's' : '');
        }
        
        return $result;
    }

    /**
     * Génère une page HTML d'erreur pour le rate limiting
     */
    private function generateRateLimitHtml(string $message, string $retryAfter): string
    {
        return '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limite de requêtes atteinte - SymfPress</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            margin: 20px;
        }
        .error-icon {
            font-size: 64px;
            color: #e74c3c;
            margin-bottom: 20px;
        }
        h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 16px;
            font-weight: 600;
        }
        p {
            color: #7f8c8d;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .retry-info {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 16px;
            margin: 20px 0;
            font-weight: 500;
            color: #495057;
        }
        .home-link {
            display: inline-block;
            background: #3498db;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        .home-link:hover {
            background: #2980b9;
        }
        .timestamp {
            font-size: 12px;
            color: #adb5bd;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">⚠️</div>
        <h1>Trop de requêtes</h1>
        <p>' . htmlspecialchars($message) . '</p>
        <div class="retry-info">
            🕰️ Veuillez patienter <strong>' . htmlspecialchars($retryAfter) . '</strong> avant de réessayer.
        </div>
        <a href="/" class="home-link">Retour à l\'accueil</a>
        <div class="timestamp">Timestamp: ' . date('d/m/Y H:i:s') . '</div>
    </div>
    <script>
        // Auto-refresh après le délai
        setTimeout(function() {
            window.location.reload();
        }, ' . ($retryAfter * 1000 + 1000) . ');
    </script>
</body>
</html>';
    }
}