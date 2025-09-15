<?php

namespace App\Extension\Event;

use App\Extension\Interface\PluginInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Événement déclenché lors des actions sur les plugins
 */
class PluginEvent extends Event
{
    public function __construct(
        private string $pluginName,
        private PluginInterface $plugin
    ) {}
    
    /**
     * Retourne le nom du plugin
     */
    public function getPluginName(): string
    {
        return $this->pluginName;
    }
    
    /**
     * Retourne l'instance du plugin
     */
    public function getPlugin(): PluginInterface
    {
        return $this->plugin;
    }
}
