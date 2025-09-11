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

/* admin/extensions/plugins/index.html.twig */
class __TwigTemplate_03817ef19577d1265301ff177473fd5e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/extensions/plugins/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/extensions/plugins/index.html.twig"));

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

        yield "Plugins";
        
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
        yield "<div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
    <h1 class=\"h3 mb-0 text-gray-800\">
        <i class=\"fas fa-puzzle-piece me-2\"></i>
        Gestion des Plugins
    </h1>
    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadPluginModal\">
        <i class=\"fas fa-upload me-2\"></i>
        Installer un Plugin
    </button>
</div>

<!-- Statistiques des plugins -->
<div class=\"row mb-4\">
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                            Plugins Chargés
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["loadedPlugins"]) || array_key_exists("loadedPlugins", $context) ? $context["loadedPlugins"] : (function () { throw new RuntimeError('Variable "loadedPlugins" does not exist.', 27, $this->source); })())), "html", null, true);
        yield "</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-download fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-success shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">
                            Plugins Actifs
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["activePlugins"]) || array_key_exists("activePlugins", $context) ? $context["activePlugins"] : (function () { throw new RuntimeError('Variable "activePlugins" does not exist.', 45, $this->source); })())), "html", null, true);
        yield "</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-check-circle fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des plugins -->
