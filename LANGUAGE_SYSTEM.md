# Système de Langues SymfPress

Le système de langues de SymfPress permet de créer des sites multilingues avec une sélection de langue dynamique dans les thèmes.

## Fonctionnalités

- ✅ Gestion des langues via base de données
- ✅ Détection automatique de la langue (navigateur, session, URL)
- ✅ Sélecteurs de langue pour les thèmes
- ✅ Persistance du choix en session
- ✅ API REST pour les interactions AJAX
- ✅ Commandes de gestion console
- ✅ Extensions Twig pour les thèmes

## Utilisation dans les Thèmes

### Fonctions Twig Disponibles

```twig
{# Obtenir la langue courante #}
{% set currentLang = get_current_language() %}

{# Vérifier si le site est multilingue #}
{% if is_multilingual() %}
    <!-- Afficher sélecteur de langue -->
{% endif %}

{# Obtenir toutes les langues disponibles #}
{% for language in get_available_languages() %}
    <a href="{{ language_switch_url(language.code) }}">{{ language.name }}</a>
{% endfor %}

{# Sélecteur de langue automatique #}
{{ render_language_selector() }}
```

### Sélecteurs de Langue Prêts à l'Emploi

#### 1. Sélecteur Dropdown Simple
```twig
{{ include('partials/language-selector.html.twig') }}
```

#### 2. Sélecteur avec Boutons
```twig
{{ include('partials/language-selector-buttons.html.twig') }}
```

#### 3. Sélecteur Dropdown Bootstrap
```twig
{{ include('partials/language-selector-dropdown.html.twig') }}
```

#### 4. Sélecteur avec Drapeaux
```twig
{{ include('partials/language-selector-flags.html.twig') }}
```

#### 5. Sélecteur Minimal
```twig
{{ include('partials/language-selector-minimal.html.twig') }}
```

### Sélecteur Personnalisé

```twig
{{ render_language_selector({
    'type': 'dropdown',
    'show_flags': true,
    'show_names': true,
    'show_codes': false,
    'container_class': 'my-language-selector',
    'button_class': 'btn btn-sm btn-secondary'
}) }}
```

## Gestion des Langues

### Via Interface Twig

Les thèmes peuvent accéder aux langues avec ces fonctions :

- `get_current_language()` - Langue actuelle
- `get_available_languages()` - Toutes les langues actives
- `is_multilingual()` - Vérifie si le site est multilingue
- `language_switch_url(code)` - URL pour changer de langue

### Via Commandes Console

```bash
# Lister toutes les langues
php bin/console app:language:manage list

# Créer une nouvelle langue
php bin/console app:language:manage create en --name="English"

# Activer une langue
php bin/console app:language:manage activate en

# Désactiver une langue
php bin/console app:language:manage deactivate en

# Définir langue par défaut
php bin/console app:language:manage set-default en
```

### Via API REST

#### Changer de langue (AJAX)
```javascript
fetch('/language/switch-ajax/en', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    }
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        location.reload(); // ou mise à jour dynamique
    }
});
```

#### Obtenir la langue courante
```javascript
fetch('/api/language/current')
.then(response => response.json())
.then(data => {
    console.log('Langue courante:', data.name);
});
```

#### Obtenir toutes les langues
```javascript
fetch('/api/language/available')
.then(response => response.json())
.then(data => {
    console.log('Langues disponibles:', data.languages);
    console.log('Site multilingue:', data.is_multilingual);
});
```

## Routes Disponibles

- `GET /language/switch/{code}` - Changer de langue (redirection)
- `POST /language/switch-ajax/{code}` - Changer de langue (AJAX)
- `GET /api/language/current` - Obtenir langue courante
- `GET /api/language/available` - Obtenir langues disponibles

## Détection de Langue

Le système détecte automatiquement la langue selon cette priorité :

1. **Paramètre URL** : `?language=en`
2. **Session utilisateur** : Langue stockée en session
3. **URL avec préfixe** : `/en/page`
4. **En-têtes navigateur** : `Accept-Language`
5. **Langue par défaut** : Définie en base de données

## Configuration des Thèmes

### Dans base.html.twig

```twig
<!DOCTYPE html>
<html lang="{{ get_current_language().code }}">
<head>
    <meta charset="UTF-8">
    <title>{{ page_title }} - {{ site_name }}</title>
</head>
<body>
    <nav>
        <!-- Menu principal -->
        {{ render_menu('primary') }}
        
        <!-- Sélecteur de langue -->
        {{ include('partials/language-selector-dropdown.html.twig') }}
    </nav>
    
    <main>
        {% block content %}{% endblock %}
    </main>
    
    <footer>
        <!-- Sélecteur minimal en footer -->
        {{ include('partials/language-selector-minimal.html.twig') }}
    </footer>
</body>
</html>
```

## Personnalisation CSS

### Pour les drapeaux
```css
.language-flags .flag-icon {
    width: 24px;
    height: 16px;
    border-radius: 2px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}

.language-flags .language-flag-link.active {
    border: 2px solid #007bff;
    background-color: rgba(0,123,255,0.1);
}
```

### Pour les boutons
```css
.language-buttons .btn.active {
    background-color: #007bff;
    color: white;
}
```

## Base de Données

### Structure de la table `language`

```sql
CREATE TABLE language (
    id INTEGER PRIMARY KEY,
    code VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    is_default BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE
);
```

### Données d'exemple

```sql
INSERT INTO language (code, name, is_default, is_active) VALUES
('fr', 'Français', TRUE, TRUE),
('en', 'English', FALSE, TRUE),
('es', 'Español', FALSE, TRUE);
```

## Bonnes Pratiques

1. **Toujours vérifier** si le site est multilingue avant d'afficher les sélecteurs
2. **Utiliser les fonctions Twig** plutôt que d'accéder directement aux services
3. **Tester la détection** automatique avec différents navigateurs
4. **Prévoir des fallbacks** pour les langues manquantes
5. **Optimiser les requêtes** en utilisant le cache pour les langues

## Intégration avec les Menus

Le système de langues est intégré avec le système de menus :

```twig
{# Menu dans la langue courante #}
{{ render_menu('primary') }}

{# Menu dans une langue spécifique #}
{{ render_menu('primary', {'language': get_language_by_code('en')}) }}
```

## Debugging

### Vérifier la langue courante
```twig
<p>Langue courante: {{ get_current_language().name }} ({{ get_current_language().code }})</p>
```

### Lister les langues disponibles
```twig
<ul>
{% for lang in get_available_languages() %}
    <li>{{ lang.name }} ({{ lang.code }}) {% if lang.isDefault %}[défaut]{% endif %}</li>
{% endfor %}
</ul>
```

## Exemple Complet

Voir les fichiers `themes/modern-blog/templates/base.html.twig` et `themes/default/templates/base.html.twig` pour des exemples d'implémentation complète.
