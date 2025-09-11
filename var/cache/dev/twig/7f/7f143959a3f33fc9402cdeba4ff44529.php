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

/* admin/users/index.html.twig */
class __TwigTemplate_af80e6a399f987d483e6e14cf1491cc2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/index.html.twig"));

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

        yield "Utilisateurs";
        
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
        <li class=\"breadcrumb-item active\">Utilisateurs</li>
    </ol>
</nav>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 14
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

        // line 15
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0\">Utilisateurs</h1>
    <div>
        <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_new");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvel utilisateur
        </a>
    </div>
</div>

<!-- Statistiques -->
<div class=\"row mb-4\">
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-primary\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 29, $this->source); })()), "total", [], "any", false, false, false, 29), "html", null, true);
        yield "</h3>
                <p class=\"mb-0\">Total</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-success\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 37, $this->source); })()), "active", [], "any", false, false, false, 37), "html", null, true);
        yield "</h3>
                <p class=\"mb-0\">Actifs</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-warning\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 45, $this->source); })()), "inactive", [], "any", false, false, false, 45), "html", null, true);
        yield "</h3>
                <p class=\"mb-0\">Inactifs</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-info\">";
        // line 53
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "by_role", [], "any", false, true, false, 53), "ROLE_ADMIN", [], "array", true, true, false, 53) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 53, $this->source); })()), "by_role", [], "any", false, false, false, 53), "ROLE_ADMIN", [], "array", false, false, false, 53)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 53, $this->source); })()), "by_role", [], "any", false, false, false, 53), "ROLE_ADMIN", [], "array", false, false, false, 53), "html", null, true)) : (0));
        yield "</h3>
                <p class=\"mb-0\">Administrateurs</p>
            </div>
        </div>
    </div>
</div>