<div class=\"card shadow mb-4\">
    <div class=\"card-header py-3\">
        <h6 class=\"m-0 font-weight-bold text-primary\">Plugins Disponibles</h6>
    </div>
    <div class=\"card-body\">
        ";
        // line 62
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["loadedPlugins"]) || array_key_exists("loadedPlugins", $context) ? $context["loadedPlugins"] : (function () { throw new RuntimeError('Variable "loadedPlugins" does not exist.', 62, $this->source); })())) > 0)) {
            // line 63
            yield "            <div class=\"row\">
                ";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["loadedPlugins"]) || array_key_exists("loadedPlugins", $context) ? $context["loadedPlugins"] : (function () { throw new RuntimeError('Variable "loadedPlugins" does not exist.', 64, $this->source); })()));
            foreach ($context['_seq'] as $context["pluginName"] => $context["plugin"]) {
                // line 65
                yield "                    ";
                $context["metadata"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["pluginMetadata"] ?? null), $context["pluginName"], [], "array", true, true, false, 65) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["pluginMetadata"]) || array_key_exists("pluginMetadata", $context) ? $context["pluginMetadata"] : (function () { throw new RuntimeError('Variable "pluginMetadata" does not exist.', 65, $this->source); })()), $context["pluginName"], [], "array", false, false, false, 65)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pluginMetadata"]) || array_key_exists("pluginMetadata", $context) ? $context["pluginMetadata"] : (function () { throw new RuntimeError('Variable "pluginMetadata" does not exist.', 65, $this->source); })()), $context["pluginName"], [], "array", false, false, false, 65)) : ([]));
                // line 66
                yield "                    ";
                $context["isActive"] = CoreExtension::inFilter($context["pluginName"], Twig\Extension\CoreExtension::keys((isset($context["activePlugins"]) || array_key_exists("activePlugins", $context) ? $context["activePlugins"] : (function () { throw new RuntimeError('Variable "activePlugins" does not exist.', 66, $this->source); })())));
                // line 67
                yield "                    
                    <div class=\"col-lg-6 col-xl-4 mb-4\">
                        <div class=\"card h-100 ";
                // line 69
                yield (((($tmp = (isset($context["isActive"]) || array_key_exists("isActive", $context) ? $context["isActive"] : (function () { throw new RuntimeError('Variable "isActive" does not exist.', 69, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("border-success") : ("border-secondary"));
                yield "\">
                            <div class=\"card-body\">
                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                    <h5 class=\"card-title\">";
                // line 72
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "name", [], "any", true, true, false, 72) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 72, $this->source); })()), "name", [], "any", false, false, false, 72)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 72, $this->source); })()), "name", [], "any", false, false, false, 72), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["pluginName"]), "html", null, true)));
                yield "</h5>
                                    ";
                // line 73
                if ((($tmp = (isset($context["isActive"]) || array_key_exists("isActive", $context) ? $context["isActive"] : (function () { throw new RuntimeError('Variable "isActive" does not exist.', 73, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 74
                    yield "                                        <span class=\"badge bg-success\">Actif</span>
                                    ";
                } else {
                    // line 76
                    yield "                                        <span class=\"badge bg-secondary\">Inactif</span>
                                    ";
                }
                // line 78
                yield "                                </div>
                                
                                <p class=\"card-text text-muted small\">
                                    ";
                // line 81
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "description", [], "any", true, true, false, 81) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 81, $this->source); })()), "description", [], "any", false, false, false, 81)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 81, $this->source); })()), "description", [], "any", false, false, false, 81), "html", null, true)) : ("Aucune description disponible"));
                yield "
                                </p>
                                
                                ";
                // line 84
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "version", [], "any", true, true, false, 84)) {
                    // line 85
                    yield "                                    <p class=\"card-text\">
                                        <small class=\"text-muted\">Version: ";
                    // line 86
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 86, $this->source); })()), "version", [], "any", false, false, false, 86), "html", null, true);
                    yield "</small>
                                    </p>
                                ";
                }
                // line 89
                yield "                                
                                ";
                // line 90
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["metadata"] ?? null), "author", [], "any", true, true, false, 90)) {
                    // line 91
                    yield "                                    <p class=\"card-text\">
                                        <small class=\"text-muted\">Auteur: ";
                    // line 92
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 92, $this->source); })()), "author", [], "any", false, false, false, 92), "html", null, true);
                    yield "</small>
                                    </p>
                                ";
                }
                // line 95
                yield "                            </div>
                            
                            <div class=\"card-footer bg-transparent\">
                                <div class=\"btn-group w-100\" role=\"group\">
                                    ";
                // line 99
                if ((($tmp = (isset($context["isActive"]) || array_key_exists("isActive", $context) ? $context["isActive"] : (function () { throw new RuntimeError('Variable "isActive" does not exist.', 99, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 100
                    yield "                                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_plugins_deactivate", ["pluginName" => $context["pluginName"]]), "html", null, true);
                    yield "\" 
                                           class=\"btn btn-warning btn-sm\"
                                           onclick=\"return confirm('Êtes-vous sûr de vouloir désactiver ce plugin ?')\">
                                            <i class=\"fas fa-pause me-1\"></i>
                                            Désactiver
                                        </a>
                                    ";
                } else {
                    // line 107
                    yield "                                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_plugins_activate", ["pluginName" => $context["pluginName"]]), "html", null, true);
                    yield "\" 
                                           class=\"btn btn-success btn-sm\">
                                            <i class=\"fas fa-play me-1\"></i>
                                            Activer
                                        </a>
                                    ";
                }
                // line 113
                yield "                                    
                                    <a href=\"";
                // line 114
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_plugins_uninstall", ["pluginName" => $context["pluginName"]]), "html", null, true);
                yield "\" 
                                       class=\"btn btn-danger btn-sm\"
                                       onclick=\"return confirm('Êtes-vous sûr de vouloir désinstaller ce plugin ? Cette action est irréversible.')\">
                                        <i class=\"fas fa-trash me-1\"></i>
                                        Désinstaller
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['pluginName'], $context['plugin'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            yield "            </div>
        ";
        } else {
            // line 127
            yield "            <div class=\"text-center py-5\">
                <i class=\"fas fa-puzzle-piece fa-3x text-gray-300 mb-3\"></i>
                <h5 class=\"text-gray-600\">Aucun plugin installé</h5>
                <p class=\"text-gray-500\">Commencez par installer votre premier plugin.</p>
            </div>
        ";
        }
        // line 133
        yield "    </div>
</div>

<!-- Modal d'upload de plugin -->
<div class=\"modal fade\" id=\"uploadPluginModal\" tabindex=\"-1\" aria-labelledby=\"uploadPluginModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"uploadPluginModalLabel\">
                    <i class=\"fas fa-upload me-2\"></i>
                    Installer un Plugin
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            
            <form action=\"";
        // line 148
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_plugins_upload");
        yield "\" method=\"POST\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"mb-3\">
                        <label for=\"plugin_file\" class=\"form-label\">Fichier Plugin (.zip)</label>
                        <input type=\"file\" class=\"form-control\" id=\"plugin_file\" name=\"plugin_file\" accept=\".zip\" required>
                        <div class=\"form-text\">
                            Sélectionnez un fichier ZIP contenant le plugin à installer.
                        </div>
                    </div>
                    
                    <div class=\"alert alert-info\">
                        <i class=\"fas fa-info-circle me-2\"></i>
                        <strong>Instructions :</strong>
                        <ul class=\"mb-0 mt-2\">
                            <li>Le fichier doit être un archive ZIP</li>
                            <li>Le plugin doit contenir un fichier plugin.yaml</li>
                            <li>La classe principale doit implémenter PluginInterface</li>
                        </ul>
                    </div>
                </div>
                
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-upload me-2\"></i>
                        Installer
                    </button>
                </div>
            </form>
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
        return "admin/extensions/plugins/index.html.twig";
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
        return array (  317 => 148,  300 => 133,  292 => 127,  288 => 125,  271 => 114,  268 => 113,  258 => 107,  247 => 100,  245 => 99,  239 => 95,  233 => 92,  230 => 91,  228 => 90,  225 => 89,  219 => 86,  216 => 85,  214 => 84,  208 => 81,  203 => 78,  199 => 76,  195 => 74,  193 => 73,  189 => 72,  183 => 69,  179 => 67,  176 => 66,  173 => 65,  169 => 64,  166 => 63,  164 => 62,  144 => 45,  123 => 27,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Plugins{% endblock %}

{% block body %}
<div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
    <h1 class=\"h3 mb-0 text-gray-800\">
        <i class=\"fas fa-puzzle-piece me-2\"></i>
        Gestion des Plugins
    </h1>
    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadPluginModal\">
        <i class=\"fas fa-upload me-2\"></i>
        Installer un Plugin
    </button>
</div>

<!-- Statistiques des plugins -->
<div class=\"row mb-4\">
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                            Plugins Chargés
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ loadedPlugins|length }}</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-download fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-success shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">
                            Plugins Actifs
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ activePlugins|length }}</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"fas fa-check-circle fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des plugins -->
<div class=\"card shadow mb-4\">
    <div class=\"card-header py-3\">
        <h6 class=\"m-0 font-weight-bold text-primary\">Plugins Disponibles</h6>
    </div>
    <div class=\"card-body\">
        {% if loadedPlugins|length > 0 %}
            <div class=\"row\">
                {% for pluginName, plugin in loadedPlugins %}
                    {% set metadata = pluginMetadata[pluginName] ?? {} %}
                    {% set isActive = pluginName in activePlugins|keys %}
                    
                    <div class=\"col-lg-6 col-xl-4 mb-4\">
                        <div class=\"card h-100 {{ isActive ? 'border-success' : 'border-secondary' }}\">
                            <div class=\"card-body\">
                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                    <h5 class=\"card-title\">{{ metadata.name ?? pluginName|title }}</h5>
                                    {% if isActive %}
                                        <span class=\"badge bg-success\">Actif</span>
                                    {% else %}
                                        <span class=\"badge bg-secondary\">Inactif</span>
                                    {% endif %}
                                </div>
                                
                                <p class=\"card-text text-muted small\">
                                    {{ metadata.description ?? 'Aucune description disponible' }}
                                </p>
                                
                                {% if metadata.version is defined %}
                                    <p class=\"card-text\">
                                        <small class=\"text-muted\">Version: {{ metadata.version }}</small>
                                    </p>
                                {% endif %}
                                
                                {% if metadata.author is defined %}
                                    <p class=\"card-text\">
                                        <small class=\"text-muted\">Auteur: {{ metadata.author }}</small>
                                    </p>
                                {% endif %}
                            </div>
                            
                            <div class=\"card-footer bg-transparent\">
                                <div class=\"btn-group w-100\" role=\"group\">
                                    {% if isActive %}
                                        <a href=\"{{ path('admin_plugins_deactivate', {'pluginName': pluginName}) }}\" 
                                           class=\"btn btn-warning btn-sm\"
                                           onclick=\"return confirm('Êtes-vous sûr de vouloir désactiver ce plugin ?')\">
                                            <i class=\"fas fa-pause me-1\"></i>
                                            Désactiver
                                        </a>
                                    {% else %}
                                        <a href=\"{{ path('admin_plugins_activate', {'pluginName': pluginName}) }}\" 
                                           class=\"btn btn-success btn-sm\">
                                            <i class=\"fas fa-play me-1\"></i>
                                            Activer
                                        </a>
                                    {% endif %}
                                    
                                    <a href=\"{{ path('admin_plugins_uninstall', {'pluginName': pluginName}) }}\" 
                                       class=\"btn btn-danger btn-sm\"
                                       onclick=\"return confirm('Êtes-vous sûr de vouloir désinstaller ce plugin ? Cette action est irréversible.')\">
                                        <i class=\"fas fa-trash me-1\"></i>
                                        Désinstaller
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        {% else %}
            <div class=\"text-center py-5\">
                <i class=\"fas fa-puzzle-piece fa-3x text-gray-300 mb-3\"></i>
                <h5 class=\"text-gray-600\">Aucun plugin installé</h5>
                <p class=\"text-gray-500\">Commencez par installer votre premier plugin.</p>
            </div>
        {% endif %}
    </div>
