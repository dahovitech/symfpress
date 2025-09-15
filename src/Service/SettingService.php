<?php

namespace App\Service;

use App\Entity\Setting;
use App\Repository\SettingRepository;
use Psr\Log\LoggerInterface;

/**
 * Service de gestion des paramètres de configuration
 */
class SettingService
{
    public const ACTIVE_THEME_KEY = 'active_theme';
    public const DEFAULT_THEME = 'default';

    private array $cachedSettings = [];

    public function __construct(
        private SettingRepository $settingRepository,
        private LoggerInterface $logger
    ) {}

    /**
     * Récupère la valeur d'un paramètre
     */
    public function get(string $key, ?string $defaultValue = null): ?string
    {
        // Vérifier le cache d'abord
        if (array_key_exists($key, $this->cachedSettings)) {
            return $this->cachedSettings[$key];
        }

        try {
            $value = $this->settingRepository->getValue($key, $defaultValue);
            $this->cachedSettings[$key] = $value;
            return $value;
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la récupération du paramètre {$key}: " . $e->getMessage());
            return $defaultValue;
        }
    }

    /**
     * Définit la valeur d'un paramètre
     */
    public function set(string $key, ?string $value, ?string $description = null): bool
    {
        try {
            $this->settingRepository->setValue($key, $value, $description);
            $this->cachedSettings[$key] = $value;
            
            $this->logger->info("Paramètre {$key} mis à jour", [
                'key' => $key,
                'value' => $value,
                'description' => $description
            ]);
            
            return true;
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la mise à jour du paramètre {$key}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Supprime un paramètre
     */
    public function remove(string $key): bool
    {
        try {
            $result = $this->settingRepository->removeByKey($key);
            if ($result) {
                unset($this->cachedSettings[$key]);
                $this->logger->info("Paramètre {$key} supprimé");
            }
            return $result;
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors de la suppression du paramètre {$key}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Récupère le thème actif
     */
    public function getActiveTheme(): string
    {
        return $this->get(self::ACTIVE_THEME_KEY, self::DEFAULT_THEME);
    }

    /**
     * Définit le thème actif
     */
    public function setActiveTheme(string $themeName): bool
    {
        return $this->set(
            self::ACTIVE_THEME_KEY,
            $themeName,
            'Nom du thème actuellement actif'
        );
    }

    /**
     * Vide le cache des paramètres
     */
    public function clearCache(): void
    {
        $this->cachedSettings = [];
        $this->logger->debug("Cache des paramètres vidé");
    }

    /**
     * Précharge tous les paramètres dans le cache
     */
    public function preloadCache(): void
    {
        try {
            $this->cachedSettings = $this->settingRepository->getAllAsKeyValueArray();
            $this->logger->debug("Cache des paramètres préchargé", [
                'count' => count($this->cachedSettings)
            ]);
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors du préchargement du cache: " . $e->getMessage());
        }
    }

    /**
     * Récupère plusieurs paramètres d'un coup
     */
    public function getMultiple(array $keys): array
    {
        $results = [];
        foreach ($keys as $key => $defaultValue) {
            if (is_numeric($key)) {
                // Si la clé est numérique, la valeur est en fait la clé
                $results[$defaultValue] = $this->get($defaultValue);
            } else {
                // Sinon la clé est vraiment la clé et la valeur est la valeur par défaut
                $results[$key] = $this->get($key, $defaultValue);
            }
        }
        return $results;
    }

    /**
     * Définit plusieurs paramètres d'un coup
     */
    public function setMultiple(array $settings): bool
    {
        $allSuccess = true;
        foreach ($settings as $key => $value) {
            if (!$this->set($key, $value)) {
                $allSuccess = false;
            }
        }
        return $allSuccess;
    }
}
