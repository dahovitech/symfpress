<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Service d'audit pour le logging des actions sensibles
 * Centralise l'enregistrement des événements de sécurité et actions importantes
 */
class AuditService
{
    private const SECURITY_EVENTS = [
        'login_attempt',
        'login_success',
        'login_failure',
        'logout',
        'password_change',
        'password_reset_request',
        'password_reset_success',
        'account_locked',
        'account_unlocked',
        'privilege_escalation',
        'unauthorized_access',
        'suspicious_activity',
        'data_breach_attempt',
        'ip_blocked',
        'rate_limit_exceeded',
        'csrf_token_mismatch',
        'invalid_session',
        'suspicious_user_agent',
        'sql_injection_attempt',
        'xss_attempt',
        'file_upload_rejected',
        'admin_action',
    ];

    private const SENSITIVE_ACTIONS = [
        'user_created',
        'user_updated',
        'user_deleted',
        'role_assigned',
        'role_revoked',
        'permission_granted',
        'permission_revoked',
        'configuration_changed',
        'system_maintenance',
        'backup_created',
        'backup_restored',
        'database_migration',
        'plugin_installed',
        'plugin_activated',
        'plugin_deactivated',
        'theme_changed',
        'file_uploaded',
        'file_deleted',
        'content_published',
        'content_deleted',
        'comment_moderated',
    ];

