<?php

namespace App\Repository;

use App\Entity\Tag;
use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tag>
 */
class TagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tag::class);
    }

    public function save(Tag $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Tag $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySlug(string $slug): ?Tag
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    public function findWithPostCount(): array
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.translations', 'tr')
            ->leftJoin('t.posts', 'p')
            ->addSelect('COUNT(p.id) as postCount')
            ->groupBy('t.id')
            ->orderBy('postCount', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findPopular(int $limit = 10): array
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.translations', 'tr')
            ->leftJoin('t.posts', 'p')
            ->addSelect('COUNT(p.id) as HIDDEN postCount')
            ->groupBy('t.id')
            ->having('COUNT(p.id) > 0')
            ->orderBy('postCount', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function searchTags(string $query): array
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.translations', 'tr')
            ->where('tr.name LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('tr.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}