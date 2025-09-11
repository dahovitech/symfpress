<?php

namespace App\Repository;

use App\Entity\Media;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Media>
 */
class MediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Media::class);
    }

    public function save(Media $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Media $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findImages(): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.mimeType LIKE :imageType')
            ->setParameter('imageType', 'image/%')
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByUser(User $user): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.uploadedBy = :user')
            ->setParameter('user', $user)
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByMimeType(string $mimeType): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.mimeType = :mimeType')
            ->setParameter('mimeType', $mimeType)
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function searchByFilename(string $query): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.originalName LIKE :query OR m.filename LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findRecent(int $limit = 10): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.uploadedBy', 'u')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function getTotalFileSize(): int
    {
        return (int) $this->createQueryBuilder('m')
            ->select('SUM(m.fileSize)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countByMimeType(): array
    {
        return $this->createQueryBuilder('m')
            ->select('m.mimeType, COUNT(m.id) as count')
            ->groupBy('m.mimeType')
            ->orderBy('count', 'DESC')
            ->getQuery()
            ->getResult();
    }
}