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

/* admin/media/index.html.twig */
class __TwigTemplate_22cfbcbaf8329566d51d44546307598b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/index.html.twig"));

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

        yield "Bibliothèque média";
        
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
        yield "<div class=\"container-fluid\">
    <!-- En-tête avec statistiques -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">📁 Bibliothèque Média</h1>
        <div class=\"d-flex gap-3 align-items-center\">
            <div class=\"badge-group\">
                <span class=\"badge bg-primary\">📁 ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 12, $this->source); })()), "total_files", [], "any", false, false, false, 12), "html", null, true);
        yield " fichiers</span>
                <span class=\"badge bg-info\">💾 ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round(((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 13, $this->source); })()), "total_size", [], "any", false, false, false, 13) / 1024) / 1024), 1), "html", null, true);
        yield " MB utilisés</span>
            </div>
            <button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-cloud-upload-alt me-2\"></i>Uploader des fichiers
            </button>
        </div>
    </div>

    <!-- Filtres et recherche -->
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            <form method=\"GET\" class=\"row g-3 align-items-end\">
                <div class=\"col-md-3\">
                    <label for=\"type\" class=\"form-label\">Type de média</label>
                    <select name=\"type\" id=\"type\" class=\"form-select\">
                        <option value=\"all\" ";
        // line 28
        yield ((((isset($context["currentType"]) || array_key_exists("currentType", $context) ? $context["currentType"] : (function () { throw new RuntimeError('Variable "currentType" does not exist.', 28, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les types</option>
                        <option value=\"images\" ";
        // line 29
        yield ((((isset($context["currentType"]) || array_key_exists("currentType", $context) ? $context["currentType"] : (function () { throw new RuntimeError('Variable "currentType" does not exist.', 29, $this->source); })()) == "images")) ? ("selected") : (""));
        yield ">🖼️ Images</option>
                        <option value=\"documents\" ";
        // line 30
        yield ((((isset($context["currentType"]) || array_key_exists("currentType", $context) ? $context["currentType"] : (function () { throw new RuntimeError('Variable "currentType" does not exist.', 30, $this->source); })()) == "documents")) ? ("selected") : (""));
        yield ">📄 Documents</option>
                        <option value=\"videos\" ";
        // line 31
        yield ((((isset($context["currentType"]) || array_key_exists("currentType", $context) ? $context["currentType"] : (function () { throw new RuntimeError('Variable "currentType" does not exist.', 31, $this->source); })()) == "videos")) ? ("selected") : (""));
        yield ">🎥 Vidéos</option>
                        <option value=\"audio\" ";
        // line 32
        yield ((((isset($context["currentType"]) || array_key_exists("currentType", $context) ? $context["currentType"] : (function () { throw new RuntimeError('Variable "currentType" does not exist.', 32, $this->source); })()) == "audio")) ? ("selected") : (""));
        yield ">🎧 Audio</option>
                    </select>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"search\" class=\"form-label\">Rechercher</label>
                    <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" 
                           placeholder=\"Nom du fichier, description, texte alternatif...\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 38, $this->source); })()), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-3\">
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary flex-fill\">🔍 Filtrer</button>
                        <a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index");
        yield "\" class=\"btn btn-outline-secondary\">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    ";
        // line 50
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["medias"]) || array_key_exists("medias", $context) ? $context["medias"] : (function () { throw new RuntimeError('Variable "medias" does not exist.', 50, $this->source); })()))) {
            // line 51
            yield "        <div class=\"text-center py-5\">
            <div class=\"mb-4\">
                <i class=\"fas fa-folder-open\" style=\"font-size: 4rem; color: #6c757d;\"></i>
            </div>
            <h4 class=\"text-muted\">Aucun média trouvé</h4>
            <p class=\"text-muted mb-4\">
                ";
            // line 57
            if ((((isset($context["currentType"]) || array_key_exists("currentType", $context) ? $context["currentType"] : (function () { throw new RuntimeError('Variable "currentType" does not exist.', 57, $this->source); })()) != "all") || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 57, $this->source); })()))) {
                // line 58
                yield "                    Essayez de modifier vos critères de recherche.
                ";
            } else {
                // line 60
                yield "                    Commencez par uploader vos premiers fichiers.
                ";
            }
            // line 62
            yield "            </p>
            <button class=\"btn btn-primary btn-lg\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-cloud-upload-alt me-2\"></i>Uploader des fichiers
            </button>
        </div>
    ";
        } else {
            // line 68
            yield "        <!-- Actions en masse -->
        <form id=\"bulk-form\" method=\"POST\" action=\"";
            // line 69
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_bulk_delete");
            yield "\">
            <div class=\"card mb-3\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-6\">
                            <div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"select-all\">
                                <label class=\"form-check-label\" for=\"select-all\">
                                    <strong>Sélectionner tout</strong>
                                </label>
                                <small class=\"text-muted ms-3\" id=\"selection-count\">0 fichier(s) sélectionné(s)</small>
                            </div>
                        </div>
                        <div class=\"col-md-6 text-end\">
                            <button type=\"submit\" class=\"btn btn-danger btn-sm\" id=\"bulk-delete-btn\" 
                                    style=\"display: none;\" 
                                    onclick=\"return confirm('Supprimer définitivement les médias sélectionnés ?')\">
                                <i class=\"fas fa-trash me-1\"></i>Supprimer la sélection
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grille des médias -->
            <div class=\"media-grid row g-3\" id=\"media-grid\">
                ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["medias"]) || array_key_exists("medias", $context) ? $context["medias"] : (function () { throw new RuntimeError('Variable "medias" does not exist.', 95, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["media"]) {
                // line 96
                yield "                <div class=\"col-lg-2 col-md-3 col-sm-4 col-6\">
                    <div class=\"media-item card h-100\" data-media-id=\"";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 97), "html", null, true);
                yield "\">
                        <div class=\"position-relative\">
                            <!-- Checkbox de sélection -->
                            <div class=\"position-absolute top-0 start-0 p-2\">
                                <input class=\"form-check-input media-checkbox\" type=\"checkbox\" 
                                       name=\"selected_media[]\" value=\"";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 102), "html", null, true);
                yield "\">
                            </div>
                            
                            <!-- Aperçu du média -->
                            <div class=\"media-preview\" style=\"height: 150px; overflow: hidden;\">
                                ";
                // line 107
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["media"], "isImage", [], "any", false, false, false, 107)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 108
                    yield "                                    <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "url", [], "any", false, false, false, 108), "html", null, true);
                    yield "\" 
                                         alt=\"";
                    // line 109
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", true, true, false, 109) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", false, false, false, 109)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", false, false, false, 109), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 109), "html", null, true)));
                    yield "\" 
                                         class=\"w-100 h-100\" 
                                         style=\"object-fit: cover; cursor: pointer;\"
                                         data-bs-toggle=\"modal\" 
                                         data-bs-target=\"#mediaModal\"
                                         data-media-id=\"";
                    // line 114
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 114), "html", null, true);
                    yield "\">
                                ";
                } else {
                    // line 116
                    yield "                                    <div class=\"d-flex align-items-center justify-content-center h-100 bg-light file-icon\"
                                         style=\"cursor: pointer;\"
                                         data-bs-toggle=\"modal\" 
                                         data-bs-target=\"#mediaModal\"
                                         data-media-id=\"";
                    // line 120
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 120), "html", null, true);
                    yield "\">
                                        ";
                    // line 121
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["media"], "isPdf", [], "any", false, false, false, 121)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 122
                        yield "                                            <i class=\"fas fa-file-pdf text-danger\" style=\"font-size: 2.5rem;\"></i>
                                        ";
                    } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                     // line 123
