<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ORM\Table(name: 'tag')]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    /**
     * @var Collection<int, TagTranslation>
     */
    #[ORM\OneToMany(targetEntity: TagTranslation::class, mappedBy: 'tag', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $translations;

    /**
     * @var Collection<int, Post>
     */
    #[ORM\ManyToMany(targetEntity: Post::class, mappedBy: 'tags')]
    private Collection $posts;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return Collection<int, TagTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(TagTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setTag($this);
        }
        return $this;
    }

    public function removeTranslation(TagTranslation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            if ($translation->getTag() === $this) {
                $translation->setTag(null);
            }
        }
        return $this;
    }

    /**
     * Récupère la traduction pour une langue donnée
     */
    public function getTranslationForLanguage(Language $language): ?TagTranslation
    {
        foreach ($this->translations as $translation) {
            if ($translation->getLanguage() === $language) {
                return $translation;
            }
        }
        return null;
    }

    /**
     * Méthode helper pour affichage dans les listes
     */
    public function getDisplayName(Language $language): string
    {
        $translation = $this->getTranslationForLanguage($language);
        return $translation?->getName() ?? 'Tag #' . $this->id;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->addTag($this);
        }
        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            $post->removeTag($this);
        }
        return $this;
    }

    public function getPostCount(): int
    {
        return $this->posts->count();
    }

    public function __toString(): string
    {
        if ($this->translations->isEmpty()) {
            return 'Tag #' . $this->id;
        }
        
        $firstTranslation = $this->translations->first();
        return $firstTranslation->getName() ?? 'Tag #' . $this->id;
    }
}