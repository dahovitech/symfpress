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

    /**
     * Trouve tous les médias avec eager loading de l'utilisateur
     */
    public function findAll(int $limit = 100): array
    {
        return $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findImages(int $limit = 50): array
    {
        return $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.mimeType LIKE :imageType')
            ->setParameter('imageType', 'image/%')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findByUser(User $user, int $limit = 100): array
    {
        return $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.uploadedBy = :user')
            ->setParameter('user', $user)
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findByMimeType(string $mimeType, int $limit = 50): array
    {
        return $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.mimeType = :mimeType')
            ->setParameter('mimeType', $mimeType)
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function searchByFilename(string $query, int $limit = 50): array
    {
        return $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->where('m.originalName LIKE :query OR m.filename LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findRecent(int $limit = 10): array
    {
        return $this->createQueryBuilder('m')
            ->addSelect('u')
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

    /**
     * Méthodes d'optimisation supplémentaires
     */

    /**
     * Trouve les médias avec pagination optimisée
     */
    public function findWithPagination(int $page = 1, int $limit = 20): array
    {
        $offset = ($page - 1) * $limit;
        $totalQuery = $this->createQueryBuilder('m')
            ->select('COUNT(m.id)')
            ->getQuery();
        
        $total = $totalQuery->getSingleScalarResult();

        $media = $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->orderBy('m.createdAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return [
            'media' => $media,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'totalPages' => ceil($total / $limit)
        ];
    }

    /**
     * Recherche avancée de médias par différents critères
     */
    public function advancedSearch(array $criteria = [], int $limit = 50): array
    {
        $qb = $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit);

        if (isset($criteria['mimeType']) && !empty($criteria['mimeType'])) {
            $qb->andWhere('m.mimeType LIKE :mimeType')
               ->setParameter('mimeType', $criteria['mimeType'] . '%');
        }

        if (isset($criteria['userId']) && !empty($criteria['userId'])) {
            $qb->andWhere('m.uploadedBy = :userId')
               ->setParameter('userId', $criteria['userId']);
        }

        if (isset($criteria['filename']) && !empty($criteria['filename'])) {
            $qb->andWhere('m.originalName LIKE :filename OR m.filename LIKE :filename')
               ->setParameter('filename', '%' . $criteria['filename'] . '%');
        }

        if (isset($criteria['dateFrom']) && $criteria['dateFrom'] instanceof \DateTime) {
            $qb->andWhere('m.createdAt >= :dateFrom')
               ->setParameter('dateFrom', $criteria['dateFrom']);
        }

        if (isset($criteria['dateTo']) && $criteria['dateTo'] instanceof \DateTime) {
            $qb->andWhere('m.createdAt <= :dateTo')
               ->setParameter('dateTo', $criteria['dateTo']);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve les médias orphelins (non utilisés)
     */
    public function findOrphanMedia(int $limit = 100): array
    {
        // Note: Cette méthode devrait être adaptée selon les relations dans votre modèle
        // Par exemple, si Media est lié aux Posts via featuredImage
        return $this->createQueryBuilder('m')
            ->addSelect('u')
            ->leftJoin('m.uploadedBy', 'u')
            ->leftJoin('App:Post', 'p', 'WITH', 'p.featuredImage = m.id')
            ->where('p.id IS NULL')
            ->orderBy('m.createdAt', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}