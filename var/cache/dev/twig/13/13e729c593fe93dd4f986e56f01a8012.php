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

/* security/login.html.twig */
class __TwigTemplate_98717f471dbf760fd433307e42fd1e60 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Connexion - SymfPress";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .login-header {
            background: #2c3e50;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .login-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .alert {
            border-radius: 8px;
            border: none;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 56
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

        // line 57
        yield "<div class=\"login-container d-flex align-items-center justify-content-center\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-lg-5 col-md-7\">
                <div class=\"login-card\">
                    <div class=\"login-header\">
                        <h2 class=\"mb-0\">
                            <i class=\"fas fa-blog me-2\"></i>
                            SymfPress
                        </h2>
                        <p class=\"mb-0 mt-2 opacity-75\">Administration</p>
                    </div>
                    
                    <div class=\"login-body\">
                        ";
        // line 71
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 71, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 72
            yield "                            <div class=\"alert alert-danger\" role=\"alert\">
                                <i class=\"fas fa-exclamation-triangle me-2\"></i>
                                ";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 74, $this->source); })()), "messageKey", [], "any", false, false, false, 74), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 74, $this->source); })()), "messageData", [], "any", false, false, false, 74), "security"), "html", null, true);
            yield "
                            </div>
                        ";
        }
        // line 77
        yield "                        
                        <form method=\"post\">
                            <div class=\"mb-3\">
                                <label for=\"inputEmail\" class=\"form-label\">
                                    <i class=\"fas fa-envelope me-2\"></i>
                                    Adresse email
                                </label>
                                <input type=\"email\" 
                                       value=\"";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 85, $this->source); })()), "html", null, true);
        yield "\" 
                                       name=\"_username\" 
                                       id=\"inputEmail\" 
                                       class=\"form-control\" 
                                       autocomplete=\"email\" 
                                       required 
                                       autofocus 
                                       placeholder=\"admin@symfpress.local\">
                            </div>
                            
                            <div class=\"mb-3\">
                                <label for=\"inputPassword\" class=\"form-label\">
                                    <i class=\"fas fa-lock me-2\"></i>
                                    Mot de passe
                                </label>
                                <input type=\"password\" 
                                       name=\"_password\" 
                                       id=\"inputPassword\" 
                                       class=\"form-control\" 
                                       autocomplete=\"current-password\" 
                                       required 
                                       placeholder=\"••••••••\">
                            </div>
                            
                            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">
                            
                            <div class=\"mb-3 form-check\">
                                <input type=\"checkbox\" class=\"form-check-input\" id=\"remember_me\" name=\"_remember_me\" checked>
                                <label class=\"form-check-label\" for=\"remember_me\">
                                    Se souvenir de moi
                                </label>
                            </div>
                            
                            <div class=\"d-grid\">
                                <button class=\"btn btn-primary btn-login\" type=\"submit\">
                                    <i class=\"fas fa-sign-in-alt me-2\"></i>
                                    Se connecter
                                </button>
                            </div>
                        </form>
                        
                        <hr class=\"my-4\">
                        
                        <div class=\"text-center\">
                            <small class=\"text-muted\">
                                <a href=\"";
        // line 130
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frontend_home");
        yield "\" class=\"text-decoration-none\">
                                    <i class=\"fas fa-arrow-left me-1\"></i>
                                    Retour au site
                                </a>
                            </small>
                        </div>
                        
                        <!-- Informations de connexion par défaut (à supprimer en production) -->
                        ";
        // line 138
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 138, $this->source); })()), "environment", [], "any", false, false, false, 138) == "dev")) {
            // line 139
            yield "                            <div class=\"mt-4 p-3 bg-light rounded\">
                                <h6 class=\"text-muted mb-2\">
                                    <i class=\"fas fa-info-circle me-1\"></i>
                                    Connexion par défaut (développement)
                                </h6>
                                <small class=\"text-muted\">
                                    <strong>Email :</strong> admin@symfpress.local<br>
                                    <strong>Mot de passe :</strong> admin123
                                </small>
                            </div>
                        ";
        }
        // line 150
        yield "                    </div>
                </div>
                
                <div class=\"text-center mt-4\">
                    <small class=\"text-white-50\">
                        &copy; ";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " SymfPress - Propulsé par Symfony ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::constant("Symfony\\Component\\HttpKernel\\Kernel::VERSION"), "html", null, true);
        yield "
                    </small>
                </div>
            </div>
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
        return "security/login.html.twig";
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
        return array (  297 => 155,  290 => 150,  277 => 139,  275 => 138,  264 => 130,  240 => 109,  213 => 85,  203 => 77,  197 => 74,  193 => 72,  191 => 71,  175 => 57,  162 => 56,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Connexion - SymfPress{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .login-header {
            background: #2c3e50;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .login-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .alert {
            border-radius: 8px;
            border: none;
        }
    </style>
{% endblock %}

{% block body %}
<div class=\"login-container d-flex align-items-center justify-content-center\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-lg-5 col-md-7\">
                <div class=\"login-card\">
                    <div class=\"login-header\">
                        <h2 class=\"mb-0\">
                            <i class=\"fas fa-blog me-2\"></i>
                            SymfPress
                        </h2>
                        <p class=\"mb-0 mt-2 opacity-75\">Administration</p>
                    </div>
                    
                    <div class=\"login-body\">
                        {% if error %}
                            <div class=\"alert alert-danger\" role=\"alert\">
                                <i class=\"fas fa-exclamation-triangle me-2\"></i>
                                {{ error.messageKey|trans(error.messageData, 'security') }}
                            </div>
                        {% endif %}
                        
                        <form method=\"post\">
                            <div class=\"mb-3\">
                                <label for=\"inputEmail\" class=\"form-label\">
                                    <i class=\"fas fa-envelope me-2\"></i>
                                    Adresse email
                                </label>
                                <input type=\"email\" 
                                       value=\"{{ last_username }}\" 
                                       name=\"_username\" 
                                       id=\"inputEmail\" 
                                       class=\"form-control\" 
                                       autocomplete=\"email\" 
                                       required 
                                       autofocus 
                                       placeholder=\"admin@symfpress.local\">
                            </div>
                            
                            <div class=\"mb-3\">
                                <label for=\"inputPassword\" class=\"form-label\">
                                    <i class=\"fas fa-lock me-2\"></i>
                                    Mot de passe
                                </label>
                                <input type=\"password\" 
                                       name=\"_password\" 
                                       id=\"inputPassword\" 
                                       class=\"form-control\" 
                                       autocomplete=\"current-password\" 
                                       required 
                                       placeholder=\"••••••••\">
                            </div>
                            
                            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
                            
                            <div class=\"mb-3 form-check\">
                                <input type=\"checkbox\" class=\"form-check-input\" id=\"remember_me\" name=\"_remember_me\" checked>
                                <label class=\"form-check-label\" for=\"remember_me\">
                                    Se souvenir de moi
                                </label>
                            </div>
                            
                            <div class=\"d-grid\">
                                <button class=\"btn btn-primary btn-login\" type=\"submit\">
                                    <i class=\"fas fa-sign-in-alt me-2\"></i>
                                    Se connecter
                                </button>
                            </div>
                        </form>
                        
                        <hr class=\"my-4\">
                        
                        <div class=\"text-center\">
                            <small class=\"text-muted\">
                                <a href=\"{{ path('frontend_home') }}\" class=\"text-decoration-none\">
                                    <i class=\"fas fa-arrow-left me-1\"></i>
                                    Retour au site
                                </a>
                            </small>
                        </div>
                        
                        <!-- Informations de connexion par défaut (à supprimer en production) -->
                        {% if app.environment == 'dev' %}
                            <div class=\"mt-4 p-3 bg-light rounded\">
                                <h6 class=\"text-muted mb-2\">
                                    <i class=\"fas fa-info-circle me-1\"></i>
                                    Connexion par défaut (développement)
                                </h6>
                                <small class=\"text-muted\">
                                    <strong>Email :</strong> admin@symfpress.local<br>
                                    <strong>Mot de passe :</strong> admin123
                                </small>
                            </div>
                        {% endif %}
                    </div>
                </div>
                
                <div class=\"text-center mt-4\">
                    <small class=\"text-white-50\">
                        &copy; {{ 'now'|date('Y') }} SymfPress - Propulsé par Symfony {{ constant('Symfony\\\\Component\\\\HttpKernel\\\\Kernel::VERSION') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "security/login.html.twig", "/workspace/symfpress/templates/security/login.html.twig");
    }
}
