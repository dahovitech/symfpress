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

/* admin/posts/form.html.twig */
class __TwigTemplate_aaf77294286d0fa36f1a11a776f37e41 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/posts/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/posts/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'article") : ("Nouvel article"));
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_index");
        yield "\">Articles</a></li>
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvel article"));
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
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .language-tabs .nav-link {
            border: 1px solid #dee2e6;
            border-bottom: none;
        }
        .language-tabs .nav-link.active {
            border-color: #0d6efd #0d6efd #fff #0d6efd;
            background-color: #fff;
        }
        .translation-content {
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 1rem;
            border-radius: 0 0 0.375rem 0.375rem;
        }
        .required-field {
            color: #dc3545;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 38
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

        // line 39
        yield "<div class=\"row\">
    <div class=\"col-md-8\">
        ";
        // line 41
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation", "novalidate" => true]]);
        yield "
        
        <!-- Informations générales -->
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\">";
        // line 46
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 46, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'article") : ("Nouvel article"));
        yield "</h5>
                <div class=\"dropdown\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-language me-1\"></i> ";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 49, $this->source); })()), "name", [], "any", false, false, false, 49), "html", null, true);
        yield "
                    </button>
                    <ul class=\"dropdown-menu dropdown-menu-end\">
                        ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 52, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 53
            yield "                            <li>
                                <a class=\"dropdown-item ";
            // line 54
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 54, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                                   href=\"";
            // line 55
            yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 55, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 55, $this->source); })()), "id", [], "any", false, false, false, 55), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 55)]), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_new", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 55)]), "html", null, true)));
            yield "\">
                                    ";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 56), "html", null, true);
            yield "
                                </a>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        yield "                    </ul>
                </div>
            </div>
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"col-md-8\">
                        ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 66, $this->source); })()), "code", [], "any", false, false, false, 66)) . "_title"), [], "array", false, false, false, 66), 'row');
        yield "
                    </div>
                    <div class=\"col-md-4\">
                        ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "slug", [], "any", false, false, false, 69), 'row');
        yield "
                    </div>
                </div>
                
                ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 73, $this->source); })()), "code", [], "any", false, false, false, 73)) . "_excerpt"), [], "array", false, false, false, 73), 'row');
        yield "
            </div>
        </div>

        <!-- Contenu de l'article avec onglets multilingues -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-edit me-1\"></i> Contenu de l'article</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 83
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 83, $this->source); })())) > 1)) {
            // line 84
            yield "                    <!-- Onglets des langues -->
                    <ul class=\"nav nav-tabs language-tabs\" id=\"languageTabs\" role=\"tablist\">
                        ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 86, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 87
                yield "                            <li class=\"nav-item\" role=\"presentation\">
                                <button class=\"nav-link ";
                // line 88
                yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 88, $this->source); })()))) ? ("active") : (""));
                yield "\" 
                                        id=\"lang-";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 89), "html", null, true);
                yield "-tab\" 
                                        data-bs-toggle=\"tab\" 
                                        data-bs-target=\"#lang-";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 91), "html", null, true);
                yield "\" 
                                        type=\"button\" role=\"tab\">
                                    ";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 93), "html", null, true);
                yield "
                                    ";
                // line 94
                if (($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 94, $this->source); })()))) {
                    // line 95
                    yield "                                        <span class=\"required-field\">*</span>
                                    ";
                }
                // line 97
                yield "                                </button>
                            </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            yield "                    </ul>
                    
                    <!-- Contenu des onglets -->
                    <div class=\"tab-content translation-content\" id=\"languageTabContent\">
                        ";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 104, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 105
                yield "                            <div class=\"tab-pane fade ";
                yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 105, $this->source); })()))) ? ("show active") : (""));
                yield "\" 
                                 id=\"lang-";
                // line 106
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 106), "html", null, true);
                yield "\" 
                                 role=\"tabpanel\">
                                
                                ";
                // line 109
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 109, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 109)) . "_content"), [], "array", false, false, false, 109), 'row');
                yield "
                                
                                <div class=\"mt-3\">
                                    <button type=\"button\" class=\"btn btn-outline-secondary btn-sm btn-add-media\" data-target=\"translation_";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 112), "html", null, true);
                yield "_content\">
                                        <i class=\"fas fa-plus me-1\"></i> Ajouter un média
                                    </button>
                                </div>
                                
                                <!-- Métadonnées SEO -->
                                <div class=\"mt-4\">
                                    <h6 class=\"border-bottom pb-2 mb-3\">Métadonnées SEO</h6>
                                    <div class=\"row\">
                                        <div class=\"col-md-6\">
                                            ";
                // line 122
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 122, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 122)) . "_metaTitle"), [], "array", false, false, false, 122), 'row');
                yield "
                                        </div>
                                        <div class=\"col-md-6\">
                                            ";
                // line 125
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 125, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 125)) . "_metaKeywords"), [], "array", false, false, false, 125), 'row');
                yield "
                                        </div>
                                    </div>
                                    ";
                // line 128
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 128, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 128)) . "_metaDescription"), [], "array", false, false, false, 128), 'row');
                yield "
                                </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            yield "                    </div>
                ";
        } else {
            // line 134
            yield "                    <!-- Mode monolingue -->
                    ";
            // line 135
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 135, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 135, $this->source); })()), "code", [], "any", false, false, false, 135)) . "_content"), [], "array", false, false, false, 135), 'row');
            yield "
                    
                    <div class=\"mt-3\">
                        <button type=\"button\" class=\"btn btn-outline-secondary btn-sm btn-add-media\" data-target=\"translation_";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 138, $this->source); })()), "code", [], "any", false, false, false, 138), "html", null, true);
            yield "_content\">
                            <i class=\"fas fa-plus me-1\"></i> Ajouter un média
                        </button>
                    </div>
                    
                    <!-- Métadonnées SEO -->
                    <div class=\"mt-4\">
                        <h6 class=\"border-bottom pb-2 mb-3\">Métadonnées SEO</h6>
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                ";
            // line 148
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 148, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 148, $this->source); })()), "code", [], "any", false, false, false, 148)) . "_metaTitle"), [], "array", false, false, false, 148), 'row');
            yield "
                            </div>
                            <div class=\"col-md-6\">
                                ";
            // line 151
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 151, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 151, $this->source); })()), "code", [], "any", false, false, false, 151)) . "_metaKeywords"), [], "array", false, false, false, 151), 'row');
            yield "
                            </div>
                        </div>
                        ";
            // line 154
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 154, $this->source); })()), (("translation_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 154, $this->source); })()), "code", [], "any", false, false, false, 154)) . "_metaDescription"), [], "array", false, false, false, 154), 'row');
            yield "
                    </div>
                ";
        }
        // line 157
        yield "            </div>
        </div>
        
        ";
        // line 160
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 160, $this->source); })()), 'form_end');
        yield "
    </div>
    
    <!-- Sidebar -->
    <div class=\"col-md-4\">
        <!-- Statut et publication -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-cogs me-1\"></i> Publication</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 171
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 171, $this->source); })()), "status", [], "any", false, false, false, 171), 'row');
        yield "
                ";
        // line 172
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 172, $this->source); })()), "publishedAt", [], "any", false, false, false, 172), 'row');
        yield "
                
                <div class=\"row\">
                    <div class=\"col-6\">
                        ";
        // line 176
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 176, $this->source); })()), "commentStatus", [], "any", false, false, false, 176), 'row');
        yield "
                    </div>
                    <div class=\"col-6\">
                        ";
        // line 179
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 179, $this->source); })()), "isFeatured", [], "any", false, false, false, 179), 'row');
        yield "
                    </div>
                </div>
                
                ";
        // line 183
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 183, $this->source); })()), "menuOrder", [], "any", false, false, false, 183), 'row');
        yield "
                
                <div class=\"d-grid gap-2 mt-3\">
                    ";
        // line 186
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 186, $this->source); })()), "save", [], "any", false, false, false, 186), 'widget');
        yield "
                </div>
            </div>
        </div>
        
        <!-- Image mise en avant -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-image me-1\"></i> Image mise en avant</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 197
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 197, $this->source); })()), "featuredImage", [], "any", false, false, false, 197), 'row');
        yield "
            </div>
        </div>
        
        <!-- Catégories -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-folder me-1\"></i> Catégories</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 207
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 207, $this->source); })()), "categories", [], "any", false, false, false, 207), 'row');
        yield "
            </div>
        </div>
        
        <!-- Tags -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-tags me-1\"></i> Tags</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 217
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 217, $this->source); })()), "tags", [], "any", false, false, false, 217), 'row');
        yield "
            </div>
        </div>
    </div>