    public function __construct(
        private LoggerInterface $securityLogger,
        private LoggerInterface $auditLogger,
        private RequestStack $requestStack,
        private Security $security,
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Enregistre un événement de sécurité
     *
     * @param string $event Type d'événement
     * @param array $context Contexte supplémentaire
     * @param string $level Niveau de log (info, warning, error, critical)
     */
    public function logSecurity(string $event, array $context = [], string $level = 'warning'): void
    {
        if (!in_array($event, self::SECURITY_EVENTS)) {
            $this->securityLogger->warning('Événement de sécurité inconnu', [
                'event' => $event,
                'context' => $context
            ]);
        }

        $enrichedContext = $this->enrichContext($context, 'security');
        $enrichedContext['event_type'] = $event;
        $enrichedContext['timestamp'] = new \DateTimeImmutable();

        // Log selon le niveau spécifié
        match ($level) {
            'info' => $this->securityLogger->info("Événement de sécurité: {$event}", $enrichedContext),
            'warning' => $this->securityLogger->warning("Événement de sécurité: {$event}", $enrichedContext),
            'error' => $this->securityLogger->error("Événement de sécurité: {$event}", $enrichedContext),
            'critical' => $this->securityLogger->critical("Événement de sécurité: {$event}", $enrichedContext),
            default => $this->securityLogger->warning("Événement de sécurité: {$event}", $enrichedContext),
        };

        // Alertes spéciales pour les événements critiques
        if (in_array($level, ['error', 'critical'])) {
            $this->handleCriticalSecurityEvent($event, $enrichedContext);
        }
    }

    /**
     * Enregistre une action sensible
     *
     * @param string $action Type d'action
     * @param array $context Contexte de l'action
     * @param string $level Niveau de log
     */
    public function logSensitiveAction(string $action, array $context = [], string $level = 'info'): void
    {
        if (!in_array($action, self::SENSITIVE_ACTIONS)) {
            $this->auditLogger->warning('Action sensible inconnue', [
                'action' => $action,
                'context' => $context
            ]);
        }

        $enrichedContext = $this->enrichContext($context, 'audit');
        $enrichedContext['action_type'] = $action;
        $enrichedContext['timestamp'] = new \DateTimeImmutable();

        // Log selon le niveau spécifié
        match ($level) {
            'info' => $this->auditLogger->info("Action sensible: {$action}", $enrichedContext),
            'warning' => $this->auditLogger->warning("Action sensible: {$action}", $enrichedContext),
            'error' => $this->auditLogger->error("Action sensible: {$action}", $enrichedContext),
            'critical' => $this->auditLogger->critical("Action sensible: {$action}", $enrichedContext),
            default => $this->auditLogger->info("Action sensible: {$action}", $enrichedContext),
        };
    }

    /**
     * Enregistre une tentative d'accès non autorisé
     *
     * @param string $resource Ressource accédée
     * @param string $reason Raison du refus
     * @param array $context Contexte supplémentaire
     */
    public function logUnauthorizedAccess(string $resource, string $reason, array $context = []): void
    {
        $this->logSecurity('unauthorized_access', array_merge($context, [
            'resource' => $resource,
            'reason' => $reason,
        ]), 'error');
    }

    /**
     * Enregistre une tentative de connexion
     *
     * @param string $username Nom d'utilisateur
     * @param bool $success Succès de la tentative
     * @param string $reason Raison en cas d'échec
     */
    public function logLoginAttempt(string $username, bool $success, string $reason = ''): void
    {
        $event = $success ? 'login_success' : 'login_failure';
        $level = $success ? 'info' : 'warning';

        $context = [
            'username' => $username,
            'success' => $success,
        ];

        if (!$success) {
            $context['failure_reason'] = $reason;
        }

        $this->logSecurity($event, $context, $level);
    }

    /**
     * Enregistre un changement de privilèges
     *
     * @param string $targetUser Utilisateur cible
     * @param string $action Type de changement (assign, revoke)
     * @param string $privilege Privilège modifié
     * @param array $context Contexte supplémentaire
     */
    public function logPrivilegeChange(string $targetUser, string $action, string $privilege, array $context = []): void
    {
        $actionType = match ($action) {
            'assign' => 'role_assigned',
            'revoke' => 'role_revoked',
            default => 'privilege_escalation'
        };

        $this->logSensitiveAction($actionType, array_merge($context, [
            'target_user' => $targetUser,
            'privilege' => $privilege,
            'action' => $action,
        ]));
    }

    /**
     * Enregistre une modification de configuration système
     *
     * @param string $setting Paramètre modifié
     * @param mixed $oldValue Ancienne valeur
     * @param mixed $newValue Nouvelle valeur
     * @param array $context Contexte supplémentaire
     */
    public function logConfigurationChange(string $setting, $oldValue, $newValue, array $context = []): void
    {
        $this->logSensitiveAction('configuration_changed', array_merge($context, [
            'setting' => $setting,
            'old_value' => $this->sanitizeValue($oldValue),
            'new_value' => $this->sanitizeValue($newValue),
        ]));
    }

    /**
     * Enregistre une activité suspecte
     *
     * @param string $activity Type d'activité
     * @param int $riskScore Score de risque (0-100)
     * @param array $context Contexte détaillé
     */
    public function logSuspiciousActivity(string $activity, int $riskScore, array $context = []): void
    {
        $level = match (true) {
            $riskScore >= 80 => 'critical',
            $riskScore >= 60 => 'error',
            $riskScore >= 40 => 'warning',
            default => 'info'
        };

        $this->logSecurity('suspicious_activity', array_merge($context, [
            'activity_type' => $activity,
            'risk_score' => $riskScore,
        ]), $level);
    }

    /**
     * Enregistre une action administrative
     *
     * @param string $action Action effectuée
     * @param array $context Contexte de l'action
     */
    public function logAdminAction(string $action, array $context = []): void
    {
        $this->logSensitiveAction('admin_action', array_merge($context, [
            'admin_action_type' => $action,
        ]));
    }

    /**
     * Enregistre un accès à des données sensibles
     *
     * @param string $dataType Type de données
     * @param string $operation Opération (read, create, update, delete)
     * @param array $context Contexte supplémentaire
     */
    public function logDataAccess(string $dataType, string $operation, array $context = []): void
    {
        $this->auditLogger->info("Accès aux données: {$dataType}", array_merge(
            $this->enrichContext($context, 'data_access'),
            [
                'data_type' => $dataType,
                'operation' => $operation,
                'timestamp' => new \DateTimeImmutable(),
            ]
        ));
    }

    /**
     * Enrichit le contexte avec les informations de la requête et de l'utilisateur
     *
     * @param array $context Contexte initial
     * @param string $logType Type de log
     * @return array Contexte enrichi
     */
    private function enrichContext(array $context, string $logType): array
    {
        $request = $this->requestStack->getCurrentRequest();
        $user = $this->security->getUser();

        $enriched = $context;
        $enriched['log_type'] = $logType;

        // Informations utilisateur
        if ($user) {
            $enriched['user'] = [
                'id' => method_exists($user, 'getId') ? $user->getId() : null,
                'username' => $user->getUserIdentifier(),
                'roles' => $user->getRoles(),
            ];
        } else {
            $enriched['user'] = 'anonymous';
        }

        // Informations de la requête
        if ($request) {
            $enriched['request'] = [
                'ip' => $request->getClientIp(),
                'user_agent' => $request->headers->get('User-Agent'),
                'method' => $request->getMethod(),
                'uri' => $request->getRequestUri(),
                'referer' => $request->headers->get('Referer'),
            ];

            // Session ID (si disponible)
            if ($request->hasSession() && $request->getSession()->isStarted()) {
                $enriched['session_id'] = substr($request->getSession()->getId(), 0, 8) . '...';
            }
        }

        // Informations système
        $enriched['system'] = [
            'timestamp' => new \DateTimeImmutable(),
            'memory_usage' => memory_get_usage(true),
            'peak_memory' => memory_get_peak_usage(true),
        ];

        return $enriched;
    }

    /**
     * Sanitise une valeur pour le logging (masque les informations sensibles)
     *
     * @param mixed $value
     * @return mixed
     */
    private function sanitizeValue($value): mixed
    {
        if (is_string($value)) {
            // Masque les mots de passe et autres informations sensibles
            $sensitivePatterns = [
                'password' => '***MASKED***',
                'token' => '***MASKED***',
                'key' => '***MASKED***',
                'secret' => '***MASKED***',
            ];

            foreach ($sensitivePatterns as $pattern => $replacement) {
                if (stripos($value, $pattern) !== false) {
                    return $replacement;
                }
            }

            // Masque les emails partiellement
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $parts = explode('@', $value);
                return substr($parts[0], 0, 2) . '***@' . $parts[1];
            }
        }

        if (is_array($value)) {
            return array_map([$this, 'sanitizeValue'], $value);
        }

        return $value;
    }

