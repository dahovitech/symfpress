# Documentation du Rate Limiting - SymfPress

## Vue d'ensemble

Le système de rate limiting de SymfPress protège l'application contre les abus et les attaques par déni de service (DoS) en limitant le nombre de requêtes qu'un client peut effectuer dans un intervalle de temps donné.

## Architecture

### Composants principaux

1. **Configuration** : `config/packages/rate_limiter.yaml`
2. **Service principal** : `App\Service\RateLimitService`
3. **Event Listener** : `App\EventListener\RateLimitListener`
4. **Attribut déclaratif** : `App\Attribute\RateLimit`

## Configuration des Limiteurs

### Types de limiteurs disponibles

| Nom | Limite | Intervalle | Usage |
|-----|--------|------------|-------|
| `login` | 5 requêtes | 15 minutes | Tentatives de connexion |
| `api` | 60 requêtes | 1 minute | API générales |
| `admin_sensitive` | 10 requêtes | 1 minute | Actions admin sensibles |
| `content_modification` | 30 requêtes | 1 minute | Modification contenu |
| `media_upload` | 5 requêtes | 1 minute | Upload médias |
| `password_reset` | 3 requêtes | 1 heure | Réinitialisation mot de passe |
| `search` | 100 requêtes | 1 minute | Recherches |
| `security_strict` | 2 requêtes | 5 minutes | Sécurité stricte |

### Modification des paramètres

Pour modifier les limites, éditez le fichier `config/packages/rate_limiter.yaml` :

```yaml
framework:
    rate_limiter:
        login:
            policy: 'token_bucket'  # ou 'sliding_window'
            limit: 10               # Nouveau nombre max de requêtes
            interval: '10 minutes'  # Nouvel intervalle
            storage_service: 'cache.rate_limiter'
            reset_time: 600         # En secondes
```

### Types de politiques

#### Token Bucket
- **Avantages** : Permet les rafales, plus flexible
- **Usage** : Actions ponctuelles (login, upload)

#### Sliding Window
- **Avantages** : Limitation plus uniforme
- **Usage** : API, recherches

## Application Automatique

### Routes protégées automatiquement

L'`RateLimitListener` applique automatiquement les limitations selon les patterns :

```php
// Connexion
POST /login -> 'login'

// API
/api/* -> 'api'

// Actions admin sensibles
POST|PUT|PATCH|DELETE /admin/user/*/delete -> 'admin_sensitive'
POST|PUT|PATCH|DELETE /admin/settings -> 'admin_sensitive'

// Modification de contenu
POST|PUT|PATCH|DELETE /admin/post/* -> 'content_modification'
POST|PUT|PATCH|DELETE /admin/page/* -> 'content_modification'

// Upload médias
POST /admin/media/* -> 'media_upload'
POST */upload -> 'media_upload'

// Recherche
GET /search -> 'search'
GET /?q=* -> 'search'
```

## Utilisation Manuelle

### Dans un contrôleur

```php
use App\Service\RateLimitService;

class MonController extends AbstractController
{
    public function __construct(
        private RateLimitService $rateLimitService
    ) {}

    public function monAction(Request $request): Response
    {
        // Vérification de la limite
        $this->rateLimitService->checkLimit('api', $request);
        
        // Votre logique métier...
        
        return new Response('OK');
    }
}
```

### Utilisation de l'attribut

```php
use App\Attribute\RateLimit;

#[RateLimit('api')]
public function apiEndpoint(): JsonResponse
{
    // Cette méthode sera automatiquement protégée
    return new JsonResponse(['status' => 'ok']);
}

// Avec identifiant personnalisé
#[RateLimit('login', identifier: 'user_specific')]
public function loginAction(): Response
{
    // ...
}
```

## Méthodes Utilitaires

### Vérification de proximité de limite

```php
$isNearLimit = $this->rateLimitService->isNearLimit('api', $request, null, 80);

if ($isNearLimit) {
    // Avertir l'utilisateur ou ajuster le comportement
}
```

### Informations sur les limites

```php
$info = $this->rateLimitService->getLimitInfo('api', $request);

// Retourne :
// [
//     'limit' => 60,
//     'remaining' => 45,
//     'reset_time' => 1640995200,
//     'window' => 60
// ]
```

### Réinitialisation manuelle

```php
// Pour les administrateurs uniquement
$this->rateLimitService->resetLimit('api', $request);
```

