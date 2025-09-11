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

/* frontend/sitemap.xml.twig */
class __TwigTemplate_8bb5a897d985f05ab0fae1729f1e4a57 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/sitemap.xml.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/sitemap.xml.twig"));

        // line 1
        yield "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
        xmlns:xhtml=\"http://www.w3.org/1999/xhtml\">
    
    ";
        // line 6
        yield "    <url>
        <loc>";
        // line 7
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_home");
        yield "</loc>
        <lastmod>";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
        yield "</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    ";
        // line 14
        yield "    <url>
        <loc>";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_posts");
        yield "</loc>
        <lastmod>";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
        yield "</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    
    ";
        // line 22
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 22, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 23
            yield "        ";
            $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 23, $this->source); })())], "method", false, false, false, 23);
            // line 24
            yield "        ";
            if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 24, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 24) == "published"))) {
                // line 25
                yield "            <url>
                <loc>";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_post_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 26)]), "html", null, true);
                yield "</loc>
                <lastmod>";
                // line 27
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "updatedAt", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "updatedAt", [], "any", false, false, false, 27), "Y-m-d"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publishedAt", [], "any", false, false, false, 27), "Y-m-d"), "html", null, true)));
                yield "</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.7</priority>
            </url>
        ";
            }
            // line 32
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "    
    ";
        // line 35
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 35, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 36
            yield "        ";
            $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 36, $this->source); })())], "method", false, false, false, 36);
            // line 37
            yield "        ";
            if (((isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 37, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, $context["page"], "status", [], "any", false, false, false, 37) == "published"))) {
                // line 38
                yield "            <url>
                <loc>";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_page_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "slug", [], "any", false, false, false, 39)]), "html", null, true);
                yield "</loc>
                <lastmod>";
                // line 40
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "updatedAt", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "updatedAt", [], "any", false, false, false, 40), "Y-m-d"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "publishedAt", [], "any", false, false, false, 40), "Y-m-d"), "html", null, true)));
                yield "</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.6</priority>
            </url>
        ";
            }
            // line 45
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        yield "    
    ";
        // line 48
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 48, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 49
            yield "        ";
            $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["category"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 49, $this->source); })())], "method", false, false, false, 49);
            // line 50
            yield "        ";
            if ((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 50, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "            <url>
                <loc>";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_category_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "slug", [], "any", false, false, false, 52)]), "html", null, true);
                yield "</loc>
                <lastmod>";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
                yield "</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.5</priority>
            </url>
        ";
            }
            // line 58
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        yield "    
    ";
        // line 61
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 61, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 62
            yield "        ";
            $context["translation"] = CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "getTranslationForLanguage", [(isset($context["currentLanguage"]) || array_key_exists("currentLanguage", $context) ? $context["currentLanguage"] : (function () { throw new RuntimeError('Variable "currentLanguage" does not exist.', 62, $this->source); })())], "method", false, false, false, 62);
            // line 63
            yield "        ";
            if ((($tmp = (isset($context["translation"]) || array_key_exists("translation", $context) ? $context["translation"] : (function () { throw new RuntimeError('Variable "translation" does not exist.', 63, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 64
                yield "            <url>
                <loc>";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("frontend_tag_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "slug", [], "any", false, false, false, 65)]), "html", null, true);
                yield "</loc>
                <lastmod>";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
                yield "</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.4</priority>
            </url>
        ";
            }
            // line 71
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        yield "    
</urlset>
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
        return "frontend/sitemap.xml.twig";
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
        return array (  221 => 72,  215 => 71,  207 => 66,  203 => 65,  200 => 64,  197 => 63,  194 => 62,  189 => 61,  186 => 59,  180 => 58,  172 => 53,  168 => 52,  165 => 51,  162 => 50,  159 => 49,  154 => 48,  151 => 46,  145 => 45,  137 => 40,  133 => 39,  130 => 38,  127 => 37,  124 => 36,  119 => 35,  116 => 33,  110 => 32,  102 => 27,  98 => 26,  95 => 25,  92 => 24,  89 => 23,  84 => 22,  76 => 16,  72 => 15,  69 => 14,  61 => 8,  57 => 7,  54 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
        xmlns:xhtml=\"http://www.w3.org/1999/xhtml\">
    
    {# Page d'accueil #}
    <url>
        <loc>{{ url('frontend_home') }}</loc>
        <lastmod>{{ 'now'|date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    {# Page des articles #}
    <url>
        <loc>{{ url('frontend_posts') }}</loc>
        <lastmod>{{ 'now'|date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    
    {# Articles publiés #}
    {% for post in posts %}
        {% set translation = post.getTranslationForLanguage(currentLanguage) %}
        {% if translation and post.status == 'published' %}
            <url>
                <loc>{{ url('frontend_post_show', {'slug': post.slug}) }}</loc>
                <lastmod>{{ post.updatedAt ? post.updatedAt|date('Y-m-d') : post.publishedAt|date('Y-m-d') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.7</priority>
            </url>
        {% endif %}
    {% endfor %}
    
    {# Pages statiques #}
    {% for page in pages %}
        {% set translation = page.getTranslationForLanguage(currentLanguage) %}
        {% if translation and page.status == 'published' %}
            <url>
                <loc>{{ url('frontend_page_show', {'slug': page.slug}) }}</loc>
                <lastmod>{{ page.updatedAt ? page.updatedAt|date('Y-m-d') : page.publishedAt|date('Y-m-d') }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.6</priority>
            </url>
        {% endif %}
    {% endfor %}
    
    {# Catégories #}
    {% for category in categories %}
        {% set translation = category.getTranslationForLanguage(currentLanguage) %}
        {% if translation %}
            <url>
                <loc>{{ url('frontend_category_show', {'slug': category.slug}) }}</loc>
                <lastmod>{{ 'now'|date('Y-m-d') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.5</priority>
            </url>
        {% endif %}
    {% endfor %}
    
    {# Tags #}
    {% for tag in tags %}
        {% set translation = tag.getTranslationForLanguage(currentLanguage) %}
        {% if translation %}
            <url>
                <loc>{{ url('frontend_tag_show', {'slug': tag.slug}) }}</loc>
                <lastmod>{{ 'now'|date('Y-m-d') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.4</priority>
            </url>
        {% endif %}
    {% endfor %}
    
</urlset>
", "frontend/sitemap.xml.twig", "/workspace/symfpress/templates/frontend/sitemap.xml.twig");
    }
}
