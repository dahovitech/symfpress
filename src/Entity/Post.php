<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\Table(name: 'post')]
class Post
{
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_SCHEDULED = 'scheduled';
    public const STATUS_PRIVATE = 'private';
    public const STATUS_TRASH = 'trash';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    #[Assert\Regex(
        pattern: '/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
        message: 'Le slug doit contenir uniquement des lettres minuscules, chiffres et tirets, et ne peut commencer ou finir par un tiret.'
    )]
    private ?string $slug = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: [self::STATUS_DRAFT, self::STATUS_PUBLISHED, self::STATUS_SCHEDULED, self::STATUS_PRIVATE, self::STATUS_TRASH])]
    private string $status = self::STATUS_DRAFT;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $publishedAt = null;

    #[ORM\Column]
    private bool $commentStatus = true;

    #[ORM\Column]
    private int $viewCount = 0;

    #[ORM\Column]
    private bool $isFeatured = false;

    #[ORM\Column]
    private int $menuOrder = 0;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?Media $featuredImage = null;

    /**
     * @var Collection<int, PostTranslation>
     */
    #[ORM\OneToMany(targetEntity: PostTranslation::class, mappedBy: 'post', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $translations;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'posts')]
    #[ORM\JoinTable(name: 'post_category')]
    private Collection $categories;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'posts')]
    #[ORM\JoinTable(name: 'post_tag')]
    private Collection $tags;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'post', orphanRemoval: true)]
    private Collection $comments;

    /**
     * @var Collection<int, PostMeta>
     */
    #[ORM\OneToMany(targetEntity: PostMeta::class, mappedBy: 'post', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $postMetas;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->postMetas = new ArrayCollection();
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
               $this->publishedAt && 
               $this->publishedAt <= new \DateTime();
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

    public function getViewCount(): int
    {
        return $this->viewCount;
    }

    public function setViewCount(int $viewCount): static
    {
        $this->viewCount = $viewCount;
        return $this;
    }

    public function incrementViewCount(): static
    {
        $this->viewCount++;
        return $this;
    }

    public function getIsFeatured(): bool
    {
        return $this->isFeatured;
    }

    public function setIsFeatured(bool $isFeatured): static
    {
        $this->isFeatured = $isFeatured;
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
     * @return Collection<int, PostTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(PostTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setPost($this);
        }
        return $this;
    }

    public function removeTranslation(PostTranslation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            if ($translation->getPost() === $this) {
                $translation->setPost(null);
            }
        }
        return $this;
    }

    /**
     * Récupère la traduction pour une langue donnée
     */
    public function getTranslationForLanguage(Language $language): ?PostTranslation
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
        return $translation?->getTitle() ?? 'Post #' . $this->id;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }
        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->categories->removeElement($category);
        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }
        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        $this->tags->removeElement($tag);
        return $this;
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

    /**
     * @return Collection<int, PostMeta>
     */
    public function getPostMetas(): Collection
    {
        return $this->postMetas;
    }

    public function addPostMeta(PostMeta $postMeta): static
    {
        if (!$this->postMetas->contains($postMeta)) {
            $this->postMetas->add($postMeta);
            $postMeta->setPost($this);
        }
        return $this;
    }

    public function removePostMeta(PostMeta $postMeta): static
    {
        if ($this->postMetas->removeElement($postMeta)) {
            if ($postMeta->getPost() === $this) {
                $postMeta->setPost(null);
            }
        }
        return $this;
    }

    public function getMetaValue(string $key): ?string
    {
        foreach ($this->postMetas as $meta) {
            if ($meta->getMetaKey() === $key) {
                return $meta->getMetaValue();
            }
        }
        return null;
    }

    public function setMetaValue(string $key, ?string $value): static
    {
        $meta = null;
        foreach ($this->postMetas as $postMeta) {
            if ($postMeta->getMetaKey() === $key) {
                $meta = $postMeta;
                break;
            }
        }

        if ($value === null || $value === '') {
            if ($meta) {
                $this->removePostMeta($meta);
            }
            return $this;
        }

        if (!$meta) {
            $meta = new PostMeta();
            $meta->setMetaKey($key);
            $this->addPostMeta($meta);
        }

        $meta->setMetaValue($value);
        return $this;
    }

    public function __toString(): string
    {
        if ($this->translations->isEmpty()) {
            return 'Post #' . $this->id;
        }
        
        $firstTranslation = $this->translations->first();
        return $firstTranslation->getTitle() ?? 'Post #' . $this->id;
    }
}