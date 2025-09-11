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

/* admin/posts/form_old.html.twig */
class __TwigTemplate_218d97ca4537719527387638f0fc4cf7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/posts/form_old.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/posts/form_old.html.twig"));

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
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 19
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

        // line 20
        yield "<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
            <div class=\"card\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">";
        // line 25
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 25, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'article") : ("Nouvel article"));
        yield "</h5>
                    <div class=\"dropdown\">
                        <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                            <i class=\"fas fa-language me-1\"></i> ";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 28, $this->source); })()), "name", [], "any", false, false, false, 28), "html", null, true);
        yield "
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 31, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 32
            yield "                                <li>
                                    <a class=\"dropdown-item ";
            // line 33
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 33, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                                       href=\"";
            // line 34
            yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 34, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 34)]), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_new", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 34)]), "html", null, true)));
            yield "\">
                                        ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 35), "html", null, true);
            yield "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "                        </ul>
                    </div>
                </div>
                <div class=\"card-body\">
                    ";
        // line 43
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 43, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 43, $this->source); })())], "method", false, false, false, 43);
        // line 44
        yield "                    
                    <div class=\"mb-3\">
                        <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" 
                               value=\"";
        // line 48
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 48, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 48, $this->source); })()), "title", [], "any", false, false, false, 48), "html", null, true)) : (""));
        yield "\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un titre d'article.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"";
        // line 55
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "slug", [], "any", true, true, false, 55) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 55, $this->source); })()), "slug", [], "any", false, false, false, 55)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 55, $this->source); })()), "slug", [], "any", false, false, false, 55), "html", null, true)) : (""));
        yield "\" 
                               ";
        // line 56
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 56, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
        yield ">
                        <div class=\"form-text\">Le slug sera généré automatiquement si laissé vide.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"excerpt\" class=\"form-label\">Extrait</label>
                        <textarea class=\"form-control\" id=\"excerpt\" name=\"excerpt\" rows=\"3\">";
        // line 62
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 62, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 62, $this->source); })()), "excerpt", [], "any", false, false, false, 62), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Résumé court de l'article (optionnel).</div>
                    </div>
                </div>
            </div>
            
            <!-- Image en vedette -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-image me-1\"></i> Image mise en avant</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"featured-image-selector\">
                        <input type=\"hidden\" name=\"featured_image_id\" value=\"";
        // line 75
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 75, $this->source); })()), "featuredImage", [], "any", false, false, false, 75)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 75, $this->source); })()), "featuredImage", [], "any", false, false, false, 75), "id", [], "any", false, false, false, 75), "html", null, true)) : (""));
        yield "\">
                        <div class=\"featured-image-preview\" style=\"";
        // line 76
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 76, $this->source); })()), "featuredImage", [], "any", false, false, false, 76)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("display: block;") : ("display: none;"));
        yield "\">
                            ";
        // line 78
        yield "                        </div>
                        <div class=\"mt-3\">
                            <button type=\"button\" class=\"btn btn-select-featured-image ";
        // line 80
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 80, $this->source); })()), "featuredImage", [], "any", false, false, false, 80)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("btn-outline-primary") : ("btn-primary"));
        yield "\">
                                ";
        // line 81
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 81, $this->source); })()), "featuredImage", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Changer l'image mise en avant") : ("Sélectionner une image mise en avant"));
        yield "
                            </button>
                            <button type=\"button\" class=\"btn btn-outline-danger ms-2 btn-remove-featured-image\" style=\"";
        // line 83
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 83, $this->source); })()), "featuredImage", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("display: inline-block;") : ("display: none;"));
        yield "\">
                                <i class=\"fas fa-times\"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenu avec bouton Ajouter un média -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-edit me-1\"></i> Contenu de l'article</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <div class=\"d-flex justify-content-between align-items-center mb-2\">
                            <label for=\"content\" class=\"form-label mb-0\">Contenu <span class=\"text-danger\">*</span></label>
                            <button type=\"button\" class=\"btn btn-outline-secondary btn-sm btn-add-media\">
                                <i class=\"fas fa-image\"></i> Ajouter un média
                            </button>
                        </div>
                        <textarea class=\"form-control\" id=\"content\" name=\"content\" rows=\"15\" required>";
        // line 104
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 104, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 104, $this->source); })()), "content", [], "any", false, false, false, 104), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"invalid-feedback\">Veuillez saisir le contenu de l'article.</div>
                        <div class=\"form-text\">Utilisez le bouton \"Ajouter un média\" pour insérer des images ou fichiers dans votre contenu.</div>
                    </div>
                </div>
            </div>
            
            <!-- Catégories et tags -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-tags me-1\"></i> Catégorisation</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <label for=\"categories\" class=\"form-label\">Catégories</label>
                            <select class=\"form-select\" id=\"categories\" name=\"categories[]\" multiple size=\"5\">
                                ";
        // line 121
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 121, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 122
            yield "                                    ";
            $context["categoryTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 122, $this->source); })())], "method", false, false, false, 122);
            // line 123
            yield "                                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 123), "html", null, true);
            yield "\" 
                                            ";
            // line 124
            yield ((((isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 124, $this->source); })()) && CoreExtension::inFilter($context["category"], CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 124, $this->source); })()), "categories", [], "any", false, false, false, 124)))) ? ("selected") : (""));
            yield ">
                                        ";
            // line 125
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(0, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "level", [], "any", false, false, false, 125)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 126
                yield "                                            ";
                if (($context["i"] > 0)) {
                    yield "—";
                }
                // line 127
                yield "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            yield "                                        ";
            yield (((($tmp = (isset($context["categoryTranslation"]) || array_key_exists("categoryTranslation", $context) ? $context["categoryTranslation"] : (function () { throw new RuntimeError('Variable "categoryTranslation" does not exist.', 128, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["categoryTranslation"]) || array_key_exists("categoryTranslation", $context) ? $context["categoryTranslation"] : (function () { throw new RuntimeError('Variable "categoryTranslation" does not exist.', 128, $this->source); })()), "name", [], "any", false, false, false, 128), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Catégorie #" . CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 128)), "html", null, true)));
            yield "
                                    </option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        yield "                            </select>
                            <div class=\"form-text\">Maintenez Ctrl pour sélectionner plusieurs catégories.</div>
                        </div>
                        <div class=\"col-md-6\">
                            <label for=\"tags\" class=\"form-label\">Tags</label>
                            <select class=\"form-select\" id=\"tags\" name=\"tags[]\" multiple size=\"5\">
                                ";
        // line 137
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 137, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 138
            yield "                                    ";
            $context["tagTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 138, $this->source); })())], "method", false, false, false, 138);
            // line 139
            yield "                                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 139), "html", null, true);
            yield "\" 
                                            ";
            // line 140
            yield ((((isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 140, $this->source); })()) && CoreExtension::inFilter($context["tag"], CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 140, $this->source); })()), "tags", [], "any", false, false, false, 140)))) ? ("selected") : (""));
            yield ">
                                        ";
            // line 141
            yield (((($tmp = (isset($context["tagTranslation"]) || array_key_exists("tagTranslation", $context) ? $context["tagTranslation"] : (function () { throw new RuntimeError('Variable "tagTranslation" does not exist.', 141, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tagTranslation"]) || array_key_exists("tagTranslation", $context) ? $context["tagTranslation"] : (function () { throw new RuntimeError('Variable "tagTranslation" does not exist.', 141, $this->source); })()), "name", [], "any", false, false, false, 141), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Tag #" . CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 141)), "html", null, true)));
            yield "
                                    </option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        yield "                            </select>
                            <div class=\"form-text\">Maintenez Ctrl pour sélectionner plusieurs tags.</div>
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
        // line 160
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 160, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 160, $this->source); })()), "metaTitle", [], "any", false, false, false, 160), "html", null, true)) : (""));
        yield "\" maxlength=\"60\">
                        <div class=\"form-text\">Titre affiché dans les résultats de recherche (60 caractères max)</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"meta_description\" class=\"form-label\">Description SEO</label>
                        <textarea class=\"form-control\" id=\"meta_description\" name=\"meta_description\" rows=\"2\" maxlength=\"160\">";
        // line 166
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 166, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 166, $this->source); })()), "metaDescription", [], "any", false, false, false, 166), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description affichée dans les résultats de recherche (160 caractères max)</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"";
        // line 173
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <div>
                    <button type=\"submit\" name=\"status\" value=\"draft\" class=\"btn btn-outline-primary me-2\">
                        <i class=\"fas fa-save\"></i> Sauvegarder brouillon
                    </button>
                    <button type=\"submit\" name=\"status\" value=\"published\" class=\"btn btn-primary\">
                        <i class=\"fas fa-check\"></i> Publier
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Statut de publication -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Statut</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 195
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 195, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 196
            yield "                <p class=\"mb-2\"><strong>Statut actuel :</strong> 
                    <span class=\"badge ";
            // line 197
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 197, $this->source); })()), "status", [], "any", false, false, false, 197) == "published")) ? ("bg-success") : ("bg-secondary"));
            yield "\">
                        ";
            // line 198
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 198, $this->source); })()), "status", [], "any", false, false, false, 198) == "published")) ? ("Publié") : ("Brouillon"));
            yield "
                    </span>
                </p>
                <p class=\"mb-2\"><strong>Auteur :</strong> ";
            // line 201
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 201, $this->source); })()), "author", [], "any", false, false, false, 201), "displayName", [], "any", false, false, false, 201), "html", null, true);
            yield "</p>
                <p class=\"mb-2\"><strong>Créé le :</strong> ";
            // line 202
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 202, $this->source); })()), "createdAt", [], "any", false, false, false, 202), "d/m/Y H:i"), "html", null, true);
            yield "</p>
                ";
            // line 203
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 203, $this->source); })()), "updatedAt", [], "any", false, false, false, 203)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 204
                yield "                <p class=\"mb-0\"><strong>Modifié le :</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 204, $this->source); })()), "updatedAt", [], "any", false, false, false, 204), "d/m/Y H:i"), "html", null, true);
                yield "</p>
                ";
            }
            // line 206
            yield "                ";
        } else {
            // line 207
            yield "                <p class=\"text-muted\">Nouvel article - sera sauvegardé en tant que brouillon par défaut.</p>
                ";
        }
        // line 209
        yield "            </div>
        </div>
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Image en vedette</h6>
                <p class=\"small text-muted mb-3\">L'image en vedette sera affichée en tête de l'article et dans les listes.</p>
                
                <h6>Catégorisation</h6>
                <p class=\"small text-muted mb-3\">Utilisez les catégories pour organiser vos articles et les tags pour les détailler.</p>
                
                <h6>SEO</h6>
                <p class=\"small text-muted mb-0\">Optimisez le titre et la description pour améliorer le référencement.</p>
            </div>
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
        return "admin/posts/form_old.html.twig";
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
        return array (  505 => 209,  501 => 207,  498 => 206,  492 => 204,  490 => 203,  486 => 202,  482 => 201,  476 => 198,  472 => 197,  469 => 196,  467 => 195,  442 => 173,  432 => 166,  423 => 160,  405 => 144,  396 => 141,  392 => 140,  387 => 139,  384 => 138,  380 => 137,  372 => 131,  362 => 128,  356 => 127,  351 => 126,  347 => 125,  343 => 124,  338 => 123,  335 => 122,  331 => 121,  311 => 104,  287 => 83,  282 => 81,  278 => 80,  274 => 78,  270 => 76,  266 => 75,  250 => 62,  241 => 56,  237 => 55,  227 => 48,  221 => 44,  219 => 43,  213 => 39,  203 => 35,  199 => 34,  195 => 33,  192 => 32,  188 => 31,  182 => 28,  176 => 25,  169 => 20,  156 => 19,  142 => 16,  129 => 15,  114 => 10,  110 => 9,  106 => 8,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
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
{% endblock %}

{% block admin_content %}
<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
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
                    {% set translation = post.getTranslationForLanguage(currentLanguage) %}
                    
                    <div class=\"mb-3\">
                        <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" 
                               value=\"{{ translation ? translation.title : '' }}\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un titre d'article.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"{{ post.slug ?? '' }}\" 
                               {{ isEdit ? 'readonly' : '' }}>
                        <div class=\"form-text\">Le slug sera généré automatiquement si laissé vide.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"excerpt\" class=\"form-label\">Extrait</label>
                        <textarea class=\"form-control\" id=\"excerpt\" name=\"excerpt\" rows=\"3\">{{ translation ? translation.excerpt : '' }}</textarea>
                        <div class=\"form-text\">Résumé court de l'article (optionnel).</div>
                    </div>
                </div>
            </div>
            
            <!-- Image en vedette -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-image me-1\"></i> Image mise en avant</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"featured-image-selector\">
                        <input type=\"hidden\" name=\"featured_image_id\" value=\"{{ post.featuredImage ? post.featuredImage.id : '' }}\">
                        <div class=\"featured-image-preview\" style=\"{{ post.featuredImage ? 'display: block;' : 'display: none;' }}\">
                            {# Le contenu sera généré par JavaScript #}
                        </div>
                        <div class=\"mt-3\">
                            <button type=\"button\" class=\"btn btn-select-featured-image {{ post.featuredImage ? 'btn-outline-primary' : 'btn-primary' }}\">
                                {{ post.featuredImage ? 'Changer l\\'image mise en avant' : 'Sélectionner une image mise en avant' }}
                            </button>
                            <button type=\"button\" class=\"btn btn-outline-danger ms-2 btn-remove-featured-image\" style=\"{{ post.featuredImage ? 'display: inline-block;' : 'display: none;' }}\">
                                <i class=\"fas fa-times\"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenu avec bouton Ajouter un média -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-edit me-1\"></i> Contenu de l'article</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <div class=\"d-flex justify-content-between align-items-center mb-2\">
                            <label for=\"content\" class=\"form-label mb-0\">Contenu <span class=\"text-danger\">*</span></label>
                            <button type=\"button\" class=\"btn btn-outline-secondary btn-sm btn-add-media\">
                                <i class=\"fas fa-image\"></i> Ajouter un média
                            </button>
                        </div>
                        <textarea class=\"form-control\" id=\"content\" name=\"content\" rows=\"15\" required>{{ translation ? translation.content : '' }}</textarea>
                        <div class=\"invalid-feedback\">Veuillez saisir le contenu de l'article.</div>
                        <div class=\"form-text\">Utilisez le bouton \"Ajouter un média\" pour insérer des images ou fichiers dans votre contenu.</div>
                    </div>
                </div>
            </div>
            
            <!-- Catégories et tags -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-tags me-1\"></i> Catégorisation</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <label for=\"categories\" class=\"form-label\">Catégories</label>
                            <select class=\"form-select\" id=\"categories\" name=\"categories[]\" multiple size=\"5\">
                                {% for category in categories %}
                                    {% set categoryTranslation = category.getTranslationForLanguage(currentLanguage) %}
                                    <option value=\"{{ category.id }}\" 
                                            {{ post and category in post.categories ? 'selected' : '' }}>
                                        {% for i in 0..category.level %}
                                            {% if i > 0 %}—{% endif %}
                                        {% endfor %}
                                        {{ categoryTranslation ? categoryTranslation.name : 'Catégorie #' ~ category.id }}
                                    </option>
                                {% endfor %}
                            </select>
                            <div class=\"form-text\">Maintenez Ctrl pour sélectionner plusieurs catégories.</div>
                        </div>
                        <div class=\"col-md-6\">
                            <label for=\"tags\" class=\"form-label\">Tags</label>
                            <select class=\"form-select\" id=\"tags\" name=\"tags[]\" multiple size=\"5\">
                                {% for tag in tags %}
                                    {% set tagTranslation = tag.getTranslationForLanguage(currentLanguage) %}
                                    <option value=\"{{ tag.id }}\" 
                                            {{ post and tag in post.tags ? 'selected' : '' }}>
                                        {{ tagTranslation ? tagTranslation.name : 'Tag #' ~ tag.id }}
                                    </option>
                                {% endfor %}
                            </select>
                            <div class=\"form-text\">Maintenez Ctrl pour sélectionner plusieurs tags.</div>
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
                <a href=\"{{ path('admin_posts_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <div>
                    <button type=\"submit\" name=\"status\" value=\"draft\" class=\"btn btn-outline-primary me-2\">
                        <i class=\"fas fa-save\"></i> Sauvegarder brouillon
                    </button>
                    <button type=\"submit\" name=\"status\" value=\"published\" class=\"btn btn-primary\">
                        <i class=\"fas fa-check\"></i> Publier
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Statut de publication -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Statut</h6>
            </div>
            <div class=\"card-body\">
                {% if isEdit %}
                <p class=\"mb-2\"><strong>Statut actuel :</strong> 
                    <span class=\"badge {{ post.status == 'published' ? 'bg-success' : 'bg-secondary' }}\">
                        {{ post.status == 'published' ? 'Publié' : 'Brouillon' }}
                    </span>
                </p>
                <p class=\"mb-2\"><strong>Auteur :</strong> {{ post.author.displayName }}</p>
                <p class=\"mb-2\"><strong>Créé le :</strong> {{ post.createdAt|date('d/m/Y H:i') }}</p>
                {% if post.updatedAt %}
                <p class=\"mb-0\"><strong>Modifié le :</strong> {{ post.updatedAt|date('d/m/Y H:i') }}</p>
                {% endif %}
                {% else %}
                <p class=\"text-muted\">Nouvel article - sera sauvegardé en tant que brouillon par défaut.</p>
                {% endif %}
            </div>
        </div>
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Image en vedette</h6>
                <p class=\"small text-muted mb-3\">L'image en vedette sera affichée en tête de l'article et dans les listes.</p>
                
                <h6>Catégorisation</h6>
                <p class=\"small text-muted mb-3\">Utilisez les catégories pour organiser vos articles et les tags pour les détailler.</p>
                
                <h6>SEO</h6>
                <p class=\"small text-muted mb-0\">Optimisez le titre et la description pour améliorer le référencement.</p>
            </div>
        </div>
    </div>
</div>

{% endblock %}", "admin/posts/form_old.html.twig", "/workspace/symfpress/templates/admin/posts/form_old.html.twig");
    }
}
