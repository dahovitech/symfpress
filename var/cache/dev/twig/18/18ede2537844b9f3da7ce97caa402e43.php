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

/* admin/extensions/themes/index.html.twig */
class __TwigTemplate_b31b4616f8a234b3fd0a08e200bdc4d3 extends Template
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
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/extensions/themes/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/extensions/themes/index.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
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

        yield "Thèmes";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
    <h1 class=\"h3 mb-0 text-gray-800\">
        <i class=\"fas fa-paint-brush me-2\"></i>
        Gestion des Thèmes
    </h1>
    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadThemeModal\">
        <i class=\"fas fa-upload me-2\"></i>
        Installer un Thème
    </button>
</div>

<!-- Statistiques des thèmes -->
<div class=\"row mb-4\">
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                            Thèmes Disponibles
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableThemes"]) || array_key_exists("availableThemes", $context) ? $context["availableThemes"] : (function () { throw new RuntimeError('Variable "availableThemes" does not exist.', 27, $this->source); })())), "html", null, true);
        yield "</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-palette fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-success shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">
                            Thème Actif
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">
                            ";
        // line 46
        yield (((($tmp = (isset($context["activeTheme"]) || array_key_exists("activeTheme", $context) ? $context["activeTheme"] : (function () { throw new RuntimeError('Variable "activeTheme" does not exist.', 46, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["themeMetadata"] ?? null), (isset($context["activeTheme"]) || array_key_exists("activeTheme", $context) ? $context["activeTheme"] : (function () { throw new RuntimeError('Variable "activeTheme" does not exist.', 46, $this->source); })()), [], "array", false, true, false, 46), "name", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["themeMetadata"]) || array_key_exists("themeMetadata", $context) ? $context["themeMetadata"] : (function () { throw new RuntimeError('Variable "themeMetadata" does not exist.', 46, $this->source); })()), (isset($context["activeTheme"]) || array_key_exists("activeTheme", $context) ? $context["activeTheme"] : (function () { throw new RuntimeError('Variable "activeTheme" does not exist.', 46, $this->source); })()), [], "array", false, false, false, 46), "name", [], "any", false, false, false, 46), Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), (isset($context["activeTheme"]) || array_key_exists("activeTheme", $context) ? $context["activeTheme"] : (function () { throw new RuntimeError('Variable "activeTheme" does not exist.', 46, $this->source); })())))) : (Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), (isset($context["activeTheme"]) || array_key_exists("activeTheme", $context) ? $context["activeTheme"] : (function () { throw new RuntimeError('Variable "activeTheme" does not exist.', 46, $this->source); })())))), "html", null, true)) : ("Aucun"));
        yield "
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-check-circle fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des thèmes -->
<div class=\"card shadow mb-4\">
    <div class=\"card-header py-3\">
        <h6 class=\"m-0 font-weight-bold text-primary\">Thèmes Disponibles</h6>
    </div>
    <div class=\"card-body\">
        ";
        // line 64
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableThemes"]) || array_key_exists("availableThemes", $context) ? $context["availableThemes"] : (function () { throw new RuntimeError('Variable "availableThemes" does not exist.', 64, $this->source); })())) > 0)) {
            // line 65
            yield "            <div class=\"row\">
                ";
            // line 66
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableThemes"]) || array_key_exists("availableThemes", $context) ? $context["availableThemes"] : (function () { throw new RuntimeError('Variable "availableThemes" does not exist.', 66, $this->source); })()));
            foreach ($context['_seq'] as $context["themeName"] => $context["themePath"]) {
                // line 67
                yield "                    ";
                $context["metadata"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["themeMetadata"] ?? null), $context["themeName"], [], "array", true, true, false, 67) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["themeMetadata"]) || array_key_exists("themeMetadata", $context) ? $context["themeMetadata"] : (function () { throw new RuntimeError('Variable "themeMetadata" does not exist.', 67, $this->source); })()), $context["themeName"], [], "array", false, false, false, 67)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["themeMetadata"]) || array_key_exists("themeMetadata", $context) ? $context["themeMetadata"] : (function () { throw new RuntimeError('Variable "themeMetadata" does not exist.', 67, $this->source); })()), $context["themeName"], [], "array", false, false, false, 67)) : ([]));
                // line 68
                yield "                    ";
                $context["isActive"] = ($context["themeName"] == (isset($context["activeTheme"]) || array_key_exists("activeTheme", $context) ? $context["activeTheme"] : (function () { throw new RuntimeError('Variable "activeTheme" does not exist.', 68, $this->source); })()));
                // line 69
                yield "                    
                    <div class=\"col-lg-6 col-xl-4 mb-4\">
                        <div class=\"card h-100 ";
                // line 71
                yield (((($tmp = (isset($context["isActive"]) || array_key_exists("isActive", $context) ? $context["isActive"] : (function () { throw new RuntimeError('Variable "isActive" does not exist.', 71, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("border-success") : ("border-secondary"));
                yield "\">
                            <!-- Screenshot du thème -->
                            <div class=\"card-img-top-container\" style=\"height: 200px; overflow: hidden; background: #f8f9fa;\">
                                ";
                // line 74
                $context["screenshot"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 74, $this->source); })()), "screenshot", [], "any", false, false, false, 74);
                // line 75
                yield "                                ";
                if ((($tmp = (isset($context["screenshot"]) || array_key_exists("screenshot", $context) ? $context["screenshot"] : (function () { throw new RuntimeError('Variable "screenshot" does not exist.', 75, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 76
                    yield "                                    <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((("/themes/" . $context["themeName"]) . "/") . (isset($context["screenshot"]) || array_key_exists("screenshot", $context) ? $context["screenshot"] : (function () { throw new RuntimeError('Variable "screenshot" does not exist.', 76, $this->source); })())), "html", null, true);
                    yield "\" 
                                         class=\"card-img-top\" 
                                         style=\"width: 100%; height: 100%; object-fit: cover;\"
                                         alt=\"Screenshot ";
                    // line 79
                    yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "name", [], "any", true, true, false, 79) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 79, $this->source); })()), "name", [], "any", false, false, false, 79)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 79, $this->source); })()), "name", [], "any", false, false, false, 79), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["themeName"], "html", null, true)));
                    yield "\">
                                ";
                } else {
                    // line 81
                    yield "                                    <div class=\"d-flex align-items-center justify-content-center h-100\">
                                        <i class=\"fas fa-image fa-3x text-gray-300\"></i>
                                    </div>
                                ";
                }
                // line 85
                yield "                            </div>
                            
                            <div class=\"card-body\">
                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                    <h5 class=\"card-title\">";
                // line 89
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "name", [], "any", true, true, false, 89) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 89, $this->source); })()), "name", [], "any", false, false, false, 89)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 89, $this->source); })()), "name", [], "any", false, false, false, 89), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["themeName"]), "html", null, true)));
                yield "</h5>
                                    ";
                // line 90
                if ((($tmp = (isset($context["isActive"]) || array_key_exists("isActive", $context) ? $context["isActive"] : (function () { throw new RuntimeError('Variable "isActive" does not exist.', 90, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 91
                    yield "                                        <span class=\"badge bg-success\">Actif</span>
                                    ";
                } else {
                    // line 93
                    yield "                                        <span class=\"badge bg-secondary\">Disponible</span>
                                    ";
                }
                // line 95
                yield "                                </div>
                                
                                <p class=\"card-text text-muted small\">
                                    ";
                // line 98
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "description", [], "any", true, true, false, 98) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 98, $this->source); })()), "description", [], "any", false, false, false, 98)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 98, $this->source); })()), "description", [], "any", false, false, false, 98), "html", null, true)) : ("Aucune description disponible"));
                yield "
                                </p>
                                
                                <div class=\"row\">
                                    ";
                // line 102
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "version", [], "any", true, true, false, 102)) {
                    // line 103
                    yield "                                        <div class=\"col-6\">
                                            <small class=\"text-muted\">
                                                <strong>Version:</strong> ";
                    // line 105
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 105, $this->source); })()), "version", [], "any", false, false, false, 105), "html", null, true);
                    yield "
                                            </small>
                                        </div>
                                    ";
                }
                // line 109
                yield "                                    
                                    ";
                // line 110
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "author", [], "any", true, true, false, 110)) {
                    // line 111
                    yield "                                        <div class=\"col-6\">
                                            <small class=\"text-muted\">
                                                <strong>Auteur:</strong> ";
                    // line 113
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 113, $this->source); })()), "author", [], "any", false, false, false, 113), "html", null, true);
                    yield "
                                            </small>
                                        </div>
                                    ";
                }
                // line 117
                yield "                                </div>
                                
                                ";
                // line 119
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "supports", [], "any", true, true, false, 119) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 119, $this->source); })()), "supports", [], "any", false, false, false, 119)) > 0))) {
                    // line 120
                    yield "                                    <div class=\"mt-2\">
                                        <small class=\"text-muted\">
                                            <strong>Fonctionnalités:</strong>
                                        </small>
                                        <div class=\"mt-1\">
                                            ";
                    // line 125
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 125, $this->source); })()), "supports", [], "any", false, false, false, 125));
                    foreach ($context['_seq'] as $context["_key"] => $context["support"]) {
                        // line 126
                        yield "                                                <span class=\"badge bg-info me-1\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["support"], "html", null, true);
                        yield "</span>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['support'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 128
                    yield "                                        </div>
                                    </div>
                                ";
                }
                // line 131
                yield "                            </div>
                            
                            <div class=\"card-footer bg-transparent\">
                                ";
                // line 134
                if ((($tmp = (isset($context["isActive"]) || array_key_exists("isActive", $context) ? $context["isActive"] : (function () { throw new RuntimeError('Variable "isActive" does not exist.', 134, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 135
                    yield "                                    <button class=\"btn btn-success btn-sm w-100\" disabled>
                                        <i class=\"fas fa-check me-1\"></i>
                                        Thème Actif
                                    </button>
                                ";
                } else {
                    // line 140
                    yield "                                    <div class=\"btn-group w-100\" role=\"group\">
                                        <a href=\"";
                    // line 141
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_activate", ["themeName" => $context["themeName"]]), "html", null, true);
                    yield "\" 
                                           class=\"btn btn-primary btn-sm\"
                                           onclick=\"return confirm('Êtes-vous sûr de vouloir activer ce thème ?')\">
                                            <i class=\"fas fa-paint-brush me-1\"></i>
                                            Activer
                                        </a>
                                        
                                        <a href=\"";
                    // line 148
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_delete", ["themeName" => $context["themeName"]]), "html", null, true);
                    yield "\" 
                                           class=\"btn btn-danger btn-sm\"
                                           onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce thème ? Cette action est irréversible.')\">
                                            <i class=\"fas fa-trash me-1\"></i>
                                            Supprimer
                                        </a>
                                    </div>
                                ";
                }
                // line 156
                yield "                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['themeName'], $context['themePath'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            yield "            </div>
        ";
        } else {
            // line 162
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-paint-brush fa-3x text-gray-300 mb-3\"></i>
                <h5 class=\"text-gray-600\">Aucun thème installé</h5>
                <p class=\"text-gray-500\">Commencez par installer votre premier thème.</p>
            </div>
        ";
        }
        // line 168
        yield "    </div>
</div>

<!-- Modal d'upload de thème -->
<div class=\"modal fade\" id=\"uploadThemeModal\" tabindex=\"-1\" aria-labelledby=\"uploadThemeModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"uploadThemeModalLabel\">
                    <i class=\"fas fa-upload me-2\"></i>
                    Installer un Thème
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            
            <form action=\"";
        // line 183
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_upload");
        yield "\" method=\"POST\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"mb-3\">
                        <label for=\"theme_file\" class=\"form-label\">Fichier Thème (.zip)</label>
                        <input type=\"file\" class=\"form-control\" id=\"theme_file\" name=\"theme_file\" accept=\".zip\" required>
                        <div class=\"form-text\">
                            Sélectionnez un fichier ZIP contenant le thème à installer.
                        </div>
                    </div>
                    
                    <div class=\"alert alert-info\">
                        <i class=\"fas fa-info-circle me-2\"></i>
                        <strong>Instructions :</strong>
                        <ul class=\"mb-0 mt-2\">
                            <li>Le fichier doit être un archive ZIP</li>
                            <li>Le thème doit contenir un fichier theme.yaml (optionnel)</li>
                            <li>Le dossier templates/ doit contenir les fichiers Twig</li>
                            <li>Ajoutez un screenshot.png pour un aperçu du thème</li>
                        </ul>
                    </div>
                </div>
                
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-upload me-2\"></i>
                        Installer
                    </button>
                </div>
            </form>
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
        return "admin/extensions/themes/index.html.twig";
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
        return array (  382 => 183,  365 => 168,  357 => 162,  353 => 160,  344 => 156,  333 => 148,  323 => 141,  320 => 140,  313 => 135,  311 => 134,  306 => 131,  301 => 128,  292 => 126,  288 => 125,  281 => 120,  279 => 119,  275 => 117,  268 => 113,  264 => 111,  262 => 110,  259 => 109,  252 => 105,  248 => 103,  246 => 102,  239 => 98,  234 => 95,  230 => 93,  226 => 91,  224 => 90,  220 => 89,  214 => 85,  208 => 81,  203 => 79,  196 => 76,  193 => 75,  191 => 74,  185 => 71,  181 => 69,  178 => 68,  175 => 67,  171 => 66,  168 => 65,  166 => 64,  145 => 46,  123 => 27,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Thèmes{% endblock %}

{% block body %}
<div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
    <h1 class=\"h3 mb-0 text-gray-800\">
        <i class=\"fas fa-paint-brush me-2\"></i>
        Gestion des Thèmes
    </h1>
    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadThemeModal\">
        <i class=\"fas fa-upload me-2\"></i>
        Installer un Thème
    </button>
</div>

<!-- Statistiques des thèmes -->
<div class=\"row mb-4\">
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                            Thèmes Disponibles
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ availableThemes|length }}</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-palette fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-success shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">
                            Thème Actif
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">
                            {{ activeTheme ? themeMetadata[activeTheme].name|default(activeTheme|title) : 'Aucun' }}
                        </div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-check-circle fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des thèmes -->
<div class=\"card shadow mb-4\">
    <div class=\"card-header py-3\">
        <h6 class=\"m-0 font-weight-bold text-primary\">Thèmes Disponibles</h6>
    </div>
    <div class=\"card-body\">
        {% if availableThemes|length > 0 %}
            <div class=\"row\">
                {% for themeName, themePath in availableThemes %}
                    {% set metadata = themeMetadata[themeName] ?? {} %}
                    {% set isActive = themeName == activeTheme %}
                    
                    <div class=\"col-lg-6 col-xl-4 mb-4\">
                        <div class=\"card h-100 {{ isActive ? 'border-success' : 'border-secondary' }}\">
                            <!-- Screenshot du thème -->
                            <div class=\"card-img-top-container\" style=\"height: 200px; overflow: hidden; background: #f8f9fa;\">
                                {% set screenshot = metadata.screenshot %}
                                {% if screenshot %}
                                    <img src=\"{{ '/themes/' ~ themeName ~ '/' ~ screenshot }}\" 
                                         class=\"card-img-top\" 
                                         style=\"width: 100%; height: 100%; object-fit: cover;\"
                                         alt=\"Screenshot {{ metadata.name ?? themeName }}\">
                                {% else %}
                                    <div class=\"d-flex align-items-center justify-content-center h-100\">
                                        <i class=\"fas fa-image fa-3x text-gray-300\"></i>
                                    </div>
                                {% endif %}
                            </div>
                            
                            <div class=\"card-body\">
                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                    <h5 class=\"card-title\">{{ metadata.name ?? themeName|title }}</h5>
                                    {% if isActive %}
                                        <span class=\"badge bg-success\">Actif</span>
                                    {% else %}
                                        <span class=\"badge bg-secondary\">Disponible</span>
                                    {% endif %}
                                </div>
                                
                                <p class=\"card-text text-muted small\">
                                    {{ metadata.description ?? 'Aucune description disponible' }}
                                </p>
                                
                                <div class=\"row\">
                                    {% if metadata.version is defined %}
                                        <div class=\"col-6\">
                                            <small class=\"text-muted\">
                                                <strong>Version:</strong> {{ metadata.version }}
                                            </small>
                                        </div>
                                    {% endif %}
                                    
                                    {% if metadata.author is defined %}
                                        <div class=\"col-6\">
                                            <small class=\"text-muted\">
                                                <strong>Auteur:</strong> {{ metadata.author }}
                                            </small>
                                        </div>
                                    {% endif %}
                                </div>
                                
                                {% if metadata.supports is defined and metadata.supports|length > 0 %}
                                    <div class=\"mt-2\">
                                        <small class=\"text-muted\">
                                            <strong>Fonctionnalités:</strong>
                                        </small>
                                        <div class=\"mt-1\">
                                            {% for support in metadata.supports %}
                                                <span class=\"badge bg-info me-1\">{{ support }}</span>
                                            {% endfor %}
                                        </div>
                                    </div>
                                {% endif %}
                            </div>
                            
                            <div class=\"card-footer bg-transparent\">
                                {% if isActive %}
                                    <button class=\"btn btn-success btn-sm w-100\" disabled>
                                        <i class=\"fas fa-check me-1\"></i>
                                        Thème Actif
                                    </button>
                                {% else %}
                                    <div class=\"btn-group w-100\" role=\"group\">
                                        <a href=\"{{ path('admin_themes_activate', {'themeName': themeName}) }}\" 
                                           class=\"btn btn-primary btn-sm\"
                                           onclick=\"return confirm('Êtes-vous sûr de vouloir activer ce thème ?')\">
                                            <i class=\"fas fa-paint-brush me-1\"></i>
                                            Activer
                                        </a>
                                        
                                        <a href=\"{{ path('admin_themes_delete', {'themeName': themeName}) }}\" 
                                           class=\"btn btn-danger btn-sm\"
                                           onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce thème ? Cette action est irréversible.')\">
                                            <i class=\"fas fa-trash me-1\"></i>
                                            Supprimer
                                        </a>
                                    </div>
                                {% endif %}
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        {% else %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-paint-brush fa-3x text-gray-300 mb-3\"></i>
                <h5 class=\"text-gray-600\">Aucun thème installé</h5>
                <p class=\"text-gray-500\">Commencez par installer votre premier thème.</p>
            </div>
        {% endif %}
    </div>
</div>

<!-- Modal d'upload de thème -->
<div class=\"modal fade\" id=\"uploadThemeModal\" tabindex=\"-1\" aria-labelledby=\"uploadThemeModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"uploadThemeModalLabel\">
                    <i class=\"fas fa-upload me-2\"></i>
                    Installer un Thème
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            
            <form action=\"{{ path('admin_themes_upload') }}\" method=\"POST\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"mb-3\">
                        <label for=\"theme_file\" class=\"form-label\">Fichier Thème (.zip)</label>
                        <input type=\"file\" class=\"form-control\" id=\"theme_file\" name=\"theme_file\" accept=\".zip\" required>
                        <div class=\"form-text\">
                            Sélectionnez un fichier ZIP contenant le thème à installer.
                        </div>
                    </div>
                    
                    <div class=\"alert alert-info\">
                        <i class=\"fas fa-info-circle me-2\"></i>
                        <strong>Instructions :</strong>
                        <ul class=\"mb-0 mt-2\">
                            <li>Le fichier doit être un archive ZIP</li>
                            <li>Le thème doit contenir un fichier theme.yaml (optionnel)</li>
                            <li>Le dossier templates/ doit contenir les fichiers Twig</li>
                            <li>Ajoutez un screenshot.png pour un aperçu du thème</li>
                        </ul>
                    </div>
                </div>
                
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-upload me-2\"></i>
                        Installer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}
", "admin/extensions/themes/index.html.twig", "/workspace/symfpress/templates/admin/extensions/themes/index.html.twig");
    }
}
