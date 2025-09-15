# Corrections des Vulnérabilités XSS - SymfPress

## Résumé des modifications

Ce document décrit les modifications apportées pour corriger les vulnérabilités XSS dans les templates Twig du projet SymfPress.

## Vulnérabilités corrigées

### 1. Filtres `|raw` dangereux
- **Fichiers affectés :**
  - `templates/frontend/posts/show.html.twig` (ligne 68)
  - `templates/frontend/pages/show.html.twig` (ligne 54)

- **Problème :** Les filtres `|raw` permettaient l'affichage de contenu HTML non échappé, exposant le site à des attaques XSS.

## Solutions implémentées

### 1. Service HtmlPurifierService
- **Fichier :** `src/Service/HtmlPurifierService.php`
- **Fonction :** Service de purification HTML utilisant la bibliothèque HTMLPurifier
- **Méthodes :**
  - `purify()` : Purification standard avec balises HTML sécurisées autorisées
  - `purifyStrict()` : Purification stricte avec formatage minimal

### 2. Extension Twig SecurityExtension
- **Fichier :** `src/Twig/SecurityExtension.php`
- **Fonction :** Extension Twig fournissant des filtres sécurisés
- **Filtres disponibles :**
  - `|purify` : Filtre de purification standard
  - `|purify_strict` : Filtre de purification stricte

### 3. Dépendance HTMLPurifier
- **Package :** `ezyang/htmlpurifier ^4.18`
- **Installation :** Ajouté au `composer.json`

## Balises HTML autorisées après purification

### Configuration standard (`|purify`)
- **Texte :** `p`, `br`, `strong`, `b`, `em`, `i`, `u`
- **Liens :** `a[href|title|target]`
- **Listes :** `ul`, `ol`, `li`
- **Titres :** `h1`, `h2`, `h3`, `h4`, `h5`, `h6`
- **Images :** `img[src|alt|width|height]`
- **Structure :** `blockquote`, `code`, `pre`, `hr`, `div[class]`, `span[class]`
- **Tableaux :** `table`, `thead`, `tbody`, `tr`, `th`, `td`

### Configuration stricte (`|purify_strict`)
- Uniquement : `p`, `br`, `strong`, `b`, `em`, `i`, `u`

## Sécurité renforcée

- **Protection XSS :** Filtrage automatique des scripts malveillants
- **Attributs contrôlés :** Seuls les attributs sécurisés sont autorisés
- **Liens externes :** Ajout automatique de `rel="nofollow,noopener,noreferrer"`
- **JavaScript bloqué :** Tous les événements JavaScript sont supprimés

## Utilisation

### Dans les templates Twig
```twig
<!-- Remplace {{ content|raw }} par : -->
{{ content|purify }}

<!-- Pour un formatage minimal : -->
{{ content|purify_strict }}
```

### Tests recommandés
1. Vérifier l'affichage correct du contenu HTML légitime
2. Tester la suppression des scripts malveillants (`<script>`, `onclick`, etc.)
3. Vérifier la conservation du formatage de base

## Date de correction
- 12 septembre 2025
