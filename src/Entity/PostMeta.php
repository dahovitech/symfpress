<?php

namespace App\Entity;

use App\Repository\PostMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PostMetaRepository::class)]
#[ORM\Table(name: 'post_meta')]
#[ORM\UniqueConstraint(name: 'post_meta_unique', columns: ['post_id', 'meta_key'])]
class PostMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    private ?string $metaKey = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaValue = null;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: 'postMetas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Post $post = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetaKey(): ?string
    {
        return $this->metaKey;
    }

    public function setMetaKey(string $metaKey): static
    {
        $this->metaKey = $metaKey;
        return $this;
    }

    public function getMetaValue(): ?string
    {
        return $this->metaValue;
    }

    public function setMetaValue(?string $metaValue): static
    {
        $this->metaValue = $metaValue;
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

    public function __toString(): string
    {
        return sprintf('%s: %s', $this->metaKey ?? '', substr($this->metaValue ?? '', 0, 50));
    }
}