</div>

<!-- Modal de sélection de médias -->
<div class=\"modal fade\" id=\"mediaModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-xl\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Sélectionner un média</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <!-- Le contenu sera chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 239
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

        // line 240
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets de langues
            const languageTabs = document.querySelectorAll('#languageTabs button[data-bs-toggle=\"tab\"]');
            languageTabs.forEach(tab => {
                tab.addEventListener('shown.bs.tab', function (event) {
                    console.log('Onglet activé:', event.target.getAttribute('data-bs-target'));
                });
            });
            
            // Gestion des boutons d'ajout de média
            const addMediaButtons = document.querySelectorAll('.btn-add-media');
            addMediaButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetField = this.getAttribute('data-target');
                    // Ouvrir le modal de sélection de média
                    // (à implémenter selon vos besoins)
                    console.log('Ajouter média pour le champ:', targetField);
                });
            });
            
            // Validation du formulaire
            const form = document.querySelector('.needs-validation');
            if (form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
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
        return "admin/posts/form.html.twig";
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
        return array (  557 => 240,  544 => 239,  512 => 217,  499 => 207,  486 => 197,  472 => 186,  466 => 183,  459 => 179,  453 => 176,  446 => 172,  442 => 171,  428 => 160,  423 => 157,  417 => 154,  411 => 151,  405 => 148,  392 => 138,  386 => 135,  383 => 134,  379 => 132,  369 => 128,  363 => 125,  357 => 122,  344 => 112,  338 => 109,  332 => 106,  327 => 105,  323 => 104,  317 => 100,  309 => 97,  305 => 95,  303 => 94,  299 => 93,  294 => 91,  289 => 89,  285 => 88,  282 => 87,  278 => 86,  274 => 84,  272 => 83,  259 => 73,  252 => 69,  246 => 66,  238 => 60,  228 => 56,  224 => 55,  220 => 54,  217 => 53,  213 => 52,  207 => 49,  201 => 46,  193 => 41,  189 => 39,  176 => 38,  143 => 16,  130 => 15,  115 => 10,  111 => 9,  107 => 8,  103 => 6,  90 => 5,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ isEdit ? 'Modifier l\\'article' : 'Nouvel article' }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_posts_index') }}\">Articles</a></li>
        <li class=\"breadcrumb-item active\">{{ isEdit ? 'Modifier' : 'Nouvel article' }}</li>
    </ol>
