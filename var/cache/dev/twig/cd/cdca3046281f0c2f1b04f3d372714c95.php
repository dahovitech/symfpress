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

/* admin/menus/form.html.twig */
class __TwigTemplate_395200d36ef0f03be666564da5da4ce1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menus/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'élément de menu") : ("Nouvel élément de menu"));
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index");
        yield "\">Menus</a></li>
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvel élément"));
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
        yield "<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
            <div class=\"card\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">";
        // line 21
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 21, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'élément de menu") : ("Nouvel élément de menu"));
        yield "</h5>
                    <div class=\"dropdown\">
                        <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                            <i class=\"fas fa-language me-1\"></i> ";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 24, $this->source); })()), "name", [], "any", false, false, false, 24), "html", null, true);
        yield "
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 28
            yield "                                <li>
                                    <a class=\"dropdown-item ";
            // line 29
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 29, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                                       href=\"";
            // line 30
            yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 30, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 30, $this->source); })()), "id", [], "any", false, false, false, 30), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 30)]), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_new", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 30)]), "html", null, true)));
            yield "\">
                                        ";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 31), "html", null, true);
            yield "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        yield "                        </ul>
                    </div>
                </div>
                <div class=\"card-body\">
                    ";
        // line 39
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 39, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 39, $this->source); })())], "method", false, false, false, 39);
        // line 40
        yield "                    
                    <div class=\"mb-3\">
                        <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" 
                               value=\"";
        // line 44
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 44, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 44, $this->source); })()), "title", [], "any", false, false, false, 44), "html", null, true)) : (""));
        yield "\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un titre pour l'élément de menu.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"2\">";
        // line 50
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 50, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 50, $this->source); })()), "description", [], "any", false, false, false, 50), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description pour les lecteurs d'écran (optionnel).</div>
                    </div>
                </div>
            </div>
            
            <!-- Type et contenu -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-link me-1\"></i> Type et destination</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"type\" class=\"form-label\">Type de lien <span class=\"text-danger\">*</span></label>
                        <select class=\"form-select\" id=\"type\" name=\"type\" required onchange=\"toggleContentFields()\">
                            ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["menuTypes"]) || array_key_exists("menuTypes", $context) ? $context["menuTypes"] : (function () { throw new RuntimeError('Variable "menuTypes" does not exist.', 65, $this->source); })()));
        foreach ($context['_seq'] as $context["typeValue"] => $context["typeLabel"]) {
            // line 66
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["typeValue"], "html", null, true);
            yield "\" ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 66, $this->source); })()), "type", [], "any", false, false, false, 66) == $context["typeValue"])) ? ("selected") : (""));
            yield ">
                                    ";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["typeLabel"], "html", null, true);
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['typeValue'], $context['typeLabel'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        yield "                        </select>
                    </div>
                    
                    <!-- Lien personnalisé -->
                    <div class=\"mb-3\" id=\"custom-url-field\" style=\"display: none;\">
                        <label for=\"url\" class=\"form-label\">URL personnalisée</label>
                        <input type=\"url\" class=\"form-control\" id=\"url\" name=\"url\" 
                               value=\"";
        // line 77
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["menu"] ?? null), "url", [], "any", true, true, false, 77) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 77, $this->source); })()), "url", [], "any", false, false, false, 77)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 77, $this->source); })()), "url", [], "any", false, false, false, 77), "html", null, true)) : (""));
        yield "\" placeholder=\"https://\">
                        <div class=\"form-text\">URL complète vers la destination.</div>
                    </div>
                    
                    <!-- Sélection de page -->
                    <div class=\"mb-3\" id=\"page-field\" style=\"display: none;\">
                        <label for=\"page_id\" class=\"form-label\">Page</label>
                        <select class=\"form-select\" id=\"page_id\" name=\"page_id\">
                            <option value=\"\">Sélectionner une page</option>
                            ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 86, $this->source); })()), "pages", [], "any", false, false, false, 86));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 87
            yield "                                ";
            $context["pageTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 87, $this->source); })())], "method", false, false, false, 87);
            // line 88
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 88), "html", null, true);
            yield "\" 
                                        ";
            // line 89
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 89, $this->source); })()), "page", [], "any", false, false, false, 89) && (CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 89) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 89, $this->source); })()), "page", [], "any", false, false, false, 89), "id", [], "any", false, false, false, 89)))) ? ("selected") : (""));
            yield ">
                                    ";
            // line 90
            yield (((($tmp = (isset($context["pageTranslation"]) || array_key_exists("pageTranslation", $context) ? $context["pageTranslation"] : (function () { throw new RuntimeError('Variable "pageTranslation" does not exist.', 90, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pageTranslation"]) || array_key_exists("pageTranslation", $context) ? $context["pageTranslation"] : (function () { throw new RuntimeError('Variable "pageTranslation" does not exist.', 90, $this->source); })()), "title", [], "any", false, false, false, 90), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Page #" . CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 90)), "html", null, true)));
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        yield "                        </select>
                    </div>
                    
                    <!-- Sélection d'article -->
                    <div class=\"mb-3\" id=\"post-field\" style=\"display: none;\">
                        <label for=\"post_id\" class=\"form-label\">Article</label>
                        <select class=\"form-select\" id=\"post_id\" name=\"post_id\">
                            <option value=\"\">Sélectionner un article</option>
                            ";
        // line 101
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 101, $this->source); })()), "posts", [], "any", false, false, false, 101));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 102
            yield "                                ";
            $context["postTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 102, $this->source); })())], "method", false, false, false, 102);
            // line 103
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 103), "html", null, true);
            yield "\" 
                                        ";
            // line 104
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 104, $this->source); })()), "post", [], "any", false, false, false, 104) && (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 104) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 104, $this->source); })()), "post", [], "any", false, false, false, 104), "id", [], "any", false, false, false, 104)))) ? ("selected") : (""));
            yield ">
                                    ";
            // line 105
            yield (((($tmp = (isset($context["postTranslation"]) || array_key_exists("postTranslation", $context) ? $context["postTranslation"] : (function () { throw new RuntimeError('Variable "postTranslation" does not exist.', 105, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["postTranslation"]) || array_key_exists("postTranslation", $context) ? $context["postTranslation"] : (function () { throw new RuntimeError('Variable "postTranslation" does not exist.', 105, $this->source); })()), "title", [], "any", false, false, false, 105), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Article #" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 105)), "html", null, true)));
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        yield "                        </select>
                    </div>
                    
                    <!-- Sélection de catégorie -->
                    <div class=\"mb-3\" id=\"category-field\" style=\"display: none;\">
                        <label for=\"category_id\" class=\"form-label\">Catégorie</label>
                        <select class=\"form-select\" id=\"category_id\" name=\"category_id\">
                            <option value=\"\">Sélectionner une catégorie</option>
                            ";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 116, $this->source); })()), "categories", [], "any", false, false, false, 116));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 117
            yield "                                ";
            $context["categoryTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 117, $this->source); })())], "method", false, false, false, 117);
            // line 118
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 118), "html", null, true);
            yield "\" 
                                        ";
            // line 119
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 119, $this->source); })()), "category", [], "any", false, false, false, 119) && (CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 119) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 119, $this->source); })()), "category", [], "any", false, false, false, 119), "id", [], "any", false, false, false, 119)))) ? ("selected") : (""));
            yield ">
                                    ";
            // line 120
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(0, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "level", [], "any", false, false, false, 120)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 121
                yield "                                        ";
                if (($context["i"] > 0)) {
                    yield "—";
                }
                // line 122
                yield "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            yield "                                    ";
            yield (((($tmp = (isset($context["categoryTranslation"]) || array_key_exists("categoryTranslation", $context) ? $context["categoryTranslation"] : (function () { throw new RuntimeError('Variable "categoryTranslation" does not exist.', 123, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["categoryTranslation"]) || array_key_exists("categoryTranslation", $context) ? $context["categoryTranslation"] : (function () { throw new RuntimeError('Variable "categoryTranslation" does not exist.', 123, $this->source); })()), "name", [], "any", false, false, false, 123), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 123)), "html", null, true)));
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        yield "                        </select>
                    </div>
                    
                    <!-- Sélection de tag -->
                    <div class=\"mb-3\" id=\"tag-field\" style=\"display: none;\">
                        <label for=\"tag_id\" class=\"form-label\">Tag</label>
                        <select class=\"form-select\" id=\"tag_id\" name=\"tag_id\">
                            <option value=\"\">Sélectionner un tag</option>
                            ";
        // line 134
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableContent"]) || array_key_exists("availableContent", $context) ? $context["availableContent"] : (function () { throw new RuntimeError('Variable "availableContent" does not exist.', 134, $this->source); })()), "tags", [], "any", false, false, false, 134));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 135
            yield "                                ";
            $context["tagTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 135, $this->source); })())], "method", false, false, false, 135);
            // line 136
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 136), "html", null, true);
            yield "\" 
                                        ";
            // line 137
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 137, $this->source); })()), "tag", [], "any", false, false, false, 137) && (CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 137) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 137, $this->source); })()), "tag", [], "any", false, false, false, 137), "id", [], "any", false, false, false, 137)))) ? ("selected") : (""));
            yield ">
                                    ";
            // line 138
            yield (((($tmp = (isset($context["tagTranslation"]) || array_key_exists("tagTranslation", $context) ? $context["tagTranslation"] : (function () { throw new RuntimeError('Variable "tagTranslation" does not exist.', 138, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tagTranslation"]) || array_key_exists("tagTranslation", $context) ? $context["tagTranslation"] : (function () { throw new RuntimeError('Variable "tagTranslation" does not exist.', 138, $this->source); })()), "name", [], "any", false, false, false, 138), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Tag #" . CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 138)), "html", null, true)));
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 141
        yield "                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Paramètres avancés -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-cog me-1\"></i> Paramètres avancés</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"location\" class=\"form-label\">Emplacement</label>
                                <select class=\"form-select\" id=\"location\" name=\"location\">
                                    ";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["locations"]) || array_key_exists("locations", $context) ? $context["locations"] : (function () { throw new RuntimeError('Variable "locations" does not exist.', 157, $this->source); })()));
        foreach ($context['_seq'] as $context["locationKey"] => $context["locationLabel"]) {
            // line 158
            yield "                                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["locationKey"], "html", null, true);
            yield "\" 
                                                ";
            // line 159
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 159, $this->source); })()), "location", [], "any", false, false, false, 159) == $context["locationKey"])) ? ("selected") : (""));
            yield ">
                                            ";
            // line 160
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["locationLabel"], "html", null, true);
            yield "
                                        </option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['locationKey'], $context['locationLabel'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        yield "                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"parent_id\" class=\"form-label\">Élément parent</label>
                                <select class=\"form-select\" id=\"parent_id\" name=\"parent_id\">
                                    <option value=\"\">Aucun (élément racine)</option>
                                    ";
        // line 171
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableParents"]) || array_key_exists("availableParents", $context) ? $context["availableParents"] : (function () { throw new RuntimeError('Variable "availableParents" does not exist.', 171, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["parent"]) {
            // line 172
            yield "                                        ";
            $context["parentTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 172, $this->source); })())], "method", false, false, false, 172);
            // line 173
            yield "                                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "id", [], "any", false, false, false, 173), "html", null, true);
            yield "\" 
                                                ";
            // line 174
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 174, $this->source); })()), "parent", [], "any", false, false, false, 174) && (CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "id", [], "any", false, false, false, 174) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 174, $this->source); })()), "parent", [], "any", false, false, false, 174), "id", [], "any", false, false, false, 174)))) ? ("selected") : (""));
            yield ">
                                            ";
            // line 175
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(0, CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "level", [], "any", false, false, false, 175)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 176
                yield "                                                ";
                if (($context["i"] > 0)) {
                    yield "—";
                }
                // line 177
                yield "                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 178
            yield "                                            ";
            yield (((($tmp = (isset($context["parentTranslation"]) || array_key_exists("parentTranslation", $context) ? $context["parentTranslation"] : (function () { throw new RuntimeError('Variable "parentTranslation" does not exist.', 178, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentTranslation"]) || array_key_exists("parentTranslation", $context) ? $context["parentTranslation"] : (function () { throw new RuntimeError('Variable "parentTranslation" does not exist.', 178, $this->source); })()), "title", [], "any", false, false, false, 178), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "generateDefaultTitle", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 178, $this->source); })())], "method", false, false, false, 178), "html", null, true)));
            yield "
                                        </option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['parent'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        yield "                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"mb-3\">
                                <label for=\"menu_order\" class=\"form-label\">Ordre d'affichage</label>
                                <input type=\"number\" class=\"form-control\" id=\"menu_order\" name=\"menu_order\" 
                                       value=\"";
        // line 191
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["menu"] ?? null), "menuOrder", [], "any", true, true, false, 191) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 191, $this->source); })()), "menuOrder", [], "any", false, false, false, 191)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 191, $this->source); })()), "menuOrder", [], "any", false, false, false, 191), "html", null, true)) : (0));
        yield "\" min=\"0\">
                            </div>
                        </div>
                        <div class=\"col-md-4\">
                            <div class=\"mb-3\">
                                <label for=\"target\" class=\"form-label\">Cible</label>
                                <select class=\"form-select\" id=\"target\" name=\"target\">
                                    <option value=\"_self\" ";
        // line 198
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 198, $this->source); })()), "target", [], "any", false, false, false, 198) == "_self")) ? ("selected") : (""));
        yield ">Même fenêtre</option>
                                    <option value=\"_blank\" ";
        // line 199
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 199, $this->source); })()), "target", [], "any", false, false, false, 199) == "_blank")) ? ("selected") : (""));
        yield ">Nouvelle fenêtre</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-4\">
                            <div class=\"mb-3\">
                                <label for=\"css_class\" class=\"form-label\">Classe CSS</label>
                                <input type=\"text\" class=\"form-control\" id=\"css_class\" name=\"css_class\" 
                                       value=\"";
        // line 207
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["menu"] ?? null), "cssClass", [], "any", true, true, false, 207) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 207, $this->source); })()), "cssClass", [], "any", false, false, false, 207)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 207, $this->source); })()), "cssClass", [], "any", false, false, false, 207), "html", null, true)) : (""));
        yield "\" placeholder=\"ma-classe\">
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"is_active\" name=\"is_active\" 
                               ";
        // line 214
        yield (((($tmp = (((CoreExtension::getAttribute($this->env, $this->source, ($context["menu"] ?? null), "isActive", [], "any", true, true, false, 214) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 214, $this->source); })()), "isActive", [], "any", false, false, false, 214)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 214, $this->source); })()), "isActive", [], "any", false, false, false, 214)) : (true))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("checked") : (""));
        yield ">
                        <label class=\"form-check-label\" for=\"is_active\">
                            Élément actif
                        </label>
                        <div class=\"form-text\">Les éléments inactifs ne s'affichent pas dans le menu.</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"";
        // line 224
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menus_index", ["location" => (((CoreExtension::getAttribute($this->env, $this->source, ($context["menu"] ?? null), "location", [], "any", true, true, false, 224) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 224, $this->source); })()), "location", [], "any", false, false, false, 224)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 224, $this->source); })()), "location", [], "any", false, false, false, 224)) : ("primary"))]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> ";
        // line 228
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 228, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Créer"));
        yield "
                </button>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Aperçu -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-eye me-1\"></i> Aperçu</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"menu-preview\">
                    <a href=\"#\" class=\"nav-link\" id=\"menu-preview-link\">
                        <span id=\"menu-preview-title\">";
        // line 243
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 243, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 243, $this->source); })()), "title", [], "any", false, false, false, 243), "html", null, true)) : ("Titre du menu"));
        yield "</span>
                    </a>
                </div>
                <div class=\"form-text\">Aperçu de l'élément dans le menu</div>
            </div>
        </div>
        
        <!-- Informations -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 256
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 256, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 257
            yield "                <p class=\"mb-2\"><strong>Type :</strong> 
                    ";
            // line 258
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 258, $this->source); })()), "type", [], "any", false, false, false, 258) == "home")) {
                yield "Accueil
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 259
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 259, $this->source); })()), "type", [], "any", false, false, false, 259) == "page")) {
                yield "Page
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 260
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 260, $this->source); })()), "type", [], "any", false, false, false, 260) == "post")) {
                yield "Article
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 261
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 261, $this->source); })()), "type", [], "any", false, false, false, 261) == "category")) {
                yield "Catégorie
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 262
(isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 262, $this->source); })()), "type", [], "any", false, false, false, 262) == "tag")) {
                yield "Tag
                    ";
            } else {
                // line 263
                yield "Personnalisé";
            }
            // line 264
            yield "                </p>
                <p class=\"mb-2\"><strong>Emplacement :</strong> ";
            // line 265
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["locations"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 265, $this->source); })()), "location", [], "any", false, false, false, 265), [], "array", true, true, false, 265) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["locations"]) || array_key_exists("locations", $context) ? $context["locations"] : (function () { throw new RuntimeError('Variable "locations" does not exist.', 265, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 265, $this->source); })()), "location", [], "any", false, false, false, 265), [], "array", false, false, false, 265)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["locations"]) || array_key_exists("locations", $context) ? $context["locations"] : (function () { throw new RuntimeError('Variable "locations" does not exist.', 265, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 265, $this->source); })()), "location", [], "any", false, false, false, 265), [], "array", false, false, false, 265), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 265, $this->source); })()), "location", [], "any", false, false, false, 265), "html", null, true)));
            yield "</p>
                <hr>
                <p class=\"mb-1\"><strong>Créé le :</strong></p>
                <small class=\"text-muted\">";
            // line 268
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 268, $this->source); })()), "createdAt", [], "any", false, false, false, 268), "d/m/Y H:i"), "html", null, true);
            yield "</small>
                ";
            // line 269
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 269, $this->source); })()), "updatedAt", [], "any", false, false, false, 269)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 270
                yield "                <p class=\"mb-1 mt-2\"><strong>Modifié le :</strong></p>
                <small class=\"text-muted\">";
                // line 271
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new RuntimeError('Variable "menu" does not exist.', 271, $this->source); })()), "updatedAt", [], "any", false, false, false, 271), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                ";
            }
            // line 273
            yield "                ";
        } else {
            // line 274
            yield "                <p class=\"text-muted\">Nouvel élément - les informations apparaitront après la création.</p>
                ";
        }
        // line 276
        yield "            </div>
        </div>
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Types de liens</h6>
                <p class=\"small text-muted mb-3\">Choisissez le type approprié selon la destination souhaitée.</p>
                
                <h6>Hiérarchie</h6>
                <p class=\"small text-muted mb-3\">Utilisez les éléments parents pour créer des sous-menus.</p>
                
                <h6>Ordre</h6>
                <p class=\"small text-muted mb-0\">L'ordre détermine la position dans le menu (0 = premier).</p>
            </div>
        </div>
    </div>
