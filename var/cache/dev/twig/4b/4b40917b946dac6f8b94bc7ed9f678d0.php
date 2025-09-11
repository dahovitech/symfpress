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

/* admin/comments/index.html.twig */
class __TwigTemplate_168a544a864b428ca22fd935093f28d6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/comments/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/comments/index.html.twig"));

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

        yield "Gestion des Commentaires";
        
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
        <h1 class=\"h3 mb-0\">📝 Gestion des Commentaires</h1>
        <div class=\"badge-group\">
            <span class=\"badge bg-primary\">Total : ";
        // line 11
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "all", [], "any", true, true, false, 11) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 11, $this->source); })()), "all", [], "any", false, false, false, 11)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 11, $this->source); })()), "all", [], "any", false, false, false, 11), "html", null, true)) : (0));
        yield "</span>
            <span class=\"badge bg-warning\">En attente : ";
        // line 12
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "pending", [], "any", true, true, false, 12) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 12, $this->source); })()), "pending", [], "any", false, false, false, 12)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 12, $this->source); })()), "pending", [], "any", false, false, false, 12), "html", null, true)) : (0));
        yield "</span>
            <span class=\"badge bg-success\">Approuvés : ";
        // line 13
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "approved", [], "any", true, true, false, 13) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 13, $this->source); })()), "approved", [], "any", false, false, false, 13)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 13, $this->source); })()), "approved", [], "any", false, false, false, 13), "html", null, true)) : (0));
        yield "</span>
            <span class=\"badge bg-danger\">Spam : ";
        // line 14
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "spam", [], "any", true, true, false, 14) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 14, $this->source); })()), "spam", [], "any", false, false, false, 14)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 14, $this->source); })()), "spam", [], "any", false, false, false, 14), "html", null, true)) : (0));
        yield "</span>
        </div>
    </div>

    <!-- Filtres et recherche -->
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            <form method=\"GET\" class=\"row g-3\">
                <div class=\"col-md-3\">
                    <label for=\"status\" class=\"form-label\">Statut</label>
                    <select name=\"status\" id=\"status\" class=\"form-select\">
                        <option value=\"all\" ";
        // line 25
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 25, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous (";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "all", [], "any", true, true, false, 25) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 25, $this->source); })()), "all", [], "any", false, false, false, 25)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 25, $this->source); })()), "all", [], "any", false, false, false, 25), "html", null, true)) : (0));
        yield ")</option>
                        <option value=\"pending\" ";
        // line 26
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 26, $this->source); })()) == "pending")) ? ("selected") : (""));
        yield ">En attente (";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "pending", [], "any", true, true, false, 26) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 26, $this->source); })()), "pending", [], "any", false, false, false, 26)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 26, $this->source); })()), "pending", [], "any", false, false, false, 26), "html", null, true)) : (0));
        yield ")</option>
                        <option value=\"approved\" ";
        // line 27
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 27, $this->source); })()) == "approved")) ? ("selected") : (""));
        yield ">Approuvés (";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "approved", [], "any", true, true, false, 27) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 27, $this->source); })()), "approved", [], "any", false, false, false, 27)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 27, $this->source); })()), "approved", [], "any", false, false, false, 27), "html", null, true)) : (0));
        yield ")</option>
                        <option value=\"spam\" ";
        // line 28
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 28, $this->source); })()) == "spam")) ? ("selected") : (""));
        yield ">Spam (";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "spam", [], "any", true, true, false, 28) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 28, $this->source); })()), "spam", [], "any", false, false, false, 28)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 28, $this->source); })()), "spam", [], "any", false, false, false, 28), "html", null, true)) : (0));
        yield ")</option>
                        <option value=\"trash\" ";
        // line 29
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 29, $this->source); })()) == "trash")) ? ("selected") : (""));
        yield ">Corbeille (";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["statusCounts"] ?? null), "trash", [], "any", true, true, false, 29) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 29, $this->source); })()), "trash", [], "any", false, false, false, 29)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusCounts"]) || array_key_exists("statusCounts", $context) ? $context["statusCounts"] : (function () { throw new RuntimeError('Variable "statusCounts" does not exist.', 29, $this->source); })()), "trash", [], "any", false, false, false, 29), "html", null, true)) : (0));
        yield ")</option>
                    </select>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"search\" class=\"form-label\">Rechercher</label>
                    <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" 
                           placeholder=\"Recherche par contenu, auteur, email ou titre...\" value=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 35, $this->source); })()), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-3 d-flex align-items-end\">
                    <button type=\"submit\" class=\"btn btn-primary me-2\">🔍 Rechercher</button>
                    <a href=\"";
        // line 39
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index");
        yield "\" class=\"btn btn-outline-secondary\">Réinitialiser</a>
                </div>
            </form>
        </div>
    </div>

    ";
        // line 45
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 45, $this->source); })()))) {
            // line 46
            yield "        <div class=\"alert alert-info text-center\">
            <h4>Aucun commentaire trouvé</h4>
            <p class=\"mb-0\">";
            // line 48
            if ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 48, $this->source); })()) != "all") || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 48, $this->source); })()))) {
                yield "Essayez de modifier vos filtres de recherche.";
            } else {
                yield "Aucun commentaire n'a encore été soumis.";
            }
            yield "</p>
        </div>
    ";
        } else {
            // line 51
            yield "        <!-- Actions en masse -->
        <form id=\"bulk-form\" method=\"POST\" action=\"";
            // line 52
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_bulk_actions");
            yield "\">
            <div class=\"card mb-3\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-4\">
                            <div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"select-all\">
                                <label class=\"form-check-label\" for=\"select-all\">
                                    <strong>Sélectionner tout</strong>
                                </label>
                            </div>
                        </div>
                        <div class=\"col-md-8\">
                            <div class=\"d-flex gap-2 justify-content-end\">
                                <select name=\"action\" class=\"form-select\" style=\"width: auto;\" required>
                                    <option value=\"\">Choisir une action...</option>
                                    <option value=\"approve\">✅ Approuver</option>
                                    <option value=\"reject\">❌ Rejeter</option>
                                    <option value=\"spam\">🚫 Marquer comme spam</option>
                                    <option value=\"restore\">🔄 Restaurer</option>
                                    <option value=\"delete\">🗑️ Supprimer définitivement</option>
                                </select>
                                <button type=\"submit\" class=\"btn btn-primary\" onclick=\"return confirm('Confirmer cette action sur les commentaires sélectionnés ?')\">
                                    Appliquer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des commentaires -->
            <div class=\"comments-list\">
                ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 85, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 86
                yield "                <div class=\"card mb-3 comment-card\" data-comment-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 86), "html", null, true);
                yield "\">
                    <div class=\"card-body\">
                        <div class=\"row\">
                            <!-- Checkbox et avatar -->
                            <div class=\"col-auto\">
                                <div class=\"d-flex flex-column align-items-center\">
                                    <input class=\"form-check-input comment-checkbox\" type=\"checkbox\" 
                                           name=\"selected_comments[]\" value=\"";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 93), "html", null, true);
                yield "\">
                                    <div class=\"avatar mt-2\">
                                        ";
                // line 95
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 96
                    yield "                                            <div class=\"avatar-circle bg-primary\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", false, false, false, 96))), "html", null, true);
                    yield "</div>
                                        ";
                } else {
                    // line 98
                    yield "                                            <div class=\"avatar-circle bg-secondary\">👤</div>
                                        ";
                }
                // line 100
                yield "                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contenu du commentaire -->
                            <div class=\"col\">
                                <!-- En-tête du commentaire -->
                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                    <div>
                                        <h6 class=\"mb-1\">
                                            <strong>";
                // line 110
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", true, true, false, 110) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", false, false, false, 110)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorName", [], "any", false, false, false, 110), "html", null, true)) : ("Anonyme"));
                yield "</strong>
                                            ";
                // line 111
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorEmail", [], "any", false, false, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 112
                    yield "                                                <small class=\"text-muted\">&lt;";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorEmail", [], "any", false, false, false, 112), "html", null, true);
                    yield "&gt;</small>
                                            ";
                }
                // line 114
                yield "                                        </h6>
                                        <small class=\"text-muted\">
                                            📅 ";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "createdAt", [], "any", false, false, false, 116), "d/m/Y H:i"), "html", null, true);
                yield "
                                            ";
                // line 117
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "isReply", [], "any", false, false, false, 117)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 118
                    yield "                                                | 💬 Réponse (niveau ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "level", [], "any", false, false, false, 118), "html", null, true);
                    yield ")
                                            ";
                }
                // line 120
                yield "                                            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorIp", [], "any", false, false, false, 120)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 121
                    yield "                                                | 🌐 IP: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "authorIp", [], "any", false, false, false, 121), "html", null, true);
                    yield "
                                            ";
                }
                // line 123
                yield "                                        </small>
                                        <br>
                                        <small class=\"text-muted\">
                                            Sur : 
                                            ";
                // line 127
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "post", [], "any", false, false, false, 127)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 128
                    yield "                                                📄 <strong>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "contentTitle", [], "any", false, false, false, 128), "html", null, true);
                    yield "</strong> (Article)
                                            ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 129
