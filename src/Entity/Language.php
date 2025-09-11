<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
#[ORM\Table(name: 'language')]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 10)]
    private ?string $code = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 100)]
    private ?string $name = null;

    #[ORM\Column]
    private bool $isDefault = false;

    #[ORM\Column]
    private bool $isActive = true;

    /**
     * @var Collection<int, PostTranslation>
     */
    #[ORM\OneToMany(targetEntity: PostTranslation::class, mappedBy: 'language', orphanRemoval: true)]
    private Collection $postTranslations;

    /**
     * @var Collection<int, PageTranslation>
     */
    #[ORM\OneToMany(targetEntity: PageTranslation::class, mappedBy: 'language', orphanRemoval: true)]
    private Collection $pageTranslations;

    /**
     * @var Collection<int, CategoryTranslation>
     */
    #[ORM\OneToMany(targetEntity: CategoryTranslation::class, mappedBy: 'language', orphanRemoval: true)]
    private Collection $categoryTranslations;

    /**
     * @var Collection<int, TagTranslation>
     */
    #[ORM\OneToMany(targetEntity: TagTranslation::class, mappedBy: 'language', orphanRemoval: true)]
    private Collection $tagTranslations;

    /**
     * @var Collection<int, MenuTranslation>
     */
    #[ORM\OneToMany(targetEntity: MenuTranslation::class, mappedBy: 'language', orphanRemoval: true)]
    private Collection $menuTranslations;

    public function __construct()
    {
        $this->postTranslations = new ArrayCollection();
        $this->pageTranslations = new ArrayCollection();
        $this->categoryTranslations = new ArrayCollection();
        $this->tagTranslations = new ArrayCollection();
        $this->menuTranslations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): static
    {
        $this->isDefault = $isDefault;
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

    /**
     * @return Collection<int, PostTranslation>
     */
    public function getPostTranslations(): Collection
    {
        return $this->postTranslations;
    }

    /**
     * @return Collection<int, PageTranslation>
     */
    public function getPageTranslations(): Collection
    {
        return $this->pageTranslations;
    }

    /**
     * @return Collection<int, CategoryTranslation>
     */
    public function getCategoryTranslations(): Collection
    {
        return $this->categoryTranslations;
    }

    /**
     * @return Collection<int, TagTranslation>
     */
    public function getTagTranslations(): Collection
    {
        return $this->tagTranslations;
    }

    /**
     * @return Collection<int, MenuTranslation>
     */
    public function getMenuTranslations(): Collection
    {
        return $this->menuTranslations;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}