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

/* admin/base.html.twig */
class __TwigTemplate_8040de37a342cff8803ddc346be615a2 extends Template
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
            'body_class' => [$this, 'block_body_class'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'page_title' => [$this, 'block_page_title'],
            'breadcrumb' => [$this, 'block_breadcrumb'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Administration - SymfPress";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_class(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        yield "admin-layout";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
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

        // line 8
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .admin-sidebar {
            min-height: 100vh;
            background-color: #2c3e50;
            color: white;
        }
        .admin-sidebar .nav-link {
            color: #bdc3c7;
            padding: 12px 20px;
            border-radius: 0;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background-color: #34495e;
            color: white;
        }
        .admin-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .admin-header {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        .language-selector .dropdown-toggle {
            background: none;
            border: 1px solid #6c757d;
            color: #6c757d;
            padding: 5px 15px;
            font-size: 0.875rem;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
        }
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
        .admin-stats .card {
            transition: transform 0.2s;
        }
        .admin-stats .card:hover {
            transform: translateY(-2px);
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 67
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 68
        yield "<div class=\"container-fluid\">
    <div class=\"row\">
        <!-- Sidebar -->
        <nav class=\"col-md-3 col-lg-2 admin-sidebar\">
            <div class=\"position-sticky pt-3\">
                <div class=\"text-center mb-4\">
                    <h4 class=\"mb-0\">SymfPress</h4>
                    <small class=\"text-muted\">Administration</small>
                </div>
                
                <ul class=\"nav flex-column\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 80
        yield (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "request", [], "any", false, false, false, 80), "get", ["_route"], "method", false, false, false, 80)) && is_string($_v1 = "admin_dashboard") && str_starts_with($_v0, $_v1))) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">
                            <i class=\"fas fa-tachometer-alt me-2\"></i> Tableau de bord
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 86
        yield (((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 86, $this->source); })()), "request", [], "any", false, false, false, 86), "get", ["_route"], "method", false, false, false, 86)) && is_string($_v3 = "admin_posts") && str_starts_with($_v2, $_v3))) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_index");
        yield "\">
                            <i class=\"fas fa-edit me-2\"></i> Articles
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 92
        yield (((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "request", [], "any", false, false, false, 92), "get", ["_route"], "method", false, false, false, 92)) && is_string($_v5 = "admin_pages") && str_starts_with($_v4, $_v5))) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_index");
        yield "\">
                            <i class=\"fas fa-file-alt me-2\"></i> Pages
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 98
        yield (((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "request", [], "any", false, false, false, 98), "get", ["_route"], "method", false, false, false, 98)) && is_string($_v7 = "admin_media") && str_starts_with($_v6, $_v7))) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index");
        yield "\">
                            <i class=\"fas fa-images me-2\"></i> Médias
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 104
        yield (((is_string($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 104, $this->source); })()), "request", [], "any", false, false, false, 104), "get", ["_route"], "method", false, false, false, 104)) && is_string($_v9 = "admin_comments") && str_starts_with($_v8, $_v9))) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index");
        yield "\">
                            <i class=\"fas fa-comments me-2\"></i> Commentaires
                        </a>
                    </li>
                    
                    ";
        // line 109
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 110
            yield "                    <hr class=\"my-3\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
            // line 112
            yield (((is_string($_v10 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 112, $this->source); })()), "request", [], "any", false, false, false, 112), "get", ["_route"], "method", false, false, false, 112)) && is_string($_v11 = "admin_categories") && str_starts_with($_v10, $_v11))) ? ("active") : (""));
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index");
            yield "\">
                            <i class=\"fas fa-folder me-2\"></i> Catégories
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
            // line 118
            yield (((is_string($_v12 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 118, $this->source); })()), "request", [], "any", false, false, false, 118), "get", ["_route"], "method", false, false, false, 118)) && is_string($_v13 = "admin_tags") && str_starts_with($_v12, $_v13))) ? ("active") : (""));
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_index");
            yield "\">
                            <i class=\"fas fa-tags me-2\"></i> Tags
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
            // line 124
            yield (((is_string($_v14 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 124, $this->source); })()), "request", [], "any", false, false, false, 124), "get", ["_route"], "method", false, false, false, 124)) && is_string($_v15 = "admin_menus") && str_starts_with($_v14, $_v15))) ? ("active") : (""));
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
            yield "\">
                            <i class=\"fas fa-bars me-2\"></i> Menus
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
            // line 130
            yield (((is_string($_v16 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 130, $this->source); })()), "request", [], "any", false, false, false, 130), "get", ["_route"], "method", false, false, false, 130)) && is_string($_v17 = "admin_users") && str_starts_with($_v16, $_v17))) ? ("active") : (""));
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
            yield "\">
                            <i class=\"fas fa-users me-2\"></i> Utilisateurs
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
            // line 136
            yield (((is_string($_v18 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 136, $this->source); })()), "request", [], "any", false, false, false, 136), "get", ["_route"], "method", false, false, false, 136)) && is_string($_v19 = "admin_languages") && str_starts_with($_v18, $_v19))) ? ("active") : (""));
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_languages_index");
            yield "\">
                            <i class=\"fas fa-language me-2\"></i> Langues
                        </a>
                    </li>
                    ";
        }
        // line 141
        yield "                </ul>
                
                <hr class=\"my-3\">
                <ul class=\"nav flex-column\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"";
        // line 146
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_home");
        yield "\" target=\"_blank\">
                            <i class=\"fas fa-external-link-alt me-2\"></i> Voir le site
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"";
        // line 151
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
                            <i class=\"fas fa-sign-out-alt me-2\"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Main content -->
        <main class=\"col-md-9 ms-sm-auto col-lg-10 admin-content\">
            <!-- Header -->
            <div class=\"admin-header\">
                <div class=\"d-flex justify-content-between align-items-center px-3\">
                    <div>
                        <h1 class=\"h4 mb-0\">";
        // line 165
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</h1>
                        ";
        // line 166
        yield from $this->unwrap()->yieldBlock('breadcrumb', $context, $blocks);
        // line 167
        yield "                    </div>
                    
                    <div class=\"d-flex align-items-center\">
                        <!-- Sélecteur de langue -->
                        ";
        // line 171
        if (((array_key_exists("availableLanguages", $context) && array_key_exists("currentLanguage", $context)) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 171, $this->source); })())) > 1))) {
            // line 172
            yield "                        <div class=\"language-selector me-3\">
                            <div class=\"dropdown\">
                                <button class=\"btn dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                                    <i class=\"fas fa-language me-1\"></i>
                                    ";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 176, $this->source); })()), "name", [], "any", false, false, false, 176), "html", null, true);
            yield "
                                </button>
                                <ul class=\"dropdown-menu\">
                                    ";
            // line 179
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 179, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 180
                yield "                                        <li>
                                            <a class=\"dropdown-item ";
                // line 181
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 181) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 181, $this->source); })()), "id", [], "any", false, false, false, 181))) ? ("active") : (""));
                yield "\" 
                                               href=\"";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_switch_language", ["code" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 182)]), "html", null, true);
                yield "\">
                                                ";
                // line 183
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 183), "html", null, true);
                yield "
                                            </a>
                                        </li>
                     
                     <!-- Extensions -->
                     <li class=\"nav-item dropdown\">
                         <a class=\"nav-link dropdown-toggle ";
                // line 189
                yield ((((is_string($_v20 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 189, $this->source); })()), "request", [], "any", false, false, false, 189), "get", ["_route"], "method", false, false, false, 189)) && is_string($_v21 = "admin_plugins") && str_starts_with($_v20, $_v21)) || (is_string($_v22 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 189, $this->source); })()), "request", [], "any", false, false, false, 189), "get", ["_route"], "method", false, false, false, 189)) && is_string($_v23 = "admin_themes") && str_starts_with($_v22, $_v23)))) ? ("active") : (""));
                yield "\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                             <i class=\"fas fa-puzzle-piece me-2\"></i> Extensions
                         </a>
                         <ul class=\"dropdown-menu\">
                             <li>
                                 <a class=\"dropdown-item ";
                // line 194
                yield (((is_string($_v24 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 194, $this->source); })()), "request", [], "any", false, false, false, 194), "get", ["_route"], "method", false, false, false, 194)) && is_string($_v25 = "admin_plugins") && str_starts_with($_v24, $_v25))) ? ("active") : (""));
                yield "\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_plugins_index");
                yield "\">
                                     <i class=\"fas fa-puzzle-piece me-2\"></i> Plugins
                                 </a>
                             </li>
                             <li>
                                 <a class=\"dropdown-item ";
                // line 199
                yield (((is_string($_v26 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 199, $this->source); })()), "request", [], "any", false, false, false, 199), "get", ["_route"], "method", false, false, false, 199)) && is_string($_v27 = "admin_themes") && str_starts_with($_v26, $_v27))) ? ("active") : (""));
                yield "\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_index");
                yield "\">
                                     <i class=\"fas fa-paint-brush me-2\"></i> Thèmes
                                 </a>
                             </li>
                         </ul>
                     </li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 206
            yield "                                </ul>
                            </div>
                        </div>
                        ";
        }
        // line 210
        yield "                        
                        <!-- Utilisateur connecté -->
                        <div class=\"dropdown\">
                            <button class=\"btn btn-outline-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                                <i class=\"fas fa-user me-1\"></i>
                                ";
        // line 215
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 215, $this->source); })()), "user", [], "any", false, false, false, 215), "displayName", [], "any", false, false, false, 215), "html", null, true);
        yield "
                            </button>
                            <ul class=\"dropdown-menu dropdown-menu-end\">
                                <li><a class=\"dropdown-item\" href=\"#\">Profil</a></li>
                                <li><a class=\"dropdown-item\" href=\"#\">Paramètres</a></li>
                                <li><hr class=\"dropdown-divider\"></li>
                                <li><a class=\"dropdown-item\" href=\"";
        // line 221
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Flash messages -->
            ";
        // line 229
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 229, $this->source); })()), "flashes", [], "any", false, false, false, 229));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 230
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 231
                yield "                    <div class=\"alert alert-";
                yield ((($context["type"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["type"], "html", null, true)));
                yield " alert-dismissible fade show m-3\" role=\"alert\">
                        ";
                // line 232
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 236
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['type'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 237
        yield "            
            <!-- Page content -->
            <div class=\"p-3\">
                ";
        // line 240
        yield from $this->unwrap()->yieldBlock('admin_content', $context, $blocks);
        // line 241
        yield "            </div>
        </main>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 165
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

        yield "Administration";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 166
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 240
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/base.html.twig";
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
        return array (  584 => 240,  562 => 166,  539 => 165,  524 => 241,  522 => 240,  517 => 237,  511 => 236,  501 => 232,  496 => 231,  491 => 230,  487 => 229,  476 => 221,  467 => 215,  460 => 210,  454 => 206,  439 => 199,  429 => 194,  421 => 189,  412 => 183,  408 => 182,  404 => 181,  401 => 180,  397 => 179,  391 => 176,  385 => 172,  383 => 171,  377 => 167,  375 => 166,  371 => 165,  354 => 151,  346 => 146,  339 => 141,  329 => 136,  318 => 130,  307 => 124,  296 => 118,  285 => 112,  281 => 110,  279 => 109,  269 => 104,  258 => 98,  247 => 92,  236 => 86,  225 => 80,  211 => 68,  198 => 67,  128 => 8,  115 => 7,  92 => 5,  69 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Administration - SymfPress{% endblock %}

{% block body_class %}admin-layout{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .admin-sidebar {
            min-height: 100vh;
            background-color: #2c3e50;
            color: white;
        }
        .admin-sidebar .nav-link {
            color: #bdc3c7;
            padding: 12px 20px;
            border-radius: 0;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background-color: #34495e;
            color: white;
        }
        .admin-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .admin-header {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        .language-selector .dropdown-toggle {
            background: none;
            border: 1px solid #6c757d;
            color: #6c757d;
            padding: 5px 15px;
            font-size: 0.875rem;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
        }
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
        .admin-stats .card {
            transition: transform 0.2s;
        }
        .admin-stats .card:hover {
            transform: translateY(-2px);
        }
    </style>
{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <div class=\"row\">
        <!-- Sidebar -->
        <nav class=\"col-md-3 col-lg-2 admin-sidebar\">
            <div class=\"position-sticky pt-3\">
                <div class=\"text-center mb-4\">
                    <h4 class=\"mb-0\">SymfPress</h4>
                    <small class=\"text-muted\">Administration</small>
                </div>
                
                <ul class=\"nav flex-column\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_dashboard' ? 'active' : '' }}\" href=\"{{ path('admin_dashboard') }}\">
                            <i class=\"fas fa-tachometer-alt me-2\"></i> Tableau de bord
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_posts' ? 'active' : '' }}\" href=\"{{ path('admin_posts_index') }}\">
                            <i class=\"fas fa-edit me-2\"></i> Articles
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_pages' ? 'active' : '' }}\" href=\"{{ path('admin_pages_index') }}\">
                            <i class=\"fas fa-file-alt me-2\"></i> Pages
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_media' ? 'active' : '' }}\" href=\"{{ path('admin_media_index') }}\">
                            <i class=\"fas fa-images me-2\"></i> Médias
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_comments' ? 'active' : '' }}\" href=\"{{ path('admin_comments_index') }}\">
                            <i class=\"fas fa-comments me-2\"></i> Commentaires
                        </a>
                    </li>
                    
                    {% if is_granted('ROLE_ADMIN') %}
                    <hr class=\"my-3\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_categories' ? 'active' : '' }}\" href=\"{{ path('admin_categories_index') }}\">
                            <i class=\"fas fa-folder me-2\"></i> Catégories
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_tags' ? 'active' : '' }}\" href=\"{{ path('admin_tags_index') }}\">
                            <i class=\"fas fa-tags me-2\"></i> Tags
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_menus' ? 'active' : '' }}\" href=\"{{ path('admin_menus_index') }}\">
                            <i class=\"fas fa-bars me-2\"></i> Menus
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_users' ? 'active' : '' }}\" href=\"{{ path('admin_users_index') }}\">
                            <i class=\"fas fa-users me-2\"></i> Utilisateurs
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'admin_languages' ? 'active' : '' }}\" href=\"{{ path('admin_languages_index') }}\">
                            <i class=\"fas fa-language me-2\"></i> Langues
                        </a>
                    </li>
                    {% endif %}
                </ul>
                
                <hr class=\"my-3\">
                <ul class=\"nav flex-column\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{{ path('frontend_home') }}\" target=\"_blank\">
                            <i class=\"fas fa-external-link-alt me-2\"></i> Voir le site
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{{ path('app_logout') }}\">
                            <i class=\"fas fa-sign-out-alt me-2\"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Main content -->
        <main class=\"col-md-9 ms-sm-auto col-lg-10 admin-content\">
            <!-- Header -->
            <div class=\"admin-header\">
                <div class=\"d-flex justify-content-between align-items-center px-3\">
                    <div>
                        <h1 class=\"h4 mb-0\">{% block page_title %}Administration{% endblock %}</h1>
                        {% block breadcrumb %}{% endblock %}
                    </div>
                    
                    <div class=\"d-flex align-items-center\">
                        <!-- Sélecteur de langue -->
                        {% if availableLanguages is defined and currentLanguage is defined and availableLanguages|length > 1 %}
                        <div class=\"language-selector me-3\">
                            <div class=\"dropdown\">
                                <button class=\"btn dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                                    <i class=\"fas fa-language me-1\"></i>
                                    {{ currentLanguage.name }}
                                </button>
                                <ul class=\"dropdown-menu\">
                                    {% for language in availableLanguages %}
                                        <li>
                                            <a class=\"dropdown-item {{ language.id == currentLanguage.id ? 'active' : '' }}\" 
                                               href=\"{{ path('admin_switch_language', {'code': language.code}) }}\">
                                                {{ language.name }}
                                            </a>
                                        </li>
                     
                     <!-- Extensions -->
                     <li class=\"nav-item dropdown\">
                         <a class=\"nav-link dropdown-toggle {{ app.request.get('_route') starts with 'admin_plugins' or app.request.get('_route') starts with 'admin_themes' ? 'active' : '' }}\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                             <i class=\"fas fa-puzzle-piece me-2\"></i> Extensions
                         </a>
                         <ul class=\"dropdown-menu\">
                             <li>
                                 <a class=\"dropdown-item {{ app.request.get('_route') starts with 'admin_plugins' ? 'active' : '' }}\" href=\"{{ path('admin_plugins_index') }}\">
                                     <i class=\"fas fa-puzzle-piece me-2\"></i> Plugins
                                 </a>
                             </li>
                             <li>
                                 <a class=\"dropdown-item {{ app.request.get('_route') starts with 'admin_themes' ? 'active' : '' }}\" href=\"{{ path('admin_themes_index') }}\">
                                     <i class=\"fas fa-paint-brush me-2\"></i> Thèmes
                                 </a>
                             </li>
                         </ul>
                     </li>
                                    {% endfor %}
                                </ul>
                            </div>
                        </div>
                        {% endif %}
                        
                        <!-- Utilisateur connecté -->
                        <div class=\"dropdown\">
                            <button class=\"btn btn-outline-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                                <i class=\"fas fa-user me-1\"></i>
                                {{ app.user.displayName }}
                            </button>
                            <ul class=\"dropdown-menu dropdown-menu-end\">
                                <li><a class=\"dropdown-item\" href=\"#\">Profil</a></li>
                                <li><a class=\"dropdown-item\" href=\"#\">Paramètres</a></li>
                                <li><hr class=\"dropdown-divider\"></li>
                                <li><a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Flash messages -->
            {% for type, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ type == 'error' ? 'danger' : type }} alert-dismissible fade show m-3\" role=\"alert\">
                        {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endfor %}
            {% endfor %}
            
            <!-- Page content -->
            <div class=\"p-3\">
                {% block admin_content %}{% endblock %}
            </div>
        </main>
    </div>
</div>
{% endblock %}", "admin/base.html.twig", "/workspace/symfpress/templates/admin/base.html.twig");
    }
}