## Gestion des Erreurs

### Réponse automatique

Quand une limite est dépassée, une `TooManyRequestsHttpException` (HTTP 429) est levée avec :

- **Message** : Description de l'erreur
- **Retry-After** : Temps d'attente en secondes

### Personnalisation des messages d'erreur

Créez un Event Listener pour personnaliser les réponses :

```php
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

#[AsEventListener]
class CustomRateLimitExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        
        if ($exception instanceof TooManyRequestsHttpException) {
            $response = new JsonResponse([
                'error' => 'Trop de requêtes',
                'retry_after' => $exception->getRetryAfter(),
                'message' => 'Veuillez patienter avant de réessayer'
            ], 429);
            
            $event->setResponse($response);
        }
    }
}
```

## Administration

### Endpoints d'administration

L'`ApiExampleController` fournit des endpoints pour :

- **GET** `/admin/api/limits-status` : État des limites
- **POST** `/admin/api/reset-limits` : Réinitialisation des limites

### Surveillance

Les dépassements de limites sont automatiquement loggés :

```php
$this->logger->warning('Rate limit exceeded', [
    'ip' => $request->getClientIp(),
    'path' => $pathInfo,
    'method' => $method,
    'user_agent' => $request->headers->get('User-Agent')
]);
```

## Configuration Avancée

### Stockage personnalisé

Par défaut, les limitations utilisent le cache. Pour Redis :

```yaml
# config/packages/cache.yaml
framework:
    cache:
        pools:
            rate_limiter_pool:
                adapter: cache.adapter.redis
                provider: redis://localhost:6379

# config/packages/rate_limiter.yaml
services:
    cache.rate_limiter:
        parent: rate_limiter_pool
```

### Identification personnalisée

Pour identifier les utilisateurs autrement que par IP :

```php
// Dans votre service ou listener
private function generateCustomKey(Request $request): string
{
    $user = $this->security->getUser();
    if ($user) {
        return 'user_' . $user->getId();
    }
    
    // Fallback vers IP
    return $request->getClientIp();
}
```

## Bonnes Pratiques

### 1. Graduez les limites
```php
// Limites progressives
if ($this->isFirstOffense($request)) {
    $this->rateLimitService->checkLimit('gentle', $request);
} else {
    $this->rateLimitService->checkLimit('strict', $request);
}
```

### 2. Informez les utilisateurs
```php
$limitInfo = $this->rateLimitService->getLimitInfo('api', $request);

$response->headers->set('X-RateLimit-Limit', $limitInfo['limit']);
$response->headers->set('X-RateLimit-Remaining', $limitInfo['remaining']);
$response->headers->set('X-RateLimit-Reset', $limitInfo['reset_time']);
```

### 3. Whitelisting pour les services internes
```php
// Dans votre listener
if ($this->isInternalService($request)) {
    return; // Pas de limitation
}
```

### 4. Monitoring et alertes
```php
// Alert si beaucoup de limitations
if ($this->countRecentLimits() > 100) {
    $this->notificationService->alertAdmins(
        'Taux élevé de limitations détecté'
    );
}
```

## Dépannage

### Problèmes courants

1. **Limites trop strictes** : Augmentez les valeurs dans `rate_limiter.yaml`
2. **Cache plein** : Vérifiez la configuration cache
3. **Faux positifs** : Améliorez la détection des patterns dans le listener

### Debug

```php
// Activez les logs de debug
$this->logger->debug('Rate limit check', [
    'limiter' => $limiterType,
    'key' => $key,
    'remaining' => $limit->getRemainingTokens()
]);
```

### Tests

```php
// Dans vos tests fonctionnels
public function testRateLimit(): void
{
    $client = static::createClient();
    
    // Effectue 6 requêtes (limite = 5)
    for ($i = 0; $i < 6; $i++) {
        $client->request('POST', '/login');
    }
    
    // La 6e doit retourner 429
    $this->assertEquals(429, $client->getResponse()->getStatusCode());
}
```

## Installation des Dépendances

Pour installer le composant rate-limiter de Symfony :

```bash
composer require symfony/rate-limiter
```

Le composant sera automatiquement configuré avec les fichiers fournis.

---

*Cette documentation couvre l'implémentation complète du rate limiting dans SymfPress. Pour des besoins spécifiques, adaptez les configurations selon votre contexte d'utilisation.*