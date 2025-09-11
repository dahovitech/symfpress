<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function save(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findRootCategories(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.translations', 't')
            ->where('c.parent IS NULL')
            ->orderBy('c.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findChildren(Category $parent): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.translations', 't')
            ->where('c.parent = :parent')
            ->setParameter('parent', $parent)
            ->orderBy('c.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findBySlug(string $slug): ?Category
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    public function findWithPostCount(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.translations', 't')
            ->leftJoin('c.posts', 'p')
            ->addSelect('COUNT(p.id) as postCount')
            ->groupBy('c.id')
            ->orderBy('c.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAvailableParents(?Category $excludeCategory = null): array
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.translations', 't')
            ->orderBy('c.menuOrder', 'ASC');

        if ($excludeCategory) {
            // Exclure la catégorie et ses descendants
            $excludeIds = $this->getDescendantIds($excludeCategory);
            $excludeIds[] = $excludeCategory->getId();
            
            $qb->andWhere('c.id NOT IN (:excludeIds)')
               ->setParameter('excludeIds', $excludeIds);
        }

        return $qb->getQuery()->getResult();
    }

    private function getDescendantIds(Category $category): array
    {
        $ids = [];
        foreach ($category->getChildren() as $child) {
            $ids[] = $child->getId();
            $ids = array_merge($ids, $this->getDescendantIds($child));
        }
        return $ids;
    }
}