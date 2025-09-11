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

/* admin/users/form.html.twig */
class __TwigTemplate_e4667927b8b55bc62d4bd96da1eeee67 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'utilisateur") : ("Nouvel utilisateur"));
        
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
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvel utilisateur"));
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
        yield "<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">";
        // line 21
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 21, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier l'utilisateur") : ("Nouvel utilisateur"));
        yield "</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"first_name\" class=\"form-label\">Prénom <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"first_name\" name=\"first_name\" 
                                       value=\"";
        // line 29
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "firstName", [], "any", true, true, false, 29) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 29, $this->source); })()), "firstName", [], "any", false, false, false, 29)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 29, $this->source); })()), "firstName", [], "any", false, false, false, 29), "html", null, true)) : (""));
        yield "\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir le prénom.</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"last_name\" class=\"form-label\">Nom <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"last_name\" name=\"last_name\" 
                                       value=\"";
        // line 37
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "lastName", [], "any", true, true, false, 37) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()), "lastName", [], "any", false, false, false, 37)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()), "lastName", [], "any", false, false, false, 37), "html", null, true)) : (""));
        yield "\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir le nom.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"username\" class=\"form-label\">Nom d'utilisateur <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" 
                                       value=\"";
        // line 48
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "username", [], "any", true, true, false, 48) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "username", [], "any", false, false, false, 48)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "username", [], "any", false, false, false, 48), "html", null, true)) : (""));
        yield "\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir un nom d'utilisateur.</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" 
                                       value=\"";
        // line 56
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", true, true, false, 56) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 56, $this->source); })()), "email", [], "any", false, false, false, 56)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 56, $this->source); })()), "email", [], "any", false, false, false, 56), "html", null, true)) : (""));
        yield "\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir une adresse email valide.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"bio\" class=\"form-label\">Biographie</label>
                        <textarea class=\"form-control\" id=\"bio\" name=\"bio\" rows=\"3\">";
        // line 64
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "bio", [], "any", true, true, false, 64) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 64, $this->source); })()), "bio", [], "any", false, false, false, 64)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 64, $this->source); })()), "bio", [], "any", false, false, false, 64), "html", null, true)) : (""));
        yield "</textarea>
                        <div class=\"form-text\">Description courte de l'utilisateur (optionnel).</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"website\" class=\"form-label\">Site web</label>
                        <input type=\"url\" class=\"form-control\" id=\"website\" name=\"website\" 
                               value=\"";
        // line 71
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "website", [], "any", true, true, false, 71) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "website", [], "any", false, false, false, 71)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "website", [], "any", false, false, false, 71), "html", null, true)) : (""));
        yield "\" placeholder=\"https://\">
                        <div class=\"form-text\">URL du site web personnel (optionnel).</div>
                    </div>
                </div>
            </div>
            
            <!-- Mot de passe -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-key me-1\"></i> ";
        // line 80
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 80, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Changer le mot de passe") : ("Mot de passe"));
        yield "</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"password\" class=\"form-label\">
                                    ";
        // line 87
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 87, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Nouveau mot de passe") : ("Mot de passe"));
        yield "
                                    ";
        // line 88
        if ((($tmp =  !(isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 88, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span class=\"text-danger\">*</span>";
        }
        // line 89
        yield "                                </label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" 
                                       ";
        // line 91
        yield (((($tmp =  !(isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 91, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("required") : (""));
        yield " minlength=\"6\">
                                <div class=\"form-text\">";
        // line 92
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 92, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Laissez vide pour ne pas changer") : ("Au moins 6 caractères"));
        yield "</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"password_confirm\" class=\"form-label\">
                                    Confirmer le mot de passe
                                    ";
        // line 99
        if ((($tmp =  !(isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 99, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span class=\"text-danger\">*</span>";
        }
        // line 100
        yield "                                </label>
                                <input type=\"password\" class=\"form-control\" id=\"password_confirm\" name=\"password_confirm\" 
                                       ";
        // line 102
        yield (((($tmp =  !(isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 102, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("required") : (""));
        yield " minlength=\"6\">
                                <div class=\"form-text\">Ressaisissez le mot de passe pour confirmation</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Rôles et permissions -->
            ";
        // line 111
        if ((($tmp = (isset($context["canEditRoles"]) || array_key_exists("canEditRoles", $context) ? $context["canEditRoles"] : (function () { throw new RuntimeError('Variable "canEditRoles" does not exist.', 111, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 112
            yield "            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-user-shield me-1\"></i> Rôles et permissions</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"roles\" class=\"form-label\">Rôle principal</label>
                        <select class=\"form-select\" id=\"roles\" name=\"roles\">
                            ";
            // line 120
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableRoles"]) || array_key_exists("availableRoles", $context) ? $context["availableRoles"] : (function () { throw new RuntimeError('Variable "availableRoles" does not exist.', 120, $this->source); })()));
            foreach ($context['_seq'] as $context["roleValue"] => $context["roleLabel"]) {
                // line 121
                yield "                                <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["roleValue"], "html", null, true);
                yield "\" 
                                        ";
                // line 122
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 122, $this->source); })()), "hasRole", [$context["roleValue"]], "method", false, false, false, 122)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("selected") : (""));
                yield ">
                                    ";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["roleLabel"], "html", null, true);
                yield "
                                </option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['roleValue'], $context['roleLabel'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            yield "                        </select>
                        <div class=\"form-text\">
                            <strong>Abonné</strong> : Lecture seule<br>
                            <strong>Contributeur</strong> : Écriture d'articles en brouillon<br>
                            <strong>Auteur</strong> : Gestion de ses propres articles<br>
                            <strong>Éditeur</strong> : Gestion de tous les contenus<br>
                            <strong>Administrateur</strong> : Accès complet au système
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        // line 138
        yield "            
            <!-- Statut -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-toggle-on me-1\"></i> Statut du compte</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"is_active\" name=\"is_active\" 
                               ";
        // line 147
        yield (((($tmp = (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "isActive", [], "any", true, true, false, 147) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 147, $this->source); })()), "isActive", [], "any", false, false, false, 147)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 147, $this->source); })()), "isActive", [], "any", false, false, false, 147)) : (true))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("checked") : (""));
        yield ">
                        <label class=\"form-check-label\" for=\"is_active\">
                            Compte actif
                        </label>
                        <div class=\"form-text\">Les comptes inactifs ne peuvent pas se connecter.</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"";
        // line 157
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> ";
        // line 161
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 161, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Créer"));
        yield "
                </button>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Avatar -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-user-circle me-1\"></i> Avatar</h6>
            </div>
            <div class=\"card-body text-center\">
                <div class=\"avatar-lg bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3\">
                    ";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "firstName", [], "any", true, true, false, 175) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 175, $this->source); })()), "firstName", [], "any", false, false, false, 175)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 175, $this->source); })()), "firstName", [], "any", false, false, false, 175)) : ("N")), 0, 1)), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "lastName", [], "any", true, true, false, 175) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 175, $this->source); })()), "lastName", [], "any", false, false, false, 175)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 175, $this->source); })()), "lastName", [], "any", false, false, false, 175)) : ("U")), 0, 1)), "html", null, true);
        yield "
                </div>
                <p class=\"text-muted\">Les avatars personnalisés seront disponibles dans une future version.</p>
            </div>
        </div>
        
        <!-- Informations -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                ";
        // line 187
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 187, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 188
            yield "                <p class=\"mb-2\">
                    <strong>Rôle actuel :</strong>
                    ";
            // line 190
            $context["highestRole"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 190, $this->source); })()), "highestRole", [], "any", false, false, false, 190);
            // line 191
            yield "                    <span class=\"badge 
                        ";
            // line 192
            if (((isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 192, $this->source); })()) == "ROLE_ADMIN")) {
                yield "bg-danger
                        ";
            } elseif ((            // line 193
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 193, $this->source); })()) == "ROLE_EDITOR")) {
                yield "bg-warning
                        ";
            } elseif ((            // line 194
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 194, $this->source); })()) == "ROLE_AUTHOR")) {
                yield "bg-info
                        ";
            } elseif ((            // line 195
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 195, $this->source); })()) == "ROLE_CONTRIBUTOR")) {
                yield "bg-secondary
                        ";
            } else {
                // line 196
                yield "bg-light text-dark";
            }
            yield "\">
                        ";
            // line 197
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["availableRoles"] ?? null), (isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 197, $this->source); })()), [], "array", true, true, false, 197) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableRoles"]) || array_key_exists("availableRoles", $context) ? $context["availableRoles"] : (function () { throw new RuntimeError('Variable "availableRoles" does not exist.', 197, $this->source); })()), (isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 197, $this->source); })()), [], "array", false, false, false, 197)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableRoles"]) || array_key_exists("availableRoles", $context) ? $context["availableRoles"] : (function () { throw new RuntimeError('Variable "availableRoles" does not exist.', 197, $this->source); })()), (isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 197, $this->source); })()), [], "array", false, false, false, 197), "html", null, true)) : ("Utilisateur"));
            yield "
                    </span>
                </p>
                <p class=\"mb-2\">
                    <strong>Statut :</strong>
                    ";
            // line 202
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 202, $this->source); })()), "isActive", [], "any", false, false, false, 202)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 203
                yield "                        <span class=\"badge bg-success\">Actif</span>
                    ";
            } else {
                // line 205
                yield "                        <span class=\"badge bg-danger\">Inactif</span>
                    ";
            }
            // line 207
            yield "                </p>
                <hr>
                <p class=\"mb-1\"><strong>Inscrit le :</strong></p>
                <small class=\"text-muted\">";
            // line 210
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 210, $this->source); })()), "createdAt", [], "any", false, false, false, 210), "d/m/Y H:i"), "html", null, true);
            yield "</small>
                ";
            // line 211
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 211, $this->source); })()), "lastLoginAt", [], "any", false, false, false, 211)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 212
                yield "                <p class=\"mb-1 mt-2\"><strong>Dernière connexion :</strong></p>
                <small class=\"text-muted\">";
                // line 213
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 213, $this->source); })()), "lastLoginAt", [], "any", false, false, false, 213), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                ";
            }
            // line 215
            yield "                ";
        } else {
            // line 216
            yield "                <p class=\"text-muted\">Nouvel utilisateur - les informations apparaitront après la création.</p>
                ";
        }
        // line 218
        yield "            </div>
        </div>
        
        ";
        // line 221
        if ((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 221, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 222
            yield "        <!-- Statistiques -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-chart-bar me-1\"></i> Activité</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\">
                    <strong>Articles :</strong> 
                    <span class=\"badge bg-primary\">";
            // line 230
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 230, $this->source); })()), "posts", [], "any", false, false, false, 230)), "html", null, true);
            yield "</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Pages :</strong> 
                    <span class=\"badge bg-secondary\">";
            // line 234
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 234, $this->source); })()), "pages", [], "any", false, false, false, 234)), "html", null, true);
            yield "</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Commentaires :</strong> 
                    <span class=\"badge bg-info\">";
            // line 238
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 238, $this->source); })()), "comments", [], "any", false, false, false, 238)), "html", null, true);
            yield "</span>
                </p>
                <p class=\"mb-0\">
                    <strong>Médias :</strong> 
                    <span class=\"badge bg-warning\">";
            // line 242
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 242, $this->source); })()), "medias", [], "any", false, false, false, 242)), "html", null, true);
            yield "</span>
                </p>
            </div>
        </div>
        ";
        }
        // line 247
        yield "        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Rôles utilisateur</h6>
                <p class=\"small text-muted mb-3\">Chaque rôle accorde des permissions spécifiques. L'administrateur a tous les droits.</p>
                
                <h6>Sécurité</h6>
                <p class=\"small text-muted mb-0\">Utilisez des mots de passe forts et désactivez les comptes inutilisés.</p>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-lg {
    width: 80px;
    height: 80px;
    font-size: 24px;
}
</style>

