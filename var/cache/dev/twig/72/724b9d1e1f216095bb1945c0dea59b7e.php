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

/* admin/menus/builder.html.twig */
class __TwigTemplate_58dfeb2f4fc3ed15da4e547547ad3d0e extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/builder.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/builder.html.twig"));

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

        yield "Constructeur de menu - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), (isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 3, $this->source); })())), "html", null, true);
        
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
        yield "\">Administration</a></li>
        <li class=\"breadcrumb-item\"><a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
        yield "\">Menus</a></li>
        <li class=\"breadcrumb-item active\">Constructeur - ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), (isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 10, $this->source); })())), "html", null, true);
        yield "</li>
    </ol>
</nav>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 15
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

        // line 16
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.css\">
<style>
    .menu-builder {
        min-height: 400px;
    }
    .menu-item {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 15px;
        margin-bottom: 10px;
        cursor: move;
        transition: all 0.2s ease;
    }
    .menu-item:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .menu-item.sortable-ghost {
        opacity: 0.4;
    }
    .menu-item.sortable-chosen {
        background-color: #f8f9fa;
    }
    .menu-children {
        margin-left: 30px;
        margin-top: 10px;
        border-left: 2px solid #6c757d;
        padding-left: 15px;
    }
    .content-panel {
        max-height: 600px;
        overflow-y: auto;
    }
    .content-item {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 10px;
        margin-bottom: 5px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    .content-item:hover {
        background: #e9ecef;
    }
    .menu-handle {
        cursor: grab;
        color: #6c757d;
    }
    .menu-handle:hover {
        color: #495057;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 72
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

        // line 73
        yield "<div class=\"d-flex justify-content-between align-items-start mb-4\">
    <div>
        <h1 class=\"h3\">Constructeur de menu</h1>
        <p class=\"text-muted\">Emplacement : <strong>";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), (isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 76, $this->source); })())), "html", null, true);
        yield "</strong></p>
    </div>
    
    <div class=\"btn-group\">
        <a href=\"";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_new", ["location" => (isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 80, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-success\">
            <i class=\"fas fa-plus\"></i> Nouvel élément
        </a>
        <a href=\"";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour à la liste
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <!-- Zone de construction du menu -->
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"card-title mb-0\">Structure du menu</h5>
                <button type=\"button\" class=\"btn btn-sm btn-primary\" id=\"saveMenuOrder\">
                    <i class=\"fas fa-save\"></i> Enregistrer l'ordre
                </button>
            </div>
            <div class=\"card-body menu-builder\" id=\"menuBuilder\">
                ";
        // line 100
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 100, $this->source); })())) > 0)) {
            // line 101
            yield "                    <div id=\"menuList\">
                        ";
            // line 102
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 102, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                // line 103
                yield "                            ";
                yield $this->getTemplateForMacro("macro_renderMenuItem", $context, 103, $this->getSourceContext())->macro_renderMenuItem(...[$context["menu"], (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 103, $this->source); })())]);
                yield "
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['menu'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            yield "                    </div>
                ";
        } else {
            // line 107
            yield "                    <div class=\"text-center text-muted py-5\">
                        <i class=\"fas fa-bars fa-3x mb-3\"></i>
                        <p>Aucun élément de menu dans cet emplacement.</p>
                        <p>Utilisez le panneau de droite pour ajouter du contenu ou créez un nouvel élément.</p>
                    </div>
                ";
        }
        // line 113
        yield "            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        <!-- Panneau de contenu disponible -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Contenu disponible</h5>
            </div>
            <div class=\"card-body p-0\">
                <!-- Onglets de contenu -->
                <div class=\"nav nav-tabs\" role=\"tablist\">
                    <button class=\"nav-link active\" data-bs-toggle=\"tab\" data-bs-target=\"#pages-tab\" type=\"button\">Pages</button>
                    <button class=\"nav-link\" data-bs-toggle=\"tab\" data-bs-target=\"#categories-tab\" type=\"button\">Catégories</button>
                    <button class=\"nav-link\" data-bs-toggle=\"tab\" data-bs-target=\"#tags-tab\" type=\"button\">Tags</button>
                    <button class=\"nav-link\" data-bs-toggle=\"tab\" data-bs-target=\"#custom-tab\" type=\"button\">Personnalisé</button>
                </div>
                
                <div class=\"tab-content\">
                    <!-- Pages -->
                    <div class=\"tab-pane fade show active content-panel p-3\" id=\"pages-tab\">
                        ";
        // line 135
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 135, $this->source); })()), "pages", [], "any", false, false, false, 135)) > 0)) {
            // line 136
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 136, $this->source); })()), "pages", [], "any", false, false, false, 136));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 137
                yield "                                <div class=\"content-item\" data-type=\"page\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 137), "html", null, true);
                yield "\" data-title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["page"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 137, $this->source); })())], "method", false, false, false, 137), "title", [], "any", false, false, false, 137), "html", null, true);
                yield "\">
                                    <div class=\"d-flex justify-content-between\">
                                        <span>";
                // line 139
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["page"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 139, $this->source); })())], "method", false, false, false, 139), "title", [], "any", false, false, false, 139), "html", null, true);
                yield "</span>
                                        <i class=\"fas fa-plus text-success\"></i>
                                    </div>
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            yield "                        ";
        } else {
            // line 145
            yield "                            <p class=\"text-muted\">Aucune page disponible</p>
                        ";
        }
        // line 147
        yield "                    </div>
                    
                    <!-- Catégories -->
                    <div class=\"tab-pane fade content-panel p-3\" id=\"categories-tab\">
                        ";
        // line 151
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 151, $this->source); })()), "categories", [], "any", false, false, false, 151)) > 0)) {
            // line 152
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 152, $this->source); })()), "categories", [], "any", false, false, false, 152));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 153
                yield "                                <div class=\"content-item\" data-type=\"category\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 153), "html", null, true);
                yield "\" data-title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 153, $this->source); })())], "method", false, false, false, 153), "name", [], "any", false, false, false, 153), "html", null, true);
                yield "\">
                                    <div class=\"d-flex justify-content-between\">
                                        <span>";
                // line 155
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 155, $this->source); })())], "method", false, false, false, 155), "name", [], "any", false, false, false, 155), "html", null, true);
                yield "</span>
                                        <i class=\"fas fa-plus text-success\"></i>
                                    </div>
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            yield "                        ";
        } else {
            // line 161
            yield "                            <p class=\"text-muted\">Aucune catégorie disponible</p>
                        ";
        }
        // line 163
        yield "                    </div>
                    
                    <!-- Tags -->
                    <div class=\"tab-pane fade content-panel p-3\" id=\"tags-tab\">
                        ";
        // line 167
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 167, $this->source); })()), "tags", [], "any", false, false, false, 167)) > 0)) {
            // line 168
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 168, $this->source); })()), "tags", [], "any", false, false, false, 168));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 169
                yield "                                <div class=\"content-item\" data-type=\"tag\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 169), "html", null, true);
                yield "\" data-title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 169, $this->source); })())], "method", false, false, false, 169), "name", [], "any", false, false, false, 169), "html", null, true);
                yield "\">
                                    <div class=\"d-flex justify-content-between\">
                                        <span>";
                // line 171
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 171, $this->source); })())], "method", false, false, false, 171), "name", [], "any", false, false, false, 171), "html", null, true);
                yield "</span>
                                        <i class=\"fas fa-plus text-success\"></i>
                                    </div>
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 176
            yield "                        ";
        } else {
            // line 177
            yield "                            <p class=\"text-muted\">Aucun tag disponible</p>
                        ";
        }
        // line 179
        yield "                    </div>
                    
                    <!-- Lien personnalisé -->
                    <div class=\"tab-pane fade content-panel p-3\" id=\"custom-tab\">
                        <form id=\"customLinkForm\">
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Titre</label>
                                <input type=\"text\" class=\"form-control\" id=\"customTitle\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">URL</label>
                                <input type=\"url\" class=\"form-control\" id=\"customUrl\" placeholder=\"https://...\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Cible</label>
                                <select class=\"form-select\" id=\"customTarget\">
                                    <option value=\"_self\">Même fenêtre</option>
                                    <option value=\"_blank\">Nouvelle fenêtre</option>
                                </select>
                            </div>
                            <button type=\"submit\" class=\"btn btn-success w-100\">
                                <i class=\"fas fa-plus\"></i> Ajouter le lien
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 257
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

        // line 258
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script src=\"https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js\"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser Sortable pour le menu principal
    const menuList = document.getElementById('menuList');
    if (menuList) {
        new Sortable(menuList, {
            group: 'menu',
            handle: '.menu-handle',
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            animation: 150,
            onUpdate: function(evt) {
                updateMenuOrder();
            }
        });
    }
    
    // Initialiser Sortable pour les sous-menus
    document.querySelectorAll('.menu-children').forEach(function(element) {
        new Sortable(element, {
            group: 'menu',
            handle: '.menu-handle',
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            animation: 150,
            onUpdate: function(evt) {
                updateMenuOrder();
            }
        });
    });
    
    // Gestion des clics sur le contenu disponible
    document.querySelectorAll('.content-item').forEach(function(item) {
        item.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const title = this.dataset.title;
            
            createMenuItem(type, id, title);
        });
    });
    
    // Gestion du formulaire de lien personnalisé
    document.getElementById('customLinkForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const title = document.getElementById('customTitle').value;
        const url = document.getElementById('customUrl').value;
        const target = document.getElementById('customTarget').value;
        
        createCustomMenuItem(title, url, target);
        
        // Réinitialiser le formulaire
        this.reset();
    });
    
    // Bouton de sauvegarde
    document.getElementById('saveMenuOrder').addEventListener('click', function() {
        saveMenuOrder();
    });
});

