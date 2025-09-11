<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PageRepository::class)]
#[ORM\Table(name: 'page')]
class Page
{
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_PRIVATE = 'private';
    public const STATUS_TRASH = 'trash';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: [self::STATUS_DRAFT, self::STATUS_PUBLISHED, self::STATUS_PRIVATE, self::STATUS_TRASH])]
    private string $status = self::STATUS_DRAFT;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $publishedAt = null;

    #[ORM\Column]
    private bool $commentStatus = false;

    #[ORM\Column]
    private int $menuOrder = 0;

    #[ORM\Column(length: 50)]
    private string $template = 'default';

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'pages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?Media $featuredImage = null;

    /**
     * @var Collection<int, PageTranslation>
     */
    #[ORM\OneToMany(targetEntity: PageTranslation::class, mappedBy: 'page', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $translations;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'page', orphanRemoval: true)]
    private Collection $comments;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function isPublished(): bool
    {
        return $this->status === self::STATUS_PUBLISHED && 
               ($this->publishedAt === null || $this->publishedAt <= new \DateTime());
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

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeInterface $publishedAt): static
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    public function getCommentStatus(): bool
    {
        return $this->commentStatus;
    }

    public function setCommentStatus(bool $commentStatus): static
    {
        $this->commentStatus = $commentStatus;
        return $this;
    }

    public function getMenuOrder(): int
    {
        return $this->menuOrder;
    }

    public function setMenuOrder(int $menuOrder): static
    {
        $this->menuOrder = $menuOrder;
        return $this;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): static
    {
        $this->template = $template;
        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child): static
    {
        if (!$this->children->contains($child)) {
            $this->children->add($child);
            $child->setParent($this);
        }
        return $this;
    }

    public function removeChild(self $child): static
    {
        if ($this->children->removeElement($child)) {
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }
        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;
        return $this;
    }

    public function getFeaturedImage(): ?Media
    {
        return $this->featuredImage;
    }

    public function setFeaturedImage(?Media $featuredImage): static
    {
        $this->featuredImage = $featuredImage;
        return $this;
    }

    /**
     * @return Collection<int, PageTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(PageTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setPage($this);
        }
        return $this;
    }

    public function removeTranslation(PageTranslation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            if ($translation->getPage() === $this) {
                $translation->setPage(null);
            }
        }
        return $this;
    }

    /**
     * Récupère la traduction pour une langue donnée
     */
    public function getTranslationForLanguage(Language $language): ?PageTranslation
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
    public function getDisplayTitle(Language $language): string
    {
        $translation = $this->getTranslationForLanguage($language);
        return $translation?->getTitle() ?? 'Page #' . $this->id;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function getPublishedComments(): array
    {
        return $this->comments->filter(fn(Comment $comment) => $comment->isApproved())->toArray();
    }

    public function getBreadcrumb(): array
    {
        $breadcrumb = [];
        $current = $this;
        
        while ($current !== null) {
            array_unshift($breadcrumb, $current);
            $current = $current->getParent();
        }
        
        return $breadcrumb;
    }

    public function getLevel(): int
    {
        $level = 0;
        $current = $this->parent;
        
        while ($current !== null) {
            $level++;
            $current = $current->getParent();
        }
        
        return $level;
    }

    public function __toString(): string
    {
        if ($this->translations->isEmpty()) {
            return 'Page #' . $this->id;
        }
        
        $firstTranslation = $this->translations->first();
        return $firstTranslation->getTitle() ?? 'Page #' . $this->id;
    }
}