    /**
     * Gère les événements de sécurité critiques
     *
     * @param string $event
     * @param array $context
     */
    private function handleCriticalSecurityEvent(string $event, array $context): void
    {
        // Ici vous pourriez implémenter :
        // - Notifications par email/Slack
        // - Blocage automatique d'IP
        // - Déclenchement d'alertes
        // - Intégration avec des systèmes SIEM

        $criticalEvents = [
            'data_breach_attempt',
            'sql_injection_attempt',
            'privilege_escalation',
            'account_locked',
        ];

        if (in_array($event, $criticalEvents)) {
            // Log additionnel pour les événements vraiment critiques
            $this->securityLogger->critical("ALERTE SÉCURITÉ CRITIQUE: {$event}", [
                'alert_level' => 'CRITICAL',
                'requires_immediate_attention' => true,
                'context' => $context,
            ]);

            // Ici vous pourriez déclencher des alertes externes
            // $this->sendSecurityAlert($event, $context);
        }
    }

    /**
     * Obtient des statistiques d'audit pour une période donnée
     *
     * @param \DateTimeInterface $startDate
     * @param \DateTimeInterface $endDate
     * @return array
     */
    public function getAuditStatistics(\DateTimeInterface $startDate, \DateTimeInterface $endDate): array
    {
        // Cette méthode pourrait être implémentée avec une base de données
        // pour stocker et analyser les logs d'audit
        
        return [
            'period' => [
                'start' => $startDate->format('Y-m-d H:i:s'),
                'end' => $endDate->format('Y-m-d H:i:s'),
            ],
            'stats' => [
                'total_events' => 0,
                'security_events' => 0,
                'sensitive_actions' => 0,
                'critical_alerts' => 0,
                'unique_users' => 0,
                'unique_ips' => 0,
            ],
            'top_events' => [],
            'top_users' => [],
            'top_ips' => [],
        ];
    }
}