function createMenuItem(type, id, title) {
    // Créer un nouvel élément de menu via AJAX
    fetch('";
        // line 324
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_new");
        yield "', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
            'type': type,
            [type + '_id']: id,
            'title': title,
            'location': '";
        // line 334
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 334, $this->source); })()), "html", null, true);
        yield "',
            '_token': '";
        // line 335
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("menu_create"), "html", null, true);
        yield "'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Erreur lors de la création de l\\'élément de menu');
        }
    });
}

function createCustomMenuItem(title, url, target) {
    fetch('";
        // line 349
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_new");
        yield "', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
            'type': 'custom',
            'title': title,
            'url': url,
            'target': target,
            'location': '";
        // line 360
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 360, $this->source); })()), "html", null, true);
        yield "',
            '_token': '";
        // line 361
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("menu_create"), "html", null, true);
        yield "'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Erreur lors de la création du lien personnalisé');
        }
    });
}

function deleteMenuItem(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet élément de menu ?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '";
        // line 378
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_delete", ["id" => "__ID__"]);
        yield "'.replace('__ID__', id);
        
        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = '_token';
        tokenInput.value = '";
        // line 383
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete"), "html", null, true);
        yield "';
        
        form.appendChild(tokenInput);
        document.body.appendChild(form);
        form.submit();
    }
}

