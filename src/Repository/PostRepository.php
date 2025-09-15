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

    public function findPublished(int $limit = 50): array
    {
        return $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.featuredImage', 'fi')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->orderBy('p.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findPublishedWithPagination(int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        return $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi')
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
            ->addSelect('a', 't', 'fi', 'c', 'ct', 'tag', 'tt')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->leftJoin('p.categories', 'c')
            ->leftJoin('c.translations', 'ct')
            ->leftJoin('p.tags', 'tag')
            ->leftJoin('tag.translations', 'tt')
            ->where('p.slug = :slug')
            ->andWhere('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('t.language = :language OR t.language IS NULL')
            ->setParameter('slug', $slug)
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('language', $language)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findFeatured(int $limit = 5): array
    {
        return $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi')
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
            ->addSelect('a', 't', 'fi', 'c')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
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
            ->addSelect('a', 't', 'fi', 'tag')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
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
        if (strlen(trim($query)) < 2) {
            return [];
        }

        $cleanQuery = trim(preg_replace('/[^a-zA-Z0-9\s\-_àâäéèêëïîôûüÿñç]/', '', $query));
        if (strlen($cleanQuery) > 100) {
            $cleanQuery = substr($cleanQuery, 0, 100);
        }

        $offset = ($page - 1) * $limit;
        
        // Limiter aux 500 posts les plus récents pour la performance
        $recentPostsQb = $this->createQueryBuilder('rp')
            ->select('rp.id')
            ->where('rp.status = :status')
            ->andWhere('rp.publishedAt <= :now')
            ->orderBy('rp.publishedAt', 'DESC')
            ->setMaxResults(500);

        return $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->where('p.id IN (' . $recentPostsQb->getDQL() . ')')
            ->andWhere('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('t.language = :language OR t.language IS NULL')
            ->andWhere('(t.title LIKE :searchTerm OR t.content LIKE :searchTerm OR t.excerpt LIKE :searchTerm)')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('language', $language)
            ->setParameter('searchTerm', '%' . $cleanQuery . '%')
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findRelatedPosts(Post $post, int $limit = 5): array
    {
        $qb = $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi', 'c', 'tag')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->leftJoin('p.categories', 'c')
            ->leftJoin('p.tags', 'tag')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('p.id != :currentPostId')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('currentPostId', $post->getId())
            ->orderBy('p.publishedAt', 'DESC')
            ->setMaxResults($limit);

        // Améliorer la logique de posts liés
        $categories = $post->getCategories();
        $tags = $post->getTags();

        if (!$categories->isEmpty()) {
            $categoryIds = array_map(fn($cat) => $cat->getId(), $categories->toArray());
            $qb->andWhere('c.id IN (:categoryIds)')
               ->setParameter('categoryIds', $categoryIds);
        } elseif (!$tags->isEmpty()) {
            $tagIds = array_map(fn($tag) => $tag->getId(), $tags->toArray());
            $qb->andWhere('tag.id IN (:tagIds)')
               ->setParameter('tagIds', $tagIds);
        }

        $relatedPosts = $qb->getQuery()->getResult();

        // Si pas assez de posts liés, compléter avec des posts récents
        if (count($relatedPosts) < $limit) {
            $remaining = $limit - count($relatedPosts);
            $recentPosts = $this->createQueryBuilder('p2')
                ->addSelect('a2', 't2', 'fi2')
                ->leftJoin('p2.translations', 't2')
                ->leftJoin('p2.author', 'a2')
                ->leftJoin('p2.featuredImage', 'fi2')
                ->where('p2.status = :status')
                ->andWhere('p2.publishedAt <= :now')
                ->andWhere('p2.id != :currentPostId')
                ->setParameter('status', Post::STATUS_PUBLISHED)
                ->setParameter('now', new \DateTime())
                ->setParameter('currentPostId', $post->getId())
                ->orderBy('p2.publishedAt', 'DESC')
                ->setMaxResults($remaining)
                ->getQuery()
                ->getResult();

            $relatedPosts = array_merge($relatedPosts, $recentPosts);
        }

        return array_slice($relatedPosts, 0, $limit);
    }

    public function findPublishedPaginated(int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        $posts = $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi', 'c', 'tag')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.featuredImage', 'fi')
            ->leftJoin('p.categories', 'c')
            ->leftJoin('p.tags', 'tag')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $total = $this->countPublished();

        return [
            'posts' => $posts,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'pages' => ceil($total / $limit)
        ];
    }

    public function searchPostsOptimized(string $query, Language $language, int $page = 1, int $limit = 10): array
    {
        if (strlen(trim($query)) < 2) {
            return ['posts' => [], 'total' => 0, 'page' => $page, 'limit' => $limit, 'pages' => 0];
        }

        $cleanQuery = trim(preg_replace('/[^a-zA-Z0-9\s\-_àâäéèêëïîôûüÿñç]/', '', $query));
        if (strlen($cleanQuery) > 100) {
            $cleanQuery = substr($cleanQuery, 0, 100);
        }

        $offset = ($page - 1) * $limit;

        // Requête optimisée avec eager loading
        $posts = $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi', 'c', 'tag')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.featuredImage', 'fi')
            ->leftJoin('p.categories', 'c')
            ->leftJoin('p.tags', 'tag')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('t.language = :language OR t.language IS NULL')
            ->andWhere('(t.title LIKE :searchTerm OR t.content LIKE :searchTerm OR t.excerpt LIKE :searchTerm)')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('language', $language)
            ->setParameter('searchTerm', '%' . $cleanQuery . '%')
            ->orderBy('p.publishedAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        // Comptage total pour la pagination
        $total = $this->createQueryBuilder('p')
            ->select('COUNT(DISTINCT p.id)')
            ->leftJoin('p.translations', 't')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('t.language = :language OR t.language IS NULL')
            ->andWhere('(t.title LIKE :searchTerm OR t.content LIKE :searchTerm OR t.excerpt LIKE :searchTerm)')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('language', $language)
            ->setParameter('searchTerm', '%' . $cleanQuery . '%')
            ->getQuery()
            ->getSingleScalarResult();

        return [
            'posts' => $posts,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'pages' => ceil($total / $limit)
        ];
    }

    public function findPopularPosts(int $limit = 10, int $days = 30): array
    {
        $startDate = new \DateTime();
        $startDate->modify("-{$days} days");

        return $this->createQueryBuilder('p')
            ->addSelect('a', 't', 'fi')
            ->leftJoin('p.author', 'a')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.featuredImage', 'fi')
            ->where('p.status = :status')
            ->andWhere('p.publishedAt <= :now')
            ->andWhere('p.publishedAt >= :startDate')
            ->setParameter('status', Post::STATUS_PUBLISHED)
            ->setParameter('now', new \DateTime())
            ->setParameter('startDate', $startDate)
            ->orderBy('p.viewCount', 'DESC')
            ->addOrderBy('p.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