</div>

<!-- Modal d'upload de plugin -->
<div class=\"modal fade\" id=\"uploadPluginModal\" tabindex=\"-1\" aria-labelledby=\"uploadPluginModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"uploadPluginModalLabel\">
                    <i class=\"fas fa-upload me-2\"></i>
                    Installer un Plugin
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            
            <form action=\"{{ path('admin_plugins_upload') }}\" method=\"POST\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"mb-3\">
                        <label for=\"plugin_file\" class=\"form-label\">Fichier Plugin (.zip)</label>
                        <input type=\"file\" class=\"form-control\" id=\"plugin_file\" name=\"plugin_file\" accept=\".zip\" required>
                        <div class=\"form-text\">
                            Sélectionnez un fichier ZIP contenant le plugin à installer.
                        </div>
                    </div>
                    
                    <div class=\"alert alert-info\">
                        <i class=\"fas fa-info-circle me-2\"></i>
                        <strong>Instructions :</strong>
                        <ul class=\"mb-0 mt-2\">
                            <li>Le fichier doit être un archive ZIP</li>
                            <li>Le plugin doit contenir un fichier plugin.yaml</li>
                            <li>La classe principale doit implémenter PluginInterface</li>
                        </ul>
                    </div>
                </div>
                
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-upload me-2\"></i>
                        Installer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}
", "admin/extensions/plugins/index.html.twig", "/workspace/symfpress/templates/admin/extensions/plugins/index.html.twig");
    }
}