function updateMenuOrder() {
    // Cette fonction sera appelée lors du drag & drop
    // pour mettre à jour l'ordre visuellement
}

function saveMenuOrder() {
    const menuItems = [];
    
    function collectItems(container, parent = null) {
        const items = container.children;
        for (let i = 0; i < items.length; i++) {
            const item = items[i];
            const id = item.dataset.id;
            
            if (id) {
                const menuItem = {
                    id: parseInt(id),
                    order: i,
                    parent: parent
                };
                
                menuItems.push(menuItem);
                
                // Vérifier s'il y a des enfants
                const childrenContainer = item.querySelector('.menu-children');
                if (childrenContainer) {
                    collectItems(childrenContainer, parseInt(id));
                }
            }
        }
    }
    
    const menuList = document.getElementById('menuList');
    if (menuList) {
        collectItems(menuList);
    }
    
    // Envoyer les données au serveur
    fetch('";
        // line 429
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_reorder");
        yield "', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            items: menuItems
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Afficher un message de succès
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = `
                Ordre du menu sauvegardé avec succès !
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            `;
            
            document.querySelector('.admin-content').insertBefore(alert, document.querySelector('.admin-content').firstChild);
        } else {
            alert('Erreur lors de la sauvegarde de l\\'ordre du menu');
        }
    });
}
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 210
    public function macro_renderMenuItem($menu = null, $currentLanguage = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "menu" => $menu,
            "currentLanguage" => $currentLanguage,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "renderMenuItem"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "renderMenuItem"));

            // line 211
            yield "    <div class=\"menu-item\" data-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 211, $this->source); })()), "id", [], "any", false, false, false, 211), "html", null, true);
            yield "\">
        <div class=\"d-flex justify-content-between align-items-start\">
            <div class=\"flex-grow-1\">
                <div class=\"d-flex align-items-center mb-2\">
                    <i class=\"fas fa-grip-vertical menu-handle me-2\"></i>
                    <strong>";
            // line 216
            yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 216, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 216, $this->source); })())], "method", false, false, false, 216), "title", [], "any", false, false, false, 216)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 216, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 216, $this->source); })())], "method", false, false, false, 216), "title", [], "any", false, false, false, 216), "html", null, true)) : ("Sans titre"));
            yield "</strong>
                    ";
            // line 217
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 217, $this->source); })()), "isActive", [], "any", false, false, false, 217)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 218
                yield "                        <span class=\"badge bg-danger ms-2\">Inactif</span>
                    ";
            }
            // line 220
            yield "                </div>
                
                <div class=\"text-muted small\">
                    Type : ";
            // line 223
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 223, $this->source); })()), "type", [], "any", false, false, false, 223)), "html", null, true);
            yield "
                    ";
            // line 224
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 224, $this->source); })()), "url", [], "any", false, false, false, 224)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 225
                yield "                        • URL : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 225, $this->source); })()), "url", [], "any", false, false, false, 225), "html", null, true);
                yield "
                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 226
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 226, $this->source); })()), "page", [], "any", false, false, false, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 227
                yield "                        • Page : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 227, $this->source); })()), "page", [], "any", false, false, false, 227), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 227, $this->source); })())], "method", false, false, false, 227), "title", [], "any", false, false, false, 227), "html", null, true);
                yield "
                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 228
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 228, $this->source); })()), "category", [], "any", false, false, false, 228)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 229
                yield "                        • Catégorie : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 229, $this->source); })()), "category", [], "any", false, false, false, 229), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 229, $this->source); })())], "method", false, false, false, 229), "name", [], "any", false, false, false, 229), "html", null, true);
                yield "
                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 230
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 230, $this->source); })()), "tag", [], "any", false, false, false, 230)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 231
                yield "                        • Tag : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 231, $this->source); })()), "tag", [], "any", false, false, false, 231), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 231, $this->source); })())], "method", false, false, false, 231), "name", [], "any", false, false, false, 231), "html", null, true);
                yield "
                    ";
            }
            // line 233
            yield "                </div>
            </div>
            
            <div class=\"btn-group btn-group-sm\">
                <a href=\"";
            // line 237
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 237, $this->source); })()), "id", [], "any", false, false, false, 237)]), "html", null, true);
            yield "\" class=\"btn btn-outline-primary\" title=\"Modifier\">
                    <i class=\"fas fa-edit\"></i>
                </a>
                <button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"deleteMenuItem(";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 240, $this->source); })()), "id", [], "any", false, false, false, 240), "html", null, true);
            yield ")\" title=\"Supprimer\">
                    <i class=\"fas fa-trash\"></i>
                </button>
            </div>
        </div>
        
        ";
            // line 246
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 246, $this->source); })()), "children", [], "any", false, false, false, 246)) > 0)) {
                // line 247
                yield "            <div class=\"menu-children\" data-parent=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 247, $this->source); })()), "id", [], "any", false, false, false, 247), "html", null, true);
                yield "\">
                ";
                // line 248
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 248, $this->source); })()), "children", [], "any", false, false, false, 248));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 249
                    yield "                    ";
                    yield $this->getTemplateForMacro("macro_renderMenuItem", $context, 249, $this->getSourceContext())->macro_renderMenuItem(...[$context["child"], (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 249, $this->source); })())]);
                    yield "
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 251
                yield "            </div>
        ";
            }
            // line 253
            yield "    </div>
