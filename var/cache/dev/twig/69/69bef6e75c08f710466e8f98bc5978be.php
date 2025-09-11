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

/* admin/dashboard.html.twig */
class __TwigTemplate_b99f6ab79408ccb0d83cf07ebaab358f extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Tableau de bord";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .border-left-dark {
            border-left: 0.25rem solid #6c757d !important;
        }
        .border-left-light {
            border-left: 0.25rem solid #f8f9fa !important;
        }
        .border-left-secondary {
            border-left: 0.25rem solid #6c757d !important;
        }
        .chart-container {
            position: relative;
            height: 300px;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 24
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 25
        yield "<!-- Première ligne de statistiques -->
<div class=\"row admin-stats mb-4\">
    <!-- Statistiques des articles -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Articles</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 34, $this->source); })()), "posts", [], "any", false, false, false, 34), "total", [], "any", false, false, false, 34), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 36, $this->source); })()), "posts", [], "any", false, false, false, 36), "published", [], "any", false, false, false, 36), "html", null, true);
        yield " publiés, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 36, $this->source); })()), "posts", [], "any", false, false, false, 36), "drafts", [], "any", false, false, false, 36), "html", null, true);
        yield " brouillons
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-edit fa-2x text-primary\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des pages -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-success h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">Pages</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 54, $this->source); })()), "pages", [], "any", false, false, false, 54), "total", [], "any", false, false, false, 54), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            ";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 56, $this->source); })()), "pages", [], "any", false, false, false, 56), "published", [], "any", false, false, false, 56), "html", null, true);
        yield " publiées, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 56, $this->source); })()), "pages", [], "any", false, false, false, 56), "drafts", [], "any", false, false, false, 56), "html", null, true);
        yield " brouillons
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-file-alt fa-2x text-success\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des commentaires -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-warning h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-warning text-uppercase mb-1\">Commentaires</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 74, $this->source); })()), "comments", [], "any", false, false, false, 74), "total", [], "any", false, false, false, 74), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            ";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 76, $this->source); })()), "comments", [], "any", false, false, false, 76), "pending", [], "any", false, false, false, 76), "html", null, true);
        yield " en attente
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-comments fa-2x text-warning\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des médias -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-info h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-info text-uppercase mb-1\">Médias</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 94, $this->source); })()), "media", [], "any", false, false, false, 94), "total", [], "any", false, false, false, 94), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            ";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 96, $this->source); })()), "media", [], "any", false, false, false, 96), "totalSize", [], "any", false, false, false, 96) / 1024) / 1024), 1), "html", null, true);
        yield " MB utilisés
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-images fa-2x text-info\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deuxième ligne de statistiques -->
<div class=\"row admin-stats mb-4\">
    <!-- Statistiques des utilisateurs -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-dark h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-dark text-uppercase mb-1\">Utilisateurs</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 117, $this->source); })()), "users", [], "any", false, false, false, 117), "total", [], "any", false, false, false, 117), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            ";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 119, $this->source); })()), "users", [], "any", false, false, false, 119), "active", [], "any", false, false, false, 119), "html", null, true);
        yield " actifs
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-users fa-2x text-dark\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des catégories -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-secondary h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-secondary text-uppercase mb-1\">Catégories</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 137, $this->source); })()), "categories", [], "any", false, false, false, 137), "total", [], "any", false, false, false, 137), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            Organisation du contenu
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-folder fa-2x text-secondary\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des tags -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-light h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-muted text-uppercase mb-1\">Tags</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 157, $this->source); })()), "tags", [], "any", false, false, false, 157), "total", [], "any", false, false, false, 157), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            Étiquetage du contenu
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-tags fa-2x text-muted\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des menus -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Menus</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 177, $this->source); })()), "menus", [], "any", false, false, false, 177), "total", [], "any", false, false, false, 177), "html", null, true);
        yield "</div>
                        <div class=\"text-xs text-muted mt-1\">
                            ";
        // line 179
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 179, $this->source); })()), "menus", [], "any", false, false, false, 179), "active", [], "any", false, false, false, 179), "html", null, true);
        yield " actifs
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-bars fa-2x text-primary\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenu récent -->
<div class=\"row\">
    <!-- Articles récents -->
    <div class=\"col-xl-8 col-lg-7\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Articles récents</h6>
                <a href=\"";
        // line 198
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_index");
        yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                ";
        // line 203
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recentPosts"]) || array_key_exists("recentPosts", $context) ? $context["recentPosts"] : (function () { throw new RuntimeError('Variable "recentPosts" does not exist.', 203, $this->source); })()))) {
            // line 204
            yield "                    <p class=\"text-muted text-center\">Aucun article récent</p>
                ";
        } else {
            // line 206
            yield "                    <div class=\"table-responsive\">
                        <table class=\"table table-sm\">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 217
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentPosts"]) || array_key_exists("recentPosts", $context) ? $context["recentPosts"] : (function () { throw new RuntimeError('Variable "recentPosts" does not exist.', 217, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 218
                yield "                                    ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 218, $this->source); })())], "method", false, false, false, 218);
                // line 219
                yield "                                    <tr>
                                        <td>
                                            <a href=\"";
                // line 221
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 221)]), "html", null, true);
                yield "\" class=\"text-decoration-none\">
                                                ";
                // line 222
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 222, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 222, $this->source); })()), "title", [], "any", false, false, false, 222), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Article #" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 222)), "html", null, true)));
                yield "
                                            </a>
                                        </td>
                                        <td>
                                            <span class=\"badge status-badge 
                                                ";
                // line 227
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 227) == "published")) {
                    yield "bg-success
                                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 228
$context["post"], "status", [], "any", false, false, false, 228) == "draft")) {
                    yield "bg-secondary
                                                ";
                } else {
                    // line 229
                    yield "bg-warning";
                }
                yield "\">
                                                ";
                // line 230
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 230)), "html", null, true);
                yield "
                                            </span>
                                        </td>
                                        <td>";
                // line 233
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 233), "displayName", [], "any", false, false, false, 233), "html", null, true);
                yield "</td>
                                        <td>";
                // line 234
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 234), "d/m/Y"), "html", null, true);
                yield "</td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 237
            yield "                            </tbody>
                        </table>
                    </div>
                ";
        }
        // line 241
        yield "            </div>
        </div>
    </div>
    
    <!-- Commentaires récents -->
    <div class=\"col-xl-4 col-lg-5\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Commentaires récents</h6>
                <a href=\"";
        // line 250
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index");
        yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                ";
        // line 255
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recentComments"]) || array_key_exists("recentComments", $context) ? $context["recentComments"] : (function () { throw new RuntimeError('Variable "recentComments" does not exist.', 255, $this->source); })()))) {
            // line 256
            yield "                    <p class=\"text-muted text-center\">Aucun commentaire récent</p>
                ";
        } else {
            // line 258
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentComments"]) || array_key_exists("recentComments", $context) ? $context["recentComments"] : (function () { throw new RuntimeError('Variable "recentComments" does not exist.', 258, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 259
                yield "                        <div class=\"d-flex mb-3 pb-3 border-bottom\">
                            <div class=\"flex-shrink-0\">
                                <div class=\"bg-secondary rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 40px; height: 40px;\">
                                    <i class=\"fas fa-user text-white\"></i>
                                </div>
                            </div>
                            <div class=\"flex-grow-1 ms-3\">
                                <div class=\"fw-bold\">";
                // line 266
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", false, false, false, 266), "html", null, true);
                yield "</div>
                                <div class=\"text-muted small\">";
                // line 267
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "createdAt", [], "any", false, false, false, 267), "d/m/Y H:i"), "html", null, true);
                yield "</div>
                                <div class=\"mt-1\">";
                // line 268
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 268)) > 80)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 268), 0, 80) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 268), "html", null, true)));
                yield "</div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 272
            yield "                ";
        }
        // line 273
        yield "            </div>
        </div>
    </div>
