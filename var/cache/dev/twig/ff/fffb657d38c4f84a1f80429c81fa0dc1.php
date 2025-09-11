<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* frontend/posts/show.html.twig */
class __TwigTemplate_1c933535dc3cd831ed9c315756390786 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'meta_description' => [$this, 'block_meta_description'],
            'meta_keywords' => [$this, 'block_meta_keywords'],
            'content' => [$this, 'block_content'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "frontend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/posts/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/posts/show.html.twig"));

        $this->parent = $this->load("frontend/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - SymfPress";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 5, $this->source); })()), "metaDescription", [], "any", false, false, false, 5)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 5, $this->source); })()), "metaDescription", [], "any", false, false, false, 5), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 5, $this->source); })()), "excerpt", [], "any", false, false, false, 5), "html", null, true)));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_keywords(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_keywords"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_keywords"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 6, $this->source); })()), "metaKeywords", [], "any", false, false, false, 6), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 9
        yield "<div class=\"container my-5\">
    <div class=\"row\">
        <div class=\"col-lg-8\">
            <article class=\"mb-5\">
                <!-- Header de l'article -->
                <header class=\"mb-4\">
                    <h1 class=\"display-5 mb-3\">";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 15, $this->source); })()), "title", [], "any", false, false, false, 15), "html", null, true);
        yield "</h1>
                    
                    <div class=\"post-meta text-muted mb-3\">
                        <div class=\"d-flex flex-wrap align-items-center\">
                            <span class=\"me-3\">
                                <i class=\"fas fa-user me-1\"></i>
                                ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 21, $this->source); })()), "author", [], "any", false, false, false, 21), "displayName", [], "any", false, false, false, 21), "html", null, true);
        yield "
                            </span>
                            <span class=\"me-3\">
                                <i class=\"fas fa-calendar me-1\"></i>
                                ";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 25, $this->source); })()), "publishedAt", [], "any", false, false, false, 25), "d F Y"), "html", null, true);
        yield "
                            </span>
                            <span class=\"me-3\">
                                <i class=\"fas fa-eye me-1\"></i>
                                ";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 29, $this->source); })()), "viewCount", [], "any", false, false, false, 29), "html", null, true);
        yield " vue";
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 29, $this->source); })()), "viewCount", [], "any", false, false, false, 29) > 1)) ? ("s") : (""));
        yield "
                            </span>
                            ";
        // line 31
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 31, $this->source); })()), "comments", [], "any", false, false, false, 31)) > 0)) {
            // line 32
            yield "                                <span>
                                    <i class=\"fas fa-comments me-1\"></i>
                                    ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 34, $this->source); })()), "comments", [], "any", false, false, false, 34)), "html", null, true);
            yield " commentaire";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 34, $this->source); })()), "comments", [], "any", false, false, false, 34)) > 1)) ? ("s") : (""));
            yield "
                                </span>
                            ";
        }
        // line 37
        yield "                        </div>
                    </div>
                    
                    <!-- Catégories et tags -->
                    ";
        // line 41
        if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 41, $this->source); })()), "categories", [], "any", false, false, false, 41)) ||  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 41, $this->source); })()), "tags", [], "any", false, false, false, 41)))) {
            // line 42
            yield "                        <div class=\"mb-3\">
                            ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 43, $this->source); })()), "categories", [], "any", false, false, false, 43));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 44
                yield "                                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_category_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "slug", [], "any", false, false, false, 44)]), "html", null, true);
                yield "\" class=\"badge bg-primary text-decoration-none me-1\">
                                    ";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getDisplayName", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 45, $this->source); })())], "method", false, false, false, 45), "html", null, true);
                yield "
                                </a>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 48, $this->source); })()), "tags", [], "any", false, false, false, 48));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 49
                yield "                                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_tag_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "slug", [], "any", false, false, false, 49)]), "html", null, true);
                yield "\" class=\"badge bg-secondary text-decoration-none me-1\">
                                    #";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getDisplayName", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 50, $this->source); })())], "method", false, false, false, 50), "html", null, true);
                yield "
                                </a>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            yield "                        </div>
                    ";
        }
        // line 55
        yield "                </header>
                
                <!-- Image à la une -->
                ";
        // line 58
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 58, $this->source); })()), "featuredImage", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "                    <div class=\"mb-4\">
                        <img src=\"";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 60, $this->source); })()), "featuredImage", [], "any", false, false, false, 60), "url", [], "any", false, false, false, 60), "html", null, true);
            yield "\" class=\"img-fluid rounded\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 60, $this->source); })()), "title", [], "any", false, false, false, 60), "html", null, true);
            yield "\">
                        ";
            // line 61
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 61, $this->source); })()), "featuredImage", [], "any", false, false, false, 61), "caption", [], "any", false, false, false, 61)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 62
                yield "                            <figcaption class=\"figure-caption text-center mt-2\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 62, $this->source); })()), "featuredImage", [], "any", false, false, false, 62), "caption", [], "any", false, false, false, 62), "html", null, true);
                yield "</figcaption>
                        ";
            }
            // line 64
            yield "                    </div>
                ";
        }
        // line 66
        yield "                
                <!-- Extrait -->
                ";
        // line 68
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 68, $this->source); })()), "excerpt", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 69
            yield "                    <div class=\"lead mb-4 p-3 bg-light rounded\">
                        ";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 70, $this->source); })()), "excerpt", [], "any", false, false, false, 70), "html", null, true);
            yield "
                    </div>
                ";
        }
        // line 73
        yield "                
                <!-- Contenu principal -->
                <div class=\"post-content\">
                    ";
        // line 76
        yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 76, $this->source); })()), "content", [], "any", false, false, false, 76);
        yield "
                </div>
                
                <!-- Partage social -->
                <div class=\"d-flex justify-content-between align-items-center mt-5 pt-4 border-top\">
                    <div>
                        <strong>Partager cet article :</strong>
                    </div>
                    <div>
                        <a href=\"https://twitter.com/intent/tweet?text=";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 85, $this->source); })()), "title", [], "any", false, false, false, 85)), "html", null, true);
        yield "&url=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 85, $this->source); })()), "slug", [], "any", false, false, false, 85)])), "html", null, true);
        yield "\" 
                           target=\"_blank\" class=\"btn btn-outline-info btn-sm me-2\">
                            <i class=\"fab fa-twitter\"></i> Twitter
                        </a>
                        <a href=\"https://www.facebook.com/sharer/sharer.php?u=";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 89, $this->source); })()), "slug", [], "any", false, false, false, 89)])), "html", null, true);
        yield "\" 
                           target=\"_blank\" class=\"btn btn-outline-primary btn-sm me-2\">
                            <i class=\"fab fa-facebook-f\"></i> Facebook
                        </a>
                        <a href=\"https://www.linkedin.com/sharing/share-offsite/?url=";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 93, $this->source); })()), "slug", [], "any", false, false, false, 93)])), "html", null, true);
        yield "\" 
                           target=\"_blank\" class=\"btn btn-outline-success btn-sm\">
                            <i class=\"fab fa-linkedin-in\"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </article>
            
            <!-- Commentaires -->
            ";
        // line 102
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 102, $this->source); })()), "commentStatus", [], "any", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 103
            yield "                <section class=\"comments-section\">
                    <h4 class=\"mb-4\">
                        <i class=\"fas fa-comments me-2\"></i>
                        Commentaires (";
            // line 106
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 106, $this->source); })())), "html", null, true);
            yield ")
                    </h4>
                    
                    <!-- Liste des commentaires -->
                    ";
            // line 110
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 110, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 111
                yield "                        <div class=\"comments-list mb-5\">
                            ";
                // line 112
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 112, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                    // line 113
                    yield "                                <div class=\"comment mb-4 p-3 border rounded\">
                                    <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3\" 
                                                 style=\"width: 40px; height: 40px;\">
                                                <i class=\"fas fa-user text-white\"></i>
                                            </div>
                                            <div>
                                                <strong>";
                    // line 121
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", false, false, false, 121), "html", null, true);
                    yield "</strong>
                                                ";
                    // line 122
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorWebsite", [], "any", false, false, false, 122)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 123
                        yield "                                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorWebsite", [], "any", false, false, false, 123), "html", null, true);
                        yield "\" target=\"_blank\" class=\"text-muted ms-2\">
                                                        <i class=\"fas fa-external-link-alt\"></i>
                                                    </a>
                                                ";
                    }
                    // line 127
                    yield "                                            </div>
                                        </div>
                                        <small class=\"text-muted\">";
                    // line 129
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "createdAt", [], "any", false, false, false, 129), "d/m/Y à H:i"), "html", null, true);
                    yield "</small>
                                    </div>
                                    <div class=\"comment-content ms-5\">
                                        ";
                    // line 132
                    yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 132), "html", null, true));
                    yield "
                                    </div>
                                </div>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 136
                yield "                        </div>
                    ";
            }
            // line 138
            yield "                    
                    <!-- Formulaire de commentaire -->
                    <div class=\"comment-form\">
                        <h5 class=\"mb-3\">Laisser un commentaire</h5>
                        <form method=\"POST\" action=\"#\">
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <label for=\"author_name\" class=\"form-label\">Nom *</label>
                                    <input type=\"text\" class=\"form-control\" id=\"author_name\" name=\"author_name\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"author_email\" class=\"form-label\">Email *</label>
                                    <input type=\"email\" class=\"form-control\" id=\"author_email\" name=\"author_email\" required>
                                </div>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"author_website\" class=\"form-label\">Site web</label>
                                <input type=\"url\" class=\"form-control\" id=\"author_website\" name=\"author_website\">
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"content\" class=\"form-label\">Commentaire *</label>
                                <textarea class=\"form-control\" id=\"content\" name=\"content\" rows=\"5\" required></textarea>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-paper-plane me-2\"></i>
                                Publier le commentaire
                            </button>
                        </form>
                    </div>
                </section>
            ";
        }
        // line 169
        yield "        </div>
        
        <!-- Sidebar -->
        <div class=\"col-lg-4\">
            <!-- Articles liés -->
            ";
        // line 174
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["relatedPosts"]) || array_key_exists("relatedPosts", $context) ? $context["relatedPosts"] : (function () { throw new RuntimeError('Variable "relatedPosts" does not exist.', 174, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 175
            yield "                <div class=\"card mb-4\">
                    <div class=\"card-header\">
                        <h5 class=\"mb-0\">
                            <i class=\"fas fa-link me-2\"></i>
                            Articles liés
                        </h5>
                    </div>
                    <div class=\"card-body\">
                        ";
            // line 183
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["relatedPosts"]) || array_key_exists("relatedPosts", $context) ? $context["relatedPosts"] : (function () { throw new RuntimeError('Variable "relatedPosts" does not exist.', 183, $this->source); })()));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["relatedPost"]) {
                // line 184
                yield "                            ";
                $context["relatedTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 184, $this->source); })())], "method", false, false, false, 184);
                // line 185
                yield "                            <div class=\"d-flex mb-3 ";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 185)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "pb-3 border-bottom";
                }
                yield "\">
                                ";
                // line 186
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "featuredImage", [], "any", false, false, false, 186)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 187
                    yield "                                    <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "featuredImage", [], "any", false, false, false, 187), "url", [], "any", false, false, false, 187), "html", null, true);
                    yield "\" class=\"rounded me-3\" 
                                         style=\"width: 60px; height: 60px; object-fit: cover;\" alt=\"";
                    // line 188
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["relatedTranslation"]) || array_key_exists("relatedTranslation", $context) ? $context["relatedTranslation"] : (function () { throw new RuntimeError('Variable "relatedTranslation" does not exist.', 188, $this->source); })()), "title", [], "any", false, false, false, 188), "html", null, true);
                    yield "\">
                                ";
                }
                // line 190
                yield "                                <div class=\"flex-grow-1\">
                                    <h6 class=\"mb-1\">
                                        <a href=\"";
                // line 192
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "slug", [], "any", false, false, false, 192)]), "html", null, true);
                yield "\" class=\"text-decoration-none\">
                                            ";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["relatedTranslation"]) || array_key_exists("relatedTranslation", $context) ? $context["relatedTranslation"] : (function () { throw new RuntimeError('Variable "relatedTranslation" does not exist.', 193, $this->source); })()), "title", [], "any", false, false, false, 193), "html", null, true);
                yield "
                                        </a>
                                    </h6>
                                    <small class=\"text-muted\">";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "publishedAt", [], "any", false, false, false, 196), "d/m/Y"), "html", null, true);
                yield "</small>
                                </div>
                            </div>
                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['relatedPost'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            yield "                    </div>
                </div>
            ";
        }
        // line 203
        yield "            
            <!-- Informations sur l'auteur -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">
                        <i class=\"fas fa-user me-2\"></i>
                        À propos de l'auteur
                    </h5>
                </div>
                <div class=\"card-body text-center\">
                    ";
        // line 213
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 213, $this->source); })()), "author", [], "any", false, false, false, 213), "avatar", [], "any", false, false, false, 213)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 214
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 214, $this->source); })()), "author", [], "any", false, false, false, 214), "avatar", [], "any", false, false, false, 214), "html", null, true);
            yield "\" class=\"rounded-circle mb-3\" width=\"80\" height=\"80\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 214, $this->source); })()), "author", [], "any", false, false, false, 214), "displayName", [], "any", false, false, false, 214), "html", null, true);
            yield "\">
                    ";
        } else {
            // line 216
            yield "                        <div class=\"bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3\" 
                             style=\"width: 80px; height: 80px;\">
                            <i class=\"fas fa-user fa-2x text-white\"></i>
                        </div>
                    ";
        }
        // line 221
        yield "                    <h6>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 221, $this->source); })()), "author", [], "any", false, false, false, 221), "displayName", [], "any", false, false, false, 221), "html", null, true);
        yield "</h6>
                    ";
        // line 222
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 222, $this->source); })()), "author", [], "any", false, false, false, 222), "bio", [], "any", false, false, false, 222)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 223
            yield "                        <p class=\"text-muted small\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 223, $this->source); })()), "author", [], "any", false, false, false, 223), "bio", [], "any", false, false, false, 223), "html", null, true);
            yield "</p>
                    ";
        }
        // line 225
        yield "                    ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 225, $this->source); })()), "author", [], "any", false, false, false, 225), "website", [], "any", false, false, false, 225)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 226
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 226, $this->source); })()), "author", [], "any", false, false, false, 226), "website", [], "any", false, false, false, 226), "html", null, true);
            yield "\" target=\"_blank\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-globe me-1\"></i>
                            Site web
                        </a>
                    ";
        }
        // line 231
        yield "                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 238
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 239
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .post-content h2, .post-content h3, .post-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .post-content p {
            margin-bottom: 1.5rem;
        }
        .post-content blockquote {
            border-left: 4px solid #007bff;
            padding-left: 1rem;
            font-style: italic;
            background-color: #f8f9fa;
            padding: 1rem;
            margin: 1.5rem 0;
        }
        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.375rem;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "frontend/posts/show.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  624 => 239,  611 => 238,  595 => 231,  586 => 226,  583 => 225,  577 => 223,  575 => 222,  570 => 221,  563 => 216,  555 => 214,  553 => 213,  541 => 203,  536 => 200,  518 => 196,  512 => 193,  508 => 192,  504 => 190,  499 => 188,  494 => 187,  492 => 186,  485 => 185,  482 => 184,  465 => 183,  455 => 175,  453 => 174,  446 => 169,  413 => 138,  409 => 136,  399 => 132,  393 => 129,  389 => 127,  381 => 123,  379 => 122,  375 => 121,  365 => 113,  361 => 112,  358 => 111,  356 => 110,  349 => 106,  344 => 103,  342 => 102,  330 => 93,  323 => 89,  314 => 85,  302 => 76,  297 => 73,  291 => 70,  288 => 69,  286 => 68,  282 => 66,  278 => 64,  272 => 62,  270 => 61,  264 => 60,  261 => 59,  259 => 58,  254 => 55,  250 => 53,  241 => 50,  236 => 49,  231 => 48,  222 => 45,  217 => 44,  213 => 43,  210 => 42,  208 => 41,  202 => 37,  194 => 34,  190 => 32,  188 => 31,  181 => 29,  174 => 25,  167 => 21,  158 => 15,  150 => 9,  137 => 8,  114 => 6,  91 => 5,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'frontend/base.html.twig' %}

