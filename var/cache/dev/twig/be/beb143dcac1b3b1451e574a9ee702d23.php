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

/* admin/tags/form.html.twig */
class __TwigTemplate_f874a4ae281bb4980abe13b06e1bb5bc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/tags/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/tags/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier le tag") : ("Nouveau tag"));
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_index");
        yield "\">Tags</a></li>
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouveau"));
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
        yield "<form method=\"POST\" id=\"tagForm\">
    <div class=\"row\">
        <!-- Contenu principal -->
        <div class=\"col-lg-8\">
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Informations du tag</h5>
                </div>
                <div class=\"card-body\">
                    ";
        // line 25
        $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 25, $this->source); })()), "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 25, $this->source); })())], "method", false, false, false, 25);
        // line 26
        yield "                    
                    <div class=\"mb-3\">
                        <label for=\"name\" class=\"form-label\">Nom *</label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required 
                               value=\"";
        // line 30
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 30, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 30, $this->source); })()), "name", [], "any", false, false, false, 30), "html", null, true)) : (""));
        yield "\">
                        <div class=\"form-text\">Le nom du tag tel qu'il apparaîtra sur le site</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 37, $this->source); })()), "slug", [], "any", false, false, false, 37), "html", null, true);
        yield "\">
                        <div class=\"form-text\">Laissez vide pour générer automatiquement. Utilisé dans les URLs.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"4\">";
        // line 43
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 43, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 43, $this->source); })()), "description", [], "any", false, false, false, 43), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description optionnelle du tag</div>
                    </div>
                </div>
            </div>
            
            <!-- SEO -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">SEO</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"meta_title\" class=\"form-label\">Titre SEO</label>
                        <input type=\"text\" class=\"form-control\" id=\"meta_title\" name=\"meta_title\" 
                               value=\"";
        // line 58
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 58, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 58, $this->source); })()), "metaTitle", [], "any", false, false, false, 58), "html", null, true)) : (""));
        yield "\">
                        <div class=\"form-text\">Titre affiché dans les résultats de recherche</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"meta_description\" class=\"form-label\">Description SEO</label>
                        <textarea class=\"form-control\" id=\"meta_description\" name=\"meta_description\" rows=\"3\">";
        // line 64
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 64, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 64, $this->source); })()), "metaDescription", [], "any", false, false, false, 64), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description affichée dans les résultats de recherche</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class=\"col-lg-4\">
            <!-- Actions -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Actions</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"d-grid gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"fas fa-save\"></i> ";
        // line 81
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 81, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Mettre à jour") : ("Créer"));
        yield "
                        </button>
                        <a href=\"";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_index");
        yield "\" class=\"btn btn-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Apparence -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Apparence</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"color\" class=\"form-label\">Couleur du tag</label>
                        <div class=\"row\">
                            <div class=\"col-8\">
                                <input type=\"color\" class=\"form-control form-control-color\" id=\"color\" name=\"color\" 
                                       value=\"";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["tag"] ?? null), "color", [], "any", true, true, false, 101)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 101, $this->source); })()), "color", [], "any", false, false, false, 101), "#6c757d")) : ("#6c757d")), "html", null, true);
        yield "\">
                            </div>
                            <div class=\"col-4\">
                                <button type=\"button\" class=\"btn btn-outline-secondary btn-sm\" onclick=\"resetColor()\">
                                    Reset
                                </button>
                            </div>
                        </div>
                        <div class=\"form-text\">Couleur d'affichage du tag sur le site</div>
                    </div>
                    
                    <!-- Aperçu -->
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Aperçu</label>
                        <div id=\"tag-preview\" class=\"p-2 border rounded\">
                            <span class=\"badge\" id=\"preview-badge\" style=\"background-color: ";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["tag"] ?? null), "color", [], "any", true, true, false, 116)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 116, $this->source); })()), "color", [], "any", false, false, false, 116), "#6c757d")) : ("#6c757d")), "html", null, true);
        yield "; color: white;\">
                                ";
        // line 117
        yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 117, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 117, $this->source); })()), "name", [], "any", false, false, false, 117), "html", null, true)) : ("Nom du tag"));
        yield "
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Langues -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Langues</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Langue actuelle</label>
                        <div class=\"d-flex align-items-center\">
                            <i class=\"fas fa-globe me-2\"></i>
                            <strong>";
        // line 134
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 134, $this->source); })()), "name", [], "any", false, false, false, 134), "html", null, true);
        yield "</strong>
                        </div>
                    </div>
                    
                    ";
        // line 138
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 138, $this->source); })())) > 1)) {
            // line 139
            yield "                    <div class=\"mb-3\">
                        <label class=\"form-label\">Autres langues</label>
                        ";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 141, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 142
                yield "                            ";
                if (($context["language"] != (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 142, $this->source); })()))) {
                    // line 143
                    yield "                                <div class=\"mb-1\">
                                    ";
                    // line 144
                    if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 144, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 145
                        yield "                                        <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 145, $this->source); })()), "id", [], "any", false, false, false, 145), "language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 145)]), "html", null, true);
                        yield "\" 
                                           class=\"btn btn-sm btn-outline-secondary\">
                                            ";
                        // line 147
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 147), "html", null, true);
                        yield "
                                            ";
                        // line 148
                        $context["langTranslation"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 148, $this->source); })()), "getTranslationForLanguage", [$context["language"]], "method", false, false, false, 148);
                        // line 149
                        yield "                                            ";
                        if ((($tmp = (isset($context["langTranslation"]) || array_key_exists("langTranslation", $context) ? $context["langTranslation"] : (function () { throw new RuntimeError('Variable "langTranslation" does not exist.', 149, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 150
                            yield "                                                <i class=\"fas fa-check text-success ms-1\"></i>
                                            ";
                        } else {
                            // line 152
                            yield "                                                <i class=\"fas fa-plus text-warning ms-1\"></i>
                                            ";
                        }
                        // line 154
                        yield "                                        </a>
                                    ";
                    } else {
                        // line 156
                        yield "                                        <span class=\"btn btn-sm btn-outline-secondary disabled\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 156), "html", null, true);
                        yield "</span>
                                    ";
                    }
                    // line 158
                    yield "                                </div>
                            ";
                }
                // line 160
                yield "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            yield "                    </div>
                    ";
        }
        // line 163
        yield "                </div>
            </div>
            
            <!-- Statistiques (si édition) -->
            ";
        // line 167
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 167, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 168
            yield "            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Statistiques</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-2\">
                        <strong>Articles utilisés :</strong> ";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 174, $this->source); })()), "postCount", [], "any", false, false, false, 174), "html", null, true);
            yield "
                    </div>
                    <div class=\"mb-2\">
                        <strong>Créé le :</strong> ";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 177, $this->source); })()), "createdAt", [], "any", false, false, false, 177), "d/m/Y H:i"), "html", null, true);
            yield "
                    </div>
                    ";
            // line 179
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 179, $this->source); })()), "updatedAt", [], "any", false, false, false, 179)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 180
                yield "                    <div class=\"mb-0\">
                        <strong>Modifié le :</strong> ";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 181, $this->source); })()), "updatedAt", [], "any", false, false, false, 181), "d/m/Y H:i"), "html", null, true);
                yield "
                    </div>
                    ";
            }
            // line 184
            yield "                </div>
            </div>
            ";
        }
        // line 187
        yield "        </div>
    </div>
