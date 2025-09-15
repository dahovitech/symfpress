<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entité pour stocker les paramètres de configuration de l'application
 */
#[ORM\Entity(repositoryClass: \App\Repository\SettingRepository::class)]
#[ORM\Table(name: 'settings')]
#[ORM\Index(name: 'idx_setting_key', columns: ['setting_key'])]
#[ORM\Index(name: 'idx_setting_category', columns: ['category'])]
class Setting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    #[Assert\NotBlank(message: 'La clé de paramètre ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 100,
        minMessage: 'La clé doit faire au moins {{ limit }} caractère',
        maxMessage: 'La clé ne peut pas dépasser {{ limit }} caractères'
    )]
    private string $settingKey;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $settingValue = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Assert\Length(
        max: 50,
        maxMessage: 'La catégorie ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $category = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 20, options: ['default' => 'string'])]
    #[Assert\Choice(
        choices: ['string', 'integer', 'boolean', 'array', 'json'],
        message: 'Type invalide. Types autorisés : string, integer, boolean, array, json'
    )]
    private string $valueType = 'string';

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isPublic = false;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSettingKey(): string
    {
        return $this->settingKey;
    }

    public function setSettingKey(string $settingKey): self
    {
        $this->settingKey = $settingKey;
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function getSettingValue(): ?string
    {
        return $this->settingValue;
    }

    public function setSettingValue(?string $settingValue): self
    {
        $this->settingValue = $settingValue;
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function getValueType(): string
    {
        return $this->valueType;
    }

    public function setValueType(string $valueType): self
    {
        $this->valueType = $valueType;
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): self
    {
        $this->isPublic = $isPublic;
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Retourne la valeur typée selon le type défini
     */
    public function getTypedValue(): mixed
    {
        if ($this->settingValue === null) {
            return null;
        }

        return match ($this->valueType) {
            'integer' => (int) $this->settingValue,
            'boolean' => filter_var($this->settingValue, FILTER_VALIDATE_BOOLEAN),
            'array' => explode(',', $this->settingValue),
            'json' => json_decode($this->settingValue, true),
            default => $this->settingValue
        };
    }

    /**
     * Définit une valeur typée qui sera sérialisée pour le stockage
     */
    public function setTypedValue(mixed $value): self
    {
        if ($value === null) {
            $this->settingValue = null;
            return $this;
        }

        $this->settingValue = match ($this->valueType) {
            'integer' => (string) $value,
            'boolean' => $value ? '1' : '0',
            'array' => is_array($value) ? implode(',', $value) : (string) $value,
            'json' => is_string($value) ? $value : json_encode($value),
            default => (string) $value
        };

        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }
}
