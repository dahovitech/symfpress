# Guide de Résolution des Conflits de Merge - Corrections Média

## Situation
Conflits de merge détectés dans 4 fichiers lors de l'intégration des corrections des bugs de sélection d'images mise en avant et d'affichage des fichiers média.

## Fichiers Concernés
1. `src/Form/PostType.php`
2. `templates/admin/media/index.html.twig`
3. `templates/admin/media/selector.html.twig`
4. `templates/admin/posts/form.html.twig`

## Stratégie de Résolution

### 1. PostType.php - Correction Query Builder

**CORRECTION À PRÉSERVER :**
```php
->add('featuredImage', EntityType::class, [
    'label' => 'Image mise en avant',
    'class' => Media::class,
    'choice_label' => 'originalName',
    'query_builder' => function (EntityRepository $er) {
        return $er->createQueryBuilder('m')
            ->where('m.mimeType LIKE :type')  // CORRECT : mimeType
            ->setParameter('type', 'image/%')
            ->orderBy('m.createdAt', 'DESC');  // CORRECT : createdAt
    },
    'required' => false,
    'placeholder' => 'Aucune image sélectionnée',
    'attr' => [
        'class' => 'form-select media-selector',
        'data-media-type' => 'images'
    ]
]);
```

**ERREURS À ÉVITER :**
- `m.type` au lieu de `m.mimeType`
- `m.uploadedAt` au lieu de `m.createdAt`

### 2. Templates Média - Miniatures Optimisées

**CORRECTION À PRÉSERVER dans index.html.twig et selector.html.twig :**
```twig
{% if media.isImage %}
    {% set thumbnailUrl = path('admin_media_thumbnail', {'id': media.id, 'w': 150, 'h': 150}) %}
    <img src="{{ thumbnailUrl }}" 
         alt="{{ media.alt ?? media.originalName }}" 
         class="w-100 h-100" 
         style="object-fit: cover;"
         onerror="this.onerror=null; this.src='{{ media.url }}';"> 
{% else %}
```

**ÉVITER :**
- Utilisation directe de `media.url` sans fallback
- Pas de génération de miniatures

### 3. Form Posts - Interface Améliorée

**CORRECTION À PRÉSERVER dans form.html.twig :**
```twig
<!-- Image mise en avant -->
<div class="card mt-4">
    <div class="card-header">
        <h6 class="mb-0"><i class="fas fa-image me-1"></i> Image mise en avant</h6>
    </div>
    <div class="card-body">
        <div class="featured-image-selector">
            {{ form_row(form.featuredImage) }}
            <div class="mt-2">
                <button type="button" class="btn btn-outline-primary btn-sm" id="select-featured-image">
                    <i class="fas fa-images me-1"></i>Sélectionner une image
                </button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="remove-featured-image" style="display: none;">
                    <i class="fas fa-trash me-1"></i>Supprimer
                </button>
            </div>
            <div id="featured-image-preview" class="mt-2" style="display: none;">
                <!-- Aperçu de l'image sélectionnée -->
            </div>
        </div>
    </div>
</div>
```

## Commandes de Résolution

### Résolution Automatique
```bash
# 1. Identifier les conflits
git status

# 2. Pour chaque fichier en conflit, garder NOTRE version (corrections)
git checkout --ours src/Form/PostType.php
git checkout --ours templates/admin/media/index.html.twig
git checkout --ours templates/admin/media/selector.html.twig
git checkout --ours templates/admin/posts/form.html.twig

# 3. Marquer comme résolu
git add .

# 4. Finaliser le merge
git commit -m "Résolution conflits : Préservation corrections bugs média"

# 5. Push
git push origin dev
```

### Résolution Manuelle (si nécessaire)

1. **Ouvrir chaque fichier en conflit**
2. **Chercher les marqueurs `<<<<<<<`, `=======`, `>>>>>>>`**
3. **Garder la section entre `<<<<<<< HEAD` et `=======` (nos corrections)**
4. **Supprimer les marqueurs et la section après `=======`**
5. **Sauvegarder le fichier**
6. **Répéter pour tous les fichiers**
7. **Exécuter `git add .` et `git commit`**

## Vérification Post-Résolution

### Tests à Effectuer
1. **Sélection d'images mise en avant** : Vérifier que le sélecteur charge les images
2. **Affichage miniatures** : Vérifier que les miniatures s'affichent correctement
3. **Fallback images** : Tester avec images corrompues
4. **Interface responsive** : Vérifier sur différentes tailles d'écran

### Points de Contrôle
- [ ] Query builder utilise `mimeType` et `createdAt`
- [ ] Miniatures générées avec fallback
- [ ] Interface de sélection avec aperçu
- [ ] Gestion d'erreurs robuste

## Contact

Si des problèmes persistent après résolution :
- Vérifier que toutes les corrections sont préservées
- Tester les fonctionnalités en local
- Commit et push les corrections finales

---
*Généré le 2025-09-14 12:53:42*