<script>
// Validation du formulaire
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                // Vérifier la correspondance des mots de passe
                const password = document.getElementById('password');
                const passwordConfirm = document.getElementById('password_confirm');
                
                if (password.value !== passwordConfirm.value) {
                    passwordConfirm.setCustomValidity('Les mots de passe ne correspondent pas');
                } else {
                    passwordConfirm.setCustomValidity('');
                }
                
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Vérification en temps réel des mots de passe
document.getElementById('password_confirm').addEventListener('input', function() {
    const password = document.getElementById('password');
    if (this.value !== password.value) {
        this.setCustomValidity('Les mots de passe ne correspondent pas');
    } else {
        this.setCustomValidity('');
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
        return "admin/users/form.html.twig";
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
        return array (  519 => 247,  511 => 242,  504 => 238,  497 => 234,  490 => 230,  480 => 222,  478 => 221,  473 => 218,  469 => 216,  466 => 215,  461 => 213,  458 => 212,  456 => 211,  452 => 210,  447 => 207,  443 => 205,  439 => 203,  437 => 202,  429 => 197,  424 => 196,  419 => 195,  415 => 194,  411 => 193,  407 => 192,  404 => 191,  402 => 190,  398 => 188,  396 => 187,  380 => 175,  363 => 161,  356 => 157,  343 => 147,  332 => 138,  318 => 126,  309 => 123,  305 => 122,  300 => 121,  296 => 120,  286 => 112,  284 => 111,  272 => 102,  268 => 100,  264 => 99,  254 => 92,  250 => 91,  246 => 89,  242 => 88,  238 => 87,  228 => 80,  216 => 71,  206 => 64,  195 => 56,  184 => 48,  170 => 37,  159 => 29,  148 => 21,  141 => 16,  128 => 15,  113 => 10,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}{{ isEdit ? 'Modifier l\\'utilisateur' : 'Nouvel utilisateur' }}{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_users_index') }}\">Utilisateurs</a></li>
        <li class=\"breadcrumb-item active\">{{ isEdit ? 'Modifier' : 'Nouvel utilisateur' }}</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"row\">
    <div class=\"col-md-8\">
        <form method=\"POST\" class=\"needs-validation\" novalidate>
            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">{{ isEdit ? 'Modifier l\\'utilisateur' : 'Nouvel utilisateur' }}</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"first_name\" class=\"form-label\">Prénom <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"first_name\" name=\"first_name\" 
                                       value=\"{{ user.firstName ?? '' }}\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir le prénom.</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"last_name\" class=\"form-label\">Nom <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"last_name\" name=\"last_name\" 
                                       value=\"{{ user.lastName ?? '' }}\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir le nom.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"username\" class=\"form-label\">Nom d'utilisateur <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" 
                                       value=\"{{ user.username ?? '' }}\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir un nom d'utilisateur.</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" 
                                       value=\"{{ user.email ?? '' }}\" required>
                                <div class=\"invalid-feedback\">Veuillez saisir une adresse email valide.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"bio\" class=\"form-label\">Biographie</label>
                        <textarea class=\"form-control\" id=\"bio\" name=\"bio\" rows=\"3\">{{ user.bio ?? '' }}</textarea>
                        <div class=\"form-text\">Description courte de l'utilisateur (optionnel).</div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"website\" class=\"form-label\">Site web</label>
                        <input type=\"url\" class=\"form-control\" id=\"website\" name=\"website\" 
                               value=\"{{ user.website ?? '' }}\" placeholder=\"https://\">
                        <div class=\"form-text\">URL du site web personnel (optionnel).</div>
                    </div>
                </div>
            </div>
            
            <!-- Mot de passe -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-key me-1\"></i> {{ isEdit ? 'Changer le mot de passe' : 'Mot de passe' }}</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"password\" class=\"form-label\">
                                    {{ isEdit ? 'Nouveau mot de passe' : 'Mot de passe' }}
                                    {% if not isEdit %}<span class=\"text-danger\">*</span>{% endif %}
                                </label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" 
                                       {{ not isEdit ? 'required' : '' }} minlength=\"6\">
                                <div class=\"form-text\">{{ isEdit ? 'Laissez vide pour ne pas changer' : 'Au moins 6 caractères' }}</div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"mb-3\">
                                <label for=\"password_confirm\" class=\"form-label\">
                                    Confirmer le mot de passe
                                    {% if not isEdit %}<span class=\"text-danger\">*</span>{% endif %}
                                </label>
                                <input type=\"password\" class=\"form-control\" id=\"password_confirm\" name=\"password_confirm\" 
                                       {{ not isEdit ? 'required' : '' }} minlength=\"6\">
                                <div class=\"form-text\">Ressaisissez le mot de passe pour confirmation</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Rôles et permissions -->
            {% if canEditRoles %}
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-user-shield me-1\"></i> Rôles et permissions</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"mb-3\">
                        <label for=\"roles\" class=\"form-label\">Rôle principal</label>
                        <select class=\"form-select\" id=\"roles\" name=\"roles\">
                            {% for roleValue, roleLabel in availableRoles %}
                                <option value=\"{{ roleValue }}\" 
                                        {{ user.hasRole(roleValue) ? 'selected' : '' }}>
                                    {{ roleLabel }}
                                </option>
                            {% endfor %}
                        </select>
                        <div class=\"form-text\">
                            <strong>Abonné</strong> : Lecture seule<br>
                            <strong>Contributeur</strong> : Écriture d'articles en brouillon<br>
                            <strong>Auteur</strong> : Gestion de ses propres articles<br>
                            <strong>Éditeur</strong> : Gestion de tous les contenus<br>
                            <strong>Administrateur</strong> : Accès complet au système
                        </div>
                    </div>
                </div>
            </div>
            {% endif %}
            
            <!-- Statut -->
            <div class=\"card mt-4\">
                <div class=\"card-header\">
                    <h6 class=\"mb-0\"><i class=\"fas fa-toggle-on me-1\"></i> Statut du compte</h6>
                </div>
                <div class=\"card-body\">
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"is_active\" name=\"is_active\" 
                               {{ user.isActive ?? true ? 'checked' : '' }}>
                        <label class=\"form-check-label\" for=\"is_active\">
                            Compte actif
                        </label>
                        <div class=\"form-text\">Les comptes inactifs ne peuvent pas se connecter.</div>
                    </div>
                </div>
            </div>
            
            <div class=\"d-flex justify-content-between mt-4\">
                <a href=\"{{ path('admin_users_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> {{ isEdit ? 'Modifier' : 'Créer' }}
                </button>
            </div>
        </form>
    </div>
    
    <div class=\"col-md-4\">
        <!-- Avatar -->
        <div class=\"card\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-user-circle me-1\"></i> Avatar</h6>
            </div>
            <div class=\"card-body text-center\">
                <div class=\"avatar-lg bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3\">
                    {{ (user.firstName ?? 'N')|slice(0,1)|upper }}{{ (user.lastName ?? 'U')|slice(0,1)|upper }}
                </div>
                <p class=\"text-muted\">Les avatars personnalisés seront disponibles dans une future version.</p>
            </div>
        </div>
        
        <!-- Informations -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-info-circle me-1\"></i> Informations</h6>
            </div>
            <div class=\"card-body\">
                {% if isEdit %}
                <p class=\"mb-2\">
                    <strong>Rôle actuel :</strong>
                    {% set highestRole = user.highestRole %}
                    <span class=\"badge 
                        {% if highestRole == 'ROLE_ADMIN' %}bg-danger
                        {% elseif highestRole == 'ROLE_EDITOR' %}bg-warning
                        {% elseif highestRole == 'ROLE_AUTHOR' %}bg-info
                        {% elseif highestRole == 'ROLE_CONTRIBUTOR' %}bg-secondary
                        {% else %}bg-light text-dark{% endif %}\">
                        {{ availableRoles[highestRole] ?? 'Utilisateur' }}
                    </span>
                </p>
                <p class=\"mb-2\">
                    <strong>Statut :</strong>
                    {% if user.isActive %}
                        <span class=\"badge bg-success\">Actif</span>
                    {% else %}
                        <span class=\"badge bg-danger\">Inactif</span>
                    {% endif %}
                </p>
                <hr>
                <p class=\"mb-1\"><strong>Inscrit le :</strong></p>
                <small class=\"text-muted\">{{ user.createdAt|date('d/m/Y H:i') }}</small>
                {% if user.lastLoginAt %}
                <p class=\"mb-1 mt-2\"><strong>Dernière connexion :</strong></p>
                <small class=\"text-muted\">{{ user.lastLoginAt|date('d/m/Y H:i') }}</small>
                {% endif %}
                {% else %}
                <p class=\"text-muted\">Nouvel utilisateur - les informations apparaitront après la création.</p>
                {% endif %}
            </div>
        </div>
        
        {% if isEdit %}
        <!-- Statistiques -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-chart-bar me-1\"></i> Activité</h6>
            </div>
            <div class=\"card-body\">
                <p class=\"mb-2\">
                    <strong>Articles :</strong> 
                    <span class=\"badge bg-primary\">{{ user.posts|length }}</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Pages :</strong> 
                    <span class=\"badge bg-secondary\">{{ user.pages|length }}</span>
                </p>
                <p class=\"mb-2\">
                    <strong>Commentaires :</strong> 
                    <span class=\"badge bg-info\">{{ user.comments|length }}</span>
                </p>
                <p class=\"mb-0\">
                    <strong>Médias :</strong> 
                    <span class=\"badge bg-warning\">{{ user.medias|length }}</span>
                </p>
            </div>
        </div>
        {% endif %}
        
        <!-- Aide -->
        <div class=\"card mt-3\">
            <div class=\"card-header\">
                <h6 class=\"mb-0\"><i class=\"fas fa-question-circle me-1\"></i> Aide</h6>
            </div>
            <div class=\"card-body\">
                <h6>Rôles utilisateur</h6>
                <p class=\"small text-muted mb-3\">Chaque rôle accorde des permissions spécifiques. L'administrateur a tous les droits.</p>
                
                <h6>Sécurité</h6>
                <p class=\"small text-muted mb-0\">Utilisez des mots de passe forts et désactivez les comptes inutilisés.</p>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-lg {
    width: 80px;
    height: 80px;
    font-size: 24px;
}
</style>

<script>
// Validation du formulaire
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                // Vérifier la correspondance des mots de passe
                const password = document.getElementById('password');
                const passwordConfirm = document.getElementById('password_confirm');
                
                if (password.value !== passwordConfirm.value) {
                    passwordConfirm.setCustomValidity('Les mots de passe ne correspondent pas');
                } else {
                    passwordConfirm.setCustomValidity('');
                }
                
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Vérification en temps réel des mots de passe
document.getElementById('password_confirm').addEventListener('input', function() {
    const password = document.getElementById('password');
    if (this.value !== password.value) {
        this.setCustomValidity('Les mots de passe ne correspondent pas');
    } else {
        this.setCustomValidity('');
    }
});
</script>
{% endblock %}
", "admin/users/form.html.twig", "/workspace/symfpress/templates/admin/users/form.html.twig");
    }
}