<!-- Filtres -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"GET\" class=\"row g-3\">
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Recherche</label>
                <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" 
                       value=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentSearch"]) || array_key_exists("currentSearch", $context) ? $context["currentSearch"] : (function () { throw new RuntimeError('Variable "currentSearch" does not exist.', 67, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Nom, email, username...\">
            </div>
            <div class=\"col-md-3\">
                <label for=\"role\" class=\"form-label\">Rôle</label>
                <select class=\"form-select\" id=\"role\" name=\"role\">
                    <option value=\"\">Tous les rôles</option>
                    ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableRoles"]) || array_key_exists("availableRoles", $context) ? $context["availableRoles"] : (function () { throw new RuntimeError('Variable "availableRoles" does not exist.', 73, $this->source); })()));
        foreach ($context['_seq'] as $context["roleValue"] => $context["roleLabel"]) {
            // line 74
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["roleValue"], "html", null, true);
            yield "\" ";
            yield ((((isset($context["currentRole"]) || array_key_exists("currentRole", $context) ? $context["currentRole"] : (function () { throw new RuntimeError('Variable "currentRole" does not exist.', 74, $this->source); })()) == $context["roleValue"])) ? ("selected") : (""));
            yield ">
                            ";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["roleLabel"], "html", null, true);
            yield "
                        </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['roleValue'], $context['roleLabel'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        yield "                </select>
            </div>
            <div class=\"col-md-3\">
                <label for=\"status\" class=\"form-label\">Statut</label>
                <select class=\"form-select\" id=\"status\" name=\"status\">
                    <option value=\"\">Tous</option>
                    <option value=\"active\" ";
        // line 84
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 84, $this->source); })()) == "active")) ? ("selected") : (""));
        yield ">Actifs</option>
                    <option value=\"inactive\" ";
        // line 85
        yield ((((isset($context["currentStatus"]) || array_key_exists("currentStatus", $context) ? $context["currentStatus"] : (function () { throw new RuntimeError('Variable "currentStatus" does not exist.', 85, $this->source); })()) == "inactive")) ? ("selected") : (""));
        yield ">Inactifs</option>
                </select>
            </div>
            <div class=\"col-md-3 d-flex align-items-end\">
                <button type=\"submit\" class=\"btn btn-outline-primary me-2\">
                    <i class=\"fas fa-search\"></i> Filtrer
                </button>
                <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\">";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 102, $this->source); })())), "html", null, true);
        yield " utilisateur(s)</h5>
    </div>
    <div class=\"card-body p-0\">
        ";
        // line 105
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 105, $this->source); })()))) {
            // line 106
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-users fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun utilisateur</h5>
                <p class=\"text-muted mb-4\">Commencez par créer votre premier utilisateur.</p>
                <a href=\"";
            // line 110
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_new");
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un utilisateur
                </a>
            </div>
        ";
        } else {
            // line 115
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Derniere connexion</th>
                            <th>Inscrit le</th>
                            <th width=\"150\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 129
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 129, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 130
                yield "                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        <div class=\"avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3\">
                                            ";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 134), 0, 1)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 134), 0, 1)), "html", null, true);
                yield "
                                        </div>
                                        <div>
                                            <strong>";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "fullName", [], "any", false, false, false, 137), "html", null, true);
                yield "</strong>
                                            <br><small class=\"text-muted\">@";
                // line 138
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 138), "html", null, true);
                yield "</small>
                                        </div>
                                    </div>
                                </td>
                                <td>";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 142), "html", null, true);
                yield "</td>
                                <td>
                                    ";
                // line 144
                $context["highestRole"] = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "highestRole", [], "any", false, false, false, 144);
                // line 145
                yield "                                    <span class=\"badge 
                                        ";
                // line 146
                if (((isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 146, $this->source); })()) == "ROLE_ADMIN")) {
                    yield "bg-danger
                                        ";
                } elseif ((                // line 147
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 147, $this->source); })()) == "ROLE_EDITOR")) {
                    yield "bg-warning
                                        ";
                } elseif ((                // line 148
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 148, $this->source); })()) == "ROLE_AUTHOR")) {
                    yield "bg-info
                                        ";
                } elseif ((                // line 149
(isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 149, $this->source); })()) == "ROLE_CONTRIBUTOR")) {
                    yield "bg-secondary
                                        ";
                } else {
                    // line 150
                    yield "bg-light text-dark";
                }
                yield "\">
                                        ";
                // line 151
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["availableRoles"] ?? null), (isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 151, $this->source); })()), [], "array", true, true, false, 151) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableRoles"]) || array_key_exists("availableRoles", $context) ? $context["availableRoles"] : (function () { throw new RuntimeError('Variable "availableRoles" does not exist.', 151, $this->source); })()), (isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 151, $this->source); })()), [], "array", false, false, false, 151)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["availableRoles"]) || array_key_exists("availableRoles", $context) ? $context["availableRoles"] : (function () { throw new RuntimeError('Variable "availableRoles" does not exist.', 151, $this->source); })()), (isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 151, $this->source); })()), [], "array", false, false, false, 151), "html", null, true)) : ("Utilisateur"));
                yield "
                                    </span>
                                </td>
                                <td>
                                    ";
                // line 155
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "isActive", [], "any", false, false, false, 155)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 156
                    yield "                                        <span class=\"badge bg-success\">Actif</span>
                                    ";
                } else {
                    // line 158
                    yield "                                        <span class=\"badge bg-danger\">Inactif</span>
                                    ";
                }
                // line 160
                yield "                                </td>
                                <td>
                                    ";
                // line 162
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastLoginAt", [], "any", false, false, false, 162)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 163
                    yield "                                        <small class=\"text-muted\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastLoginAt", [], "any", false, false, false, 163), "d/m/Y H:i"), "html", null, true);
                    yield "</small>
                                    ";
                } else {
                    // line 165
                    yield "                                        <small class=\"text-muted\">Jamais</small>
                                    ";
                }
                // line 167
                yield "                                </td>
                                <td>
                                    <small class=\"text-muted\">";
                // line 169
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "createdAt", [], "any", false, false, false, 169), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                                </td>
                                <td>
                                    <div class=\"btn-group btn-group-sm\" role=\"group\">
                                        <a href=\"";
                // line 173
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 173)]), "html", null, true);
                yield "\" 
                                           class=\"btn btn-outline-primary\" title=\"Voir\">
                                            <i class=\"fas fa-eye\"></i>
                                        </a>
                                        <a href=\"";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 177)]), "html", null, true);
                yield "\" 
                                           class=\"btn btn-outline-secondary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        ";
                // line 181
                if (($context["user"] != CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 181, $this->source); })()), "user", [], "any", false, false, false, 181))) {
                    // line 182
                    yield "                                            <form method=\"post\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_toggle_status", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 182)]), "html", null, true);
                    yield "\" 
                                                  class=\"d-inline\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 184
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("toggle" . CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 184))), "html", null, true);
                    yield "\">
                                                <button type=\"submit\" class=\"btn btn-outline-";
                    // line 185
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "isActive", [], "any", false, false, false, 185)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("warning") : ("success"));
                    yield "\" 
                                                        title=\"";
                    // line 186
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "isActive", [], "any", false, false, false, 186)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Désactiver") : ("Activer"));
                    yield "\">
                                                    <i class=\"fas fa-";
                    // line 187
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "isActive", [], "any", false, false, false, 187)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("pause") : ("play"));
                    yield "\"></i>
                                                </button>
                                            </form>
                                        ";
                }
                // line 191
                yield "                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 195
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 199
        yield "    </div>
