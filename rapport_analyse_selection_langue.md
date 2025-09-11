# Rapport d'analyse : Problème de sélection de langue dans SymfPress

## Vue d'ensemble

L'analyse révèle un problème structural dans la gestion de la sélection de langue dans l'interface d'administration de SymfPress. Le paramètre `?language=en` dans l'URL n'est pas pris en compte par le système, rendant la sélection de langue non fonctionnelle.

## Problèmes identifiés

### 1. **LanguageService ne traite pas les paramètres URL**

**Fichier:** `/src/Service/LanguageService.php`
**Méthode problématique:** `detectLanguage(Request $request = null)`

**Problème:** La méthode `detectLanguage()` vérifie les sources suivantes pour déterminer la langue:
1. Session utilisateur
2. Préfixe de langue dans l'URL (ex: `/en/admin`)
3. Préférences du navigateur
4. Langue par défaut

**Mais elle ne vérifie jamais les paramètres de requête comme `?language=en`.**

**Code actuel:**
```php
// 2. Détecter depuis l'URL si une requête est fournie
if ($request) {
    $pathInfo = $request->getPathInfo();
    if (preg_match('#^/([a-z]{2})(/.*)?$#', $pathInfo, $matches)) {
        $languageCode = $matches[1];
        $language = $this->languageRepository->findByCode($languageCode);
        if ($language) {
            return $language;
        }
    }
}
```

**Ce qui manque:** Vérification des paramètres de requête `$request->query->get('language')`

### 2. **Incohérence entre templates et contrôleurs**

**Fichiers concernés:**
- `/templates/admin/pages/form.html.twig`
- `/templates/admin/posts/form.html.twig`

**Problème:** Les templates génèrent des liens avec le paramètre `?language=en` :

```twig
<a class="dropdown-item {{ language == currentLanguage ? 'active' : '' }}" 
   href="{{ isEdit ? path('admin_pages_edit', {'id': page.id, 'language': language.code}) : path('admin_pages_new', {'language': language.code}) }}">
    {{ language.name }}
</a>
```

Mais les contrôleurs `PageController` et `PostController` n'utilisent jamais ce paramètre. Ils appellent simplement :

```php
$currentLanguage = $this->languageService->getCurrentLanguage();
```

### 3. **Absence de traitement des paramètres dans les contrôleurs**

**Fichiers concernés:**
- `/src/Controller/Admin/PageController.php`
- `/src/Controller/Admin/PostController.php`

**Problème:** Les méthodes `new()` et `edit()` de ces contrôleurs ne vérifient jamais si un paramètre `language` a été passé dans l'URL pour changer temporairement la langue d'édition.

## Solutions recommandées

### Solution 1: Modifier le LanguageService (Recommandée)

**Modifier la méthode `detectLanguage()` dans `/src/Service/LanguageService.php`:**

```php
public function detectLanguage(Request $request = null): Language
{
    // 1. Vérifier le paramètre de requête en premier
    if ($request && $request->query->has('language')) {
        $languageCode = $request->query->get('language');
        $language = $this->languageRepository->findByCode($languageCode);
        if ($language) {
            // Optionnel: mettre à jour la session
            $this->setCurrentLanguage($language);
            return $language;
        }
    }

    // 2. Vérifier si une langue est déjà en session
    $session = $this->requestStack->getSession();
    // ... reste du code existant
}
```

### Solution 2: Modifier les contrôleurs

**Alternative ou complément - modifier les contrôleurs pour gérer explicitement le paramètre:**

```php
// Dans PageController et PostController
private function createOrEdit(Request $request, ?Page $page = null): Response
{
    // Gérer le changement de langue temporaire
    if ($request->query->has('language')) {
        $languageCode = $request->query->get('language');
        $language = $this->languageService->getLanguageFromCode($languageCode);
        if ($language) {
            $this->languageService->setCurrentLanguage($language);
        }
    }
    
    $currentLanguage = $this->languageService->getCurrentLanguage();
    // ... reste du code
}
```

### Solution 3: Événement Symfony (Avancée)

**Créer un EventListener pour intercepter automatiquement le paramètre `language`:**

```php
// Nouveau fichier: src/EventListener/LanguageListener.php
class LanguageListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        
        if ($request->query->has('language')) {
            $languageCode = $request->query->get('language');
            // Logique de changement de langue
        }
    }
}
```

## Impact et urgence

**Severité:** Moyenne
**Impact utilisateur:** Les utilisateurs ne peuvent pas changer de langue d'édition via l'interface, ce qui rend l'interface multilingue non fonctionnelle.
**Difficulté de résolution:** Faible à moyenne

## Tests recommandés

Après implémentation des corrections :

1. Tester `?language=en` sur les pages d'édition
2. Tester `?language=fr` avec retour à la langue par défaut
3. Vérifier que la langue sélectionnée persiste lors de la navigation
4. Tester avec des codes de langue non valides
5. Vérifier le comportement en mode monolingue

## Conclusion

Le problème est clairement identifié : il manque la gestion des paramètres de requête dans le `LanguageService`. La solution la plus propre est de modifier la méthode `detectLanguage()` pour qu'elle prenne en compte le paramètre `?language=` avant de vérifier les autres sources de langue.
