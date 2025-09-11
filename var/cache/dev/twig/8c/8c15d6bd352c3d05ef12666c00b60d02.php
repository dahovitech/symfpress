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

/* admin/pages/index.html.twig */
class __TwigTemplate_e59d29dea80ad24b9f320f43246f85b6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/pages/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/pages/index.html.twig"));

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

        yield "Pages";
        
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
        <li class=\"breadcrumb-item active\">Pages</li>
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
    <h2>Pages</h2>
    <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_new");
        yield "\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus\"></i> Nouvelle page
    </a>
</div>

<!-- Sélecteur de langue -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <label class=\"form-label mb-0\">Langue d'affichage :</label>
                <div class=\"dropdown d-inline-block ms-2\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-globe me-1\"></i> ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 30, $this->source); })()), "name", [], "any", false, false, false, 30), "html", null, true);
        yield "
                    </button>
                    <ul class=\"dropdown-menu\">
                        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 33, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 34
            yield "                            <li>
                                <a class=\"dropdown-item ";
            // line 35
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 35, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                                   href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_index", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 36)]), "html", null, true);
            yield "\">
                                    ";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 37), "html", null, true);
            yield "
                                </a>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        yield "                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des pages -->
<div class=\"card\">
    <div class=\"card-body\">
        ";
        // line 51
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 51, $this->source); })()))) {
            // line 52
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-file-alt fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucune page trouvée</h5>
                <p class=\"text-muted\">Commencez par créer votre première page.</p>
                <a href=\"";
            // line 56
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_new");
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer une page
                </a>
            </div>
        ";
        } else {
            // line 61
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Statut</th>
                            <th>Template</th>
                            <th>Ordre</th>
                            <th>Date</th>
                            <th width=\"200\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 75
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 75, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 76
                yield "                            ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 76, $this->source); })())], "method", false, false, false, 76);
                // line 77
                yield "                            ";
                $context["level"] = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "getLevel", [], "method", false, false, false, 77);
                // line 78
                yield "                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        ";
                // line 81
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "featuredImage", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 82
                    yield "                                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["page"], "featuredImage", [], "any", false, false, false, 82), "url", [], "any", false, false, false, 82), "html", null, true);
                    yield "\" alt=\"\" class=\"rounded me-2\" style=\"width: 40px; height: 40px; object-fit: cover;\">
                                        ";
                }
                // line 84
                yield "                                        <div>
                                            ";
                // line 85
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(0, (isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 85, $this->source); })())));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 86
                    yield "                                                ";
                    if (($context["i"] > 0)) {
                        yield "<span class=\"text-muted\">— </span>";
                    }
                    // line 87
                    yield "                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 88
                yield "                                            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 88)]), "html", null, true);
                yield "\" class=\"text-decoration-none fw-bold\">
                                                ";
                // line 89
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 89, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 89, $this->source); })()), "title", [], "any", false, false, false, 89), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Page #" . CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 89)), "html", null, true)));
                yield "
                                            </a>
                                            ";
                // line 91
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "parent", [], "any", false, false, false, 91)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 92
                    yield "                                                <div class=\"text-muted small\">Parent: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["page"], "parent", [], "any", false, false, false, 92), "getDisplayTitle", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 92, $this->source); })())], "method", false, false, false, 92), "html", null, true);
                    yield "</div>
                                            ";
                }
                // line 94
                yield "                                        </div>
                                    </div>
                                </td>
                                <td>";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["page"], "author", [], "any", false, false, false, 97), "displayName", [], "any", false, false, false, 97), "html", null, true);
                yield "</td>
                                <td>
                                    <span class=\"badge status-badge 
                                        ";
                // line 100
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "status", [], "any", false, false, false, 100) == "published")) {
                    yield "bg-success
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 101
$context["page"], "status", [], "any", false, false, false, 101) == "draft")) {
                    yield "bg-secondary
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 102
$context["page"], "status", [], "any", false, false, false, 102) == "private")) {
                    yield "bg-warning
                                        ";
                } else {
                    // line 103
                    yield "bg-danger";
                }
                yield "\">
                                        ";
                // line 104
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "status", [], "any", false, false, false, 104) == "published")) {
                    yield "Publié
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 105
$context["page"], "status", [], "any", false, false, false, 105) == "draft")) {
                    yield "Brouillon
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 106
$context["page"], "status", [], "any", false, false, false, 106) == "private")) {
                    yield "Privé
                                        ";
                } else {
                    // line 107
                    yield "Corbeille";
                }
                // line 108
                yield "                                    </span>
                                </td>
                                <td>
                                    <span class=\"badge bg-light text-dark\">";
                // line 111
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["page"], "template", [], "any", false, false, false, 111)), "html", null, true);
                yield "</span>
                                </td>
                                <td>";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "menuOrder", [], "any", false, false, false, 113), "html", null, true);
                yield "</td>
                                <td>
                                    <div>";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "createdAt", [], "any", false, false, false, 115), "d/m/Y"), "html", null, true);
                yield "</div>
                                    ";
                // line 116
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "publishedAt", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 117
                    yield "                                        <small class=\"text-muted\">Publié le ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "publishedAt", [], "any", false, false, false, 117), "d/m/Y"), "html", null, true);
                    yield "</small>
                                    ";
                }
                // line 119
                yield "                                </td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"";
                // line 122
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 122)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        ";
                // line 126
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "status", [], "any", false, false, false, 126) == "published")) {
                    // line 127
                    yield "                                            <a href=\"#\" class=\"btn btn-sm btn-outline-info\" title=\"Voir (Frontend à venir)\" onclick=\"alert('Interface frontend en cours de développement')\">
                                                <i class=\"fas fa-eye\"></i>
                                            </a>
                                        ";
                }
                // line 131
                yield "                                        
                                        ";
                // line 132
                if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 133
                    yield "                                        <form method=\"POST\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 133)]), "html", null, true);
                    yield "\" class=\"d-inline\" 
                                              onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette page ?')\">
                                            <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 135
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 135))), "html", null, true);
                    yield "\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\" title=\"Supprimer\">
                                                <i class=\"fas fa-trash\"></i>
                                            </button>
                                        </form>
                                        ";
                }
                // line 141
                yield "                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 145
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 149
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
        return "admin/pages/index.html.twig";
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
        return array (  415 => 149,  409 => 145,  400 => 141,  391 => 135,  385 => 133,  383 => 132,  380 => 131,  374 => 127,  372 => 126,  365 => 122,  360 => 119,  354 => 117,  352 => 116,  348 => 115,  343 => 113,  338 => 111,  333 => 108,  330 => 107,  325 => 106,  321 => 105,  317 => 104,  312 => 103,  307 => 102,  303 => 101,  299 => 100,  293 => 97,  288 => 94,  282 => 92,  280 => 91,  275 => 89,  270 => 88,  264 => 87,  259 => 86,  255 => 85,  252 => 84,  246 => 82,  244 => 81,  239 => 78,  236 => 77,  233 => 76,  229 => 75,  213 => 61,  205 => 56,  199 => 52,  197 => 51,  185 => 41,  175 => 37,  171 => 36,  167 => 35,  164 => 34,  160 => 33,  154 => 30,  138 => 17,  134 => 15,  121 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Pages{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Pages</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2>Pages</h2>
    <a href=\"{{ path('admin_pages_new') }}\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus\"></i> Nouvelle page
    </a>
</div>

<!-- Sélecteur de langue -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <label class=\"form-label mb-0\">Langue d'affichage :</label>
                <div class=\"dropdown d-inline-block ms-2\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-globe me-1\"></i> {{ currentLanguage.name }}
                    </button>
                    <ul class=\"dropdown-menu\">
                        {% for language in availableLanguages %}
                            <li>
                                <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                   href=\"{{ path('admin_pages_index', {'language': language.code}) }}\">
                                    {{ language.name }}
                                </a>
                            </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des pages -->
<div class=\"card\">
    <div class=\"card-body\">
        {% if pages is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-file-alt fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucune page trouvée</h5>
                <p class=\"text-muted\">Commencez par créer votre première page.</p>
                <a href=\"{{ path('admin_pages_new') }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer une page
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
                            <th>Template</th>
                            <th>Ordre</th>
                            <th>Date</th>
                            <th width=\"200\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for page in pages %}
                            {% set translation = page.getTranslationForLanguage(currentLanguage) %}
                            {% set level = page.getLevel() %}
                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        {% if page.featuredImage %}
                                            <img src=\"{{ page.featuredImage.url }}\" alt=\"\" class=\"rounded me-2\" style=\"width: 40px; height: 40px; object-fit: cover;\">
                                        {% endif %}
                                        <div>
                                            {% for i in 0..level %}
                                                {% if i > 0 %}<span class=\"text-muted\">— </span>{% endif %}
                                            {% endfor %}
                                            <a href=\"{{ path('admin_pages_edit', {'id': page.id}) }}\" class=\"text-decoration-none fw-bold\">
                                                {{ translation ? translation.title : 'Page #' ~ page.id }}
                                            </a>
                                            {% if page.parent %}
                                                <div class=\"text-muted small\">Parent: {{ page.parent.getDisplayTitle(currentLanguage) }}</div>
                                            {% endif %}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ page.author.displayName }}</td>
                                <td>
                                    <span class=\"badge status-badge 
                                        {% if page.status == 'published' %}bg-success
                                        {% elseif page.status == 'draft' %}bg-secondary
                                        {% elseif page.status == 'private' %}bg-warning
                                        {% else %}bg-danger{% endif %}\">
                                        {% if page.status == 'published' %}Publié
                                        {% elseif page.status == 'draft' %}Brouillon
                                        {% elseif page.status == 'private' %}Privé
                                        {% else %}Corbeille{% endif %}
                                    </span>
                                </td>
                                <td>
                                    <span class=\"badge bg-light text-dark\">{{ page.template|title }}</span>
                                </td>
                                <td>{{ page.menuOrder }}</td>
                                <td>
                                    <div>{{ page.createdAt|date('d/m/Y') }}</div>
                                    {% if page.publishedAt %}
                                        <small class=\"text-muted\">Publié le {{ page.publishedAt|date('d/m/Y') }}</small>
                                    {% endif %}
                                </td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"{{ path('admin_pages_edit', {'id': page.id}) }}\" class=\"btn btn-sm btn-outline-primary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        {% if page.status == 'published' %}
                                            <a href=\"#\" class=\"btn btn-sm btn-outline-info\" title=\"Voir (Frontend à venir)\" onclick=\"alert('Interface frontend en cours de développement')\">
                                                <i class=\"fas fa-eye\"></i>
                                            </a>
                                        {% endif %}
                                        
                                        {% if is_granted('ROLE_EDITOR') %}
                                        <form method=\"POST\" action=\"{{ path('admin_pages_delete', {'id': page.id}) }}\" class=\"d-inline\" 
                                              onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette page ?')\">
                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ page.id) }}\">
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
{% endblock %}
", "admin/pages/index.html.twig", "/workspace/symfpress/templates/admin/pages/index.html.twig");
    }
}
