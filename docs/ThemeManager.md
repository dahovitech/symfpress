# Service ThemeManager

## Vue d'ensemble

Le service `ThemeManager` est un service centralisé pour la gestion des thèmes dans Symfpress. Il fournit une interface unifiée pour activer, désactiver et gérer les thèmes avec persistance en base de données.

## Fonctionnalités principales

### 1. Activation de thèmes
```php
use App\Service\ThemeManager;

public function __construct(
    private ThemeManager $themeManager
) {}

// Activer un thème
$success = $this->themeManager->activateTheme('modern-blog');
```

### 2. Récupération du thème actif
```php
// Obtenir le thème actuellement actif
$activeTheme = $this->themeManager->getActiveTheme();
```

### 3. Gestion des thèmes disponibles
```php
// Lister tous les thèmes disponibles
$themes = $this->themeManager->getAvailableThemes();

// Vérifier si un thème existe
$exists = $this->themeManager->themeExists('theme-name');

// Valider un thème (vérifier sa structure)
$isValid = $this->themeManager->validateTheme('theme-name');
```

### 4. Informations des thèmes
```php
// Récupérer les informations d'un thème depuis theme.yaml
$info = $this->themeManager->getThemeInfo('modern-blog');

// Obtenir le chemin d'un thème
$path = $this->themeManager->getThemePath('modern-blog');

// Obtenir l'URL du screenshot
$screenshot = $this->themeManager->getThemeScreenshot('modern-blog');
```

### 5. Statistiques
```php
// Obtenir des statistiques sur les thèmes
$stats = $this->themeManager->getThemeStats();
// Retourne : total_themes, active_theme, themes_list, themes_path
```

## Structure des thèmes

Chaque thème doit respecter la structure suivante :

```
themes/
├── modern-blog/
│   ├── theme.yaml          # Configuration du thème
│   ├── screenshot.png      # Capture d'écran (optionnel)
│   ├── functions.php       # Fonctions PHP (optionnel)
│   └── templates/          # Templates Twig
│       ├── base.html.twig  # Template de base (obligatoire)
│       └── frontend/       # Templates spécifiques
└── autre-theme/
    └── ...
```

## Configuration theme.yaml

Exemple de fichier `theme.yaml` :

```yaml
name: "Modern Blog"
description: "Thème moderne et responsive pour blog avec design épuré"
version: "1.0.0"
author: "SymfPress Team"
screenshot: "screenshot.png"
supports:
  - responsive-design
  - custom-colors
  - widgets
  - multilingual
  - dark-mode
requirements:
  php: ">=8.1"
  symfony: ">=6.0"
features:
  - sidebar
  - comments
  - social-sharing
  - seo-optimized
```

## Persistance

Le service utilise l'entity `Setting` pour persister le thème actif :
- **Clé** : `active_theme`
- **Valeur** : Nom du thème actif
- **Description** : "Thème actif du site"

## Cache

Le service utilise le système de cache Symfony pour optimiser les performances :
- **Préfixe** : `theme_`
- **TTL** : 3600 secondes (1 heure)
- **Clé active** : `theme_active`

## Gestion des erreurs

Le service gère automatiquement :
- **Thèmes invalides** : Fallback vers le thème par défaut
- **Thème manquant** : Sélection automatique du premier thème disponible
- **Erreurs de configuration** : Utilisation de métadonnées par défaut
- **Cache corrompu** : Rechargement depuis la base de données

## Configuration du service

Dans `config/services.yaml` :

```yaml
App\Service\ThemeManager:
    arguments:
        $cache: '@cache.app'
        $projectDir: '%kernel.project_dir%'
```

## Constantes

Le service définit plusieurs constantes configurables :

```php
public const THEMES_DIRECTORY = '/themes';         # Répertoire des thèmes
public const ACTIVE_THEME_KEY = 'active_theme';    # Clé de setting
public const DEFAULT_THEME = 'modern-blog';        # Thème par défaut
public const THEME_CONFIG_FILE = 'theme.yaml';     # Fichier de config
public const CACHE_PREFIX = 'theme_';              # Préfixe de cache
public const CACHE_TTL = 3600;                     # Durée de vie du cache
```

## Tests

Le service est couvert par des tests unitaires dans `tests/Service/ThemeManagerTest.php`.

Lancer les tests :
```bash
./bin/phpunit tests/Service/ThemeManagerTest.php
```

## Intégration avec Twig

Le service se contente de gérer les thèmes. L'intégration avec Twig peut se faire via un EventListener ou un Extension Twig qui utilise ce service pour déterminer les chemins de templates.

## Logging

Toutes les opérations importantes sont loggées :
- Activation/désactivation de thèmes
- Erreurs de validation
- Problèmes de cache
- Découverte de thèmes

## Sécurité

Le service inclut plusieurs mesures de sécurité :
- Validation stricte des chemins de thèmes
- Vérification de l'existence des fichiers requis
- Gestion sécurisée des erreurs sans exposition d'informations sensibles
- Protection contre les injections de chemin
