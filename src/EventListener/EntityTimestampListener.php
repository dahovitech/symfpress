<?php

namespace App\EventListener;

use App\Entity\Post;
use App\Entity\Page;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Media;
use App\Entity\User;
use App\Service\SlugService;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist')]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate')]
class EntityTimestampListener
{
    public function __construct(
        private readonly SlugService $slugService
    ) {
    }
    
    public function prePersist(PrePersistEventArgs $args): void
    {
        $entity = $args->getObject();
        
        $this->updateTimestamps($entity);
        $this->generateSlug($entity);
    }
    
    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $entity = $args->getObject();
        
        $this->updateTimestamps($entity, true);
        $this->generateSlug($entity);
    }
    
    private function updateTimestamps(object $entity, bool $isUpdate = false): void
    {
        $now = new \DateTime();
        
        if (method_exists($entity, 'setCreatedAt') && !$isUpdate) {
            $entity->setCreatedAt($now);
        }
        
        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt($now);
        }
        
        // Gestion spéciale pour les posts et pages
        if (($entity instanceof Post || $entity instanceof Page) && !$isUpdate) {
            if ($entity->getStatus() === 'published' && !$entity->getPublishedAt()) {
                $entity->setPublishedAt($now);
            }
        }
    }
    
    private function generateSlug(object $entity): void
    {
        if (!method_exists($entity, 'getSlug') || !method_exists($entity, 'setSlug')) {
            return;
        }
        
        // Si le slug existe déjà, ne pas le régénérer
        if ($entity->getSlug()) {
            return;
        }
        
        $title = null;
        
        // Essayer de récupérer le titre depuis les traductions
        if (method_exists($entity, 'getTranslations')) {
            $translations = $entity->getTranslations();
            if (!$translations->isEmpty()) {
                $firstTranslation = $translations->first();
                if (method_exists($firstTranslation, 'getTitle')) {
                    $title = $firstTranslation->getTitle();
                } elseif (method_exists($firstTranslation, 'getName')) {
                    $title = $firstTranslation->getName();
                }
            }
        }
        
        // Fallback pour les entités sans traductions
        if (!$title) {
            if (method_exists($entity, 'getTitle')) {
                $title = $entity->getTitle();
            } elseif (method_exists($entity, 'getName')) {
                $title = $entity->getName();
            } elseif ($entity instanceof User) {
                $title = $entity->getUsername() ?: $entity->getEmail();
            } elseif ($entity instanceof Media) {
                $title = $entity->getOriginalName();
            }
        }
        
        if ($title) {
            $baseSlug = $this->slugService->generate($title);
            
            // Rendre le slug unique
            $slug = $this->slugService->makeUnique($baseSlug, function($testSlug) use ($entity) {
                return $this->slugExists($testSlug, $entity);
            });
            
            $entity->setSlug($slug);
        }
    }
    
    private function slugExists(string $slug, object $entity): bool
    {
        // Cette méthode devrait idéalement utiliser le repository approprié
        // Pour le moment, retourner false (à améliorer avec injection de dependencies)
        return false;
    }
}