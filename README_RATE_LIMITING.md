# Rate Limiting - Configuration Rapide

## Installation

1. **Installer la dépendance Symfony** (si pas encore fait) :
   ```bash
   composer require symfony/rate-limiter
   ```

2. **Fichiers automatiquement configurés** :
   - ✅ `config/packages/rate_limiter.yaml` - Configuration des limiteurs
   - ✅ `src/Service/RateLimitService.php` - Service principal
   - ✅ `src/EventListener/RateLimitListener.php` - Application automatique
   - ✅ `src/Attribute/RateLimit.php` - Attribut déclaratif
   - ✅ `config/services.yaml` - Services mis à jour

## Configuration par Défaut

| Limiteur | Limite | Intervalle | Usage |
|----------|--------|------------|-------|
| **login** | 5 | 15 min | Connexion |
| **api** | 60 | 1 min | API |
| **admin_sensitive** | 10 | 1 min | Admin |
| **media_upload** | 5 | 1 min | Upload |

## Utilisation Automatique

Les routes suivantes sont **automatiquement protégées** :

- `POST /login` → Limiteur **login**
- `/api/*` → Limiteur **api**
- `POST /admin/user/*/delete` → Limiteur **admin_sensitive**
- `POST /admin/media/*` → Limiteur **media_upload**

## Utilisation Manuelle

```php
// Dans un contrôleur
use App\Service\RateLimitService;

public function __construct(
    private RateLimitService $rateLimitService
) {}

public function monAction(Request $request): Response
{
    // Vérifier la limite
    $this->rateLimitService->checkLimit('api', $request);
    
    return new Response('OK');
}
```

## Attribution Déclarative

```php
use App\Attribute\RateLimit;

#[RateLimit('api')]
public function protectedEndpoint(): JsonResponse
{
    return new JsonResponse(['status' => 'ok']);
}
```

## Personnalisation

Éditez `config/packages/rate_limiter.yaml` :

```yaml
framework:
    rate_limiter:
        my_custom_limiter:
            policy: 'token_bucket'
            limit: 100
            interval: '1 hour'
            storage_service: 'cache.rate_limiter'
```

## Administration

Endpoints d'administration (ROLE_ADMIN requis) :

- `GET /admin/api/limits-status` - État des limites
- `POST /admin/api/reset-limits` - Réinitialiser une limite

## Documentation Complète

👉 Voir [docs/RATE_LIMITING.md](docs/RATE_LIMITING.md) pour la documentation détaillée.

## Activation

Le rate limiting est **actif immédiatement** après installation du composant Symfony. 

Pour désactiver temporairement :
```yaml
# Dans rate_limiter.yaml, commentez ou supprimez les limiteurs
# Ou modifiez les limites très élevées pour tests
```