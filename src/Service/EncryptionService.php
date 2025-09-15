<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Exception;
use SodiumException;

/**
 * Service de chiffrement sécurisé utilisant Sodium.
 * 
 * Ce service fournit des méthodes pour :
 * - Chiffrement/déchiffrement symétrique avec Sodium
 * - Hachage sécurisé des mots de passe
 * - Gestion robuste des erreurs
 * 
 * @author SymfPress
 * @package App\Service
 */
final class EncryptionService
{
    private const ENCRYPTION_KEY_LENGTH = SODIUM_CRYPTO_SECRETBOX_KEYBYTES;
    private const NONCE_LENGTH = SODIUM_CRYPTO_SECRETBOX_NONCEBYTES;
    
    private readonly string $encryptionKey;

    public function __construct(
        #[Autowire('%env(APP_ENCRYPTION_KEY)%')]
        private readonly string $appEncryptionKey,
        private readonly LoggerInterface $logger
    ) {
        $this->initializeEncryptionKey();
    }

    /**
     * Initialise la clé de chiffrement depuis la variable d'environnement.
     * 
     * @throws Exception Si la clé n'est pas valide
     */
    private function initializeEncryptionKey(): void
    {
        if (empty($this->appEncryptionKey)) {
            throw new Exception('La clé de chiffrement APP_ENCRYPTION_KEY doit être définie');
        }

        // Décode la clé depuis base64 ou utilise la clé telle quelle si elle fait la bonne taille
        if (strlen($this->appEncryptionKey) === self::ENCRYPTION_KEY_LENGTH) {
            $this->encryptionKey = $this->appEncryptionKey;
        } else {
            $decodedKey = base64_decode($this->appEncryptionKey, true);
            if ($decodedKey === false || strlen($decodedKey) !== self::ENCRYPTION_KEY_LENGTH) {
                throw new Exception(
                    sprintf(
                        'La clé de chiffrement doit faire exactement %d octets ou être encodée en base64',
                        self::ENCRYPTION_KEY_LENGTH
                    )
                );
            }
            $this->encryptionKey = $decodedKey;
        }
    }