$context["media"], "isVideo", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 124
                        yield "                                            <i class=\"fas fa-file-video text-primary\" style=\"font-size: 2.5rem;\"></i>
                                        ";
                    } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                     // line 125
$context["media"], "isAudio", [], "any", false, false, false, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 126
                        yield "                                            <i class=\"fas fa-file-audio text-success\" style=\"font-size: 2.5rem;\"></i>
                                        ";
                    } else {
                        // line 128
                        yield "                                            <i class=\"fas fa-file text-secondary\" style=\"font-size: 2.5rem;\"></i>
                                        ";
                    }
                    // line 130
                    yield "                                    </div>
                                ";
                }
                // line 132
                yield "                            </div>
                        </div>
                        
                        <!-- Informations du média -->
                        <div class=\"card-body p-3\">
                            <h6 class=\"card-title mb-1\" title=\"";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 137), "html", null, true);
                yield "\">
                                ";
                // line 138
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 138), 0, 20), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 138)) > 20)) {
                    yield "...";
                }
                // line 139
                yield "                            </h6>
                            <small class=\"text-muted d-block mb-2\">
                                ";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "formattedFileSize", [], "any", false, false, false, 141), "html", null, true);
                yield " • ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "createdAt", [], "any", false, false, false, 141), "d/m/Y"), "html", null, true);
                yield "
                            </small>
                            
                            <!-- Actions rapides -->
                            <div class=\"btn-group w-100\" role=\"group\">
                                <a href=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 146)]), "html", null, true);
                yield "\" 
                                   class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"fas fa-eye\"></i>
                                </a>
                                <a href=\"";
                // line 150
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 150)]), "html", null, true);
                yield "\" 
                                   class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"fas fa-edit\"></i>
                                </a>
                                <button type=\"button\" class=\"btn btn-outline-danger btn-sm delete-media-btn\" 
                                        data-media-id=\"";
                // line 155
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 155), "html", null, true);
                yield "\" 
                                        data-media-name=\"";
                // line 156
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 156), "html", null, true);
                yield "\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['media'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 164
            yield "            </div>
        </form>
        
        <!-- Pagination -->
        ";
            // line 168
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 168, $this->source); })()), "pages", [], "any", false, false, false, 168) > 1)) {
                // line 169
                yield "        <nav class=\"mt-4\">
            <ul class=\"pagination justify-content-center\">
                ";
                // line 171
                $context["currentParams"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 171, $this->source); })()), "request", [], "any", false, false, false, 171), "query", [], "any", false, false, false, 171), "all", [], "any", false, false, false, 171);
                // line 172
                yield "                
                ";
                // line 173
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 173, $this->source); })()), "page", [], "any", false, false, false, 173) > 1)) {
                    // line 174
                    yield "                    ";
                    $context["currentParams"] = Twig\Extension\CoreExtension::merge((isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 174, $this->source); })()), ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 174, $this->source); })()), "page", [], "any", false, false, false, 174) - 1)]);
                    // line 175
                    yield "                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"";
                    // line 176
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index", (isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 176, $this->source); })())), "html", null, true);
                    yield "\">Précédent</a>
                    </li>
                ";
                }
                // line 179
                yield "                
                ";
                // line 180
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(max(1, (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 180, $this->source); })()), "page", [], "any", false, false, false, 180) - 2)), min(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 180, $this->source); })()), "pages", [], "any", false, false, false, 180), (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 180, $this->source); })()), "page", [], "any", false, false, false, 180) + 2))));
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    // line 181
                    yield "                    ";
                    $context["currentParams"] = Twig\Extension\CoreExtension::merge((isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 181, $this->source); })()), ["page" => $context["p"]]);
                    // line 182
                    yield "                    <li class=\"page-item ";
                    yield ((($context["p"] == CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 182, $this->source); })()), "page", [], "any", false, false, false, 182))) ? ("active") : (""));
                    yield "\">
                        <a class=\"page-link\" href=\"";
                    // line 183
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index", (isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 183, $this->source); })())), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                    yield "</a>
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 186
                yield "                
                ";
                // line 187
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 187, $this->source); })()), "page", [], "any", false, false, false, 187) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 187, $this->source); })()), "pages", [], "any", false, false, false, 187))) {
                    // line 188
                    yield "                    ";
                    $context["currentParams"] = Twig\Extension\CoreExtension::merge((isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 188, $this->source); })()), ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 188, $this->source); })()), "page", [], "any", false, false, false, 188) + 1)]);
                    // line 189
                    yield "                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"";
                    // line 190
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index", (isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 190, $this->source); })())), "html", null, true);
                    yield "\">Suivant</a>
                    </li>
                ";
                }
                // line 193
                yield "            </ul>
        </nav>
        ";
            }
            // line 196
            yield "    ";
        }
        // line 197
        yield "</div>

