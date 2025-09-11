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

/* admin/menus/show.html.twig */
class __TwigTemplate_2fa5216be2c4f24d78a02ac54d1dd7a5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/show.html.twig"));

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

        yield "Détails du menu";
        
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
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 10, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 10, $this->source); })())], "method", false, false, false, 10), "title", [], "any", false, false, false, 10)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 10, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 10, $this->source); })())], "method", false, false, false, 10), "title", [], "any", false, false, false, 10), "html", null, true)) : ("Menu sans titre"));
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
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 16
        yield "<div class=\"d-flex justify-content-between align-items-start mb-4\">
    <div>
        <h1 class=\"h3\">";
        // line 18
        yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 18, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 18, $this->source); })())], "method", false, false, false, 18), "title", [], "any", false, false, false, 18)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 18, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 18, $this->source); })())], "method", false, false, false, 18), "title", [], "any", false, false, false, 18), "html", null, true)) : ("Menu sans titre"));
        yield "</h1>
        <div class=\"text-muted\">
            <small>Créé le ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 20, $this->source); })()), "createdAt", [], "any", false, false, false, 20), "d/m/Y à H:i"), "html", null, true);
        yield "</small>
            ";
        // line 21
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 21, $this->source); })()), "updatedAt", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "                <small> • Modifié le ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 22, $this->source); })()), "updatedAt", [], "any", false, false, false, 22), "d/m/Y à H:i"), "html", null, true);
            yield "</small>
            ";
        }
        // line 24
        yield "        </div>
    </div>
    
    <div class=\"btn-group\">
        <a href=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 28, $this->source); })()), "id", [], "any", false, false, false, 28)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-edit\"></i> Modifier
        </a>
        <a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour à la liste
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <!-- Informations principales -->
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Informations principales</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <strong>Titre :</strong>
                        <p>";
        // line 48
        yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 48, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 48, $this->source); })())], "method", false, false, false, 48), "title", [], "any", false, false, false, 48)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 48, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 48, $this->source); })())], "method", false, false, false, 48), "title", [], "any", false, false, false, 48), "html", null, true)) : ("Aucun titre"));
        yield "</p>
                    </div>
                    <div class=\"col-md-6\">
                        <strong>Type :</strong>
                        <p>
                            ";
        // line 53
        $context["typeLabels"] = ["custom" => "Lien personnalisé", "home" => "Page d'accueil", "page" => "Page", "post" => "Article", "category" => "Catégorie", "tag" => "Tag"];
        // line 61
        yield "                            ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["typeLabels"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 61, $this->source); })()), "type", [], "any", false, false, false, 61), [], "array", true, true, false, 61) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["typeLabels"]) || array_key_exists("typeLabels", $context) ? $context["typeLabels"] : (function () { throw new RuntimeError('Variable "typeLabels" does not exist.', 61, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 61, $this->source); })()), "type", [], "any", false, false, false, 61), [], "array", false, false, false, 61)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["typeLabels"]) || array_key_exists("typeLabels", $context) ? $context["typeLabels"] : (function () { throw new RuntimeError('Variable "typeLabels" does not exist.', 61, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 61, $this->source); })()), "type", [], "any", false, false, false, 61), [], "array", false, false, false, 61), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 61, $this->source); })()), "type", [], "any", false, false, false, 61), "html", null, true)));
        yield "
                        </p>
                    </div>
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <strong>Emplacement :</strong>
                        <p>
                            ";
        // line 70
        $context["locationLabels"] = ["primary" => "Menu principal", "secondary" => "Menu secondaire", "footer" => "Menu pied de page", "social" => "Menu réseaux sociaux"];
        // line 76
        yield "                            ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["locationLabels"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 76, $this->source); })()), "location", [], "any", false, false, false, 76), [], "array", true, true, false, 76) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["locationLabels"]) || array_key_exists("locationLabels", $context) ? $context["locationLabels"] : (function () { throw new RuntimeError('Variable "locationLabels" does not exist.', 76, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 76, $this->source); })()), "location", [], "any", false, false, false, 76), [], "array", false, false, false, 76)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["locationLabels"]) || array_key_exists("locationLabels", $context) ? $context["locationLabels"] : (function () { throw new RuntimeError('Variable "locationLabels" does not exist.', 76, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 76, $this->source); })()), "location", [], "any", false, false, false, 76), [], "array", false, false, false, 76), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 76, $this->source); })()), "location", [], "any", false, false, false, 76), "html", null, true)));
        yield "
                        </p>
                    </div>
                    <div class=\"col-md-6\">
                        <strong>Ordre d'affichage :</strong>
                        <p>";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 81, $this->source); })()), "menuOrder", [], "any", false, false, false, 81), "html", null, true);
        yield "</p>
                    </div>
                </div>
                
                ";
        // line 85
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 85, $this->source); })()), "description", [], "any", false, false, false, 85)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 86
            yield "                <div class=\"row\">
                    <div class=\"col-12\">
                        <strong>Description :</strong>
                        <p>";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 89, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 89, $this->source); })())], "method", false, false, false, 89), "description", [], "any", false, false, false, 89), "html", null, true);
            yield "</p>
                    </div>
                </div>
                ";
        }
        // line 93
        yield "            </div>
        </div>
        
        <!-- Contenu lié -->
        ";
        // line 97
        if (((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 97, $this->source); })()), "url", [], "any", false, false, false, 97) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 97, $this->source); })()), "page", [], "any", false, false, false, 97)) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 97, $this->source); })()), "post", [], "any", false, false, false, 97)) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 97, $this->source); })()), "category", [], "any", false, false, false, 97)) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 97, $this->source); })()), "tag", [], "any", false, false, false, 97))) {
            // line 98
            yield "        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Contenu lié</h5>
            </div>
            <div class=\"card-body\">
                ";
            // line 103
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 103, $this->source); })()), "url", [], "any", false, false, false, 103)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 104
                yield "                    <div class=\"mb-2\">
                        <strong>URL :</strong>
                        <a href=\"";
                // line 106
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 106, $this->source); })()), "url", [], "any", false, false, false, 106), "html", null, true);
                yield "\" target=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 106, $this->source); })()), "target", [], "any", false, false, false, 106), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 106, $this->source); })()), "url", [], "any", false, false, false, 106), "html", null, true);
                yield "</a>
                        ";
                // line 107
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 107, $this->source); })()), "target", [], "any", false, false, false, 107) == "_blank")) {
                    // line 108
                    yield "                            <i class=\"fas fa-external-link-alt ms-1\"></i>
                        ";
                }
                // line 110
                yield "                    </div>
                ";
            }
            // line 112
            yield "                
                ";
            // line 113
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 113, $this->source); })()), "page", [], "any", false, false, false, 113)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 114
                yield "                    <div class=\"mb-2\">
                        <strong>Page liée :</strong>
                        <a href=\"";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 116, $this->source); })()), "page", [], "any", false, false, false, 116), "id", [], "any", false, false, false, 116)]), "html", null, true);
                yield "\">
                            ";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 117, $this->source); })()), "page", [], "any", false, false, false, 117), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 117, $this->source); })())], "method", false, false, false, 117), "title", [], "any", false, false, false, 117), "html", null, true);
                yield "
                        </a>
                    </div>
                ";
            }
            // line 121
            yield "                
                ";
            // line 122
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 122, $this->source); })()), "post", [], "any", false, false, false, 122)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 123
                yield "                    <div class=\"mb-2\">
                        <strong>Article lié :</strong>
                        <a href=\"";
                // line 125
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 125, $this->source); })()), "post", [], "any", false, false, false, 125), "id", [], "any", false, false, false, 125)]), "html", null, true);
                yield "\">
                            ";
                // line 126
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 126, $this->source); })()), "post", [], "any", false, false, false, 126), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 126, $this->source); })())], "method", false, false, false, 126), "title", [], "any", false, false, false, 126), "html", null, true);
                yield "
                        </a>
                    </div>
                ";
            }
            // line 130
            yield "                
                ";
            // line 131
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 131, $this->source); })()), "category", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 132
                yield "                    <div class=\"mb-2\">
                        <strong>Catégorie liée :</strong>
                        <a href=\"";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 134, $this->source); })()), "category", [], "any", false, false, false, 134), "id", [], "any", false, false, false, 134)]), "html", null, true);
                yield "\">
                            ";
                // line 135
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 135, $this->source); })()), "category", [], "any", false, false, false, 135), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 135, $this->source); })())], "method", false, false, false, 135), "name", [], "any", false, false, false, 135), "html", null, true);
                yield "
                        </a>
                    </div>
                ";
            }
            // line 139
            yield "                
                ";
            // line 140
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 140, $this->source); })()), "tag", [], "any", false, false, false, 140)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 141
                yield "                    <div class=\"mb-2\">
                        <strong>Tag lié :</strong>
                        <a href=\"";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 143, $this->source); })()), "tag", [], "any", false, false, false, 143), "id", [], "any", false, false, false, 143)]), "html", null, true);
                yield "\">
                            ";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 144, $this->source); })()), "tag", [], "any", false, false, false, 144), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 144, $this->source); })())], "method", false, false, false, 144), "name", [], "any", false, false, false, 144), "html", null, true);
                yield "
                        </a>
                    </div>
                ";
            }
            // line 148
            yield "            </div>
        </div>
        ";
        }
        // line 151
        yield "        
        <!-- Hiérarchie -->
        ";
        // line 153
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 153, $this->source); })()), "parent", [], "any", false, false, false, 153) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 153, $this->source); })()), "children", [], "any", false, false, false, 153)) > 0))) {
            // line 154
            yield "        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Hiérarchie</h5>
            </div>
            <div class=\"card-body\">
                ";
            // line 159
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 159, $this->source); })()), "parent", [], "any", false, false, false, 159)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 160
                yield "                    <div class=\"mb-2\">
                        <strong>Parent :</strong>
                        <a href=\"";
                // line 162
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 162, $this->source); })()), "parent", [], "any", false, false, false, 162), "id", [], "any", false, false, false, 162)]), "html", null, true);
                yield "\">
                            ";
                // line 163
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 163, $this->source); })()), "parent", [], "any", false, false, false, 163), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 163, $this->source); })())], "method", false, false, false, 163), "title", [], "any", false, false, false, 163), "html", null, true);
                yield "
                        </a>
                    </div>
                ";
            }
            // line 167
            yield "                
                ";
            // line 168
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 168, $this->source); })()), "children", [], "any", false, false, false, 168)) > 0)) {
                // line 169
                yield "                    <div>
                        <strong>Enfants :</strong>
                        <ul class=\"list-unstyled mt-2\">
                            ";
                // line 172
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 172, $this->source); })()), "children", [], "any", false, false, false, 172));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 173
                    yield "                                <li class=\"ms-3\">
                                    <a href=\"";
                    // line 174
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["child"], "id", [], "any", false, false, false, 174)]), "html", null, true);
                    yield "\">
                                        ";
                    // line 175
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["child"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 175, $this->source); })())], "method", false, false, false, 175), "title", [], "any", false, false, false, 175), "html", null, true);
                    yield "
                                    </a>
                                </li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 179
                yield "                        </ul>
                    </div>
                ";
            }
            // line 182
            yield "            </div>
        </div>
        ";
        }
        // line 185
        yield "    </div>
    
    <div class=\"col-lg-4\">
        <!-- Statut et paramètres -->
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Statut et paramètres</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <strong>Statut :</strong>
                    ";
        // line 196
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 196, $this->source); })()), "isActive", [], "any", false, false, false, 196)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 197
            yield "                        <span class=\"badge bg-success\">Actif</span>
                    ";
        } else {
            // line 199
            yield "                        <span class=\"badge bg-danger\">Inactif</span>
                    ";
        }
        // line 201
        yield "                </div>
                
                ";
        // line 203
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 203, $this->source); })()), "target", [], "any", false, false, false, 203)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 204
            yield "                <div class=\"mb-3\">
                    <strong>Cible :</strong>
                    ";
            // line 206
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 206, $this->source); })()), "target", [], "any", false, false, false, 206) == "_blank")) {
                // line 207
                yield "                        <span class=\"badge bg-info\">Nouvelle fenêtre</span>
                    ";
            } else {
                // line 209
                yield "                        <span class=\"badge bg-secondary\">Même fenêtre</span>
                    ";
            }
            // line 211
            yield "                </div>
                ";
        }
        // line 213
        yield "                
                ";
        // line 214
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 214, $this->source); })()), "cssClass", [], "any", false, false, false, 214)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 215
            yield "                <div class=\"mb-3\">
                    <strong>Classe CSS :</strong>
                    <code>";
            // line 217
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 217, $this->source); })()), "cssClass", [], "any", false, false, false, 217), "html", null, true);
            yield "</code>
                </div>
                ";
        }
        // line 220
        yield "            </div>
        </div>
        
        <!-- Traductions -->
        ";
        // line 224
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 224, $this->source); })())) > 1)) {
            // line 225
            yield "        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Traductions</h5>
            </div>
            <div class=\"card-body\">
                ";
            // line 230
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 230, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 231
                yield "                    ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 231, $this->source); })()), "getTranslationForLanguage", [$context["language"]], "method", false, false, false, 231);
                // line 232
                yield "                    <div class=\"d-flex justify-content-between align-items-center mb-2\">
                        <span>
                            <i class=\"fas fa-language me-1\"></i>
                            ";
                // line 235
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 235), "html", null, true);
                yield "
                        </span>
                        ";
                // line 237
                if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 237, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 237, $this->source); })()), "title", [], "any", false, false, false, 237))) {
                    // line 238
                    yield "                            <span class=\"badge bg-success\">Traduit</span>
                        ";
                } else {
                    // line 240
                    yield "                            <span class=\"badge bg-warning\">Non traduit</span>
                        ";
                }
                // line 242
                yield "                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 244
            yield "            </div>
        </div>
        ";
        }
        // line 247
        yield "        
        <!-- Actions -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"d-grid gap-2\">
                    <a href=\"";
        // line 255
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 255, $this->source); })()), "id", [], "any", false, false, false, 255)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
                        <i class=\"fas fa-edit\"></i> Modifier
                    </a>
                    <a href=\"";
        // line 258
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_builder", ["location" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 258, $this->source); })()), "location", [], "any", false, false, false, 258)]), "html", null, true);
        yield "\" class=\"btn btn-outline-info\">
                        <i class=\"fas fa-sitemap\"></i> Constructeur de menu
                    </a>
                    ";
        // line 261
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 262
            yield "                    <button type=\"button\" class=\"btn btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\">
                        <i class=\"fas fa-trash\"></i> Supprimer
                    </button>
                    ";
        }
        // line 266
        yield "                </div>
            </div>
        </div>
    </div>
