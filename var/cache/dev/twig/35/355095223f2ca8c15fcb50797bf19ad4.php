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

/* admin/media/show.html.twig */
class __TwigTemplate_96464ed9c104b0e8f4a3a2211018c833 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 3, $this->source); })()), "originalName", [], "any", false, false, false, 3), "html", null, true);
        yield " - Détail Média";
        
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
    <!-- Navigation -->
    <div class=\"mb-3\">
        <nav aria-label=\"breadcrumb\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index");
        yield "\">Bibliothèque média</a></li>
                <li class=\"breadcrumb-item active\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 12, $this->source); })()), "originalName", [], "any", false, false, false, 12), "html", null, true);
        yield "</li>
            </ol>
        </nav>
    </div>

    <!-- En-tête -->
    <div class=\"d-flex justify-content-between align-items-start mb-4\">
        <div>
            <h1 class=\"h3 mb-1\">";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 20, $this->source); })()), "originalName", [], "any", false, false, false, 20), "html", null, true);
        yield "</h1>
            <p class=\"text-muted mb-0\">
                📅 Uploadé le ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 22, $this->source); })()), "createdAt", [], "any", false, false, false, 22), "d/m/Y à H:i"), "html", null, true);
        yield " par ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 22, $this->source); })()), "uploadedBy", [], "any", false, false, false, 22), "displayName", [], "any", false, false, false, 22), "html", null, true);
        yield "
            </p>
        </div>
        
        <div class=\"btn-group\">
            <a href=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 27, $this->source); })()), "id", [], "any", false, false, false, 27)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-edit me-2\"></i>Modifier
            </a>
            <button type=\"button\" class=\"btn btn-outline-danger\" 
                    onclick=\"deleteMedia(";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 31, $this->source); })()), "id", [], "any", false, false, false, 31), "html", null, true);
        yield ", '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 31, $this->source); })()), "originalName", [], "any", false, false, false, 31), "js"), "html", null, true);
        yield "')\">
                <i class=\"fas fa-trash me-2\"></i>Supprimer
            </button>
            <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_index");
        yield "\" class=\"btn btn-outline-secondary\">
                ← Retour
            </a>
        </div>
    </div>

    <div class=\"row\">
        <!-- Aperçu du média -->
        <div class=\"col-lg-8\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">👁️ Aperçu</h5>
                </div>
                <div class=\"card-body text-center\">
                    ";
        // line 48
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 48, $this->source); })()), "isImage", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "                        <div class=\"mb-3\">
                            <img src=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 50, $this->source); })()), "url", [], "any", false, false, false, 50), "html", null, true);
            yield "\" 
                                 alt=\"";
            // line 51
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "alt", [], "any", true, true, false, 51) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 51, $this->source); })()), "alt", [], "any", false, false, false, 51)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 51, $this->source); })()), "alt", [], "any", false, false, false, 51), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 51, $this->source); })()), "originalName", [], "any", false, false, false, 51), "html", null, true)));
            yield "\" 
                                 class=\"img-fluid rounded shadow\"
                                 style=\"max-height: 500px; cursor: pointer;\"
                                 onclick=\"openFullscreen(this)\">
                        </div>
                        <p class=\"text-muted\">
                            <i class=\"fas fa-expand-arrows-alt\"></i> 
                            ";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 58, $this->source); })()), "width", [], "any", false, false, false, 58), "html", null, true);
            yield " x ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 58, $this->source); })()), "height", [], "any", false, false, false, 58), "html", null, true);
            yield " pixels
                        </p>
                    ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 60
(isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 60, $this->source); })()), "isPdf", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 61
            yield "                        <div class=\"mb-3\">
                            <iframe src=\"";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 62, $this->source); })()), "url", [], "any", false, false, false, 62), "html", null, true);
            yield "#toolbar=0\" 
                                    width=\"100%\" 
                                    height=\"600\" 
                                    class=\"border rounded\">
                                Votre navigateur ne supporte pas l'affichage PDF.
                            </iframe>
                        </div>
                    ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 69
(isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 69, $this->source); })()), "isVideo", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 70
            yield "                        <div class=\"mb-3\">
                            <video controls class=\"w-100 rounded\" style=\"max-height: 400px;\">
                                <source src=\"";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 72, $this->source); })()), "url", [], "any", false, false, false, 72), "html", null, true);
            yield "\" type=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 72, $this->source); })()), "mimeType", [], "any", false, false, false, 72), "html", null, true);
            yield "\">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                        </div>
                    ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 76
(isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 76, $this->source); })()), "isAudio", [], "any", false, false, false, 76)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 77
            yield "                        <div class=\"mb-3\">
                            <audio controls class=\"w-100\">
                                <source src=\"";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 79, $this->source); })()), "url", [], "any", false, false, false, 79), "html", null, true);
            yield "\" type=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 79, $this->source); })()), "mimeType", [], "any", false, false, false, 79), "html", null, true);
            yield "\">
                                Votre navigateur ne supporte pas la lecture audio.
                            </audio>
                        </div>
                    ";
        } else {
            // line 84
            yield "                        <div class=\"py-5\">
                            <i class=\"fas fa-file text-secondary mb-3\" style=\"font-size: 5rem;\"></i>
                            <h4 class=\"text-muted\">Aperçu non disponible</h4>
                            <p class=\"text-muted\">Ce type de fichier ne peut pas être affiché dans le navigateur.</p>
                            <a href=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 88, $this->source); })()), "url", [], "any", false, false, false, 88), "html", null, true);
            yield "\" target=\"_blank\" class=\"btn btn-primary\">
                                <i class=\"fas fa-download me-2\"></i>Télécharger le fichier
                            </a>
                        </div>
                    ";
        }
        // line 93
        yield "                </div>
            </div>
            
            <!-- URL et intégration -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">🔗 Intégration</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>URL du fichier</strong></label>
                        <div class=\"input-group\">
                            <input type=\"text\" class=\"form-control\" value=\"";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 105, $this->source); })()), "request", [], "any", false, false, false, 105), "schemeAndHttpHost", [], "any", false, false, false, 105), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 105, $this->source); })()), "url", [], "any", false, false, false, 105), "html", null, true);
        yield "\" readonly id=\"media-url\">
                            <button class=\"btn btn-outline-secondary\" onclick=\"copyToClipboard('media-url')\">
                                <i class=\"fas fa-copy\"></i>
                            </button>
                        </div>
                    </div>
                    
                    ";
        // line 112
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 112, $this->source); })()), "isImage", [], "any", false, false, false, 112)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 113
            yield "                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Code HTML (image)</strong></label>
                        <div class=\"input-group\">
                            <textarea class=\"form-control\" rows=\"2\" readonly id=\"html-code\"><img src=\"";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 116, $this->source); })()), "request", [], "any", false, false, false, 116), "schemeAndHttpHost", [], "any", false, false, false, 116), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 116, $this->source); })()), "url", [], "any", false, false, false, 116), "html", null, true);
            yield "\" alt=\"";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "alt", [], "any", true, true, false, 116) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 116, $this->source); })()), "alt", [], "any", false, false, false, 116)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 116, $this->source); })()), "alt", [], "any", false, false, false, 116), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 116, $this->source); })()), "originalName", [], "any", false, false, false, 116), "html", null, true)));
            yield "\" width=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 116, $this->source); })()), "width", [], "any", false, false, false, 116), "html", null, true);
            yield "\" height=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 116, $this->source); })()), "height", [], "any", false, false, false, 116), "html", null, true);
            yield "\"></textarea>
                            <button class=\"btn btn-outline-secondary\" onclick=\"copyToClipboard('html-code')\">
                                <i class=\"fas fa-copy\"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Code Markdown</strong></label>
                        <div class=\"input-group\">
                            <input type=\"text\" class=\"form-control\" value=\"![";
            // line 126
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "alt", [], "any", true, true, false, 126) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 126, $this->source); })()), "alt", [], "any", false, false, false, 126)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 126, $this->source); })()), "alt", [], "any", false, false, false, 126), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 126, $this->source); })()), "originalName", [], "any", false, false, false, 126), "html", null, true)));
            yield "](";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 126, $this->source); })()), "request", [], "any", false, false, false, 126), "schemeAndHttpHost", [], "any", false, false, false, 126), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 126, $this->source); })()), "url", [], "any", false, false, false, 126), "html", null, true);
            yield ")\" readonly id=\"markdown-code\">
                            <button class=\"btn btn-outline-secondary\" onclick=\"copyToClipboard('markdown-code')\">
                                <i class=\"fas fa-copy\"></i>
                            </button>
                        </div>
                    </div>
                    ";
        }
        // line 133
        yield "                </div>
            </div>
        </div>
        
        <!-- Informations et métadonnées -->
        <div class=\"col-lg-4\">
            <!-- Informations techniques -->
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">📈 Informations techniques</h5>
                </div>
                <div class=\"card-body\">
                    <dl class=\"row\">
                        <dt class=\"col-sm-5\">Nom du fichier :</dt>
                        <dd class=\"col-sm-7\"><code>";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 147, $this->source); })()), "filename", [], "any", false, false, false, 147), "html", null, true);
        yield "</code></dd>
                        
                        <dt class=\"col-sm-5\">Type MIME :</dt>
                        <dd class=\"col-sm-7\"><span class=\"badge bg-info\">";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 150, $this->source); })()), "mimeType", [], "any", false, false, false, 150), "html", null, true);
        yield "</span></dd>
                        
                        <dt class=\"col-sm-5\">Taille :</dt>
                        <dd class=\"col-sm-7\">";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 153, $this->source); })()), "formattedFileSize", [], "any", false, false, false, 153), "html", null, true);
        yield "</dd>
                        
                        ";
        // line 155
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 155, $this->source); })()), "width", [], "any", false, false, false, 155) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 155, $this->source); })()), "height", [], "any", false, false, false, 155))) {
            // line 156
            yield "                        <dt class=\"col-sm-5\">Dimensions :</dt>
                        <dd class=\"col-sm-7\">";
            // line 157
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 157, $this->source); })()), "width", [], "any", false, false, false, 157), "html", null, true);
            yield " x ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 157, $this->source); })()), "height", [], "any", false, false, false, 157), "html", null, true);
            yield " px</dd>
                        ";
        }
        // line 159
        yield "                        
                        <dt class=\"col-sm-5\">Extension :</dt>
                        <dd class=\"col-sm-7\"><span class=\"badge bg-secondary\">";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 161, $this->source); })()), "extension", [], "any", false, false, false, 161)), "html", null, true);
        yield "</span></dd>
                        
                        <dt class=\"col-sm-5\">Chemin :</dt>
                        <dd class=\"col-sm-7\"><small class=\"text-muted\">";
        // line 164
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 164, $this->source); })()), "path", [], "any", false, false, false, 164), "html", null, true);
        yield "</small></dd>
                        
                        ";
        // line 166
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 166, $this->source); })()), "updatedAt", [], "any", false, false, false, 166)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 167
            yield "                        <dt class=\"col-sm-5\">Modifié :</dt>
                        <dd class=\"col-sm-7\">";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 168, $this->source); })()), "updatedAt", [], "any", false, false, false, 168), "d/m/Y H:i"), "html", null, true);
            yield "</dd>
                        ";
        }
        // line 170
        yield "                    </dl>
                </div>
            </div>
            
            <!-- Métadonnées -->
            <div class=\"card mt-3\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">🏷️ Métadonnées</h5>
                    <a href=\"";
        // line 178
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 178, $this->source); })()), "id", [], "any", false, false, false, 178)]), "html", null, true);
        yield "\" class=\"btn btn-sm btn-outline-primary\">
                        <i class=\"fas fa-edit\"></i> Modifier
                    </a>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Texte alternatif</strong></label>
                        ";
        // line 185
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 185, $this->source); })()), "alt", [], "any", false, false, false, 185)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 186
            yield "                            <p class=\"form-control-plaintext\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 186, $this->source); })()), "alt", [], "any", false, false, false, 186), "html", null, true);
            yield "</p>
                        ";
        } else {
            // line 188
            yield "                            <p class=\"text-muted fst-italic\">Aucun texte alternatif défini</p>
                        ";
        }
        // line 190
        yield "                    </div>
                    
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Légende</strong></label>
                        ";
        // line 194
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 194, $this->source); })()), "caption", [], "any", false, false, false, 194)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 195
            yield "                            <p class=\"form-control-plaintext\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 195, $this->source); })()), "caption", [], "any", false, false, false, 195), "html", null, true);
            yield "</p>
                        ";
        } else {
            // line 197
            yield "                            <p class=\"text-muted fst-italic\">Aucune légende définie</p>
                        ";
        }
        // line 199
        yield "                    </div>
                    
                    <div class=\"mb-0\">
                        <label class=\"form-label\"><strong>Description</strong></label>
                        ";
        // line 203
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 203, $this->source); })()), "description", [], "any", false, false, false, 203)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 204
            yield "                            <p class=\"form-control-plaintext\">";
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 204, $this->source); })()), "description", [], "any", false, false, false, 204), "html", null, true));
            yield "</p>
                        ";
        } else {
            // line 206
            yield "                            <p class=\"text-muted fst-italic\">Aucune description définie</p>
                        ";
        }
        // line 208
        yield "                    </div>
                </div>
            </div>
            
            <!-- Miniatures (pour images) -->
            ";
        // line 213
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 213, $this->source); })()), "isImage", [], "any", false, false, false, 213)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 214
            yield "            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">🖼️ Miniatures</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"row g-2\">
                        <div class=\"col-6\">
                            <p class=\"small mb-1\"><strong>150x150</strong></p>
                            <img src=\"";
            // line 222
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_thumbnail", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 222, $this->source); })()), "id", [], "any", false, false, false, 222), "w" => 150, "h" => 150]), "html", null, true);
            yield "\" 
                                 class=\"img-fluid rounded border\" 
                                 alt=\"Miniature 150x150\">
                        </div>
                        <div class=\"col-6\">
                            <p class=\"small mb-1\"><strong>300x300</strong></p>
                            <img src=\"";
            // line 228
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_thumbnail", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 228, $this->source); })()), "id", [], "any", false, false, false, 228), "w" => 300, "h" => 300]), "html", null, true);
            yield "\" 
                                 class=\"img-fluid rounded border\" 
                                 alt=\"Miniature 300x300\">
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        // line 236
        yield "        </div>
    </div>
