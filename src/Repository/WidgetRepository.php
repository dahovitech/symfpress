<?php

namespace App\Repository;

use App\Entity\Widget;
use App\Entity\WidgetZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Widget>
 *
 * @method Widget|null find($id, $lockMode = null, $lockVersion = null)
 * @method Widget|null findOneBy(array $criteria, array $orderBy = null)
 * @method Widget[]    findAll()
 * @method Widget[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WidgetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Widget::class);
    }

    /**
     * Trouve les widgets actifs pour une zone donnée
     *
     * @param WidgetZone $zone
     * @param string|null $theme
     * @return Widget[]
     */
    public function findActiveForZone(WidgetZone $zone, ?string $theme = null): array
    {
        $qb = $this->createQueryBuilder('w')
            ->where('w.zone = :zone')
            ->andWhere('w.isActive = :active')
            ->setParameter('zone', $zone)
            ->setParameter('active', true)
            ->orderBy('w.sortOrder', 'ASC');

        if ($theme !== null) {
            $qb->andWhere(
                $qb->expr()->orX(
                    'w.theme IS NULL',
                    'w.theme = :theme'
                )
            )
            ->setParameter('theme', $theme);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve les widgets actifs pour une zone par nom de zone
     *
     * @param string $zoneName
     * @param string|null $theme
     * @return Widget[]
     */
    public function findActiveForZoneName(string $zoneName, ?string $theme = null): array
    {
        $qb = $this->createQueryBuilder('w')
            ->leftJoin('w.zone', 'z')
            ->addSelect('z')
            ->where('z.name = :zoneName')
            ->andWhere('w.isActive = :active')
            ->andWhere('z.isActive = :zoneActive')
            ->setParameter('zoneName', $zoneName)
            ->setParameter('active', true)
            ->setParameter('zoneActive', true)
            ->orderBy('w.sortOrder', 'ASC');

        if ($theme !== null) {
            $qb->andWhere(
                $qb->expr()->orX(
                    'w.theme IS NULL',
                    'w.theme = :theme'
                )
            )
            ->setParameter('theme', $theme);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve tous les widgets pour un thème donné
     *
     * @param string|null $theme
     * @return Widget[]
     */
    public function findForTheme(?string $theme = null): array
    {
        $qb = $this->createQueryBuilder('w')
            ->leftJoin('w.zone', 'z')
            ->addSelect('z');

        if ($theme !== null) {
            $qb->where(
                $qb->expr()->orX(
                    'w.theme IS NULL',
                    'w.theme = :theme'
                )
            )
            ->setParameter('theme', $theme);
        }

        return $qb->orderBy('z.name', 'ASC')
            ->addOrderBy('w.sortOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les widgets par type
     *
     * @param string $type
     * @param bool $activeOnly
     * @return Widget[]
     */
    public function findByType(string $type, bool $activeOnly = true): array
    {
        $qb = $this->createQueryBuilder('w')
            ->where('w.type = :type')
            ->setParameter('type', $type);

        if ($activeOnly) {
            $qb->andWhere('w.isActive = :active')
                ->setParameter('active', true);
        }

        return $qb->orderBy('w.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Met à jour l'ordre de tri des widgets dans une zone
     *
     * @param array $widgetOrders [à id => order]
     */
    public function updateSortOrders(array $widgetOrders): void
    {
        foreach ($widgetOrders as $id => $order) {
            $this->createQueryBuilder('w')
                ->update()
                ->set('w.sortOrder', ':order')
                ->set('w.updatedAt', ':now')
                ->where('w.id = :id')
                ->setParameter('order', (int)$order)
                ->setParameter('now', new \DateTime())
                ->setParameter('id', $id)
                ->getQuery()
                ->execute();
        }
    }

    /**
     * Déplace un widget vers le haut dans l'ordre de tri
     *
     * @param Widget $widget
     */
    public function moveUp(Widget $widget): bool
    {
        if (!$widget->getZone()) {
            return false;
        }

        $previousWidget = $this->createQueryBuilder('w')
            ->where('w.zone = :zone')
            ->andWhere('w.sortOrder < :order')
            ->setParameter('zone', $widget->getZone())
            ->setParameter('order', $widget->getSortOrder())
            ->orderBy('w.sortOrder', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if ($previousWidget) {
            $currentOrder = $widget->getSortOrder();
            $previousOrder = $previousWidget->getSortOrder();
            
            $widget->setSortOrder($previousOrder);
            $previousWidget->setSortOrder($currentOrder);
            
            $this->getEntityManager()->flush();
            return true;
        }

        return false;
    }

    /**
     * Déplace un widget vers le bas dans l'ordre de tri
     *
     * @param Widget $widget
     */
    public function moveDown(Widget $widget): bool
    {
        if (!$widget->getZone()) {
            return false;
        }

        $nextWidget = $this->createQueryBuilder('w')
            ->where('w.zone = :zone')
            ->andWhere('w.sortOrder > :order')
            ->setParameter('zone', $widget->getZone())
            ->setParameter('order', $widget->getSortOrder())
            ->orderBy('w.sortOrder', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if ($nextWidget) {
            $currentOrder = $widget->getSortOrder();
            $nextOrder = $nextWidget->getSortOrder();
            
            $widget->setSortOrder($nextOrder);
            $nextWidget->setSortOrder($currentOrder);
            
            $this->getEntityManager()->flush();
            return true;
        }

        return false;
    }

    /**
     * Obtient les statistiques des widgets par type
     *
     * @return array
     */
    public function getStatsByType(): array
    {
        return $this->createQueryBuilder('w')
            ->select('w.type, COUNT(w.id) as total')
            ->groupBy('w.type')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Obtient les statistiques des widgets par zone
     *
     * @return array
     */
    public function getStatsByZone(): array
    {
        return $this->createQueryBuilder('w')
            ->select('z.name as zone_name, z.title as zone_title, COUNT(w.id) as total')
            ->leftJoin('w.zone', 'z')
            ->groupBy('z.id')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche de widgets par terme
     *
     * @param string $searchTerm
     * @return Widget[]
     */
    public function search(string $searchTerm): array
    {
        return $this->createQueryBuilder('w')
            ->leftJoin('w.zone', 'z')
            ->addSelect('z')
            ->where(
                $this->createQueryBuilder('w')->expr()->orX(
                    'w.name LIKE :term',
                    'w.content LIKE :term',
                    'z.name LIKE :term',
                    'z.title LIKE :term'
                )
            )
            ->setParameter('term', '%' . $searchTerm . '%')
            ->orderBy('w.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Sauvegarde un widget
     */
    public function save(Widget $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Supprime un widget
     */
    public function remove(Widget $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
