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

/* admin/tags/index.html.twig */
class __TwigTemplate_d5467502cfec431546aec18f6bb22260 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/tags/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/tags/index.html.twig"));

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

        yield "Tags";
        
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
        <li class=\"breadcrumb-item active\">Tags</li>
    </ol>
</nav>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 14
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

        // line 15
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2>Tags</h2>
    <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_new");
        yield "\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus\"></i> Nouveau tag
    </a>
</div>

<!-- Sélecteur de langue -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <label class=\"form-label mb-0\">Langue d'affichage :</label>
                <div class=\"dropdown d-inline-block ms-2\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-globe me-1\"></i> ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 30, $this->source); })()), "name", [], "any", false, false, false, 30), "html", null, true);
        yield "
                    </button>
                    <ul class=\"dropdown-menu\">
                        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableLanguages"]) || array_key_exists("availableLanguages", $context) ? $context["availableLanguages"] : (function () { throw new RuntimeError('Variable "availableLanguages" does not exist.', 33, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 34
            yield "                            <li>
                                <a class=\"dropdown-item ";
            // line 35
            yield ((($context["language"] == (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 35, $this->source); })()))) ? ("active") : (""));
            yield "\" 
                                   href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_index", ["language" => CoreExtension::getAttribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 36)]), "html", null, true);
            yield "\">
                                    ";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 37), "html", null, true);
            yield "
                                </a>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        yield "                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des tags -->
<div class=\"card\">
    <div class=\"card-body\">
        ";
        // line 51
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 51, $this->source); })()))) {
            // line 52
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-tags fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun tag trouvé</h5>
                <p class=\"text-muted\">Commencez par créer votre premier tag pour organiser vos contenus.</p>
                <a href=\"";
            // line 56
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_new");
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un tag
                </a>
            </div>
        ";
        } else {
            // line 61
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Couleur</th>
                            <th>Articles</th>
                            <th>Date de création</th>
                            <th width=\"200\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 74, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 75
                yield "                            ";
                $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 75, $this->source); })())], "method", false, false, false, 75);
                // line 76
                yield "                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        ";
                // line 79
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "color", [], "any", false, false, false, 79)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 80
                    yield "                                            <span class=\"badge me-2\" style=\"background-color: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "color", [], "any", false, false, false, 80), "html", null, true);
                    yield "; width: 20px; height: 20px; border-radius: 50%;\"></span>
                                        ";
                }
                // line 82
                yield "                                        <div>
                                            <a href=\"";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 83)]), "html", null, true);
                yield "\" class=\"text-decoration-none fw-bold\">
                                                ";
                // line 84
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 84, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 84, $this->source); })()), "name", [], "any", false, false, false, 84), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Tag #" . CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 84)), "html", null, true)));
                yield "
                                            </a>
                                            ";
                // line 86
                if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 86, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 86, $this->source); })()), "description", [], "any", false, false, false, 86))) {
                    // line 87
                    yield "                                                <div class=\"text-muted small\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 87, $this->source); })()), "description", [], "any", false, false, false, 87), 0, 100), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 87, $this->source); })()), "description", [], "any", false, false, false, 87)) > 100)) {
                        yield "...";
                    }
                    yield "</div>
                                            ";
                }
                // line 89
                yield "                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <code class=\"text-muted\">";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "slug", [], "any", false, false, false, 93), "html", null, true);
                yield "</code>
                                </td>
                                <td>
                                    ";
                // line 96
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "color", [], "any", false, false, false, 96)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 97
                    yield "                                        <div class=\"d-flex align-items-center\">
                                            <span class=\"badge me-2\" style=\"background-color: ";
                    // line 98
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "color", [], "any", false, false, false, 98), "html", null, true);
                    yield "; color: white; padding: 5px 10px;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "color", [], "any", false, false, false, 98), "html", null, true);
                    yield "</span>
                                        </div>
                                    ";
                } else {
                    // line 101
                    yield "                                        <span class=\"text-muted\">Aucune</span>
                                    ";
                }
                // line 103
                yield "                                </td>
                                <td>
                                    <span class=\"badge bg-info\">";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "postCount", [], "any", false, false, false, 105), "html", null, true);
                yield " article";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "postCount", [], "any", false, false, false, 105) > 1)) ? ("s") : (""));
                yield "</span>
                                </td>
                                <td>
                                    <div>";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "createdAt", [], "any", false, false, false, 108), "d/m/Y"), "html", null, true);
                yield "</div>
                                    ";
                // line 109
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "updatedAt", [], "any", false, false, false, 109)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 110
                    yield "                                        <small class=\"text-muted\">Modifié le ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "updatedAt", [], "any", false, false, false, 110), "d/m/Y"), "html", null, true);
                    yield "</small>
                                    ";
                }
                // line 112
                yield "                                </td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 115)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        ";
                // line 119
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "postCount", [], "any", false, false, false, 119) == 0) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                    // line 120
                    yield "                                        <form method=\"POST\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tags_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 120)]), "html", null, true);
                    yield "\" class=\"d-inline\" 
                                              onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?')\">
                                            <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 122
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 122))), "html", null, true);
                    yield "\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\" title=\"Supprimer\">
                                                <i class=\"fas fa-trash\"></i>
                                            </button>
                                        </form>
                                        ";
                } else {
                    // line 128
                    yield "                                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger disabled\" title=\"Impossible de supprimer : tag utilisé dans des articles\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                        ";
                }
                // line 132
                yield "                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 140
        yield "    </div>
