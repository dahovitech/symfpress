# Intégration des Menus dans les Thèmes - SymfPress

## Vue d'ensemble

Le système de menu de SymfPress permet d'intégrer facilement des menus dynamiques dans les thèmes. Les menus créés dans l'administration sont automatiquement disponibles dans les templates de thème via des fonctions Twig dédiées.

## 🎯 Fonctionnalités Principales

### ✨ **Extension Twig MenuExtension**
- **`get_menus()`** - Récupère tous les menus actifs
- **`get_menus_by_location(location)`** - Récupère les menus par emplacement
- **`render_menu(location, options)`** - Rend un menu complet avec HTML
- **`has_menus(location)`** - Vérifie l'existence de menus pour un emplacement
- **`get_menu_locations()`** - Liste des emplacements disponibles

### 🗂️ **Emplacements de Menus**
- **`primary`** - Menu principal de navigation
- **`secondary`** - Menu secondaire
- **`footer`** - Menu de pied de page  
- **`social`** - Menu réseaux sociaux

### 🎨 **Templates de Rendu**
- **`partials/menu.html.twig`** - Template Bootstrap 5 avec dropdowns
- **`partials/menu-simple.html.twig`** - Template simple sans framework
- **`partials/menu-horizontal.html.twig`** - Menu horizontal basique

## 📚 Utilisation dans les Thèmes

### 🔧 **Intégration Basique**

```twig
{# Dans un template de thème #}

{# Menu principal avec Bootstrap #}
{{ render_menu('primary') }}

{# Menu avec options personnalisées #}
{{ render_menu('primary', {
    menu_class: 'navbar-nav me-auto',
    item_class: 'nav-item',
    link_class: 'nav-link',
    active_class: 'active'
}) }}

{# Vérifier l'existence d'un menu #}
{% if has_menus('footer') %}
    <div class="footer-navigation">
        {{ render_menu('footer') }}
    </div>
{% endif %}
```

### 🎛️ **Options de Configuration**

```twig
{# Options complètes pour render_menu #}
{{ render_menu('primary', {
    'menu_class': 'navbar-nav',              # Classe CSS du conteneur <ul>
    'item_class': 'nav-item',                # Classe CSS des <li>
    'link_class': 'nav-link',                # Classe CSS des <a>
    'dropdown_class': 'dropdown',            # Classe CSS pour les dropdowns
    'dropdown_menu_class': 'dropdown-menu',  # Classe CSS du sous-menu
    'dropdown_item_class': 'dropdown-item',  # Classe CSS des liens de sous-menu
    'active_class': 'active',                # Classe CSS pour le lien actif
    'template': 'partials/menu.html.twig'   # Template personnalisé
}) }}
```

### 🌟 **Exemples d'Intégration par Thème**

#### **Thème Modern Blog (Bootstrap 5)**

```twig
{# Navigation principale #}
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">Mon Site</a>
        
        <div class="collapse navbar-collapse">
            {{ render_menu('primary', {
                menu_class: 'navbar-nav me-auto',
                item_class: 'nav-item',
                link_class: 'nav-link',
                dropdown_class: 'dropdown',
                dropdown_menu_class: 'dropdown-menu',
                dropdown_item_class: 'dropdown-item'
            }) }}
        </div>
    </div>
</nav>

{# Pied de page #}
<footer>
    {% if has_menus('footer') %}
        {{ render_menu('footer', {
            menu_class: 'list-inline',
            item_class: 'list-inline-item',
            link_class: 'text-light'
        }) }}
    {% endif %}
    
    {# Réseaux sociaux #}
    {% if has_menus('social') %}
        <div class="social-links">
            {{ render_menu('social', {
                menu_class: 'd-flex',
                item_class: 'me-3',
                link_class: 'text-light fs-4'
            }) }}
        </div>
    {% endif %}
</footer>
```

#### **Thème Simple/Default**

```twig
{# Navigation horizontale simple #}
<header>
    <nav>
        {{ render_menu('primary', {
            template: 'partials/menu-horizontal.html.twig',
            nav_class: 'main-navigation',
            link_class: 'nav-link',
            link_style: 'color: white; margin: 0 1rem;'
        }) }}
    </nav>
</header>

{# Menu de pied de page simple #}
<footer>
    {% if has_menus('footer') %}
        {{ render_menu('footer', {
            template: 'partials/menu-horizontal.html.twig',
            link_style: 'color: #ccc; margin: 0 0.5rem;'
        }) }}
    {% endif %}
</footer>
```

## 🛠️ Templates de Rendu Personnalisés

### 📄 **Créer un Template Personnalisé**

