<?php

namespace App\Repository;

use App\Entity\WidgetZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WidgetZone>
 *
 * @method WidgetZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method WidgetZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method WidgetZone[]    findAll()
 * @method WidgetZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WidgetZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WidgetZone::class);
    }

    /**
     * Trouve les zones actives
     *
     * @return WidgetZone[]
     */
    public function findActive(): array
    {
        return $this->createQueryBuilder('z')
            ->where('z.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les zones compatibles avec un thème
     *
     * @param string|null $theme
     * @return WidgetZone[]
     */
    public function findForTheme(?string $theme = null): array
    {
        $qb = $this->createQueryBuilder('z')
            ->where('z.isActive = :active')
            ->setParameter('active', true);

        if ($theme !== null) {
            $qb->andWhere(
                $qb->expr()->orX(
                    'z.theme IS NULL',
                    'z.theme = :theme'
                )
            )
            ->setParameter('theme', $theme);
        }

        return $qb->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve une zone par nom
     *
     * @param string $name
     * @return WidgetZone|null
     */
    public function findByName(string $name): ?WidgetZone
    {
        return $this->createQueryBuilder('z')
            ->where('z.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Trouve les zones avec leurs widgets actifs
     *
     * @param string|null $theme
     * @return WidgetZone[]
     */
    public function findWithActiveWidgets(?string $theme = null): array
    {
        $qb = $this->createQueryBuilder('z')
            ->leftJoin('z.widgets', 'w')
            ->addSelect('w')
            ->where('z.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('z.name', 'ASC')
            ->addOrderBy('w.sortOrder', 'ASC');

        if ($theme !== null) {
            $qb->andWhere(
                $qb->expr()->orX(
                    'z.theme IS NULL',
                    'z.theme = :theme'
                )
            )
            ->andWhere(
                $qb->expr()->orX(
                    'w.theme IS NULL',
                    'w.theme = :theme',
                    'w.id IS NULL' // Pour inclure les zones sans widgets
                )
            )
            ->setParameter('theme', $theme);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve les zones sans widgets
     *
     * @return WidgetZone[]
     */
    public function findEmpty(): array
    {
        return $this->createQueryBuilder('z')
            ->leftJoin('z.widgets', 'w')
            ->where('w.id IS NULL')
            ->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Obtient les statistiques des zones
     *
     * @return array
     */
    public function getStats(): array
    {
        return $this->createQueryBuilder('z')
            ->select([
                'z.id',
                'z.name',
                'z.title',
                'z.theme',
                'z.isActive',
                'COUNT(w.id) as widget_count',
                'SUM(CASE WHEN w.isActive = true THEN 1 ELSE 0 END) as active_widget_count'
            ])
            ->leftJoin('z.widgets', 'w')
            ->groupBy('z.id')
            ->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Vérifie si une zone avec ce nom existe déjà
     *
     * @param string $name
     * @param int|null $excludeId
     * @return bool
     */
    public function nameExists(string $name, ?int $excludeId = null): bool
    {
        $qb = $this->createQueryBuilder('z')
            ->select('COUNT(z.id)')
            ->where('z.name = :name')
            ->setParameter('name', $name);

        if ($excludeId !== null) {
            $qb->andWhere('z.id != :excludeId')
                ->setParameter('excludeId', $excludeId);
        }

        return (int) $qb->getQuery()->getSingleScalarResult() > 0;
    }

    /**
     * Recherche de zones par terme
     *
     * @param string $searchTerm
     * @return WidgetZone[]
     */
    public function search(string $searchTerm): array
    {
        return $this->createQueryBuilder('z')
            ->where(
                $this->createQueryBuilder('z')->expr()->orX(
                    'z.name LIKE :term',
                    'z.title LIKE :term',
                    'z.description LIKE :term'
                )
            )
            ->setParameter('term', '%' . $searchTerm . '%')
            ->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les zones par thème spécifique (pas de zones génériques)
     *
     * @param string $theme
     * @return WidgetZone[]
     */
    public function findByTheme(string $theme): array
    {
        return $this->createQueryBuilder('z')
            ->where('z.theme = :theme')
            ->setParameter('theme', $theme)
            ->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Compte le nombre de zones par thème
     *
     * @return array
     */
    public function countByTheme(): array
    {
        return $this->createQueryBuilder('z')
            ->select([
                'COALESCE(z.theme, \'générique\') as theme_name',
                'COUNT(z.id) as zone_count'
            ])
            ->groupBy('z.theme')
            ->orderBy('zone_count', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Obtient toutes les zones avec le nombre de widgets
     *
     * @return array
     */
    public function findAllWithWidgetCount(): array
    {
        return $this->createQueryBuilder('z')
            ->select([
                'z',
                'COUNT(w.id) as widgetCount'
            ])
            ->leftJoin('z.widgets', 'w')
            ->groupBy('z.id')
            ->orderBy('z.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Sauvegarde une zone de widget
     */
    public function save(WidgetZone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Supprime une zone de widget
     */
    public function remove(WidgetZone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
