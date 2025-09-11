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

/* frontend/home.html.twig */
class __TwigTemplate_2d990d34263b5d7f9588de8b5b1bc56e extends Template
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
            'content' => [$this, 'block_content'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/home.html.twig"));

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

        yield "Accueil - SymfPress";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<!-- Hero Section -->
<section class=\"bg-primary text-white py-5\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-lg-8\">
                <h1 class=\"display-4 mb-3\">Bienvenue sur SymfPress</h1>
                <p class=\"lead mb-4\">Un système de gestion de contenu moderne et multilingue, conçu avec Symfony pour offrir performance et flexibilité.</p>
                <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts");
        yield "\" class=\"btn btn-light btn-lg\">
                    <i class=\"fas fa-book-open me-2\"></i>
                    Découvrir nos articles
                </a>
            </div>
            <div class=\"col-lg-4 text-center\">
                <i class=\"fas fa-blog\" style=\"font-size: 8rem; opacity: 0.3;\"></i>
            </div>
        </div>
    </div>
</section>

<!-- Articles à la une -->
";
        // line 26
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["featuredPosts"]) || array_key_exists("featuredPosts", $context) ? $context["featuredPosts"] : (function () { throw new RuntimeError('Variable "featuredPosts" does not exist.', 26, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "<section class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"text-center mb-5\">
            <h2 class=\"h3 mb-3\">Articles à la une</h2>
            <p class=\"text-muted\">Découvrez nos contenus mis en avant</p>
        </div>
        
        <div class=\"row\">
            ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["featuredPosts"]) || array_key_exists("featuredPosts", $context) ? $context["featuredPosts"] : (function () { throw new RuntimeError('Variable "featuredPosts" does not exist.', 35, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 36
                yield "                ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 36, $this->source); })())], "method", false, false, false, 36);
                // line 37
                yield "                <div class=\"col-lg-4 mb-4\">
                    <div class=\"card post-card border-0 shadow-sm h-100\">
                        ";
                // line 39
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 40
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 40), "url", [], "any", false, false, false, 40), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 40, $this->source); })()), "title", [], "any", false, false, false, 40), "html", null, true);
                    yield "\" style=\"height: 200px; object-fit: cover;\">
                        ";
                }
                // line 42
                yield "                        <div class=\"card-body d-flex flex-column\">
                            <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                <span class=\"badge bg-primary\">Vedette</span>
                                <small class=\"text-muted\">";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 45), "d/m/Y"), "html", null, true);
                yield "</small>
                            </div>
                            <h5 class=\"card-title\">";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 47, $this->source); })()), "title", [], "any", false, false, false, 47), "html", null, true);
                yield "</h5>
                            <p class=\"card-text text-muted flex-grow-1\">
                                ";
                // line 49
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 49, $this->source); })()), "excerpt", [], "any", false, false, false, 49)) > 120)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 49, $this->source); })()), "excerpt", [], "any", false, false, false, 49), 0, 120) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 49, $this->source); })()), "excerpt", [], "any", false, false, false, 49), "html", null, true)));
                yield "
                            </p>
                            <div class=\"mt-auto\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <small class=\"text-muted\">
                                        <i class=\"fas fa-user me-1\"></i>
                                        ";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 55), "displayName", [], "any", false, false, false, 55), "html", null, true);
                yield "
                                    </small>
                                    <a href=\"";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 57)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            yield "        </div>
    </div>
</section>
";
        }
        // line 70
        yield "
