# Fichiers concernés par le problème de sélection de langue

## Fichiers nécessitant des modifications

### 1. `/src/Service/LanguageService.php`
**Ligne problématique:** 31-45 (méthode `detectLanguage()`)
**Problème:** Ne vérifie pas les paramètres de requête `?language=en`
**Action:** Ajouter vérification de `$request->query->get('language')` en premier dans la méthode

```php
// Ligne 31 - Méthode à modifier
public function detectLanguage(Request $request = null): Language
{
    // MANQUE: Vérification des paramètres de requête
    
    // 1. Vérifier si une langue est déjà en session
    $session = $this->requestStack->getSession();
    // ...
}
```

### 2. `/src/Controller/Admin/PageController.php`
**Lignes concernées:** 67-85 (méthode `createOrEdit()`)
**Problème:** N'utilise jamais le paramètre `language` passé dans l'URL
**Action:** Ajouter gestion du paramètre avant `getCurrentLanguage()`

```php
// Ligne 70 - Code actuel
private function createOrEdit(Request $request, ?Page $page = null): Response
{
    $isEdit = $page !== null;
    $currentLanguage = $this->languageService->getCurrentLanguage(); // PROBLÈME: ignore ?language=en
```

### 3. `/src/Controller/Admin/PostController.php`
**Lignes concernées:** 110-130 (méthode `createOrEdit()`)
**Problème:** Même problème que PageController
**Action:** Ajouter gestion du paramètre avant `getCurrentLanguage()`

```php
// Ligne 112 - Code actuel
private function createOrEdit(Request $request, ?Post $post = null): Response
{
    $isEdit = $post !== null;
    $currentLanguage = $this->languageService->getCurrentLanguage(); // PROBLÈME: ignore ?language=en
```

## Fichiers utilisant le paramètre (mais non traité)

### 4. `/templates/admin/pages/form.html.twig`
**Lignes concernées:** 16-26 (dropdown de sélection de langue)
**Problème:** Génère des liens avec `?language=en` mais le backend ne les traite pas

```twig
<!-- Ligne 21-25 -->
<a class="dropdown-item {{ language == currentLanguage ? 'active' : '' }}" 
   href="{{ isEdit ? path('admin_pages_edit', {'id': page.id, 'language': language.code}) : path('admin_pages_new', {'language': language.code}) }}">
    {{ language.name }}
</a>
```

### 5. `/templates/admin/posts/form.html.twig`
**Lignes concernées:** 29-39 (dropdown de sélection de langue)
**Problème:** Même problème que le template des pages

```twig
<!-- Ligne 33-37 -->
<a class="dropdown-item {{ language == currentLanguage ? 'active' : '' }}" 
   href="{{ isEdit ? path('admin_posts_edit', {'id': post.id, 'language': language.code}) : path('admin_posts_new', {'language': language.code}) }}">
    {{ language.name }}
</a>
```

## Fichiers de configuration

### 6. `/config/packages/translation.yaml`
**Ligne concernée:** 2 (`default_locale: en`)
**Note:** Configuration correcte mais pourrait être source de confusion

## Fichiers fonctionnels (pour référence)

### 7. `/src/Controller/Admin/AdminController.php`
**Ligne 105:** Méthode `switchLanguage()` - fonctionne correctement avec route dédiée
**Note:** Cette méthode fonctionne car elle utilise une route spécifique `/admin/switch-language/{code}`

### 8. `/templates/admin/base.html.twig`
**Lignes 59-71:** Sélecteur de langue global - fonctionne car utilise la route `admin_switch_language`

## Résumé des modifications nécessaires

1. **Priorité 1:** Modifier `LanguageService::detectLanguage()` pour gérer `?language=en`
2. **Priorité 2:** Optionnellement modifier `PageController` et `PostController` pour traitement explicite
3. **Priorité 3:** Ajouter tests pour vérifier le fonctionnement

## Impact des modifications

- **Fichiers à modifier:** 1 fichier principal (`LanguageService.php`)
- **Fichiers optionnels:** 2 contrôleurs (`PageController.php`, `PostController.php`)
- **Tests nécessaires:** 4-5 scénarios de test
- **Risque de régression:** Faible (ajout de fonctionnalité, pas de modification de l'existant)
