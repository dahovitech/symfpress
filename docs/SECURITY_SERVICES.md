# Services de Sécurité et d'Audit

Ce document décrit les nouveaux services de sécurité et d'audit implémentés dans l'application.

## Services Créés

### 1. SecurityService (`src/Service/SecurityService.php`)

Service de validation et contrôle de sécurité pour les requêtes entrantes.

#### Fonctionnalités principales :
- **Validation d'adresses IP** : Vérification contre des listes noires/blanches
- **Validation User-Agent** : Détection de bots, crawlers et outils suspects
- **Analyse de risque** : Calcul d'un score de risque pour chaque requête
- **Validation de headers** : Détection de headers suspects ou malformés

#### Utilisation :

```php
use App\Service\SecurityService;
use Symfony\Component\HttpFoundation\Request;

public function __construct(private SecurityService $securityService) {}

public function someAction(Request $request)
{
    // Validation complète
    $validation = $this->securityService->validateRequest($request);
    
    if (!$validation['is_valid']) {
        throw new AccessDeniedHttpException('Requête non autorisée');
    }
    
    // Calcul du score de risque
    $riskScore = $this->securityService->calculateRiskScore($request);
    if ($riskScore > 70) {
        // Traitement spécial pour les requêtes à haut risque
    }
    
    // Validation IP uniquement
    if (!$this->securityService->validateIp($request)) {
        // Gestion IP bloquée
    }
    
    // Analyse User-Agent
    $userAgentAnalysis = $this->securityService->analyzeUserAgent(
        $request->headers->get('User-Agent')
    );
}
```

### 2. AuditService (`src/Service/AuditService.php`)

Service de logging et d'audit pour les actions sensibles et événements de sécurité.

#### Fonctionnalités principales :
- **Logging d'événements de sécurité** : Tentatives de connexion, accès non autorisés, etc.
- **Audit des actions sensibles** : Modifications de configuration, changements de privilèges
- **Enrichissement contextuel** : Ajout automatique d'informations sur l'utilisateur, la requête, etc.
- **Gestion des niveaux de criticité** : Classification des événements par niveau d'importance

#### Utilisation :

```php
use App\Service\AuditService;

public function __construct(private AuditService $auditService) {}

// Logging d'une tentative de connexion
$this->auditService->logLoginAttempt($username, $success, $reason);

// Logging d'un événement de sécurité
$this->auditService->logSecurity('unauthorized_access', [
    'resource' => '/admin/users',
    'attempted_action' => 'delete_user'
], 'error');

// Logging d'une action administrative
$this->auditService->logAdminAction('user_role_changed', [
    'target_user' => 'john.doe',
    'new_role' => 'ROLE_ADMIN',
    'previous_role' => 'ROLE_USER'
]);

// Logging d'activité suspecte
$this->auditService->logSuspiciousActivity('multiple_failed_logins', 85, [
    'username' => 'admin',
    'attempts_count' => 10,
    'time_window' => '5_minutes'
]);

// Logging d'un changement de configuration
$this->auditService->logConfigurationChange(
    'max_upload_size',
    '10MB',
    '50MB',
    ['changed_by' => 'admin_user']
);
```

## Configuration

### 1. Logging Spécialisé (`config/packages/security_logging.yaml`)

Configuration des channels et handlers de logging dédiés :

- **Channel `security`** : Événements de sécurité
- **Channel `audit`** : Actions sensibles et audit
- **Channel `data_access`** : Accès aux données sensibles

#### Environnements :
- **Développement** : Logs détaillés en fichiers séparés
- **Test** : Logs réduits pour les tests
- **Production** : Logs rotatifs avec alertes pour événements critiques

### 2. Configuration des Services (`config/packages/security_services.yaml`)

Configuration de l'injection de dépendances et paramètres configurables :

```yaml
parameters:
    security.blocked_ip_patterns: []  # Patterns d'IP à bloquer
    security.allowed_ip_patterns: []  # Patterns d'IP autorisées (optionnel)
    security.suspicious_user_agents:  # User-Agents suspects
        - 'bot'
        - 'crawler'
        - 'scanner'
    audit.retention_days: 90          # Durée de rétention des logs
```

## Intégration dans les Contrôleurs

### Exemple avec un EventListener

```php
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SecurityEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private SecurityService $securityService,
        private AuditService $auditService
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 10],
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        
        // Validation automatique des requêtes sensibles
        if ($this->isSensitiveRoute($request)) {
            $validation = $this->securityService->validateRequest($request);
            
            if (!$validation['is_valid']) {
                $this->auditService->logSecurity('request_blocked', [
                    'route' => $request->get('_route'),
                    'errors' => $validation['errors']
                ]);
                
                throw new AccessDeniedHttpException('Accès refusé');
            }
        }
    }

    private function isSensitiveRoute(Request $request): bool
    {
        $sensitiveRoutes = ['admin_', 'user_edit', 'config_'];
        $route = $request->get('_route', '');
        
        foreach ($sensitiveRoutes as $pattern) {
            if (str_starts_with($route, $pattern)) {
                return true;
            }
        }
        
        return false;
    }
}
```

## Fichiers de Logs Générés

### Structure des logs :
```
var/log/
├── security_dev.log      # Événements de sécurité (dev)
├── audit_dev.log         # Actions d'audit (dev)
├── data_access_dev.log   # Accès aux données (dev)
├── security.log          # Événements de sécurité (prod, rotatif)
├── audit.log            # Actions d'audit (prod, rotatif)
└── data_access.log      # Accès aux données (prod, rotatif)
```

### Format des logs (JSON) :
```json
{
  "message": "Événement de sécurité: suspicious_user_agent",
  "context": {
    "event_type": "suspicious_user_agent",
    "ip": "192.168.1.100",
    "user_agent": "curl/7.68.0",
    "pattern_matched": "curl",
    "request_uri": "/admin/users",
    "user": {
      "id": 123,
      "username": "john.doe",
      "roles": ["ROLE_USER"]
    },
    "system": {
      "timestamp": "2025-09-12T15:40:38+00:00",
      "memory_usage": 8388608
    }
  },
  "level": 300,
  "level_name": "WARNING",
  "channel": "security",
  "datetime": "2025-09-12T15:40:38.123456+00:00"
}
```

## Recommandations d'Usage

1. **Configurez les patterns d'IP** dans `security_services.yaml` selon votre environnement
2. **Adaptez les User-Agents suspects** à vos besoins spécifiques
3. **Surveillez les logs critiques** en production
4. **Implémentez des alertes** pour les événements de niveau `critical`
5. **Respectez le RGPD** en masquant les données sensibles dans les logs
6. **Configurez la rotation des logs** pour gérer l'espace disque
7. **Testez régulièrement** la détection des tentatives d'intrusion

## Sécurité et Performance

- Les services sont optimisés pour minimiser l'impact sur les performances
- Les validations utilisent des patterns compilés pour la rapidité
- L'enrichissement contextuel est limité aux données nécessaires
- La gestion mémoire est optimisée pour éviter les fuites
- Les logs sensibles sont automatiquement masqués

## Extension

Ces services peuvent être facilement étendus pour :
- Intégration avec des services externes (AbuseIPDB, MaxMind)
- Alertes par email/Slack pour événements critiques
- Tableau de bord de monitoring en temps réel
- Intégration SIEM (Security Information and Event Management)
- Blocage automatique d'IP basé sur les patterns détectés
