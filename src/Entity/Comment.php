<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ORM\Table(name: 'comment')]
class Comment
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_SPAM = 'spam';
    public const STATUS_TRASH = 'trash';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 10, max: 2000)]
    private ?string $content = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: [self::STATUS_PENDING, self::STATUS_APPROVED, self::STATUS_SPAM, self::STATUS_TRASH])]
    private string $status = self::STATUS_PENDING;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $authorName = null;

    #[ORM\Column(length: 180, nullable: true)]
    #[Assert\Email]
    private ?string $authorEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Url]
    private ?string $authorWebsite = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $authorIp = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $userAgent = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?User $author = null;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Post $post = null;

    #[ORM\ManyToOne(targetEntity: Page::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Page $page = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'replies')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent', orphanRemoval: true)]
    private Collection $replies;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;
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

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isSpam(): bool
    {
        return $this->status === self::STATUS_SPAM;
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

    public function getAuthorName(): ?string
    {
        return $this->authorName ?: $this->author?->getDisplayName();
    }

    public function setAuthorName(?string $authorName): static
    {
        $this->authorName = $authorName;
        return $this;
    }

    public function getAuthorEmail(): ?string
    {
        return $this->authorEmail ?: $this->author?->getEmail();
    }

    public function setAuthorEmail(?string $authorEmail): static
    {
        $this->authorEmail = $authorEmail;
        return $this;
    }

    public function getAuthorWebsite(): ?string
    {
        return $this->authorWebsite ?: $this->author?->getWebsite();
    }

    public function setAuthorWebsite(?string $authorWebsite): static
    {
        $this->authorWebsite = $authorWebsite;
        return $this;
    }

    public function getAuthorIp(): ?string
    {
        return $this->authorIp;
    }

    public function setAuthorIp(?string $authorIp): static
    {
        $this->authorIp = $authorIp;
        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): static
    {
        $this->userAgent = $userAgent;
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
    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(self $reply): static
    {
        if (!$this->replies->contains($reply)) {
            $this->replies->add($reply);
            $reply->setParent($this);
        }
        return $this;
    }

    public function removeReply(self $reply): static
    {
        if ($this->replies->removeElement($reply)) {
            if ($reply->getParent() === $this) {
                $reply->setParent(null);
            }
        }
        return $this;
    }

    public function getApprovedReplies(): array
    {
        return $this->replies->filter(fn(self $reply) => $reply->isApproved())->toArray();
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

    public function isReply(): bool
    {
        return $this->parent !== null;
    }

    public function getContentType(): string
    {
        if ($this->post) {
            return 'post';
        }
        if ($this->page) {
            return 'page';
        }
        return 'unknown';
    }

    public function getContentTitle(): ?string
    {
        if ($this->post && !$this->post->getTranslations()->isEmpty()) {
            return $this->post->getTranslations()->first()->getTitle();
        }
        if ($this->page && !$this->page->getTranslations()->isEmpty()) {
            return $this->page->getTranslations()->first()->getTitle();
        }
        return null;
    }

    public function __toString(): string
    {
        return sprintf('Comment by %s on %s', 
            $this->getAuthorName() ?? 'Anonymous', 
            $this->createdAt?->format('Y-m-d H:i') ?? ''
        );
    }
}