";
            
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
        return "admin/menus/builder.html.twig";
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
        return array (  840 => 253,  836 => 251,  827 => 249,  823 => 248,  818 => 247,  816 => 246,  807 => 240,  801 => 237,  795 => 233,  789 => 231,  787 => 230,  782 => 229,  780 => 228,  775 => 227,  773 => 226,  768 => 225,  766 => 224,  762 => 223,  757 => 220,  753 => 218,  751 => 217,  747 => 216,  738 => 211,  719 => 210,  679 => 429,  630 => 383,  622 => 378,  602 => 361,  598 => 360,  584 => 349,  567 => 335,  563 => 334,  550 => 324,  481 => 258,  468 => 257,  426 => 179,  422 => 177,  419 => 176,  408 => 171,  400 => 169,  395 => 168,  393 => 167,  387 => 163,  383 => 161,  380 => 160,  369 => 155,  361 => 153,  356 => 152,  354 => 151,  348 => 147,  344 => 145,  341 => 144,  330 => 139,  322 => 137,  317 => 136,  315 => 135,  291 => 113,  283 => 107,  279 => 105,  270 => 103,  266 => 102,  263 => 101,  261 => 100,  241 => 83,  235 => 80,  228 => 76,  223 => 73,  210 => 72,  144 => 16,  131 => 15,  116 => 10,  112 => 9,  108 => 8,  104 => 6,  91 => 5,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Constructeur de menu - {{ location|title }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Administration</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_menus_index') }}\">Menus</a></li>
        <li class=\"breadcrumb-item active\">Constructeur - {{ location|title }}</li>
    </ol>
</nav>
{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.css\">
<style>
    .menu-builder {
        min-height: 400px;
    }
    .menu-item {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 15px;
        margin-bottom: 10px;
        cursor: move;
        transition: all 0.2s ease;
    }
    .menu-item:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .menu-item.sortable-ghost {
        opacity: 0.4;
    }
    .menu-item.sortable-chosen {
        background-color: #f8f9fa;
    }
    .menu-children {
        margin-left: 30px;
        margin-top: 10px;
        border-left: 2px solid #6c757d;
        padding-left: 15px;
    }
    .content-panel {
        max-height: 600px;
        overflow-y: auto;
    }
    .content-item {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 10px;
        margin-bottom: 5px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    .content-item:hover {
        background: #e9ecef;
    }
    .menu-handle {
        cursor: grab;
        color: #6c757d;
    }
    .menu-handle:hover {
        color: #495057;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-start mb-4\">
    <div>
        <h1 class=\"h3\">Constructeur de menu</h1>
        <p class=\"text-muted\">Emplacement : <strong>{{ location|title }}</strong></p>
    </div>
    
    <div class=\"btn-group\">
        <a href=\"{{ path('admin_menus_new', {location: location}) }}\" class=\"btn btn-success\">
            <i class=\"fas fa-plus\"></i> Nouvel élément
        </a>
        <a href=\"{{ path('admin_menus_index') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour à la liste
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <!-- Zone de construction du menu -->
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"card-title mb-0\">Structure du menu</h5>
                <button type=\"button\" class=\"btn btn-sm btn-primary\" id=\"saveMenuOrder\">
                    <i class=\"fas fa-save\"></i> Enregistrer l'ordre
                </button>
            </div>
            <div class=\"card-body menu-builder\" id=\"menuBuilder\">
                {% if menus|length > 0 %}
                    <div id=\"menuList\">
                        {% for menu in menus %}
                            {{ _self.renderMenuItem(menu, currentLanguage) }}
                        {% endfor %}
                    </div>
                {% else %}
                    <div class=\"text-center text-muted py-5\">
                        <i class=\"fas fa-bars fa-3x mb-3\"></i>
                        <p>Aucun élément de menu dans cet emplacement.</p>
                        <p>Utilisez le panneau de droite pour ajouter du contenu ou créez un nouvel élément.</p>
                    </div>
                {% endif %}
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        <!-- Panneau de contenu disponible -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Contenu disponible</h5>
            </div>
            <div class=\"card-body p-0\">
                <!-- Onglets de contenu -->
                <div class=\"nav nav-tabs\" role=\"tablist\">
                    <button class=\"nav-link active\" data-bs-toggle=\"tab\" data-bs-target=\"#pages-tab\" type=\"button\">Pages</button>
                    <button class=\"nav-link\" data-bs-toggle=\"tab\" data-bs-target=\"#categories-tab\" type=\"button\">Catégories</button>
                    <button class=\"nav-link\" data-bs-toggle=\"tab\" data-bs-target=\"#tags-tab\" type=\"button\">Tags</button>
                    <button class=\"nav-link\" data-bs-toggle=\"tab\" data-bs-target=\"#custom-tab\" type=\"button\">Personnalisé</button>
                </div>
                
                <div class=\"tab-content\">
                    <!-- Pages -->
                    <div class=\"tab-pane fade show active content-panel p-3\" id=\"pages-tab\">
                        {% if availableContent.pages|length > 0 %}
                            {% for page in availableContent.pages %}
                                <div class=\"content-item\" data-type=\"page\" data-id=\"{{ page.id }}\" data-title=\"{{ page.getTranslationForLanguage(currentLanguage).title }}\">
                                    <div class=\"d-flex justify-content-between\">
                                        <span>{{ page.getTranslationForLanguage(currentLanguage).title }}</span>
                                        <i class=\"fas fa-plus text-success\"></i>
                                    </div>
                                </div>
                            {% endfor %}
                        {% else %}
                            <p class=\"text-muted\">Aucune page disponible</p>
                        {% endif %}
                    </div>
                    
                    <!-- Catégories -->
                    <div class=\"tab-pane fade content-panel p-3\" id=\"categories-tab\">
                        {% if availableContent.categories|length > 0 %}
                            {% for category in availableContent.categories %}
                                <div class=\"content-item\" data-type=\"category\" data-id=\"{{ category.id }}\" data-title=\"{{ category.getTranslationForLanguage(currentLanguage).name }}\">
                                    <div class=\"d-flex justify-content-between\">
                                        <span>{{ category.getTranslationForLanguage(currentLanguage).name }}</span>
                                        <i class=\"fas fa-plus text-success\"></i>
                                    </div>
                                </div>
                            {% endfor %}
                        {% else %}
                            <p class=\"text-muted\">Aucune catégorie disponible</p>
                        {% endif %}
                    </div>
                    
                    <!-- Tags -->
                    <div class=\"tab-pane fade content-panel p-3\" id=\"tags-tab\">
                        {% if availableContent.tags|length > 0 %}
                            {% for tag in availableContent.tags %}
                                <div class=\"content-item\" data-type=\"tag\" data-id=\"{{ tag.id }}\" data-title=\"{{ tag.getTranslationForLanguage(currentLanguage).name }}\">
                                    <div class=\"d-flex justify-content-between\">
                                        <span>{{ tag.getTranslationForLanguage(currentLanguage).name }}</span>
                                        <i class=\"fas fa-plus text-success\"></i>
                                    </div>
                                </div>
                            {% endfor %}
                        {% else %}
                            <p class=\"text-muted\">Aucun tag disponible</p>
                        {% endif %}
                    </div>
                    
                    <!-- Lien personnalisé -->
                    <div class=\"tab-pane fade content-panel p-3\" id=\"custom-tab\">
                        <form id=\"customLinkForm\">
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Titre</label>
                                <input type=\"text\" class=\"form-control\" id=\"customTitle\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">URL</label>
                                <input type=\"url\" class=\"form-control\" id=\"customUrl\" placeholder=\"https://...\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Cible</label>
                                <select class=\"form-select\" id=\"customTarget\">
                                    <option value=\"_self\">Même fenêtre</option>
                                    <option value=\"_blank\">Nouvelle fenêtre</option>
                                </select>
                            </div>
                            <button type=\"submit\" class=\"btn btn-success w-100\">
                                <i class=\"fas fa-plus\"></i> Ajouter le lien
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{% macro renderMenuItem(menu, currentLanguage) %}
    <div class=\"menu-item\" data-id=\"{{ menu.id }}\">
        <div class=\"d-flex justify-content-between align-items-start\">
            <div class=\"flex-grow-1\">
                <div class=\"d-flex align-items-center mb-2\">
                    <i class=\"fas fa-grip-vertical menu-handle me-2\"></i>
                    <strong>{{ menu.getTranslationForLanguage(currentLanguage).title ?: 'Sans titre' }}</strong>
                    {% if not menu.isActive %}
                        <span class=\"badge bg-danger ms-2\">Inactif</span>
                    {% endif %}
                </div>
                
                <div class=\"text-muted small\">
                    Type : {{ menu.type|title }}
                    {% if menu.url %}
                        • URL : {{ menu.url }}
                    {% elseif menu.page %}
                        • Page : {{ menu.page.getTranslationForLanguage(currentLanguage).title }}
                    {% elseif menu.category %}
                        • Catégorie : {{ menu.category.getTranslationForLanguage(currentLanguage).name }}
                    {% elseif menu.tag %}
                        • Tag : {{ menu.tag.getTranslationForLanguage(currentLanguage).name }}
                    {% endif %}
                </div>
            </div>
            
            <div class=\"btn-group btn-group-sm\">
                <a href=\"{{ path('admin_menus_edit', {id: menu.id}) }}\" class=\"btn btn-outline-primary\" title=\"Modifier\">
                    <i class=\"fas fa-edit\"></i>
                </a>
                <button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"deleteMenuItem({{ menu.id }})\" title=\"Supprimer\">
                    <i class=\"fas fa-trash\"></i>
                </button>
            </div>
        </div>
        
        {% if menu.children|length > 0 %}
            <div class=\"menu-children\" data-parent=\"{{ menu.id }}\">
                {% for child in menu.children %}
                    {{ _self.renderMenuItem(child, currentLanguage) }}
                {% endfor %}
            </div>
        {% endif %}
    </div>
{% endmacro %}
{% endblock %}

{% block javascripts %}
{{ parent() }}
<script src=\"https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js\"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser Sortable pour le menu principal
    const menuList = document.getElementById('menuList');
    if (menuList) {
        new Sortable(menuList, {
            group: 'menu',
            handle: '.menu-handle',
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            animation: 150,
            onUpdate: function(evt) {
                updateMenuOrder();
            }
        });
    }
    
    // Initialiser Sortable pour les sous-menus
    document.querySelectorAll('.menu-children').forEach(function(element) {
        new Sortable(element, {
            group: 'menu',
            handle: '.menu-handle',
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            animation: 150,
            onUpdate: function(evt) {
                updateMenuOrder();
            }
        });
    });
    
    // Gestion des clics sur le contenu disponible
    document.querySelectorAll('.content-item').forEach(function(item) {
        item.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const title = this.dataset.title;
            
            createMenuItem(type, id, title);
        });
    });
    
    // Gestion du formulaire de lien personnalisé
    document.getElementById('customLinkForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const title = document.getElementById('customTitle').value;
        const url = document.getElementById('customUrl').value;
        const target = document.getElementById('customTarget').value;
        
        createCustomMenuItem(title, url, target);
        
        // Réinitialiser le formulaire
        this.reset();
    });
    
    // Bouton de sauvegarde
    document.getElementById('saveMenuOrder').addEventListener('click', function() {
        saveMenuOrder();
    });
});

