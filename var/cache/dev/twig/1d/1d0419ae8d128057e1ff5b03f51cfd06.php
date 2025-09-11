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

/* admin/posts/index.html.twig */
class __TwigTemplate_71393e214953a623cd3a5b5f98e956ea extends Template
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
            'breadcrumb' => [$this, 'block_breadcrumb'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/posts/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/posts/index.html.twig"));

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

        yield "Articles";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_breadcrumb(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumb"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumb"));

        // line 6
        yield "<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Articles</li>
    </ol>
</nav>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 14
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

        // line 15
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2>Articles</h2>
    <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_new");
        yield "\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus\"></i> Nouvel article
    </a>
</div>

<!-- Filtres -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"GET\" class=\"row g-3\">
            <div class=\"col-md-3\">
                <select name=\"status\" class=\"form-select\">
                    <option value=\"\">Tous les statuts</option>
                    <option value=\"published\" ";
        // line 29
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 29, $this->source); })()) == "published")) ? ("selected") : (""));
        yield ">Publié</option>
                    <option value=\"draft\" ";
        // line 30
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 30, $this->source); })()) == "draft")) ? ("selected") : (""));
        yield ">Brouillon</option>
                    <option value=\"scheduled\" ";
        // line 31
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 31, $this->source); })()) == "scheduled")) ? ("selected") : (""));
        yield ">Programmé</option>
                    <option value=\"private\" ";
        // line 32
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 32, $this->source); })()) == "private")) ? ("selected") : (""));
        yield ">Privé</option>
                    <option value=\"trash\" ";
        // line 33
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 33, $this->source); })()) == "trash")) ? ("selected") : (""));
        yield ">Corbeille</option>
                </select>
            </div>
            <div class=\"col-md-6\">
                <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Rechercher...\" value=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentSearch"]) || array_key_exists("currentSearch", $context) ? $context["currentSearch"] : (function () { throw new RuntimeError('Variable "currentSearch" does not exist.', 37, $this->source); })()), "html", null, true);
        yield "\">
            </div>
            <div class=\"col-md-3\">
                <button type=\"submit\" class=\"btn btn-outline-primary\">Filtrer</button>
                <a href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_index");
        yield "\" class=\"btn btn-outline-secondary\">Réinitialiser</a>
            </div>
        </form>
    </div>
</div>

