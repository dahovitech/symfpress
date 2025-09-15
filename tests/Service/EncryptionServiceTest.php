<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\EncryptionService;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Exception;

/**
 * Tests unitaires pour le service EncryptionService.
 * 
 * @author SymfPress
 */
class EncryptionServiceTest extends TestCase
{
    private EncryptionService $encryptionService;
    private string $testKey;

    protected function setUp(): void
    {
        // Génère une clé de test aléatoire
        $this->testKey = base64_encode(random_bytes(32));
        
        // Crée le service avec la clé de test et un logger null
        $this->encryptionService = new EncryptionService(
            $this->testKey,
            new NullLogger()
        );
    }

    /**
     * Test du chiffrement et déchiffrement basique.
     */
    public function testChiffrementDechiffrementBasique(): void
    {
        $texteOriginal = "Ceci est un texte de test à chiffrer";
        
        // Chiffrement
        $texteChiffre = $this->encryptionService->encrypt($texteOriginal);
        $this->assertNotEmpty($texteChiffre);
        $this->assertNotEquals($texteOriginal, $texteChiffre);
        
        // Déchiffrement
        $texteDechiffre = $this->encryptionService->decrypt($texteChiffre);
        $this->assertEquals($texteOriginal, $texteDechiffre);
    }

    /**
     * Test du chiffrement avec des caractères spéciaux.
     */
    public function testChiffrementCaracteresSpeciaux(): void
    {
        $texteOriginal = "Texte avec éèàù çñ 123 !@#$%^&*()";
        
        $texteChiffre = $this->encryptionService->encrypt($texteOriginal);
        $texteDechiffre = $this->encryptionService->decrypt($texteChiffre);
        
        $this->assertEquals($texteOriginal, $texteDechiffre);
    }

    /**
     * Test du chiffrement avec des données JSON.
     */
    public function testChiffrementDonneesJson(): void
    {
        $donnees = [
            'nom' => 'Dupont',
            'email' => 'jean.dupont@example.com',
            'age' => 30,
            'actif' => true
        ];
        $texteOriginal = json_encode($donnees);
        
        $texteChiffre = $this->encryptionService->encrypt($texteOriginal);
        $texteDechiffre = $this->encryptionService->decrypt($texteChiffre);
        
        $this->assertEquals($texteOriginal, $texteDechiffre);
        $this->assertEquals($donnees, json_decode($texteDechiffre, true));
    }

    /**
     * Test du hachage et vérification de mot de passe.
     */
    public function testHachageMotDePasse(): void
    {
        $motDePasse = "MonMotDePasseSecret123!";
        
        // Hachage
        $hash = $this->encryptionService->hashPassword($motDePasse);
        $this->assertNotEmpty($hash);
        $this->assertNotEquals($motDePasse, $hash);
        $this->assertTrue(str_contains($hash, '$argon2id$'));
        
        // Vérification avec le bon mot de passe
        $this->assertTrue($this->encryptionService->verifyPassword($motDePasse, $hash));
        
        // Vérification avec un mauvais mot de passe
        $this->assertFalse($this->encryptionService->verifyPassword("MauvaisMotDePasse", $hash));
    }

    /**
     * Test de la fonction needsRehash.
     */
    public function testNeedsRehash(): void
    {
        $motDePasse = "TestPassword123";
        $hash = $this->encryptionService->hashPassword($motDePasse);
        
        // Un hash récent ne devrait pas avoir besoin d'être mis à jour
        $this->assertFalse($this->encryptionService->needsRehash($hash));
        
        // Un hash avec l'ancien algorithme devrait avoir besoin d'être mis à jour
        $oldHash = password_hash($motDePasse, PASSWORD_BCRYPT);
        $this->assertTrue($this->encryptionService->needsRehash($oldHash));
    }

    /**
     * Test du hachage de données sensibles.
     */
    public function testHachageDonneesSensibles(): void
    {
        $donnees = "identifiant-sensible-12345";
        
        // Hachage avec génération automatique de sel
        $resultat = $this->encryptionService->hashSensitiveData($donnees);
        
        $this->assertIsArray($resultat);
        $this->assertArrayHasKey('hash', $resultat);
        $this->assertArrayHasKey('salt', $resultat);
        $this->assertNotEmpty($resultat['hash']);
        $this->assertNotEmpty($resultat['salt']);
        $this->assertEquals(64, strlen($resultat['hash'])); // SHA-256 = 64 caractères hex
        
        // Vérification avec les bonnes données
        $this->assertTrue($this->encryptionService->verifySensitiveData(
            $donnees,
            $resultat['hash'],
            $resultat['salt']
        ));
        
        // Vérification avec de mauvaises données
        $this->assertFalse($this->encryptionService->verifySensitiveData(
            "mauvaises-donnees",
            $resultat['hash'],
            $resultat['salt']
        ));
    }

