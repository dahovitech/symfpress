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

/* admin/menus/index.html.twig */
class __TwigTemplate_0021df656fd36bfac0bd050246e2c0d5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/index.html.twig"));

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

        yield "Menus";
        
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
        <li class=\"breadcrumb-item active\">Menus</li>
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
    <h1 class=\"h3 mb-0\">Gestion des menus</h1>
    <div>
        <a href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_builder", ["location" => (isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 18, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-outline-primary me-2\">
            <i class=\"fas fa-sitemap\"></i> Constructeur de menu
        </a>
        <a href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_new", ["location" => (isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 21, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvel élément
        </a>
    </div>
</div>

<!-- Sélecteur d'emplacement -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <label for=\"location-select\" class=\"form-label mb-0\">Emplacement du menu :</label>
                <select class=\"form-select\" id=\"location-select\" onchange=\"changeLocation(this.value)\">
                    ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["locations"]) || array_key_exists("locations", $context) ? $context["locations"] : (function () { throw new RuntimeError('Variable "locations" does not exist.', 34, $this->source); })()));
        foreach ($context['_seq'] as $context["locationKey"] => $context["locationLabel"]) {
            // line 35
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["locationKey"], "html", null, true);
            yield "\" ";
            yield ((((isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 35, $this->source); })()) == $context["locationKey"])) ? ("selected") : (""));
            yield ">
                            ";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["locationLabel"], "html", null, true);
            yield "
                        </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['locationKey'], $context['locationLabel'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "                </select>
            </div>
            <div class=\"col-md-6\">
                <div class=\"dropdown\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-language me-1\"></i> ";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 44, $this->source); })()), "name", [], "any", false, false, false, 44), "html", null, true);
        yield "
                    </button>
                    <ul class=\"dropdown-menu dropdown-menu-end\">
                        ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 47, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 48
            yield "                            <li>
                                <a class=\"dropdown-item ";
            // line 49
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 49, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                                   href=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index", ["location" => (isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 50, $this->source); })()), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 50)]), "html", null, true);
            yield "\">
                                    ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 51), "html", null, true);
            yield "
                                </a>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        yield "                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["locations"]) || array_key_exists("locations", $context) ? $context["locations"] : (function () { throw new RuntimeError('Variable "locations" does not exist.', 64, $this->source); })()), (isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 64, $this->source); })()), [], "array", false, false, false, 64), "html", null, true);
        yield " (";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 64, $this->source); })())), "html", null, true);
        yield " élément(s))</h5>
        ";
        // line 65
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 65, $this->source); })())) > 0)) {
            // line 66
            yield "            <small class=\"text-muted\">Glissez-déposez pour réorganiser</small>
        ";
        }
        // line 68
        yield "    </div>
    <div class=\"card-body p-0\">
        ";
        // line 70
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 70, $this->source); })()))) {
            // line 71
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-bars fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun élément de menu</h5>
                <p class=\"text-muted mb-4\">Commencez par créer votre premier élément de menu pour ";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["locations"]) || array_key_exists("locations", $context) ? $context["locations"] : (function () { throw new RuntimeError('Variable "locations" does not exist.', 74, $this->source); })()), (isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 74, $this->source); })()), [], "array", false, false, false, 74)), "html", null, true);
            yield ".</p>
                <a href=\"";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_new", ["location" => (isset($context["currentLocation"]) || array_key_exists("currentLocation", $context) ? $context["currentLocation"] : (function () { throw new RuntimeError('Variable "currentLocation" does not exist.', 75, $this->source); })())]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un élément
                </a>
            </div>
        ";
        } else {
            // line 80
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th width=\"30\"><i class=\"fas fa-grip-vertical text-muted\"></i></th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>URL</th>
                            <th>Statut</th>
                            <th>Ordre</th>
                            <th width=\"150\">Actions</th>
                        </tr>
                    </thead>
                    <tbody id=\"menu-sortable\">
                        ";
            // line 94
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 94, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                // line 95
                yield "                            ";
                yield $this->getTemplateForMacro("macro_render_menu_row", $context, 95, $this->getSourceContext())->macro_render_menu_row(...[$context["menu"], (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 95, $this->source); })()), 0]);
                yield "
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['menu'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 101
        yield "    </div>
</div>

";
        // line 177
        yield "
<script>
function changeLocation(location) {
    window.location.href = \"";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
        yield "?location=\" + location;
}

// Sortable functionality (basic implementation)
// For production, you might want to use a library like SortableJS
document.addEventListener('DOMContentLoaded', function() {
    const tbody = document.getElementById('menu-sortable');
    if (tbody && tbody.children.length > 0) {
        // Enable drag and drop functionality here if needed
        // This would require additional JavaScript libraries
    }
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 104
    public function macro_render_menu_row($menu = null, $currentLanguage = null, $level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "menu" => $menu,
            "currentLanguage" => $currentLanguage,
            "level" => $level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_menu_row"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_menu_row"));

            // line 105
            yield "    ";
            $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 105, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 105, $this->source); })())], "method", false, false, false, 105);
            // line 106
            yield "    <tr data-menu-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 106, $this->source); })()), "id", [], "any", false, false, false, 106), "html", null, true);
            yield "\" class=\"menu-item\" style=\"";
            yield ((((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 106, $this->source); })()) > 0)) ? ("background-color: #f8f9fa;") : (""));
            yield "\">
        <td>
            <i class=\"fas fa-grip-vertical text-muted\" style=\"cursor: move;\"></i>
        </td>
        <td>
            <div style=\"padding-left: ";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 111, $this->source); })()) * 20), "html", null, true);
            yield "px;\">
                ";
            // line 112
            if (((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 112, $this->source); })()) > 0)) {
                yield "<i class=\"fas fa-level-up-alt fa-rotate-90 text-muted me-1\"></i>";
            }
            // line 113
            yield "                <strong>";
            yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 113, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 113, $this->source); })()), "title", [], "any", false, false, false, 113), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 113, $this->source); })()), "generateDefaultTitle", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 113, $this->source); })())], "method", false, false, false, 113), "html", null, true)));
            yield "</strong>
                ";
            // line 114
            if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 114, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 114, $this->source); })()), "description", [], "any", false, false, false, 114))) {
                // line 115
                yield "                    <br><small class=\"text-muted\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 115, $this->source); })()), "description", [], "any", false, false, false, 115), 0, 60), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 115, $this->source); })()), "description", [], "any", false, false, false, 115)) > 60)) {
                    yield "...";
                }
                yield "</small>
                ";
            }
            // line 117
            yield "            </div>
        </td>
        <td>
            <span class=\"badge 
                ";
            // line 121
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 121, $this->source); })()), "type", [], "any", false, false, false, 121) == "home")) {
                yield "bg-success
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 122
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 122, $this->source); })()), "type", [], "any", false, false, false, 122) == "page")) {
                yield "bg-primary
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 123
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 123, $this->source); })()), "type", [], "any", false, false, false, 123) == "post")) {
                yield "bg-info
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 124
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 124, $this->source); })()), "type", [], "any", false, false, false, 124) == "category")) {
                yield "bg-warning
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 125
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 125, $this->source); })()), "type", [], "any", false, false, false, 125) == "tag")) {
                yield "bg-secondary
                ";
            } else {
                // line 126
                yield "bg-dark";
            }
            yield "\">
                ";
            // line 127
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 127, $this->source); })()), "type", [], "any", false, false, false, 127) == "home")) {
                yield "Accueil
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 128
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 128, $this->source); })()), "type", [], "any", false, false, false, 128) == "page")) {
                yield "Page
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 129
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 129, $this->source); })()), "type", [], "any", false, false, false, 129) == "post")) {
                yield "Article
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 130
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 130, $this->source); })()), "type", [], "any", false, false, false, 130) == "category")) {
                yield "Catégorie
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 131
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 131, $this->source); })()), "type", [], "any", false, false, false, 131) == "tag")) {
                yield "Tag
                ";
            } else {
                // line 132
                yield "Personnalisé";
            }
            // line 133
            yield "            </span>
        </td>
        <td>
            ";
            // line 136
            $context["computedUrl"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 136, $this->source); })()), "computedUrl", [], "any", false, false, false, 136);
            // line 137
            yield "            ";
            if ((($tmp = (isset($context["computedUrl"]) || array_key_exists("computedUrl", $context) ? $context["computedUrl"] : (function () { throw new RuntimeError('Variable "computedUrl" does not exist.', 137, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 138
                yield "                <small><code>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["computedUrl"]) || array_key_exists("computedUrl", $context) ? $context["computedUrl"] : (function () { throw new RuntimeError('Variable "computedUrl" does not exist.', 138, $this->source); })()), "html", null, true);
                yield "</code></small>
            ";
            } else {
                // line 140
                yield "                <span class=\"text-muted\">-</span>
            ";
            }
            // line 142
            yield "        </td>
        <td>
            ";
            // line 144
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 144, $this->source); })()), "isActive", [], "any", false, false, false, 144)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 145
                yield "                <span class=\"badge bg-success\">Actif</span>
            ";
            } else {
                // line 147
                yield "                <span class=\"badge bg-danger\">Inactif</span>
            ";
            }
            // line 149
            yield "        </td>
        <td>";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 150, $this->source); })()), "menuOrder", [], "any", false, false, false, 150), "html", null, true);
            yield "</td>
        <td>
            <div class=\"btn-group btn-group-sm\" role=\"group\">
                <a href=\"";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 153, $this->source); })()), "id", [], "any", false, false, false, 153)]), "html", null, true);
            yield "\" 
                   class=\"btn btn-outline-primary\" title=\"Voir\">
                    <i class=\"fas fa-eye\"></i>
                </a>
                <a href=\"";
            // line 157
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 157, $this->source); })()), "id", [], "any", false, false, false, 157)]), "html", null, true);
            yield "\" 
                   class=\"btn btn-outline-secondary\" title=\"Modifier\">
                    <i class=\"fas fa-edit\"></i>
                </a>
                <form method=\"post\" action=\"";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 161, $this->source); })()), "id", [], "any", false, false, false, 161)]), "html", null, true);
            yield "\" 
                      class=\"d-inline\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cet élément de menu ?')\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 163
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 163, $this->source); })()), "id", [], "any", false, false, false, 163))), "html", null, true);
            yield "\">
                    <button type=\"submit\" class=\"btn btn-outline-danger\" title=\"Supprimer\">
                        <i class=\"fas fa-trash\"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    
    ";
            // line 173
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 173, $this->source); })()), "children", [], "any", false, false, false, 173));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 174
                yield "        ";
                yield $this->getTemplateForMacro("macro_render_menu_row", $context, 174, $this->getSourceContext())->macro_render_menu_row(...[$context["child"], (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 174, $this->source); })()), ((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 174, $this->source); })()) + 1)]);
                yield "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/menus/index.html.twig";
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
        return array (  528 => 174,  523 => 173,  511 => 163,  506 => 161,  499 => 157,  492 => 153,  486 => 150,  483 => 149,  479 => 147,  475 => 145,  473 => 144,  469 => 142,  465 => 140,  459 => 138,  456 => 137,  454 => 136,  449 => 133,  446 => 132,  441 => 131,  437 => 130,  433 => 129,  429 => 128,  425 => 127,  420 => 126,  415 => 125,  411 => 124,  407 => 123,  403 => 122,  399 => 121,  393 => 117,  384 => 115,  382 => 114,  377 => 113,  373 => 112,  369 => 111,  358 => 106,  355 => 105,  335 => 104,  310 => 180,  305 => 177,  300 => 101,  294 => 97,  285 => 95,  281 => 94,  265 => 80,  257 => 75,  253 => 74,  248 => 71,  246 => 70,  242 => 68,  238 => 66,  236 => 65,  230 => 64,  219 => 55,  209 => 51,  205 => 50,  201 => 49,  198 => 48,  194 => 47,  188 => 44,  181 => 39,  172 => 36,  165 => 35,  161 => 34,  145 => 21,  139 => 18,  134 => 15,  121 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Menus{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Menus</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0\">Gestion des menus</h1>
    <div>
        <a href=\"{{ path('admin_menus_builder', {'location': currentLocation}) }}\" class=\"btn btn-outline-primary me-2\">
            <i class=\"fas fa-sitemap\"></i> Constructeur de menu
        </a>
        <a href=\"{{ path('admin_menus_new', {'location': currentLocation}) }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvel élément
        </a>
    </div>
</div>

<!-- Sélecteur d'emplacement -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <label for=\"location-select\" class=\"form-label mb-0\">Emplacement du menu :</label>
                <select class=\"form-select\" id=\"location-select\" onchange=\"changeLocation(this.value)\">
                    {% for locationKey, locationLabel in locations %}
                        <option value=\"{{ locationKey }}\" {{ currentLocation == locationKey ? 'selected' : '' }}>
                            {{ locationLabel }}
                        </option>
                    {% endfor %}
                </select>
            </div>
            <div class=\"col-md-6\">
                <div class=\"dropdown\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
                    </button>
                    <ul class=\"dropdown-menu dropdown-menu-end\">
                        {% for language in availableLanguages %}
                            <li>
                                <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                   href=\"{{ path('admin_menus_index', {'location': currentLocation, 'language': language.code}) }}\">
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

<div class=\"card\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">{{ locations[currentLocation] }} ({{ menus|length }} élément(s))</h5>
        {% if menus|length > 0 %}
            <small class=\"text-muted\">Glissez-déposez pour réorganiser</small>
        {% endif %}
    </div>
    <div class=\"card-body p-0\">
        {% if menus is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-bars fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun élément de menu</h5>
                <p class=\"text-muted mb-4\">Commencez par créer votre premier élément de menu pour {{ locations[currentLocation]|lower }}.</p>
                <a href=\"{{ path('admin_menus_new', {'location': currentLocation}) }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un élément
                </a>
            </div>
        {% else %}
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th width=\"30\"><i class=\"fas fa-grip-vertical text-muted\"></i></th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>URL</th>
                            <th>Statut</th>
                            <th>Ordre</th>
                            <th width=\"150\">Actions</th>
                        </tr>
                    </thead>
                    <tbody id=\"menu-sortable\">
                        {% for menu in menus %}
                            {{ _self.render_menu_row(menu, currentLanguage, 0) }}
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endif %}
    </div>
</div>

{% macro render_menu_row(menu, currentLanguage, level) %}
    {% set translation = menu.getTranslationForLanguage(currentLanguage) %}
    <tr data-menu-id=\"{{ menu.id }}\" class=\"menu-item\" style=\"{{ level > 0 ? 'background-color: #f8f9fa;' : '' }}\">
        <td>
            <i class=\"fas fa-grip-vertical text-muted\" style=\"cursor: move;\"></i>
        </td>
        <td>
            <div style=\"padding-left: {{ level * 20 }}px;\">
                {% if level > 0 %}<i class=\"fas fa-level-up-alt fa-rotate-90 text-muted me-1\"></i>{% endif %}
                <strong>{{ translation ? translation.title : menu.generateDefaultTitle(currentLanguage) }}</strong>
                {% if translation and translation.description %}
                    <br><small class=\"text-muted\">{{ translation.description|slice(0, 60) }}{% if translation.description|length > 60 %}...{% endif %}</small>
                {% endif %}
            </div>
        </td>
        <td>
            <span class=\"badge 
                {% if menu.type == 'home' %}bg-success
                {% elseif menu.type == 'page' %}bg-primary
                {% elseif menu.type == 'post' %}bg-info
                {% elseif menu.type == 'category' %}bg-warning
                {% elseif menu.type == 'tag' %}bg-secondary
                {% else %}bg-dark{% endif %}\">
                {% if menu.type == 'home' %}Accueil
                {% elseif menu.type == 'page' %}Page
                {% elseif menu.type == 'post' %}Article
                {% elseif menu.type == 'category' %}Catégorie
                {% elseif menu.type == 'tag' %}Tag
                {% else %}Personnalisé{% endif %}
            </span>
        </td>
        <td>
            {% set computedUrl = menu.computedUrl %}
            {% if computedUrl %}
                <small><code>{{ computedUrl }}</code></small>
            {% else %}
                <span class=\"text-muted\">-</span>
            {% endif %}
        </td>
        <td>
            {% if menu.isActive %}
                <span class=\"badge bg-success\">Actif</span>
            {% else %}
                <span class=\"badge bg-danger\">Inactif</span>
            {% endif %}
        </td>
        <td>{{ menu.menuOrder }}</td>
        <td>
            <div class=\"btn-group btn-group-sm\" role=\"group\">
                <a href=\"{{ path('admin_menus_show', {'id': menu.id}) }}\" 
                   class=\"btn btn-outline-primary\" title=\"Voir\">
                    <i class=\"fas fa-eye\"></i>
                </a>
                <a href=\"{{ path('admin_menus_edit', {'id': menu.id}) }}\" 
                   class=\"btn btn-outline-secondary\" title=\"Modifier\">
                    <i class=\"fas fa-edit\"></i>
                </a>
                <form method=\"post\" action=\"{{ path('admin_menus_delete', {'id': menu.id}) }}\" 
                      class=\"d-inline\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cet élément de menu ?')\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ menu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-outline-danger\" title=\"Supprimer\">
                        <i class=\"fas fa-trash\"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    
    {# Render children recursively #}
    {% for child in menu.children %}
        {{ _self.render_menu_row(child, currentLanguage, level + 1) }}
    {% endfor %}
{% endmacro %}

<script>
function changeLocation(location) {
    window.location.href = \"{{ path('admin_menus_index') }}?location=\" + location;
}

// Sortable functionality (basic implementation)
// For production, you might want to use a library like SortableJS
document.addEventListener('DOMContentLoaded', function() {
    const tbody = document.getElementById('menu-sortable');
    if (tbody && tbody.children.length > 0) {
        // Enable drag and drop functionality here if needed
        // This would require additional JavaScript libraries
    }
});
</script>
{% endblock %}
", "admin/menus/index.html.twig", "/workspace/symfpress/templates/admin/menus/index.html.twig");
    }
}
