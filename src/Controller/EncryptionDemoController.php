<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\EncryptionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Exception;

/**
 * Contrôleur d'exemple démontrant l'utilisation du EncryptionService.
 * 
 * ⚠️ ATTENTION : Ce contrôleur est uniquement à des fins de démonstration.
 * En production, ne jamais exposer directement les fonctionnalités de chiffrement via une API.
 * 
 * @author SymfPress
 */
#[Route('/api/encryption', name: 'encryption_')]
class EncryptionDemoController extends AbstractController
{
    public function __construct(
        private readonly EncryptionService $encryptionService
    ) {}

    /**
     * Démonstration du chiffrement de données.
     * 
     * POST /api/encryption/encrypt
     * Body: {"data": "texte à chiffrer"}
     */
    #[Route('/encrypt', name: 'encrypt', methods: ['POST'])]
    public function encrypt(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            if (!isset($data['data']) || empty($data['data'])) {
                return $this->json([
                    'error' => 'Le champ "data" est requis et ne peut pas être vide'
                ], Response::HTTP_BAD_REQUEST);
            }

            $encryptedData = $this->encryptionService->encrypt($data['data']);

            return $this->json([
                'success' => true,
                'encrypted_data' => $encryptedData,
                'message' => 'Données chiffrées avec succès'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors du chiffrement : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Démonstration du déchiffrement de données.
     * 
     * POST /api/encryption/decrypt  
     * Body: {"encrypted_data": "données chiffrées"}
     */
    #[Route('/decrypt', name: 'decrypt', methods: ['POST'])]
    public function decrypt(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            if (!isset($data['encrypted_data']) || empty($data['encrypted_data'])) {
                return $this->json([
                    'error' => 'Le champ "encrypted_data" est requis et ne peut pas être vide'
                ], Response::HTTP_BAD_REQUEST);
            }

            $decryptedData = $this->encryptionService->decrypt($data['encrypted_data']);

            return $this->json([
                'success' => true,
                'decrypted_data' => $decryptedData,
                'message' => 'Données déchiffrées avec succès'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors du déchiffrement : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Démonstration du hachage de mot de passe.
     * 
     * POST /api/encryption/hash-password
     * Body: {"password": "motdepasse"}
     */
    #[Route('/hash-password', name: 'hash_password', methods: ['POST'])]
    public function hashPassword(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            if (!isset($data['password']) || empty($data['password'])) {
                return $this->json([
                    'error' => 'Le champ "password" est requis et ne peut pas être vide'
                ], Response::HTTP_BAD_REQUEST);
            }

            $hashedPassword = $this->encryptionService->hashPassword($data['password']);

            return $this->json([
                'success' => true,
                'hashed_password' => $hashedPassword,
                'message' => 'Mot de passe haché avec succès'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors du hachage : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Démonstration de la vérification de mot de passe.
     * 
     * POST /api/encryption/verify-password
     * Body: {"password": "motdepasse", "hash": "hash_du_mot_de_passe"}
     */
    #[Route('/verify-password', name: 'verify_password', methods: ['POST'])]
    public function verifyPassword(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            if (!isset($data['password']) || !isset($data['hash'])) {
                return $this->json([
                    'error' => 'Les champs "password" et "hash" sont requis'
                ], Response::HTTP_BAD_REQUEST);
            }

            $isValid = $this->encryptionService->verifyPassword($data['password'], $data['hash']);

            return $this->json([
                'success' => true,
                'is_valid' => $isValid,
                'message' => $isValid ? 'Mot de passe valide' : 'Mot de passe invalide'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors de la vérification : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Démonstration du hachage de données sensibles.
     * 
     * POST /api/encryption/hash-sensitive
     * Body: {"data": "données sensibles"}
     */
    #[Route('/hash-sensitive', name: 'hash_sensitive', methods: ['POST'])]
    public function hashSensitiveData(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            if (!isset($data['data']) || empty($data['data'])) {
                return $this->json([
                    'error' => 'Le champ "data" est requis et ne peut pas être vide'
                ], Response::HTTP_BAD_REQUEST);
            }

            $result = $this->encryptionService->hashSensitiveData($data['data']);

            return $this->json([
                'success' => true,
                'hash' => $result['hash'],
                'salt' => $result['salt'],
                'message' => 'Données sensibles hachées avec succès'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors du hachage : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Démonstration de la vérification de données sensibles.
     * 
     * POST /api/encryption/verify-sensitive
     * Body: {"data": "données", "hash": "hash", "salt": "salt"}
     */
    #[Route('/verify-sensitive', name: 'verify_sensitive', methods: ['POST'])]
    public function verifySensitiveData(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            if (!isset($data['data']) || !isset($data['hash']) || !isset($data['salt'])) {
                return $this->json([
                    'error' => 'Les champs "data", "hash" et "salt" sont requis'
                ], Response::HTTP_BAD_REQUEST);
            }

            $isValid = $this->encryptionService->verifySensitiveData(
                $data['data'],
                $data['hash'],
                $data['salt']
            );

            return $this->json([
                'success' => true,
                'is_valid' => $isValid,
                'message' => $isValid ? 'Données valides' : 'Données invalides'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors de la vérification : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Génère une nouvelle clé de chiffrement.
     * 
     * ⚠️ DANGER : En production, cette endpoint ne devrait JAMAIS être exposée !
     * 
     * GET /api/encryption/generate-key
     */
    #[Route('/generate-key', name: 'generate_key', methods: ['GET'])]
    public function generateKey(): JsonResponse
    {
        try {
            $key = EncryptionService::generateEncryptionKey();

            return $this->json([
                'success' => true,
                'encryption_key' => $key,
                'message' => 'Clé de chiffrement générée avec succès',
                'warning' => 'ATTENTION : Gardez cette clé secrète et sécurisée !'
            ]);

        } catch (Exception $e) {
            return $this->json([
                'error' => 'Erreur lors de la génération : ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Endpoint d'information sur le service.
     * 
     * GET /api/encryption/info
     */
    #[Route('/info', name: 'info', methods: ['GET'])]
    public function info(): JsonResponse
    {
        return $this->json([
            'service' => 'EncryptionService',
            'version' => '1.0',
            'algorithms' => [
                'encryption' => 'Sodium (AES-256-GCM)',
                'password_hashing' => 'Argon2ID',
                'data_hashing' => 'SHA-256'
            ],
            'endpoints' => [
                'POST /api/encryption/encrypt' => 'Chiffrer des données',
                'POST /api/encryption/decrypt' => 'Déchiffrer des données',
                'POST /api/encryption/hash-password' => 'Hacher un mot de passe',
                'POST /api/encryption/verify-password' => 'Vérifier un mot de passe',
                'POST /api/encryption/hash-sensitive' => 'Hacher des données sensibles',
                'POST /api/encryption/verify-sensitive' => 'Vérifier des données sensibles',
                'GET /api/encryption/generate-key' => 'Générer une clé (DEMO uniquement)',
                'GET /api/encryption/info' => 'Informations sur le service'
            ],
            'warning' => 'Ces endpoints sont uniquement à des fins de démonstration. Ne pas utiliser en production !'
        ]);
    }
}