</div>

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 14px;
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
        return "admin/users/index.html.twig";
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
        return array (  465 => 199,  459 => 195,  450 => 191,  443 => 187,  439 => 186,  435 => 185,  431 => 184,  425 => 182,  423 => 181,  416 => 177,  409 => 173,  402 => 169,  398 => 167,  394 => 165,  388 => 163,  386 => 162,  382 => 160,  378 => 158,  374 => 156,  372 => 155,  365 => 151,  360 => 150,  355 => 149,  351 => 148,  347 => 147,  343 => 146,  340 => 145,  338 => 144,  333 => 142,  326 => 138,  322 => 137,  315 => 134,  309 => 130,  305 => 129,  289 => 115,  281 => 110,  275 => 106,  273 => 105,  267 => 102,  254 => 92,  244 => 85,  240 => 84,  232 => 78,  223 => 75,  216 => 74,  212 => 73,  203 => 67,  186 => 53,  175 => 45,  164 => 37,  153 => 29,  139 => 18,  134 => 15,  121 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Utilisateurs{% endblock %}

{% block breadcrumb %}
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('admin_dashboard') }}\">Tableau de bord</a></li>
        <li class=\"breadcrumb-item active\">Utilisateurs</li>
    </ol>
</nav>
{% endblock %}

{% block admin_content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h1 class=\"h3 mb-0\">Utilisateurs</h1>
    <div>
        <a href=\"{{ path('admin_users_new') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvel utilisateur
        </a>
    </div>
</div>

<!-- Statistiques -->
<div class=\"row mb-4\">
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-primary\">{{ stats.total }}</h3>
                <p class=\"mb-0\">Total</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-success\">{{ stats.active }}</h3>
                <p class=\"mb-0\">Actifs</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-warning\">{{ stats.inactive }}</h3>
                <p class=\"mb-0\">Inactifs</p>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center\">
            <div class=\"card-body\">
                <h3 class=\"text-info\">{{ stats.by_role['ROLE_ADMIN'] ?? 0 }}</h3>
                <p class=\"mb-0\">Administrateurs</p>
            </div>
        </div>
    </div>
</div>

<!-- Filtres -->
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"GET\" class=\"row g-3\">
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Recherche</label>
                <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" 
                       value=\"{{ currentSearch }}\" placeholder=\"Nom, email, username...\">
            </div>
            <div class=\"col-md-3\">
                <label for=\"role\" class=\"form-label\">Rôle</label>
                <select class=\"form-select\" id=\"role\" name=\"role\">
                    <option value=\"\">Tous les rôles</option>
                    {% for roleValue, roleLabel in availableRoles %}
                        <option value=\"{{ roleValue }}\" {{ currentRole == roleValue ? 'selected' : '' }}>
                            {{ roleLabel }}
                        </option>
                    {% endfor %}
                </select>
            </div>
            <div class=\"col-md-3\">
                <label for=\"status\" class=\"form-label\">Statut</label>
                <select class=\"form-select\" id=\"status\" name=\"status\">
                    <option value=\"\">Tous</option>
                    <option value=\"active\" {{ currentStatus == 'active' ? 'selected' : '' }}>Actifs</option>
                    <option value=\"inactive\" {{ currentStatus == 'inactive' ? 'selected' : '' }}>Inactifs</option>
                </select>
            </div>
            <div class=\"col-md-3 d-flex align-items-end\">
                <button type=\"submit\" class=\"btn btn-outline-primary me-2\">
                    <i class=\"fas fa-search\"></i> Filtrer
                </button>
                <a href=\"{{ path('admin_users_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-times\"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\">{{ users|length }} utilisateur(s)</h5>
    </div>
    <div class=\"card-body p-0\">
        {% if users is empty %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-users fa-3x text-muted mb-3\"></i>
                <h5 class=\"text-muted\">Aucun utilisateur</h5>
                <p class=\"text-muted mb-4\">Commencez par créer votre premier utilisateur.</p>
                <a href=\"{{ path('admin_users_new') }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-plus\"></i> Créer un utilisateur
                </a>
            </div>
        {% else %}
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Derniere connexion</th>
                            <th>Inscrit le</th>
                            <th width=\"150\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for user in users %}
                            <tr>
                                <td>
                                    <div class=\"d-flex align-items-center\">
                                        <div class=\"avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3\">
                                            {{ user.firstName|slice(0,1)|upper }}{{ user.lastName|slice(0,1)|upper }}
                                        </div>
                                        <div>
                                            <strong>{{ user.fullName }}</strong>
                                            <br><small class=\"text-muted\">@{{ user.username }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ user.email }}</td>
                                <td>
                                    {% set highestRole = user.highestRole %}
                                    <span class=\"badge 
                                        {% if highestRole == 'ROLE_ADMIN' %}bg-danger
                                        {% elseif highestRole == 'ROLE_EDITOR' %}bg-warning
                                        {% elseif highestRole == 'ROLE_AUTHOR' %}bg-info
                                        {% elseif highestRole == 'ROLE_CONTRIBUTOR' %}bg-secondary
                                        {% else %}bg-light text-dark{% endif %}\">
                                        {{ availableRoles[highestRole] ?? 'Utilisateur' }}
                                    </span>
                                </td>
                                <td>
                                    {% if user.isActive %}
                                        <span class=\"badge bg-success\">Actif</span>
                                    {% else %}
                                        <span class=\"badge bg-danger\">Inactif</span>
                                    {% endif %}
                                </td>
                                <td>
                                    {% if user.lastLoginAt %}
                                        <small class=\"text-muted\">{{ user.lastLoginAt|date('d/m/Y H:i') }}</small>
                                    {% else %}
                                        <small class=\"text-muted\">Jamais</small>
                                    {% endif %}
                                </td>
                                <td>
                                    <small class=\"text-muted\">{{ user.createdAt|date('d/m/Y H:i') }}</small>
                                </td>
                                <td>
                                    <div class=\"btn-group btn-group-sm\" role=\"group\">
                                        <a href=\"{{ path('admin_users_show', {'id': user.id}) }}\" 
                                           class=\"btn btn-outline-primary\" title=\"Voir\">
                                            <i class=\"fas fa-eye\"></i>
                                        </a>
                                        <a href=\"{{ path('admin_users_edit', {'id': user.id}) }}\" 
                                           class=\"btn btn-outline-secondary\" title=\"Modifier\">
                                            <i class=\"fas fa-edit\"></i>
                                        </a>
                                        {% if user != app.user %}
                                            <form method=\"post\" action=\"{{ path('admin_users_toggle_status', {'id': user.id}) }}\" 
                                                  class=\"d-inline\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('toggle' ~ user.id) }}\">
                                                <button type=\"submit\" class=\"btn btn-outline-{{ user.isActive ? 'warning' : 'success' }}\" 
                                                        title=\"{{ user.isActive ? 'Désactiver' : 'Activer' }}\">
                                                    <i class=\"fas fa-{{ user.isActive ? 'pause' : 'play' }}\"></i>
                                                </button>
                                            </form>
                                        {% endif %}
                                    </div>
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
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
</style>
{% endblock %}
", "admin/users/index.html.twig", "/workspace/symfpress/templates/admin/users/index.html.twig");
    }
}
