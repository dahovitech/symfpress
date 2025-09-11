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

/* admin/media/edit.html.twig */
class __TwigTemplate_a25779ea72944a245b8e678bfd21a344 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/edit.html.twig"));

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

        yield "Modifier ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 3, $this->source); })()), "originalName", [], "any", false, false, false, 3), "html", null, true);
        yield " - Média";
        
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
                <li class=\"breadcrumb-item\"><a href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 12, $this->source); })()), "originalName", [], "any", false, false, false, 12), "html", null, true);
        yield "</a></li>
                <li class=\"breadcrumb-item active\">Édition</li>
            </ol>
        </nav>
    </div>

    <!-- En-tête -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">✍️ Modifier \"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 20, $this->source); })()), "originalName", [], "any", false, false, false, 20), "html", null, true);
        yield "\"</h1>
        <div class=\"btn-group\">
            <a href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
                ← Retour
            </a>
        </div>
    </div>

    <div class=\"row\">
        <!-- Formulaire d'édition -->
        <div class=\"col-lg-8\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">🏷️ Métadonnées du fichier</h5>
                </div>
                <div class=\"card-body\">
                    <form method=\"POST\">
                        <div class=\"mb-4\">
                            <label for=\"alt\" class=\"form-label\">
                                <strong>Texte alternatif</strong>
                                ";
        // line 40
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 40, $this->source); })()), "isImage", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span class=\"text-danger\">*</span>";
        }
        // line 41
        yield "                            </label>
                            <input type=\"text\" 
                                   class=\"form-control\" 
                                   id=\"alt\" 
                                   name=\"alt\" 
                                   value=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 46, $this->source); })()), "alt", [], "any", false, false, false, 46), "html", null, true);
        yield "\" 
                                   placeholder=\"Description courte pour l'accessibilité\"
                                   ";
        // line 48
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 48, $this->source); })()), "isImage", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "required";
        }
        yield ">
                            <div class=\"form-text\">
                                ";
        // line 50
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 50, $this->source); })()), "isImage", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 51
            yield "                                    <i class=\"fas fa-info-circle text-primary\"></i>
                                    <strong>Obligatoire pour les images</strong> : Décrivez brièvement ce que représente l'image pour les lecteurs d'écran.
                                ";
        } else {
            // line 54
            yield "                                    Texte descriptif pour l'accessibilité (optionnel pour les documents).
                                ";
        }
        // line 56
        yield "                            </div>
                        </div>
                        
                        <div class=\"mb-4\">
                            <label for=\"caption\" class=\"form-label\"><strong>Légende</strong></label>
                            <input type=\"text\" 
                                   class=\"form-control\" 
                                   id=\"caption\" 
                                   name=\"caption\" 
                                   value=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 65, $this->source); })()), "caption", [], "any", false, false, false, 65), "html", null, true);
        yield "\" 
                                   placeholder=\"Légende affichée sous le média\">
                            <div class=\"form-text\">
                                <i class=\"fas fa-info-circle text-info\"></i>
                                Légende qui sera affichée publiquement sous le média (optionnel).
                            </div>
                        </div>
                        
                        <div class=\"mb-4\">
                            <label for=\"description\" class=\"form-label\"><strong>Description</strong></label>
                            <textarea class=\"form-control\" 
                                      id=\"description\" 
                                      name=\"description\" 
                                      rows=\"4\" 
                                      placeholder=\"Description détaillée du contenu du fichier\">";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 79, $this->source); })()), "description", [], "any", false, false, false, 79), "html", null, true);
        yield "</textarea>
                            <div class=\"form-text\">
                                <i class=\"fas fa-info-circle text-secondary\"></i>
                                Description complète pour usage interne et référencement.
                            </div>
                        </div>
                        
                        <div class=\"d-flex gap-2\">
                            <button type=\"submit\" class=\"btn btn-success\">
                                <i class=\"fas fa-save me-2\"></i>Enregistrer les modifications
                            </button>
                            <a href=\"";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 90, $this->source); })()), "id", [], "any", false, false, false, 90)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Guide des bonnes pratiques -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">💡 Guide des bonnes pratiques</h5>
                </div>
                <div class=\"card-body\">
                    ";
        // line 104
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 104, $this->source); })()), "isImage", [], "any", false, false, false, 104)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 105
            yield "                    <h6 class=\"text-primary\">Pour les images :</h6>
                    <ul class=\"mb-3\">
                        <li><strong>Texte alternatif</strong> : Décrivez l'image en une phrase courte (ex: \"Chat noir assis sur un canapé rouge\")</li>
                        <li><strong>Légende</strong> : Ajoutez un contexte si nécessaire (ex: \"Photo prise lors de l'événement XYZ\")</li>
                        <li><strong>Mots-clés SEO</strong> : Incluez des termes pertinents dans la description</li>
                    </ul>
                    ";
        } else {
            // line 112
            yield "                    <h6 class=\"text-info\">Pour les documents :</h6>
                    <ul class=\"mb-3\">
                        <li><strong>Description</strong> : Indiquez le contenu et l'usage du document</li>
                        <li><strong>Mots-clés</strong> : Facilitez la recherche en ajoutant des termes pertinents</li>
                        <li><strong>Version</strong> : Mentionnez la version ou la date si applicable</li>
                    </ul>
                    ";
        }
        // line 119
        yield "                    
                    <div class=\"alert alert-info mb-0\">
                        <i class=\"fas fa-lightbulb me-2\"></i>
                        <strong>Astuce :</strong> Des métadonnées bien renseignées améliorent l'accessibilité, le référencement et facilitent la gestion de votre bibliothèque média.
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Aperçu et informations -->
        <div class=\"col-lg-4\">
            <!-- Aperçu -->
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">👁️ Aperçu</h5>
                </div>
                <div class=\"card-body text-center\">
                    ";
        // line 136
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 136, $this->source); })()), "isImage", [], "any", false, false, false, 136)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 137
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 137, $this->source); })()), "url", [], "any", false, false, false, 137), "html", null, true);
            yield "\" 
                             class=\"img-fluid rounded\" 
                             alt=\"";
            // line 139
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "alt", [], "any", true, true, false, 139) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 139, $this->source); })()), "alt", [], "any", false, false, false, 139)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 139, $this->source); })()), "alt", [], "any", false, false, false, 139), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 139, $this->source); })()), "originalName", [], "any", false, false, false, 139), "html", null, true)));
            yield "\"
                             style=\"max-height: 200px;\">
                    ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 141
(isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 141, $this->source); })()), "isPdf", [], "any", false, false, false, 141)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 142
            yield "                        <i class=\"fas fa-file-pdf text-danger mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Document PDF</p>
                    ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 144
(isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 144, $this->source); })()), "isVideo", [], "any", false, false, false, 144)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 145
            yield "                        <i class=\"fas fa-file-video text-primary mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Fichier vidéo</p>
                    ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 147
(isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 147, $this->source); })()), "isAudio", [], "any", false, false, false, 147)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 148
            yield "                        <i class=\"fas fa-file-audio text-success mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Fichier audio</p>
                    ";
        } else {
            // line 151
            yield "                        <i class=\"fas fa-file text-secondary mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Document</p>
                    ";
        }
        // line 154
        yield "                </div>
            </div>
            
            <!-- Informations techniques -->
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">📈 Informations</h5>
                </div>
                <div class=\"card-body\">
                    <dl class=\"row small\">
                        <dt class=\"col-6\">Nom original :</dt>
                        <dd class=\"col-6\">";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 165, $this->source); })()), "originalName", [], "any", false, false, false, 165), "html", null, true);
        yield "</dd>
                        
                        <dt class=\"col-6\">Type :</dt>
                        <dd class=\"col-6\"><span class=\"badge bg-info\">";
        // line 168
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 168, $this->source); })()), "mimeType", [], "any", false, false, false, 168), "html", null, true);
        yield "</span></dd>
                        
                        <dt class=\"col-6\">Taille :</dt>
                        <dd class=\"col-6\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 171, $this->source); })()), "formattedFileSize", [], "any", false, false, false, 171), "html", null, true);
        yield "</dd>
                        
                        ";
        // line 173
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 173, $this->source); })()), "width", [], "any", false, false, false, 173) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 173, $this->source); })()), "height", [], "any", false, false, false, 173))) {
            // line 174
            yield "                        <dt class=\"col-6\">Dimensions :</dt>
                        <dd class=\"col-6\">";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 175, $this->source); })()), "width", [], "any", false, false, false, 175), "html", null, true);
            yield " x ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 175, $this->source); })()), "height", [], "any", false, false, false, 175), "html", null, true);
            yield "</dd>
                        ";
        }
        // line 177
        yield "                        
                        <dt class=\"col-6\">Uploadé :</dt>
                        <dd class=\"col-6\">";
        // line 179
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 179, $this->source); })()), "createdAt", [], "any", false, false, false, 179), "d/m/Y"), "html", null, true);
        yield "</dd>
                        
                        <dt class=\"col-6\">Par :</dt>
                        <dd class=\"col-6\">";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 182, $this->source); })()), "uploadedBy", [], "any", false, false, false, 182), "displayName", [], "any", false, false, false, 182), "html", null, true);
        yield "</dd>
                    </dl>
                </div>
            </div>
            
            <!-- Actions rapides -->
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">⚡ Actions</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"d-grid gap-2\">
                        <a href=\"";
        // line 194
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 194, $this->source); })()), "url", [], "any", false, false, false, 194), "html", null, true);
        yield "\" target=\"_blank\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-external-link-alt me-2\"></i>Ouvrir le fichier
                        </a>
                        <a href=\"";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 197, $this->source); })()), "url", [], "any", false, false, false, 197), "html", null, true);
        yield "\" download class=\"btn btn-outline-secondary btn-sm\">
                            <i class=\"fas fa-download me-2\"></i>Télécharger
                        </a>
                        <button type=\"button\" class=\"btn btn-outline-danger btn-sm\" 
                                onclick=\"deleteMedia(";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 201, $this->source); })()), "id", [], "any", false, false, false, 201), "html", null, true);
        yield ", '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 201, $this->source); })()), "originalName", [], "any", false, false, false, 201), "js"), "html", null, true);
        yield "')\">
                            <i class=\"fas fa-trash me-2\"></i>Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function deleteMedia(mediaId, mediaName) {
    if (confirm(`Supprimer définitivement \"\${mediaName}\" ?\\n\\nCette action est irréversible.`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/media/\${mediaId}/delete`;
        
        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = '";
        // line 222
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_media_" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 222, $this->source); })()), "id", [], "any", false, false, false, 222))), "html", null, true);
        yield "';
        
        form.appendChild(token);
        document.body.appendChild(form);
        form.submit();
    }
}

// Auto-génération du texte alt à partir du nom de fichier si vide
document.addEventListener('DOMContentLoaded', function() {
    const altInput = document.getElementById('alt');
    
    if (!altInput.value.trim()) {
        // Suggerer un texte alt basé sur le nom du fichier
        const originalName = '";
        // line 236
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["media"]) || array_key_exists("media", $context) ? $context["media"] : (function () { throw new RuntimeError('Variable "media" does not exist.', 236, $this->source); })()), "originalName", [], "any", false, false, false, 236), "html", null, true);
        yield "';
        const suggestion = originalName
            .replace(/\\.[^/.]+\$/, '') // Enlever l'extension
            .replace(/[_-]/g, ' ') // Remplacer underscores et tirets par espaces
            .replace(/([a-z])([A-Z])/g, '\$1 \$2') // Séparer camelCase
            .toLowerCase()
            .replace(/\\b\\w/g, l => l.toUpperCase()); // Capitaliser
        
        altInput.placeholder = `Suggestion : \"\${suggestion}\"`;
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
        return "admin/media/edit.html.twig";
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
        return array (  444 => 236,  427 => 222,  401 => 201,  394 => 197,  388 => 194,  373 => 182,  367 => 179,  363 => 177,  356 => 175,  353 => 174,  351 => 173,  346 => 171,  340 => 168,  334 => 165,  321 => 154,  316 => 151,  311 => 148,  309 => 147,  305 => 145,  303 => 144,  299 => 142,  297 => 141,  292 => 139,  286 => 137,  284 => 136,  265 => 119,  256 => 112,  247 => 105,  245 => 104,  228 => 90,  214 => 79,  197 => 65,  186 => 56,  182 => 54,  177 => 51,  175 => 50,  168 => 48,  163 => 46,  156 => 41,  152 => 40,  131 => 22,  126 => 20,  113 => 12,  109 => 11,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Modifier {{ media.originalName }} - Média{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <!-- Navigation -->
    <div class=\"mb-3\">
        <nav aria-label=\"breadcrumb\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_media_index') }}\">Bibliothèque média</a></li>
                <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_media_show', {id: media.id}) }}\">{{ media.originalName }}</a></li>
                <li class=\"breadcrumb-item active\">Édition</li>
            </ol>
        </nav>
    </div>

    <!-- En-tête -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">✍️ Modifier \"{{ media.originalName }}\"</h1>
        <div class=\"btn-group\">
            <a href=\"{{ path('admin_media_show', {id: media.id}) }}\" class=\"btn btn-outline-secondary\">
                ← Retour
            </a>
        </div>
    </div>

    <div class=\"row\">
        <!-- Formulaire d'édition -->
        <div class=\"col-lg-8\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">🏷️ Métadonnées du fichier</h5>
                </div>
                <div class=\"card-body\">
                    <form method=\"POST\">
                        <div class=\"mb-4\">
                            <label for=\"alt\" class=\"form-label\">
                                <strong>Texte alternatif</strong>
                                {% if media.isImage %}<span class=\"text-danger\">*</span>{% endif %}
                            </label>
                            <input type=\"text\" 
                                   class=\"form-control\" 
                                   id=\"alt\" 
                                   name=\"alt\" 
                                   value=\"{{ media.alt }}\" 
                                   placeholder=\"Description courte pour l'accessibilité\"
                                   {% if media.isImage %}required{% endif %}>
                            <div class=\"form-text\">
                                {% if media.isImage %}
                                    <i class=\"fas fa-info-circle text-primary\"></i>
                                    <strong>Obligatoire pour les images</strong> : Décrivez brièvement ce que représente l'image pour les lecteurs d'écran.
                                {% else %}
                                    Texte descriptif pour l'accessibilité (optionnel pour les documents).
                                {% endif %}
                            </div>
                        </div>
                        
                        <div class=\"mb-4\">
                            <label for=\"caption\" class=\"form-label\"><strong>Légende</strong></label>
                            <input type=\"text\" 
                                   class=\"form-control\" 
                                   id=\"caption\" 
                                   name=\"caption\" 
                                   value=\"{{ media.caption }}\" 
                                   placeholder=\"Légende affichée sous le média\">
                            <div class=\"form-text\">
                                <i class=\"fas fa-info-circle text-info\"></i>
                                Légende qui sera affichée publiquement sous le média (optionnel).
                            </div>
                        </div>
                        
                        <div class=\"mb-4\">
                            <label for=\"description\" class=\"form-label\"><strong>Description</strong></label>
                            <textarea class=\"form-control\" 
                                      id=\"description\" 
                                      name=\"description\" 
                                      rows=\"4\" 
                                      placeholder=\"Description détaillée du contenu du fichier\">{{ media.description }}</textarea>
                            <div class=\"form-text\">
                                <i class=\"fas fa-info-circle text-secondary\"></i>
                                Description complète pour usage interne et référencement.
                            </div>
                        </div>
                        
                        <div class=\"d-flex gap-2\">
                            <button type=\"submit\" class=\"btn btn-success\">
                                <i class=\"fas fa-save me-2\"></i>Enregistrer les modifications
                            </button>
                            <a href=\"{{ path('admin_media_show', {id: media.id}) }}\" class=\"btn btn-outline-secondary\">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Guide des bonnes pratiques -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">💡 Guide des bonnes pratiques</h5>
                </div>
                <div class=\"card-body\">
                    {% if media.isImage %}
                    <h6 class=\"text-primary\">Pour les images :</h6>
                    <ul class=\"mb-3\">
                        <li><strong>Texte alternatif</strong> : Décrivez l'image en une phrase courte (ex: \"Chat noir assis sur un canapé rouge\")</li>
                        <li><strong>Légende</strong> : Ajoutez un contexte si nécessaire (ex: \"Photo prise lors de l'événement XYZ\")</li>
                        <li><strong>Mots-clés SEO</strong> : Incluez des termes pertinents dans la description</li>
                    </ul>
                    {% else %}
                    <h6 class=\"text-info\">Pour les documents :</h6>
                    <ul class=\"mb-3\">
                        <li><strong>Description</strong> : Indiquez le contenu et l'usage du document</li>
                        <li><strong>Mots-clés</strong> : Facilitez la recherche en ajoutant des termes pertinents</li>
                        <li><strong>Version</strong> : Mentionnez la version ou la date si applicable</li>
                    </ul>
                    {% endif %}
                    
                    <div class=\"alert alert-info mb-0\">
                        <i class=\"fas fa-lightbulb me-2\"></i>
                        <strong>Astuce :</strong> Des métadonnées bien renseignées améliorent l'accessibilité, le référencement et facilitent la gestion de votre bibliothèque média.
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Aperçu et informations -->
        <div class=\"col-lg-4\">
            <!-- Aperçu -->
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">👁️ Aperçu</h5>
                </div>
                <div class=\"card-body text-center\">
                    {% if media.isImage %}
                        <img src=\"{{ media.url }}\" 
                             class=\"img-fluid rounded\" 
                             alt=\"{{ media.alt ?? media.originalName }}\"
                             style=\"max-height: 200px;\">
                    {% elseif media.isPdf %}
                        <i class=\"fas fa-file-pdf text-danger mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Document PDF</p>
                    {% elseif media.isVideo %}
                        <i class=\"fas fa-file-video text-primary mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Fichier vidéo</p>
                    {% elseif media.isAudio %}
                        <i class=\"fas fa-file-audio text-success mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Fichier audio</p>
                    {% else %}
                        <i class=\"fas fa-file text-secondary mb-2\" style=\"font-size: 3rem;\"></i>
                        <p class=\"mb-0\">Document</p>
                    {% endif %}
                </div>
            </div>
            
            <!-- Informations techniques -->
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">📈 Informations</h5>
                </div>
                <div class=\"card-body\">
                    <dl class=\"row small\">
                        <dt class=\"col-6\">Nom original :</dt>
                        <dd class=\"col-6\">{{ media.originalName }}</dd>
                        
                        <dt class=\"col-6\">Type :</dt>
                        <dd class=\"col-6\"><span class=\"badge bg-info\">{{ media.mimeType }}</span></dd>
                        
                        <dt class=\"col-6\">Taille :</dt>
                        <dd class=\"col-6\">{{ media.formattedFileSize }}</dd>
                        
                        {% if media.width and media.height %}
                        <dt class=\"col-6\">Dimensions :</dt>
                        <dd class=\"col-6\">{{ media.width }} x {{ media.height }}</dd>
                        {% endif %}
                        
                        <dt class=\"col-6\">Uploadé :</dt>
                        <dd class=\"col-6\">{{ media.createdAt|date('d/m/Y') }}</dd>
                        
                        <dt class=\"col-6\">Par :</dt>
                        <dd class=\"col-6\">{{ media.uploadedBy.displayName }}</dd>
                    </dl>
                </div>
            </div>
            
            <!-- Actions rapides -->
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">⚡ Actions</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"d-grid gap-2\">
                        <a href=\"{{ media.url }}\" target=\"_blank\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-external-link-alt me-2\"></i>Ouvrir le fichier
                        </a>
                        <a href=\"{{ media.url }}\" download class=\"btn btn-outline-secondary btn-sm\">
                            <i class=\"fas fa-download me-2\"></i>Télécharger
                        </a>
                        <button type=\"button\" class=\"btn btn-outline-danger btn-sm\" 
                                onclick=\"deleteMedia({{ media.id }}, '{{ media.originalName|e('js') }}')\">
                            <i class=\"fas fa-trash me-2\"></i>Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
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

// Auto-génération du texte alt à partir du nom de fichier si vide
document.addEventListener('DOMContentLoaded', function() {
    const altInput = document.getElementById('alt');
    
    if (!altInput.value.trim()) {
        // Suggerer un texte alt basé sur le nom du fichier
        const originalName = '{{ media.originalName }}';
        const suggestion = originalName
            .replace(/\\.[^/.]+\$/, '') // Enlever l'extension
            .replace(/[_-]/g, ' ') // Remplacer underscores et tirets par espaces
            .replace(/([a-z])([A-Z])/g, '\$1 \$2') // Séparer camelCase
            .toLowerCase()
            .replace(/\\b\\w/g, l => l.toUpperCase()); // Capitaliser
        
        altInput.placeholder = `Suggestion : \"\${suggestion}\"`;
    }
});
</script>
{% endblock %}", "admin/media/edit.html.twig", "/workspace/symfpress/templates/admin/media/edit.html.twig");
    }
}
