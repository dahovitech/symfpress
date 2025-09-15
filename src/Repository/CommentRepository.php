<?php

namespace App\Repository;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comment>
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function save(Comment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Comment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findApprovedByPost(Post $post): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.post = :post')
            ->andWhere('c.status = :status')
            ->setParameter('post', $post)
            ->setParameter('status', Comment::STATUS_APPROVED)
            ->orderBy('c.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findApprovedByPage(Page $page): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.page = :page')
            ->andWhere('c.status = :status')
            ->setParameter('page', $page)
            ->setParameter('status', Comment::STATUS_APPROVED)
            ->orderBy('c.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findPending(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.author', 'a')
            ->leftJoin('c.post', 'p')
            ->leftJoin('c.page', 'pg')
            ->where('c.status = :status')
            ->setParameter('status', Comment::STATUS_PENDING)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findRecentApproved(int $limit = 5): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.author', 'a')
            ->leftJoin('c.post', 'p')
            ->leftJoin('c.page', 'pg')
            ->where('c.status = :status')
            ->setParameter('status', Comment::STATUS_APPROVED)
            ->orderBy('c.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function countByStatus(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.status, COUNT(c.id) as count')
            ->groupBy('c.status')
            ->getQuery()
            ->getResult();
    }

    public function findByAuthorEmail(string $email): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.authorEmail = :email')
            ->orWhere('c.author IN (
                SELECT u FROM App\Entity\User u WHERE u.email = :email
            )')
            ->setParameter('email', $email)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}