<!-- Articles récents -->
<section class=\"py-5\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-between align-items-center mb-5\">
            <div>
                <h2 class=\"h3 mb-1\">Articles récents</h2>
                <p class=\"text-muted mb-0\">Nos dernières publications</p>
            </div>
            <a href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts");
        yield "\" class=\"btn btn-outline-primary\">
                Voir tous les articles
                <i class=\"fas fa-arrow-right ms-1\"></i>
            </a>
        </div>
        
        ";
        // line 85
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 85, $this->source); })()))) {
            // line 86
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-edit fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun article publié</h5>
                <p class=\"text-muted\">Revenez bientôt pour découvrir nos contenus !</p>
            </div>
        ";
        } else {
            // line 92
            yield "            <div class=\"row\">
                ";
            // line 93
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 93, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 94
                yield "                    ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 94, $this->source); })())], "method", false, false, false, 94);
                // line 95
                yield "                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"card post-card border-0 shadow-sm h-100\">
                            ";
                // line 97
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 98
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 98), "url", [], "any", false, false, false, 98), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 98, $this->source); })()), "title", [], "any", false, false, false, 98), "html", null, true);
                    yield "\" style=\"height: 200px; object-fit: cover;\">
                            ";
                }
                // line 100
                yield "                            <div class=\"card-body d-flex flex-column\">
                                <div class=\"post-meta mb-2\">
                                    <i class=\"fas fa-calendar me-1\"></i>
                                    ";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 103), "d/m/Y"), "html", null, true);
                yield "
                                    <i class=\"fas fa-eye ms-2 me-1\"></i>
                                    ";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "viewCount", [], "any", false, false, false, 105), "html", null, true);
                yield "
                                </div>
                                <h5 class=\"card-title\">";
                // line 107
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 107, $this->source); })()), "title", [], "any", false, false, false, 107), "html", null, true);
                yield "</h5>
                                <p class=\"card-text text-muted flex-grow-1\">
                                    ";
                // line 109
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 109, $this->source); })()), "excerpt", [], "any", false, false, false, 109)) > 120)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 109, $this->source); })()), "excerpt", [], "any", false, false, false, 109), 0, 120) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 109, $this->source); })()), "excerpt", [], "any", false, false, false, 109), "html", null, true)));
                yield "
                                </p>
                                <div class=\"mt-auto\">
                                    <!-- Catégories -->
                                    ";
                // line 113
                if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "categories", [], "any", false, false, false, 113))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 114
                    yield "                                        <div class=\"mb-2\">
                                            ";
                    // line 115
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "categories", [], "any", false, false, false, 115), 0, 2));
                    foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                        // line 116
                        yield "                                                <span class=\"badge bg-secondary me-1\">
                                                    ";
                        // line 117
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getDisplayName", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 117, $this->source); })())], "method", false, false, false, 117), "html", null, true);
                        yield "
                                                </span>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 120
                    yield "                                        </div>
                                    ";
                }
                // line 122
                yield "                                    
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <small class=\"text-muted\">
                                            <i class=\"fas fa-user me-1\"></i>
                                            ";
                // line 126
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 126), "displayName", [], "any", false, false, false, 126), "html", null, true);
                yield "
                                        </small>
                                        <a href=\"";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 128)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                                            Lire plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            yield "            </div>
        ";
        }
        // line 139
        yield "    </div>
</section>

<!-- Catégories -->
";
        // line 143
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 143, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 144
            yield "<section class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"text-center mb-5\">
            <h2 class=\"h3 mb-3\">Catégories</h2>
            <p class=\"text-muted\">Explorez nos contenus par thème</p>
        </div>
        
        <div class=\"row\">
            ";
            // line 152
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 152, $this->source); })()), 0, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 153
                yield "                <div class=\"col-lg-4 col-md-6 mb-3\">
                    <a href=\"";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_category_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "slug", [], "any", false, false, false, 154)]), "html", null, true);
                yield "\" class=\"text-decoration-none\">
                        <div class=\"card border-0 shadow-sm h-100\">
                            <div class=\"card-body text-center\">
                                ";
                // line 157
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "icon", [], "any", false, false, false, 157)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 158
                    yield "                                    <i class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "icon", [], "any", false, false, false, 158), "html", null, true);
                    yield " fa-2x text-primary mb-3\"></i>
                                ";
                } else {
                    // line 160
                    yield "                                    <i class=\"fas fa-folder fa-2x text-primary mb-3\"></i>
                                ";
                }
                // line 162
                yield "                                <h6 class=\"card-title\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getDisplayName", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 162, $this->source); })())], "method", false, false, false, 162), "html", null, true);
                yield "</h6>
                                <p class=\"card-text text-muted small\">
                                    ";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "postCount", [], "any", false, false, false, 164), "html", null, true);
                yield " article";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["category"], "postCount", [], "any", false, false, false, 164) > 1)) ? ("s") : (""));
                yield "
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 171
            yield "        </div>
    </div>
