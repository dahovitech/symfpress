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

/* admin/categories/index.html.twig */
class __TwigTemplate_c607e307bf047fb0bdc50d7e589e86b8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/index.html.twig"));

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

        yield "Catégories";
        
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
        <li class=\"breadcrumb-item active\">Catégories</li>
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
    <h1 class=\"h3 mb-0\">Catégories</h1>
    <div>
        <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_new");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvelle catégorie
        </a>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 26, $this->source); })())), "html", null, true);
        yield " catégorie(s)</h5>
        <div class=\"dropdown\">
            <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                <i class=\"fas fa-language me-1\"></i> ";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 29, $this->source); })()), "name", [], "any", false, false, false, 29), "html", null, true);
        yield "
            </button>
            <ul class=\"dropdown-menu dropdown-menu-end\">
                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 32, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 33
            yield "                    <li>
                        <a class=\"dropdown-item ";
            // line 34
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 34, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                           href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 35)]), "html", null, true);
            yield "\">
                            ";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 36), "html", null, true);
            yield "
                        </a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        yield "            </ul>
        </div>
    </div>
    <div class=\"card-body p-0\">
        ";
        // line 44
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 44, $this->source); })()))) {
            // line 45
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-folder-open fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucune catégorie</h5>
                <p class=\"text-muted mb-4\">Commencez par créer votre première catégorie pour organiser vos articles.</p>
                <a href=\"";
            // line 49
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_new");
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer une catégorie
                </a>
            </div>
        ";
        } else {
            // line 54
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Articles</th>
                            <th>Parent</th>
                            <th>Ordre</th>
                            <th>Créée le</th>
                            <th width=\"150\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 68, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 69
                yield "                            ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 69, $this->source); })())], "method", false, false, false, 69);
                // line 70
                yield "                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        ";
                // line 73
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "icon", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 74
                    yield "                                            <i class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "icon", [], "any", false, false, false, 74), "html", null, true);
                    yield " me-2\" 
                                               ";
                    // line 75
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "color", [], "any", false, false, false, 75)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "style=\"color: ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "color", [], "any", false, false, false, 75), "html", null, true);
                        yield "\"";
                    }
                    yield "></i>
                                        ";
                }
                // line 77
                yield "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(0, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "level", [], "any", false, false, false, 77)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 78
                    yield "                                            ";
                    if (($context["i"] > 0)) {
                        yield "&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    // line 79
                    yield "                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                yield "                                        <div>
                                            <strong>";
                // line 81
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 81, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 81, $this->source); })()), "name", [], "any", false, false, false, 81), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 81)), "html", null, true)));
                yield "</strong>
                                            ";
                // line 82
                if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 82, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 82, $this->source); })()), "description", [], "any", false, false, false, 82))) {
                    // line 83
                    yield "                                                <br><small class=\"text-muted\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 83, $this->source); })()), "description", [], "any", false, false, false, 83), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 83, $this->source); })()), "description", [], "any", false, false, false, 83)) > 80)) {
                        yield "...";
                    }
                    yield "</small>
                                            ";
                }
                // line 85
                yield "                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <code>";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "slug", [], "any", false, false, false, 89), "html", null, true);
                yield "</code>
                                </td>
                                <td>
                                    <span class=\"badge bg-secondary\">";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "postCount", [], "any", false, false, false, 92), "html", null, true);
                yield "</span>
                                </td>
                                <td>
                                    ";
                // line 95
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "parent", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 96
                    yield "                                        ";
                    $context["parentTranslation"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "parent", [], "any", false, false, false, 96), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 96, $this->source); })())], "method", false, false, false, 96);
                    // line 97
                    yield "                                        ";
                    yield (((($tmp = (isset($context["parentTranslation"]) || array_key_exists("parentTranslation", $context) ? $context["parentTranslation"] : (function () { throw new RuntimeError('Variable "parentTranslation" does not exist.', 97, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentTranslation"]) || array_key_exists("parentTranslation", $context) ? $context["parentTranslation"] : (function () { throw new RuntimeError('Variable "parentTranslation" does not exist.', 97, $this->source); })()), "name", [], "any", false, false, false, 97), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "parent", [], "any", false, false, false, 97), "id", [], "any", false, false, false, 97)), "html", null, true)));
                    yield "
                                    ";
                } else {
                    // line 99
                    yield "                                        <span class=\"text-muted\">Racine</span>
                                    ";
                }
                // line 101
                yield "                                </td>
                                <td>";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "menuOrder", [], "any", false, false, false, 102), "html", null, true);
                yield "</td>
                                <td>
                                    <small class=\"text-muted\">";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "createdAt", [], "any", false, false, false, 104), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                                </td>
                                <td>
                                    <div class=\"btn-group btn-group-sm\" role=\"group\">
                                        <a href=\"";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 108)]), "html", null, true);
                yield "\" 
                                           class=\"btn btn-outline-primary\" title=\"Voir\">
                                            <i class=\"fas fa-eye\"></i>
                                        </a>
                                        <a href=\"";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 112)]), "html", null, true);
                yield "\" 
                                           class=\"btn btn-outline-secondary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        ";
                // line 116
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["category"], "postCount", [], "any", false, false, false, 116) == 0)) {
                    // line 117
                    yield "                                            <form method=\"post\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 117)]), "html", null, true);
                    yield "\" 
                                                  class=\"d-inline\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cette catégorie ?')\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 119
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 119))), "html", null, true);
                    yield "\">
                                                <button type=\"submit\" class=\"btn btn-outline-danger\" title=\"Supprimer\">
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
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 133
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
        return "admin/categories/index.html.twig";
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
        return array (  381 => 133,  375 => 129,  366 => 125,  357 => 119,  351 => 117,  349 => 116,  342 => 112,  335 => 108,  328 => 104,  323 => 102,  320 => 101,  316 => 99,  310 => 97,  307 => 96,  305 => 95,  299 => 92,  293 => 89,  287 => 85,  278 => 83,  276 => 82,  272 => 81,  269 => 80,  263 => 79,  258 => 78,  253 => 77,  244 => 75,  239 => 74,  237 => 73,  232 => 70,  229 => 69,  225 => 68,  209 => 54,  201 => 49,  195 => 45,  193 => 44,  187 => 40,  177 => 36,  173 => 35,  169 => 34,  166 => 33,  162 => 32,  156 => 29,  150 => 26,  139 => 18,  134 => 15,  121 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Catégories{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Catégories</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0\">Catégories</h1>
    <div>
        <a href=\"{{ path('admin_categories_new') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvelle catégorie
        </a>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">{{ categories|length }} catégorie(s)</h5>
        <div class=\"dropdown\">
            <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
            </button>
            <ul class=\"dropdown-menu dropdown-menu-end\">
                {% for language in availableLanguages %}
                    <li>
                        <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                           href=\"{{ path('admin_categories_index', {'language': language.code}) }}\">
                            {{ language.name }}
                        </a>
                    </li>
                {% endfor %}
            </ul>
        </div>
    </div>
    <div class=\"card-body p-0\">
        {% if categories is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-folder-open fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucune catégorie</h5>
                <p class=\"text-muted mb-4\">Commencez par créer votre première catégorie pour organiser vos articles.</p>
                <a href=\"{{ path('admin_categories_new') }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer une catégorie
                </a>
            </div>
        {% else %}
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Articles</th>
                            <th>Parent</th>
                            <th>Ordre</th>
                            <th>Créée le</th>
                            <th width=\"150\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for category in categories %}
                            {% set translation = category.getTranslationForLanguage(currentLanguage) %}
                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        {% if category.icon %}
                                            <i class=\"{{ category.icon }} me-2\" 
                                               {% if category.color %}style=\"color: {{ category.color }}\"{% endif %}></i>
                                        {% endif %}
                                        {% for i in 0..category.level %}
                                            {% if i > 0 %}&nbsp;&nbsp;&nbsp;&nbsp;{% endif %}
                                        {% endfor %}
                                        <div>
                                            <strong>{{ translation ? translation.name : 'Catégorie #' ~ category.id }}</strong>
                                            {% if translation and translation.description %}
                                                <br><small class=\"text-muted\">{{ translation.description|slice(0, 80) }}{% if translation.description|length > 80 %}...{% endif %}</small>
                                            {% endif %}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <code>{{ category.slug }}</code>
                                </td>
                                <td>
                                    <span class=\"badge bg-secondary\">{{ category.postCount }}</span>
                                </td>
                                <td>
                                    {% if category.parent %}
                                        {% set parentTranslation = category.parent.getTranslationForLanguage(currentLanguage) %}
                                        {{ parentTranslation ? parentTranslation.name : 'Catégorie #' ~ category.parent.id }}
                                    {% else %}
                                        <span class=\"text-muted\">Racine</span>
                                    {% endif %}
                                </td>
                                <td>{{ category.menuOrder }}</td>
                                <td>
                                    <small class=\"text-muted\">{{ category.createdAt|date('d/m/Y H:i') }}</small>
                                </td>
                                <td>
                                    <div class=\"btn-group btn-group-sm\" role=\"group\">
                                        <a href=\"{{ path('admin_categories_show', {'id': category.id}) }}\" 
                                           class=\"btn btn-outline-primary\" title=\"Voir\">
                                            <i class=\"fas fa-eye\"></i>
                                        </a>
                                        <a href=\"{{ path('admin_categories_edit', {'id': category.id}) }}\" 
                                           class=\"btn btn-outline-secondary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        {% if category.postCount == 0 %}
                                            <form method=\"post\" action=\"{{ path('admin_categories_delete', {'id': category.id}) }}\" 
                                                  class=\"d-inline\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cette catégorie ?')\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ category.id) }}\">
                                                <button type=\"submit\" class=\"btn btn-outline-danger\" title=\"Supprimer\">
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
", "admin/categories/index.html.twig", "/workspace/symfpress/templates/admin/categories/index.html.twig");
    }
}
