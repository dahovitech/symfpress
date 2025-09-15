# Exceptions Personnalisées - Guide d'Utilisation

Ce document explique l'utilisation des exceptions personnalisées implémentées dans le projet Symfpress pour une meilleure gestion des erreurs.

## Vue d'ensemble

Le système d'exceptions personnalisées a été implémenté pour remplacer les exceptions génériques par des exceptions spécialisées selon le domaine fonctionnel :

- **SecurityException** : Erreurs liées à la sécurité
- **MediaException** : Erreurs liées aux médias et uploads
- **ValidationException** : Erreurs de validation des données

## SecurityException

### Usage

```php
use App\Exception\SecurityException;

// Accès non autorisé
throw SecurityException::unauthorizedAccess('ressource protégée');

// Échec d'authentification
throw SecurityException::authenticationFailed('identifiants invalides');

// Permissions insuffisantes
throw SecurityException::insufficientPermissions('modification des utilisateurs');

// Token invalide
throw SecurityException::invalidToken('JWT');

// Tentative de CSRF
throw SecurityException::csrfAttack();
```

### Codes d'erreur

- `UNAUTHORIZED_ACCESS = 4001`
- `AUTHENTICATION_FAILED = 4002`
- `INSUFFICIENT_PERMISSIONS = 4003`
- `INVALID_TOKEN = 4004`
- `CSRF_ATTACK = 4005`

### Services refactorisés

- **SecurityService** : Validation des requêtes, IP et User-Agent
  - `validateIp()` : Lance SecurityException si IP non autorisée
  - `validateUserAgent()` : Lance SecurityException si User-Agent suspect
  - `validateRequest()` : Validation complète de la requête
  - `requireAuthentication()` : Vérifie l'authentification
  - `requirePermission()` : Vérifie les permissions
  - `validateToken()` : Valide un token

## MediaException

### Usage

```php
use App\Exception\MediaException;

// Fichier trop volumineux
throw MediaException::fileTooLarge('image.jpg', 5242880, 2097152);

// Type de fichier invalide
throw MediaException::invalidFileType('document.exe', 'application/exe', ['image/jpeg', 'image/png']);

// Fichier corrompu
throw MediaException::corruptedFile('image.jpg');

// Échec d'upload
throw MediaException::uploadFailed('document.pdf', 'erreur serveur');

// Fichier introuvable
throw MediaException::fileNotFound('/path/to/file.jpg');

// Erreur de traitement d'image
throw MediaException::imageProcessingError('redimensionnement', 'photo.jpg');

// Quota de stockage dépassé
throw MediaException::storageQuotaExceeded(10485760, 5242880);

// Permissions insuffisantes sur fichier
throw MediaException::filePermissionDenied('/path/to/file', 'écriture');
```

### Codes d'erreur

- `FILE_TOO_LARGE = 5001`
- `INVALID_FILE_TYPE = 5002`
- `CORRUPTED_FILE = 5003`
- `UPLOAD_FAILED = 5004`
- `FILE_NOT_FOUND = 5005`
- `IMAGE_PROCESSING_ERROR = 5006`
- `STORAGE_QUOTA_EXCEEDED = 5007`
- `FILE_PERMISSION_DENIED = 5008`

### Services refactorisés

- **MediaManager** : Gestion avancée des médias
  - `uploadFile()` : Upload avec validation complète
  - `deleteMedia()` : Suppression avec gestion d'erreurs
  - `generateThumbnail()` : Génération de miniatures avec validation

- **MediaService** : Service de base pour les médias
  - `validateFile()` : Validation des fichiers uploadés
  - `validateFileName()` : Validation des noms de fichiers
  - `validateMimeType()` : Validation du type MIME
  - `scanMaliciousContent()` : Détection de contenu malveillant

## ValidationException

### Usage

