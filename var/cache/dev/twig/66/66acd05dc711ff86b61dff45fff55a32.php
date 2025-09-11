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

/* admin/comments/reply.html.twig */
class __TwigTemplate_2df2e4a2a8f0a115ee1502615c245290 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/comments/reply.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/comments/reply.html.twig"));

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

        yield "Répondre au Commentaire";
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_index");
        yield "\">Commentaires</a></li>
                <li class=\"breadcrumb-item\"><a href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12)]), "html", null, true);
        yield "\">Détail</a></li>
                <li class=\"breadcrumb-item active\">Répondre</li>
            </ol>
        </nav>
    </div>

    <!-- En-tête -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">💬 Répondre au Commentaire</h1>
        <div class=\"btn-group\">
            <a href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
                ← Annuler
            </a>
        </div>
    </div>

    <div class=\"row\">
        <!-- Commentaire original -->
        <div class=\"col-lg-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">💬 Commentaire original</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"d-flex align-items-start mb-3\">
                        <div class=\"avatar me-3\">
                            ";
        // line 38
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 38, $this->source); })()), "author", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "                                <div class=\"avatar-circle bg-primary\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 39, $this->source); })()), "authorName", [], "any", false, false, false, 39))), "html", null, true);
            yield "</div>
                            ";
        } else {
            // line 41
            yield "                                <div class=\"avatar-circle bg-secondary\">👤</div>
                            ";
        }
        // line 43
        yield "                        </div>
                        <div class=\"flex-grow-1\">
                            <h6 class=\"mb-1\">";
        // line 45
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["parentComment"] ?? null), "authorName", [], "any", true, true, false, 45) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 45, $this->source); })()), "authorName", [], "any", false, false, false, 45)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 45, $this->source); })()), "authorName", [], "any", false, false, false, 45), "html", null, true)) : ("Anonyme"));
        yield "</h6>
                            <small class=\"text-muted\">
                                📅 ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 47, $this->source); })()), "createdAt", [], "any", false, false, false, 47), "d/m/Y H:i"), "html", null, true);
        yield "
                                ";
        // line 48
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 48, $this->source); })()), "authorEmail", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "                                    | 📧 ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 49, $this->source); })()), "authorEmail", [], "any", false, false, false, 49), "html", null, true);
            yield "
                                ";
        }
        // line 51
        yield "                            </small>
                        </div>
                    </div>
                    
                    <div class=\"comment-content\">
                        <p>";
        // line 56
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 56, $this->source); })()), "content", [], "any", false, false, false, 56), "html", null, true));
        yield "</p>
                    </div>
                    
                    <div class=\"mt-3\">
                        <small class=\"text-muted\">
                            Sur : 
                            ";
        // line 62
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 62, $this->source); })()), "post", [], "any", false, false, false, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 63
            yield "                                📄 <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 63, $this->source); })()), "contentTitle", [], "any", false, false, false, 63), "html", null, true);
            yield "</strong> (Article)
                            ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 64
(isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 64, $this->source); })()), "page", [], "any", false, false, false, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 65
            yield "                                📃 <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 65, $this->source); })()), "contentTitle", [], "any", false, false, false, 65), "html", null, true);
            yield "</strong> (Page)
                            ";
        }
        // line 67
        yield "                        </small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Formulaire de réponse -->
        <div class=\"col-lg-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">✍️ Votre réponse</h5>
                </div>
                <div class=\"card-body\">
                    <form method=\"POST\">
                        <!-- Informations sur l'auteur (admin) -->
                        <div class=\"alert alert-info\">
                            <div class=\"d-flex align-items-center\">
                                <div class=\"avatar me-3\">
                                    <div class=\"avatar-circle bg-success\">👤</div>
                                </div>
                                <div>
                                    <strong>";
        // line 88
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 88), "displayName", [], "any", true, true, false, 88) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "displayName", [], "any", false, false, false, 88)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "displayName", [], "any", false, false, false, 88), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "email", [], "any", false, false, false, 88), "html", null, true)));
        yield "</strong><br>
                                    <small>Administrateur - Cette réponse sera automatiquement approuvée</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contenu de la réponse -->
                        <div class=\"mb-3\">
                            <label for=\"content\" class=\"form-label required\">Contenu de votre réponse</label>
                            <textarea name=\"content\" id=\"content\" class=\"form-control\" rows=\"8\" 
                                      placeholder=\"Tapez votre réponse ici...\" required
                                      style=\"resize: vertical;\"></textarea>
                            <div class=\"form-text\">
                                <small class=\"text-muted\">
                                    ℹ️ Vous répondez en tant qu'administrateur. La réponse sera visible publiquement.
                                </small>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class=\"d-flex gap-2 justify-content-end\">
                            <a href=\"";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_comments_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 109, $this->source); })()), "id", [], "any", false, false, false, 109)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
                                ❌ Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-success\">
                                💬 Publier la réponse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Conseil de modération -->
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\">💡 Conseils de modération</h6>
                </div>
                <div class=\"card-body\">
                    <ul class=\"list-unstyled mb-0\">
                        <li class=\"mb-2\">
                            <strong>✅ Être professionnel :</strong>
                            <small class=\"d-block text-muted\">Maintenez un ton courtois et professionnel</small>
                        </li>
                        <li class=\"mb-2\">
                            <strong>🎯 Être précis :</strong>
                            <small class=\"d-block text-muted\">Répondez directement aux points soulevés</small>
                        </li>
                        <li class=\"mb-2\">
                            <strong>🔗 Ajouter des liens :</strong>
                            <small class=\"d-block text-muted\">N'hésitez pas à renvoyer vers des ressources utiles</small>
                        </li>
                        <li>
                            <strong>🛡️ Modérer si nécessaire :</strong>
                            <small class=\"d-block text-muted\">Si le commentaire original est inapproprié, traitez-le après avoir répondu</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Affichage des réponses existantes -->
    ";
        // line 150
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 150, $this->source); })()), "replies", [], "any", false, false, false, 150))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 151
            yield "    <div class=\"row mt-4\">
        <div class=\"col-12\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">💬 Réponses existantes (";
            // line 155
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 155, $this->source); })()), "replies", [], "any", false, false, false, 155)), "html", null, true);
            yield ")</h5>
                </div>
                <div class=\"card-body\">
                    ";
            // line 158
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parentComment"]) || array_key_exists("parentComment", $context) ? $context["parentComment"] : (function () { throw new RuntimeError('Variable "parentComment" does not exist.', 158, $this->source); })()), "replies", [], "any", false, false, false, 158));
            foreach ($context['_seq'] as $context["_key"] => $context["existingReply"]) {
                // line 159
                yield "                    <div class=\"d-flex align-items-start mb-3 p-3 bg-light rounded\">
                        <div class=\"avatar me-3\">
                            ";
                // line 161
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "author", [], "any", false, false, false, 161)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 162
                    yield "                                <div class=\"avatar-circle bg-info\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "authorName", [], "any", false, false, false, 162))), "html", null, true);
                    yield "</div>
                            ";
                } else {
                    // line 164
                    yield "                                <div class=\"avatar-circle bg-secondary\">👤</div>
                            ";
                }
                // line 166
                yield "                        </div>
                        <div class=\"flex-grow-1\">
                            <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                <div>
                                    <h6 class=\"mb-1\">";
                // line 170
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "authorName", [], "any", true, true, false, 170) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "authorName", [], "any", false, false, false, 170)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "authorName", [], "any", false, false, false, 170), "html", null, true)) : ("Anonyme"));
                yield "</h6>
                                    <small class=\"text-muted\">📅 ";
                // line 171
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "createdAt", [], "any", false, false, false, 171), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                                </div>
                                ";
                // line 173
                $context["statusClass"] = ["pending" => "warning", "approved" => "success", "spam" => "danger", "trash" => "dark"];
                // line 179
                yield "                                <span class=\"badge bg-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["statusClass"]) || array_key_exists("statusClass", $context) ? $context["statusClass"] : (function () { throw new RuntimeError('Variable "statusClass" does not exist.', 179, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "status", [], "any", false, false, false, 179), [], "array", false, false, false, 179), "html", null, true);
                yield "\">
                                    ";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "status", [], "any", false, false, false, 180)), "html", null, true);
                yield "
                                </span>
                            </div>
                            <p class=\"mb-0\">";
                // line 183
                yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["existingReply"], "content", [], "any", false, false, false, 183), "html", null, true));
                yield "</p>
                        </div>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['existingReply'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 187
            yield "                </div>
            </div>
        </div>
    </div>
    ";
        }
        // line 192
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
    font-size: 16px;
}

