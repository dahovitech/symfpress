# Service de Chiffrement - Documentation

## Vue d'ensemble

Le `EncryptionService` est un service Symfony sécurisé qui utilise l'extension Sodium de PHP pour fournir des fonctionnalités de chiffrement et de hachage robustes.

## Fonctionnalités

### 1. Chiffrement Symétrique
- Utilise `sodium_crypto_secretbox` pour le chiffrement AES-256
- Génère un nonce unique pour chaque opération
- Combine nonce + données chiffrées et encode en base64

### 2. Hachage Sécurisé des Mots de Passe
- Utilise `password_hash` avec l'algorithme Argon2ID
- Paramètres optimisés pour la sécurité
- Vérification avec protection contre les attaques temporelles

### 3. Hachage de Données Sensibles
- SHA-256 avec sel pour les identifiants sensibles
- Génération automatique de sel
- Vérification sécurisée avec `hash_equals`

## Configuration

### Variable d'environnement requise

Ajoutez dans votre fichier `.env` :

```
APP_ENCRYPTION_KEY=VotreClé64CaractèresEnBase64==
```

Pour générer une nouvelle clé :

```bash
php -r "echo base64_encode(random_bytes(32)) . PHP_EOL;"
```

Ou utilisez la méthode statique :

```php
$key = EncryptionService::generateEncryptionKey();
```

## Utilisation

### Injection du service

```php
use App\Service\EncryptionService;

class MonController 
{
    public function __construct(
        private EncryptionService $encryptionService
    ) {}
}
```

### Chiffrement/Déchiffrement

```php
// Chiffrement
try {
    $donnesChiffrees = $this->encryptionService->encrypt("Données sensibles");
    // Stockage en base de données...
} catch (Exception $e) {
    // Gestion d'erreur
}

// Déchiffrement
try {
    $donnesDechiffrees = $this->encryptionService->decrypt($donnesChiffrees);
} catch (Exception $e) {
    // Gestion d'erreur
}
```

### Hachage de Mots de Passe

```php
// Hachage lors de l'inscription
try {
    $motDePasseHache = $this->encryptionService->hashPassword($motDePasseClair);
    // Stockage en base...
} catch (Exception $e) {
    // Gestion d'erreur
}

// Vérification lors de la connexion
try {
    $estValide = $this->encryptionService->verifyPassword($motDePasseSaisi, $hashStocke);
    if ($estValide) {
        // Connexion réussie
    }
} catch (Exception $e) {
    // Gestion d'erreur
}

// Vérifier si le hash doit être mis à jour
if ($this->encryptionService->needsRehash($hashStocke)) {
    $nouveauHash = $this->encryptionService->hashPassword($motDePasseClair);
    // Mettre à jour en base
}
```

### Hachage de Données Sensibles

```php
// Hachage avec génération automatique de sel
try {
    $resultat = $this->encryptionService->hashSensitiveData("identifiant-sensible");
    $hash = $resultat['hash'];
    $sel = $resultat['salt'];
    // Stocker hash et sel séparément
} catch (Exception $e) {
    // Gestion d'erreur
}

// Vérification
try {
    $estValide = $this->encryptionService->verifySensitiveData(
        "identifiant-sensible",
        $hashStocke,
        $selStocke
    );
} catch (Exception $e) {
    // Gestion d'erreur
}
```

## Sécurité

### Bonnes pratiques implémentées

1. **Nonce unique** : Chaque opération de chiffrement utilise un nonce aléatoire
2. **Effacement mémoire** : `sodium_memzero()` pour nettoyer les données sensibles
3. **Protection temporelle** : `hash_equals()` pour éviter les attaques par analyse temporelle
4. **Gestion d'erreurs** : Exceptions spécifiques avec logging sécurisé
5. **Validation** : Vérification de l'intégrité des données avant traitement

### Recommandations

1. **Rotation des clés** : Changez `APP_ENCRYPTION_KEY` régulièrement
2. **Environnement** : Ne jamais exposer la clé en production
3. **Sauvegarde** : Sauvegardez la clé de manière sécurisée
4. **Accès** : Limitez l'accès au service aux contrôleurs nécessaires

## Gestion d'Erreurs

Le service lance des exceptions `Exception` avec des messages explicites :

- `"La clé de chiffrement APP_ENCRYPTION_KEY doit être définie"`
- `"Le texte à chiffrer ne peut pas être vide"`
- `"Impossible de déchiffrer les données - clé incorrecte ou données corrompues"`
- `"Le mot de passe ne peut pas être vide"`

Toutes les erreurs sont loggées avec le contexte approprié.

## Tests

### Exemple de test unitaire

```php
use App\Service\EncryptionService;
use PHPUnit\Framework\TestCase;

class EncryptionServiceTest extends TestCase
{
    private EncryptionService $service;
    
    protected function setUp(): void
    {
        // Configuration du service avec une clé de test
    }
    
    public function testChiffrementDechiffrement(): void
    {
        $texteOriginal = "Test de chiffrement";
        $texteChiffre = $this->service->encrypt($texteOriginal);
        $texteDechiffre = $this->service->decrypt($texteChiffre);
        
        $this->assertEquals($texteOriginal, $texteDechiffre);
    }
    
    public function testHachageMotDePasse(): void
    {
        $motDePasse = "monMotDePasseSecret";
        $hash = $this->service->hashPassword($motDePasse);
        
        $this->assertTrue($this->service->verifyPassword($motDePasse, $hash));
        $this->assertFalse($this->service->verifyPassword("mauvaisMotDePasse", $hash));
    }
}
```

## Performance

- **Chiffrement** : ~1ms pour 1KB de données
- **Hachage Argon2ID** : ~100-500ms selon la configuration
- **Mémoire** : Utilisation minimale grâce à `sodium_memzero()`

## Changelog

- **v1.0** : Version initiale avec chiffrement Sodium et hachage sécurisé
- Support des algorithmes : AES-256-GCM via Sodium, Argon2ID pour les mots de passe
- Gestion robuste des erreurs et logging complet