</div>

<!-- Modal plein écran pour images -->
<div class=\"modal fade\" id=\"fullscreenModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-fullscreen\">
        <div class=\"modal-content bg-dark\">
            <div class=\"modal-header border-0\">
                <h5 class=\"modal-title text-white\">";
        // line 245
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 245, $this->source); })()), "originalName", [], "any", false, false, false, 245), "html", null, true);
        yield "</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body d-flex align-items-center justify-content-center p-0\">
                <img src=\"";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 249, $this->source); })()), "url", [], "any", false, false, false, 249), "html", null, true);
        yield "\" class=\"img-fluid\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "alt", [], "any", true, true, false, 249) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 249, $this->source); })()), "alt", [], "any", false, false, false, 249)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 249, $this->source); })()), "alt", [], "any", false, false, false, 249), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 249, $this->source); })()), "originalName", [], "any", false, false, false, 249), "html", null, true)));
        yield "\">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function copyToClipboard(elementId) {
    const element = document.getElementById(elementId);
    element.select();
    element.setSelectionRange(0, 99999);
    document.execCommand('copy');
    
    // Feedback visuel
    const btn = element.nextElementSibling;
    const originalHtml = btn.innerHTML;
    btn.innerHTML = '<i class=\"fas fa-check text-success\"></i>';
    setTimeout(() => {
        btn.innerHTML = originalHtml;
    }, 1000);
}