function createMenuItem(type, id, title) {
    // Créer un nouvel élément de menu via AJAX
    fetch('{{ path(\"admin_menus_new\") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
            'type': type,
            [type + '_id']: id,
            'title': title,
            'location': '{{ location }}',
            '_token': '{{ csrf_token(\"menu_create\") }}'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Erreur lors de la création de l\\'élément de menu');
        }
    });
}

function createCustomMenuItem(title, url, target) {
    fetch('{{ path(\"admin_menus_new\") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
            'type': 'custom',
            'title': title,
            'url': url,
            'target': target,
            'location': '{{ location }}',
            '_token': '{{ csrf_token(\"menu_create\") }}'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Erreur lors de la création du lien personnalisé');
        }
    });
}

function deleteMenuItem(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet élément de menu ?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ path(\"admin_menus_delete\", {id: \"__ID__\"}) }}'.replace('__ID__', id);
        
        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = '_token';
        tokenInput.value = '{{ csrf_token(\"delete\") }}';
        
        form.appendChild(tokenInput);
        document.body.appendChild(form);
        form.submit();
    }
}

function updateMenuOrder() {
    // Cette fonction sera appelée lors du drag & drop
    // pour mettre à jour l'ordre visuellement
}

function saveMenuOrder() {
    const menuItems = [];
    
    function collectItems(container, parent = null) {
        const items = container.children;
        for (let i = 0; i < items.length; i++) {
            const item = items[i];
            const id = item.dataset.id;
            
            if (id) {
                const menuItem = {
                    id: parseInt(id),
                    order: i,
                    parent: parent
                };
                
                menuItems.push(menuItem);
                
                // Vérifier s'il y a des enfants
                const childrenContainer = item.querySelector('.menu-children');
                if (childrenContainer) {
                    collectItems(childrenContainer, parseInt(id));
                }
            }
        }
    }
    
    const menuList = document.getElementById('menuList');
    if (menuList) {
        collectItems(menuList);
    }
    
    // Envoyer les données au serveur
    fetch('{{ path(\"admin_menus_reorder\") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            items: menuItems
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Afficher un message de succès
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = `
                Ordre du menu sauvegardé avec succès !
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            `;
            
            document.querySelector('.admin-content').insertBefore(alert, document.querySelector('.admin-content').firstChild);
        } else {
            alert('Erreur lors de la sauvegarde de l\\'ordre du menu');
        }
    });
}
</script>
{% endblock %}", "admin/menus/builder.html.twig", "/workspace/symfpress/templates/admin/menus/builder.html.twig");
    }
}
