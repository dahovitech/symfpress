<?php

namespace App\Repository;

use App\Entity\Setting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Repository pour l'entité Setting avec cache intelligent
 */
class SettingRepository extends ServiceEntityRepository
{
    private const CACHE_PREFIX = 'setting_';
    private const CACHE_TTL = 3600; // 1 heure

    public function __construct(
        ManagerRegistry $registry,
        private CacheItemPoolInterface $cache
    ) {
        parent::__construct($registry, Setting::class);
    }

    /**
     * Récupère la valeur d'un paramètre avec cache
     */
    public function getValue(string $key, mixed $default = null): mixed
    {
        $cacheKey = self::CACHE_PREFIX . $key;
        $item = $this->cache->getItem($cacheKey);

        if (!$item->isHit()) {
            $setting = $this->findOneBy(['settingKey' => $key]);
            $value = $setting?->getTypedValue() ?? $default;
            
            $item->set($value);
            $item->expiresAfter(self::CACHE_TTL);
            $this->cache->save($item);
            
            return $value;
        }

        return $item->get();
    }

    /**
     * Définit la valeur d'un paramètre avec cache
     */
    public function setValue(string $key, mixed $value, string $category = null, string $description = null, string $valueType = 'string'): Setting
    {
        $setting = $this->findOneBy(['settingKey' => $key]);

        if (!$setting) {
            $setting = new Setting();
            $setting->setSettingKey($key)
                   ->setValueType($valueType);
        }

        $setting->setTypedValue($value);

        if ($category !== null) {
            $setting->setCategory($category);
        }

        if ($description !== null) {
            $setting->setDescription($description);
        }

        $this->getEntityManager()->persist($setting);
        $this->getEntityManager()->flush();

        // Invalider le cache
        $this->cache->deleteItem(self::CACHE_PREFIX . $key);

        return $setting;
    }

    /**
     * Récupère tous les paramètres d'une catégorie
     */
    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.category = :category')
            ->setParameter('category', $category)
            ->orderBy('s.settingKey', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère tous les paramètres commençant par un préfixe
     */
    public function findByKeyPrefix(string $prefix): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.settingKey LIKE :prefix')
            ->setParameter('prefix', $prefix . '%')
            ->orderBy('s.settingKey', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère tous les paramètres publics (pour l'API)
     */
    public function findPublicSettings(): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.isPublic = :isPublic')
            ->setParameter('isPublic', true)
            ->orderBy('s.category', 'ASC')
            ->addOrderBy('s.settingKey', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Supprime un paramètre et son cache
     */
    public function deleteSetting(string $key): bool
    {
        $setting = $this->findOneBy(['settingKey' => $key]);
        
        if (!$setting) {
            return false;
        }

        $this->getEntityManager()->remove($setting);
        $this->getEntityManager()->flush();

        // Invalider le cache
        $this->cache->deleteItem(self::CACHE_PREFIX . $key);

        return true;
    }

    /**
     * Vide le cache des paramètres
     */
    public function clearCache(): void
    {
        // Récupérer toutes les clés de cache pour les settings
        $settings = $this->findAll();
        $cacheKeys = [];
        
        foreach ($settings as $setting) {
            $cacheKeys[] = self::CACHE_PREFIX . $setting->getSettingKey();
        }

        if (!empty($cacheKeys)) {
            $this->cache->deleteItems($cacheKeys);
        }
    }

    /**
     * Vérifie si un paramètre existe
     */
    public function exists(string $key): bool
    {
        return $this->findOneBy(['settingKey' => $key]) !== null;
    }

    /**
     * Met à jour plusieurs paramètres en une fois
     */
    public function updateMultiple(array $settings): void
    {
        $em = $this->getEntityManager();
        $cacheKeysToDelete = [];

        foreach ($settings as $key => $value) {
            $setting = $this->findOneBy(['settingKey' => $key]);
            
            if (!$setting) {
                $setting = new Setting();
                $setting->setSettingKey($key);
            }

            if (is_array($value)) {
                $setting->setValueType('array');
            } elseif (is_bool($value)) {
                $setting->setValueType('boolean');
            } elseif (is_int($value)) {
                $setting->setValueType('integer');
            }

            $setting->setTypedValue($value);
            $em->persist($setting);
            
            $cacheKeysToDelete[] = self::CACHE_PREFIX . $key;
        }

        $em->flush();

        // Invalider le cache pour tous les paramètres modifiés
        if (!empty($cacheKeysToDelete)) {
            $this->cache->deleteItems($cacheKeysToDelete);
        }
    }

    /**
     * Statistiques des paramètres par catégorie
     */
    public function getStatsByCategory(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.category, COUNT(s.id) as count')
            ->groupBy('s.category')
            ->orderBy('s.category', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
