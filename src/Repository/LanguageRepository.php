<?php

namespace App\Repository;

use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Language>
 */
class LanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Language::class);
    }

    public function save(Language $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Language $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findDefault(): ?Language
    {
        return $this->findOneBy(['isDefault' => true]);
    }

    public function findActive(): array
    {
        return $this->findBy(['isActive' => true], ['isDefault' => 'DESC', 'name' => 'ASC']);
    }

    public function findByCode(string $code): ?Language
    {
        return $this->findOneBy(['code' => $code, 'isActive' => true]);
    }
}