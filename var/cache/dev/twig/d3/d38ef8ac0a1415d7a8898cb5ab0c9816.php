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

/* admin/categories/form.html.twig */
class __TwigTemplate_d745167a10e0aa64092904e1ba837a31 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier la catégorie") : ("Nouvelle catégorie"));
        
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
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvelle catégorie"));
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
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 21, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier la catégorie") : ("Nouvelle catégorie"));
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
            yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 30, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 30, $this->source); })()), "id", [], "any", false, false, false, 30), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 30)]), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_new", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 30)]), "html", null, true)));
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
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 39, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 39, $this->source); })())], "method", false, false, false, 39);
        // line 40
        yield "                    
                    <div class=\"mb-3\">
                        <label for=\"name\" class=\"form-label\">Nom <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" 
                               value=\"";
        // line 44
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 44, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 44, $this->source); })()), "name", [], "any", false, false, false, 44), "html", null, true)) : (""));
        yield "\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un nom de catégorie.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"";
        // line 51
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "slug", [], "any", true, true, false, 51) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 51, $this->source); })()), "slug", [], "any", false, false, false, 51)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 51, $this->source); })()), "slug", [], "any", false, false, false, 51), "html", null, true)) : (""));
        yield "\" 
                               ";
        // line 52
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 52, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
        yield ">
                        <div class=\"form-text\">Le slug sera généré automatiquement si laissé vide.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"3\">";
        // line 58
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 58, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 58, $this->source); })()), "description", [], "any", false, false, false, 58), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description de la catégorie (optionnel).</div>
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
                                <label for=\"parent_id\" class=\"form-label\">Catégorie parente</label>
                                <select class=\"form-select\" id=\"parent_id\" name=\"parent_id\">
                                    <option value=\"\">Aucune (catégorie racine)</option>
                                    ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableParents"]) || array_key_exists("availableParents", $context) ? $context["availableParents"] : (function () { throw new RuntimeError('Variable "availableParents" does not exist.', 76, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["parent"]) {
            // line 77
            yield "                                        ";
            $context["parentTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 77, $this->source); })())], "method", false, false, false, 77);
            // line 78
            yield "                                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "id", [], "any", false, false, false, 78), "html", null, true);
            yield "\" 
                                                ";
            // line 79
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 79, $this->source); })()), "parent", [], "any", false, false, false, 79) && (CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "id", [], "any", false, false, false, 79) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 79, $this->source); })()), "parent", [], "any", false, false, false, 79), "id", [], "any", false, false, false, 79)))) ? ("selected") : (""));
            yield ">
                                            ";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(0, CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "level", [], "any", false, false, false, 80)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 81
                yield "                                                ";
                if (($context["i"] > 0)) {
                    yield "—";
                }
                // line 82
                yield "                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            yield "                                            ";
            yield (((($tmp = (isset($context["parentTranslation"]) || array_key_exists("parentTranslation", $context) ? $context["parentTranslation"] : (function () { throw new RuntimeError('Variable "parentTranslation" does not exist.', 83, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentTranslation"]) || array_key_exists("parentTranslation", $context) ? $context["parentTranslation"] : (function () { throw new RuntimeError('Variable "parentTranslation" does not exist.', 83, $this->source); })()), "name", [], "any", false, false, false, 83), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["parent"], "id", [], "any", false, false, false, 83)), "html", null, true)));
            yield "
                                        </option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['parent'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        yield "                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"menu_order\" class=\"form-label\">Ordre d'affichage</label>
                                <input type=\"number\" class=\"form-control\" id=\"menu_order\" name=\"menu_order\" 
                                       value=\"";
        // line 93
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "menuOrder", [], "any", true, true, false, 93) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 93, $this->source); })()), "menuOrder", [], "any", false, false, false, 93)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 93, $this->source); })()), "menuOrder", [], "any", false, false, false, 93), "html", null, true)) : (0));
        yield "\" min=\"0\">
                                <div class=\"form-text\">Position dans les listes (0 = premier).</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"color\" class=\"form-label\">Couleur</label>
                                <input type=\"color\" class=\"form-control form-control-color\" id=\"color\" name=\"color\" 
                                       value=\"";
        // line 104
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "color", [], "any", true, true, false, 104) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 104, $this->source); })()), "color", [], "any", false, false, false, 104)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 104, $this->source); })()), "color", [], "any", false, false, false, 104), "html", null, true)) : ("#007bff"));
        yield "\">
                                <div class=\"form-text\">Couleur associée à la catégorie.</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"icon\" class=\"form-label\">Icône</label>
                                <input type=\"text\" class=\"form-control\" id=\"icon\" name=\"icon\" 
                                       value=\"";
        // line 112
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "icon", [], "any", true, true, false, 112) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 112, $this->source); })()), "icon", [], "any", false, false, false, 112)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 112, $this->source); })()), "icon", [], "any", false, false, false, 112), "html", null, true)) : (""));
        yield "\" 
                                       placeholder=\"fas fa-folder\">
                                <div class=\"form-text\">Classe CSS FontAwesome (optionnel).</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- SEO -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-search me-1\"></i> Référencement SEO</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"meta_title\" class=\"form-label\">Titre SEO</label>
                        <input type=\"text\" class=\"form-control\" id=\"meta_title\" name=\"meta_title\" 
                               value=\"";
        // line 130
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 130, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 130, $this->source); })()), "metaTitle", [], "any", false, false, false, 130), "html", null, true)) : (""));
        yield "\" maxlength=\"60\">
                        <div class=\"form-text\">Titre affiché dans les résultats de recherche (60 caractères max)</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"meta_description\" class=\"form-label\">Description SEO</label>
                        <textarea class=\"form-control\" id=\"meta_description\" name=\"meta_description\" rows=\"2\" maxlength=\"160\">";
        // line 136
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 136, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 136, $this->source); })()), "metaDescription", [], "any", false, false, false, 136), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description affichée dans les résultats de recherche (160 caractères max)</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"";
        // line 143
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> ";
        // line 147
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 147, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Créer"));
        yield "
                </button>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Statut -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 160
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 160, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 161
            yield "                <p class=\"mb-2\"><strong>Articles :</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 161, $this->source); })()), "postCount", [], "any", false, false, false, 161), "html", null, true);
            yield "</p>
                <p class=\"mb-2\"><strong>Créée le :</strong> ";
            // line 162
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 162, $this->source); })()), "createdAt", [], "any", false, false, false, 162), "d/m/Y H:i"), "html", null, true);
            yield "</p>
                ";
            // line 163
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 163, $this->source); })()), "updatedAt", [], "any", false, false, false, 163)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 164
                yield "                <p class=\"mb-0\"><strong>Modifiée le :</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 164, $this->source); })()), "updatedAt", [], "any", false, false, false, 164), "d/m/Y H:i"), "html", null, true);
                yield "</p>
                ";
            }
            // line 166
            yield "                ";
        } else {
            // line 167
            yield "                <p class=\"text-muted\">Nouvelle catégorie - les informations apparaitront après la création.</p>
                ";
        }
        // line 169
        yield "            </div>
        </div>
        
        <!-- Hiérarchie -->
        ";
        // line 173
        if (((isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 173, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 173, $this->source); })()), "parent", [], "any", false, false, false, 173))) {
            // line 174
            yield "        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-sitemap me-1\"></i> Hiérarchie</h6>
            </div>
            <div class=\"card-body\">
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb breadcrumb-sm\">
                        ";
            // line 181
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 181, $this->source); })()), "breadcrumb", [], "any", false, false, false, 181));
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
                // line 182
                yield "                            ";
                $context["ancestorTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 182, $this->source); })())], "method", false, false, false, 182);
                // line 183
                yield "                            <li class=\"breadcrumb-item ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 183)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
                yield "\">
                                ";
                // line 184
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 184)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 185
                    yield "                                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "id", [], "any", false, false, false, 185)]), "html", null, true);
                    yield "\">
                                        ";
                    // line 186
                    yield (((($tmp = (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 186, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 186, $this->source); })()), "name", [], "any", false, false, false, 186), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "id", [], "any", false, false, false, 186)), "html", null, true)));
                    yield "
                                    </a>
                                ";
                } else {
                    // line 189
                    yield "                                    ";
                    yield (((($tmp = (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 189, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ancestorTranslation"]) || array_key_exists("ancestorTranslation", $context) ? $context["ancestorTranslation"] : (function () { throw new RuntimeError('Variable "ancestorTranslation" does not exist.', 189, $this->source); })()), "name", [], "any", false, false, false, 189), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["ancestor"], "id", [], "any", false, false, false, 189)), "html", null, true)));
                    yield "
                                ";
                }
                // line 191
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
            // line 193
            yield "                    </ol>
                </nav>
            </div>
        </div>
        ";
        }
        // line 198
        yield "        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Catégories vs Tags</h6>
                <p class=\"small text-muted mb-3\">Les catégories sont hiérarchiques et permettent d'organiser les articles, contrairement aux tags qui sont des mots-clés libres.</p>
                
                <h6>Hiérarchie</h6>
                <p class=\"small text-muted mb-3\">Une catégorie peut avoir une catégorie parente pour créer une arborescence.</p>
                
                <h6>SEO</h6>
                <p class=\"small text-muted mb-0\">Optimisez le titre et la description pour améliorer le référencement.</p>
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

// Génération automatique du slug
document.getElementById('name').addEventListener('input', function() {
    const slugField = document.getElementById('slug');
    if (!slugField.readOnly && slugField.value === '') {
        const slug = this.value
            .toLowerCase()
            .replace(/[àáâãäå]/g, 'a')
            .replace(/[èéêë]/g, 'e')
            .replace(/[ìíîï]/g, 'i')
            .replace(/[òóôõö]/g, 'o')
            .replace(/[ùúûü]/g, 'u')
            .replace(/[ç]/g, 'c')
            .replace(/[ñ]/g, 'n')
            .replace(/[^\\w\\s-]/g, '')
            .replace(/[\\s_-]+/g, '-')
            .replace(/^-+|-+\$/g, '');
        slugField.value = slug;
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
        return "admin/categories/form.html.twig";
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
        return array (  490 => 198,  483 => 193,  468 => 191,  462 => 189,  456 => 186,  451 => 185,  449 => 184,  444 => 183,  441 => 182,  424 => 181,  415 => 174,  413 => 173,  407 => 169,  403 => 167,  400 => 166,  394 => 164,  392 => 163,  388 => 162,  383 => 161,  381 => 160,  365 => 147,  358 => 143,  348 => 136,  339 => 130,  318 => 112,  307 => 104,  293 => 93,  284 => 86,  274 => 83,  268 => 82,  263 => 81,  259 => 80,  255 => 79,  250 => 78,  247 => 77,  243 => 76,  222 => 58,  213 => 52,  209 => 51,  199 => 44,  193 => 40,  191 => 39,  185 => 35,  175 => 31,  171 => 30,  167 => 29,  164 => 28,  160 => 27,  154 => 24,  148 => 21,  141 => 16,  128 => 15,  113 => 10,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ isEdit ? 'Modifier la catégorie' : 'Nouvelle catégorie' }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_categories_index') }}\">Catégories</a></li>
        <li class=\"breadcrumb-item active\">{{ isEdit ? 'Modifier' : 'Nouvelle catégorie' }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
            <div class=\"card\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">{{ isEdit ? 'Modifier la catégorie' : 'Nouvelle catégorie' }}</h5>
                    <div class=\"dropdown\">
                        <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                            <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            {% for language in availableLanguages %}
                                <li>
                                    <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                       href=\"{{ isEdit ? path('admin_categories_edit', {'id': category.id, 'language': language.code}) : path('admin_categories_new', {'language': language.code}) }}\">
                                        {{ language.name }}
                                    </a>
                                </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
                <div class=\"card-body\">
                    {% set translation = category.getTranslationForLanguage(currentLanguage) %}
                    
                    <div class=\"mb-3\">
                        <label for=\"name\" class=\"form-label\">Nom <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" 
                               value=\"{{ translation ? translation.name : '' }}\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un nom de catégorie.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"{{ category.slug ?? '' }}\" 
                               {{ isEdit ? 'readonly' : '' }}>
                        <div class=\"form-text\">Le slug sera généré automatiquement si laissé vide.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"3\">{{ translation ? translation.description : '' }}</textarea>
                        <div class=\"form-text\">Description de la catégorie (optionnel).</div>
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
                                <label for=\"parent_id\" class=\"form-label\">Catégorie parente</label>
                                <select class=\"form-select\" id=\"parent_id\" name=\"parent_id\">
                                    <option value=\"\">Aucune (catégorie racine)</option>
                                    {% for parent in availableParents %}
                                        {% set parentTranslation = parent.getTranslationForLanguage(currentLanguage) %}
                                        <option value=\"{{ parent.id }}\" 
                                                {{ category.parent and parent.id == category.parent.id ? 'selected' : '' }}>
                                            {% for i in 0..parent.level %}
                                                {% if i > 0 %}—{% endif %}
                                            {% endfor %}
                                            {{ parentTranslation ? parentTranslation.name : 'Catégorie #' ~ parent.id }}
                                        </option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"menu_order\" class=\"form-label\">Ordre d'affichage</label>
                                <input type=\"number\" class=\"form-control\" id=\"menu_order\" name=\"menu_order\" 
                                       value=\"{{ category.menuOrder ?? 0 }}\" min=\"0\">
                                <div class=\"form-text\">Position dans les listes (0 = premier).</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"color\" class=\"form-label\">Couleur</label>
                                <input type=\"color\" class=\"form-control form-control-color\" id=\"color\" name=\"color\" 
                                       value=\"{{ category.color ?? '#007bff' }}\">
                                <div class=\"form-text\">Couleur associée à la catégorie.</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"icon\" class=\"form-label\">Icône</label>
                                <input type=\"text\" class=\"form-control\" id=\"icon\" name=\"icon\" 
                                       value=\"{{ category.icon ?? '' }}\" 
                                       placeholder=\"fas fa-folder\">
                                <div class=\"form-text\">Classe CSS FontAwesome (optionnel).</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- SEO -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-search me-1\"></i> Référencement SEO</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"meta_title\" class=\"form-label\">Titre SEO</label>
                        <input type=\"text\" class=\"form-control\" id=\"meta_title\" name=\"meta_title\" 
                               value=\"{{ translation ? translation.metaTitle : '' }}\" maxlength=\"60\">
                        <div class=\"form-text\">Titre affiché dans les résultats de recherche (60 caractères max)</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"meta_description\" class=\"form-label\">Description SEO</label>
                        <textarea class=\"form-control\" id=\"meta_description\" name=\"meta_description\" rows=\"2\" maxlength=\"160\">{{ translation ? translation.metaDescription : '' }}</textarea>
                        <div class=\"form-text\">Description affichée dans les résultats de recherche (160 caractères max)</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"{{ path('admin_categories_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> {{ isEdit ? 'Modifier' : 'Créer' }}
                </button>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Statut -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                {% if isEdit %}
                <p class=\"mb-2\"><strong>Articles :</strong> {{ category.postCount }}</p>
                <p class=\"mb-2\"><strong>Créée le :</strong> {{ category.createdAt|date('d/m/Y H:i') }}</p>
                {% if category.updatedAt %}
                <p class=\"mb-0\"><strong>Modifiée le :</strong> {{ category.updatedAt|date('d/m/Y H:i') }}</p>
                {% endif %}
                {% else %}
                <p class=\"text-muted\">Nouvelle catégorie - les informations apparaitront après la création.</p>
                {% endif %}
            </div>
        </div>
        
        <!-- Hiérarchie -->
        {% if isEdit and category.parent %}
        <div class=\"card mt-3\">
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
                                    <a href=\"{{ path('admin_categories_edit', {'id': ancestor.id}) }}\">
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
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Catégories vs Tags</h6>
                <p class=\"small text-muted mb-3\">Les catégories sont hiérarchiques et permettent d'organiser les articles, contrairement aux tags qui sont des mots-clés libres.</p>
                
                <h6>Hiérarchie</h6>
                <p class=\"small text-muted mb-3\">Une catégorie peut avoir une catégorie parente pour créer une arborescence.</p>
                
                <h6>SEO</h6>
                <p class=\"small text-muted mb-0\">Optimisez le titre et la description pour améliorer le référencement.</p>
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

// Génération automatique du slug
document.getElementById('name').addEventListener('input', function() {
    const slugField = document.getElementById('slug');
    if (!slugField.readOnly && slugField.value === '') {
        const slug = this.value
            .toLowerCase()
            .replace(/[àáâãäå]/g, 'a')
            .replace(/[èéêë]/g, 'e')
            .replace(/[ìíîï]/g, 'i')
            .replace(/[òóôõö]/g, 'o')
            .replace(/[ùúûü]/g, 'u')
            .replace(/[ç]/g, 'c')
            .replace(/[ñ]/g, 'n')
            .replace(/[^\\w\\s-]/g, '')
            .replace(/[\\s_-]+/g, '-')
            .replace(/^-+|-+\$/g, '');
        slugField.value = slug;
    }
});
</script>
{% endblock %}
", "admin/categories/form.html.twig", "/workspace/symfpress/templates/admin/categories/form.html.twig");
    }
}