    /**
     * Chiffre une chaîne de caractères de manière sécurisée.
     * 
     * @param string $plaintext Le texte en clair à chiffrer
     * 
     * @return string Le texte chiffré encodé en base64
     * 
     * @throws Exception En cas d'erreur de chiffrement
     */
    public function encrypt(string $plaintext): string
    {
        if (empty($plaintext)) {
            throw new Exception('Le texte à chiffrer ne peut pas être vide');
        }

        try {
            // Génère un nonce aléatoire unique pour chaque chiffrement
            $nonce = random_bytes(self::NONCE_LENGTH);
            
            // Chiffre le texte avec Sodium
            $ciphertext = sodium_crypto_secretbox($plaintext, $nonce, $this->encryptionKey);
            
            // Combine le nonce et le texte chiffré, puis encode en base64
            $encrypted = base64_encode($nonce . $ciphertext);
            
            // Efface les données sensibles de la mémoire
            sodium_memzero($plaintext);
            
            return $encrypted;
            
        } catch (SodiumException $e) {
            $this->logger->error('Erreur lors du chiffrement Sodium', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Erreur lors du chiffrement des données', 0, $e);
        } catch (Exception $e) {
            $this->logger->error('Erreur générale lors du chiffrement', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Impossible de chiffrer les données', 0, $e);
        }
    }

    /**
     * Déchiffre une chaîne de caractères précédemment chiffrée.
     * 
     * @param string $encryptedData Les données chiffrées encodées en base64
     * 
     * @return string Le texte déchiffré
     * 
     * @throws Exception En cas d'erreur de déchiffrement
     */
    public function decrypt(string $encryptedData): string
    {
        if (empty($encryptedData)) {
            throw new Exception('Les données à déchiffrer ne peuvent pas être vides');
        }

        try {
            // Décode depuis base64
            $data = base64_decode($encryptedData, true);
            if ($data === false) {
                throw new Exception('Les données chiffrées ne sont pas correctement encodées en base64');
            }

            // Vérifie que les données ont au moins la taille minimale requise
            $minLength = self::NONCE_LENGTH + SODIUM_CRYPTO_SECRETBOX_MACBYTES;
            if (strlen($data) < $minLength) {
                throw new Exception('Les données chiffrées sont corrompues ou incomplètes');
            }

            // Extrait le nonce et le texte chiffré
            $nonce = substr($data, 0, self::NONCE_LENGTH);
            $ciphertext = substr($data, self::NONCE_LENGTH);

            // Déchiffre avec Sodium
            $plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $this->encryptionKey);
            
            if ($plaintext === false) {
                throw new Exception('Impossible de déchiffrer les données - clé incorrecte ou données corrompues');
            }

            return $plaintext;
            
        } catch (SodiumException $e) {
            $this->logger->error('Erreur lors du déchiffrement Sodium', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Erreur lors du déchiffrement des données', 0, $e);
        } catch (Exception $e) {
            $this->logger->error('Erreur générale lors du déchiffrement', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Impossible de déchiffrer les données', 0, $e);
        }
    }

    /**
     * Hash un mot de passe de manière sécurisée.
     * 
     * @param string $password Le mot de passe en clair
     * 
     * @return string Le hash du mot de passe
     * 
     * @throws Exception En cas d'erreur de hachage
     */
    public function hashPassword(string $password): string
    {
        if (empty($password)) {
            throw new Exception('Le mot de passe ne peut pas être vide');
        }

        try {
            $hash = password_hash($password, PASSWORD_ARGON2ID, [
                'memory_cost' => 65536, // 64 MB
                'time_cost' => 4,       // 4 itérations
                'threads' => 3,         // 3 threads
            ]);

            if ($hash === false) {
                throw new Exception('Erreur lors du hachage du mot de passe');
            }

            // Efface le mot de passe de la mémoire
            sodium_memzero($password);

            return $hash;
            
        } catch (Exception $e) {
            $this->logger->error('Erreur lors du hachage du mot de passe', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Impossible de hasher le mot de passe', 0, $e);
        }
    }

    /**
     * Vérifie un mot de passe contre son hash.
     * 
     * @param string $password Le mot de passe en clair à vérifier
     * @param string $hash Le hash stocké
     * 
     * @return bool True si le mot de passe correspond, false sinon
     * 
     * @throws Exception En cas d'erreur de vérification
     */
    public function verifyPassword(string $password, string $hash): bool
    {
        if (empty($password) || empty($hash)) {
            return false;
        }

        try {
            $result = password_verify($password, $hash);
            
            // Efface le mot de passe de la mémoire
            sodium_memzero($password);
            
            return $result;
            
        } catch (Exception $e) {
            $this->logger->error('Erreur lors de la vérification du mot de passe', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Impossible de vérifier le mot de passe', 0, $e);
        }
    }

    /**
     * Vérifie si un hash de mot de passe a besoin d'être mis à jour.
     * 
     * @param string $hash Le hash à vérifier
     * 
     * @return bool True si le hash doit être mis à jour, false sinon
     */
    public function needsRehash(string $hash): bool
    {
        return password_needs_rehash($hash, PASSWORD_ARGON2ID, [
            'memory_cost' => 65536,
            'time_cost' => 4,
            'threads' => 3,
        ]);
    }

    /**
     * Génère une clé de chiffrement aléatoire sécurisée.
     * Utile pour générer la clé initiale APP_ENCRYPTION_KEY.
     * 
     * @return string La clé encodée en base64
     * 
     * @throws Exception En cas d'erreur de génération
     */
    public static function generateEncryptionKey(): string
    {
        try {
            $key = random_bytes(self::ENCRYPTION_KEY_LENGTH);
            return base64_encode($key);
        } catch (Exception $e) {
            throw new Exception('Impossible de générer une clé de chiffrement', 0, $e);
        }
    }

    /**
     * Hash une chaîne arbitraire avec un sel pour les données sensibles.
     * Différent du hachage de mot de passe, utile pour les identifiants sensibles.
     * 
     * @param string $data Les données à hasher
     * @param string $salt Le sel à utiliser (optionnel, généré automatiquement si absent)
     * 
     * @return array Tableau contenant 'hash' et 'salt'
     * 
     * @throws Exception En cas d'erreur de hachage
     */
    public function hashSensitiveData(string $data, string $salt = null): array
    {
        if (empty($data)) {
            throw new Exception('Les données à hasher ne peuvent pas être vides');
        }

        try {
            if ($salt === null) {
                $salt = bin2hex(random_bytes(16)); // 32 caractères hex
            }

            $hash = hash('sha256', $data . $salt);
            
            // Efface les données sensibles de la mémoire
            sodium_memzero($data);

            return [
                'hash' => $hash,
                'salt' => $salt
            ];
            
        } catch (Exception $e) {
            $this->logger->error('Erreur lors du hachage des données sensibles', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Impossible de hasher les données sensibles', 0, $e);
        }
    }

    /**
     * Vérifie des données sensibles contre leur hash.
     * 
     * @param string $data Les données à vérifier
     * @param string $hash Le hash stocké
     * @param string $salt Le sel utilisé
     * 
     * @return bool True si les données correspondent, false sinon
     * 
     * @throws Exception En cas d'erreur de vérification
     */
    public function verifySensitiveData(string $data, string $hash, string $salt): bool
    {
        if (empty($data) || empty($hash) || empty($salt)) {
            return false;
        }

        try {
            $computedHash = hash('sha256', $data . $salt);
            $result = hash_equals($hash, $computedHash);
            
            // Efface les données sensibles de la mémoire
            sodium_memzero($data);
            
            return $result;
            
        } catch (Exception $e) {
            $this->logger->error('Erreur lors de la vérification des données sensibles', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new Exception('Impossible de vérifier les données sensibles', 0, $e);
        }
    }
}
