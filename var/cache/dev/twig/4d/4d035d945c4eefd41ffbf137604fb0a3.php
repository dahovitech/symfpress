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

/* admin/users/show.html.twig */
class __TwigTemplate_6c2d4b60d35758476f35650a798c2f85 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 3, $this->source); })()), "fullName", [], "any", false, false, false, 3), "html", null, true);
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\">Utilisateurs</a></li>
        <li class=\"breadcrumb-item active\">";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 10, $this->source); })()), "fullName", [], "any", false, false, false, 10), "html", null, true);
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
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0 d-flex align-items-center\">
        <div class=\"avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3\">
            ";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "firstName", [], "any", false, false, false, 19), 0, 1)), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "lastName", [], "any", false, false, false, 19), 0, 1)), "html", null, true);
        yield "
        </div>
        ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 21, $this->source); })()), "fullName", [], "any", false, false, false, 21), "html", null, true);
        yield "
    </h1>
    <div>
        ";
        // line 24
        if ((($tmp = (isset($context["canEdit"]) || array_key_exists("canEdit", $context) ? $context["canEdit"] : (function () { throw new RuntimeError('Variable "canEdit" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 25, $this->source); })()), "id", [], "any", false, false, false, 25)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-edit\"></i> Modifier
            </a>
        ";
        }
        // line 29
        yield "    </div>
</div>

<div class=\"row\">
    <div class=\"col-md-8\">
        <!-- Informations personnelles -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Informations personnelles</h5>
            </div>
            <div class=\"card-body\">
                <dl class=\"row\">
                    <dt class=\"col-sm-3\">Nom complet :</dt>
                    <dd class=\"col-sm-9\">";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "fullName", [], "any", false, false, false, 42), "html", null, true);
        yield "</dd>
                    
                    <dt class=\"col-sm-3\">Nom d'utilisateur :</dt>
                    <dd class=\"col-sm-9\">@";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 45, $this->source); })()), "username", [], "any", false, false, false, 45), "html", null, true);
        yield "</dd>
                    
                    <dt class=\"col-sm-3\">Email :</dt>
                    <dd class=\"col-sm-9\">
                        <a href=\"mailto:";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 49, $this->source); })()), "email", [], "any", false, false, false, 49), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 49, $this->source); })()), "email", [], "any", false, false, false, 49), "html", null, true);
        yield "</a>
                    </dd>
                    
                    ";
        // line 52
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "website", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "                    <dt class=\"col-sm-3\">Site web :</dt>
                    <dd class=\"col-sm-9\">
                        <a href=\"";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 55, $this->source); })()), "website", [], "any", false, false, false, 55), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 55, $this->source); })()), "website", [], "any", false, false, false, 55), "html", null, true);
            yield "</a>
                    </dd>
                    ";
        }
        // line 58
        yield "                    
                    <dt class=\"col-sm-3\">Rôle :</dt>
                    <dd class=\"col-sm-9\">
                        ";
        // line 61
        $context["highestRole"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 61, $this->source); })()), "highestRole", [], "any", false, false, false, 61);
        // line 62
        yield "                        <span class=\"badge 
                            ";
        // line 63
        if (((isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 63, $this->source); })()) == "ROLE_ADMIN")) {
            yield "bg-danger
                            ";
        } elseif ((        // line 64
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 64, $this->source); })()) == "ROLE_EDITOR")) {
            yield "bg-warning
                            ";
        } elseif ((        // line 65
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 65, $this->source); })()) == "ROLE_AUTHOR")) {
            yield "bg-info
                            ";
        } elseif ((        // line 66
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 66, $this->source); })()) == "ROLE_CONTRIBUTOR")) {
            yield "bg-secondary
                            ";
        } else {
            // line 67
            yield "bg-light text-dark";
        }
        yield "\">
                            ";
        // line 68
        if (((isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 68, $this->source); })()) == "ROLE_ADMIN")) {
            yield "Administrateur
                            ";
        } elseif ((        // line 69
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 69, $this->source); })()) == "ROLE_EDITOR")) {
            yield "Éditeur
                            ";
        } elseif ((        // line 70
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 70, $this->source); })()) == "ROLE_AUTHOR")) {
            yield "Auteur
                            ";
        } elseif ((        // line 71
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 71, $this->source); })()) == "ROLE_CONTRIBUTOR")) {
            yield "Contributeur
                            ";
        } elseif ((        // line 72
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 72, $this->source); })()) == "ROLE_SUBSCRIBER")) {
            yield "Abonné
                            ";
        } else {
            // line 73
            yield "Utilisateur";
        }
        // line 74
        yield "                        </span>
                    </dd>
                    
                    <dt class=\"col-sm-3\">Statut :</dt>
                    <dd class=\"col-sm-9\">
                        ";
        // line 79
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 79, $this->source); })()), "isActive", [], "any", false, false, false, 79)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 80
            yield "                            <span class=\"badge bg-success\">Actif</span>
                        ";
        } else {
            // line 82
            yield "                            <span class=\"badge bg-danger\">Inactif</span>
                        ";
        }
        // line 84
        yield "                    </dd>
                </dl>
                
                ";
        // line 87
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "bio", [], "any", false, false, false, 87)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 88
            yield "                <hr>
                <h6>Biographie</h6>
                <p class=\"text-muted\">";
            // line 90
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 90, $this->source); })()), "bio", [], "any", false, false, false, 90), "html", null, true));
            yield "</p>
                ";
        }
        // line 92
        yield "            </div>
        </div>
        
        <!-- Activité récente -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Activité récente</h5>
            </div>
            <div class=\"card-body\">
                <!-- Articles récents -->
                ";
        // line 102
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 102, $this->source); })()), "posts", [], "any", false, false, false, 102)) > 0)) {
            // line 103
            yield "                <h6 class=\"mb-3\">Articles récents</h6>
                <div class=\"list-group list-group-flush mb-4\">
                    ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 105, $this->source); })()), "posts", [], "any", false, false, false, 105), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 106
                yield "                        ";
                $context["translation"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "translations", [], "any", false, false, false, 106));
                // line 107
                yield "                        <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                            <div>
                                <h6 class=\"mb-1\">";
                // line 109
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 109, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 109, $this->source); })()), "title", [], "any", false, false, false, 109), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Article #" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 109)), "html", null, true)));
                yield "</h6>
                                <small class=\"text-muted\">";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 110), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                                <span class=\"badge ";
                // line 111
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 111) == "published")) ? ("bg-success") : ("bg-secondary"));
                yield " ms-2\">
                                    ";
                // line 112
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 112) == "published")) ? ("Publié") : ("Brouillon"));
                yield "
                                </span>
                            </div>
                            <a href=\"";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_posts_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 115)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 120
            yield "                </div>
                ";
        }
        // line 122
        yield "                
                <!-- Pages récentes -->
                ";
        // line 124
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 124, $this->source); })()), "pages", [], "any", false, false, false, 124)) > 0)) {
            // line 125
            yield "                <h6 class=\"mb-3\">Pages récentes</h6>
                <div class=\"list-group list-group-flush mb-4\">
                    ";
            // line 127
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 127, $this->source); })()), "pages", [], "any", false, false, false, 127), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 128
                yield "                        ";
                $context["translation"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["page"], "translations", [], "any", false, false, false, 128));
                // line 129
                yield "                        <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                            <div>
                                <h6 class=\"mb-1\">";
                // line 131
                yield (((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 131, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 131, $this->source); })()), "title", [], "any", false, false, false, 131), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Page #" . CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 131)), "html", null, true)));
                yield "</h6>
                                <small class=\"text-muted\">";
                // line 132
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "createdAt", [], "any", false, false, false, 132), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                                <span class=\"badge ";
                // line 133
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "status", [], "any", false, false, false, 133) == "published")) ? ("bg-success") : ("bg-secondary"));
                yield " ms-2\">
                                    ";
                // line 134
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "status", [], "any", false, false, false, 134) == "published")) ? ("Publiée") : ("Brouillon"));
                yield "
                                </span>
                            </div>
                            <a href=\"";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 137)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 142
            yield "                </div>
                ";
        }
        // line 144
        yield "                
                ";
        // line 145
        if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 145, $this->source); })()), "posts", [], "any", false, false, false, 145)) == 0) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 145, $this->source); })()), "pages", [], "any", false, false, false, 145)) == 0))) {
            // line 146
            yield "                <div class=\"text-center py-4\">
                    <i class=\"fas fa-file fa-2x text-muted mb-3\"></i>
                    <p class=\"text-muted\">Aucun contenu créé pour le moment.</p>
                </div>
                ";
        }
        // line 151
        yield "            </div>
        </div>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Avatar -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-user-circle me-1\"></i> Avatar</h6>
            </div>
            <div class=\"card-body text-center\">
                <div class=\"avatar-xl bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3\">
                    ";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 163, $this->source); })()), "firstName", [], "any", false, false, false, 163), 0, 1)), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 163, $this->source); })()), "lastName", [], "any", false, false, false, 163), 0, 1)), "html", null, true);
        yield "
                </div>
                <h5>";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 165, $this->source); })()), "fullName", [], "any", false, false, false, 165), "html", null, true);
        yield "</h5>
                <p class=\"text-muted\">@";
        // line 166
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 166, $this->source); })()), "username", [], "any", false, false, false, 166), "html", null, true);
        yield "</p>
            </div>
        </div>
        
        <!-- Statistiques -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-chart-bar me-1\"></i> Statistiques</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"row text-center\">
                    <div class=\"col-6\">
                        <h4 class=\"text-primary\">";
        // line 178
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 178, $this->source); })()), "posts", [], "any", false, false, false, 178)), "html", null, true);
        yield "</h4>
                        <small class=\"text-muted\">Articles</small>
                    </div>
                    <div class=\"col-6\">
                        <h4 class=\"text-secondary\">";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 182, $this->source); })()), "pages", [], "any", false, false, false, 182)), "html", null, true);
        yield "</h4>
                        <small class=\"text-muted\">Pages</small>
                    </div>
                </div>
                <hr>
                <div class=\"row text-center\">
                    <div class=\"col-6\">
                        <h4 class=\"text-info\">";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 189, $this->source); })()), "comments", [], "any", false, false, false, 189)), "html", null, true);
        yield "</h4>
                        <small class=\"text-muted\">Commentaires</small>
                    </div>
                    <div class=\"col-6\">
                        <h4 class=\"text-warning\">";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 193, $this->source); })()), "medias", [], "any", false, false, false, 193)), "html", null, true);
        yield "</h4>
                        <small class=\"text-muted\">Médias</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informations compte -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations compte</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\">
                    <strong>Inscrit le :</strong><br>
                    <small class=\"text-muted\">";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 208, $this->source); })()), "createdAt", [], "any", false, false, false, 208), "d/m/Y u00e0 H:i"), "html", null, true);
        yield "</small>
                </p>
                
                ";
        // line 211
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 211, $this->source); })()), "lastLoginAt", [], "any", false, false, false, 211)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 212
            yield "                <p class=\"mb-2\">
                    <strong>Dernière connexion :</strong><br>
                    <small class=\"text-muted\">";
            // line 214
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 214, $this->source); })()), "lastLoginAt", [], "any", false, false, false, 214), "d/m/Y u00e0 H:i"), "html", null, true);
            yield "</small>
                </p>
                ";
        } else {
            // line 217
            yield "                <p class=\"mb-2\">
                    <strong>Dernière connexion :</strong><br>
                    <small class=\"text-muted\">Jamais connecté</small>
                </p>
                ";
        }
        // line 222
        yield "                
                ";
        // line 223
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 223, $this->source); })()), "updatedAt", [], "any", false, false, false, 223)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 224
            yield "                <p class=\"mb-0\">
                    <strong>Dernière modification :</strong><br>
                    <small class=\"text-muted\">";
            // line 226
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 226, $this->source); })()), "updatedAt", [], "any", false, false, false, 226), "d/m/Y u00e0 H:i"), "html", null, true);
            yield "</small>
                </p>
                ";
        }
        // line 229
        yield "            </div>
        </div>
        
        <!-- Actions -->
        ";
        // line 233
        if ((($tmp = (isset($context["canEdit"]) || array_key_exists("canEdit", $context) ? $context["canEdit"] : (function () { throw new RuntimeError('Variable "canEdit" does not exist.', 233, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 234
            yield "        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-tools me-1\"></i> Actions</h6>
            </div>
            <div class=\"card-body\">
                <a href=\"";
            // line 239
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 239, $this->source); })()), "id", [], "any", false, false, false, 239)]), "html", null, true);
            yield "\" class=\"btn btn-primary btn-sm d-block mb-2\">
                    <i class=\"fas fa-edit\"></i> Modifier l'utilisateur
                </a>
                
                ";
            // line 243
            if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 243, $this->source); })()) != CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 243, $this->source); })()), "user", [], "any", false, false, false, 243))) {
                // line 244
                yield "                <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_toggle_status", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 244, $this->source); })()), "id", [], "any", false, false, false, 244)]), "html", null, true);
                yield "\" class=\"d-inline w-100 mb-2\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 245
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("toggle" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 245, $this->source); })()), "id", [], "any", false, false, false, 245))), "html", null, true);
                yield "\">
                    <button type=\"submit\" class=\"btn btn-outline-";
                // line 246
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 246, $this->source); })()), "isActive", [], "any", false, false, false, 246)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("warning") : ("success"));
                yield " btn-sm d-block\">
                        <i class=\"fas fa-";
                // line 247
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 247, $this->source); })()), "isActive", [], "any", false, false, false, 247)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("pause") : ("play"));
                yield "\"></i> 
                        ";
                // line 248
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 248, $this->source); })()), "isActive", [], "any", false, false, false, 248)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Désactiver") : ("Activer"));
                yield " le compte
                    </button>
                </form>
                ";
            }
            // line 252
            yield "                
                ";
            // line 253
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 253, $this->source); })()), "email", [], "any", false, false, false, 253)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 254
                yield "                <a href=\"mailto:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 254, $this->source); })()), "email", [], "any", false, false, false, 254), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm d-block\">
                    <i class=\"fas fa-envelope\"></i> Envoyer un email
                </a>
                ";
            }
            // line 258
            yield "            </div>
        </div>
        ";
        }
        // line 261
        yield "    </div>