<!-- Liste des articles -->
<div class=\"card\">
    <div class=\"card-body\">
        ";
        // line 50
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 50, $this->source); })()))) {
            // line 51
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-edit fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun article trouvé</h5>
                <p class=\"text-muted\">Commencez par créer votre premier article.</p>
                <a href=\"";
            // line 55
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_new");
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un article
                </a>
            </div>
        ";
        } else {
            // line 60
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Vues</th>
                            <th width=\"200\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 73, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 74
                yield "                            ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 74, $this->source); })())], "method", false, false, false, 74);
                // line 75
                yield "                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        ";
                // line 78
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 78)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 79
                    yield "                                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 79), "url", [], "any", false, false, false, 79), "html", null, true);
                    yield "\" alt=\"\" class=\"rounded me-2\" style=\"width: 40px; height: 40px; object-fit: cover;\">
                                        ";
                }
                // line 81
                yield "                                        <div>
                                            <a href=\"";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 82)]), "html", null, true);
                yield "\" class=\"text-decoration-none fw-bold\">
                                                ";
                // line 83
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 83, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 83, $this->source); })()), "title", [], "any", false, false, false, 83), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Article #" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 83)), "html", null, true)));
                yield "
                                            </a>
                                            ";
                // line 85
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isFeatured", [], "any", false, false, false, 85)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 86
                    yield "                                                <span class=\"badge bg-warning ms-2\">Vedette</span>
                                            ";
                }
                // line 88
                yield "                                        </div>
                                    </div>
                                </td>
                                <td>";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 91), "displayName", [], "any", false, false, false, 91), "html", null, true);
                yield "</td>
                                <td>
                                    <span class=\"badge status-badge 
                                        ";
                // line 94
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 94) == "published")) {
                    yield "bg-success
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 95
$context["post"], "status", [], "any", false, false, false, 95) == "draft")) {
                    yield "bg-secondary
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 96
$context["post"], "status", [], "any", false, false, false, 96) == "scheduled")) {
                    yield "bg-info
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 97
$context["post"], "status", [], "any", false, false, false, 97) == "private")) {
                    yield "bg-warning
                                        ";
                } else {
                    // line 98
                    yield "bg-danger";
                }
                yield "\">
                                        ";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 99)), "html", null, true);
                yield "
                                    </span>
                                </td>
                                <td>
                                    <div>";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 103), "d/m/Y"), "html", null, true);
                yield "</div>
                                    ";
                // line 104
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 104)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 105
                    yield "                                        <small class=\"text-muted\">Publié le ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 105), "d/m/Y"), "html", null, true);
                    yield "</small>
                                    ";
                }
                // line 107
                yield "                                </td>
                                <td>";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "viewCount", [], "any", false, false, false, 108), "html", null, true);
                yield "</td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"";
                // line 111
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 111)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        ";
                // line 115
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 115) == "published")) {
                    // line 116
                    yield "                                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 116)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-outline-info\" title=\"Voir\" target=\"_blank\">
                                                <i class=\"fas fa-eye\"></i>
                                            </a>
                                        ";
                }
                // line 120
                yield "                                        
                                        <form method=\"POST\" action=\"";
                // line 121
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_toggle_status", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 121)]), "html", null, true);
                yield "\" class=\"d-inline\">
                                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 122
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("toggle" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 122))), "html", null, true);
                yield "\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-";
                // line 123
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 123) == "published")) ? ("warning") : ("success"));
                yield "\" 
                                                    title=\"";
                // line 124
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 124) == "published")) ? ("Dépublier") : ("Publier"));
                yield "\">
                                                <i class=\"fas fa-";
                // line 125
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 125) == "published")) ? ("pause") : ("play"));
                yield "\"></i>
                                            </button>
                                        </form>
                                        
                                        ";
                // line 129
                if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 130
                    yield "                                        <form method=\"POST\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 130)]), "html", null, true);
                    yield "\" class=\"d-inline\" 
                                              onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')\">
                                            <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 132
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 132))), "html", null, true);
                    yield "\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\" title=\"Supprimer\">
                                                <i class=\"fas fa-trash\"></i>
                                            </button>
                                        </form>
                                        ";
                }
                // line 138
                yield "                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 142
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 146
        yield "    </div>