</form>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 192
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

        // line 193
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Génération automatique du slug
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const colorInput = document.getElementById('color');
        const previewBadge = document.getElementById('preview-badge');
        
        nameInput.addEventListener('input', function() {
            // Mettre à jour l'aperçu
            previewBadge.textContent = this.value || 'Nom du tag';
            
            // Générer le slug automatiquement
            if (!slugInput.value || slugInput.dataset.auto !== 'false') {
                let slug = this.value
                    .toLowerCase()
                    .replace(/[àáâãäå]/g, 'a')
                    .replace(/[èéêë]/g, 'e')
                    .replace(/[ìíîï]/g, 'i')
                    .replace(/[òóôõö]/g, 'o')
                    .replace(/[ùúûü]/g, 'u')
                    .replace(/[ç]/g, 'c')
                    .replace(/[ñ]/g, 'n')
                    .replace(/[^a-z0-9\\s-]/g, '')
                    .replace(/\\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                
                slugInput.value = slug;
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.auto = 'false';
        });
        
        // Mise à jour de l'aperçu de couleur
        colorInput.addEventListener('input', function() {
            previewBadge.style.backgroundColor = this.value;
        });
        
        // Fonction pour reset la couleur
        function resetColor() {
            colorInput.value = '#6c757d';
            previewBadge.style.backgroundColor = '#6c757d';
        }
        
        // Initialiser l'aperçu
        if (nameInput.value) {
            previewBadge.textContent = nameInput.value;
        }
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
        return "admin/tags/form.html.twig";
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
        return array (  437 => 193,  424 => 192,  410 => 187,  405 => 184,  399 => 181,  396 => 180,  394 => 179,  389 => 177,  383 => 174,  375 => 168,  373 => 167,  367 => 163,  363 => 161,  357 => 160,  353 => 158,  347 => 156,  343 => 154,  339 => 152,  335 => 150,  332 => 149,  330 => 148,  326 => 147,  320 => 145,  318 => 144,  315 => 143,  312 => 142,  308 => 141,  304 => 139,  302 => 138,  295 => 134,  275 => 117,  271 => 116,  253 => 101,  232 => 83,  227 => 81,  207 => 64,  198 => 58,  180 => 43,  171 => 37,  161 => 30,  155 => 26,  153 => 25,  142 => 16,  129 => 15,  114 => 10,  110 => 9,  106 => 8,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ isEdit ? 'Modifier le tag' : 'Nouveau tag' }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_tags_index') }}\">Tags</a></li>
        <li class=\"breadcrumb-item active\">{{ isEdit ? 'Modifier' : 'Nouveau' }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<form method=\"POST\" id=\"tagForm\">
    <div class=\"row\">
        <!-- Contenu principal -->
        <div class=\"col-lg-8\">
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Informations du tag</h5>
                </div>
                <div class=\"card-body\">
                    {% set translation = tag.getTranslationForLanguage(currentLanguage) %}
                    
                    <div class=\"mb-3\">
                        <label for=\"name\" class=\"form-label\">Nom *</label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required 
                               value=\"{{ translation ? translation.name : '' }}\">
                        <div class=\"form-text\">Le nom du tag tel qu'il apparaîtra sur le site</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"slug\" class=\"form-label\">Slug</label>
                        <input type=\"text\" class=\"form-control\" id=\"slug\" name=\"slug\" 
                               value=\"{{ tag.slug }}\">
                        <div class=\"form-text\">Laissez vide pour générer automatiquement. Utilisé dans les URLs.</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"4\">{{ translation ? translation.description : '' }}</textarea>
                        <div class=\"form-text\">Description optionnelle du tag</div>
                    </div>
                </div>
            </div>
            
            <!-- SEO -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">SEO</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"meta_title\" class=\"form-label\">Titre SEO</label>
                        <input type=\"text\" class=\"form-control\" id=\"meta_title\" name=\"meta_title\" 
                               value=\"{{ translation ? translation.metaTitle : '' }}\">
                        <div class=\"form-text\">Titre affiché dans les résultats de recherche</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"meta_description\" class=\"form-label\">Description SEO</label>
                        <textarea class=\"form-control\" id=\"meta_description\" name=\"meta_description\" rows=\"3\">{{ translation ? translation.metaDescription : '' }}</textarea>
                        <div class=\"form-text\">Description affichée dans les résultats de recherche</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class=\"col-lg-4\">
            <!-- Actions -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Actions</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"d-grid gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"fas fa-save\"></i> {{ isEdit ? 'Mettre à jour' : 'Créer' }}
                        </button>
                        <a href=\"{{ path('admin_tags_index') }}\" class=\"btn btn-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Apparence -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Apparence</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"color\" class=\"form-label\">Couleur du tag</label>
                        <div class=\"row\">
                            <div class=\"col-8\">
                                <input type=\"color\" class=\"form-control form-control-color\" id=\"color\" name=\"color\" 
                                       value=\"{{ tag.color|default('#6c757d') }}\">
                            </div>
                            <div class=\"col-4\">
                                <button type=\"button\" class=\"btn btn-outline-secondary btn-sm\" onclick=\"resetColor()\">
                                    Reset
                                </button>
                            </div>
                        </div>
                        <div class=\"form-text\">Couleur d'affichage du tag sur le site</div>
                    </div>
                    
                    <!-- Aperçu -->
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Aperçu</label>
                        <div id=\"tag-preview\" class=\"p-2 border rounded\">
                            <span class=\"badge\" id=\"preview-badge\" style=\"background-color: {{ tag.color|default('#6c757d') }}; color: white;\">
                                {{ translation ? translation.name : 'Nom du tag' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Langues -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Langues</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Langue actuelle</label>
                        <div class=\"d-flex align-items-center\">
                            <i class=\"fas fa-globe me-2\"></i>
                            <strong>{{ currentLanguage.name }}</strong>
                        </div>
                    </div>
                    
                    {% if availableLanguages|length > 1 %}
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Autres langues</label>
                        {% for language in availableLanguages %}
                            {% if language != currentLanguage %}
                                <div class=\"mb-1\">
                                    {% if isEdit %}
                                        <a href=\"{{ path('admin_tags_edit', {'id': tag.id, 'language': language.code}) }}\" 
                                           class=\"btn btn-sm btn-outline-secondary\">
                                            {{ language.name }}
                                            {% set langTranslation = tag.getTranslationForLanguage(language) %}
                                            {% if langTranslation %}
                                                <i class=\"fas fa-check text-success ms-1\"></i>
                                            {% else %}
                                                <i class=\"fas fa-plus text-warning ms-1\"></i>
                                            {% endif %}
                                        </a>
                                    {% else %}
                                        <span class=\"btn btn-sm btn-outline-secondary disabled\">{{ language.name }}</span>
                                    {% endif %}
                                </div>
                            {% endif %}
                        {% endfor %}
                    </div>
                    {% endif %}
                </div>
            </div>
            
            <!-- Statistiques (si édition) -->
            {% if isEdit %}
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Statistiques</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-2\">
                        <strong>Articles utilisés :</strong> {{ tag.postCount }}
                    </div>
                    <div class=\"mb-2\">
                        <strong>Créé le :</strong> {{ tag.createdAt|date('d/m/Y H:i') }}
                    </div>
                    {% if tag.updatedAt %}
                    <div class=\"mb-0\">
                        <strong>Modifié le :</strong> {{ tag.updatedAt|date('d/m/Y H:i') }}
                    </div>
                    {% endif %}
                </div>
            </div>
            {% endif %}
        </div>
    </div>
</form>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Génération automatique du slug
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const colorInput = document.getElementById('color');
        const previewBadge = document.getElementById('preview-badge');
        
        nameInput.addEventListener('input', function() {
            // Mettre à jour l'aperçu
            previewBadge.textContent = this.value || 'Nom du tag';
            
            // Générer le slug automatiquement
            if (!slugInput.value || slugInput.dataset.auto !== 'false') {
                let slug = this.value
                    .toLowerCase()
                    .replace(/[àáâãäå]/g, 'a')
                    .replace(/[èéêë]/g, 'e')
                    .replace(/[ìíîï]/g, 'i')
                    .replace(/[òóôõö]/g, 'o')
                    .replace(/[ùúûü]/g, 'u')
                    .replace(/[ç]/g, 'c')
                    .replace(/[ñ]/g, 'n')
                    .replace(/[^a-z0-9\\s-]/g, '')
                    .replace(/\\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                
                slugInput.value = slug;
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.auto = 'false';
        });
        
        // Mise à jour de l'aperçu de couleur
        colorInput.addEventListener('input', function() {
            previewBadge.style.backgroundColor = this.value;
        });
        
        // Fonction pour reset la couleur
        function resetColor() {
            colorInput.value = '#6c757d';
            previewBadge.style.backgroundColor = '#6c757d';
        }
        
        // Initialiser l'aperçu
        if (nameInput.value) {
            previewBadge.textContent = nameInput.value;
        }
    </script>
{% endblock %}", "admin/tags/form.html.twig", "/workspace/symfpress/templates/admin/tags/form.html.twig");
    }
}