<!-- Modal d'upload -->
<div class=\"modal fade\" id=\"uploadModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">📁 Uploader des fichiers</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <!-- Zone de dépôt drag & drop -->
                <div id=\"dropzone\" class=\"border-dashed border-3 border-primary rounded p-5 text-center mb-3\" 
                     style=\"border-style: dashed !important; transition: all 0.3s;\">
                    <div id=\"dropzone-content\">
                        <i class=\"fas fa-cloud-upload-alt text-primary mb-3\" style=\"font-size: 3rem;\"></i>
                        <h5 class=\"text-primary mb-2\">Glissez-déposez vos fichiers ici</h5>
                        <p class=\"text-muted mb-3\">ou <button type=\"button\" class=\"btn btn-link p-0 text-decoration-underline\" id=\"browse-files\">cliquez pour parcourir</button></p>
                        <small class=\"text-muted\">
                            Types autorisés : Images (JPG, PNG, GIF, WebP), Documents (PDF, DOC, TXT), Archives (ZIP)<br>
                            Taille max : ";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((((isset($context["maxFileSize"]) || array_key_exists("maxFileSize", $context) ? $context["maxFileSize"] : (function () { throw new RuntimeError('Variable "maxFileSize" does not exist.', 217, $this->source); })()) / 1024) / 1024), 1), "html", null, true);
        yield " MB par fichier
                        </small>
                    </div>
                    <div id=\"upload-progress\" style=\"display: none;\">
                        <div class=\"progress mb-3\">
                            <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%\"></div>
                        </div>
                        <p class=\"text-muted mb-0\">Upload en cours...</p>
                    </div>
                </div>
                
                <input type=\"file\" id=\"file-input\" multiple style=\"display: none;\" 
                       accept=\"image/*,.pdf,.doc,.docx,.txt,.zip\">
                
                <!-- Liste des fichiers à uploader -->
                <div id=\"file-list\" style=\"display: none;\">
                    <h6>Fichiers sélectionnés :</h6>
                    <div id=\"selected-files\" class=\"list-group mb-3\"></div>
                </div>
                
                <!-- Résultats d'upload -->
                <div id=\"upload-results\" style=\"display: none;\"></div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
                <button type=\"button\" class=\"btn btn-primary\" id=\"start-upload\" style=\"display: none;\">
                    <i class=\"fas fa-upload me-2\"></i>Commencer l'upload
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de visualisation des médias -->
<div class=\"modal fade\" id=\"mediaModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-xl\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Détail du média</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" id=\"mediaModalContent\">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<!-- CSS personnalisé -->
<style>
.media-grid .media-item {
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
}

