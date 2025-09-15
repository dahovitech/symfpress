<?php

namespace App\Repository;

use App\Entity\Page;
use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Page>
 */
class PageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function save(Page $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Page $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findPublished(): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->where('p.status = :status')
            ->setParameter('status', Page::STATUS_PUBLISHED)
            ->orderBy('p.menuOrder', 'ASC')
            ->addOrderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBySlugAndLanguage(string $slug, Language $language): ?Page
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->leftJoin('p.author', 'a')
            ->where('p.slug = :slug')
            ->andWhere('p.status = :status')
            ->setParameter('slug', $slug)
            ->setParameter('status', Page::STATUS_PUBLISHED)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findRootPages(): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->where('p.parent IS NULL')
            ->andWhere('p.status = :status')
            ->setParameter('status', Page::STATUS_PUBLISHED)
            ->orderBy('p.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findChildren(Page $parent): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->where('p.parent = :parent')
            ->andWhere('p.status = :status')
            ->setParameter('parent', $parent)
            ->setParameter('status', Page::STATUS_PUBLISHED)
            ->orderBy('p.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findForSitemap(): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->where('p.status = :status')
            ->setParameter('status', Page::STATUS_PUBLISHED)
            ->orderBy('p.updatedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function searchPages(string $query, Language $language): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 't')
            ->where('p.status = :status')
            ->andWhere('t.language = :language')
            ->andWhere('(
                t.title LIKE :query OR 
                t.content LIKE :query
            )')
            ->setParameter('status', Page::STATUS_PUBLISHED)
            ->setParameter('language', $language)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('p.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }
}