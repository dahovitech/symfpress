<?php

namespace App\EventSubscriber;

use App\Service\TemplateResolver;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * EventSubscriber pour configurer dynamiquement les templates selon le thème actif
 * S'exécute au début de chaque requête pour garantir la bonne configuration Twig
 */
class ThemeSubscriber implements EventSubscriberInterface
{
    private bool $isConfigured = false;

    public function __construct(
        private TemplateResolver $templateResolver,
        private LoggerInterface $logger
    ) {
    }

    /**
     * Définit les événements auxquels ce subscriber répond
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 10], // Priorité élevée
        ];
    }

    /**
     * Configure les templates lors de la première requête
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        // Ne configurer qu'une seule fois par requête maître
        if (!$event->isMainRequest() || $this->isConfigured) {
            return;
        }

        try {
            $this->logger->debug('Configuration des templates de thème via ThemeSubscriber');
            
            // Configurer les chemins de templates selon le thème actif
            $this->templateResolver->setupTemplatePaths();
            
            $activeTheme = $this->templateResolver->getActiveTheme();
            $this->logger->info("Thème configuré pour cette requête: {$activeTheme}");
            
            $this->isConfigured = true;
            
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de la configuration du thème: ' . $e->getMessage());
            
            // En cas d'erreur, ne pas bloquer l'application
            // Le système utilisera les templates par défaut
        }
    }

    /**
     * Réinitialise la configuration pour les tests
     */
    public function resetConfiguration(): void
    {
        $this->isConfigured = false;
    }

    /**
     * Vérifie si la configuration a été effectuée
     */
    public function isConfigured(): bool
    {
        return $this->isConfigured;
    }
}
