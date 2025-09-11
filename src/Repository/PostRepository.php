<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function save(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findPublished(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->orderBy('p.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findPublishedWithPagination(int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function countPublished(): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findBySlugAndLanguage(string $slug, Language $language): ?Post
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->where('p.slug = :slug')
            ->andWhere('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->setParameter('slug', $slug)
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findFeatured(int $limit = 5): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('p.isFeatured = true')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->orderBy('p.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findByCategory($categoryId, int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.categories', 'c')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('c.id = :categoryId')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('categoryId', $categoryId)
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findByTag($tagId, int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.tags', 'tag')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('tag.id = :tagId')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('tagId', $tagId)
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function searchPosts(string $query, Language $language, int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('t.language = :language')
            ->andWhere('(
                t.title LIKE :query OR 
                t.content LIKE :query OR 
                t.excerpt LIKE :query
            )')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('language', $language)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findRelatedPosts(Post $post, int $limit = 5): array
    {
        $categories = $post->getCategories()->toArray();
        $tags = $post->getTags()->toArray();

        if (empty($categories) && empty($tags)) {
            return [];
        }

        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('p.id != :currentPostId')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('currentPostId', $post->getId())
            ->setMaxResults($limit);

        if (!empty($categories)) {
            $qb->leftJoin('p.categories', 'c')
               ->andWhere('c IN (:categories)')
               ->setParameter('categories', $categories);
        }

        if (!empty($tags)) {
            $qb->leftJoin('p.tags', 'tag')
               ->orWhere('tag IN (:tags)')
               ->setParameter('tags', $tags);
        }

        return $qb->orderBy('p.publishedAt', 'DESC')
                  ->getQuery()
                  ->getResult();
    }
}