</div>

<!-- Activité récente -->
<div class=\"row mt-4\">
    <!-- Utilisateurs récents -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Utilisateurs récents</h6>
                <a href=\"";
        // line 285
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                ";
        // line 290
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recentUsers"]) || array_key_exists("recentUsers", $context) ? $context["recentUsers"] : (function () { throw new RuntimeError('Variable "recentUsers" does not exist.', 290, $this->source); })()))) {
            // line 291
            yield "                    <p class=\"text-muted text-center\">Aucun utilisateur récent</p>
                ";
        } else {
            // line 293
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentUsers"]) || array_key_exists("recentUsers", $context) ? $context["recentUsers"] : (function () { throw new RuntimeError('Variable "recentUsers" does not exist.', 293, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 294
                yield "                        <div class=\"d-flex mb-2 pb-2 border-bottom\">
                            <div class=\"flex-shrink-0\">
                                <div class=\"bg-info rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 35px; height: 35px; font-size: 12px;\">
                                    <span class=\"text-white fw-bold\">";
                // line 297
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 297), 0, 1)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 297), 0, 1)), "html", null, true);
                yield "</span>
                                </div>
                            </div>
                            <div class=\"flex-grow-1 ms-3\">
                                <div class=\"fw-bold small\">
                                    <a href=\"";
                // line 302
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 302)]), "html", null, true);
                yield "\" class=\"text-decoration-none\">
                                        ";
                // line 303
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "displayName", [], "any", false, false, false, 303), "html", null, true);
                yield "
                                    </a>
                                </div>
                                <div class=\"text-muted small\">";
                // line 306
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 306), "html", null, true);
                yield "</div>
                                <div class=\"text-muted small\">";
                // line 307
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "createdAt", [], "any", false, false, false, 307), "d/m/Y"), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 311
            yield "                ";
        }
        // line 312
        yield "            </div>
        </div>
    </div>
    
    <!-- Catégories récentes -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Catégories récentes</h6>
                <a href=\"";
        // line 321
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index");
        yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                ";
        // line 326
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recentCategories"]) || array_key_exists("recentCategories", $context) ? $context["recentCategories"] : (function () { throw new RuntimeError('Variable "recentCategories" does not exist.', 326, $this->source); })()))) {
            // line 327
            yield "                    <p class=\"text-muted text-center\">Aucune catégorie récente</p>
                ";
        } else {
            // line 329
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentCategories"]) || array_key_exists("recentCategories", $context) ? $context["recentCategories"] : (function () { throw new RuntimeError('Variable "recentCategories" does not exist.', 329, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 330
                yield "                        ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 330, $this->source); })())], "method", false, false, false, 330);
                // line 331
                yield "                        <div class=\"d-flex mb-2 pb-2 border-bottom align-items-center\">
                            <div class=\"flex-shrink-0\">
                                ";
                // line 333
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "color", [], "any", false, false, false, 333)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 334
                    yield "                                    <span class=\"badge me-2\" style=\"background-color: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "color", [], "any", false, false, false, 334), "html", null, true);
                    yield "; width: 20px; height: 20px; border-radius: 50%;\"></span>
                                ";
                } else {
                    // line 336
                    yield "                                    <i class=\"fas fa-folder text-muted me-2\"></i>
                                ";
                }
                // line 338
                yield "                            </div>
                            <div class=\"flex-grow-1\">
                                <div class=\"fw-bold small\">
                                    <a href=\"";
                // line 341
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 341)]), "html", null, true);
                yield "\" class=\"text-decoration-none\">
                                        ";
                // line 342
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 342, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 342, $this->source); })()), "name", [], "any", false, false, false, 342), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 342)), "html", null, true)));
                yield "
                                    </a>
                                </div>
                                <div class=\"text-muted small\">";
                // line 345
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "postCount", [], "any", false, false, false, 345), "html", null, true);
                yield " article";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["category"], "postCount", [], "any", false, false, false, 345) > 1)) ? ("s") : (""));
                yield "</div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 349
            yield "                ";
        }
        // line 350
        yield "            </div>
        </div>
    </div>
    
    <!-- Menus récents -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Menus récents</h6>
                <a href=\"";
        // line 359
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
        yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                ";
        // line 364
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recentMenus"]) || array_key_exists("recentMenus", $context) ? $context["recentMenus"] : (function () { throw new RuntimeError('Variable "recentMenus" does not exist.', 364, $this->source); })()))) {
            // line 365
            yield "                    <p class=\"text-muted text-center\">Aucun menu récent</p>
                ";
        } else {
            // line 367
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentMenus"]) || array_key_exists("recentMenus", $context) ? $context["recentMenus"] : (function () { throw new RuntimeError('Variable "recentMenus" does not exist.', 367, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                // line 368
                yield "                        ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["menu"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 368, $this->source); })())], "method", false, false, false, 368);
                // line 369
                yield "                        <div class=\"d-flex mb-2 pb-2 border-bottom align-items-center\">
                            <div class=\"flex-shrink-0\">
                                <i class=\"fas fa-bars text-primary me-2\"></i>
                            </div>
                            <div class=\"flex-grow-1\">
                                <div class=\"fw-bold small\">
                                    <a href=\"";
                // line 375
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["menu"], "id", [], "any", false, false, false, 375)]), "html", null, true);
                yield "\" class=\"text-decoration-none\">
                                        ";
                // line 376
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 376, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 376, $this->source); })()), "title", [], "any", false, false, false, 376), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["menu"], "generateDefaultTitle", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 376, $this->source); })())], "method", false, false, false, 376), "html", null, true)));
                yield "
                                    </a>
                                    ";
                // line 378
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["menu"], "isActive", [], "any", false, false, false, 378)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 379
                    yield "                                        <span class=\"badge bg-secondary ms-1\">Inactif</span>
                                    ";
                }
                // line 381
                yield "                                </div>
                                <div class=\"text-muted small\">";
                // line 382
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["menu"], "location", [], "any", false, false, false, 382)), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["menu"], "type", [], "any", false, false, false, 382)), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['menu'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 386
            yield "                ";
        }
        // line 387
        yield "            </div>
        </div>
    </div>
