<?php

namespace App\Entity;

use App\Repository\PostTranslationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: PostTranslationRepository::class)]
#[ORM\Table(name: 'post_translation')]
#[ORM\UniqueConstraint(name: 'post_language_unique', columns: ['post_id', 'language_id'])]
class PostTranslation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(
        max: 50000,
        maxMessage: 'Le contenu ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[Assert\Callback(callback: [self::class, 'validateHtmlContent'])]
    private ?string $content = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(
        max: 1000,
        maxMessage: 'L\'extrait ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[Assert\Callback(callback: [self::class, 'validateHtmlContent'])]
    private ?string $excerpt = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le titre SEO ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[Assert\Regex(
        pattern: '/^[^<>]*$/',
        message: 'Le titre SEO ne peut pas contenir de balises HTML.'
    )]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(
        max: 300,
        maxMessage: 'La description SEO ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[Assert\Regex(
        pattern: '/^[^<>]*$/',
        message: 'La description SEO ne peut pas contenir de balises HTML.'
    )]
    private ?string $metaDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(
        max: 500,
        maxMessage: 'Les mots-clés SEO ne peuvent pas dépasser {{ limit }} caractères.'
    )]
    #[Assert\Regex(
        pattern: '/^[^<>]*$/',
        message: 'Les mots-clés SEO ne peuvent pas contenir de balises HTML.'
    )]
    private ?string $metaKeywords = null;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: 'translations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Post $post = null;

    #[ORM\ManyToOne(targetEntity: Language::class, inversedBy: 'postTranslations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Language $language = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): static
    {
        $this->excerpt = $excerpt;
        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(?string $metaTitle): static
    {
        $this->metaTitle = $metaTitle;
        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): static
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(?string $metaKeywords): static
    {
        $this->metaKeywords = $metaKeywords;
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

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): static
    {
        $this->language = $language;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('%s (%s)', $this->title ?? '', $this->language?->getCode() ?? '');
    }

    /**
     * Valide que le contenu HTML est sécurisé
     */
    public static function validateHtmlContent($value, ExecutionContextInterface $context): void
    {
        if (empty($value)) {
            return;
        }

        // Balises dangereuses interdites
        $dangerousTags = [
            'script', 'iframe', 'object', 'embed', 'form', 'input',
            'button', 'select', 'textarea', 'meta', 'link', 'style',
            'base', 'head', 'html', 'body'
        ];

        foreach ($dangerousTags as $tag) {
            if (preg_match('/<\s*\/?\s*' . preg_quote($tag, '/') . '\b[^>]*>/i', $value)) {
                $context->buildViolation(sprintf('La balise <%s> n\'est pas autorisée dans le contenu.', $tag))
                    ->addViolation();
                return;
            }
        }

        // Vérification des attributs dangereux
        $dangerousAttributes = ['onclick', 'onload', 'onerror', 'onmouseover', 'onfocus', 'onblur', 'onchange', 'onsubmit'];
        foreach ($dangerousAttributes as $attr) {
            if (preg_match('/\s' . preg_quote($attr, '/') . '\s*=/i', $value)) {
                $context->buildViolation(sprintf('L\'attribut %s n\'est pas autorisé dans le contenu.', $attr))
                    ->addViolation();
                return;
            }
        }

        // Vérification des protocoles dangereux dans les liens
        if (preg_match('/(?:href|src)\s*=\s*["\']?(?:javascript|vbscript|data):/i', $value)) {
            $context->buildViolation('Les protocoles javascript:, vbscript: et data: ne sont pas autorisés dans les liens.')
                ->addViolation();
        }
    }
}