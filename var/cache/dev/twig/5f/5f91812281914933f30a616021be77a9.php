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

/* frontend/base.html.twig */
class __TwigTemplate_256f58831e114a3520dc4e542a79ba1f extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'meta' => [$this, 'block_meta'],
            'meta_description' => [$this, 'block_meta_description'],
            'meta_keywords' => [$this, 'block_meta_keywords'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"";
        // line 2
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2, $this->source); })()), "request", [], "any", false, false, false, 2), "locale", [], "any", false, false, false, 2), "html", null, true);
        yield "\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    
    ";
        // line 8
        yield from $this->unwrap()->yieldBlock('meta', $context, $blocks);
        // line 12
        yield "    
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/app.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    
    ";
        // line 17
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 43
        yield "</head>
<body>
    <!-- Navigation -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-white border-bottom\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_home");
        yield "\">
                <i class=\"fas fa-blog text-primary me-2\"></i>
                SymfPress
            </a>
            
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav me-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 60
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 60, $this->source); })()), "request", [], "any", false, false, false, 60), "get", ["_route"], "method", false, false, false, 60) == "frontend_home")) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_home");
        yield "\">
                            Accueil
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link ";
        // line 65
        yield (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 65, $this->source); })()), "request", [], "any", false, false, false, 65), "get", ["_route"], "method", false, false, false, 65)) && is_string($_v1 = "frontend_posts") && str_starts_with($_v0, $_v1))) ? ("active") : (""));
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts");
        yield "\">
                            Articles
                        </a>
                    </li>
                    <!-- TODO: Menu dynamique depuis la base de données -->
                </ul>
                
                <div class=\"d-flex align-items-center\">
                    <!-- Recherche -->
                    <form class=\"d-flex me-3\" action=\"";
        // line 74
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_search");
        yield "\" method=\"GET\">
                        <input class=\"form-control form-control-sm\" type=\"search\" name=\"q\" placeholder=\"Rechercher...\" 
                               value=\"";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "request", [], "any", false, false, false, 76), "query", [], "any", false, false, false, 76), "get", ["q"], "method", false, false, false, 76), "html", null, true);
        yield "\">
                        <button class=\"btn btn-outline-primary btn-sm ms-1\" type=\"submit\">
                            <i class=\"fas fa-search\"></i>
                        </button>
                    </form>
                    
                    <!-- Sélecteur de langue -->
                    ";
        // line 83
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "user", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 84
            yield "                        <div class=\"dropdown\">
                            <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                                <i class=\"fas fa-user me-1\"></i>
                                ";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 87, $this->source); })()), "user", [], "any", false, false, false, 87), "displayName", [], "any", false, false, false, 87), "html", null, true);
            yield "
                            </button>
                            <ul class=\"dropdown-menu dropdown-menu-end\">
                                ";
            // line 90
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_AUTHOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 91
                yield "                                    <li><a class=\"dropdown-item\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
                yield "\">Administration</a></li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                ";
            }
            // line 94
            yield "                                <li><a class=\"dropdown-item\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">Déconnexion</a></li>
                            </ul>
                        </div>
                    ";
        } else {
            // line 98
            yield "                        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-sign-in-alt me-1\"></i>
                            Connexion
                        </a>
                    ";
        }
        // line 103
        yield "                </div>
            </div>
        </div>
    </nav>
    
    <!-- Contenu principal -->
    <main>
        ";
        // line 110
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 111
        yield "    </main>
    
    <!-- Footer -->
    <footer class=\"footer mt-5 py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-4 mb-4\">
                    <h5>SymfPress</h5>
                    <p class=\"mb-0\">Un CMS moderne et multilingue basé sur Symfony.</p>
                </div>
                <div class=\"col-lg-4 mb-4\">
                    <h6>Liens rapides</h6>
                    <ul class=\"list-unstyled\">
                        <li><a href=\"";
        // line 124
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_home");
        yield "\" class=\"text-light text-decoration-none\">Accueil</a></li>
                        <li><a href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_posts");
        yield "\" class=\"text-light text-decoration-none\">Articles</a></li>
                        <li><a href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_sitemap");
        yield "\" class=\"text-light text-decoration-none\">Plan du site</a></li>
                        <li><a href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_rss");
        yield "\" class=\"text-light text-decoration-none\">RSS</a></li>
                    </ul>
                </div>
                <div class=\"col-lg-4 mb-4\">
                    <h6>Suivez-nous</h6>
                    <div>
                        <a href=\"#\" class=\"text-light me-3\"><i class=\"fab fa-facebook-f\"></i></a>
                        <a href=\"#\" class=\"text-light me-3\"><i class=\"fab fa-twitter\"></i></a>
                        <a href=\"#\" class=\"text-light me-3\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#\" class=\"text-light\"><i class=\"fab fa-instagram\"></i></a>
                    </div>
                </div>
            </div>
            <hr class=\"my-4\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-6\">
                    <p class=\"mb-0\">&copy; ";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " SymfPress. Tous droits réservés.</p>
                </div>
                <div class=\"col-lg-6 text-lg-end\">
                    <p class=\"mb-0\">Propulsé par <strong>Symfony 7.3</strong></p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/app.js"), "html", null, true);
        yield "\"></script>
    
    ";
        // line 155
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 156
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "SymfPress - CMS Multilingue";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta"));

        // line 9
        yield "        <meta name=\"description\" content=\"";
        yield from $this->unwrap()->yieldBlock('meta_description', $context, $blocks);
        yield "\">
        <meta name=\"keywords\" content=\"";
        // line 10
        yield from $this->unwrap()->yieldBlock('meta_keywords', $context, $blocks);
        yield "\">
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        yield "SymfPress - Système de gestion de contenu multilingue";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_keywords(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_keywords"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_keywords"));

        yield "cms, symfony, multilingue";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 17
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

        // line 18
        yield "        <style>
            .navbar-brand {
                font-weight: bold;
                font-size: 1.5rem;
            }
            .post-card {
                transition: transform 0.2s;
                height: 100%;
            }
            .post-card:hover {
                transform: translateY(-5px);
            }
            .post-meta {
                font-size: 0.9rem;
                color: #6c757d;
            }
            .footer {
                background-color: #2c3e50;
                color: white;
            }
            .btn-outline-primary:hover {
                transform: translateY(-1px);
            }
        </style>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 110
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 155
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "frontend/base.html.twig";
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
        return array (  443 => 155,  421 => 110,  386 => 18,  373 => 17,  350 => 10,  327 => 9,  314 => 10,  309 => 9,  296 => 8,  273 => 6,  261 => 156,  259 => 155,  254 => 153,  241 => 143,  222 => 127,  218 => 126,  214 => 125,  210 => 124,  195 => 111,  193 => 110,  184 => 103,  175 => 98,  167 => 94,  160 => 91,  158 => 90,  152 => 87,  147 => 84,  145 => 83,  135 => 76,  130 => 74,  116 => 65,  106 => 60,  91 => 48,  84 => 43,  82 => 17,  77 => 15,  72 => 12,  70 => 8,  65 => 6,  58 => 2,  55 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"{{ app.request.locale }}\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}SymfPress - CMS Multilingue{% endblock %}</title>
    
    {% block meta %}
        <meta name=\"description\" content=\"{% block meta_description %}SymfPress - Système de gestion de contenu multilingue{% endblock %}\">
        <meta name=\"keywords\" content=\"{% block meta_keywords %}cms, symfony, multilingue{% endblock %}\">
    {% endblock %}
    
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"{{ asset('build/app.css') }}\" rel=\"stylesheet\">
    
    {% block stylesheets %}
        <style>
            .navbar-brand {
                font-weight: bold;
                font-size: 1.5rem;
            }
            .post-card {
                transition: transform 0.2s;
                height: 100%;
            }
            .post-card:hover {
                transform: translateY(-5px);
            }
            .post-meta {
                font-size: 0.9rem;
                color: #6c757d;
            }
            .footer {
                background-color: #2c3e50;
                color: white;
            }
            .btn-outline-primary:hover {
                transform: translateY(-1px);
            }
        </style>
    {% endblock %}
</head>
<body>
    <!-- Navigation -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-white border-bottom\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"{{ path('frontend_home') }}\">
                <i class=\"fas fa-blog text-primary me-2\"></i>
                SymfPress
            </a>
            
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav me-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') == 'frontend_home' ? 'active' : '' }}\" href=\"{{ path('frontend_home') }}\">
                            Accueil
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link {{ app.request.get('_route') starts with 'frontend_posts' ? 'active' : '' }}\" href=\"{{ path('frontend_posts') }}\">
                            Articles
                        </a>
                    </li>
                    <!-- TODO: Menu dynamique depuis la base de données -->
                </ul>
                
                <div class=\"d-flex align-items-center\">
                    <!-- Recherche -->
                    <form class=\"d-flex me-3\" action=\"{{ path('frontend_search') }}\" method=\"GET\">
                        <input class=\"form-control form-control-sm\" type=\"search\" name=\"q\" placeholder=\"Rechercher...\" 
                               value=\"{{ app.request.query.get('q') }}\">
                        <button class=\"btn btn-outline-primary btn-sm ms-1\" type=\"submit\">
                            <i class=\"fas fa-search\"></i>
                        </button>
                    </form>
                    
                    <!-- Sélecteur de langue -->
                    {% if app.user %}
                        <div class=\"dropdown\">
                            <button class=\"btn btn-outline-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\">
                                <i class=\"fas fa-user me-1\"></i>
                                {{ app.user.displayName }}
                            </button>
                            <ul class=\"dropdown-menu dropdown-menu-end\">
                                {% if is_granted('ROLE_AUTHOR') %}
                                    <li><a class=\"dropdown-item\" href=\"{{ path('admin_dashboard') }}\">Administration</a></li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                {% endif %}
                                <li><a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                            </ul>
                        </div>
                    {% else %}
                        <a href=\"{{ path('app_login') }}\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-sign-in-alt me-1\"></i>
                            Connexion
                        </a>
                    {% endif %}
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Contenu principal -->
    <main>
        {% block content %}{% endblock %}
    </main>
    
    <!-- Footer -->
    <footer class=\"footer mt-5 py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-4 mb-4\">
                    <h5>SymfPress</h5>
                    <p class=\"mb-0\">Un CMS moderne et multilingue basé sur Symfony.</p>
                </div>
                <div class=\"col-lg-4 mb-4\">
                    <h6>Liens rapides</h6>
                    <ul class=\"list-unstyled\">
                        <li><a href=\"{{ path('frontend_home') }}\" class=\"text-light text-decoration-none\">Accueil</a></li>
                        <li><a href=\"{{ path('frontend_posts') }}\" class=\"text-light text-decoration-none\">Articles</a></li>
                        <li><a href=\"{{ path('frontend_sitemap') }}\" class=\"text-light text-decoration-none\">Plan du site</a></li>
                        <li><a href=\"{{ path('frontend_rss') }}\" class=\"text-light text-decoration-none\">RSS</a></li>
                    </ul>
                </div>
                <div class=\"col-lg-4 mb-4\">
                    <h6>Suivez-nous</h6>
                    <div>
                        <a href=\"#\" class=\"text-light me-3\"><i class=\"fab fa-facebook-f\"></i></a>
                        <a href=\"#\" class=\"text-light me-3\"><i class=\"fab fa-twitter\"></i></a>
                        <a href=\"#\" class=\"text-light me-3\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#\" class=\"text-light\"><i class=\"fab fa-instagram\"></i></a>
                    </div>
                </div>
            </div>
            <hr class=\"my-4\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-6\">
                    <p class=\"mb-0\">&copy; {{ 'now'|date('Y') }} SymfPress. Tous droits réservés.</p>
                </div>
                <div class=\"col-lg-6 text-lg-end\">
                    <p class=\"mb-0\">Propulsé par <strong>Symfony 7.3</strong></p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"{{ asset('build/app.js') }}\"></script>
    
    {% block javascripts %}{% endblock %}
</body>
</html>", "frontend/base.html.twig", "/workspace/symfpress/templates/frontend/base.html.twig");
    }
}
