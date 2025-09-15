<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: "App\Repository\WidgetZoneRepository")]
#[ORM\Table(name: "widget_zones")]
class WidgetZone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 100, unique: true)]
    #[Assert\NotBlank(message: "Le nom de la zone est obligatoire.")]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: "Le nom doit faire au moins {{ limit }} caractères.",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    #[Assert\Regex(
        pattern: "/^[a-z][a-z0-9_-]*$/",
        message: "Le nom doit commencer par une lettre et ne contenir que des lettres minuscules, chiffres, tirets et underscores."
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::STRING, length: 150)]
    #[Assert\NotBlank(message: "Le titre de la zone est obligatoire.")]
    #[Assert\Length(
        min: 2,
        max: 150,
        minMessage: "Le titre doit faire au moins {{ limit }} caractères.",
        maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(
        max: 500,
        maxMessage: "La description ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $description = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ["default" => true])]
    private bool $isActive = true;

    #[ORM\Column(type: Types::STRING, length: 50, nullable: true)]
    #[Assert\Length(max: 50, maxMessage: "Le thème ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $theme = null;

    #[ORM\Column(type: Types::JSON)]
    private array $settings = [];

    #[ORM\OneToMany(targetEntity: Widget::class, mappedBy: "zone", orphanRemoval: true, cascade: ["persist"])]
    #[ORM\OrderBy(["sortOrder" => "ASC"])]
    private Collection $widgets;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->widgets = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): static
    {
        $this->theme = $theme;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setSettings(array $settings): static
    {
        $this->settings = $settings;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getSetting(string $key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }

    public function setSetting(string $key, $value): static
    {
        $this->settings[$key] = $value;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * @return Collection<int, Widget>
     */
    public function getWidgets(): Collection
    {
        return $this->widgets;
    }

    /**
     * @return Collection<int, Widget>
     */
    public function getActiveWidgets(): Collection
    {
        return $this->widgets->filter(fn(Widget $widget) => $widget->isActive());
    }

    /**
     * Obtient les widgets compatibles avec un thème donné
     * @return Collection<int, Widget>
     */
    public function getWidgetsForTheme(?string $theme): Collection
    {
        return $this->getActiveWidgets()->filter(
            fn(Widget $widget) => $widget->isCompatibleWithTheme($theme)
        );
    }

    public function addWidget(Widget $widget): static
    {
        if (!$this->widgets->contains($widget)) {
            $this->widgets->add($widget);
            $widget->setZone($this);
        }

        return $this;
    }

    public function removeWidget(Widget $widget): static
    {
        if ($this->widgets->removeElement($widget)) {
            // set the owning side to null (unless already changed)
            if ($widget->getZone() === $this) {
                $widget->setZone(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Vérifie si la zone est compatible avec un thème donné
     */
    public function isCompatibleWithTheme(?string $theme): bool
    {
        return $this->theme === null || $this->theme === $theme;
    }

    /**
     * Compte le nombre de widgets actifs dans cette zone
     */
    public function getActiveWidgetCount(): int
    {
        return $this->getActiveWidgets()->count();
    }

    /**
     * Obtient le prochain ordre de tri pour un nouveau widget
     */
    public function getNextSortOrder(): int
    {
        $maxOrder = 0;
        foreach ($this->widgets as $widget) {
            if ($widget->getSortOrder() > $maxOrder) {
                $maxOrder = $widget->getSortOrder();
            }
        }
        return $maxOrder + 1;
    }
}
