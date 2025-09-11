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

/* admin/categories/show.html.twig */
class __TwigTemplate_95c5324d52681a1cf3d09ecde7ab5fca extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/show.html.twig"));

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

        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 3, $this->source); })()), "name", [], "any", false, false, false, 3), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3)), "html", null, true)));
        
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
        <li class=\"breadcrumb-item\"><a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index");
        yield "\">Catégories</a></li>
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 10, $this->source); })()), "name", [], "any", false, false, false, 10), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 10, $this->source); })()), "id", [], "any", false, false, false, 10)), "html", null, true)));
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
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 16, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 16, $this->source); })())], "method", false, false, false, 16);
        // line 17
        yield "
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0 d-flex align-items-center\">
        ";
        // line 20
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 20, $this->source); })()), "icon", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "            <i class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 21, $this->source); })()), "icon", [], "any", false, false, false, 21), "html", null, true);
            yield " me-2\" 
               ";
            // line 22
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 22, $this->source); })()), "color", [], "any", false, false, false, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "style=\"color: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 22, $this->source); })()), "color", [], "any", false, false, false, 22), "html", null, true);
                yield "\"";
            }
            yield "></i>
        ";
        }
        // line 24
        yield "        ";
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 24, $this->source); })()), "name", [], "any", false, false, false, 24), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 24, $this->source); })()), "id", [], "any", false, false, false, 24)), "html", null, true)));
        yield "
    </h1>
    <div>
        <a href=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 27, $this->source); })()), "id", [], "any", false, false, false, 27)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-edit\"></i> Modifier
        </a>
        <div class=\"dropdown d-inline-block ms-2\">
            <button class=\"btn btn-outline-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                <i class=\"fas fa-language me-1\"></i> ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 32, $this->source); })()), "name", [], "any", false, false, false, 32), "html", null, true);
        yield "
            </button>
            <ul class=\"dropdown-menu dropdown-menu-end\">
                ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 35, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 36
            yield "                    <li>
                        <a class=\"dropdown-item ";
            // line 37
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 37, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                           href=\"";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 38, $this->source); })()), "id", [], "any", false, false, false, 38), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 38)]), "html", null, true);
            yield "\">
                            ";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 39), "html", null, true);
            yield "
                        </a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "            </ul>
        </div>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-md-8\">
        <!-- Informations principales -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Informations</h5>
            </div>
            <div class=\"card-body\">
                <dl class=\"row\">
                    <dt class=\"col-sm-3\">Nom :</dt>
                    <dd class=\"col-sm-9\">";
        // line 58
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 58, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 58, $this->source); })()), "name", [], "any", false, false, false, 58), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 58, $this->source); })()), "id", [], "any", false, false, false, 58)), "html", null, true)));
        yield "</dd>
                    
                    <dt class=\"col-sm-3\">Slug :</dt>
                    <dd class=\"col-sm-9\"><code>";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 61, $this->source); })()), "slug", [], "any", false, false, false, 61), "html", null, true);
        yield "</code></dd>
                    
                    ";
        // line 63
        if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 63, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 63, $this->source); })()), "description", [], "any", false, false, false, 63))) {
            // line 64
            yield "                    <dt class=\"col-sm-3\">Description :</dt>
                    <dd class=\"col-sm-9\">";
            // line 65
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 65, $this->source); })()), "description", [], "any", false, false, false, 65), "html", null, true));
            yield "</dd>
                    ";
        }
        // line 67
        yield "                    
                    <dt class=\"col-sm-3\">Couleur :</dt>
                    <dd class=\"col-sm-9\">
                        ";
        // line 70
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 70, $this->source); })()), "color", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 71
            yield "                            <span class=\"badge\" style=\"background-color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 71, $this->source); })()), "color", [], "any", false, false, false, 71), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 71, $this->source); })()), "color", [], "any", false, false, false, 71), "html", null, true);
            yield "</span>
                        ";
        } else {
            // line 73
            yield "                            <span class=\"text-muted\">Aucune</span>
                        ";
        }
        // line 75
        yield "                    </dd>
                    
                    ";
        // line 77
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 77, $this->source); })()), "icon", [], "any", false, false, false, 77)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 78
            yield "                    <dt class=\"col-sm-3\">Icône :</dt>
                    <dd class=\"col-sm-9\">
                        <i class=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 80, $this->source); })()), "icon", [], "any", false, false, false, 80), "html", null, true);
            yield "\"></i> <code>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 80, $this->source); })()), "icon", [], "any", false, false, false, 80), "html", null, true);
            yield "</code>
                    </dd>
                    ";
        }
        // line 83
        yield "                    
                    <dt class=\"col-sm-3\">Ordre :</dt>
                    <dd class=\"col-sm-9\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 85, $this->source); })()), "menuOrder", [], "any", false, false, false, 85), "html", null, true);
        yield "</dd>
                    
                    <dt class=\"col-sm-3\">Articles :</dt>
                    <dd class=\"col-sm-9\">
                        <span class=\"badge bg-primary\">";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 89, $this->source); })()), "postCount", [], "any", false, false, false, 89), "html", null, true);
        yield "</span>
                        ";
        // line 90
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 90, $this->source); })()), "postCount", [], "any", false, false, false, 90) > 0)) {
            // line 91
            yield "                            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_index");
            yield "?category=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 91, $this->source); })()), "id", [], "any", false, false, false, 91), "html", null, true);
            yield "\" class=\"ms-2\">
                                Voir les articles
                            </a>
                        ";
        }
        // line 95
        yield "                    </dd>
                </dl>
            </div>
        </div>
        
        <!-- Sous-catégories -->
        ";
        // line 101
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 101, $this->source); })()), "children", [], "any", false, false, false, 101)) > 0)) {
            // line 102
            yield "        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Sous-catégories (";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 104, $this->source); })()), "children", [], "any", false, false, false, 104)), "html", null, true);
            yield ")</h5>
            </div>
            <div class=\"card-body p-0\">
                <div class=\"table-responsive\">
                    <table class=\"table table-hover mb-0\">
                        <thead class=\"table-light\">
                            <tr>
                                <th>Nom</th>
                                <th>Articles</th>
                                <th>Ordre</th>
                                <th width=\"100\">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 118, $this->source); })()), "children", [], "any", false, false, false, 118));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 119
                yield "                                ";
                $context["childTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["child"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 119, $this->source); })())], "method", false, false, false, 119);
                // line 120
                yield "                                <tr>
                                    <td>
                                        <div class=\"d-flex align-items-center\">
                                            ";
                // line 123
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["child"], "icon", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 124
                    yield "                                                <i class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "icon", [], "any", false, false, false, 124), "html", null, true);
                    yield " me-2\" 
                                                   ";
                    // line 125
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["child"], "color", [], "any", false, false, false, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "style=\"color: ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "color", [], "any", false, false, false, 125), "html", null, true);
                        yield "\"";
                    }
                    yield "></i>
                                            ";
                }
                // line 127
                yield "                                            ";
                yield (((($tmp = (isset($context["childTranslation"]) || array_key_exists("childTranslation", $context) ? $context["childTranslation"] : (function () { throw new RuntimeError('Variable "childTranslation" does not exist.', 127, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["childTranslation"]) || array_key_exists("childTranslation", $context) ? $context["childTranslation"] : (function () { throw new RuntimeError('Variable "childTranslation" does not exist.', 127, $this->source); })()), "name", [], "any", false, false, false, 127), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["child"], "id", [], "any", false, false, false, 127)), "html", null, true)));
                yield "
                                        </div>
                                    </td>
                                    <td>
                                        <span class=\"badge bg-secondary\">";
                // line 131
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "postCount", [], "any", false, false, false, 131), "html", null, true);
                yield "</span>
                                    </td>
                                    <td>";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "menuOrder", [], "any", false, false, false, 133), "html", null, true);
                yield "</td>
                                    <td>
                                        <div class=\"btn-group btn-group-sm\" role=\"group\">
                                            <a href=\"";
                // line 136
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["child"], "id", [], "any", false, false, false, 136)]), "html", null, true);
                yield "\" 
                                               class=\"btn btn-outline-primary\" title=\"Voir\">
                                                <i class=\"fas fa-eye\"></i>
                                            </a>
                                            <a href=\"";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["child"], "id", [], "any", false, false, false, 140)]), "html", null, true);
                yield "\" 
                                               class=\"btn btn-outline-secondary\" title=\"Modifier\">
                                                <i class=\"fas fa-edit\"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 148
            yield "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        ";
        }
        // line 154
        yield "        
        <!-- Métadonnées SEO -->
        ";
        // line 156
        if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 156, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 156, $this->source); })()), "metaTitle", [], "any", false, false, false, 156) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 156, $this->source); })()), "metaDescription", [], "any", false, false, false, 156)))) {
            // line 157
            yield "        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"fas fa-search me-1\"></i> Référencement SEO</h5>
            </div>
            <div class=\"card-body\">
                <dl class=\"row\">
                    ";
            // line 163
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 163, $this->source); })()), "metaTitle", [], "any", false, false, false, 163)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 164
                yield "                    <dt class=\"col-sm-3\">Titre SEO :</dt>
                    <dd class=\"col-sm-9\">";
                // line 165
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 165, $this->source); })()), "metaTitle", [], "any", false, false, false, 165), "html", null, true);
                yield "</dd>
                    ";
            }
            // line 167
            yield "                    
                    ";
            // line 168
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 168, $this->source); })()), "metaDescription", [], "any", false, false, false, 168)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 169
                yield "                    <dt class=\"col-sm-3\">Description SEO :</dt>
                    <dd class=\"col-sm-9\">";
                // line 170
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 170, $this->source); })()), "metaDescription", [], "any", false, false, false, 170), "html", null, true);
                yield "</dd>
                    ";
            }
            // line 172
            yield "                </dl>
            </div>
        </div>
        ";
        }
        // line 176
        yield "    </div>
    
    <div class=\"col-md-4\">
        <!-- Hiérarchie -->
        ";
        // line 180
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 180, $this->source); })()), "parent", [], "any", false, false, false, 180)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 181
            yield "        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-sitemap me-1\"></i> Hiérarchie</h6>
            </div>
            <div class=\"card-body\">
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb breadcrumb-sm\">
                        ";
            // line 188
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 188, $this->source); })()), "breadcrumb", [], "any", false, false, false, 188));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["ancestor"]) {
                // line 189
                yield "                            ";
                $context["ancestorTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 189, $this->source); })())], "method", false, false, false, 189);
                // line 190
                yield "                            <li class=\"breadcrumb-item ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 190)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
                yield "\">
                                ";
                // line 191
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 191)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 192
                    yield "                                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "id", [], "any", false, false, false, 192)]), "html", null, true);
                    yield "\">
                                        ";
                    // line 193
                    yield (((($tmp = (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 193, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 193, $this->source); })()), "name", [], "any", false, false, false, 193), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "id", [], "any", false, false, false, 193)), "html", null, true)));
                    yield "
                                    </a>
                                ";
                } else {
                    // line 196
                    yield "                                    ";
                    yield (((($tmp = (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 196, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 196, $this->source); })()), "name", [], "any", false, false, false, 196), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "id", [], "any", false, false, false, 196)), "html", null, true)));
                    yield "
                                ";
                }
                // line 198
                yield "                            </li>
                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['ancestor'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            yield "                    </ol>
                </nav>
            </div>
        </div>
        ";
        }
        // line 205
        yield "        
        <!-- Statistiques -->
        <div class=\"card ";
        // line 207
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 207, $this->source); })()), "parent", [], "any", false, false, false, 207)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("mt-3") : (""));
        yield "\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-chart-bar me-1\"></i> Statistiques</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\">
                    <strong>Articles :</strong> 
                    <span class=\"badge bg-primary\">";
        // line 214
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 214, $this->source); })()), "postCount", [], "any", false, false, false, 214), "html", null, true);
        yield "</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Sous-catégories :</strong> 
                    <span class=\"badge bg-secondary\">";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 218, $this->source); })()), "children", [], "any", false, false, false, 218)), "html", null, true);
        yield "</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Niveau :</strong> 
                    <span class=\"badge bg-info\">";
        // line 222
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 222, $this->source); })()), "level", [], "any", false, false, false, 222), "html", null, true);
        yield "</span>
                </p>
                <hr>
                <p class=\"mb-1\"><strong>Créée le :</strong></p>
                <small class=\"text-muted\">";
        // line 226
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 226, $this->source); })()), "createdAt", [], "any", false, false, false, 226), "d/m/Y H:i"), "html", null, true);
        yield "</small>
                ";
        // line 227
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 227, $this->source); })()), "updatedAt", [], "any", false, false, false, 227)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 228
            yield "                <p class=\"mb-1 mt-2\"><strong>Modifiée le :</strong></p>
                <small class=\"text-muted\">";
            // line 229
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 229, $this->source); })()), "updatedAt", [], "any", false, false, false, 229), "d/m/Y H:i"), "html", null, true);
            yield "</small>
                ";
        }
        // line 231
        yield "            </div>
        </div>
        
        <!-- Actions -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-tools me-1\"></i> Actions</h6>
            </div>
            <div class=\"card-body\">
                <a href=\"";
        // line 240
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 240, $this->source); })()), "id", [], "any", false, false, false, 240)]), "html", null, true);
        yield "\" class=\"btn btn-primary btn-sm d-block mb-2\">
                    <i class=\"fas fa-edit\"></i> Modifier la catégorie
                </a>
                
                <a href=\"";
        // line 244
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_new", ["parent" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 244, $this->source); })()), "id", [], "any", false, false, false, 244)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary btn-sm d-block mb-2\">
                    <i class=\"fas fa-plus\"></i> Ajouter une sous-catégorie
                </a>
                
                ";
        // line 248
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 248, $this->source); })()), "postCount", [], "any", false, false, false, 248) == 0)) {
            // line 249
            yield "                <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 249, $this->source); })()), "id", [], "any", false, false, false, 249)]), "html", null, true);
            yield "\" 
                      class=\"d-inline w-100\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cette catégorie ?')\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 251
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 251, $this->source); })()), "id", [], "any", false, false, false, 251))), "html", null, true);
            yield "\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm d-block\">
                        <i class=\"fas fa-trash\"></i> Supprimer
                    </button>
                </form>
                ";
        }
        // line 257
        yield "            </div>
        </div>
    </div>
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
        return "admin/categories/show.html.twig";
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
        return array (  636 => 257,  627 => 251,  621 => 249,  619 => 248,  612 => 244,  605 => 240,  594 => 231,  589 => 229,  586 => 228,  584 => 227,  580 => 226,  573 => 222,  566 => 218,  559 => 214,  549 => 207,  545 => 205,  538 => 200,  523 => 198,  517 => 196,  511 => 193,  506 => 192,  504 => 191,  499 => 190,  496 => 189,  479 => 188,  470 => 181,  468 => 180,  462 => 176,  456 => 172,  451 => 170,  448 => 169,  446 => 168,  443 => 167,  438 => 165,  435 => 164,  433 => 163,  425 => 157,  423 => 156,  419 => 154,  411 => 148,  397 => 140,  390 => 136,  384 => 133,  379 => 131,  371 => 127,  362 => 125,  357 => 124,  355 => 123,  350 => 120,  347 => 119,  343 => 118,  326 => 104,  322 => 102,  320 => 101,  312 => 95,  302 => 91,  300 => 90,  296 => 89,  289 => 85,  285 => 83,  277 => 80,  273 => 78,  271 => 77,  267 => 75,  263 => 73,  255 => 71,  253 => 70,  248 => 67,  243 => 65,  240 => 64,  238 => 63,  233 => 61,  227 => 58,  210 => 43,  200 => 39,  196 => 38,  192 => 37,  189 => 36,  185 => 35,  179 => 32,  171 => 27,  164 => 24,  155 => 22,  150 => 21,  148 => 20,  143 => 17,  141 => 16,  128 => 15,  113 => 10,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ translation ? translation.name : 'Catégorie #' ~ category.id }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_categories_index') }}\">Catégories</a></li>
        <li class=\"breadcrumb-item active\">{{ translation ? translation.name : 'Catégorie #' ~ category.id }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
{% set translation = category.getTranslationForLanguage(currentLanguage) %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0 d-flex align-items-center\">
        {% if category.icon %}
            <i class=\"{{ category.icon }} me-2\" 
               {% if category.color %}style=\"color: {{ category.color }}\"{% endif %}></i>
        {% endif %}
        {{ translation ? translation.name : 'Catégorie #' ~ category.id }}
    </h1>
    <div>
        <a href=\"{{ path('admin_categories_edit', {'id': category.id}) }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-edit\"></i> Modifier
        </a>
        <div class=\"dropdown d-inline-block ms-2\">
            <button class=\"btn btn-outline-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
            </button>
            <ul class=\"dropdown-menu dropdown-menu-end\">
                {% for language in availableLanguages %}
                    <li>
                        <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                           href=\"{{ path('admin_categories_show', {'id': category.id, 'language': language.code}) }}\">
                            {{ language.name }}
                        </a>
                    </li>
                {% endfor %}
            </ul>
        </div>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-md-8\">
        <!-- Informations principales -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Informations</h5>
            </div>
            <div class=\"card-body\">
                <dl class=\"row\">
                    <dt class=\"col-sm-3\">Nom :</dt>
                    <dd class=\"col-sm-9\">{{ translation ? translation.name : 'Catégorie #' ~ category.id }}</dd>
                    
                    <dt class=\"col-sm-3\">Slug :</dt>
                    <dd class=\"col-sm-9\"><code>{{ category.slug }}</code></dd>
                    
                    {% if translation and translation.description %}
                    <dt class=\"col-sm-3\">Description :</dt>
                    <dd class=\"col-sm-9\">{{ translation.description|nl2br }}</dd>
                    {% endif %}
                    
                    <dt class=\"col-sm-3\">Couleur :</dt>
                    <dd class=\"col-sm-9\">
                        {% if category.color %}
                            <span class=\"badge\" style=\"background-color: {{ category.color }}\">{{ category.color }}</span>
                        {% else %}
                            <span class=\"text-muted\">Aucune</span>
                        {% endif %}
                    </dd>
                    
                    {% if category.icon %}
                    <dt class=\"col-sm-3\">Icône :</dt>
                    <dd class=\"col-sm-9\">
                        <i class=\"{{ category.icon }}\"></i> <code>{{ category.icon }}</code>
                    </dd>
                    {% endif %}
                    
                    <dt class=\"col-sm-3\">Ordre :</dt>
                    <dd class=\"col-sm-9\">{{ category.menuOrder }}</dd>
                    
                    <dt class=\"col-sm-3\">Articles :</dt>
                    <dd class=\"col-sm-9\">
                        <span class=\"badge bg-primary\">{{ category.postCount }}</span>
                        {% if category.postCount > 0 %}
                            <a href=\"{{ path('admin_posts_index') }}?category={{ category.id }}\" class=\"ms-2\">
                                Voir les articles
                            </a>
                        {% endif %}
                    </dd>
                </dl>
            </div>
        </div>
        
        <!-- Sous-catégories -->
        {% if category.children|length > 0 %}
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Sous-catégories ({{ category.children|length }})</h5>
            </div>
            <div class=\"card-body p-0\">
                <div class=\"table-responsive\">
                    <table class=\"table table-hover mb-0\">
                        <thead class=\"table-light\">
                            <tr>
                                <th>Nom</th>
                                <th>Articles</th>
                                <th>Ordre</th>
                                <th width=\"100\">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for child in category.children %}
                                {% set childTranslation = child.getTranslationForLanguage(currentLanguage) %}
                                <tr>
                                    <td>
                                        <div class=\"d-flex align-items-center\">
                                            {% if child.icon %}
                                                <i class=\"{{ child.icon }} me-2\" 
                                                   {% if child.color %}style=\"color: {{ child.color }}\"{% endif %}></i>
                                            {% endif %}
                                            {{ childTranslation ? childTranslation.name : 'Catégorie #' ~ child.id }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class=\"badge bg-secondary\">{{ child.postCount }}</span>
                                    </td>
                                    <td>{{ child.menuOrder }}</td>
                                    <td>
                                        <div class=\"btn-group btn-group-sm\" role=\"group\">
                                            <a href=\"{{ path('admin_categories_show', {'id': child.id}) }}\" 
                                               class=\"btn btn-outline-primary\" title=\"Voir\">
                                                <i class=\"fas fa-eye\"></i>
                                            </a>
                                            <a href=\"{{ path('admin_categories_edit', {'id': child.id}) }}\" 
                                               class=\"btn btn-outline-secondary\" title=\"Modifier\">
                                                <i class=\"fas fa-edit\"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {% endif %}
        
        <!-- Métadonnées SEO -->
        {% if translation and (translation.metaTitle or translation.metaDescription) %}
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"fas fa-search me-1\"></i> Référencement SEO</h5>
            </div>
            <div class=\"card-body\">
                <dl class=\"row\">
                    {% if translation.metaTitle %}
                    <dt class=\"col-sm-3\">Titre SEO :</dt>
                    <dd class=\"col-sm-9\">{{ translation.metaTitle }}</dd>
                    {% endif %}
                    
                    {% if translation.metaDescription %}
                    <dt class=\"col-sm-3\">Description SEO :</dt>
                    <dd class=\"col-sm-9\">{{ translation.metaDescription }}</dd>
                    {% endif %}
                </dl>
            </div>
        </div>
        {% endif %}
    </div>
    
    <div class=\"col-md-4\">
        <!-- Hiérarchie -->
        {% if category.parent %}
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-sitemap me-1\"></i> Hiérarchie</h6>
            </div>
            <div class=\"card-body\">
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb breadcrumb-sm\">
                        {% for ancestor in category.breadcrumb %}
                            {% set ancestorTranslation = ancestor.getTranslationForLanguage(currentLanguage) %}
                            <li class=\"breadcrumb-item {{ loop.last ? 'active' : '' }}\">
                                {% if not loop.last %}
                                    <a href=\"{{ path('admin_categories_show', {'id': ancestor.id}) }}\">
                                        {{ ancestorTranslation ? ancestorTranslation.name : 'Catégorie #' ~ ancestor.id }}
                                    </a>
                                {% else %}
                                    {{ ancestorTranslation ? ancestorTranslation.name : 'Catégorie #' ~ ancestor.id }}
                                {% endif %}
                            </li>
                        {% endfor %}
                    </ol>
                </nav>
            </div>
        </div>
        {% endif %}
        
        <!-- Statistiques -->
        <div class=\"card {{ category.parent ? 'mt-3' : '' }}\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-chart-bar me-1\"></i> Statistiques</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\">
                    <strong>Articles :</strong> 
                    <span class=\"badge bg-primary\">{{ category.postCount }}</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Sous-catégories :</strong> 
                    <span class=\"badge bg-secondary\">{{ category.children|length }}</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Niveau :</strong> 
                    <span class=\"badge bg-info\">{{ category.level }}</span>
                </p>
                <hr>
                <p class=\"mb-1\"><strong>Créée le :</strong></p>
                <small class=\"text-muted\">{{ category.createdAt|date('d/m/Y H:i') }}</small>
                {% if category.updatedAt %}
                <p class=\"mb-1 mt-2\"><strong>Modifiée le :</strong></p>
                <small class=\"text-muted\">{{ category.updatedAt|date('d/m/Y H:i') }}</small>
                {% endif %}
            </div>
        </div>
        
        <!-- Actions -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-tools me-1\"></i> Actions</h6>
            </div>
            <div class=\"card-body\">
                <a href=\"{{ path('admin_categories_edit', {'id': category.id}) }}\" class=\"btn btn-primary btn-sm d-block mb-2\">
                    <i class=\"fas fa-edit\"></i> Modifier la catégorie
                </a>
                
                <a href=\"{{ path('admin_categories_new', {'parent': category.id}) }}\" class=\"btn btn-outline-secondary btn-sm d-block mb-2\">
                    <i class=\"fas fa-plus\"></i> Ajouter une sous-catégorie
                </a>
                
                {% if category.postCount == 0 %}
                <form method=\"post\" action=\"{{ path('admin_categories_delete', {'id': category.id}) }}\" 
                      class=\"d-inline w-100\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cette catégorie ?')\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ category.id) }}\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm d-block\">
                        <i class=\"fas fa-trash\"></i> Supprimer
                    </button>
                </form>
                {% endif %}
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "admin/categories/show.html.twig", "/workspace/symfpress/templates/admin/categories/show.html.twig");
    }
}
