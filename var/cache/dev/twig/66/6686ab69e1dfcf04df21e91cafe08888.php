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

/* frontend/pages/show.html.twig */
class __TwigTemplate_35ab9953d58c57f72582165aedf08ac1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/pages/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/pages/show.html.twig"));

        // line 3
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 3, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 3, $this->source); })())], "method", false, false, false, 3);
        // line 1
        $this->parent = $this->load("frontend/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 5, $this->source); })()), "title", [], "any", false, false, false, 5), "html", null, true);
        yield " - SymfPress";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
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

        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 7, $this->source); })()), "metaDescription", [], "any", false, false, false, 7)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 7, $this->source); })()), "metaDescription", [], "any", false, false, false, 7), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 7, $this->source); })()), "excerpt", [], "any", false, false, false, 7), "html", null, true)));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 8, $this->source); })()), "metaKeywords", [], "any", false, false, false, 8), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "<div class=\"container my-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-8\">
            <article class=\"page-content\">
                <!-- Header de la page -->
                <header class=\"mb-4\">
                    <h1 class=\"display-5 mb-3\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 17, $this->source); })()), "title", [], "any", false, false, false, 17), "html", null, true);
        yield "</h1>
                    
                    <div class=\"page-meta text-muted mb-3\">
                        <div class=\"d-flex flex-wrap align-items-center\">
                            <span class=\"me-3\">
                                <i class=\"fas fa-user me-1\"></i>
                                ";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 23, $this->source); })()), "author", [], "any", false, false, false, 23), "displayName", [], "any", false, false, false, 23), "html", null, true);
        yield "
                            </span>
                            ";
        // line 25
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 25, $this->source); })()), "publishedAt", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "                                <span class=\"me-3\">
                                    <i class=\"fas fa-calendar me-1\"></i>
                                    ";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 28, $this->source); })()), "publishedAt", [], "any", false, false, false, 28), "d F Y"), "html", null, true);
            yield "
                                </span>
                            ";
        }
        // line 31
        yield "                            ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 31, $this->source); })()), "updatedAt", [], "any", false, false, false, 31) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 31, $this->source); })()), "updatedAt", [], "any", false, false, false, 31) != CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 31, $this->source); })()), "publishedAt", [], "any", false, false, false, 31)))) {
            // line 32
            yield "                                <span>
                                    <i class=\"fas fa-edit me-1\"></i>
                                    Mis à jour le ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 34, $this->source); })()), "updatedAt", [], "any", false, false, false, 34), "d F Y"), "html", null, true);
            yield "
                                </span>
                            ";
        }
        // line 37
        yield "                        </div>
                    </div>
                </header>
                
                <!-- Image à la une -->
                ";
        // line 42
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 42, $this->source); })()), "featuredImage", [], "any", false, false, false, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 43
            yield "                    <div class=\"mb-4\">
                        <img src=\"";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 44, $this->source); })()), "featuredImage", [], "any", false, false, false, 44), "url", [], "any", false, false, false, 44), "html", null, true);
            yield "\" class=\"img-fluid rounded\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 44, $this->source); })()), "title", [], "any", false, false, false, 44), "html", null, true);
            yield "\">
                        ";
            // line 45
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 45, $this->source); })()), "featuredImage", [], "any", false, false, false, 45), "caption", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 46
                yield "                            <figcaption class=\"figure-caption text-center mt-2\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 46, $this->source); })()), "featuredImage", [], "any", false, false, false, 46), "caption", [], "any", false, false, false, 46), "html", null, true);
                yield "</figcaption>
                        ";
            }
            // line 48
            yield "                    </div>
                ";
        }
        // line 50
        yield "                
                <!-- Extrait -->
                ";
        // line 52
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 52, $this->source); })()), "excerpt", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "                    <div class=\"lead mb-4 p-3 bg-light rounded\">
                        ";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 54, $this->source); })()), "excerpt", [], "any", false, false, false, 54), "html", null, true);
            yield "
                    </div>
                ";
        }
        // line 57
        yield "                
                <!-- Contenu principal -->
                <div class=\"page-content-body\">
                    ";
        // line 60
        yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 60, $this->source); })()), "content", [], "any", false, false, false, 60);
        yield "
                </div>
                
                <!-- Partage social -->
                <div class=\"d-flex justify-content-between align-items-center mt-5 pt-4 border-top\">
                    <div>
                        <strong>Partager cette page :</strong>
                    </div>
                    <div>
                        <a href=\"https://twitter.com/intent/tweet?text=";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 69, $this->source); })()), "title", [], "any", false, false, false, 69)), "html", null, true);
        yield "&url=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_page_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 69, $this->source); })()), "slug", [], "any", false, false, false, 69)])), "html", null, true);
        yield "\" 
                           target=\"_blank\" class=\"btn btn-outline-info btn-sm me-2\">
                            <i class=\"fab fa-twitter\"></i> Twitter
                        </a>
                        <a href=\"https://www.facebook.com/sharer/sharer.php?u=";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_page_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 73, $this->source); })()), "slug", [], "any", false, false, false, 73)])), "html", null, true);
        yield "\" 
                           target=\"_blank\" class=\"btn btn-outline-primary btn-sm me-2\">
                            <i class=\"fab fa-facebook-f\"></i> Facebook
                        </a>
                        <a href=\"https://www.linkedin.com/sharing/share-offsite/?url=";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_page_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 77, $this->source); })()), "slug", [], "any", false, false, false, 77)])), "html", null, true);
        yield "\" 
                           target=\"_blank\" class=\"btn btn-outline-success btn-sm\">
                            <i class=\"fab fa-linkedin-in\"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </article>
            
            <!-- Commentaires (si activés) -->
            ";
        // line 86
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 86, $this->source); })()), "commentStatus", [], "any", false, false, false, 86) && array_key_exists("comments", $context))) {
            // line 87
            yield "                <section class=\"comments-section mt-5\">
                    <h4 class=\"mb-4\">
                        <i class=\"fas fa-comments me-2\"></i>
                        Commentaires (";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 90, $this->source); })())), "html", null, true);
            yield ")
                    </h4>
                    
                    <!-- Liste des commentaires -->
                    ";
            // line 94
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 94, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 95
                yield "                        <div class=\"comments-list mb-5\">
                            ";
                // line 96
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 96, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                    // line 97
                    yield "                                <div class=\"comment mb-4 p-3 border rounded\">
                                    <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3\" 
                                                 style=\"width: 40px; height: 40px;\">
                                                <i class=\"fas fa-user text-white\"></i>
                                            </div>
                                            <div>
                                                <strong>";
                    // line 105
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", false, false, false, 105), "html", null, true);
                    yield "</strong>
                                                ";
                    // line 106
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorWebsite", [], "any", false, false, false, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 107
                        yield "                                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorWebsite", [], "any", false, false, false, 107), "html", null, true);
                        yield "\" target=\"_blank\" class=\"text-muted ms-2\">
                                                        <i class=\"fas fa-external-link-alt\"></i>
                                                    </a>
                                                ";
                    }
                    // line 111
                    yield "                                            </div>
                                        </div>
                                        <small class=\"text-muted\">";
                    // line 113
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "createdAt", [], "any", false, false, false, 113), "d/m/Y à H:i"), "html", null, true);
                    yield "</small>
                                    </div>
                                    <div class=\"comment-content ms-5\">
                                        ";
                    // line 116
                    yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 116), "html", null, true));
                    yield "
                                    </div>
                                </div>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 120
                yield "                        </div>
                    ";
            }
            // line 122
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
        // line 153
        yield "        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 158
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

        // line 159
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .page-content-body {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .page-content-body h2, .page-content-body h3, .page-content-body h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .page-content-body p {
            margin-bottom: 1.5rem;
        }
        .page-content-body blockquote {
            border-left: 4px solid #007bff;
            padding-left: 1rem;
            font-style: italic;
            background-color: #f8f9fa;
            padding: 1rem;
            margin: 1.5rem 0;
        }
        .page-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 0.375rem;
        }
        .page-content-body ul, .page-content-body ol {
            margin-bottom: 1.5rem;
        }
        .page-content-body table {
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .page-content-body table th,
        .page-content-body table td {
            padding: 0.75rem;
            border: 1px solid #dee2e6;
        }
        .page-content-body table th {
            background-color: #f8f9fa;
            font-weight: 600;
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
        return "frontend/pages/show.html.twig";
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
        return array (  421 => 159,  408 => 158,  394 => 153,  361 => 122,  357 => 120,  347 => 116,  341 => 113,  337 => 111,  329 => 107,  327 => 106,  323 => 105,  313 => 97,  309 => 96,  306 => 95,  304 => 94,  297 => 90,  292 => 87,  290 => 86,  278 => 77,  271 => 73,  262 => 69,  250 => 60,  245 => 57,  239 => 54,  236 => 53,  234 => 52,  230 => 50,  226 => 48,  220 => 46,  218 => 45,  212 => 44,  209 => 43,  207 => 42,  200 => 37,  194 => 34,  190 => 32,  187 => 31,  181 => 28,  177 => 26,  175 => 25,  170 => 23,  161 => 17,  153 => 11,  140 => 10,  117 => 8,  94 => 7,  70 => 5,  59 => 1,  57 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'frontend/base.html.twig' %}

{% set translation = page.getTranslationForLanguage(currentLanguage) %}

{% block title %}{{ translation.title }} - SymfPress{% endblock %}

{% block meta_description %}{{ translation.metaDescription ?: translation.excerpt }}{% endblock %}
{% block meta_keywords %}{{ translation.metaKeywords }}{% endblock %}

{% block content %}
<div class=\"container my-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-8\">
            <article class=\"page-content\">
                <!-- Header de la page -->
                <header class=\"mb-4\">
                    <h1 class=\"display-5 mb-3\">{{ translation.title }}</h1>
                    
                    <div class=\"page-meta text-muted mb-3\">
                        <div class=\"d-flex flex-wrap align-items-center\">
                            <span class=\"me-3\">
                                <i class=\"fas fa-user me-1\"></i>
                                {{ page.author.displayName }}
                            </span>
                            {% if page.publishedAt %}
                                <span class=\"me-3\">
                                    <i class=\"fas fa-calendar me-1\"></i>
                                    {{ page.publishedAt|date('d F Y') }}
                                </span>
                            {% endif %}
                            {% if page.updatedAt and page.updatedAt != page.publishedAt %}
                                <span>
                                    <i class=\"fas fa-edit me-1\"></i>
                                    Mis à jour le {{ page.updatedAt|date('d F Y') }}
                                </span>
                            {% endif %}
                        </div>
                    </div>
                </header>
                
                <!-- Image à la une -->
                {% if page.featuredImage %}
                    <div class=\"mb-4\">
                        <img src=\"{{ page.featuredImage.url }}\" class=\"img-fluid rounded\" alt=\"{{ translation.title }}\">
                        {% if page.featuredImage.caption %}
                            <figcaption class=\"figure-caption text-center mt-2\">{{ page.featuredImage.caption }}</figcaption>
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
                <div class=\"page-content-body\">
                    {{ translation.content|raw }}
                </div>
                
                <!-- Partage social -->
                <div class=\"d-flex justify-content-between align-items-center mt-5 pt-4 border-top\">
                    <div>
                        <strong>Partager cette page :</strong>
                    </div>
                    <div>
                        <a href=\"https://twitter.com/intent/tweet?text={{ translation.title|url_encode }}&url={{ url('frontend_page_show', {'slug': page.slug})|url_encode }}\" 
                           target=\"_blank\" class=\"btn btn-outline-info btn-sm me-2\">
                            <i class=\"fab fa-twitter\"></i> Twitter
                        </a>
                        <a href=\"https://www.facebook.com/sharer/sharer.php?u={{ url('frontend_page_show', {'slug': page.slug})|url_encode }}\" 
                           target=\"_blank\" class=\"btn btn-outline-primary btn-sm me-2\">
                            <i class=\"fab fa-facebook-f\"></i> Facebook
                        </a>
                        <a href=\"https://www.linkedin.com/sharing/share-offsite/?url={{ url('frontend_page_show', {'slug': page.slug})|url_encode }}\" 
                           target=\"_blank\" class=\"btn btn-outline-success btn-sm\">
                            <i class=\"fab fa-linkedin-in\"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </article>
            
            <!-- Commentaires (si activés) -->
            {% if page.commentStatus and comments is defined %}
                <section class=\"comments-section mt-5\">
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
    </div>
</div>
{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .page-content-body {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .page-content-body h2, .page-content-body h3, .page-content-body h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .page-content-body p {
            margin-bottom: 1.5rem;
        }
        .page-content-body blockquote {
            border-left: 4px solid #007bff;
            padding-left: 1rem;
            font-style: italic;
            background-color: #f8f9fa;
            padding: 1rem;
            margin: 1.5rem 0;
        }
        .page-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 0.375rem;
        }
        .page-content-body ul, .page-content-body ol {
            margin-bottom: 1.5rem;
        }
        .page-content-body table {
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .page-content-body table th,
        .page-content-body table td {
            padding: 0.75rem;
            border: 1px solid #dee2e6;
        }
        .page-content-body table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
    </style>
{% endblock %}
", "frontend/pages/show.html.twig", "/workspace/symfpress/templates/frontend/pages/show.html.twig");
    }
}
