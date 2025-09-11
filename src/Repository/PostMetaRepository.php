<?php

namespace App\Repository;

use App\Entity\PostMeta;
use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostMeta>
 */
class PostMetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostMeta::class);
    }

    public function save(PostMeta $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PostMeta $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByPostAndKey(Post $post, string $key): ?PostMeta
    {
        return $this->findOneBy([
            'post' => $post,
            'metaKey' => $key
        ]);
    }

    public function findByKey(string $key): array
    {
        return $this->createQueryBuilder('pm')
            ->leftJoin('pm.post', 'p')
            ->where('pm.metaKey = :key')
            ->setParameter('key', $key)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}