$context["comment"], "page", [], "any", false, false, false, 129)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 130
                    yield "                                                📃 <strong>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "contentTitle", [], "any", false, false, false, 130), "html", null, true);
                    yield "</strong> (Page)
                                            ";
                }
                // line 132
                yield "                                        </small>
                                    </div>
                                    
                                    <!-- Badge de statut -->
                                    <div>
                                        ";
                // line 137
                $context["statusClass"] = ["pending" => "warning", "approved" => "success", "spam" => "danger", "trash" => "dark"];
                // line 143
                yield "                                        ";
                $context["statusLabel"] = ["pending" => "⏳ En attente", "approved" => "✅ Approuvé", "spam" => "🚫 Spam", "trash" => "🗑️ Corbeille"];
                // line 149
                yield "                                        <span class=\"badge bg-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusClass"]) || array_key_exists("statusClass", $context) ? $context["statusClass"] : (function () { throw new RuntimeError('Variable "statusClass" does not exist.', 149, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 149), [], "array", false, false, false, 149), "html", null, true);
                yield "\">
                                            ";
                // line 150
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusLabel"]) || array_key_exists("statusLabel", $context) ? $context["statusLabel"] : (function () { throw new RuntimeError('Variable "statusLabel" does not exist.', 150, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 150), [], "array", false, false, false, 150), "html", null, true);
                yield "
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Contenu -->
                                <div class=\"comment-content mb-3\">
                                    <p class=\"mb-0\">";
                // line 157
                yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 157), "html", null, true));
                yield "</p>
                                </div>
                                
                                <!-- Actions -->
                                <div class=\"comment-actions d-flex gap-1 flex-wrap\">
                                    <a href=\"";
                // line 162
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 162)]), "html", null, true);
                yield "\" 
                                       class=\"btn btn-sm btn-outline-info\">👁️ Voir</a>
                                    
                                    ";
                // line 165
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 165) != "approved")) {
                    // line 166
                    yield "                                        <button type=\"button\" class=\"btn btn-sm btn-outline-success action-btn\" 
                                                data-action=\"approve\" data-id=\"";
                    // line 167
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 167), "html", null, true);
                    yield "\">
                                            ✅ Approuver
                                        </button>
                                    ";
                }
                // line 171
                yield "                                    
                                    ";
                // line 172
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 172) != "trash")) {
                    // line 173
                    yield "                                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger action-btn\" 
                                                data-action=\"reject\" data-id=\"";
                    // line 174
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 174), "html", null, true);
                    yield "\">
                                            ❌ Rejeter
                                        </button>
                                    ";
                }
                // line 178
                yield "                                    
                                    ";
                // line 179
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 179) != "spam")) {
                    // line 180
                    yield "                                        <button type=\"button\" class=\"btn btn-sm btn-outline-warning action-btn\" 
                                                data-action=\"spam\" data-id=\"";
                    // line 181
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 181), "html", null, true);
                    yield "\">
                                            🚫 Spam
                                        </button>
                                    ";
                }
                // line 185
                yield "                                    
                                    ";
                // line 186
                if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 186), ["spam", "trash"])) {
                    // line 187
                    yield "                                        <button type=\"button\" class=\"btn btn-sm btn-outline-primary action-btn\" 
                                                data-action=\"restore\" data-id=\"";
                    // line 188
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 188), "html", null, true);
                    yield "\">
                                            🔄 Restaurer
                                        </button>
                                    ";
                }
                // line 192
                yield "                                    
                                    <a href=\"";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_reply", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 193)]), "html", null, true);
                yield "\" 
                                       class=\"btn btn-sm btn-outline-secondary\">💬 Répondre</a>
                                    
                                    <button type=\"button\" class=\"btn btn-sm btn-outline-danger action-btn\" 
                                            data-action=\"delete\" data-id=\"";
                // line 197
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 197), "html", null, true);
                yield "\" 
                                            onclick=\"return confirm('Supprimer définitivement ce commentaire ?')\">
                                        🗑️ Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 207
            yield "            </div>
        </form>
        
        <!-- Pagination -->
        ";
            // line 211
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 211, $this->source); })()), "pages", [], "any", false, false, false, 211) > 1)) {
                // line 212
                yield "        <nav class=\"mt-4\">
            <ul class=\"pagination justify-content-center\">
                ";
                // line 214
                $context["currentParams"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 214, $this->source); })()), "request", [], "any", false, false, false, 214), "query", [], "any", false, false, false, 214), "all", [], "any", false, false, false, 214);
                // line 215
                yield "                
                ";
                // line 216
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 216, $this->source); })()), "page", [], "any", false, false, false, 216) > 1)) {
                    // line 217
                    yield "                    ";
                    $context["currentParams"] = Twig\Extension\CoreExtension::merge((isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 217, $this->source); })()), ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 217, $this->source); })()), "page", [], "any", false, false, false, 217) - 1)]);
                    // line 218
                    yield "                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"";
                    // line 219
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index", (isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 219, $this->source); })())), "html", null, true);
                    yield "\">Précédent</a>
                    </li>
                ";
                }
                // line 222
                yield "                
                ";
                // line 223
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(max(1, (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 223, $this->source); })()), "page", [], "any", false, false, false, 223) - 2)), min(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 223, $this->source); })()), "pages", [], "any", false, false, false, 223), (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 223, $this->source); })()), "page", [], "any", false, false, false, 223) + 2))));
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    // line 224
                    yield "                    ";
                    $context["currentParams"] = Twig\Extension\CoreExtension::merge((isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 224, $this->source); })()), ["page" => $context["p"]]);
                    // line 225
                    yield "                    <li class=\"page-item ";
                    yield ((($context["p"] == CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 225, $this->source); })()), "page", [], "any", false, false, false, 225))) ? ("active") : (""));
                    yield "\">
                        <a class=\"page-link\" href=\"";
                    // line 226
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index", (isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 226, $this->source); })())), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                    yield "</a>
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 229
                yield "                
                ";
                // line 230
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 230, $this->source); })()), "page", [], "any", false, false, false, 230) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 230, $this->source); })()), "pages", [], "any", false, false, false, 230))) {
                    // line 231
                    yield "                    ";
                    $context["currentParams"] = Twig\Extension\CoreExtension::merge((isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 231, $this->source); })()), ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 231, $this->source); })()), "page", [], "any", false, false, false, 231) + 1)]);
                    // line 232
                    yield "                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"";
                    // line 233
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index", (isset($context["currentParams"]) || array_key_exists("currentParams", $context) ? $context["currentParams"] : (function () { throw new RuntimeError('Variable "currentParams" does not exist.', 233, $this->source); })())), "html", null, true);
                    yield "\">Suivant</a>
                    </li>
                ";
                }
                // line 236
                yield "            </ul>
        </nav>
        ";
            }
            // line 239
            yield "    ";
        }
        // line 240
        yield "</div>