</section>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "frontend/home.html.twig";
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
        return array (  408 => 171,  393 => 164,  387 => 162,  383 => 160,  377 => 158,  375 => 157,  369 => 154,  366 => 153,  362 => 152,  352 => 144,  350 => 143,  344 => 139,  340 => 137,  325 => 128,  320 => 126,  314 => 122,  310 => 120,  301 => 117,  298 => 116,  294 => 115,  291 => 114,  289 => 113,  282 => 109,  277 => 107,  272 => 105,  267 => 103,  262 => 100,  254 => 98,  252 => 97,  248 => 95,  245 => 94,  241 => 93,  238 => 92,  230 => 86,  228 => 85,  219 => 79,  208 => 70,  202 => 66,  187 => 57,  182 => 55,  173 => 49,  168 => 47,  163 => 45,  158 => 42,  150 => 40,  148 => 39,  144 => 37,  141 => 36,  137 => 35,  127 => 27,  125 => 26,  109 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'frontend/base.html.twig' %}

{% block title %}Accueil - SymfPress{% endblock %}

{% block content %}
<!-- Hero Section -->
<section class=\"bg-primary text-white py-5\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-lg-8\">
                <h1 class=\"display-4 mb-3\">Bienvenue sur SymfPress</h1>
                <p class=\"lead mb-4\">Un système de gestion de contenu moderne et multilingue, conçu avec Symfony pour offrir performance et flexibilité.</p>
                <a href=\"{{ path('frontend_posts') }}\" class=\"btn btn-light btn-lg\">
                    <i class=\"fas fa-book-open me-2\"></i>
                    Découvrir nos articles
                </a>
            </div>
            <div class=\"col-lg-4 text-center\">
                <i class=\"fas fa-blog\" style=\"font-size: 8rem; opacity: 0.3;\"></i>
            </div>
        </div>
    </div>
</section>

<!-- Articles à la une -->
{% if featuredPosts is not empty %}
<section class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"text-center mb-5\">
            <h2 class=\"h3 mb-3\">Articles à la une</h2>
            <p class=\"text-muted\">Découvrez nos contenus mis en avant</p>
        </div>
        
        <div class=\"row\">
            {% for post in featuredPosts %}
                {% set translation = post.getTranslationForLanguage(currentLanguage) %}
                <div class=\"col-lg-4 mb-4\">
                    <div class=\"card post-card border-0 shadow-sm h-100\">
                        {% if post.featuredImage %}
                            <img src=\"{{ post.featuredImage.url }}\" class=\"card-img-top\" alt=\"{{ translation.title }}\" style=\"height: 200px; object-fit: cover;\">
                        {% endif %}
                        <div class=\"card-body d-flex flex-column\">
                            <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                <span class=\"badge bg-primary\">Vedette</span>
                                <small class=\"text-muted\">{{ post.publishedAt|date('d/m/Y') }}</small>
                            </div>
                            <h5 class=\"card-title\">{{ translation.title }}</h5>
                            <p class=\"card-text text-muted flex-grow-1\">
                                {{ translation.excerpt|length > 120 ? translation.excerpt|slice(0, 120) ~ '...' : translation.excerpt }}
                            </p>
                            <div class=\"mt-auto\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <small class=\"text-muted\">
                                        <i class=\"fas fa-user me-1\"></i>
                                        {{ post.author.displayName }}
                                    </small>
                                    <a href=\"{{ path('frontend_post_show', {'slug': post.slug}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {% endfor %}
        </div>
    </div>