.comment-content {
    border-left: 4px solid #6c757d;
    padding-left: 15px;
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 0 8px 8px 0;
}

.required::after {
    content: ' *';
    color: #dc3545;
}
</style>
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
        return "admin/comments/reply.html.twig";
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
        return array (  377 => 192,  370 => 187,  360 => 183,  354 => 180,  349 => 179,  347 => 173,  342 => 171,  338 => 170,  332 => 166,  328 => 164,  322 => 162,  320 => 161,  316 => 159,  312 => 158,  306 => 155,  300 => 151,  298 => 150,  254 => 109,  230 => 88,  207 => 67,  201 => 65,  199 => 64,  194 => 63,  192 => 62,  183 => 56,  176 => 51,  170 => 49,  168 => 48,  164 => 47,  159 => 45,  155 => 43,  151 => 41,  145 => 39,  143 => 38,  124 => 22,  111 => 12,  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Répondre au Commentaire{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <!-- Navigation -->
    <div class=\"mb-3\">
        <nav aria-label=\"breadcrumb\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_comments_index') }}\">Commentaires</a></li>
                <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_comments_show', {id: parentComment.id}) }}\">Détail</a></li>
                <li class=\"breadcrumb-item active\">Répondre</li>
            </ol>
        </nav>
    </div>

    <!-- En-tête -->
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">💬 Répondre au Commentaire</h1>
        <div class=\"btn-group\">
            <a href=\"{{ path('admin_comments_show', {id: parentComment.id}) }}\" class=\"btn btn-outline-secondary\">
                ← Annuler
            </a>
        </div>
    </div>

    <div class=\"row\">
        <!-- Commentaire original -->
        <div class=\"col-lg-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">💬 Commentaire original</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"d-flex align-items-start mb-3\">
                        <div class=\"avatar me-3\">
                            {% if parentComment.author %}
                                <div class=\"avatar-circle bg-primary\">{{ parentComment.authorName|first|upper }}</div>
                            {% else %}
                                <div class=\"avatar-circle bg-secondary\">👤</div>
                            {% endif %}
                        </div>
                        <div class=\"flex-grow-1\">
                            <h6 class=\"mb-1\">{{ parentComment.authorName ?? 'Anonyme' }}</h6>
                            <small class=\"text-muted\">
                                📅 {{ parentComment.createdAt|date('d/m/Y H:i') }}
                                {% if parentComment.authorEmail %}
                                    | 📧 {{ parentComment.authorEmail }}
                                {% endif %}
                            </small>
                        </div>
                    </div>
                    
                    <div class=\"comment-content\">
                        <p>{{ parentComment.content|nl2br }}</p>
                    </div>
                    
                    <div class=\"mt-3\">
                        <small class=\"text-muted\">
                            Sur : 
                            {% if parentComment.post %}
                                📄 <strong>{{ parentComment.contentTitle }}</strong> (Article)
                            {% elseif parentComment.page %}
                                📃 <strong>{{ parentComment.contentTitle }}</strong> (Page)
                            {% endif %}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Formulaire de réponse -->
        <div class=\"col-lg-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">✍️ Votre réponse</h5>
                </div>
                <div class=\"card-body\">
                    <form method=\"POST\">
                        <!-- Informations sur l'auteur (admin) -->
                        <div class=\"alert alert-info\">
                            <div class=\"d-flex align-items-center\">
                                <div class=\"avatar me-3\">
                                    <div class=\"avatar-circle bg-success\">👤</div>
                                </div>
                                <div>
                                    <strong>{{ app.user.displayName ?? app.user.email }}</strong><br>
                                    <small>Administrateur - Cette réponse sera automatiquement approuvée</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contenu de la réponse -->
                        <div class=\"mb-3\">
                            <label for=\"content\" class=\"form-label required\">Contenu de votre réponse</label>
                            <textarea name=\"content\" id=\"content\" class=\"form-control\" rows=\"8\" 
                                      placeholder=\"Tapez votre réponse ici...\" required
                                      style=\"resize: vertical;\"></textarea>
                            <div class=\"form-text\">
                                <small class=\"text-muted\">
                                    ℹ️ Vous répondez en tant qu'administrateur. La réponse sera visible publiquement.
                                </small>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class=\"d-flex gap-2 justify-content-end\">
                            <a href=\"{{ path('admin_comments_show', {id: parentComment.id}) }}\" class=\"btn btn-outline-secondary\">
                                ❌ Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-success\">
                                💬 Publier la réponse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Conseil de modération -->
            <div class=\"card mt-3\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\">💡 Conseils de modération</h6>
                </div>
                <div class=\"card-body\">
                    <ul class=\"list-unstyled mb-0\">
                        <li class=\"mb-2\">
                            <strong>✅ Être professionnel :</strong>
                            <small class=\"d-block text-muted\">Maintenez un ton courtois et professionnel</small>
                        </li>
                        <li class=\"mb-2\">
                            <strong>🎯 Être précis :</strong>
                            <small class=\"d-block text-muted\">Répondez directement aux points soulevés</small>
                        </li>
                        <li class=\"mb-2\">
                            <strong>🔗 Ajouter des liens :</strong>
                            <small class=\"d-block text-muted\">N'hésitez pas à renvoyer vers des ressources utiles</small>
                        </li>
                        <li>
                            <strong>🛡️ Modérer si nécessaire :</strong>
                            <small class=\"d-block text-muted\">Si le commentaire original est inapproprié, traitez-le après avoir répondu</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Affichage des réponses existantes -->
    {% if parentComment.replies is not empty %}
    <div class=\"row mt-4\">
        <div class=\"col-12\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">💬 Réponses existantes ({{ parentComment.replies|length }})</h5>
                </div>
                <div class=\"card-body\">
                    {% for existingReply in parentComment.replies %}
                    <div class=\"d-flex align-items-start mb-3 p-3 bg-light rounded\">
                        <div class=\"avatar me-3\">
                            {% if existingReply.author %}
                                <div class=\"avatar-circle bg-info\">{{ existingReply.authorName|first|upper }}</div>
                            {% else %}
                                <div class=\"avatar-circle bg-secondary\">👤</div>
                            {% endif %}
                        </div>
                        <div class=\"flex-grow-1\">
                            <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                <div>
                                    <h6 class=\"mb-1\">{{ existingReply.authorName ?? 'Anonyme' }}</h6>
                                    <small class=\"text-muted\">📅 {{ existingReply.createdAt|date('d/m/Y H:i') }}</small>
                                </div>
                                {% set statusClass = {
                                    'pending': 'warning',
                                    'approved': 'success', 
                                    'spam': 'danger',
                                    'trash': 'dark'
                                } %}
                                <span class=\"badge bg-{{ statusClass[existingReply.status] }}\">
                                    {{ existingReply.status|title }}
                                </span>
                            </div>
                            <p class=\"mb-0\">{{ existingReply.content|nl2br }}</p>
                        </div>
                    </div>
                    {% endfor %}
                </div>
            </div>
        </div>
    </div>
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
    font-size: 16px;
}

.comment-content {
    border-left: 4px solid #6c757d;
    padding-left: 15px;
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 0 8px 8px 0;
}

.required::after {
    content: ' *';
    color: #dc3545;
}
</style>
{% endblock %}", "admin/comments/reply.html.twig", "/workspace/symfpress/templates/admin/comments/reply.html.twig");
    }
}