</div>

<!-- Informations utiles -->
";
        // line 144
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 144, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 145
            yield "<div class=\"row mt-4\">
    <div class=\"col-md-6\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\"><strong>Total tags :</strong> ";
            // line 152
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 152, $this->source); })())), "html", null, true);
            yield "</p>
                <p class=\"mb-2\"><strong>Tags avec couleur :</strong> ";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 153, $this->source); })()), function ($__tag__) use ($context, $macros) { $context["tag"] = $__tag__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 153, $this->source); })()), "color", [], "any", false, false, false, 153); })), "html", null, true);
            yield "</p>
                <p class=\"mb-0\"><strong>Langue affichée :</strong> ";
            // line 154
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 154, $this->source); })()), "name", [], "any", false, false, false, 154), "html", null, true);
            yield "</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-6\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-lightbulb me-1\"></i> Conseils</h6>
            </div>
            <div class=\"card-body\">
                <ul class=\"mb-0 small\">
                    <li>Utilisez des couleurs pour organiser visuellement vos tags</li>
                    <li>Les tags sans articles peuvent être supprimés</li>
                    <li>Pensez à traduire vos tags dans toutes les langues</li>
                </ul>
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
        return "admin/tags/index.html.twig";
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
        return array (  399 => 154,  395 => 153,  391 => 152,  382 => 145,  380 => 144,  374 => 140,  368 => 136,  359 => 132,  353 => 128,  344 => 122,  338 => 120,  336 => 119,  329 => 115,  324 => 112,  318 => 110,  316 => 109,  312 => 108,  304 => 105,  300 => 103,  296 => 101,  288 => 98,  285 => 97,  283 => 96,  277 => 93,  271 => 89,  262 => 87,  260 => 86,  255 => 84,  251 => 83,  248 => 82,  242 => 80,  240 => 79,  235 => 76,  232 => 75,  228 => 74,  213 => 61,  205 => 56,  199 => 52,  197 => 51,  185 => 41,  175 => 37,  171 => 36,  167 => 35,  164 => 34,  160 => 33,  154 => 30,  138 => 17,  134 => 15,  121 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Tags{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Tags</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2>Tags</h2>
    <a href=\"{{ path('admin_tags_new') }}\" class=\"btn btn-primary\">
        <i class=\"fas fa-plus\"></i> Nouveau tag
    </a>
</div>

<!-- Sélecteur de langue -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <label class=\"form-label mb-0\">Langue d'affichage :</label>
                <div class=\"dropdown d-inline-block ms-2\">
                    <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                        <i class=\"fas fa-globe me-1\"></i> {{ currentLanguage.name }}
                    </button>
                    <ul class=\"dropdown-menu\">
                        {% for language in availableLanguages %}
                            <li>
                                <a class=\"dropdown-item {{ language == currentLanguage ? 'active' : '' }}\" 
                                   href=\"{{ path('admin_tags_index', {'language': language.code}) }}\">
                                    {{ language.name }}
                                </a>
                            </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des tags -->
<div class=\"card\">
    <div class=\"card-body\">
        {% if tags is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-tags fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun tag trouvé</h5>
                <p class=\"text-muted\">Commencez par créer votre premier tag pour organiser vos contenus.</p>
                <a href=\"{{ path('admin_tags_new') }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un tag
                </a>
            </div>
        {% else %}
            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Couleur</th>
                            <th>Articles</th>
                            <th>Date de création</th>
                            <th width=\"200\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for tag in tags %}
                            {% set translation = tag.getTranslationForLanguage(currentLanguage) %}
                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        {% if tag.color %}
                                            <span class=\"badge me-2\" style=\"background-color: {{ tag.color }}; width: 20px; height: 20px; border-radius: 50%;\"></span>
                                        {% endif %}
                                        <div>
                                            <a href=\"{{ path('admin_tags_edit', {'id': tag.id}) }}\" class=\"text-decoration-none fw-bold\">
                                                {{ translation ? translation.name : 'Tag #' ~ tag.id }}
                                            </a>
                                            {% if translation and translation.description %}
                                                <div class=\"text-muted small\">{{ translation.description|slice(0, 100) }}{% if translation.description|length > 100 %}...{% endif %}</div>
                                            {% endif %}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <code class=\"text-muted\">{{ tag.slug }}</code>
                                </td>
                                <td>
                                    {% if tag.color %}
                                        <div class=\"d-flex align-items-center\">
                                            <span class=\"badge me-2\" style=\"background-color: {{ tag.color }}; color: white; padding: 5px 10px;\">{{ tag.color }}</span>
                                        </div>
                                    {% else %}
                                        <span class=\"text-muted\">Aucune</span>
                                    {% endif %}
                                </td>
                                <td>
                                    <span class=\"badge bg-info\">{{ tag.postCount }} article{{ tag.postCount > 1 ? 's' : '' }}</span>
                                </td>
                                <td>
                                    <div>{{ tag.createdAt|date('d/m/Y') }}</div>
                                    {% if tag.updatedAt %}
                                        <small class=\"text-muted\">Modifié le {{ tag.updatedAt|date('d/m/Y') }}</small>
                                    {% endif %}
                                </td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"{{ path('admin_tags_edit', {'id': tag.id}) }}\" class=\"btn btn-sm btn-outline-primary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        
                                        {% if tag.postCount == 0 and is_granted('ROLE_ADMIN') %}
                                        <form method=\"POST\" action=\"{{ path('admin_tags_delete', {'id': tag.id}) }}\" class=\"d-inline\" 
                                              onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?')\">
                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ tag.id) }}\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\" title=\"Supprimer\">
                                                <i class=\"fas fa-trash\"></i>
                                            </button>
                                        </form>
                                        {% else %}
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger disabled\" title=\"Impossible de supprimer : tag utilisé dans des articles\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                        {% endif %}
                                    </div>
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endif %}
    </div>
</div>

<!-- Informations utiles -->
{% if tags is not empty %}
<div class=\"row mt-4\">
    <div class=\"col-md-6\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\"><strong>Total tags :</strong> {{ tags|length }}</p>
                <p class=\"mb-2\"><strong>Tags avec couleur :</strong> {{ tags|filter(tag => tag.color)|length }}</p>
                <p class=\"mb-0\"><strong>Langue affichée :</strong> {{ currentLanguage.name }}</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-6\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-lightbulb me-1\"></i> Conseils</h6>
            </div>
            <div class=\"card-body\">
                <ul class=\"mb-0 small\">
                    <li>Utilisez des couleurs pour organiser visuellement vos tags</li>
                    <li>Les tags sans articles peuvent être supprimés</li>
                    <li>Pensez à traduire vos tags dans toutes les langues</li>
                </ul>
            </div>
        </div>
    </div>
</div>
{% endif %}
{% endblock %}", "admin/tags/index.html.twig", "/workspace/symfpress/templates/admin/tags/index.html.twig");
    }
}