    /**
     * Test du hachage de données sensibles avec sel personnalisé.
     */
    public function testHachageDonneesSensiblesAvecSelPersonnalise(): void
    {
        $donnees = "test-data";
        $selPersonnalise = "mon-sel-personnalise-123";
        
        $resultat = $this->encryptionService->hashSensitiveData($donnees, $selPersonnalise);
        
        $this->assertEquals($selPersonnalise, $resultat['salt']);
        $this->assertTrue($this->encryptionService->verifySensitiveData(
            $donnees,
            $resultat['hash'],
            $resultat['salt']
        ));
    }

    /**
     * Test de génération de clé de chiffrement.
     */
    public function testGenerationCleChiffrement(): void
    {
        $cle = EncryptionService::generateEncryptionKey();
        
        $this->assertNotEmpty($cle);
        
        // Vérifie que c'est du base64 valide
        $cleDecodee = base64_decode($cle, true);
        $this->assertNotFalse($cleDecodee);
        
        // Vérifie la longueur (32 octets pour une clé Sodium)
        $this->assertEquals(32, strlen($cleDecodee));
        
        // Vérifie que deux générations produisent des clés différentes
        $cle2 = EncryptionService::generateEncryptionKey();
        $this->assertNotEquals($cle, $cle2);
    }

    /**
     * Test des exceptions avec texte vide pour le chiffrement.
     */
    public function testExceptionTexteVide(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Le texte à chiffrer ne peut pas être vide');
        
        $this->encryptionService->encrypt('');
    }

    /**
     * Test des exceptions avec données chiffrées invalides.
     */
    public function testExceptionDonneesChiffreesInvalides(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Impossible de déchiffrer les données');
        
        $this->encryptionService->decrypt('données-invalides-non-base64');
    }

    /**
     * Test des exceptions avec mot de passe vide.
     */
    public function testExceptionMotDePasseVide(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Le mot de passe ne peut pas être vide');
        
        $this->encryptionService->hashPassword('');
    }

    /**
     * Test des exceptions avec données sensibles vides.
     */
    public function testExceptionDonneesSensiblesVides(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Les données à hasher ne peuvent pas être vides');
        
        $this->encryptionService->hashSensitiveData('');
    }

    /**
     * Test de vérification avec paramètres vides.
     */
    public function testVerificationParametresVides(): void
    {
        // Mot de passe vide
        $this->assertFalse($this->encryptionService->verifyPassword('', 'hash'));
        $this->assertFalse($this->encryptionService->verifyPassword('password', ''));
        
        // Données sensibles vides
        $this->assertFalse($this->encryptionService->verifySensitiveData('', 'hash', 'salt'));
        $this->assertFalse($this->encryptionService->verifySensitiveData('data', '', 'salt'));
        $this->assertFalse($this->encryptionService->verifySensitiveData('data', 'hash', ''));
    }

    /**
     * Test de performance basique (temps d'exécution raisonnable).
     */
    public function testPerformanceBasique(): void
    {
        $texte = str_repeat("Test de performance ", 100); // ~2KB de données
        
        $debut = microtime(true);
        $chiffre = $this->encryptionService->encrypt($texte);
        $finChiffrement = microtime(true);
        
        $dechiffre = $this->encryptionService->decrypt($chiffre);
        $finDechiffrement = microtime(true);
        
        $tempsChiffrement = $finChiffrement - $debut;
        $tempsDechiffrement = $finDechiffrement - $finChiffrement;
        
        // Le chiffrement/déchiffrement ne devrait pas prendre plus de 100ms
        $this->assertLessThan(0.1, $tempsChiffrement, 'Chiffrement trop lent');
        $this->assertLessThan(0.1, $tempsDechiffrement, 'Déchiffrement trop lent');
        
        $this->assertEquals($texte, $dechiffre);
    }

    /**
     * Test de cohérence : plusieurs chiffrements du même texte donnent des résultats différents.
     */
    public function testCoherenceChiffrements(): void
    {
        $texte = "Texte de test pour cohérence";
        
        $chiffre1 = $this->encryptionService->encrypt($texte);
        $chiffre2 = $this->encryptionService->encrypt($texte);
        $chiffre3 = $this->encryptionService->encrypt($texte);
        
        // Les résultats doivent être différents (nonce différent)
        $this->assertNotEquals($chiffre1, $chiffre2);
        $this->assertNotEquals($chiffre2, $chiffre3);
        $this->assertNotEquals($chiffre1, $chiffre3);
        
        // Mais tous doivent se déchiffrer correctement
        $this->assertEquals($texte, $this->encryptionService->decrypt($chiffre1));
        $this->assertEquals($texte, $this->encryptionService->decrypt($chiffre2));
        $this->assertEquals($texte, $this->encryptionService->decrypt($chiffre3));
    }
}
