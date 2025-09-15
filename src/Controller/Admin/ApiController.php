<?php

namespace App\Controller\Admin;

use App\Attribute\RateLimit;
use App\Service\RateLimitService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Exemple de contrôleur montrant l'utilisation du rate limiting
 */
#[Route('/admin/api', name: 'admin_api_')]
class ApiController extends AbstractController
{
    public function __construct(
        private RateLimitService $rateLimitService
    ) {}

    /**
     * Exemple d'utilisation manuelle du rate limiting
     */
    #[Route('/status', name: 'status', methods: ['GET'])]
    public function status(Request $request): JsonResponse
    {
        // Application manuelle du rate limiting
        $this->rateLimitService->checkLimit('api', $request);
        
        // Vérification si on approche de la limite
        $isNearLimit = $this->rateLimitService->isNearLimit('api', $request, null, 90);
        
        // Récupération des informations de limitation
        $limitInfo = $this->rateLimitService->getLimitInfo('api', $request);
        
        return new JsonResponse([
            'status' => 'ok',
            'timestamp' => time(),
            'rate_limit' => [
                'near_limit' => $isNearLimit,
                'info' => $limitInfo
            ]
        ]);
    }

    /**
     * Exemple avec attribut RateLimit (nécessite un intercepteur supplémentaire)
     */
    #[Route('/data', name: 'data', methods: ['GET'])]
    #[RateLimit('api')]
    public function getData(): JsonResponse
    {
        return new JsonResponse([
            'data' => [
                'message' => 'Données récupérées avec succès',
                'items' => [
                    ['id' => 1, 'name' => 'Item 1'],
                    ['id' => 2, 'name' => 'Item 2'],
                ]
            ]
        ]);
    }

    /**
     * Endpoint pour réinitialiser les limites (administration)
     */
    #[Route('/reset-limits', name: 'reset_limits', methods: ['POST'])]
    public function resetLimits(Request $request): JsonResponse
    {
        // Vérifie que l'utilisateur a les droits admin
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $limiterType = $request->request->get('limiter_type');
        $targetIp = $request->request->get('target_ip');
        
        if (!$limiterType) {
            return new JsonResponse(['error' => 'Type de limiteur requis'], 400);
        }
        
        try {
            // Crée une requête factice pour l'IP cible
            $targetRequest = $targetIp ? 
                Request::create('/', 'GET', [], [], [], ['REMOTE_ADDR' => $targetIp]) :
                $request;
                
            $this->rateLimitService->resetLimit($limiterType, $targetRequest);
            
            return new JsonResponse([
                'success' => true,
                'message' => sprintf('Limite "%s" réinitialisée', $limiterType)
            ]);
        } catch (\InvalidArgumentException $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Endpoint pour consulter l'état des limites
     */
    #[Route('/limits-status', name: 'limits_status', methods: ['GET'])]
    public function limitsStatus(Request $request): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $limitTypes = ['login', 'api', 'admin_sensitive', 'content_modification', 'media_upload'];
        $status = [];
        
        foreach ($limitTypes as $type) {
            try {
                $info = $this->rateLimitService->getLimitInfo($type, $request);
                $nearLimit = $this->rateLimitService->isNearLimit($type, $request);
                
                $status[$type] = [
                    'info' => $info,
                    'near_limit' => $nearLimit,
                    'usage_percent' => $info['limit'] > 0 ? 
                        (($info['limit'] - $info['remaining']) / $info['limit'] * 100) : 0
                ];
            } catch (\Exception $e) {
                $status[$type] = ['error' => $e->getMessage()];
            }
        }
        
        return new JsonResponse(['limits' => $status]);
    }
}