</div>

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 14px;
}
.avatar-xl {
    width: 100px;
    height: 100px;
    font-size: 32px;
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
        return "admin/users/show.html.twig";
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
        return array (  622 => 261,  617 => 258,  609 => 254,  607 => 253,  604 => 252,  597 => 248,  593 => 247,  589 => 246,  585 => 245,  580 => 244,  578 => 243,  571 => 239,  564 => 234,  562 => 233,  556 => 229,  550 => 226,  546 => 224,  544 => 223,  541 => 222,  534 => 217,  528 => 214,  524 => 212,  522 => 211,  516 => 208,  498 => 193,  491 => 189,  481 => 182,  474 => 178,  459 => 166,  455 => 165,  449 => 163,  435 => 151,  428 => 146,  426 => 145,  423 => 144,  419 => 142,  408 => 137,  402 => 134,  398 => 133,  394 => 132,  390 => 131,  386 => 129,  383 => 128,  379 => 127,  375 => 125,  373 => 124,  369 => 122,  365 => 120,  354 => 115,  348 => 112,  344 => 111,  340 => 110,  336 => 109,  332 => 107,  329 => 106,  325 => 105,  321 => 103,  319 => 102,  307 => 92,  302 => 90,  298 => 88,  296 => 87,  291 => 84,  287 => 82,  283 => 80,  281 => 79,  274 => 74,  271 => 73,  266 => 72,  262 => 71,  258 => 70,  254 => 69,  250 => 68,  245 => 67,  240 => 66,  236 => 65,  232 => 64,  228 => 63,  225 => 62,  223 => 61,  218 => 58,  210 => 55,  206 => 53,  204 => 52,  196 => 49,  189 => 45,  183 => 42,  168 => 29,  160 => 25,  158 => 24,  152 => 21,  146 => 19,  141 => 16,  128 => 15,  113 => 10,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ user.fullName }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_users_index') }}\">Utilisateurs</a></li>
        <li class=\"breadcrumb-item active\">{{ user.fullName }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0 d-flex align-items-center\">
        <div class=\"avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3\">
            {{ user.firstName|slice(0,1)|upper }}{{ user.lastName|slice(0,1)|upper }}
        </div>
        {{ user.fullName }}
    </h1>
    <div>
        {% if canEdit %}
            <a href=\"{{ path('admin_users_edit', {'id': user.id}) }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-edit\"></i> Modifier
            </a>
        {% endif %}
    </div>
</div>

<div class=\"row\">
    <div class=\"col-md-8\">
        <!-- Informations personnelles -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Informations personnelles</h5>
            </div>
            <div class=\"card-body\">
                <dl class=\"row\">
                    <dt class=\"col-sm-3\">Nom complet :</dt>
                    <dd class=\"col-sm-9\">{{ user.fullName }}</dd>
                    
                    <dt class=\"col-sm-3\">Nom d'utilisateur :</dt>
                    <dd class=\"col-sm-9\">@{{ user.username }}</dd>
                    
                    <dt class=\"col-sm-3\">Email :</dt>
                    <dd class=\"col-sm-9\">
                        <a href=\"mailto:{{ user.email }}\">{{ user.email }}</a>
                    </dd>
                    
                    {% if user.website %}
                    <dt class=\"col-sm-3\">Site web :</dt>
                    <dd class=\"col-sm-9\">
                        <a href=\"{{ user.website }}\" target=\"_blank\" rel=\"noopener\">{{ user.website }}</a>
                    </dd>
                    {% endif %}
                    
                    <dt class=\"col-sm-3\">Rôle :</dt>
                    <dd class=\"col-sm-9\">
                        {% set highestRole = user.highestRole %}
                        <span class=\"badge 
                            {% if highestRole == 'ROLE_ADMIN' %}bg-danger
                            {% elseif highestRole == 'ROLE_EDITOR' %}bg-warning
                            {% elseif highestRole == 'ROLE_AUTHOR' %}bg-info
                            {% elseif highestRole == 'ROLE_CONTRIBUTOR' %}bg-secondary
                            {% else %}bg-light text-dark{% endif %}\">
                            {% if highestRole == 'ROLE_ADMIN' %}Administrateur
                            {% elseif highestRole == 'ROLE_EDITOR' %}Éditeur
                            {% elseif highestRole == 'ROLE_AUTHOR' %}Auteur
                            {% elseif highestRole == 'ROLE_CONTRIBUTOR' %}Contributeur
                            {% elseif highestRole == 'ROLE_SUBSCRIBER' %}Abonné
                            {% else %}Utilisateur{% endif %}
                        </span>
                    </dd>
                    
                    <dt class=\"col-sm-3\">Statut :</dt>
                    <dd class=\"col-sm-9\">
                        {% if user.isActive %}
                            <span class=\"badge bg-success\">Actif</span>
                        {% else %}
                            <span class=\"badge bg-danger\">Inactif</span>
                        {% endif %}
                    </dd>
                </dl>
                
                {% if user.bio %}
                <hr>
                <h6>Biographie</h6>
                <p class=\"text-muted\">{{ user.bio|nl2br }}</p>
                {% endif %}
            </div>
        </div>
        
        <!-- Activité récente -->
        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Activité récente</h5>
            </div>
            <div class=\"card-body\">
                <!-- Articles récents -->
                {% if user.posts|length > 0 %}
                <h6 class=\"mb-3\">Articles récents</h6>
                <div class=\"list-group list-group-flush mb-4\">
                    {% for post in user.posts|slice(0, 5) %}
                        {% set translation = post.translations|first %}
                        <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                            <div>
                                <h6 class=\"mb-1\">{{ translation ? translation.title : 'Article #' ~ post.id }}</h6>
                                <small class=\"text-muted\">{{ post.createdAt|date('d/m/Y H:i') }}</small>
                                <span class=\"badge {{ post.status == 'published' ? 'bg-success' : 'bg-secondary' }} ms-2\">
                                    {{ post.status == 'published' ? 'Publié' : 'Brouillon' }}
                                </span>
                            </div>
                            <a href=\"{{ path('admin_posts_edit', {'id': post.id}) }}\" class=\"btn btn-sm btn-outline-primary\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                        </div>
                    {% endfor %}
                </div>
                {% endif %}
                
                <!-- Pages récentes -->
                {% if user.pages|length > 0 %}
                <h6 class=\"mb-3\">Pages récentes</h6>
                <div class=\"list-group list-group-flush mb-4\">
                    {% for page in user.pages|slice(0, 5) %}
                        {% set translation = page.translations|first %}
                        <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                            <div>
                                <h6 class=\"mb-1\">{{ translation ? translation.title : 'Page #' ~ page.id }}</h6>
                                <small class=\"text-muted\">{{ page.createdAt|date('d/m/Y H:i') }}</small>
                                <span class=\"badge {{ page.status == 'published' ? 'bg-success' : 'bg-secondary' }} ms-2\">
                                    {{ page.status == 'published' ? 'Publiée' : 'Brouillon' }}
                                </span>
                            </div>
                            <a href=\"{{ path('admin_pages_edit', {'id': page.id}) }}\" class=\"btn btn-sm btn-outline-primary\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                        </div>
                    {% endfor %}
                </div>
                {% endif %}
                
                {% if user.posts|length == 0 and user.pages|length == 0 %}
                <div class=\"text-center py-4\">
                    <i class=\"fas fa-file fa-2x text-muted mb-3\"></i>
                    <p class=\"text-muted\">Aucun contenu créé pour le moment.</p>
                </div>
                {% endif %}
            </div>
        </div>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Avatar -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-user-circle me-1\"></i> Avatar</h6>
            </div>
            <div class=\"card-body text-center\">
                <div class=\"avatar-xl bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3\">
                    {{ user.firstName|slice(0,1)|upper }}{{ user.lastName|slice(0,1)|upper }}
                </div>
                <h5>{{ user.fullName }}</h5>
                <p class=\"text-muted\">@{{ user.username }}</p>
            </div>
        </div>
        
        <!-- Statistiques -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-chart-bar me-1\"></i> Statistiques</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"row text-center\">
                    <div class=\"col-6\">
                        <h4 class=\"text-primary\">{{ user.posts|length }}</h4>
                        <small class=\"text-muted\">Articles</small>
                    </div>
                    <div class=\"col-6\">
                        <h4 class=\"text-secondary\">{{ user.pages|length }}</h4>
                        <small class=\"text-muted\">Pages</small>
                    </div>
                </div>
                <hr>
                <div class=\"row text-center\">
                    <div class=\"col-6\">
                        <h4 class=\"text-info\">{{ user.comments|length }}</h4>
                        <small class=\"text-muted\">Commentaires</small>
                    </div>
                    <div class=\"col-6\">
                        <h4 class=\"text-warning\">{{ user.medias|length }}</h4>
                        <small class=\"text-muted\">Médias</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informations compte -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations compte</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\">
                    <strong>Inscrit le :</strong><br>
                    <small class=\"text-muted\">{{ user.createdAt|date('d/m/Y \\u00e0 H:i') }}</small>
                </p>
                
                {% if user.lastLoginAt %}
                <p class=\"mb-2\">
                    <strong>Dernière connexion :</strong><br>
                    <small class=\"text-muted\">{{ user.lastLoginAt|date('d/m/Y \\u00e0 H:i') }}</small>
                </p>
                {% else %}
                <p class=\"mb-2\">
                    <strong>Dernière connexion :</strong><br>
                    <small class=\"text-muted\">Jamais connecté</small>
                </p>
                {% endif %}
                
                {% if user.updatedAt %}
                <p class=\"mb-0\">
                    <strong>Dernière modification :</strong><br>
                    <small class=\"text-muted\">{{ user.updatedAt|date('d/m/Y \\u00e0 H:i') }}</small>
                </p>
                {% endif %}
            </div>
        </div>
        
        <!-- Actions -->
        {% if canEdit %}
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-tools me-1\"></i> Actions</h6>
            </div>
            <div class=\"card-body\">
                <a href=\"{{ path('admin_users_edit', {'id': user.id}) }}\" class=\"btn btn-primary btn-sm d-block mb-2\">
                    <i class=\"fas fa-edit\"></i> Modifier l'utilisateur
                </a>
                
                {% if user != app.user %}
                <form method=\"post\" action=\"{{ path('admin_users_toggle_status', {'id': user.id}) }}\" class=\"d-inline w-100 mb-2\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('toggle' ~ user.id) }}\">
                    <button type=\"submit\" class=\"btn btn-outline-{{ user.isActive ? 'warning' : 'success' }} btn-sm d-block\">
                        <i class=\"fas fa-{{ user.isActive ? 'pause' : 'play' }}\"></i> 
                        {{ user.isActive ? 'Désactiver' : 'Activer' }} le compte
                    </button>
                </form>
                {% endif %}
                
                {% if user.email %}
                <a href=\"mailto:{{ user.email }}\" class=\"btn btn-outline-secondary btn-sm d-block\">
                    <i class=\"fas fa-envelope\"></i> Envoyer un email
                </a>
                {% endif %}
            </div>
        </div>
        {% endif %}
    </div>
</div>

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 14px;
}
.avatar-xl {
    width: 100px;
    height: 100px;
    font-size: 32px;
}
</style>
{% endblock %}
", "admin/users/show.html.twig", "/workspace/symfpress/templates/admin/users/show.html.twig");
    }
}