</div>

<!-- Graphiques avec Chart.js -->
<div class=\"row mt-4\">
    <!-- Graphique de tendances du contenu -->
    <div class=\"col-xl-8 col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header py-3\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Évolution du contenu</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"chart-container\">
                    <canvas id=\"contentTrendChart\"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Graphique de répartition des rôles -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Répartition des utilisateurs</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"chart-container\">
                    <canvas id=\"userRolesChart\"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// Données pour les graphiques
const contentData = {
    articles: ";
        // line 428
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 428, $this->source); })()), "posts", [], "any", false, false, false, 428), "total", [], "any", false, false, false, 428), "html", null, true);
        yield ",
    pages: ";
        // line 429
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 429, $this->source); })()), "pages", [], "any", false, false, false, 429), "total", [], "any", false, false, false, 429), "html", null, true);
        yield ",
    comments: ";
        // line 430
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 430, $this->source); })()), "comments", [], "any", false, false, false, 430), "total", [], "any", false, false, false, 430), "html", null, true);
        yield ",
    categories: ";
        // line 431
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 431, $this->source); })()), "categories", [], "any", false, false, false, 431), "total", [], "any", false, false, false, 431), "html", null, true);
        yield ",
    tags: ";
        // line 432
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 432, $this->source); })()), "tags", [], "any", false, false, false, 432), "total", [], "any", false, false, false, 432), "html", null, true);
        yield ",
    menus: ";
        // line 433
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 433, $this->source); })()), "menus", [], "any", false, false, false, 433), "total", [], "any", false, false, false, 433), "html", null, true);
        yield "
};

