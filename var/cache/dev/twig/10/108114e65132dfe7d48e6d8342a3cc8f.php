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

/* admin/pages/form.html.twig */
class __TwigTemplate_e6654c6aa19347b445d9fd70399221ed extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/pages/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/pages/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier la page") : ("Nouvelle page"));
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_index");
        yield "\">Pages</a></li>
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvelle page"));
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
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 25, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier la page") : ("Nouvelle page"));
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
            yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 34, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 34)]), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_new", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 34)]), "html", null, true)));
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
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 43, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 43, $this->source); })())], "method", false, false, false, 43);
        // line 44
        yield "                    
                    <div class=\"mb-3\">
                        <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" 
                               value=\"";
        // line 48
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 48, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 48, $this->source); })()), "title", [], "any", false, false, false, 48), "html", null, true)) : (""));
        yield "\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un titre de page.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"";
        // line 55
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "slug", [], "any", true, true, false, 55) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 55, $this->source); })()), "slug", [], "any", false, false, false, 55)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 55, $this->source); })()), "slug", [], "any", false, false, false, 55), "html", null, true)) : (""));
        yield "\" 
                               ";
        // line 56
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 56, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
        yield ">
                        <div class=\"form-text\">Le slug sera généré automatiquement si laissé vide.</div>
                    </div>
                </div>
            </div>
            
            <!-- Image mise en avant -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-image me-1\"></i> Image mise en avant</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"featured-image-selector\">
                        <input type=\"hidden\" name=\"featured_image_id\" value=\"";
        // line 69
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 69, $this->source); })()), "featuredImage", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 69, $this->source); })()), "featuredImage", [], "any", false, false, false, 69), "id", [], "any", false, false, false, 69), "html", null, true)) : (""));
        yield "\">
                        <div class=\"featured-image-preview\" style=\"";
        // line 70
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 70, $this->source); })()), "featuredImage", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("display: block;") : ("display: none;"));
        yield "\">
                            ";
        // line 72
        yield "                        </div>
                        <div class=\"mt-3\">
                            <button type=\"button\" class=\"btn btn-select-featured-image ";
        // line 74
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 74, $this->source); })()), "featuredImage", [], "any", false, false, false, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("btn-outline-primary") : ("btn-primary"));
        yield "\">
                                ";
        // line 75
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 75, $this->source); })()), "featuredImage", [], "any", false, false, false, 75)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Changer l'image mise en avant") : ("Sélectionner une image mise en avant"));
        yield "
                            </button>
                            <button type=\"button\" class=\"btn btn-outline-danger ms-2 btn-remove-featured-image\" style=\"";
        // line 77
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 77, $this->source); })()), "featuredImage", [], "any", false, false, false, 77)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("display: inline-block;") : ("display: none;"));
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
                    <h6 class=\"mb-0\"><i class=\"fas fa-edit me-1\"></i> Contenu de la page</h6>
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
        // line 98
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 98, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 98, $this->source); })()), "content", [], "any", false, false, false, 98), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"invalid-feedback\">Veuillez saisir le contenu de la page.</div>
                        <div class=\"form-text\">Utilisez le bouton \"Ajouter un média\" pour insérer des images ou fichiers dans votre contenu.</div>
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
        // line 114
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 114, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 114, $this->source); })()), "metaTitle", [], "any", false, false, false, 114), "html", null, true)) : (""));
        yield "\" maxlength=\"60\">
                        <div class=\"form-text\">Titre affiché dans les résultats de recherche (60 caractères max)</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"meta_description\" class=\"form-label\">Description SEO</label>
                        <textarea class=\"form-control\" id=\"meta_description\" name=\"meta_description\" rows=\"2\" maxlength=\"160\">";
        // line 120
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 120, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 120, $this->source); })()), "metaDescription", [], "any", false, false, false, 120), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description affichée dans les résultats de recherche (160 caractères max)</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_index");
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
        // line 149
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 149, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 150
            yield "                <p class=\"mb-2\"><strong>Statut actuel :</strong> 
                    <span class=\"badge ";
            // line 151
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 151, $this->source); })()), "status", [], "any", false, false, false, 151) == "published")) ? ("bg-success") : ("bg-secondary"));
            yield "\">
                        ";
            // line 152
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 152, $this->source); })()), "status", [], "any", false, false, false, 152) == "published")) ? ("Publiée") : ("Brouillon"));
            yield "
                    </span>
                </p>
                <p class=\"mb-2\"><strong>Auteur :</strong> ";
            // line 155
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 155, $this->source); })()), "author", [], "any", false, false, false, 155), "displayName", [], "any", false, false, false, 155), "html", null, true);
            yield "</p>
                <p class=\"mb-2\"><strong>Créée le :</strong> ";
            // line 156
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 156, $this->source); })()), "createdAt", [], "any", false, false, false, 156), "d/m/Y H:i"), "html", null, true);
            yield "</p>
                ";
            // line 157
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 157, $this->source); })()), "updatedAt", [], "any", false, false, false, 157)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 158
                yield "                <p class=\"mb-0\"><strong>Modifiée le :</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 158, $this->source); })()), "updatedAt", [], "any", false, false, false, 158), "d/m/Y H:i"), "html", null, true);
                yield "</p>
                ";
            }
            // line 160
            yield "                ";
        } else {
            // line 161
            yield "                <p class=\"text-muted\">Nouvelle page - sera sauvegardée en tant que brouillon par défaut.</p>
                ";
        }
        // line 163
        yield "            </div>
        </div>
        
        <!-- Options de page -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-cog me-1\"></i> Options</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"checkbox\" id=\"show_in_menu\" name=\"show_in_menu\" 
                           ";
        // line 174
        yield (((($tmp = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "showInMenu", [], "any", true, true, false, 174) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 174, $this->source); })()), "showInMenu", [], "any", false, false, false, 174)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 174, $this->source); })()), "showInMenu", [], "any", false, false, false, 174)) : (true))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("checked") : (""));
        yield ">
                    <label class=\"form-check-label\" for=\"show_in_menu\">
                        Afficher dans les menus
                    </label>
                </div>
                <div class=\"form-check mt-2\">
                    <input class=\"form-check-input\" type=\"checkbox\" id=\"allow_comments\" name=\"allow_comments\" 
                           ";
        // line 181
        yield (((($tmp = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "allowComments", [], "any", true, true, false, 181) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 181, $this->source); })()), "allowComments", [], "any", false, false, false, 181)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 181, $this->source); })()), "allowComments", [], "any", false, false, false, 181)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("checked") : (""));
        yield ">
                    <label class=\"form-check-label\" for=\"allow_comments\">
                        Autoriser les commentaires
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Pages vs Articles</h6>
                <p class=\"small text-muted mb-3\">Les pages sont pour le contenu statique (A propos, Contact, etc.) contrairement aux articles qui sont chronologiques.</p>
                
                <h6>Image en vedette</h6>
                <p class=\"small text-muted mb-3\">L'image en vedette peut être utilisée comme bannière ou illustration principale.</p>
                
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
        return "admin/pages/form.html.twig";
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
        return array (  426 => 181,  416 => 174,  403 => 163,  399 => 161,  396 => 160,  390 => 158,  388 => 157,  384 => 156,  380 => 155,  374 => 152,  370 => 151,  367 => 150,  365 => 149,  340 => 127,  330 => 120,  321 => 114,  302 => 98,  278 => 77,  273 => 75,  269 => 74,  265 => 72,  261 => 70,  257 => 69,  241 => 56,  237 => 55,  227 => 48,  221 => 44,  219 => 43,  213 => 39,  203 => 35,  199 => 34,  195 => 33,  192 => 32,  188 => 31,  182 => 28,  176 => 25,  169 => 20,  156 => 19,  142 => 16,  129 => 15,  114 => 10,  110 => 9,  106 => 8,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ isEdit ? 'Modifier la page' : 'Nouvelle page' }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_pages_index') }}\">Pages</a></li>
        <li class=\"breadcrumb-item active\">{{ isEdit ? 'Modifier' : 'Nouvelle page' }}</li>
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
                    <h5 class=\"mb-0\">{{ isEdit ? 'Modifier la page' : 'Nouvelle page' }}</h5>
                    <div class=\"dropdown\">
                        <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                            <i class=\"fas fa-language me-1\"></i> {{ currentLanguage.name }}
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            {% for language in availableLanguages %}
                                <li>
                                    <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                       href=\"{{ isEdit ? path('admin_pages_edit', {'id': page.id, 'language': language.code}) : path('admin_pages_new', {'language': language.code}) }}\">
                                        {{ language.name }}
                                    </a>
                                </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
                <div class=\"card-body\">
                    {% set translation = page.getTranslationForLanguage(currentLanguage) %}
                    
                    <div class=\"mb-3\">
                        <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" 
                               value=\"{{ translation ? translation.title : '' }}\" required>
                        <div class=\"invalid-feedback\">Veuillez saisir un titre de page.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"{{ page.slug ?? '' }}\" 
                               {{ isEdit ? 'readonly' : '' }}>
                        <div class=\"form-text\">Le slug sera généré automatiquement si laissé vide.</div>
                    </div>
                </div>
            </div>
            
            <!-- Image mise en avant -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-image me-1\"></i> Image mise en avant</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"featured-image-selector\">
                        <input type=\"hidden\" name=\"featured_image_id\" value=\"{{ page.featuredImage ? page.featuredImage.id : '' }}\">
                        <div class=\"featured-image-preview\" style=\"{{ page.featuredImage ? 'display: block;' : 'display: none;' }}\">
                            {# Le contenu sera généré par JavaScript #}
                        </div>
                        <div class=\"mt-3\">
                            <button type=\"button\" class=\"btn btn-select-featured-image {{ page.featuredImage ? 'btn-outline-primary' : 'btn-primary' }}\">
                                {{ page.featuredImage ? 'Changer l\\'image mise en avant' : 'Sélectionner une image mise en avant' }}
                            </button>
                            <button type=\"button\" class=\"btn btn-outline-danger ms-2 btn-remove-featured-image\" style=\"{{ page.featuredImage ? 'display: inline-block;' : 'display: none;' }}\">
                                <i class=\"fas fa-times\"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenu avec bouton Ajouter un média -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-edit me-1\"></i> Contenu de la page</h6>
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
                        <div class=\"invalid-feedback\">Veuillez saisir le contenu de la page.</div>
                        <div class=\"form-text\">Utilisez le bouton \"Ajouter un média\" pour insérer des images ou fichiers dans votre contenu.</div>
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
                <a href=\"{{ path('admin_pages_index') }}\" class=\"btn btn-outline-secondary\">
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
                    <span class=\"badge {{ page.status == 'published' ? 'bg-success' : 'bg-secondary' }}\">
                        {{ page.status == 'published' ? 'Publiée' : 'Brouillon' }}
                    </span>
                </p>
                <p class=\"mb-2\"><strong>Auteur :</strong> {{ page.author.displayName }}</p>
                <p class=\"mb-2\"><strong>Créée le :</strong> {{ page.createdAt|date('d/m/Y H:i') }}</p>
                {% if page.updatedAt %}
                <p class=\"mb-0\"><strong>Modifiée le :</strong> {{ page.updatedAt|date('d/m/Y H:i') }}</p>
                {% endif %}
                {% else %}
                <p class=\"text-muted\">Nouvelle page - sera sauvegardée en tant que brouillon par défaut.</p>
                {% endif %}
            </div>
        </div>
        
        <!-- Options de page -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-cog me-1\"></i> Options</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"checkbox\" id=\"show_in_menu\" name=\"show_in_menu\" 
                           {{ page.showInMenu ?? true ? 'checked' : '' }}>
                    <label class=\"form-check-label\" for=\"show_in_menu\">
                        Afficher dans les menus
                    </label>
                </div>
                <div class=\"form-check mt-2\">
                    <input class=\"form-check-input\" type=\"checkbox\" id=\"allow_comments\" name=\"allow_comments\" 
                           {{ page.allowComments ?? false ? 'checked' : '' }}>
                    <label class=\"form-check-label\" for=\"allow_comments\">
                        Autoriser les commentaires
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Pages vs Articles</h6>
                <p class=\"small text-muted mb-3\">Les pages sont pour le contenu statique (A propos, Contact, etc.) contrairement aux articles qui sont chronologiques.</p>
                
                <h6>Image en vedette</h6>
                <p class=\"small text-muted mb-3\">L'image en vedette peut être utilisée comme bannière ou illustration principale.</p>
                
                <h6>SEO</h6>
                <p class=\"small text-muted mb-0\">Optimisez le titre et la description pour améliorer le référencement.</p>
            </div>
        </div>
    </div>
</div>

{% endblock %}", "admin/pages/form.html.twig", "/workspace/symfpress/templates/admin/pages/form.html.twig");
    }
}