</section>
{% endif %}

<!-- Articles récents -->
<section class=\"py-5\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-between align-items-center mb-5\">
            <div>
                <h2 class=\"h3 mb-1\">Articles récents</h2>
                <p class=\"text-muted mb-0\">Nos dernières publications</p>
            </div>
            <a href=\"{{ path('frontend_posts') }}\" class=\"btn btn-outline-primary\">
                Voir tous les articles
                <i class=\"fas fa-arrow-right ms-1\"></i>
            </a>
        </div>
        
        {% if posts is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-edit fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun article publié</h5>
                <p class=\"text-muted\">Revenez bientôt pour découvrir nos contenus !</p>
            </div>
        {% else %}
            <div class=\"row\">
                {% for post in posts %}
                    {% set translation = post.getTranslationForLanguage(currentLanguage) %}
                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"card post-card border-0 shadow-sm h-100\">
                            {% if post.featuredImage %}
                                <img src=\"{{ post.featuredImage.url }}\" class=\"card-img-top\" alt=\"{{ translation.title }}\" style=\"height: 200px; object-fit: cover;\">
                            {% endif %}
                            <div class=\"card-body d-flex flex-column\">
                                <div class=\"post-meta mb-2\">
                                    <i class=\"fas fa-calendar me-1\"></i>
                                    {{ post.publishedAt|date('d/m/Y') }}
                                    <i class=\"fas fa-eye ms-2 me-1\"></i>
                                    {{ post.viewCount }}
                                </div>
                                <h5 class=\"card-title\">{{ translation.title }}</h5>
                                <p class=\"card-text text-muted flex-grow-1\">
                                    {{ translation.excerpt|length > 120 ? translation.excerpt|slice(0, 120) ~ '...' : translation.excerpt }}
                                </p>
                                <div class=\"mt-auto\">
                                    <!-- Catégories -->
                                    {% if post.categories is not empty %}
                                        <div class=\"mb-2\">
                                            {% for category in post.categories|slice(0, 2) %}
                                                <span class=\"badge bg-secondary me-1\">
                                                    {{ category.getDisplayName(currentLanguage) }}
                                                </span>
                                            {% endfor %}
                                        </div>
                                    {% endif %}
                                    
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <small class=\"text-muted\">
                                            <i class=\"fas fa-user me-1\"></i>
                                            {{ post.author.displayName }}
                                        </small>
                                        <a href=\"{{ path('frontend_post_show', {'slug': post.slug}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                            Lire plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        {% endif %}
    </div>
</section>

<!-- Catégories -->
{% if categories is not empty %}
<section class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"text-center mb-5\">
            <h2 class=\"h3 mb-3\">Catégories</h2>
            <p class=\"text-muted\">Explorez nos contenus par thème</p>
        </div>
        
        <div class=\"row\">
            {% for category in categories|slice(0, 6) %}
                <div class=\"col-lg-4 col-md-6 mb-3\">
                    <a href=\"{{ path('frontend_category_show', {'slug': category.slug}) }}\" class=\"text-decoration-none\">
                        <div class=\"card border-0 shadow-sm h-100\">
                            <div class=\"card-body text-center\">
                                {% if category.icon %}
                                    <i class=\"{{ category.icon }} fa-2x text-primary mb-3\"></i>
                                {% else %}
                                    <i class=\"fas fa-folder fa-2x text-primary mb-3\"></i>
                                {% endif %}
                                <h6 class=\"card-title\">{{ category.getDisplayName(currentLanguage) }}</h6>
                                <p class=\"card-text text-muted small\">
                                    {{ category.postCount }} article{{ category.postCount > 1 ? 's' : '' }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            {% endfor %}
        </div>
    </div>
</section>
{% endif %}
{% endblock %}", "frontend/home.html.twig", "/workspace/symfpress/templates/frontend/home.html.twig");
    }
}
