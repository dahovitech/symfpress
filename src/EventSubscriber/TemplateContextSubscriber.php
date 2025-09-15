<?php

namespace App\EventSubscriber;

use App\Service\TemplateResolver;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Subscriber pour gérer la configuration des templates selon le contexte
 * Empêche les thèmes d'interférer avec l'interface d'administration
 */
class TemplateContextSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private TemplateResolver $templateResolver,
        private LoggerInterface $logger
    ) {
    }

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
        $route = $request->attributes->get('_route');

        // Détecter si nous sommes dans l'interface d'administration
        $isAdminRoute = $route && (
            str_starts_with($route, 'admin_') ||
            str_starts_with($request->getPathInfo(), '/admin')
        );

        if ($isAdminRoute) {
            $this->logger->info("Route admin détectée: {$route} - Les thèmes sont désactivés pour cette requête");
            
            // Pour les routes admin, on peut marquer le contexte pour éviter l'utilisation des thèmes
            $request->attributes->set('_disable_theme', true);
        } else {
            $this->logger->debug("Route frontend détectée: {$route} - Thèmes disponibles");
        }
    }
}