</nav>
{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .language-tabs .nav-link {
            border: 1px solid #dee2e6;
            border-bottom: none;
        }
        .language-tabs .nav-link.active {
            border-color: #0d6efd #0d6efd #fff #0d6efd;
            background-color: #fff;
        }
        .translation-content {
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 1rem;
            border-radius: 0 0 0.375rem 0.375rem;
        }
        .required-field {
            color: #dc3545;
        }
    </style>
{% endblock %}

{% block admin_content %}
<div class=\"row\">
    <div class=\"col-md-8\">
        {{ form_start(form, {'attr': {'class': 'needs-validation', 'novalidate': true}}) }}
        
        <!-- Informations générales -->
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\">{{ isEdit ? 'Modifier l\\'article' : 'Nouvel article' }}</h5>
                <div class=\"dropdown\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
                    </button>
                    <ul class=\"dropdown-menu dropdown-menu-end\">
                        {% for language in availableLanguages %}
                            <li>
                                <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                   href=\"{{ isEdit ? path('admin_posts_edit', {'id': post.id, 'language': language.code}) : path('admin_posts_new', {'language': language.code}) }}\">
                                    {{ language.name }}
                                </a>
                            </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"col-md-8\">
                        {{ form_row(form['translation_' ~ currentLanguage.code ~ '_title']) }}
                    </div>
                    <div class=\"col-md-4\">
                        {{ form_row(form.slug) }}
                    </div>
                </div>
                
                {{ form_row(form['translation_' ~ currentLanguage.code ~ '_excerpt']) }}
            </div>
        </div>

        <!-- Contenu de l'article avec onglets multilingues -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-edit me-1\"></i> Contenu de l'article</h6>
            </div>
            <div class=\"card-body\">
                {% if availableLanguages|length > 1 %}
                    <!-- Onglets des langues -->
                    <ul class=\"nav nav-tabs language-tabs\" id=\"languageTabs\" role=\"tablist\">
                        {% for language in availableLanguages %}
                            <li class=\"nav-item\" role=\"presentation\">
                                <button class=\"nav-link {{ language == currentLanguage ? 'active' : '' }}\" 
                                        id=\"lang-{{ language.code }}-tab\" 
                                        data-bs-toggle=\"tab\" 
                                        data-bs-target=\"#lang-{{ language.code }}\" 
                                        type=\"button\" role=\"tab\">
                                    {{ language.name }}
                                    {% if language == currentLanguage %}
                                        <span class=\"required-field\">*</span>
                                    {% endif %}
                                </button>
                            </li>
                        {% endfor %}
                    </ul>
                    
                    <!-- Contenu des onglets -->
                    <div class=\"tab-content translation-content\" id=\"languageTabContent\">
                        {% for language in availableLanguages %}
                            <div class=\"tab-pane fade {{ language == currentLanguage ? 'show active' : '' }}\" 
                                 id=\"lang-{{ language.code }}\" 
                                 role=\"tabpanel\">
                                
                                {{ form_row(form['translation_' ~ language.code ~ '_content']) }}
                                
                                <div class=\"mt-3\">
                                    <button type=\"button\" class=\"btn btn-outline-secondary btn-sm btn-add-media\" data-target=\"translation_{{ language.code }}_content\">
                                        <i class=\"fas fa-plus me-1\"></i> Ajouter un média
                                    </button>
                                </div>
                                
                                <!-- Métadonnées SEO -->
                                <div class=\"mt-4\">
                                    <h6 class=\"border-bottom pb-2 mb-3\">Métadonnées SEO</h6>
                                    <div class=\"row\">
                                        <div class=\"col-md-6\">
                                            {{ form_row(form['translation_' ~ language.code ~ '_metaTitle']) }}
                                        </div>
                                        <div class=\"col-md-6\">
                                            {{ form_row(form['translation_' ~ language.code ~ '_metaKeywords']) }}
                                        </div>
                                    </div>
                                    {{ form_row(form['translation_' ~ language.code ~ '_metaDescription']) }}
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                {% else %}
                    <!-- Mode monolingue -->
                    {{ form_row(form['translation_' ~ currentLanguage.code ~ '_content']) }}
                    
                    <div class=\"mt-3\">
                        <button type=\"button\" class=\"btn btn-outline-secondary btn-sm btn-add-media\" data-target=\"translation_{{ currentLanguage.code }}_content\">
                            <i class=\"fas fa-plus me-1\"></i> Ajouter un média
                        </button>
                    </div>
                    
                    <!-- Métadonnées SEO -->
                    <div class=\"mt-4\">
                        <h6 class=\"border-bottom pb-2 mb-3\">Métadonnées SEO</h6>
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                {{ form_row(form['translation_' ~ currentLanguage.code ~ '_metaTitle']) }}
                            </div>
                            <div class=\"col-md-6\">
                                {{ form_row(form['translation_' ~ currentLanguage.code ~ '_metaKeywords']) }}
                            </div>
                        </div>
                        {{ form_row(form['translation_' ~ currentLanguage.code ~ '_metaDescription']) }}
                    </div>
                {% endif %}
            </div>
        </div>
        
        {{ form_end(form) }}
    </div>
    
    <!-- Sidebar -->
    <div class=\"col-md-4\">
        <!-- Statut et publication -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-cogs me-1\"></i> Publication</h6>
            </div>
            <div class=\"card-body\">
                {{ form_row(form.status) }}
                {{ form_row(form.publishedAt) }}
                
                <div class=\"row\">
                    <div class=\"col-6\">
                        {{ form_row(form.commentStatus) }}
                    </div>
                    <div class=\"col-6\">
                        {{ form_row(form.isFeatured) }}
                    </div>
                </div>
                
                {{ form_row(form.menuOrder) }}
                
                <div class=\"d-grid gap-2 mt-3\">
                    {{ form_widget(form.save) }}
                </div>
            </div>
        </div>
        
        <!-- Image mise en avant -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-image me-1\"></i> Image mise en avant</h6>
            </div>
            <div class=\"card-body\">
                {{ form_row(form.featuredImage) }}
            </div>
        </div>
        
        <!-- Catégories -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-folder me-1\"></i> Catégories</h6>
            </div>
            <div class=\"card-body\">
                {{ form_row(form.categories) }}
            </div>
        </div>
        
        <!-- Tags -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-tags me-1\"></i> Tags</h6>
            </div>
            <div class=\"card-body\">
                {{ form_row(form.tags) }}
            </div>
        </div>
    </div>
</div>

<!-- Modal de sélection de médias -->
<div class=\"modal fade\" id=\"mediaModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-xl\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Sélectionner un média</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <!-- Le contenu sera chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets de langues
            const languageTabs = document.querySelectorAll('#languageTabs button[data-bs-toggle=\"tab\"]');
            languageTabs.forEach(tab => {
                tab.addEventListener('shown.bs.tab', function (event) {
                    console.log('Onglet activé:', event.target.getAttribute('data-bs-target'));
                });
            });
            
            // Gestion des boutons d'ajout de média
            const addMediaButtons = document.querySelectorAll('.btn-add-media');
            addMediaButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetField = this.getAttribute('data-target');
                    // Ouvrir le modal de sélection de média
                    // (à implémenter selon vos besoins)
                    console.log('Ajouter média pour le champ:', targetField);
                });
            });
            
            // Validation du formulaire
            const form = document.querySelector('.needs-validation');
            if (form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }
        });
    </script>
{% endblock %}
", "admin/posts/form.html.twig", "/workspace/symfpress/templates/admin/posts/form.html.twig");
    }
}