</div>

";
        // line 272
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 273
            yield "<!-- Modal de suppression -->
<div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Confirmer la suppression</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <p>Êtes-vous sûr de vouloir supprimer cet élément de menu ?</p>
                ";
            // line 283
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 283, $this->source); })()), "children", [], "any", false, false, false, 283)) > 0)) {
                // line 284
                yield "                    <div class=\"alert alert-warning\">
                        <strong>Attention :</strong> Cet élément a ";
                // line 285
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 285, $this->source); })()), "children", [], "any", false, false, false, 285)), "html", null, true);
                yield " enfant(s). Ils seront également supprimés.
                    </div>
                ";
            }
            // line 288
            yield "            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                <form method=\"post\" action=\"";
            // line 291
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 291, $this->source); })()), "id", [], "any", false, false, false, 291)]), "html", null, true);
            yield "\" class=\"d-inline\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 292
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 292, $this->source); })()), "id", [], "any", false, false, false, 292))), "html", null, true);
            yield "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
        return "admin/menus/show.html.twig";
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
        return array (  632 => 292,  628 => 291,  623 => 288,  617 => 285,  614 => 284,  612 => 283,  600 => 273,  598 => 272,  590 => 266,  584 => 262,  582 => 261,  576 => 258,  570 => 255,  560 => 247,  555 => 244,  548 => 242,  544 => 240,  540 => 238,  538 => 237,  533 => 235,  528 => 232,  525 => 231,  521 => 230,  514 => 225,  512 => 224,  506 => 220,  500 => 217,  496 => 215,  494 => 214,  491 => 213,  487 => 211,  483 => 209,  479 => 207,  477 => 206,  473 => 204,  471 => 203,  467 => 201,  463 => 199,  459 => 197,  457 => 196,  444 => 185,  439 => 182,  434 => 179,  424 => 175,  420 => 174,  417 => 173,  413 => 172,  408 => 169,  406 => 168,  403 => 167,  396 => 163,  392 => 162,  388 => 160,  386 => 159,  379 => 154,  377 => 153,  373 => 151,  368 => 148,  361 => 144,  357 => 143,  353 => 141,  351 => 140,  348 => 139,  341 => 135,  337 => 134,  333 => 132,  331 => 131,  328 => 130,  321 => 126,  317 => 125,  313 => 123,  311 => 122,  308 => 121,  301 => 117,  297 => 116,  293 => 114,  291 => 113,  288 => 112,  284 => 110,  280 => 108,  278 => 107,  270 => 106,  266 => 104,  264 => 103,  257 => 98,  255 => 97,  249 => 93,  242 => 89,  237 => 86,  235 => 85,  228 => 81,  219 => 76,  217 => 70,  204 => 61,  202 => 53,  194 => 48,  174 => 31,  168 => 28,  162 => 24,  156 => 22,  154 => 21,  150 => 20,  145 => 18,  141 => 16,  128 => 15,  113 => 10,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Détails du menu{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Administration</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_menus_index') }}\">Menus</a></li>
        <li class=\"breadcrumb-item active\">{{ menu.getTranslationForLanguage(currentLanguage).title ?: 'Menu sans titre' }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-start mb-4\">
    <div>
        <h1 class=\"h3\">{{ menu.getTranslationForLanguage(currentLanguage).title ?: 'Menu sans titre' }}</h1>
        <div class=\"text-muted\">
            <small>Créé le {{ menu.createdAt|date('d/m/Y à H:i') }}</small>
            {% if menu.updatedAt %}
                <small> • Modifié le {{ menu.updatedAt|date('d/m/Y à H:i') }}</small>
            {% endif %}
        </div>
    </div>
    
    <div class=\"btn-group\">
        <a href=\"{{ path('admin_menus_edit', {id: menu.id}) }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-edit\"></i> Modifier
        </a>
        <a href=\"{{ path('admin_menus_index') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour à la liste
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <!-- Informations principales -->
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Informations principales</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <strong>Titre :</strong>
                        <p>{{ menu.getTranslationForLanguage(currentLanguage).title ?: 'Aucun titre' }}</p>
                    </div>
                    <div class=\"col-md-6\">
                        <strong>Type :</strong>
                        <p>
                            {% set typeLabels = {
                                'custom': 'Lien personnalisé',
                                'home': 'Page d\\'accueil',
                                'page': 'Page',
                                'post': 'Article',
                                'category': 'Catégorie',
                                'tag': 'Tag'
                            } %}
                            {{ typeLabels[menu.type] ?? menu.type }}
                        </p>
                    </div>
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <strong>Emplacement :</strong>
                        <p>
                            {% set locationLabels = {
                                'primary': 'Menu principal',
                                'secondary': 'Menu secondaire',
                                'footer': 'Menu pied de page',
                                'social': 'Menu réseaux sociaux'
                            } %}
                            {{ locationLabels[menu.location] ?? menu.location }}
                        </p>
                    </div>
                    <div class=\"col-md-6\">
                        <strong>Ordre d'affichage :</strong>
                        <p>{{ menu.menuOrder }}</p>
                    </div>
                </div>
                
                {% if menu.description %}
                <div class=\"row\">
                    <div class=\"col-12\">
                        <strong>Description :</strong>
                        <p>{{ menu.getTranslationForLanguage(currentLanguage).description }}</p>
                    </div>
                </div>
                {% endif %}
            </div>
        </div>
        
        <!-- Contenu lié -->
        {% if menu.url or menu.page or menu.post or menu.category or menu.tag %}
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Contenu lié</h5>
            </div>
            <div class=\"card-body\">
                {% if menu.url %}
                    <div class=\"mb-2\">
                        <strong>URL :</strong>
                        <a href=\"{{ menu.url }}\" target=\"{{ menu.target }}\">{{ menu.url }}</a>
                        {% if menu.target == '_blank' %}
                            <i class=\"fas fa-external-link-alt ms-1\"></i>
                        {% endif %}
                    </div>
                {% endif %}
                
                {% if menu.page %}
                    <div class=\"mb-2\">
                        <strong>Page liée :</strong>
                        <a href=\"{{ path('admin_pages_show', {id: menu.page.id}) }}\">
                            {{ menu.page.getTranslationForLanguage(currentLanguage).title }}
                        </a>
                    </div>
                {% endif %}
                
                {% if menu.post %}
                    <div class=\"mb-2\">
                        <strong>Article lié :</strong>
                        <a href=\"{{ path('admin_posts_show', {id: menu.post.id}) }}\">
                            {{ menu.post.getTranslationForLanguage(currentLanguage).title }}
                        </a>
                    </div>
                {% endif %}
                
                {% if menu.category %}
                    <div class=\"mb-2\">
                        <strong>Catégorie liée :</strong>
                        <a href=\"{{ path('admin_categories_show', {id: menu.category.id}) }}\">
                            {{ menu.category.getTranslationForLanguage(currentLanguage).name }}
                        </a>
                    </div>
                {% endif %}
                
                {% if menu.tag %}
                    <div class=\"mb-2\">
                        <strong>Tag lié :</strong>
                        <a href=\"{{ path('admin_tags_show', {id: menu.tag.id}) }}\">
                            {{ menu.tag.getTranslationForLanguage(currentLanguage).name }}
                        </a>
                    </div>
                {% endif %}
            </div>
        </div>
        {% endif %}
        
        <!-- Hiérarchie -->
        {% if menu.parent or menu.children|length > 0 %}
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Hiérarchie</h5>
            </div>
            <div class=\"card-body\">
                {% if menu.parent %}
                    <div class=\"mb-2\">
                        <strong>Parent :</strong>
                        <a href=\"{{ path('admin_menus_show', {id: menu.parent.id}) }}\">
                            {{ menu.parent.getTranslationForLanguage(currentLanguage).title }}
                        </a>
                    </div>
                {% endif %}
                
                {% if menu.children|length > 0 %}
                    <div>
                        <strong>Enfants :</strong>
                        <ul class=\"list-unstyled mt-2\">
                            {% for child in menu.children %}
                                <li class=\"ms-3\">
                                    <a href=\"{{ path('admin_menus_show', {id: child.id}) }}\">
                                        {{ child.getTranslationForLanguage(currentLanguage).title }}
                                    </a>
                                </li>
                            {% endfor %}
                        </ul>
                    </div>
                {% endif %}
            </div>
        </div>
        {% endif %}
    </div>
    
    <div class=\"col-lg-4\">
        <!-- Statut et paramètres -->
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Statut et paramètres</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <strong>Statut :</strong>
                    {% if menu.isActive %}
                        <span class=\"badge bg-success\">Actif</span>
                    {% else %}
                        <span class=\"badge bg-danger\">Inactif</span>
                    {% endif %}
                </div>
                
                {% if menu.target %}
                <div class=\"mb-3\">
                    <strong>Cible :</strong>
                    {% if menu.target == '_blank' %}
                        <span class=\"badge bg-info\">Nouvelle fenêtre</span>
                    {% else %}
                        <span class=\"badge bg-secondary\">Même fenêtre</span>
                    {% endif %}
                </div>
                {% endif %}
                
                {% if menu.cssClass %}
                <div class=\"mb-3\">
                    <strong>Classe CSS :</strong>
                    <code>{{ menu.cssClass }}</code>
                </div>
                {% endif %}
            </div>
        </div>
        
        <!-- Traductions -->
        {% if availableLanguages|length > 1 %}
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Traductions</h5>
            </div>
            <div class=\"card-body\">
                {% for language in availableLanguages %}
                    {% set translation = menu.getTranslationForLanguage(language) %}
                    <div class=\"d-flex justify-content-between align-items-center mb-2\">
                        <span>
                            <i class=\"fas fa-language me-1\"></i>
                            {{ language.name }}
                        </span>
                        {% if translation and translation.title %}
                            <span class=\"badge bg-success\">Traduit</span>
                        {% else %}
                            <span class=\"badge bg-warning\">Non traduit</span>
                        {% endif %}
                    </div>
                {% endfor %}
            </div>
        </div>
        {% endif %}
        
        <!-- Actions -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"d-grid gap-2\">
                    <a href=\"{{ path('admin_menus_edit', {id: menu.id}) }}\" class=\"btn btn-primary\">
                        <i class=\"fas fa-edit\"></i> Modifier
                    </a>
                    <a href=\"{{ path('admin_menus_builder', {location: menu.location}) }}\" class=\"btn btn-outline-info\">
                        <i class=\"fas fa-sitemap\"></i> Constructeur de menu
                    </a>
                    {% if is_granted('ROLE_ADMIN') %}
                    <button type=\"button\" class=\"btn btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\">
                        <i class=\"fas fa-trash\"></i> Supprimer
                    </button>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>

{% if is_granted('ROLE_ADMIN') %}
<!-- Modal de suppression -->
<div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Confirmer la suppression</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <p>Êtes-vous sûr de vouloir supprimer cet élément de menu ?</p>
                {% if menu.children|length > 0 %}
                    <div class=\"alert alert-warning\">
                        <strong>Attention :</strong> Cet élément a {{ menu.children|length }} enfant(s). Ils seront également supprimés.
                    </div>
                {% endif %}
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                <form method=\"post\" action=\"{{ path('admin_menus_delete', {id: menu.id}) }}\" class=\"d-inline\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ menu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endif %}
{% endblock %}", "admin/menus/show.html.twig", "/workspace/symfpress/templates/admin/menus/show.html.twig");
    }
}
