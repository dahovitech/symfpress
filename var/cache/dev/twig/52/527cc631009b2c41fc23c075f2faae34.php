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

/* admin/languages/index.html.twig */
class __TwigTemplate_345ee1482bec047debefbb4bf8868769 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/languages/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/languages/index.html.twig"));

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

        yield "Gestion des langues";
        
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
        <li class=\"breadcrumb-item active\">Langues</li>
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
    <h2>
        <i class=\"fas fa-language me-2\"></i>
        Gestion des langues
    </h2>
    <a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_languages_new");
        yield "\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus me-1\"></i>
        Ajouter une langue
    </a>
</div>

";
        // line 26
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 26, $this->source); })()))) {
            // line 27
            yield "    <div class=\"alert alert-info\">
        <h5><i class=\"fas fa-info-circle me-2\"></i>Aucune langue configurée</h5>
        <p class=\"mb-0\">Ajoutez votre première langue pour commencer à utiliser le système multilingue de SymfPress.</p>
    </div>
";
        } else {
            // line 32
            yield "    <div class=\"card\">
        <div class=\"card-header\">
            <h5 class=\"mb-0\">Langues disponibles (";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 34, $this->source); })())), "html", null, true);
            yield ")</h5>
        </div>
        <div class=\"card-body p-0\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Statut</th>
                            <th>Par défaut</th>
                            <th>Contenu</th>
                            <th class=\"text-end\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 50, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 51
                yield "                            <tr>
                                <td>
                                    <span class=\"badge bg-secondary\">";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 53)), "html", null, true);
                yield "</span>
                                </td>
                                <td>
                                    <strong>";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 56), "html", null, true);
                yield "</strong>
                                    ";
                // line 57
                if (($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 57, $this->source); })()))) {
                    // line 58
                    yield "                                        <small class=\"text-muted\">(actuelle)</small>
                                    ";
                }
                // line 60
                yield "                                </td>
                                <td>
                                    ";
                // line 62
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isActive", [], "any", false, false, false, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 63
                    yield "                                        <span class=\"badge bg-success\">
                                            <i class=\"fas fa-check me-1\"></i>Active
                                        </span>
                                    ";
                } else {
                    // line 67
                    yield "                                        <span class=\"badge bg-warning\">
                                            <i class=\"fas fa-pause me-1\"></i>Inactive
                                        </span>
                                    ";
                }
                // line 71
                yield "                                </td>
                                <td>
                                    ";
                // line 73
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isDefault", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 74
                    yield "                                        <span class=\"badge bg-primary\">
                                            <i class=\"fas fa-star me-1\"></i>Défaut
                                        </span>
                                    ";
                } else {
                    // line 78
                    yield "                                        <span class=\"text-muted\">-</span>
                                    ";
                }
                // line 80
                yield "                                </td>
                                <td>
                                    <small class=\"text-muted\">
                                        <i class=\"fas fa-file-alt me-1\"></i>
                                        ";
                // line 85
                yield "                                        Contenu disponible
                                    </small>
                                </td>
                                <td class=\"text-end\">
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_languages_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 90)]), "html", null, true);
                yield "\" 
                                           class=\"btn btn-outline-primary btn-sm\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        ";
                // line 95
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isDefault", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 96
                    yield "                                            <form method=\"POST\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_languages_set_default", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 96)]), "html", null, true);
                    yield "\" 
                                                  class=\"d-inline\" onsubmit=\"return confirm('Définir ";
                    // line 97
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 97), "html", null, true);
                    yield " comme langue par défaut ?')\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 98
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("set_default_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 98))), "html", null, true);
                    yield "\">
                                                <button type=\"submit\" class=\"btn btn-outline-warning btn-sm\" title=\"Définir par défaut\">
                                                    <i class=\"fas fa-star\"></i>
                                                </button>
                                            </form>
                                        ";
                }
                // line 104
                yield "                                        
                                        ";
                // line 105
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isDefault", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 106
                    yield "                                            <form method=\"POST\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_languages_toggle_active", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 106)]), "html", null, true);
                    yield "\" 
                                                  class=\"d-inline\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 108
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("toggle_active_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 108))), "html", null, true);
                    yield "\">
                                                <button type=\"submit\" class=\"btn btn-outline-secondary btn-sm\" 
                                                        title=\"";
                    // line 110
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isActive", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Désactiver") : ("Activer"));
                    yield "\">
                                                    <i class=\"fas fa-";
                    // line 111
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isActive", [], "any", false, false, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("pause") : ("play"));
                    yield "\"></i>
                                                </button>
                                            </form>
                                        ";
                }
                // line 115
                yield "                                        
                                        ";
                // line 116
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["language"], "isDefault", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 117
                    yield "                                            <form method=\"POST\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_languages_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 117)]), "html", null, true);
                    yield "\" 
                                                  class=\"d-inline\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette langue ?')\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 119
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_language_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 119))), "html", null, true);
                    yield "\">
                                                <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\" title=\"Supprimer\">
                                                    <i class=\"fas fa-trash\"></i>
                                                </button>
                                            </form>
                                        ";
                }
                // line 125
                yield "                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            yield "                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class=\"alert alert-info mt-4\">
        <h6><i class=\"fas fa-lightbulb me-2\"></i>Conseils d'utilisation</h6>
        <ul class=\"mb-0\">
            <li><strong>Langue par défaut :</strong> La langue principale de votre site, utilisée quand aucune autre langue n'est spécifiée.</li>
            <li><strong>Langues actives :</strong> Seules les langues actives sont disponibles pour la traduction du contenu.</li>
            <li><strong>Suppression :</strong> Vous ne pouvez pas supprimer une langue qui contient du contenu traduit.</li>
            <li><strong>Codes de langue :</strong> Utilisez les codes ISO 639-1 (fr, en, es, de, etc.).</li>
        </ul>
    </div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 147
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 148
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Auto-submit des formulaires pour les actions rapides
        document.addEventListener('DOMContentLoaded', function() {
            // Confirmation pour les actions sensibles
            document.querySelectorAll('form[onsubmit*=\"confirm\"]').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    const confirmMessage = form.getAttribute('onsubmit').match(/confirm\\('(.+?)'\\)/);
                    if (confirmMessage && !confirm(confirmMessage[1])) {
                        e.preventDefault();
                    }
                });
            });
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
        return "admin/languages/index.html.twig";
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
        return array (  378 => 148,  365 => 147,  338 => 129,  329 => 125,  320 => 119,  314 => 117,  312 => 116,  309 => 115,  302 => 111,  298 => 110,  293 => 108,  287 => 106,  285 => 105,  282 => 104,  273 => 98,  269 => 97,  264 => 96,  262 => 95,  254 => 90,  247 => 85,  241 => 80,  237 => 78,  231 => 74,  229 => 73,  225 => 71,  219 => 67,  213 => 63,  211 => 62,  207 => 60,  203 => 58,  201 => 57,  197 => 56,  191 => 53,  187 => 51,  183 => 50,  164 => 34,  160 => 32,  153 => 27,  151 => 26,  142 => 20,  135 => 15,  122 => 14,  106 => 8,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Gestion des langues{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Langues</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2>
        <i class=\"fas fa-language me-2\"></i>
        Gestion des langues
    </h2>
    <a href=\"{{ path('admin_languages_new') }}\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus me-1\"></i>
        Ajouter une langue
    </a>
</div>

{% if languages is empty %}
    <div class=\"alert alert-info\">
        <h5><i class=\"fas fa-info-circle me-2\"></i>Aucune langue configurée</h5>
        <p class=\"mb-0\">Ajoutez votre première langue pour commencer à utiliser le système multilingue de SymfPress.</p>
    </div>
{% else %}
    <div class=\"card\">
        <div class=\"card-header\">
            <h5 class=\"mb-0\">Langues disponibles ({{ languages|length }})</h5>
        </div>
        <div class=\"card-body p-0\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Statut</th>
                            <th>Par défaut</th>
                            <th>Contenu</th>
                            <th class=\"text-end\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for language in languages %}
                            <tr>
                                <td>
                                    <span class=\"badge bg-secondary\">{{ language.code|upper }}</span>
                                </td>
                                <td>
                                    <strong>{{ language.name }}</strong>
                                    {% if language == currentLanguage %}
                                        <small class=\"text-muted\">(actuelle)</small>
                                    {% endif %}
                                </td>
                                <td>
                                    {% if language.isActive %}
                                        <span class=\"badge bg-success\">
                                            <i class=\"fas fa-check me-1\"></i>Active
                                        </span>
                                    {% else %}
                                        <span class=\"badge bg-warning\">
                                            <i class=\"fas fa-pause me-1\"></i>Inactive
                                        </span>
                                    {% endif %}
                                </td>
                                <td>
                                    {% if language.isDefault %}
                                        <span class=\"badge bg-primary\">
                                            <i class=\"fas fa-star me-1\"></i>Défaut
                                        </span>
                                    {% else %}
                                        <span class=\"text-muted\">-</span>
                                    {% endif %}
                                </td>
                                <td>
                                    <small class=\"text-muted\">
                                        <i class=\"fas fa-file-alt me-1\"></i>
                                        {# TODO: Afficher le nombre de contenus traduits #}
                                        Contenu disponible
                                    </small>
                                </td>
                                <td class=\"text-end\">
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"{{ path('admin_languages_edit', {'id': language.id}) }}\" 
                                           class=\"btn btn-outline-primary btn-sm\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        {% if not language.isDefault %}
                                            <form method=\"POST\" action=\"{{ path('admin_languages_set_default', {'id': language.id}) }}\" 
                                                  class=\"d-inline\" onsubmit=\"return confirm('Définir {{ language.name }} comme langue par défaut ?')\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('set_default_' ~ language.id) }}\">
                                                <button type=\"submit\" class=\"btn btn-outline-warning btn-sm\" title=\"Définir par défaut\">
                                                    <i class=\"fas fa-star\"></i>
                                                </button>
                                            </form>
                                        {% endif %}
                                        
                                        {% if not language.isDefault %}
                                            <form method=\"POST\" action=\"{{ path('admin_languages_toggle_active', {'id': language.id}) }}\" 
                                                  class=\"d-inline\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('toggle_active_' ~ language.id) }}\">
                                                <button type=\"submit\" class=\"btn btn-outline-secondary btn-sm\" 
                                                        title=\"{{ language.isActive ? 'Désactiver' : 'Activer' }}\">
                                                    <i class=\"fas fa-{{ language.isActive ? 'pause' : 'play' }}\"></i>
                                                </button>
                                            </form>
                                        {% endif %}
                                        
                                        {% if not language.isDefault %}
                                            <form method=\"POST\" action=\"{{ path('admin_languages_delete', {'id': language.id}) }}\" 
                                                  class=\"d-inline\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette langue ?')\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_language_' ~ language.id) }}\">
                                                <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\" title=\"Supprimer\">
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
        </div>
    </div>

    <div class=\"alert alert-info mt-4\">
        <h6><i class=\"fas fa-lightbulb me-2\"></i>Conseils d'utilisation</h6>
        <ul class=\"mb-0\">
            <li><strong>Langue par défaut :</strong> La langue principale de votre site, utilisée quand aucune autre langue n'est spécifiée.</li>
            <li><strong>Langues actives :</strong> Seules les langues actives sont disponibles pour la traduction du contenu.</li>
            <li><strong>Suppression :</strong> Vous ne pouvez pas supprimer une langue qui contient du contenu traduit.</li>
            <li><strong>Codes de langue :</strong> Utilisez les codes ISO 639-1 (fr, en, es, de, etc.).</li>
        </ul>
    </div>
{% endif %}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Auto-submit des formulaires pour les actions rapides
        document.addEventListener('DOMContentLoaded', function() {
            // Confirmation pour les actions sensibles
            document.querySelectorAll('form[onsubmit*=\"confirm\"]').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    const confirmMessage = form.getAttribute('onsubmit').match(/confirm\\('(.+?)'\\)/);
                    if (confirmMessage && !confirm(confirmMessage[1])) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
{% endblock %}
", "admin/languages/index.html.twig", "/workspace/symfpress/templates/admin/languages/index.html.twig");
    }
}