.media-grid .media-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.media-preview img {
    transition: transform 0.2s;
}

.media-preview:hover img {
    transform: scale(1.05);
}

.border-dashed {
    border-style: dashed !important;
}

#dropzone.dragover {
    background-color: #e3f2fd;
    border-color: #1976d2 !important;
    transform: scale(1.02);
}

.file-icon {
    transition: transform 0.2s;
}

.file-icon:hover {
    transform: scale(1.1);
}

.badge-group .badge {
    margin-right: 0.5rem;
}
</style>

<!-- JavaScript pour l'upload et les interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file-input');
    const browseBtn = document.getElementById('browse-files');
    const startUploadBtn = document.getElementById('start-upload');
    const fileList = document.getElementById('file-list');
    const selectedFiles = document.getElementById('selected-files');
    const uploadProgress = document.getElementById('upload-progress');
    const dropzoneContent = document.getElementById('dropzone-content');
    const uploadResults = document.getElementById('upload-results');
    
    let filesToUpload = [];
    
    // Gestion du drag & drop
    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });
    
    dropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
    });
    
    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });
    
    // Clic pour parcourir
    browseBtn.addEventListener('click', function() {
        fileInput.click();
    });
    
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });
    
    // Fonction pour gérer les fichiers sélectionnés
    function handleFiles(files) {
        filesToUpload = Array.from(files);
        displaySelectedFiles();
    }
    
    function displaySelectedFiles() {
        selectedFiles.innerHTML = '';
        
        filesToUpload.forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            fileItem.innerHTML = `
                <div>
                    <strong>\${file.name}</strong><br>
                    <small class=\"text-muted\">\${formatFileSize(file.size)} • \${file.type}</small>
                </div>
                <button type=\"button\" class=\"btn btn-outline-danger btn-sm\" onclick=\"removeFile(\${index})\">
                    <i class=\"fas fa-times\"></i>
                </button>
            `;
            selectedFiles.appendChild(fileItem);
        });
        
        fileList.style.display = filesToUpload.length > 0 ? 'block' : 'none';
        startUploadBtn.style.display = filesToUpload.length > 0 ? 'inline-block' : 'none';
    }
    
    window.removeFile = function(index) {
        filesToUpload.splice(index, 1);
        displaySelectedFiles();
    };
    
    function formatFileSize(size) {
        const units = ['B', 'KB', 'MB', 'GB'];
        let unitIndex = 0;
        while (size >= 1024 && unitIndex < units.length - 1) {
            size /= 1024;
            unitIndex++;
        }
        return Math.round(size * 100) / 100 + ' ' + units[unitIndex];
    }
    
    // Upload des fichiers
    startUploadBtn.addEventListener('click', function() {
        if (filesToUpload.length === 0) return;
        
        const formData = new FormData();
        filesToUpload.forEach(file => {
            formData.append('files[]', file);
        });
        
        // Afficher la progression
        dropzoneContent.style.display = 'none';
        uploadProgress.style.display = 'block';
        fileList.style.display = 'none';
        startUploadBtn.style.display = 'none';
        
        fetch('";
        // line 408
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_upload");
        yield "', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            displayUploadResults(data);
        })
        .catch(error => {
            console.error('Erreur upload:', error);
            uploadResults.innerHTML = '<div class=\"alert alert-danger\">Erreur lors de l\\'upload</div>';
            uploadResults.style.display = 'block';
        })
        .finally(() => {
            uploadProgress.style.display = 'none';
        });
    });
    
    function displayUploadResults(data) {
        let html = '';
        
        if (data.uploaded_count > 0) {
            html += `<div class=\"alert alert-success\">
                <i class=\"fas fa-check-circle me-2\"></i>
                \${data.uploaded_count} fichier(s) uploadé(s) avec succès
            </div>`;
        }
        
        if (data.error_count > 0) {
            html += `<div class=\"alert alert-warning\">
                <i class=\"fas fa-exclamation-triangle me-2\"></i>
                \${data.error_count} erreur(s) d'upload :
                <ul class=\"mb-0 mt-2\">`;
            data.errors.forEach(error => {
                html += `<li>\${error}</li>`;
            });
            html += '</ul></div>';
        }
        
        uploadResults.innerHTML = html;
        uploadResults.style.display = 'block';
        
        // Recharger la page après quelques secondes si upload réussi
        if (data.uploaded_count > 0) {
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    }
    
    // Sélection multiple
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.media-checkbox');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
    const selectionCount = document.getElementById('selection-count');
    
    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateSelectionUI();
    });
    
    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateSelectionUI);
    });
    
    function updateSelectionUI() {
        const selectedCount = document.querySelectorAll('.media-checkbox:checked').length;
        selectionCount.textContent = `\${selectedCount} fichier(s) sélectionné(s)`;
        bulkDeleteBtn.style.display = selectedCount > 0 ? 'inline-block' : 'none';
    }
    
    // Suppression individuelle
    document.querySelectorAll('.delete-media-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const mediaId = this.dataset.mediaId;
            const mediaName = this.dataset.mediaName;
            
            if (confirm(`Supprimer définitivement \"\${mediaName}\" ?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/media/\${mediaId}/delete`;
                
                const token = document.createElement('input');
                token.type = 'hidden';
                token.name = '_token';
                token.value = '";
        // line 493
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete_media_"), "html", null, true);
        yield "' + mediaId;
                
                form.appendChild(token);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
    
    // Modal de visualisation
    const mediaModal = document.getElementById('mediaModal');
    mediaModal.addEventListener('show.bs.modal', function(event) {
        const trigger = event.relatedTarget;
        const mediaId = trigger.dataset.mediaId;
        
        if (mediaId) {
            fetch(`/admin/media/\${mediaId}`)
                .then(response => response.text())
                .then(html => {
                    // Extraire le contenu du body de la réponse
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const content = doc.querySelector('main .container-fluid');
                    document.getElementById('mediaModalContent').innerHTML = content ? content.innerHTML : html;
                })
                .catch(error => {
                    document.getElementById('mediaModalContent').innerHTML = '<div class=\"alert alert-danger\">Erreur de chargement</div>';
                });
        }
    });
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
        return "admin/media/index.html.twig";
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
        return array (  759 => 493,  671 => 408,  477 => 217,  455 => 197,  452 => 196,  447 => 193,  441 => 190,  438 => 189,  435 => 188,  433 => 187,  430 => 186,  419 => 183,  414 => 182,  411 => 181,  407 => 180,  404 => 179,  398 => 176,  395 => 175,  392 => 174,  390 => 173,  387 => 172,  385 => 171,  381 => 169,  379 => 168,  373 => 164,  359 => 156,  355 => 155,  347 => 150,  340 => 146,  330 => 141,  326 => 139,  321 => 138,  317 => 137,  310 => 132,  306 => 130,  302 => 128,  298 => 126,  296 => 125,  293 => 124,  291 => 123,  288 => 122,  286 => 121,  282 => 120,  276 => 116,  271 => 114,  263 => 109,  258 => 108,  256 => 107,  248 => 102,  240 => 97,  237 => 96,  233 => 95,  204 => 69,  201 => 68,  193 => 62,  189 => 60,  185 => 58,  183 => 57,  175 => 51,  173 => 50,  163 => 43,  155 => 38,  146 => 32,  142 => 31,  138 => 30,  134 => 29,  130 => 28,  112 => 13,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Bibliothèque média{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <!-- En-tête avec statistiques -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">📁 Bibliothèque Média</h1>
        <div class=\"d-flex gap-3 align-items-center\">
            <div class=\"badge-group\">
                <span class=\"badge bg-primary\">📁 {{ stats.total_files }} fichiers</span>
                <span class=\"badge bg-info\">💾 {{ (stats.total_size / 1024 / 1024)|round(1) }} MB utilisés</span>
            </div>
            <button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-cloud-upload-alt me-2\"></i>Uploader des fichiers
            </button>
        </div>
    </div>

    <!-- Filtres et recherche -->
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            <form method=\"GET\" class=\"row g-3 align-items-end\">
                <div class=\"col-md-3\">
                    <label for=\"type\" class=\"form-label\">Type de média</label>
                    <select name=\"type\" id=\"type\" class=\"form-select\">
                        <option value=\"all\" {{ currentType == 'all' ? 'selected' : '' }}>Tous les types</option>
                        <option value=\"images\" {{ currentType == 'images' ? 'selected' : '' }}>🖼️ Images</option>
                        <option value=\"documents\" {{ currentType == 'documents' ? 'selected' : '' }}>📄 Documents</option>
                        <option value=\"videos\" {{ currentType == 'videos' ? 'selected' : '' }}>🎥 Vidéos</option>
                        <option value=\"audio\" {{ currentType == 'audio' ? 'selected' : '' }}>🎧 Audio</option>
                    </select>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"search\" class=\"form-label\">Rechercher</label>
                    <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" 
                           placeholder=\"Nom du fichier, description, texte alternatif...\" value=\"{{ search }}\">
                </div>
                <div class=\"col-md-3\">
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary flex-fill\">🔍 Filtrer</button>
                        <a href=\"{{ path('admin_media_index') }}\" class=\"btn btn-outline-secondary\">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {% if medias is empty %}
        <div class=\"text-center py-5\">
            <div class=\"mb-4\">
                <i class=\"fas fa-folder-open\" style=\"font-size: 4rem; color: #6c757d;\"></i>
            </div>
            <h4 class=\"text-muted\">Aucun média trouvé</h4>
            <p class=\"text-muted mb-4\">
                {% if currentType != 'all' or search %}
                    Essayez de modifier vos critères de recherche.
                {% else %}
                    Commencez par uploader vos premiers fichiers.
                {% endif %}
            </p>
            <button class=\"btn btn-primary btn-lg\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-cloud-upload-alt me-2\"></i>Uploader des fichiers
            </button>
        </div>
    {% else %}
        <!-- Actions en masse -->
        <form id=\"bulk-form\" method=\"POST\" action=\"{{ path('admin_media_bulk_delete') }}\">
            <div class=\"card mb-3\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-6\">
                            <div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"select-all\">
                                <label class=\"form-check-label\" for=\"select-all\">
                                    <strong>Sélectionner tout</strong>
                                </label>
                                <small class=\"text-muted ms-3\" id=\"selection-count\">0 fichier(s) sélectionné(s)</small>
                            </div>
                        </div>
                        <div class=\"col-md-6 text-end\">
                            <button type=\"submit\" class=\"btn btn-danger btn-sm\" id=\"bulk-delete-btn\" 
                                    style=\"display: none;\" 
                                    onclick=\"return confirm('Supprimer définitivement les médias sélectionnés ?')\">
                                <i class=\"fas fa-trash me-1\"></i>Supprimer la sélection
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grille des médias -->
            <div class=\"media-grid row g-3\" id=\"media-grid\">
                {% for media in medias %}
                <div class=\"col-lg-2 col-md-3 col-sm-4 col-6\">
                    <div class=\"media-item card h-100\" data-media-id=\"{{ media.id }}\">
                        <div class=\"position-relative\">
                            <!-- Checkbox de sélection -->
                            <div class=\"position-absolute top-0 start-0 p-2\">
                                <input class=\"form-check-input media-checkbox\" type=\"checkbox\" 
                                       name=\"selected_media[]\" value=\"{{ media.id }}\">
                            </div>
                            
                            <!-- Aperçu du média -->
                            <div class=\"media-preview\" style=\"height: 150px; overflow: hidden;\">
                                {% if media.isImage %}
                                    <img src=\"{{ media.url }}\" 
                                         alt=\"{{ media.alt ?? media.originalName }}\" 
                                         class=\"w-100 h-100\" 
                                         style=\"object-fit: cover; cursor: pointer;\"
                                         data-bs-toggle=\"modal\" 
                                         data-bs-target=\"#mediaModal\"
                                         data-media-id=\"{{ media.id }}\">
                                {% else %}
                                    <div class=\"d-flex align-items-center justify-content-center h-100 bg-light file-icon\"
                                         style=\"cursor: pointer;\"
                                         data-bs-toggle=\"modal\" 
                                         data-bs-target=\"#mediaModal\"
                                         data-media-id=\"{{ media.id }}\">
                                        {% if media.isPdf %}
                                            <i class=\"fas fa-file-pdf text-danger\" style=\"font-size: 2.5rem;\"></i>
                                        {% elseif media.isVideo %}
                                            <i class=\"fas fa-file-video text-primary\" style=\"font-size: 2.5rem;\"></i>
                                        {% elseif media.isAudio %}
                                            <i class=\"fas fa-file-audio text-success\" style=\"font-size: 2.5rem;\"></i>
                                        {% else %}
                                            <i class=\"fas fa-file text-secondary\" style=\"font-size: 2.5rem;\"></i>
                                        {% endif %}
                                    </div>
                                {% endif %}
                            </div>
                        </div>
                        
                        <!-- Informations du média -->
                        <div class=\"card-body p-3\">
                            <h6 class=\"card-title mb-1\" title=\"{{ media.originalName }}\">
                                {{ media.originalName|slice(0, 20) }}{% if media.originalName|length > 20 %}...{% endif %}
                            </h6>
                            <small class=\"text-muted d-block mb-2\">
                                {{ media.formattedFileSize }} • {{ media.createdAt|date('d/m/Y') }}
                            </small>
                            
                            <!-- Actions rapides -->
                            <div class=\"btn-group w-100\" role=\"group\">
                                <a href=\"{{ path('admin_media_show', {id: media.id}) }}\" 
                                   class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"fas fa-eye\"></i>
                                </a>
                                <a href=\"{{ path('admin_media_edit', {id: media.id}) }}\" 
                                   class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"fas fa-edit\"></i>
                                </a>
                                <button type=\"button\" class=\"btn btn-outline-danger btn-sm delete-media-btn\" 
                                        data-media-id=\"{{ media.id }}\" 
                                        data-media-name=\"{{ media.originalName }}\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </form>
        
        <!-- Pagination -->
        {% if pagination.pages > 1 %}
        <nav class=\"mt-4\">
            <ul class=\"pagination justify-content-center\">
                {% set currentParams = app.request.query.all %}
                
                {% if pagination.page > 1 %}
                    {% set currentParams = currentParams|merge({page: pagination.page - 1}) %}
                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"{{ path('admin_media_index', currentParams) }}\">Précédent</a>
                    </li>
                {% endif %}
                
                {% for p in range(max(1, pagination.page - 2), min(pagination.pages, pagination.page + 2)) %}
                    {% set currentParams = currentParams|merge({page: p}) %}
                    <li class=\"page-item {{ p == pagination.page ? 'active' : '' }}\">
                        <a class=\"page-link\" href=\"{{ path('admin_media_index', currentParams) }}\">{{ p }}</a>
                    </li>
                {% endfor %}
                
                {% if pagination.page < pagination.pages %}
                    {% set currentParams = currentParams|merge({page: pagination.page + 1}) %}
                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"{{ path('admin_media_index', currentParams) }}\">Suivant</a>
                    </li>
                {% endif %}
            </ul>
        </nav>
        {% endif %}
    {% endif %}
</div>

<!-- Modal d'upload -->
<div class=\"modal fade\" id=\"uploadModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">📁 Uploader des fichiers</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <!-- Zone de dépôt drag & drop -->
                <div id=\"dropzone\" class=\"border-dashed border-3 border-primary rounded p-5 text-center mb-3\" 
                     style=\"border-style: dashed !important; transition: all 0.3s;\">
                    <div id=\"dropzone-content\">
                        <i class=\"fas fa-cloud-upload-alt text-primary mb-3\" style=\"font-size: 3rem;\"></i>
                        <h5 class=\"text-primary mb-2\">Glissez-déposez vos fichiers ici</h5>
                        <p class=\"text-muted mb-3\">ou <button type=\"button\" class=\"btn btn-link p-0 text-decoration-underline\" id=\"browse-files\">cliquez pour parcourir</button></p>
                        <small class=\"text-muted\">
                            Types autorisés : Images (JPG, PNG, GIF, WebP), Documents (PDF, DOC, TXT), Archives (ZIP)<br>
                            Taille max : {{ (maxFileSize / 1024 / 1024)|round(1) }} MB par fichier
                        </small>
                    </div>
                    <div id=\"upload-progress\" style=\"display: none;\">
                        <div class=\"progress mb-3\">
                            <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%\"></div>
                        </div>
                        <p class=\"text-muted mb-0\">Upload en cours...</p>
                    </div>
                </div>
                
                <input type=\"file\" id=\"file-input\" multiple style=\"display: none;\" 
                       accept=\"image/*,.pdf,.doc,.docx,.txt,.zip\">
                
                <!-- Liste des fichiers à uploader -->
                <div id=\"file-list\" style=\"display: none;\">
                    <h6>Fichiers sélectionnés :</h6>
                    <div id=\"selected-files\" class=\"list-group mb-3\"></div>
                </div>
                
                <!-- Résultats d'upload -->
                <div id=\"upload-results\" style=\"display: none;\"></div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
                <button type=\"button\" class=\"btn btn-primary\" id=\"start-upload\" style=\"display: none;\">
                    <i class=\"fas fa-upload me-2\"></i>Commencer l'upload
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de visualisation des médias -->
<div class=\"modal fade\" id=\"mediaModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-xl\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Détail du média</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" id=\"mediaModalContent\">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<!-- CSS personnalisé -->
<style>
.media-grid .media-item {
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
}

.media-grid .media-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.media-preview img {
    transition: transform 0.2s;
}

.media-preview:hover img {
    transform: scale(1.05);
}

.border-dashed {
    border-style: dashed !important;
}

#dropzone.dragover {
    background-color: #e3f2fd;
    border-color: #1976d2 !important;
    transform: scale(1.02);
}

.file-icon {
    transition: transform 0.2s;
}

.file-icon:hover {
    transform: scale(1.1);
}

.badge-group .badge {
    margin-right: 0.5rem;
}
</style>

<!-- JavaScript pour l'upload et les interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file-input');
    const browseBtn = document.getElementById('browse-files');
    const startUploadBtn = document.getElementById('start-upload');
    const fileList = document.getElementById('file-list');
    const selectedFiles = document.getElementById('selected-files');
    const uploadProgress = document.getElementById('upload-progress');
    const dropzoneContent = document.getElementById('dropzone-content');
    const uploadResults = document.getElementById('upload-results');
    
    let filesToUpload = [];
    
    // Gestion du drag & drop
    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });
    
    dropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
    });
    
    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });
    
    // Clic pour parcourir
    browseBtn.addEventListener('click', function() {
        fileInput.click();
    });
    
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });
    
    // Fonction pour gérer les fichiers sélectionnés
    function handleFiles(files) {
        filesToUpload = Array.from(files);
        displaySelectedFiles();
    }
    
    function displaySelectedFiles() {
        selectedFiles.innerHTML = '';
        
        filesToUpload.forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            fileItem.innerHTML = `
                <div>
                    <strong>\${file.name}</strong><br>
                    <small class=\"text-muted\">\${formatFileSize(file.size)} • \${file.type}</small>
                </div>
                <button type=\"button\" class=\"btn btn-outline-danger btn-sm\" onclick=\"removeFile(\${index})\">
                    <i class=\"fas fa-times\"></i>
                </button>
            `;
            selectedFiles.appendChild(fileItem);
        });
        
        fileList.style.display = filesToUpload.length > 0 ? 'block' : 'none';
        startUploadBtn.style.display = filesToUpload.length > 0 ? 'inline-block' : 'none';
    }
    
    window.removeFile = function(index) {
        filesToUpload.splice(index, 1);
        displaySelectedFiles();
    };
    
    function formatFileSize(size) {
        const units = ['B', 'KB', 'MB', 'GB'];
        let unitIndex = 0;
        while (size >= 1024 && unitIndex < units.length - 1) {
            size /= 1024;
            unitIndex++;
        }
        return Math.round(size * 100) / 100 + ' ' + units[unitIndex];
    }
    
    // Upload des fichiers
    startUploadBtn.addEventListener('click', function() {
        if (filesToUpload.length === 0) return;
        
        const formData = new FormData();
        filesToUpload.forEach(file => {
            formData.append('files[]', file);
        });
        
        // Afficher la progression
        dropzoneContent.style.display = 'none';
        uploadProgress.style.display = 'block';
        fileList.style.display = 'none';
        startUploadBtn.style.display = 'none';
        
        fetch('{{ path('admin_media_upload') }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            displayUploadResults(data);
        })
        .catch(error => {
            console.error('Erreur upload:', error);
            uploadResults.innerHTML = '<div class=\"alert alert-danger\">Erreur lors de l\\'upload</div>';
            uploadResults.style.display = 'block';
        })
        .finally(() => {
            uploadProgress.style.display = 'none';
        });
    });
    
    function displayUploadResults(data) {
        let html = '';
        
        if (data.uploaded_count > 0) {
            html += `<div class=\"alert alert-success\">
                <i class=\"fas fa-check-circle me-2\"></i>
                \${data.uploaded_count} fichier(s) uploadé(s) avec succès
            </div>`;
        }
        
        if (data.error_count > 0) {
            html += `<div class=\"alert alert-warning\">
                <i class=\"fas fa-exclamation-triangle me-2\"></i>
                \${data.error_count} erreur(s) d'upload :
                <ul class=\"mb-0 mt-2\">`;
            data.errors.forEach(error => {
                html += `<li>\${error}</li>`;
            });
            html += '</ul></div>';
        }
        
        uploadResults.innerHTML = html;
        uploadResults.style.display = 'block';
        
        // Recharger la page après quelques secondes si upload réussi
        if (data.uploaded_count > 0) {
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    }
    
    // Sélection multiple
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.media-checkbox');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
    const selectionCount = document.getElementById('selection-count');
    
    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateSelectionUI();
    });
    
    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateSelectionUI);
    });
    
    function updateSelectionUI() {
        const selectedCount = document.querySelectorAll('.media-checkbox:checked').length;
        selectionCount.textContent = `\${selectedCount} fichier(s) sélectionné(s)`;
        bulkDeleteBtn.style.display = selectedCount > 0 ? 'inline-block' : 'none';
    }
    
    // Suppression individuelle
    document.querySelectorAll('.delete-media-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const mediaId = this.dataset.mediaId;
            const mediaName = this.dataset.mediaName;
            
            if (confirm(`Supprimer définitivement \"\${mediaName}\" ?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/media/\${mediaId}/delete`;
                
                const token = document.createElement('input');
                token.type = 'hidden';
                token.name = '_token';
                token.value = '{{ csrf_token(\"delete_media_\") }}' + mediaId;
                
                form.appendChild(token);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
    
    // Modal de visualisation
    const mediaModal = document.getElementById('mediaModal');
    mediaModal.addEventListener('show.bs.modal', function(event) {
        const trigger = event.relatedTarget;
        const mediaId = trigger.dataset.mediaId;
        
        if (mediaId) {
            fetch(`/admin/media/\${mediaId}`)
                .then(response => response.text())
                .then(html => {
                    // Extraire le contenu du body de la réponse
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const content = doc.querySelector('main .container-fluid');
                    document.getElementById('mediaModalContent').innerHTML = content ? content.innerHTML : html;
                })
                .catch(error => {
                    document.getElementById('mediaModalContent').innerHTML = '<div class=\"alert alert-danger\">Erreur de chargement</div>';
                });
        }
    });
});
</script>
{% endblock %}", "admin/media/index.html.twig", "/workspace/symfpress/templates/admin/media/index.html.twig");
    }
}
