# Solutions de code pour le problème de sélection de langue

## Solution 1: Modification du LanguageService (Recommandée)

### Fichier: `/src/Service/LanguageService.php`

**Modifier la méthode `detectLanguage()` aux lignes 31-45:**

```php
public function detectLanguage(Request $request = null): Language
{
    // NOUVEAU: 1. Vérifier le paramètre de requête en premier
    if ($request && $request->query->has('language')) {
        $languageCode = $request->query->get('language');
        $language = $this->languageRepository->findByCode($languageCode);
        if ($language) {
            // Optionnel: mettre à jour la session pour persistance
            $this->setCurrentLanguage($language);
            return $language;
        }
    }

    // 2. Vérifier si une langue est déjà en session (code existant)
    $session = $this->requestStack->getSession();
    $sessionLanguageCode = $session ? $session->get(self::SESSION_LANGUAGE_KEY) : null;
    if ($sessionLanguageCode) {
        $language = $this->languageRepository->findByCode($sessionLanguageCode);
        if ($language) {
            return $language;
        }
    }

    // 3. Détecter depuis l'URL si une requête est fournie (code existant)
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

    // 4-5. Reste du code existant (préférences navigateur + défaut)
    // ...
}
```

**Modification alternative (plus conservative):**

Ajouter une nouvelle méthode spécifique:

```php
/**
 * Détecte la langue depuis les paramètres de requête
 */
public function detectLanguageFromRequest(Request $request): ?Language
{
    if ($request->query->has('language')) {
        $languageCode = $request->query->get('language');
        return $this->languageRepository->findByCode($languageCode);
    }
    return null;
}

/**
 * Obtient la langue courante en tenant compte des paramètres de requête
 */
public function getCurrentLanguageForRequest(Request $request): Language
{
    // Vérifier d'abord les paramètres de requête
    $requestLanguage = $this->detectLanguageFromRequest($request);
    if ($requestLanguage) {
        return $requestLanguage;
    }
    
    // Sinon utiliser la détection normale
    return $this->detectLanguage($request);
}
```

## Solution 2: Modification des contrôleurs (Complémentaire)

### Fichier: `/src/Controller/Admin/PageController.php`

**Modifier la méthode `createOrEdit()` aux lignes 67-85:**

```php
private function createOrEdit(Request $request, ?Page $page = null): Response
{
    $isEdit = $page !== null;
    
    // NOUVEAU: Gérer le changement de langue temporaire
    if ($request->query->has('language')) {
        $languageCode = $request->query->get('language');
        $language = $this->languageService->getLanguageFromCode($languageCode);
        if ($language) {
            $this->languageService->setCurrentLanguage($language);
        }
    }
    
    $currentLanguage = $this->languageService->getCurrentLanguage();
    
    if (!$isEdit) {
        $page = new Page();
        $page->setAuthor($this->getUser());
    }
    
    // Reste du code existant...
}
```

### Fichier: `/src/Controller/Admin/PostController.php`

**Modifier la méthode `createOrEdit()` aux lignes 110-130:**

```php
private function createOrEdit(Request $request, ?Post $post = null): Response
{
    $isEdit = $post !== null;
    
    // NOUVEAU: Gérer le changement de langue temporaire
    if ($request->query->has('language')) {
        $languageCode = $request->query->get('language');
        $language = $this->languageService->getLanguageFromCode($languageCode);
        if ($language) {
            $this->languageService->setCurrentLanguage($language);
        }
    }
    
    $currentLanguage = $this->languageService->getCurrentLanguage();
    
    if (!$isEdit) {
        $post = new Post();
        $post->setAuthor($this->getUser());
    }
    
    // Reste du code existant...
}
```

## Solution 3: EventListener (Solution avancée)

### Nouveau fichier: `/src/EventListener/LanguageRequestListener.php`

```php
<?php

namespace App\EventListener;

use App\Service\LanguageService;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

#[AsEventListener(event: KernelEvents::REQUEST, priority: 10)]
class LanguageRequestListener
{
    public function __construct(
        private readonly LanguageService $languageService
    ) {
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        
        // Vérifier uniquement les routes d'administration
        if (!str_starts_with($request->getPathInfo(), '/admin/')) {
            return;
        }

        // Gérer le paramètre ?language=
        if ($request->query->has('language')) {
            $languageCode = $request->query->get('language');
            $language = $this->languageService->getLanguageFromCode($languageCode);
            if ($language) {
                $this->languageService->setCurrentLanguage($language);
            }
        }
    }
}
```

### Configuration pour l'EventListener (si nécessaire)

Ajouter dans `/config/services.yaml` si l'auto-configuration ne fonctionne pas:

```yaml
services:
    App\EventListener\LanguageRequestListener:
        tags:
            - { name: kernel.event_listener, event: kernel.request, priority: 10 }
```

## Tests recommandés

### Nouveau fichier: `/tests/Controller/Admin/LanguageSelectionTest.php`

```php
<?php

namespace App\Tests\Controller\Admin;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class LanguageSelectionTest extends WebTestCase
{
    public function testLanguageParameterInPageForm(): void
    {
        $client = static::createClient();
        
        // Créer un utilisateur admin et se connecter
        // ...
        
        // Tester avec paramètre ?language=en
        $crawler = $client->request('GET', '/admin/pages/new?language=en');
        $this->assertResponseIsSuccessful();
        
        // Vérifier que la langue anglaise est sélectionnée
        $this->assertSelectorTextContains('.language-selector .dropdown-toggle', 'English');
    }
    
    public function testLanguageParameterInPostForm(): void
    {
        $client = static::createClient();
        
        // Tester avec paramètre ?language=fr
        $crawler = $client->request('GET', '/admin/posts/new?language=fr');
        $this->assertResponseIsSuccessful();
        
        // Vérifier que la langue française est sélectionnée
        $this->assertSelectorTextContains('.language-selector .dropdown-toggle', 'Français');
    }
    
    public function testInvalidLanguageParameter(): void
    {
        $client = static::createClient();
        
        // Tester avec paramètre invalide
        $crawler = $client->request('GET', '/admin/pages/new?language=invalid');
        $this->assertResponseIsSuccessful();
        
        // Vérifier que la langue par défaut est utilisée
        // (dépend de votre configuration)
    }
}
```

## Recommandation d'implémentation

**Étape 1:** Implémenter la Solution 1 (modification du LanguageService)
**Étape 2:** Tester manuellement avec `?language=en` et `?language=fr`
**Étape 3:** Ajouter les tests automatisés
**Étape 4:** Optionnellement implémenter la Solution 3 (EventListener) pour une approche plus élégante

**Note:** La Solution 2 (modification des contrôleurs) n'est pas nécessaire si la Solution 1 est implémentée correctement.
