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

/* frontend/rss.xml.twig */
class __TwigTemplate_926e9963d7ce88c400384a06aa2afe43 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/rss.xml.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/rss.xml.twig"));

        // line 1
        yield "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\" xmlns:content=\"http://purl.org/rss/1.0/modules/content/\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
    <channel>
        <title>SymfPress - CMS Multilingue</title>
        <link>";
        // line 5
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_home");
        yield "</link>
        <description>Flux RSS des derniers articles de SymfPress</description>
        <language>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 7, $this->source); })()), "code", [], "any", false, false, false, 7), "html", null, true);
        yield "</language>
        <lastBuildDate>";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "r"), "html", null, true);
        yield "</lastBuildDate>
        <atom:link href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_rss");
        yield "\" rel=\"self\" type=\"application/rss+xml\"/>
        <generator>SymfPress - Symfony CMS</generator>
        <image>
            <url>";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_home");
        yield "favicon.ico</url>
            <title>SymfPress</title>
            <link>";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_home");
        yield "</link>
        </image>
        
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 17, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 18
            yield "            ";
            $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 18, $this->source); })())], "method", false, false, false, 18);
            // line 19
            yield "            ";
            if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 19, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 19) == "published"))) {
                // line 20
                yield "                <item>
                    <title><![CDATA[";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 21, $this->source); })()), "title", [], "any", false, false, false, 21), "html", null, true);
                yield "]]></title>
                    <link>";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 22)]), "html", null, true);
                yield "</link>
                    <guid isPermaLink=\"true\">";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 23)]), "html", null, true);
                yield "</guid>
                    <pubDate>";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 24), "r"), "html", null, true);
                yield "</pubDate>
                    <author>";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 25), "email", [], "any", false, false, false, 25), "html", null, true);
                yield " (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 25), "displayName", [], "any", false, false, false, 25), "html", null, true);
                yield ")</author>
                    
                    ";
                // line 27
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 27, $this->source); })()), "excerpt", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 28
                    yield "                        <description><![CDATA[";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 28, $this->source); })()), "excerpt", [], "any", false, false, false, 28), "html", null, true);
                    yield "]]></description>
                    ";
                }
                // line 30
                yield "                    
                    ";
                // line 31
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 31, $this->source); })()), "content", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 32
                    yield "                        <content:encoded><![CDATA[";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 32, $this->source); })()), "content", [], "any", false, false, false, 32), "html", null, true);
                    yield "]]></content:encoded>
                    ";
                }
                // line 34
                yield "                    
                    ";
                // line 36
                yield "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "categories", [], "any", false, false, false, 36));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 37
                    yield "                        ";
                    $context["categoryTranslation"] = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 37, $this->source); })())], "method", false, false, false, 37);
                    // line 38
                    yield "                        ";
                    if ((($tmp = (isset($context["categoryTranslation"]) || array_key_exists("categoryTranslation", $context) ? $context["categoryTranslation"] : (function () { throw new RuntimeError('Variable "categoryTranslation" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 39
                        yield "                            <category><![CDATA[";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["categoryTranslation"]) || array_key_exists("categoryTranslation", $context) ? $context["categoryTranslation"] : (function () { throw new RuntimeError('Variable "categoryTranslation" does not exist.', 39, $this->source); })()), "name", [], "any", false, false, false, 39), "html", null, true);
                        yield "]]></category>
                        ";
                    }
                    // line 41
                    yield "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                yield "                    
                    ";
                // line 44
                yield "                    ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 45
                    yield "                        <enclosure url=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 45), "url", [], "any", false, false, false, 45), "html", null, true);
                    yield "\" type=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 45), "mimeType", [], "any", false, false, false, 45), "html", null, true);
                    yield "\" length=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "featuredImage", [], "any", false, false, false, 45), "fileSize", [], "any", false, false, false, 45), "html", null, true);
                    yield "\"/>
                    ";
                }
                // line 47
                yield "                </item>
            ";
            }
            // line 49
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        yield "    </channel>
</rss>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "frontend/rss.xml.twig";
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
        return array (  191 => 50,  185 => 49,  181 => 47,  171 => 45,  168 => 44,  165 => 42,  159 => 41,  153 => 39,  150 => 38,  147 => 37,  142 => 36,  139 => 34,  133 => 32,  131 => 31,  128 => 30,  122 => 28,  120 => 27,  113 => 25,  109 => 24,  105 => 23,  101 => 22,  97 => 21,  94 => 20,  91 => 19,  88 => 18,  84 => 17,  78 => 14,  73 => 12,  67 => 9,  63 => 8,  59 => 7,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\" xmlns:content=\"http://purl.org/rss/1.0/modules/content/\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
    <channel>
        <title>SymfPress - CMS Multilingue</title>
        <link>{{ url('frontend_home') }}</link>
        <description>Flux RSS des derniers articles de SymfPress</description>
        <language>{{ currentLanguage.code }}</language>
        <lastBuildDate>{{ 'now'|date('r') }}</lastBuildDate>
        <atom:link href=\"{{ url('frontend_rss') }}\" rel=\"self\" type=\"application/rss+xml\"/>
        <generator>SymfPress - Symfony CMS</generator>
        <image>
            <url>{{ url('frontend_home') }}favicon.ico</url>
            <title>SymfPress</title>
            <link>{{ url('frontend_home') }}</link>
        </image>
        
        {% for post in posts %}
            {% set translation = post.getTranslationForLanguage(currentLanguage) %}
            {% if translation and post.status == 'published' %}
                <item>
                    <title><![CDATA[{{ translation.title }}]]></title>
                    <link>{{ url('frontend_post_show', {'slug': post.slug}) }}</link>
                    <guid isPermaLink=\"true\">{{ url('frontend_post_show', {'slug': post.slug}) }}</guid>
                    <pubDate>{{ post.publishedAt|date('r') }}</pubDate>
                    <author>{{ post.author.email }} ({{ post.author.displayName }})</author>
                    
                    {% if translation.excerpt %}
                        <description><![CDATA[{{ translation.excerpt }}]]></description>
                    {% endif %}
                    
                    {% if translation.content %}
                        <content:encoded><![CDATA[{{ translation.content }}]]></content:encoded>
                    {% endif %}
                    
                    {# Catégories #}
                    {% for category in post.categories %}
                        {% set categoryTranslation = category.getTranslationForLanguage(currentLanguage) %}
                        {% if categoryTranslation %}
                            <category><![CDATA[{{ categoryTranslation.name }}]]></category>
                        {% endif %}
                    {% endfor %}
                    
                    {# Image mise en avant #}
                    {% if post.featuredImage %}
                        <enclosure url=\"{{ post.featuredImage.url }}\" type=\"{{ post.featuredImage.mimeType }}\" length=\"{{ post.featuredImage.fileSize }}\"/>
                    {% endif %}
                </item>
            {% endif %}
        {% endfor %}
    </channel>
</rss>
", "frontend/rss.xml.twig", "/workspace/symfpress/templates/frontend/rss.xml.twig");
    }
}