// Graphique de tendances du contenu
const ctxContent = document.getElementById('contentTrendChart').getContext('2d');
const contentTrendChart = new Chart(ctxContent, {
    type: 'bar',
    data: {
        labels: ['Articles', 'Pages', 'Commentaires', 'Catégories', 'Tags', 'Menus'],
        datasets: [{
            label: 'Nombre d\\'éléments',
            data: [
                contentData.articles,
                contentData.pages,
                contentData.comments,
                contentData.categories,
                contentData.tags,
                contentData.menus
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#f6c23e',
                '#6c757d',
                '#e74a3b',
                '#36b9cc'
            ],
            borderColor: [
                '#3a5fcd',
                '#17a673',
                '#e6b32e',
                '#5a6268',
                '#d63031',
                '#2db3cc'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Graphique de répartition des utilisateurs (données simulées pour l'exemple)
const ctxUsers = document.getElementById('userRolesChart').getContext('2d');
const userRolesChart = new Chart(ctxUsers, {
    type: 'doughnut',
    data: {
        labels: ['Administrateurs', 'Éditeurs', 'Auteurs', 'Autres'],
        datasets: [{
            data: [2, 1, 1, Math.max(0, ";
        // line 494
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 494, $this->source); })()), "users", [], "any", false, false, false, 494), "total", [], "any", false, false, false, 494), "html", null, true);
        yield " - 4)],
            backgroundColor: [
                '#e74a3b',
                '#f6c23e',
                '#1cc88a',
                '#6c757d'
            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
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
        return "admin/dashboard.html.twig";
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
        return array (  867 => 494,  803 => 433,  799 => 432,  795 => 431,  791 => 430,  787 => 429,  783 => 428,  740 => 387,  737 => 386,  725 => 382,  722 => 381,  718 => 379,  716 => 378,  711 => 376,  707 => 375,  699 => 369,  696 => 368,  691 => 367,  687 => 365,  685 => 364,  677 => 359,  666 => 350,  663 => 349,  651 => 345,  645 => 342,  641 => 341,  636 => 338,  632 => 336,  626 => 334,  624 => 333,  620 => 331,  617 => 330,  612 => 329,  608 => 327,  606 => 326,  598 => 321,  587 => 312,  584 => 311,  574 => 307,  570 => 306,  564 => 303,  560 => 302,  551 => 297,  546 => 294,  541 => 293,  537 => 291,  535 => 290,  527 => 285,  513 => 273,  510 => 272,  500 => 268,  496 => 267,  492 => 266,  483 => 259,  478 => 258,  474 => 256,  472 => 255,  464 => 250,  453 => 241,  447 => 237,  438 => 234,  434 => 233,  428 => 230,  423 => 229,  418 => 228,  414 => 227,  406 => 222,  402 => 221,  398 => 219,  395 => 218,  391 => 217,  378 => 206,  374 => 204,  372 => 203,  364 => 198,  342 => 179,  337 => 177,  314 => 157,  291 => 137,  270 => 119,  265 => 117,  241 => 96,  236 => 94,  215 => 76,  210 => 74,  187 => 56,  182 => 54,  159 => 36,  154 => 34,  143 => 25,  130 => 24,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Tableau de bord{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .border-left-dark {
            border-left: 0.25rem solid #6c757d !important;
        }
        .border-left-light {
            border-left: 0.25rem solid #f8f9fa !important;
        }
        .border-left-secondary {
            border-left: 0.25rem solid #6c757d !important;
        }
        .chart-container {
            position: relative;
            height: 300px;
        }
    </style>
{% endblock %}

{% block admin_content %}
<!-- Première ligne de statistiques -->
<div class=\"row admin-stats mb-4\">
    <!-- Statistiques des articles -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Articles</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.posts.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            {{ stats.posts.published }} publiés, {{ stats.posts.drafts }} brouillons
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-edit fa-2x text-primary\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des pages -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-success h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">Pages</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.pages.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            {{ stats.pages.published }} publiées, {{ stats.pages.drafts }} brouillons
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-file-alt fa-2x text-success\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des commentaires -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-warning h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-warning text-uppercase mb-1\">Commentaires</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.comments.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            {{ stats.comments.pending }} en attente
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-comments fa-2x text-warning\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des médias -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-info h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-info text-uppercase mb-1\">Médias</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.media.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            {{ (stats.media.totalSize / 1024 / 1024)|number_format(1) }} MB utilisés
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-images fa-2x text-info\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deuxième ligne de statistiques -->
<div class=\"row admin-stats mb-4\">
    <!-- Statistiques des utilisateurs -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-dark h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-dark text-uppercase mb-1\">Utilisateurs</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.users.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            {{ stats.users.active }} actifs
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-users fa-2x text-dark\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des catégories -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-secondary h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-secondary text-uppercase mb-1\">Catégories</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.categories.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            Organisation du contenu
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-folder fa-2x text-secondary\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des tags -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-light h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-muted text-uppercase mb-1\">Tags</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.tags.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            Étiquetage du contenu
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-tags fa-2x text-muted\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistiques des menus -->
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary h-100\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Menus</div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ stats.menus.total }}</div>
                        <div class=\"text-xs text-muted mt-1\">
                            {{ stats.menus.active }} actifs
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-bars fa-2x text-primary\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenu récent -->
<div class=\"row\">
    <!-- Articles récents -->
    <div class=\"col-xl-8 col-lg-7\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Articles récents</h6>
                <a href=\"{{ path('admin_posts_index') }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                {% if recentPosts is empty %}
                    <p class=\"text-muted text-center\">Aucun article récent</p>
                {% else %}
                    <div class=\"table-responsive\">
                        <table class=\"table table-sm\">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for post in recentPosts %}
                                    {% set translation = post.getTranslationForLanguage(currentLanguage) %}
                                    <tr>
                                        <td>
                                            <a href=\"{{ path('admin_posts_edit', {'id': post.id}) }}\" class=\"text-decoration-none\">
                                                {{ translation ? translation.title : 'Article #' ~ post.id }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class=\"badge status-badge 
                                                {% if post.status == 'published' %}bg-success
                                                {% elseif post.status == 'draft' %}bg-secondary
                                                {% else %}bg-warning{% endif %}\">
                                                {{ post.status|title }}
                                            </span>
                                        </td>
                                        <td>{{ post.author.displayName }}</td>
                                        <td>{{ post.createdAt|date('d/m/Y') }}</td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                {% endif %}
            </div>
        </div>
    </div>
    
    <!-- Commentaires récents -->
    <div class=\"col-xl-4 col-lg-5\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Commentaires récents</h6>
                <a href=\"{{ path('admin_comments_index') }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                {% if recentComments is empty %}
                    <p class=\"text-muted text-center\">Aucun commentaire récent</p>
                {% else %}
                    {% for comment in recentComments %}
                        <div class=\"d-flex mb-3 pb-3 border-bottom\">
                            <div class=\"flex-shrink-0\">
                                <div class=\"bg-secondary rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 40px; height: 40px;\">
                                    <i class=\"fas fa-user text-white\"></i>
                                </div>
                            </div>
                            <div class=\"flex-grow-1 ms-3\">
                                <div class=\"fw-bold\">{{ comment.authorName }}</div>
                                <div class=\"text-muted small\">{{ comment.createdAt|date('d/m/Y H:i') }}</div>
                                <div class=\"mt-1\">{{ comment.content|length > 80 ? comment.content|slice(0, 80) ~ '...' : comment.content }}</div>
                            </div>
                        </div>
                    {% endfor %}
                {% endif %}
            </div>
        </div>
    </div>
</div>

<!-- Activité récente -->
<div class=\"row mt-4\">
    <!-- Utilisateurs récents -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Utilisateurs récents</h6>
                <a href=\"{{ path('admin_users_index') }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                {% if recentUsers is empty %}
                    <p class=\"text-muted text-center\">Aucun utilisateur récent</p>
                {% else %}
                    {% for user in recentUsers %}
                        <div class=\"d-flex mb-2 pb-2 border-bottom\">
                            <div class=\"flex-shrink-0\">
                                <div class=\"bg-info rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 35px; height: 35px; font-size: 12px;\">
                                    <span class=\"text-white fw-bold\">{{ user.firstName|slice(0, 1)|upper }}{{ user.lastName|slice(0, 1)|upper }}</span>
                                </div>
                            </div>
                            <div class=\"flex-grow-1 ms-3\">
                                <div class=\"fw-bold small\">
                                    <a href=\"{{ path('admin_users_edit', {'id': user.id}) }}\" class=\"text-decoration-none\">
                                        {{ user.displayName }}
                                    </a>
                                </div>
                                <div class=\"text-muted small\">{{ user.email }}</div>
                                <div class=\"text-muted small\">{{ user.createdAt|date('d/m/Y') }}</div>
                            </div>
                        </div>
                    {% endfor %}
                {% endif %}
            </div>
        </div>
    </div>
    
    <!-- Catégories récentes -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Catégories récentes</h6>
                <a href=\"{{ path('admin_categories_index') }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                {% if recentCategories is empty %}
                    <p class=\"text-muted text-center\">Aucune catégorie récente</p>
                {% else %}
                    {% for category in recentCategories %}
                        {% set translation = category.getTranslationForLanguage(currentLanguage) %}
                        <div class=\"d-flex mb-2 pb-2 border-bottom align-items-center\">
                            <div class=\"flex-shrink-0\">
                                {% if category.color %}
                                    <span class=\"badge me-2\" style=\"background-color: {{ category.color }}; width: 20px; height: 20px; border-radius: 50%;\"></span>
                                {% else %}
                                    <i class=\"fas fa-folder text-muted me-2\"></i>
                                {% endif %}
                            </div>
                            <div class=\"flex-grow-1\">
                                <div class=\"fw-bold small\">
                                    <a href=\"{{ path('admin_categories_edit', {'id': category.id}) }}\" class=\"text-decoration-none\">
                                        {{ translation ? translation.name : 'Catégorie #' ~ category.id }}
                                    </a>
                                </div>
                                <div class=\"text-muted small\">{{ category.postCount }} article{{ category.postCount > 1 ? 's' : '' }}</div>
                            </div>
                        </div>
                    {% endfor %}
                {% endif %}
            </div>
        </div>
    </div>
    
    <!-- Menus récents -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3 d-flex justify-content-between align-items-center\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Menus récents</h6>
                <a href=\"{{ path('admin_menus_index') }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-eye\"></i> Voir tout
                </a>
            </div>
            <div class=\"card-body\">
                {% if recentMenus is empty %}
                    <p class=\"text-muted text-center\">Aucun menu récent</p>
                {% else %}
                    {% for menu in recentMenus %}
                        {% set translation = menu.getTranslationForLanguage(currentLanguage) %}
                        <div class=\"d-flex mb-2 pb-2 border-bottom align-items-center\">
                            <div class=\"flex-shrink-0\">
                                <i class=\"fas fa-bars text-primary me-2\"></i>
                            </div>
                            <div class=\"flex-grow-1\">
                                <div class=\"fw-bold small\">
                                    <a href=\"{{ path('admin_menus_edit', {'id': menu.id}) }}\" class=\"text-decoration-none\">
                                        {{ translation ? translation.title : menu.generateDefaultTitle(currentLanguage) }}
                                    </a>
                                    {% if not menu.isActive %}
                                        <span class=\"badge bg-secondary ms-1\">Inactif</span>
                                    {% endif %}
                                </div>
                                <div class=\"text-muted small\">{{ menu.location|title }} - {{ menu.type|title }}</div>
                            </div>
                        </div>
                    {% endfor %}
                {% endif %}
            </div>
        </div>
    </div>
</div>

<!-- Graphiques avec Chart.js -->
<div class=\"row mt-4\">
    <!-- Graphique de tendances du contenu -->
    <div class=\"col-xl-8 col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header py-3\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Évolution du contenu</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"chart-container\">
                    <canvas id=\"contentTrendChart\"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Graphique de répartition des rôles -->
    <div class=\"col-xl-4 col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header py-3\">
                <h6 class=\"m-0 font-weight-bold text-primary\">Répartition des utilisateurs</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"chart-container\">
                    <canvas id=\"userRolesChart\"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// Données pour les graphiques
const contentData = {
    articles: {{ stats.posts.total }},
    pages: {{ stats.pages.total }},
    comments: {{ stats.comments.total }},
    categories: {{ stats.categories.total }},
    tags: {{ stats.tags.total }},
    menus: {{ stats.menus.total }}
};

// Graphique de tendances du contenu
const ctxContent = document.getElementById('contentTrendChart').getContext('2d');
const contentTrendChart = new Chart(ctxContent, {
    type: 'bar',
    data: {
        labels: ['Articles', 'Pages', 'Commentaires', 'Catégories', 'Tags', 'Menus'],
        datasets: [{
            label: 'Nombre d\\'éléments',
            data: [
                contentData.articles,
                contentData.pages,
                contentData.comments,
                contentData.categories,
                contentData.tags,
                contentData.menus
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#f6c23e',
                '#6c757d',
                '#e74a3b',
                '#36b9cc'
            ],
            borderColor: [
                '#3a5fcd',
                '#17a673',
                '#e6b32e',
                '#5a6268',
                '#d63031',
                '#2db3cc'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Graphique de répartition des utilisateurs (données simulées pour l'exemple)
const ctxUsers = document.getElementById('userRolesChart').getContext('2d');
const userRolesChart = new Chart(ctxUsers, {
    type: 'doughnut',
    data: {
        labels: ['Administrateurs', 'Éditeurs', 'Auteurs', 'Autres'],
        datasets: [{
            data: [2, 1, 1, Math.max(0, {{ stats.users.total }} - 4)],
            backgroundColor: [
                '#e74a3b',
                '#f6c23e',
                '#1cc88a',
                '#6c757d'
            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
{% endblock %}", "admin/dashboard.html.twig", "/workspace/symfpress/templates/admin/dashboard.html.twig");
    }
}