```twig
{# templates/partials/menu-custom.html.twig #}
{%- if menus is defined and menus|length > 0 -%}
    <ul class="{{ options.menu_class|default('custom-menu') }}">
        {%- for menu in menus -%}
            {%- if menu.isActive -%}
                {{ _self.render_menu_item(menu, options, current_language) }}
            {%- endif -%}
        {%- endfor -%}
    </ul>
{%- endif -%}

{%- macro render_menu_item(menu, options, current_language) -%}
    {%- set translation = menu.getTranslationForLanguage(current_language) -%}
    {%- set title = translation ? translation.title : menu.getDisplayTitle(current_language) -%}
    {%- set url = menu.getComputedUrl ?: '#' -%}
    
    <li class="{{ options.item_class|default('menu-item') }}">
        <a href="{{ url }}" class="{{ options.link_class|default('menu-link') }}">
            {{ title }}
        </a>
    </li>
{%- endmacro -%}
```

### 🎯 **Utiliser le Template Personnalisé**

```twig
{{ render_menu('primary', {
    template: 'partials/menu-custom.html.twig',
    menu_class: 'my-custom-menu',
    item_class: 'my-menu-item',
    link_class: 'my-menu-link'
}) }}
```

## 🔄 Gestion Multi-langue

Le système de menu supporte automatiquement les langues multiples :

```twig
{# Le menu s'adapte automatiquement à la langue courante #}
{{ render_menu('primary') }}

{# Forcer une langue spécifique #}
{% set french_language = get_language('fr') %}
{% for menu in get_menus_by_location('primary', french_language) %}
    {# ... #}
{% endfor %}
```

## ⚙️ Configuration Avancée

### 🔗 **Détection des Liens Actifs**

```twig
{# Les templates détectent automatiquement les liens actifs #}
{%- if app.request.pathInfo == url -%}
    {%- set linkClasses = linkClasses|merge([options.active_class|default('active')]) -%}
{%- endif -%}
```

### 🏗️ **Menus Hiérarchiques (Sous-menus)**

```twig
{# Support automatique des sous-menus #}
{%- if hasChildren -%}
    <a class="dropdown-toggle" data-bs-toggle="dropdown">{{ title }}</a>
    <ul class="dropdown-menu">
        {%- for child in activeChildren -%}
            {{ _self.render_menu_item(child, childOptions, level + 1) }}
        {%- endfor -%}
    </ul>
{%- endif -%}
```

### 🎨 **Classes CSS Dynamiques**

```twig
{# Ajouter des classes CSS personnalisées aux menus #}
{{ render_menu('primary', {
    menu_class: 'navbar-nav ' ~ (is_mobile ? 'mobile-menu' : 'desktop-menu'),
    link_class: 'nav-link ' ~ theme_class
}) }}
```

## 🧪 Création de Menus de Test

Utilisez la commande pour créer des menus de démonstration :

```bash
php bin/console app:create-demo-menus
```

Cette commande crée :
- **Menu principal** : Accueil, Articles, À propos, Contact
- **Menu footer** : Mentions légales, Confidentialité, Plan du site  
- **Menu social** : Facebook, Twitter, LinkedIn

## 🛡️ Gestion des Erreurs et Fallbacks

### 🔄 **Fallback Automatique**

```twig
{# Si aucun menu dynamique n'existe, afficher un menu statique #}
{{ render_menu('primary') }}

{% if not has_menus('primary') %}
    <ul class="navbar-nav">
        <li><a href="/">Accueil</a></li>
        <li><a href="/articles">Articles</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
{% endif %}
```

### 🚫 **Gestion des Templates Manquants**

Si un template personnalisé n'existe pas, le système utilise automatiquement un rendu HTML simple.

```php
// Dans MenuExtension.php
try {
    return $twig->render($options['template'], $data);
} catch (\Exception $e) {
    return $this->renderMenuFallback($menus, $options);
}
```

## 📋 Checklist d'Intégration

- [ ] Extension Twig `MenuExtension` installée
- [ ] Templates partiels de menu créés
- [ ] Thèmes modifiés pour utiliser `render_menu()`
- [ ] Fallbacks statiques configurés
- [ ] Menus de test créés
- [ ] Styles CSS adaptés aux classes de menu
- [ ] Support multi-langue vérifié
- [ ] Détection des liens actifs fonctionnelle

## 🎉 Résultat Final

Une fois l'intégration complète, vous obtenez :

✅ **Menus dynamiques** dans tous les thèmes  
✅ **Gestion centralisée** via l'administration  
✅ **Support multi-langue** automatique  
✅ **Flexibilité** de rendu et de style  
✅ **Hiérarchie** avec sous-menus  
✅ **Détection** des liens actifs  
✅ **Fallbacks** robustes  

Les menus créés dans `/admin/menus` apparaissent instantanément dans le frontend selon leur emplacement configuré.
