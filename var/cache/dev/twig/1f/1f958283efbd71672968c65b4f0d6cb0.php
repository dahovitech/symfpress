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

/* frontend/posts/index.html.twig */
class __TwigTemplate_8df9d23b21c27f61ed4922503aec94ed extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/posts/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/posts/index.html.twig"));

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

        yield "Articles - SymfPress";
        
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

        yield "Découvrez tous nos articles sur SymfPress";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
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

        // line 8
        yield "<div class=\"container my-5\">
    <!-- Header -->
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"text-center mb-5\">
                <h1 class=\"display-4 mb-3\">Tous nos articles</h1>
                <p class=\"lead text-muted\">Découvrez notre collection d'articles</p>
            </div>
        </div>
    </div>

    <!-- Articles -->
    ";
        // line 20
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 20, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "        <div class=\"row\">
            ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 22, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 23
                yield "                ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 23, $this->source); })())], "method", false, false, false, 23);
                // line 24
                yield "                ";
                if ((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 25
                    yield "                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <article class=\"card post-card h-100\">
                            ";
                    // line 27
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 28
                        yield "                                <img src=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 28), "url", [], "any", false, false, false, 28), "html", null, true);
                        yield "\" class=\"card-img-top\" alt=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 28, $this->source); })()), "title", [], "any", false, false, false, 28), "html", null, true);
                        yield "\" style=\"height: 200px; object-fit: cover;\">
                            ";
                    }
                    // line 30
                    yield "                            
                            <div class=\"card-body d-flex flex-column\">
                                <h5 class=\"card-title\">
                                    <a href=\"";
                    // line 33
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 33)]), "html", null, true);
                    yield "\" class=\"text-decoration-none\">
                                        ";
                    // line 34
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 34, $this->source); })()), "title", [], "any", false, false, false, 34), "html", null, true);
                    yield "
                                    </a>
                                </h5>
                                
                                ";
                    // line 38
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 38, $this->source); })()), "excerpt", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 39
                        yield "                                    <p class=\"card-text text-muted\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 39, $this->source); })()), "excerpt", [], "any", false, false, false, 39), 0, 150), "html", null, true);
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 39, $this->source); })()), "excerpt", [], "any", false, false, false, 39)) > 150)) {
                            yield "...";
                        }
                        yield "</p>
                                ";
                    }
                    // line 41
                    yield "                                
                                <div class=\"post-meta small text-muted mb-3\">
                                    <span class=\"me-3\">
                                        <i class=\"fas fa-user me-1\"></i>
                                        ";
                    // line 45
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 45), "displayName", [], "any", false, false, false, 45), "html", null, true);
                    yield "
                                    </span>
                                    <span class=\"me-3\">
                                        <i class=\"fas fa-calendar me-1\"></i>
                                        ";
                    // line 49
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 49), "d/m/Y"), "html", null, true);
                    yield "
                                    </span>
                                    <span>
                                        <i class=\"fas fa-eye me-1\"></i>
                                        ";
                    // line 53
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "viewCount", [], "any", false, false, false, 53), "html", null, true);
                    yield "
                                    </span>
                                </div>
                                
                                <!-- Catégories -->
                                ";
                    // line 58
                    if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "categories", [], "any", false, false, false, 58))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 59
                        yield "                                    <div class=\"mb-3\">
                                        ";
                        // line 60
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "categories", [], "any", false, false, false, 60));
                        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                            // line 61
                            yield "                                            <span class=\"badge bg-primary me-1\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getDisplayName", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 61, $this->source); })())], "method", false, false, false, 61), "html", null, true);
                            yield "</span>
                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 63
                        yield "                                    </div>
                                ";
                    }
                    // line 65
                    yield "                                
                                <div class=\"mt-auto\">
                                    <a href=\"";
                    // line 67
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 67)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-primary\">
                                        Lire la suite <i class=\"fas fa-arrow-right ms-1\"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                ";
                }
                // line 75
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            yield "        </div>

        <!-- Pagination -->
        ";
            // line 79
            if (((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 79, $this->source); })()) > 1)) {
                // line 80
                yield "            <nav aria-label=\"Navigation des pages\" class=\"mt-5\">
                <ul class=\"pagination justify-content-center\">
                    ";
                // line 82
                if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 82, $this->source); })()) > 1)) {
                    // line 83
                    yield "                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"";
                    // line 84
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts_paginated", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 84, $this->source); })()) - 1)]), "html", null, true);
                    yield "\">
                                <i class=\"fas fa-arrow-left me-1\"></i> Précédent
                            </a>
                        </li>
                    ";
                }
                // line 89
                yield "                    
                    ";
                // line 90
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 90, $this->source); })())));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    // line 91
                    yield "                        ";
                    if (($context["page"] == (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 91, $this->source); })()))) {
                        // line 92
                        yield "                            <li class=\"page-item active\">
                                <span class=\"page-link\">";
                        // line 93
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                        yield "</span>
                            </li>
                        ";
                    } elseif ((((                    // line 95
$context["page"] == 1) || ($context["page"] == (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 95, $this->source); })()))) || (($context["page"] >= ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 95, $this->source); })()) - 2)) && ($context["page"] <= ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 95, $this->source); })()) + 2))))) {
                        // line 96
                        yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
                        // line 97
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts_paginated", ["page" => $context["page"]]), "html", null, true);
                        yield "\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                        yield "</a>
                            </li>
                        ";
                    } elseif (((                    // line 99
$context["page"] == ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 99, $this->source); })()) - 3)) || ($context["page"] == ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 99, $this->source); })()) + 3)))) {
                        // line 100
                        yield "                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">...</span>
                            </li>
                        ";
                    }
                    // line 104
                    yield "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                yield "                    
                    ";
                // line 106
                if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 106, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 106, $this->source); })()))) {
                    // line 107
                    yield "                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"";
                    // line 108
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts_paginated", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 108, $this->source); })()) + 1)]), "html", null, true);
                    yield "\">
                                Suivant <i class=\"fas fa-arrow-right ms-1\"></i>
                            </a>
                        </li>
                    ";
                }
                // line 113
                yield "                </ul>
            </nav>
        ";
            }
            // line 116
            yield "    ";
        } else {
            // line 117
            yield "        <div class=\"text-center py-5\">
            <div class=\"mb-4\">
                <i class=\"fas fa-newspaper fa-4x text-muted\"></i>
            </div>
            <h3 class=\"text-muted\">Aucun article disponible</h3>
            <p class=\"text-muted\">Il n'y a pas encore d'articles publiés sur ce site.</p>
        </div>
    ";
        }
        // line 125
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 128
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

        // line 129
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .post-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .post-card .card-title a {
            color: inherit;
        }
        .post-card .card-title a:hover {
            color: #007bff;
        }
        .pagination .page-link {
            border-radius: 0.375rem;
            margin: 0 0.1rem;
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
        return "frontend/posts/index.html.twig";
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
        return array (  393 => 129,  380 => 128,  368 => 125,  358 => 117,  355 => 116,  350 => 113,  342 => 108,  339 => 107,  337 => 106,  334 => 105,  328 => 104,  322 => 100,  320 => 99,  313 => 97,  310 => 96,  308 => 95,  303 => 93,  300 => 92,  297 => 91,  293 => 90,  290 => 89,  282 => 84,  279 => 83,  277 => 82,  273 => 80,  271 => 79,  266 => 76,  260 => 75,  249 => 67,  245 => 65,  241 => 63,  232 => 61,  228 => 60,  225 => 59,  223 => 58,  215 => 53,  208 => 49,  201 => 45,  195 => 41,  186 => 39,  184 => 38,  177 => 34,  173 => 33,  168 => 30,  160 => 28,  158 => 27,  154 => 25,  151 => 24,  148 => 23,  144 => 22,  141 => 21,  139 => 20,  125 => 8,  112 => 7,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'frontend/base.html.twig' %}

{% block title %}Articles - SymfPress{% endblock %}

{% block meta_description %}Découvrez tous nos articles sur SymfPress{% endblock %}

{% block content %}
<div class=\"container my-5\">
    <!-- Header -->
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"text-center mb-5\">
                <h1 class=\"display-4 mb-3\">Tous nos articles</h1>
                <p class=\"lead text-muted\">Découvrez notre collection d'articles</p>
            </div>
        </div>
    </div>

    <!-- Articles -->
    {% if posts is not empty %}
        <div class=\"row\">
            {% for post in posts %}
                {% set translation = post.getTranslationForLanguage(currentLanguage) %}
                {% if translation %}
                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <article class=\"card post-card h-100\">
                            {% if post.featuredImage %}
                                <img src=\"{{ post.featuredImage.url }}\" class=\"card-img-top\" alt=\"{{ translation.title }}\" style=\"height: 200px; object-fit: cover;\">
                            {% endif %}
                            
                            <div class=\"card-body d-flex flex-column\">
                                <h5 class=\"card-title\">
                                    <a href=\"{{ path('frontend_post_show', {'slug': post.slug}) }}\" class=\"text-decoration-none\">
                                        {{ translation.title }}
                                    </a>
                                </h5>
                                
                                {% if translation.excerpt %}
                                    <p class=\"card-text text-muted\">{{ translation.excerpt|slice(0, 150) }}{% if translation.excerpt|length > 150 %}...{% endif %}</p>
                                {% endif %}
                                
                                <div class=\"post-meta small text-muted mb-3\">
                                    <span class=\"me-3\">
                                        <i class=\"fas fa-user me-1\"></i>
                                        {{ post.author.displayName }}
                                    </span>
                                    <span class=\"me-3\">
                                        <i class=\"fas fa-calendar me-1\"></i>
                                        {{ post.publishedAt|date('d/m/Y') }}
                                    </span>
                                    <span>
                                        <i class=\"fas fa-eye me-1\"></i>
                                        {{ post.viewCount }}
                                    </span>
                                </div>
                                
                                <!-- Catégories -->
                                {% if post.categories is not empty %}
                                    <div class=\"mb-3\">
                                        {% for category in post.categories %}
                                            <span class=\"badge bg-primary me-1\">{{ category.getDisplayName(currentLanguage) }}</span>
                                        {% endfor %}
                                    </div>
                                {% endif %}
                                
                                <div class=\"mt-auto\">
                                    <a href=\"{{ path('frontend_post_show', {'slug': post.slug}) }}\" class=\"btn btn-outline-primary\">
                                        Lire la suite <i class=\"fas fa-arrow-right ms-1\"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                {% endif %}
            {% endfor %}
        </div>

        <!-- Pagination -->
        {% if totalPages > 1 %}
            <nav aria-label=\"Navigation des pages\" class=\"mt-5\">
                <ul class=\"pagination justify-content-center\">
                    {% if currentPage > 1 %}
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"{{ path('frontend_posts_paginated', {'page': currentPage - 1}) }}\">
                                <i class=\"fas fa-arrow-left me-1\"></i> Précédent
                            </a>
                        </li>
                    {% endif %}
                    
                    {% for page in 1..totalPages %}
                        {% if page == currentPage %}
                            <li class=\"page-item active\">
                                <span class=\"page-link\">{{ page }}</span>
                            </li>
                        {% elseif page == 1 or page == totalPages or (page >= currentPage - 2 and page <= currentPage + 2) %}
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"{{ path('frontend_posts_paginated', {'page': page}) }}\">{{ page }}</a>
                            </li>
                        {% elseif page == currentPage - 3 or page == currentPage + 3 %}
                            <li class=\"page-item disabled\">
                                <span class=\"page-link\">...</span>
                            </li>
                        {% endif %}
                    {% endfor %}
                    
                    {% if currentPage < totalPages %}
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"{{ path('frontend_posts_paginated', {'page': currentPage + 1}) }}\">
                                Suivant <i class=\"fas fa-arrow-right ms-1\"></i>
                            </a>
                        </li>
                    {% endif %}
                </ul>
            </nav>
        {% endif %}
    {% else %}
        <div class=\"text-center py-5\">
            <div class=\"mb-4\">
                <i class=\"fas fa-newspaper fa-4x text-muted\"></i>
            </div>
            <h3 class=\"text-muted\">Aucun article disponible</h3>
            <p class=\"text-muted\">Il n'y a pas encore d'articles publiés sur ce site.</p>
        </div>
    {% endif %}
</div>
{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .post-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .post-card .card-title a {
            color: inherit;
        }
        .post-card .card-title a:hover {
            color: #007bff;
        }
        .pagination .page-link {
            border-radius: 0.375rem;
            margin: 0 0.1rem;
        }
    </style>
{% endblock %}
", "frontend/posts/index.html.twig", "/workspace/symfpress/templates/frontend/posts/index.html.twig");
    }
}
