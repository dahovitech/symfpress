<?php

namespace App\Repository;

use App\Entity\Menu;
use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Menu>
 */
class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    public function save(Menu $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Menu $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByLocation(string $location): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.translations', 't')
            ->where('m.location = :location')
            ->andWhere('m.isActive = true')
            ->andWhere('m.parent IS NULL')
            ->setParameter('location', $location)
            ->orderBy('m.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findChildren(Menu $parent): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.translations', 't')
            ->where('m.parent = :parent')
            ->andWhere('m.isActive = true')
            ->setParameter('parent', $parent)
            ->orderBy('m.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findMenuStructure(string $location): array
    {
        $rootMenus = $this->findByLocation($location);
        
        foreach ($rootMenus as $menu) {
            $this->loadChildrenRecursively($menu);
        }
        
        return $rootMenus;
    }

    private function loadChildrenRecursively(Menu $menu): void
    {
        $children = $this->findChildren($menu);
        $menu->children = $children; // Temporary property for navigation
        
        foreach ($children as $child) {
            $this->loadChildrenRecursively($child);
        }
    }

    public function findActiveLocations(): array
    {
        return $this->createQueryBuilder('m')
            ->select('DISTINCT m.location')
            ->where('m.isActive = true')
            ->orderBy('m.location', 'ASC')
            ->getQuery()
            ->getSingleColumnResult();
    }

    public function findByLocationHierarchical(string $location): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.translations', 't')
            ->where('m.location = :location')
            ->andWhere('m.parent IS NULL')
            ->setParameter('location', $location)
            ->orderBy('m.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAvailableParents(?Menu $excludeMenu = null): array
    {
        $qb = $this->createQueryBuilder('m')
            ->leftJoin('m.translations', 't')
            ->orderBy('m.menuOrder', 'ASC');

        if ($excludeMenu) {
            // Exclure le menu et ses descendants
            $excludeIds = $this->getDescendantIds($excludeMenu);
            $excludeIds[] = $excludeMenu->getId();
            
            $qb->andWhere('m.id NOT IN (:excludeIds)')
               ->setParameter('excludeIds', $excludeIds);
        }

        return $qb->getQuery()->getResult();
    }

    private function getDescendantIds(Menu $menu): array
    {
        $ids = [];
        foreach ($menu->getChildren() as $child) {
            $ids[] = $child->getId();
            $ids = array_merge($ids, $this->getDescendantIds($child));
        }
        return $ids;
    }
}