</div>

<script>
// Validation du formulaire
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Afficher/masquer les champs selon le type
function toggleContentFields() {
    const type = document.getElementById('type').value;
    
    // Masquer tous les champs
    document.getElementById('custom-url-field').style.display = 'none';
    document.getElementById('page-field').style.display = 'none';
    document.getElementById('post-field').style.display = 'none';
    document.getElementById('category-field').style.display = 'none';
    document.getElementById('tag-field').style.display = 'none';
    
    // Afficher le champ approprié
    switch(type) {
        case 'custom':
            document.getElementById('custom-url-field').style.display = 'block';
            break;
        case 'page':
            document.getElementById('page-field').style.display = 'block';
            break;
        case 'post':
            document.getElementById('post-field').style.display = 'block';
            break;
        case 'category':
            document.getElementById('category-field').style.display = 'block';
            break;
        case 'tag':
            document.getElementById('tag-field').style.display = 'block';
            break;
    }
}

// Mettre à jour l'aperçu
function updatePreview() {
    const title = document.getElementById('title').value || 'Titre du menu';
    document.getElementById('menu-preview-title').textContent = title;
}

// Initialiser
document.addEventListener('DOMContentLoaded', function() {
    toggleContentFields();
    updatePreview();
    
    // Écouter les changements
    document.getElementById('title').addEventListener('input', updatePreview);
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
        return "admin/menus/form.html.twig";
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
        return array (  664 => 276,  660 => 274,  657 => 273,  652 => 271,  649 => 270,  647 => 269,  643 => 268,  637 => 265,  634 => 264,  631 => 263,  626 => 262,  622 => 261,  618 => 260,  614 => 259,  610 => 258,  607 => 257,  605 => 256,  589 => 243,  571 => 228,  564 => 224,  551 => 214,  541 => 207,  530 => 199,  526 => 198,  516 => 191,  504 => 181,  494 => 178,  488 => 177,  483 => 176,  479 => 175,  475 => 174,  470 => 173,  467 => 172,  463 => 171,  453 => 163,  444 => 160,  440 => 159,  435 => 158,  431 => 157,  413 => 141,  404 => 138,  400 => 137,  395 => 136,  392 => 135,  388 => 134,  378 => 126,  368 => 123,  362 => 122,  357 => 121,  353 => 120,  349 => 119,  344 => 118,  341 => 117,  337 => 116,  327 => 108,  318 => 105,  314 => 104,  309 => 103,  306 => 102,  302 => 101,  292 => 93,  283 => 90,  279 => 89,  274 => 88,  271 => 87,  267 => 86,  255 => 77,  246 => 70,  237 => 67,  230 => 66,  226 => 65,  208 => 50,  199 => 44,  193 => 40,  191 => 39,  185 => 35,  175 => 31,  171 => 30,  167 => 29,  164 => 28,  160 => 27,  154 => 24,  148 => 21,  141 => 16,  128 => 15,  113 => 10,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ isEdit ? 'Modifier l\\'élément de menu' : 'Nouvel élément de menu' }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_menus_index') }}\">Menus</a></li>
        <li class=\"breadcrumb-item active\">{{ isEdit ? 'Modifier' : 'Nouvel élément' }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
            <div class=\"card\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">{{ isEdit ? 'Modifier l\\'élément de menu' : 'Nouvel élément de menu' }}</h5>
                    <div class=\"dropdown\">
                        <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                            <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            {% for language in availableLanguages %}
                                <li>
                                    <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                       href=\"{{ isEdit ? path('admin_menus_edit', {'id': menu.id, 'language': language.code}) : path('admin_menus_new', {'language': language.code}) }}\">
                                        {{ language.name }}
                                    </a>
                                </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
                <div class=\"card-body\">
                    {% set translation = menu.getTranslationForLanguage(currentLanguage) %}
                    
                    <div class=\"mb-3\">
                        <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" 
                               value=\"{{ translation ? translation.title : '' }}\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un titre pour l'élément de menu.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"2\">{{ translation ? translation.description : '' }}</textarea>
                        <div class=\"form-text\">Description pour les lecteurs d'écran (optionnel).</div>
                    </div>
                </div>
            </div>
            
            <!-- Type et contenu -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-link me-1\"></i> Type et destination</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"type\" class=\"form-label\">Type de lien <span class=\"text-danger\">*</span></label>
                        <select class=\"form-select\" id=\"type\" name=\"type\" required onchange=\"toggleContentFields()\">
                            {% for typeValue, typeLabel in menuTypes %}
                                <option value=\"{{ typeValue }}\" {{ menu.type == typeValue ? 'selected' : '' }}>
                                    {{ typeLabel }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                    
                    <!-- Lien personnalisé -->
                    <div class=\"mb-3\" id=\"custom-url-field\" style=\"display: none;\">
                        <label for=\"url\" class=\"form-label\">URL personnalisée</label>
                        <input type=\"url\" class=\"form-control\" id=\"url\" name=\"url\" 
                               value=\"{{ menu.url ?? '' }}\" placeholder=\"https://\">
                        <div class=\"form-text\">URL complète vers la destination.</div>
                    </div>
                    
                    <!-- Sélection de page -->
                    <div class=\"mb-3\" id=\"page-field\" style=\"display: none;\">
                        <label for=\"page_id\" class=\"form-label\">Page</label>
                        <select class=\"form-select\" id=\"page_id\" name=\"page_id\">
                            <option value=\"\">Sélectionner une page</option>
                            {% for page in availableContent.pages %}
                                {% set pageTranslation = page.getTranslationForLanguage(currentLanguage) %}
                                <option value=\"{{ page.id }}\" 
                                        {{ menu.page and page.id == menu.page.id ? 'selected' : '' }}>
                                    {{ pageTranslation ? pageTranslation.title : 'Page #' ~ page.id }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                    
                    <!-- Sélection d'article -->
                    <div class=\"mb-3\" id=\"post-field\" style=\"display: none;\">
                        <label for=\"post_id\" class=\"form-label\">Article</label>
                        <select class=\"form-select\" id=\"post_id\" name=\"post_id\">
                            <option value=\"\">Sélectionner un article</option>
                            {% for post in availableContent.posts %}
                                {% set postTranslation = post.getTranslationForLanguage(currentLanguage) %}
                                <option value=\"{{ post.id }}\" 
                                        {{ menu.post and post.id == menu.post.id ? 'selected' : '' }}>
                                    {{ postTranslation ? postTranslation.title : 'Article #' ~ post.id }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                    
                    <!-- Sélection de catégorie -->
                    <div class=\"mb-3\" id=\"category-field\" style=\"display: none;\">
                        <label for=\"category_id\" class=\"form-label\">Catégorie</label>
                        <select class=\"form-select\" id=\"category_id\" name=\"category_id\">
                            <option value=\"\">Sélectionner une catégorie</option>
                            {% for category in availableContent.categories %}
                                {% set categoryTranslation = category.getTranslationForLanguage(currentLanguage) %}
                                <option value=\"{{ category.id }}\" 
                                        {{ menu.category and category.id == menu.category.id ? 'selected' : '' }}>
                                    {% for i in 0..category.level %}
                                        {% if i > 0 %}—{% endif %}
                                    {% endfor %}
                                    {{ categoryTranslation ? categoryTranslation.name : 'Catégorie #' ~ category.id }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                    
                    <!-- Sélection de tag -->
                    <div class=\"mb-3\" id=\"tag-field\" style=\"display: none;\">
                        <label for=\"tag_id\" class=\"form-label\">Tag</label>
                        <select class=\"form-select\" id=\"tag_id\" name=\"tag_id\">
                            <option value=\"\">Sélectionner un tag</option>
                            {% for tag in availableContent.tags %}
                                {% set tagTranslation = tag.getTranslationForLanguage(currentLanguage) %}
                                <option value=\"{{ tag.id }}\" 
                                        {{ menu.tag and tag.id == menu.tag.id ? 'selected' : '' }}>
                                    {{ tagTranslation ? tagTranslation.name : 'Tag #' ~ tag.id }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Paramètres avancés -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-cog me-1\"></i> Paramètres avancés</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"location\" class=\"form-label\">Emplacement</label>
                                <select class=\"form-select\" id=\"location\" name=\"location\">
                                    {% for locationKey, locationLabel in locations %}
                                        <option value=\"{{ locationKey }}\" 
                                                {{ menu.location == locationKey ? 'selected' : '' }}>
                                            {{ locationLabel }}
                                        </option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"parent_id\" class=\"form-label\">Élément parent</label>
                                <select class=\"form-select\" id=\"parent_id\" name=\"parent_id\">
                                    <option value=\"\">Aucun (élément racine)</option>
                                    {% for parent in availableParents %}
                                        {% set parentTranslation = parent.getTranslationForLanguage(currentLanguage) %}
                                        <option value=\"{{ parent.id }}\" 
                                                {{ menu.parent and parent.id == menu.parent.id ? 'selected' : '' }}>
                                            {% for i in 0..parent.level %}
                                                {% if i > 0 %}—{% endif %}
                                            {% endfor %}
                                            {{ parentTranslation ? parentTranslation.title : parent.generateDefaultTitle(currentLanguage) }}
                                        </option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"mb-3\">
                                <label for=\"menu_order\" class=\"form-label\">Ordre d'affichage</label>
                                <input type=\"number\" class=\"form-control\" id=\"menu_order\" name=\"menu_order\" 
                                       value=\"{{ menu.menuOrder ?? 0 }}\" min=\"0\">
                            </div>
                        </div>
                        <div class=\"col-md-4\">
                            <div class=\"mb-3\">
                                <label for=\"target\" class=\"form-label\">Cible</label>
                                <select class=\"form-select\" id=\"target\" name=\"target\">
                                    <option value=\"_self\" {{ menu.target == '_self' ? 'selected' : '' }}>Même fenêtre</option>
                                    <option value=\"_blank\" {{ menu.target == '_blank' ? 'selected' : '' }}>Nouvelle fenêtre</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-4\">
                            <div class=\"mb-3\">
                                <label for=\"css_class\" class=\"form-label\">Classe CSS</label>
                                <input type=\"text\" class=\"form-control\" id=\"css_class\" name=\"css_class\" 
                                       value=\"{{ menu.cssClass ?? '' }}\" placeholder=\"ma-classe\">
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"is_active\" name=\"is_active\" 
                               {{ menu.isActive ?? true ? 'checked' : '' }}>
                        <label class=\"form-check-label\" for=\"is_active\">
                            Élément actif
                        </label>
                        <div class=\"form-text\">Les éléments inactifs ne s'affichent pas dans le menu.</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"{{ path('admin_menus_index', {'location': menu.location ?? 'primary'}) }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> {{ isEdit ? 'Modifier' : 'Créer' }}
                </button>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Aperçu -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-eye me-1\"></i> Aperçu</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"menu-preview\">
                    <a href=\"#\" class=\"nav-link\" id=\"menu-preview-link\">
                        <span id=\"menu-preview-title\">{{ translation ? translation.title : 'Titre du menu' }}</span>
                    </a>
                </div>
                <div class=\"form-text\">Aperçu de l'élément dans le menu</div>
            </div>
        </div>
        
        <!-- Informations -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                {% if isEdit %}
                <p class=\"mb-2\"><strong>Type :</strong> 
                    {% if menu.type == 'home' %}Accueil
                    {% elseif menu.type == 'page' %}Page
                    {% elseif menu.type == 'post' %}Article
                    {% elseif menu.type == 'category' %}Catégorie
                    {% elseif menu.type == 'tag' %}Tag
                    {% else %}Personnalisé{% endif %}
                </p>
                <p class=\"mb-2\"><strong>Emplacement :</strong> {{ locations[menu.location] ?? menu.location }}</p>
                <hr>
                <p class=\"mb-1\"><strong>Créé le :</strong></p>
                <small class=\"text-muted\">{{ menu.createdAt|date('d/m/Y H:i') }}</small>
                {% if menu.updatedAt %}
                <p class=\"mb-1 mt-2\"><strong>Modifié le :</strong></p>
                <small class=\"text-muted\">{{ menu.updatedAt|date('d/m/Y H:i') }}</small>
                {% endif %}
                {% else %}
                <p class=\"text-muted\">Nouvel élément - les informations apparaitront après la création.</p>
                {% endif %}
            </div>
        </div>
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Types de liens</h6>
                <p class=\"small text-muted mb-3\">Choisissez le type approprié selon la destination souhaitée.</p>
                
                <h6>Hiérarchie</h6>
                <p class=\"small text-muted mb-3\">Utilisez les éléments parents pour créer des sous-menus.</p>
                
                <h6>Ordre</h6>
                <p class=\"small text-muted mb-0\">L'ordre détermine la position dans le menu (0 = premier).</p>
            </div>
        </div>
    </div>
</div>

<script>
// Validation du formulaire
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Afficher/masquer les champs selon le type
function toggleContentFields() {
    const type = document.getElementById('type').value;
    
    // Masquer tous les champs
    document.getElementById('custom-url-field').style.display = 'none';
    document.getElementById('page-field').style.display = 'none';
    document.getElementById('post-field').style.display = 'none';
    document.getElementById('category-field').style.display = 'none';
    document.getElementById('tag-field').style.display = 'none';
    
    // Afficher le champ approprié
    switch(type) {
        case 'custom':
            document.getElementById('custom-url-field').style.display = 'block';
            break;
        case 'page':
            document.getElementById('page-field').style.display = 'block';
            break;
        case 'post':
            document.getElementById('post-field').style.display = 'block';
            break;
        case 'category':
            document.getElementById('category-field').style.display = 'block';
            break;
        case 'tag':
            document.getElementById('tag-field').style.display = 'block';
            break;
    }
}

// Mettre à jour l'aperçu
function updatePreview() {
    const title = document.getElementById('title').value || 'Titre du menu';
    document.getElementById('menu-preview-title').textContent = title;
}

// Initialiser
document.addEventListener('DOMContentLoaded', function() {
    toggleContentFields();
    updatePreview();
    
    // Écouter les changements
    document.getElementById('title').addEventListener('input', updatePreview);
});
</script>
{% endblock %}
", "admin/menus/form.html.twig", "/workspace/symfpress/templates/admin/menus/form.html.twig");
    }
}