{% block title %}{{ translation.title }} - SymfPress{% endblock %}

{% block meta_description %}{{ translation.metaDescription ?: translation.excerpt }}{% endblock %}
{% block meta_keywords %}{{ translation.metaKeywords }}{% endblock %}

{% block content %}
<div class=\"container my-5\">
    <div class=\"row\">
        <div class=\"col-lg-8\">
            <article class=\"mb-5\">
                <!-- Header de l'article -->
                <header class=\"mb-4\">
                    <h1 class=\"display-5 mb-3\">{{ translation.title }}</h1>
                    
                    <div class=\"post-meta text-muted mb-3\">
                        <div class=\"d-flex flex-wrap align-items-center\">
                            <span class=\"me-3\">
                                <i class=\"fas fa-user me-1\"></i>
                                {{ post.author.displayName }}
                            </span>
                            <span class=\"me-3\">
                                <i class=\"fas fa-calendar me-1\"></i>
                                {{ post.publishedAt|date('d F Y') }}
                            </span>
                            <span class=\"me-3\">
                                <i class=\"fas fa-eye me-1\"></i>
                                {{ post.viewCount }} vue{{ post.viewCount > 1 ? 's' : '' }}
                            </span>
                            {% if post.comments|length > 0 %}
                                <span>
                                    <i class=\"fas fa-comments me-1\"></i>
                                    {{ post.comments|length }} commentaire{{ post.comments|length > 1 ? 's' : '' }}
                                </span>
                            {% endif %}
                        </div>
                    </div>
                    
                    <!-- Catégories et tags -->
                    {% if post.categories is not empty or post.tags is not empty %}
                        <div class=\"mb-3\">
                            {% for category in post.categories %}
                                <a href=\"{{ path('frontend_category_show', {'slug': category.slug}) }}\" class=\"badge bg-primary text-decoration-none me-1\">
                                    {{ category.getDisplayName(currentLanguage) }}
                                </a>
                            {% endfor %}
                            {% for tag in post.tags %}
                                <a href=\"{{ path('frontend_tag_show', {'slug': tag.slug}) }}\" class=\"badge bg-secondary text-decoration-none me-1\">
                                    #{{ tag.getDisplayName(currentLanguage) }}
                                </a>
                            {% endfor %}
                        </div>
                    {% endif %}
                </header>
                
                <!-- Image à la une -->
                {% if post.featuredImage %}
                    <div class=\"mb-4\">
                        <img src=\"{{ post.featuredImage.url }}\" class=\"img-fluid rounded\" alt=\"{{ translation.title }}\">
                        {% if post.featuredImage.caption %}
                            <figcaption class=\"figure-caption text-center mt-2\">{{ post.featuredImage.caption }}</figcaption>
                        {% endif %}
                    </div>
                {% endif %}
                
                <!-- Extrait -->
                {% if translation.excerpt %}
                    <div class=\"lead mb-4 p-3 bg-light rounded\">
                        {{ translation.excerpt }}
                    </div>
                {% endif %}
                
                <!-- Contenu principal -->
                <div class=\"post-content\">
                    {{ translation.content|raw }}
                </div>
                
                <!-- Partage social -->
                <div class=\"d-flex justify-content-between align-items-center mt-5 pt-4 border-top\">
                    <div>
                        <strong>Partager cet article :</strong>
                    </div>
                    <div>
                        <a href=\"https://twitter.com/intent/tweet?text={{ translation.title|url_encode }}&url={{ url('frontend_post_show', {'slug': post.slug})|url_encode }}\" 
                           target=\"_blank\" class=\"btn btn-outline-info btn-sm me-2\">
                            <i class=\"fab fa-twitter\"></i> Twitter
                        </a>
                        <a href=\"https://www.facebook.com/sharer/sharer.php?u={{ url('frontend_post_show', {'slug': post.slug})|url_encode }}\" 
                           target=\"_blank\" class=\"btn btn-outline-primary btn-sm me-2\">
                            <i class=\"fab fa-facebook-f\"></i> Facebook
                        </a>
                        <a href=\"https://www.linkedin.com/sharing/share-offsite/?url={{ url('frontend_post_show', {'slug': post.slug})|url_encode }}\" 
                           target=\"_blank\" class=\"btn btn-outline-success btn-sm\">
                            <i class=\"fab fa-linkedin-in\"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </article>
            
            <!-- Commentaires -->
            {% if post.commentStatus %}
                <section class=\"comments-section\">
                    <h4 class=\"mb-4\">
                        <i class=\"fas fa-comments me-2\"></i>
                        Commentaires ({{ comments|length }})
                    </h4>
                    
                    <!-- Liste des commentaires -->
                    {% if comments is not empty %}
                        <div class=\"comments-list mb-5\">
                            {% for comment in comments %}
                                <div class=\"comment mb-4 p-3 border rounded\">
                                    <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3\" 
                                                 style=\"width: 40px; height: 40px;\">
                                                <i class=\"fas fa-user text-white\"></i>
                                            </div>
                                            <div>
                                                <strong>{{ comment.authorName }}</strong>
                                                {% if comment.authorWebsite %}
                                                    <a href=\"{{ comment.authorWebsite }}\" target=\"_blank\" class=\"text-muted ms-2\">
                                                        <i class=\"fas fa-external-link-alt\"></i>
                                                    </a>
                                                {% endif %}
                                            </div>
                                        </div>
                                        <small class=\"text-muted\">{{ comment.createdAt|date('d/m/Y à H:i') }}</small>
                                    </div>
                                    <div class=\"comment-content ms-5\">
                                        {{ comment.content|nl2br }}
                                    </div>
                                </div>
                            {% endfor %}
                        </div>
                    {% endif %}
                    
                    <!-- Formulaire de commentaire -->
                    <div class=\"comment-form\">
                        <h5 class=\"mb-3\">Laisser un commentaire</h5>
                        <form method=\"POST\" action=\"#\">
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <label for=\"author_name\" class=\"form-label\">Nom *</label>
                                    <input type=\"text\" class=\"form-control\" id=\"author_name\" name=\"author_name\" required>
                                </div>
                                <div class=\"col-md-6\">
                                    <label for=\"author_email\" class=\"form-label\">Email *</label>
                                    <input type=\"email\" class=\"form-control\" id=\"author_email\" name=\"author_email\" required>
                                </div>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"author_website\" class=\"form-label\">Site web</label>
                                <input type=\"url\" class=\"form-control\" id=\"author_website\" name=\"author_website\">
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"content\" class=\"form-label\">Commentaire *</label>
                                <textarea class=\"form-control\" id=\"content\" name=\"content\" rows=\"5\" required></textarea>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-paper-plane me-2\"></i>
                                Publier le commentaire
                            </button>
                        </form>
                    </div>
                </section>
            {% endif %}
        </div>
        
        <!-- Sidebar -->
        <div class=\"col-lg-4\">
            <!-- Articles liés -->
            {% if relatedPosts is not empty %}
                <div class=\"card mb-4\">
                    <div class=\"card-header\">
                        <h5 class=\"mb-0\">
                            <i class=\"fas fa-link me-2\"></i>
                            Articles liés
                        </h5>
                    </div>
                    <div class=\"card-body\">
                        {% for relatedPost in relatedPosts %}
                            {% set relatedTranslation = relatedPost.getTranslationForLanguage(currentLanguage) %}
                            <div class=\"d-flex mb-3 {% if not loop.last %}pb-3 border-bottom{% endif %}\">
                                {% if relatedPost.featuredImage %}
                                    <img src=\"{{ relatedPost.featuredImage.url }}\" class=\"rounded me-3\" 
                                         style=\"width: 60px; height: 60px; object-fit: cover;\" alt=\"{{ relatedTranslation.title }}\">
                                {% endif %}
                                <div class=\"flex-grow-1\">
                                    <h6 class=\"mb-1\">
                                        <a href=\"{{ path('frontend_post_show', {'slug': relatedPost.slug}) }}\" class=\"text-decoration-none\">
                                            {{ relatedTranslation.title }}
                                        </a>
                                    </h6>
                                    <small class=\"text-muted\">{{ relatedPost.publishedAt|date('d/m/Y') }}</small>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            {% endif %}
            
            <!-- Informations sur l'auteur -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">
                        <i class=\"fas fa-user me-2\"></i>
                        À propos de l'auteur
                    </h5>
                </div>
                <div class=\"card-body text-center\">
                    {% if post.author.avatar %}
                        <img src=\"{{ post.author.avatar }}\" class=\"rounded-circle mb-3\" width=\"80\" height=\"80\" alt=\"{{ post.author.displayName }}\">
                    {% else %}
                        <div class=\"bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3\" 
                             style=\"width: 80px; height: 80px;\">
                            <i class=\"fas fa-user fa-2x text-white\"></i>
                        </div>
                    {% endif %}
                    <h6>{{ post.author.displayName }}</h6>
                    {% if post.author.bio %}
                        <p class=\"text-muted small\">{{ post.author.bio }}</p>
                    {% endif %}
                    {% if post.author.website %}
                        <a href=\"{{ post.author.website }}\" target=\"_blank\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-globe me-1\"></i>
                            Site web
                        </a>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .post-content h2, .post-content h3, .post-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .post-content p {
            margin-bottom: 1.5rem;
        }
        .post-content blockquote {
            border-left: 4px solid #007bff;
            padding-left: 1rem;
            font-style: italic;
            background-color: #f8f9fa;
            padding: 1rem;
            margin: 1.5rem 0;
        }
        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.375rem;
        }
    </style>
{% endblock %}", "frontend/posts/show.html.twig", "/workspace/symfpress/templates/frontend/posts/show.html.twig");
    }
}