```php
use App\Exception\ValidationException;

// Champ requis manquant
throw ValidationException::requiredFieldMissing('email');

// Format invalide
throw ValidationException::invalidFormat('email', 'invalid-email', 'format email valide');

// Valeur hors limites
throw ValidationException::outOfRange('age', 150, 18, 120);

// Valeur dupliquée
throw ValidationException::duplicateValue('email', 'user@example.com');

// Longueur invalide
throw ValidationException::invalidLength('password', 5, 8, 100);

// Type de données invalide
throw ValidationException::invalidDataType('age', 'string', 'integer');

// Contrainte personnalisée
throw ValidationException::customConstraintViolation('slug', 'doit être unique');

// Référence invalide
throw ValidationException::invalidReference('user_id', 999, 'User');

// Multiples erreurs
$errors = [
    'email' => ['Format invalide', 'Déjà utilisé'],
    'password' => ['Trop court']
];
throw ValidationException::multipleErrors($errors);
```

### Codes d'erreur

- `REQUIRED_FIELD_MISSING = 6001`
- `INVALID_FORMAT = 6002`
- `OUT_OF_RANGE = 6003`
- `DUPLICATE_VALUE = 6004`
- `INVALID_LENGTH = 6005`
- `INVALID_DATA_TYPE = 6006`
- `CUSTOM_CONSTRAINT_VIOLATION = 6007`
- `INVALID_REFERENCE = 6008`

### Services refactorisés

- **SlugService** : Génération et validation de slugs
  - `generate()` : Génération avec validation d'entrée
  - `makeUnique()` : Génération unique avec limites
  - `validateSlug()` : Validation de format de slug

### Méthodes utilitaires

```php
// Obtenir les erreurs de validation
$exception = ValidationException::multipleErrors($errors);
$allErrors = $exception->getErrors();

// Vérifier s'il y a des erreurs
if ($exception->hasErrors()) {
    // Traiter les erreurs
}

// Ajouter une erreur
$exception->addError('field', 'message');

// Export JSON
$json = $exception->toJson();
```

## Migration depuis les exceptions génériques

### Avant

```php
// Ancien code avec exceptions génériques
if (!$this->validateIp($request)) {
    throw new \RuntimeException('IP non autorisée');
}

if ($file->getSize() > $maxSize) {
    throw new \InvalidArgumentException('Fichier trop volumineux');
}

if (empty($field)) {
    throw new \InvalidArgumentException('Champ requis');
}
```

### Après

```php
// Nouveau code avec exceptions spécialisées
use App\Exception\SecurityException;
use App\Exception\MediaException;
use App\Exception\ValidationException;

if (!$clientIp) {
    throw SecurityException::unauthorizedAccess('IP client non détectable');
}

if ($file->getSize() > $maxSize) {
    throw MediaException::fileTooLarge($file->getClientOriginalName(), $file->getSize(), $maxSize);
}

if (empty($field)) {
    throw ValidationException::requiredFieldMissing('field');
}
```

## Gestion des exceptions dans les contrôleurs

```php
try {
    $this->securityService->validateRequest($request);
    $media = $this->mediaManager->uploadFile($file, $user);
} catch (SecurityException $e) {
    return new JsonResponse([
        'error' => 'Erreur de sécurité',
        'message' => $e->getMessage(),
        'code' => $e->getCode()
    ], 403);
} catch (MediaException $e) {
    return new JsonResponse([
        'error' => 'Erreur de média',
        'message' => $e->getMessage(),
        'code' => $e->getCode()
    ], 400);
} catch (ValidationException $e) {
    return new JsonResponse([
        'error' => 'Erreur de validation',
        'message' => $e->getMessage(),
        'errors' => $e->getErrors(),
        'code' => $e->getCode()
    ], 422);
}
```

## Avantages

1. **Spécialisation** : Chaque exception est adaptée à son domaine
2. **Codes d'erreur** : Identification précise des problèmes
3. **Messages contextualisés** : Informations détaillées sur l'erreur
4. **Méthodes utilitaires** : Création simplifiée d'exceptions
5. **Typage fort** : Meilleure gestion dans les try/catch
6. **Maintenance** : Code plus lisible et maintenable

## Bonnes pratiques

1. Utilisez les méthodes statiques pour créer les exceptions
2. Fournissez des messages d'erreur clairs et en français
3. Utilisez les codes d'erreur pour identifier les types de problèmes
4. Chaînez les exceptions avec le paramètre `$previous` quand nécessaire
5. Pour ValidationException, utilisez `multipleErrors()` pour les formulaires
6. Loggez les exceptions de sécurité pour l'audit
7. Testez la gestion d'exceptions dans vos tests unitaires