function openFullscreen(img) {
    ";
        // line 273
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 273, $this->source); })()), "isImage", [], "any", false, false, false, 273)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 274
            yield "    const modal = new bootstrap.Modal(document.getElementById('fullscreenModal'));
    modal.show();
    ";
        }
        // line 277
        yield "}

function deleteMedia(mediaId, mediaName) {
    if (confirm(`Supprimer définitivement \"\${mediaName}\" ?\\n\\nCette action est irréversible.`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/media/\${mediaId}/delete`;
        
        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = '";
        // line 288
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_media_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 288, $this->source); })()), "id", [], "any", false, false, false, 288))), "html", null, true);
        yield "';
        
        form.appendChild(token);
        document.body.appendChild(form);
        form.submit();
    }
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
        return "admin/media/show.html.twig";
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
        return array (  565 => 288,  552 => 277,  547 => 274,  545 => 273,  516 => 249,  509 => 245,  498 => 236,  487 => 228,  478 => 222,  468 => 214,  466 => 213,  459 => 208,  455 => 206,  449 => 204,  447 => 203,  441 => 199,  437 => 197,  431 => 195,  429 => 194,  423 => 190,  419 => 188,  413 => 186,  411 => 185,  401 => 178,  391 => 170,  386 => 168,  383 => 167,  381 => 166,  376 => 164,  370 => 161,  366 => 159,  359 => 157,  356 => 156,  354 => 155,  349 => 153,  343 => 150,  337 => 147,  321 => 133,  308 => 126,  288 => 116,  283 => 113,  281 => 112,  270 => 105,  256 => 93,  248 => 88,  242 => 84,  232 => 79,  228 => 77,  226 => 76,  217 => 72,  213 => 70,  211 => 69,  201 => 62,  198 => 61,  196 => 60,  189 => 58,  179 => 51,  175 => 50,  172 => 49,  170 => 48,  153 => 34,  145 => 31,  138 => 27,  128 => 22,  123 => 20,  112 => 12,  108 => 11,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}{{ media.originalName }} - Détail Média{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <!-- Navigation -->
    <div class=\"mb-3\">
        <nav aria-label=\"breadcrumb\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_media_index') }}\">Bibliothèque média</a></li>
                <li class=\"breadcrumb-item active\">{{ media.originalName }}</li>
            </ol>
        </nav>
    </div>

    <!-- En-tête -->
    <div class=\"d-flex justify-content-between align-items-start mb-4\">
        <div>
            <h1 class=\"h3 mb-1\">{{ media.originalName }}</h1>
            <p class=\"text-muted mb-0\">
                📅 Uploadé le {{ media.createdAt|date('d/m/Y à H:i') }} par {{ media.uploadedBy.displayName }}
            </p>
        </div>
        
        <div class=\"btn-group\">
            <a href=\"{{ path('admin_media_edit', {id: media.id}) }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-edit me-2\"></i>Modifier
            </a>
            <button type=\"button\" class=\"btn btn-outline-danger\" 
                    onclick=\"deleteMedia({{ media.id }}, '{{ media.originalName|e('js') }}')\">
                <i class=\"fas fa-trash me-2\"></i>Supprimer
            </button>
            <a href=\"{{ path('admin_media_index') }}\" class=\"btn btn-outline-secondary\">
                ← Retour
            </a>
        </div>
    </div>

    <div class=\"row\">
        <!-- Aperçu du média -->
        <div class=\"col-lg-8\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">👁️ Aperçu</h5>
                </div>
                <div class=\"card-body text-center\">
                    {% if media.isImage %}
                        <div class=\"mb-3\">
                            <img src=\"{{ media.url }}\" 
                                 alt=\"{{ media.alt ?? media.originalName }}\" 
                                 class=\"img-fluid rounded shadow\"
                                 style=\"max-height: 500px; cursor: pointer;\"
                                 onclick=\"openFullscreen(this)\">
                        </div>
                        <p class=\"text-muted\">
                            <i class=\"fas fa-expand-arrows-alt\"></i> 
                            {{ media.width }} x {{ media.height }} pixels
                        </p>
                    {% elseif media.isPdf %}
                        <div class=\"mb-3\">
                            <iframe src=\"{{ media.url }}#toolbar=0\" 
                                    width=\"100%\" 
                                    height=\"600\" 
                                    class=\"border rounded\">
                                Votre navigateur ne supporte pas l'affichage PDF.
                            </iframe>
                        </div>
                    {% elseif media.isVideo %}
                        <div class=\"mb-3\">
                            <video controls class=\"w-100 rounded\" style=\"max-height: 400px;\">
                                <source src=\"{{ media.url }}\" type=\"{{ media.mimeType }}\">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                        </div>
                    {% elseif media.isAudio %}
                        <div class=\"mb-3\">
                            <audio controls class=\"w-100\">
                                <source src=\"{{ media.url }}\" type=\"{{ media.mimeType }}\">
                                Votre navigateur ne supporte pas la lecture audio.
                            </audio>
                        </div>
                    {% else %}
                        <div class=\"py-5\">
                            <i class=\"fas fa-file text-secondary mb-3\" style=\"font-size: 5rem;\"></i>
                            <h4 class=\"text-muted\">Aperçu non disponible</h4>
                            <p class=\"text-muted\">Ce type de fichier ne peut pas être affiché dans le navigateur.</p>
                            <a href=\"{{ media.url }}\" target=\"_blank\" class=\"btn btn-primary\">
                                <i class=\"fas fa-download me-2\"></i>Télécharger le fichier
                            </a>
                        </div>
                    {% endif %}
                </div>
            </div>
            
            <!-- URL et intégration -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">🔗 Intégration</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>URL du fichier</strong></label>
                        <div class=\"input-group\">
                            <input type=\"text\" class=\"form-control\" value=\"{{ app.request.schemeAndHttpHost }}{{ media.url }}\" readonly id=\"media-url\">
                            <button class=\"btn btn-outline-secondary\" onclick=\"copyToClipboard('media-url')\">
                                <i class=\"fas fa-copy\"></i>
                            </button>
                        </div>
                    </div>
                    
                    {% if media.isImage %}
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Code HTML (image)</strong></label>
                        <div class=\"input-group\">
                            <textarea class=\"form-control\" rows=\"2\" readonly id=\"html-code\"><img src=\"{{ app.request.schemeAndHttpHost }}{{ media.url }}\" alt=\"{{ media.alt ?? media.originalName }}\" width=\"{{ media.width }}\" height=\"{{ media.height }}\"></textarea>
                            <button class=\"btn btn-outline-secondary\" onclick=\"copyToClipboard('html-code')\">
                                <i class=\"fas fa-copy\"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Code Markdown</strong></label>
                        <div class=\"input-group\">
                            <input type=\"text\" class=\"form-control\" value=\"![{{ media.alt ?? media.originalName }}]({{ app.request.schemeAndHttpHost }}{{ media.url }})\" readonly id=\"markdown-code\">
                            <button class=\"btn btn-outline-secondary\" onclick=\"copyToClipboard('markdown-code')\">
                                <i class=\"fas fa-copy\"></i>
                            </button>
                        </div>
                    </div>
                    {% endif %}
                </div>
            </div>
        </div>
        
        <!-- Informations et métadonnées -->
        <div class=\"col-lg-4\">
            <!-- Informations techniques -->
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">📈 Informations techniques</h5>
                </div>
                <div class=\"card-body\">
                    <dl class=\"row\">
                        <dt class=\"col-sm-5\">Nom du fichier :</dt>
                        <dd class=\"col-sm-7\"><code>{{ media.filename }}</code></dd>
                        
                        <dt class=\"col-sm-5\">Type MIME :</dt>
                        <dd class=\"col-sm-7\"><span class=\"badge bg-info\">{{ media.mimeType }}</span></dd>
                        
                        <dt class=\"col-sm-5\">Taille :</dt>
                        <dd class=\"col-sm-7\">{{ media.formattedFileSize }}</dd>
                        
                        {% if media.width and media.height %}
                        <dt class=\"col-sm-5\">Dimensions :</dt>
                        <dd class=\"col-sm-7\">{{ media.width }} x {{ media.height }} px</dd>
                        {% endif %}
                        
                        <dt class=\"col-sm-5\">Extension :</dt>
                        <dd class=\"col-sm-7\"><span class=\"badge bg-secondary\">{{ media.extension|upper }}</span></dd>
                        
                        <dt class=\"col-sm-5\">Chemin :</dt>
                        <dd class=\"col-sm-7\"><small class=\"text-muted\">{{ media.path }}</small></dd>
                        
                        {% if media.updatedAt %}
                        <dt class=\"col-sm-5\">Modifié :</dt>
                        <dd class=\"col-sm-7\">{{ media.updatedAt|date('d/m/Y H:i') }}</dd>
                        {% endif %}
                    </dl>
                </div>
            </div>
            
            <!-- Métadonnées -->
            <div class=\"card mt-3\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">🏷️ Métadonnées</h5>
                    <a href=\"{{ path('admin_media_edit', {id: media.id}) }}\" class=\"btn btn-sm btn-outline-primary\">
                        <i class=\"fas fa-edit\"></i> Modifier
                    </a>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Texte alternatif</strong></label>
                        {% if media.alt %}
                            <p class=\"form-control-plaintext\">{{ media.alt }}</p>
                        {% else %}
                            <p class=\"text-muted fst-italic\">Aucun texte alternatif défini</p>
                        {% endif %}
                    </div>
                    
                    <div class=\"mb-3\">
                        <label class=\"form-label\"><strong>Légende</strong></label>
                        {% if media.caption %}
                            <p class=\"form-control-plaintext\">{{ media.caption }}</p>
                        {% else %}
                            <p class=\"text-muted fst-italic\">Aucune légende définie</p>
                        {% endif %}
                    </div>
                    
                    <div class=\"mb-0\">
                        <label class=\"form-label\"><strong>Description</strong></label>
                        {% if media.description %}
                            <p class=\"form-control-plaintext\">{{ media.description|nl2br }}</p>
                        {% else %}
                            <p class=\"text-muted fst-italic\">Aucune description définie</p>
                        {% endif %}
                    </div>
                </div>
            </div>
            
            <!-- Miniatures (pour images) -->
            {% if media.isImage %}
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">🖼️ Miniatures</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"row g-2\">
                        <div class=\"col-6\">
                            <p class=\"small mb-1\"><strong>150x150</strong></p>
                            <img src=\"{{ path('admin_media_thumbnail', {id: media.id, w: 150, h: 150}) }}\" 
                                 class=\"img-fluid rounded border\" 
                                 alt=\"Miniature 150x150\">
                        </div>
                        <div class=\"col-6\">
                            <p class=\"small mb-1\"><strong>300x300</strong></p>
                            <img src=\"{{ path('admin_media_thumbnail', {id: media.id, w: 300, h: 300}) }}\" 
                                 class=\"img-fluid rounded border\" 
                                 alt=\"Miniature 300x300\">
                        </div>
                    </div>
                </div>
            </div>
            {% endif %}
        </div>
    </div>
</div>

<!-- Modal plein écran pour images -->
<div class=\"modal fade\" id=\"fullscreenModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-fullscreen\">
        <div class=\"modal-content bg-dark\">
            <div class=\"modal-header border-0\">
                <h5 class=\"modal-title text-white\">{{ media.originalName }}</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body d-flex align-items-center justify-content-center p-0\">
                <img src=\"{{ media.url }}\" class=\"img-fluid\" alt=\"{{ media.alt ?? media.originalName }}\">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function copyToClipboard(elementId) {
    const element = document.getElementById(elementId);
    element.select();
    element.setSelectionRange(0, 99999);
    document.execCommand('copy');
    
    // Feedback visuel
    const btn = element.nextElementSibling;
    const originalHtml = btn.innerHTML;
    btn.innerHTML = '<i class=\"fas fa-check text-success\"></i>';
    setTimeout(() => {
        btn.innerHTML = originalHtml;
    }, 1000);
}

function openFullscreen(img) {
    {% if media.isImage %}
    const modal = new bootstrap.Modal(document.getElementById('fullscreenModal'));
    modal.show();
    {% endif %}
}

function deleteMedia(mediaId, mediaName) {
    if (confirm(`Supprimer définitivement \"\${mediaName}\" ?\\n\\nCette action est irréversible.`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/media/\${mediaId}/delete`;
        
        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = '{{ csrf_token(\"delete_media_\" ~ media.id) }}';
        
        form.appendChild(token);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
{% endblock %}", "admin/media/show.html.twig", "/workspace/symfpress/templates/admin/media/show.html.twig");
    }
}
