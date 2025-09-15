<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: "App\Repository\WidgetRepository")]
#[ORM\Table(name: "widgets")]
class Widget
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 100)]
    #[Assert\NotBlank(message: "Le nom du widget est obligatoire.")]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: "Le nom doit faire au moins {{ limit }} caractères.",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z0-9À-ÿŒœ\s\-\']{2,100}$/u",
        message: "Le nom contient des caractères non autorisés."
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::STRING, length: 50)]
    #[Assert\NotBlank(message: "Le type de widget est obligatoire.")]
    #[Assert\Choice(
        choices: ['text', 'menu', 'recent_posts', 'categories', 'search', 'custom_html'],
        message: "Type de widget non supporté: {{ value }}"
    )]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(type: Types::JSON)]
    private array $settings = [];

    #[ORM\Column(type: Types::INTEGER, options: ["default" => 0])]
    #[Assert\Range(
        min: 0,
        max: 999,
        notInRangeMessage: "L'ordre doit être entre {{ min }} et {{ max }}."
    )]
    private int $sortOrder = 0;

    #[ORM\Column(type: Types::BOOLEAN, options: ["default" => true])]
    private bool $isActive = true;

    #[ORM\Column(type: Types::STRING, length: 50, nullable: true)]
    #[Assert\Length(max: 50, maxMessage: "Le thème ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $theme = null;

    #[ORM\ManyToOne(targetEntity: WidgetZone::class, inversedBy: "widgets")]
    #[ORM\JoinColumn(nullable: false)]
    private ?WidgetZone $zone = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;
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

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;
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

    public function getZone(): ?WidgetZone
    {
        return $this->zone;
    }

    public function setZone(?WidgetZone $zone): static
    {
        $this->zone = $zone;
        $this->updatedAt = new \DateTime();

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
     * Vérifie si le widget est compatible avec un thème donné
     */
    public function isCompatibleWithTheme(?string $theme): bool
    {
        return $this->theme === null || $this->theme === $theme;
    }

    /**
     * Obtient le nom affiché du widget
     */
    public function getDisplayName(): string
    {
        return $this->name ?: ucfirst($this->type ?? 'Widget');
    }
}