</div>
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
        return "admin/posts/index.html.twig";
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
        return array (  400 => 146,  394 => 142,  385 => 138,  376 => 132,  370 => 130,  368 => 129,  361 => 125,  357 => 124,  353 => 123,  349 => 122,  345 => 121,  342 => 120,  334 => 116,  332 => 115,  325 => 111,  319 => 108,  316 => 107,  310 => 105,  308 => 104,  304 => 103,  297 => 99,  292 => 98,  287 => 97,  283 => 96,  279 => 95,  275 => 94,  269 => 91,  264 => 88,  260 => 86,  258 => 85,  253 => 83,  249 => 82,  246 => 81,  240 => 79,  238 => 78,  233 => 75,  230 => 74,  226 => 73,  211 => 60,  203 => 55,  197 => 51,  195 => 50,  183 => 41,  176 => 37,  169 => 33,  165 => 32,  161 => 31,  157 => 30,  153 => 29,  138 => 17,  134 => 15,  121 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Articles{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Articles</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2>Articles</h2>
    <a href=\"{{ path('admin_posts_new') }}\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus\"></i> Nouvel article
    </a>
</div>

<!-- Filtres -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"GET\" class=\"row g-3\">
            <div class=\"col-md-3\">
                <select name=\"status\" class=\"form-select\">
                    <option value=\"\">Tous les statuts</option>
                    <option value=\"published\" {{ currentStatus == 'published' ? 'selected' : '' }}>Publié</option>
                    <option value=\"draft\" {{ currentStatus == 'draft' ? 'selected' : '' }}>Brouillon</option>
                    <option value=\"scheduled\" {{ currentStatus == 'scheduled' ? 'selected' : '' }}>Programmé</option>
                    <option value=\"private\" {{ currentStatus == 'private' ? 'selected' : '' }}>Privé</option>
                    <option value=\"trash\" {{ currentStatus == 'trash' ? 'selected' : '' }}>Corbeille</option>
                </select>
            </div>
            <div class=\"col-md-6\">
                <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Rechercher...\" value=\"{{ currentSearch }}\">
            </div>
            <div class=\"col-md-3\">
                <button type=\"submit\" class=\"btn btn-outline-primary\">Filtrer</button>
                <a href=\"{{ path('admin_posts_index') }}\" class=\"btn btn-outline-secondary\">Réinitialiser</a>
            </div>
        </form>
    </div>
</div>

<!-- Liste des articles -->
<div class=\"card\">
    <div class=\"card-body\">
        {% if posts is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-edit fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun article trouvé</h5>
                <p class=\"text-muted\">Commencez par créer votre premier article.</p>
                <a href=\"{{ path('admin_posts_new') }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un article
                </a>
            </div>
        {% else %}
            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Vues</th>
                            <th width=\"200\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for post in posts %}
                            {% set translation = post.getTranslationForLanguage(currentLanguage) %}
                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        {% if post.featuredImage %}
                                            <img src=\"{{ post.featuredImage.url }}\" alt=\"\" class=\"rounded me-2\" style=\"width: 40px; height: 40px; object-fit: cover;\">
                                        {% endif %}
                                        <div>
                                            <a href=\"{{ path('admin_posts_edit', {'id': post.id}) }}\" class=\"text-decoration-none fw-bold\">
                                                {{ translation ? translation.title : 'Article #' ~ post.id }}
                                            </a>
                                            {% if post.isFeatured %}
                                                <span class=\"badge bg-warning ms-2\">Vedette</span>
                                            {% endif %}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ post.author.displayName }}</td>
                                <td>
                                    <span class=\"badge status-badge 
                                        {% if post.status == 'published' %}bg-success
                                        {% elseif post.status == 'draft' %}bg-secondary
                                        {% elseif post.status == 'scheduled' %}bg-info
                                        {% elseif post.status == 'private' %}bg-warning
                                        {% else %}bg-danger{% endif %}\">
                                        {{ post.status|title }}
                                    </span>
                                </td>
                                <td>
                                    <div>{{ post.createdAt|date('d/m/Y') }}</div>
                                    {% if post.publishedAt %}
                                        <small class=\"text-muted\">Publié le {{ post.publishedAt|date('d/m/Y') }}</small>
                                    {% endif %}
                                </td>
                                <td>{{ post.viewCount }}</td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"{{ path('admin_posts_edit', {'id': post.id}) }}\" class=\"btn btn-sm btn-outline-primary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        {% if post.status == 'published' %}
                                            <a href=\"{{ path('frontend_post_show', {'slug': post.slug}) }}\" class=\"btn btn-sm btn-outline-info\" title=\"Voir\" target=\"_blank\">
                                                <i class=\"fas fa-eye\"></i>
                                            </a>
                                        {% endif %}
                                        
                                        <form method=\"POST\" action=\"{{ path('admin_posts_toggle_status', {'id': post.id}) }}\" class=\"d-inline\">
                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('toggle' ~ post.id) }}\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-{{ post.status == 'published' ? 'warning' : 'success' }}\" 
                                                    title=\"{{ post.status == 'published' ? 'Dépublier' : 'Publier' }}\">
                                                <i class=\"fas fa-{{ post.status == 'published' ? 'pause' : 'play' }}\"></i>
                                            </button>
                                        </form>
                                        
                                        {% if is_granted('ROLE_EDITOR') %}
                                        <form method=\"POST\" action=\"{{ path('admin_posts_delete', {'id': post.id}) }}\" class=\"d-inline\" 
                                              onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')\">
                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ post.id) }}\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\" title=\"Supprimer\">
                                                <i class=\"fas fa-trash\"></i>
                                            </button>
                                        </form>
                                        {% endif %}
                                    </div>
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endif %}
    </div>
</div>
{% endblock %}", "admin/posts/index.html.twig", "/workspace/symfpress/templates/admin/posts/index.html.twig");
    }
}
