<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ORM\Table(name: 'menu')]
class Menu
{
    public const TYPE_PAGE = 'page';
    public const TYPE_POST = 'post';
    public const TYPE_CATEGORY = 'category';
    public const TYPE_TAG = 'tag';
    public const TYPE_CUSTOM = 'custom';
    public const TYPE_HOME = 'home';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Choice(choices: [self::TYPE_PAGE, self::TYPE_POST, self::TYPE_CATEGORY, self::TYPE_TAG, self::TYPE_CUSTOM, self::TYPE_HOME])]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $target = '_self';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cssClass = null;

    #[ORM\Column]
    private int $menuOrder = 0;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank]
    private ?string $location = 'primary';

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\ManyToOne(targetEntity: Post::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Post $post = null;

    #[ORM\ManyToOne(targetEntity: Page::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Page $page = null;

    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Category $category = null;

    #[ORM\ManyToOne(targetEntity: Tag::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Tag $tag = null;

    /**
     * @var Collection<int, MenuTranslation>
     */
    #[ORM\OneToMany(targetEntity: MenuTranslation::class, mappedBy: 'menu', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $translations;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;
        return $this;
    }

    public function getCssClass(): ?string
    {
        return $this->cssClass;
    }

    public function setCssClass(?string $cssClass): static
    {
        $this->cssClass = $cssClass;
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

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;
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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;
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

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): static
    {
        $this->post = $post;
        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): static
    {
        $this->page = $page;
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function getTag(): ?Tag
    {
        return $this->tag;
    }

    public function setTag(?Tag $tag): static
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return Collection<int, MenuTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(MenuTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setMenu($this);
        }
        return $this;
    }

    public function removeTranslation(MenuTranslation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            if ($translation->getMenu() === $this) {
                $translation->setMenu(null);
            }
        }
        return $this;
    }

    /**
     * Récupère la traduction pour une langue donnée
     */
    public function getTranslationForLanguage(Language $language): ?MenuTranslation
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
        return $translation?->getTitle() ?? $this->generateDefaultTitle($language);
    }

    /**
     * Génère un titre par défaut basé sur le type de menu et la langue
     */
    public function generateDefaultTitle(Language $language): string
    {
        return match($this->type) {
            self::TYPE_HOME => 'Accueil',
            self::TYPE_PAGE => $this->page?->getDisplayTitle($language) ?? 'Page',
            self::TYPE_POST => $this->post?->getDisplayTitle($language) ?? 'Article',
            self::TYPE_CATEGORY => $this->category?->getDisplayName($language) ?? 'Catégorie',
            self::TYPE_TAG => $this->tag?->getDisplayName($language) ?? 'Tag',
            default => 'Menu #' . $this->id
        };
    }

    public function getComputedUrl(): ?string
    {
        if ($this->url) {
            return $this->url;
        }

        return match($this->type) {
            self::TYPE_HOME => '/',
            self::TYPE_PAGE => $this->page ? '/page/' . $this->page->getSlug() : null,
            self::TYPE_POST => $this->post ? '/post/' . $this->post->getSlug() : null,
            self::TYPE_CATEGORY => $this->category ? '/category/' . $this->category->getSlug() : null,
            self::TYPE_TAG => $this->tag ? '/tag/' . $this->tag->getSlug() : null,
            default => null
        };
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
            return $this->generateDefaultTitle(new Language()); // Fallback sans langue
        }
        
        $firstTranslation = $this->translations->first();
        return $firstTranslation->getTitle() ?? 'Menu #' . $this->id;
    }
}