<!-- CSS personnalisé -->
<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 14px;
}

.comment-content {
    max-height: 150px;
    overflow-y: auto;
    border-left: 3px solid #dee2e6;
    padding-left: 15px;
}

.comment-card:hover {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.badge-group .badge {
    margin-right: 0.5rem;
}
</style>

<!-- JavaScript pour les actions AJAX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélection globale
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.comment-checkbox');
    
    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
    
    // Actions individuelles AJAX
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.dataset.action;
            const id = this.dataset.id;
            const card = this.closest('.comment-card');
            
            // Créer un formulaire invisible pour CSRF
            const form = document.createElement('form');
            form.style.display = 'none';
            form.method = 'POST';
            form.action = `/admin/comments/\${id}/\${action}`;
            
            const token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = '";
        // line 299
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(((("" . (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 299, $this->source); })())) . "_comment_") . (((CoreExtension::getAttribute($this->env, $this->source, ($context["comment"] ?? null), "id", [], "any", true, true, false, 299) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment"]) || array_key_exists("comment", $context) ? $context["comment"] : (function () { throw new RuntimeError('Variable "comment" does not exist.', 299, $this->source); })()), "id", [], "any", false, false, false, 299)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment"]) || array_key_exists("comment", $context) ? $context["comment"] : (function () { throw new RuntimeError('Variable "comment" does not exist.', 299, $this->source); })()), "id", [], "any", false, false, false, 299)) : ("0")))), "html", null, true);
        yield "';
            
            form.appendChild(token);
            document.body.appendChild(form);
            
            // Soumettre et gérer la réponse
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.deleted) {
                        card.remove();
                    } else {
                        // Recharger pour mettre à jour le statut
                        location.reload();
                    }
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                location.reload(); // Fallback
            });
            
            document.body.removeChild(form);
        });
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
        return "admin/comments/index.html.twig";
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
        return array (  608 => 299,  547 => 240,  544 => 239,  539 => 236,  533 => 233,  530 => 232,  527 => 231,  525 => 230,  522 => 229,  511 => 226,  506 => 225,  503 => 224,  499 => 223,  496 => 222,  490 => 219,  487 => 218,  484 => 217,  482 => 216,  479 => 215,  477 => 214,  473 => 212,  471 => 211,  465 => 207,  449 => 197,  442 => 193,  439 => 192,  432 => 188,  429 => 187,  427 => 186,  424 => 185,  417 => 181,  414 => 180,  412 => 179,  409 => 178,  402 => 174,  399 => 173,  397 => 172,  394 => 171,  387 => 167,  384 => 166,  382 => 165,  376 => 162,  368 => 157,  358 => 150,  353 => 149,  350 => 143,  348 => 137,  341 => 132,  335 => 130,  333 => 129,  328 => 128,  326 => 127,  320 => 123,  314 => 121,  311 => 120,  305 => 118,  303 => 117,  299 => 116,  295 => 114,  289 => 112,  287 => 111,  283 => 110,  271 => 100,  267 => 98,  261 => 96,  259 => 95,  254 => 93,  243 => 86,  239 => 85,  203 => 52,  200 => 51,  190 => 48,  186 => 46,  184 => 45,  175 => 39,  168 => 35,  157 => 29,  151 => 28,  145 => 27,  139 => 26,  133 => 25,  119 => 14,  115 => 13,  111 => 12,  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Gestion des Commentaires{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <!-- En-tête avec statistiques -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">📝 Gestion des Commentaires</h1>
        <div class=\"badge-group\">
            <span class=\"badge bg-primary\">Total : {{ statusCounts.all ?? 0 }}</span>
            <span class=\"badge bg-warning\">En attente : {{ statusCounts.pending ?? 0 }}</span>
            <span class=\"badge bg-success\">Approuvés : {{ statusCounts.approved ?? 0 }}</span>
            <span class=\"badge bg-danger\">Spam : {{ statusCounts.spam ?? 0 }}</span>
        </div>
    </div>

    <!-- Filtres et recherche -->
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            <form method=\"GET\" class=\"row g-3\">
                <div class=\"col-md-3\">
                    <label for=\"status\" class=\"form-label\">Statut</label>
                    <select name=\"status\" id=\"status\" class=\"form-select\">
                        <option value=\"all\" {{ currentStatus == 'all' ? 'selected' : '' }}>Tous ({{ statusCounts.all ?? 0 }})</option>
                        <option value=\"pending\" {{ currentStatus == 'pending' ? 'selected' : '' }}>En attente ({{ statusCounts.pending ?? 0 }})</option>
                        <option value=\"approved\" {{ currentStatus == 'approved' ? 'selected' : '' }}>Approuvés ({{ statusCounts.approved ?? 0 }})</option>
                        <option value=\"spam\" {{ currentStatus == 'spam' ? 'selected' : '' }}>Spam ({{ statusCounts.spam ?? 0 }})</option>
                        <option value=\"trash\" {{ currentStatus == 'trash' ? 'selected' : '' }}>Corbeille ({{ statusCounts.trash ?? 0 }})</option>
                    </select>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"search\" class=\"form-label\">Rechercher</label>
                    <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" 
                           placeholder=\"Recherche par contenu, auteur, email ou titre...\" value=\"{{ search }}\">
                </div>
                <div class=\"col-md-3 d-flex align-items-end\">
                    <button type=\"submit\" class=\"btn btn-primary me-2\">🔍 Rechercher</button>
                    <a href=\"{{ path('admin_comments_index') }}\" class=\"btn btn-outline-secondary\">Réinitialiser</a>
                </div>
            </form>
        </div>
    </div>

    {% if comments is empty %}
        <div class=\"alert alert-info text-center\">
            <h4>Aucun commentaire trouvé</h4>
            <p class=\"mb-0\">{% if currentStatus != 'all' or search %}Essayez de modifier vos filtres de recherche.{% else %}Aucun commentaire n'a encore été soumis.{% endif %}</p>
        </div>
    {% else %}
        <!-- Actions en masse -->
        <form id=\"bulk-form\" method=\"POST\" action=\"{{ path('admin_comments_bulk_actions') }}\">
            <div class=\"card mb-3\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-4\">
                            <div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"select-all\">
                                <label class=\"form-check-label\" for=\"select-all\">
                                    <strong>Sélectionner tout</strong>
                                </label>
                            </div>
                        </div>
                        <div class=\"col-md-8\">
                            <div class=\"d-flex gap-2 justify-content-end\">
                                <select name=\"action\" class=\"form-select\" style=\"width: auto;\" required>
                                    <option value=\"\">Choisir une action...</option>
                                    <option value=\"approve\">✅ Approuver</option>
                                    <option value=\"reject\">❌ Rejeter</option>
                                    <option value=\"spam\">🚫 Marquer comme spam</option>
                                    <option value=\"restore\">🔄 Restaurer</option>
                                    <option value=\"delete\">🗑️ Supprimer définitivement</option>
                                </select>
                                <button type=\"submit\" class=\"btn btn-primary\" onclick=\"return confirm('Confirmer cette action sur les commentaires sélectionnés ?')\">
                                    Appliquer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des commentaires -->
            <div class=\"comments-list\">
                {% for comment in comments %}
                <div class=\"card mb-3 comment-card\" data-comment-id=\"{{ comment.id }}\">
                    <div class=\"card-body\">
                        <div class=\"row\">
                            <!-- Checkbox et avatar -->
                            <div class=\"col-auto\">
                                <div class=\"d-flex flex-column align-items-center\">
                                    <input class=\"form-check-input comment-checkbox\" type=\"checkbox\" 
                                           name=\"selected_comments[]\" value=\"{{ comment.id }}\">
                                    <div class=\"avatar mt-2\">
                                        {% if comment.author %}
                                            <div class=\"avatar-circle bg-primary\">{{ comment.authorName|first|upper }}</div>
                                        {% else %}
                                            <div class=\"avatar-circle bg-secondary\">👤</div>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contenu du commentaire -->
                            <div class=\"col\">
                                <!-- En-tête du commentaire -->
                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                    <div>
                                        <h6 class=\"mb-1\">
                                            <strong>{{ comment.authorName ?? 'Anonyme' }}</strong>
                                            {% if comment.authorEmail %}
                                                <small class=\"text-muted\">&lt;{{ comment.authorEmail }}&gt;</small>
                                            {% endif %}
                                        </h6>
                                        <small class=\"text-muted\">
                                            📅 {{ comment.createdAt|date('d/m/Y H:i') }}
                                            {% if comment.isReply %}
                                                | 💬 Réponse (niveau {{ comment.level }})
                                            {% endif %}
                                            {% if comment.authorIp %}
                                                | 🌐 IP: {{ comment.authorIp }}
                                            {% endif %}
                                        </small>
                                        <br>
                                        <small class=\"text-muted\">
                                            Sur : 
                                            {% if comment.post %}
                                                📄 <strong>{{ comment.contentTitle }}</strong> (Article)
                                            {% elseif comment.page %}
                                                📃 <strong>{{ comment.contentTitle }}</strong> (Page)
                                            {% endif %}
                                        </small>
                                    </div>
                                    
                                    <!-- Badge de statut -->
                                    <div>
                                        {% set statusClass = {
                                            'pending': 'warning',
                                            'approved': 'success', 
                                            'spam': 'danger',
                                            'trash': 'dark'
                                        } %}
                                        {% set statusLabel = {
                                            'pending': '⏳ En attente',
                                            'approved': '✅ Approuvé', 
                                            'spam': '🚫 Spam',
                                            'trash': '🗑️ Corbeille'
                                        } %}
                                        <span class=\"badge bg-{{ statusClass[comment.status] }}\">
                                            {{ statusLabel[comment.status] }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Contenu -->
                                <div class=\"comment-content mb-3\">
                                    <p class=\"mb-0\">{{ comment.content|nl2br }}</p>
                                </div>
                                
                                <!-- Actions -->
                                <div class=\"comment-actions d-flex gap-1 flex-wrap\">
                                    <a href=\"{{ path('admin_comments_show', {id: comment.id}) }}\" 
                                       class=\"btn btn-sm btn-outline-info\">👁️ Voir</a>
                                    
                                    {% if comment.status != 'approved' %}
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-success action-btn\" 
                                                data-action=\"approve\" data-id=\"{{ comment.id }}\">
                                            ✅ Approuver
                                        </button>
                                    {% endif %}
                                    
                                    {% if comment.status != 'trash' %}
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger action-btn\" 
                                                data-action=\"reject\" data-id=\"{{ comment.id }}\">
                                            ❌ Rejeter
                                        </button>
                                    {% endif %}
                                    
                                    {% if comment.status != 'spam' %}
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-warning action-btn\" 
                                                data-action=\"spam\" data-id=\"{{ comment.id }}\">
                                            🚫 Spam
                                        </button>
                                    {% endif %}
                                    
                                    {% if comment.status in ['spam', 'trash'] %}
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-primary action-btn\" 
                                                data-action=\"restore\" data-id=\"{{ comment.id }}\">
                                            🔄 Restaurer
                                        </button>
                                    {% endif %}
                                    
                                    <a href=\"{{ path('admin_comments_reply', {id: comment.id}) }}\" 
                                       class=\"btn btn-sm btn-outline-secondary\">💬 Répondre</a>
                                    
                                    <button type=\"button\" class=\"btn btn-sm btn-outline-danger action-btn\" 
                                            data-action=\"delete\" data-id=\"{{ comment.id }}\" 
                                            onclick=\"return confirm('Supprimer définitivement ce commentaire ?')\">
                                        🗑️ Supprimer
                                    </button>
                                </div>
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
                        <a class=\"page-link\" href=\"{{ path('admin_comments_index', currentParams) }}\">Précédent</a>
                    </li>
                {% endif %}
                
                {% for p in range(max(1, pagination.page - 2), min(pagination.pages, pagination.page + 2)) %}
                    {% set currentParams = currentParams|merge({page: p}) %}
                    <li class=\"page-item {{ p == pagination.page ? 'active' : '' }}\">
                        <a class=\"page-link\" href=\"{{ path('admin_comments_index', currentParams) }}\">{{ p }}</a>
                    </li>
                {% endfor %}
                
                {% if pagination.page < pagination.pages %}
                    {% set currentParams = currentParams|merge({page: pagination.page + 1}) %}
                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"{{ path('admin_comments_index', currentParams) }}\">Suivant</a>
                    </li>
                {% endif %}
            </ul>
        </nav>
        {% endif %}
    {% endif %}
</div>

<!-- CSS personnalisé -->
<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 14px;
}

.comment-content {
    max-height: 150px;
    overflow-y: auto;
    border-left: 3px solid #dee2e6;
    padding-left: 15px;
}

.comment-card:hover {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.badge-group .badge {
    margin-right: 0.5rem;
}
</style>

<!-- JavaScript pour les actions AJAX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélection globale
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.comment-checkbox');
    
    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
    
    // Actions individuelles AJAX
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.dataset.action;
            const id = this.dataset.id;
            const card = this.closest('.comment-card');
            
            // Créer un formulaire invisible pour CSRF
            const form = document.createElement('form');
            form.style.display = 'none';
            form.method = 'POST';
            form.action = `/admin/comments/\${id}/\${action}`;
            
            const token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = '{{ csrf_token(\"\" ~ action ~ \"_comment_\" ~ (comment.id ?? \"0\")) }}';
            
            form.appendChild(token);
            document.body.appendChild(form);
            
            // Soumettre et gérer la réponse
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.deleted) {
                        card.remove();
                    } else {
                        // Recharger pour mettre à jour le statut
                        location.reload();
                    }
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                location.reload(); // Fallback
            });
            
            document.body.removeChild(form);
        });
    });
});
</script>
{% endblock %}", "admin/comments/index.html.twig", "/workspace/symfpress/templates/admin/comments/index.html.twig");
    }
}
