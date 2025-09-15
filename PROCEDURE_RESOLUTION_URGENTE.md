# PROCÉDURE DE RÉSOLUTION URGENTE - Conflits de Merge Média

## 🆘 SITUATION ACTUELLE

Conflits de merge détectés dans les fichiers critiques des corrections média.

## 🚑 ACTIONS IMMÉDIATES

### Étape 1: Vérifier l'état du repository
```bash
cd /path/to/symfpress
git status
```

### Étape 2: Identifier les conflits
```bash
# Lister tous les fichiers en conflit
git diff --name-only --diff-filter=U

# Voir les conflits détaillés
git diff
```

### Étape 3: Résolution AUTOMATIQUE (recommandée)
```bash
# Résoudre en gardant NOS corrections (version HEAD)
git checkout --ours src/Form/PostType.php
git checkout --ours templates/admin/media/index.html.twig
git checkout --ours templates/admin/media/selector.html.twig
git checkout --ours templates/admin/posts/form.html.twig

# Marquer comme résolu
git add .

# Finaliser
git commit -m "Résolution conflits: Préservation corrections bugs média"
git push origin dev
```

### Étape 4: Résolution MANUELLE (si nécessaire)

Si la résolution automatique ne fonctionne pas :

1. **Ouvrir chaque fichier en conflit dans votre éditeur**

2. **Chercher les marqueurs de conflit :**
   ```
   <<<<<<< HEAD
   [Notre version - à GARDER]
   =======
   [Leur version - à SUPPRIMER]
   >>>>>>> branch-name
   ```

3. **Pour chaque conflit, GARDER la section HEAD et SUPPRIMER le reste :**

#### PostType.php - Garder cette version :
```php
->add('featuredImage', EntityType::class, [
    'label' => 'Image mise en avant',
    'class' => Media::class,
    'choice_label' => 'originalName',
    'query_builder' => function (EntityRepository $er) {
        return $er->createQueryBuilder('m')
            ->where('m.mimeType LIKE :type')      // IMPORTANT
            ->setParameter('type', 'image/%')
            ->orderBy('m.createdAt', 'DESC');     // IMPORTANT
    },
    'required' => false,
    'placeholder' => 'Aucune image sélectionnée',
    'attr' => [
        'class' => 'form-select media-selector',
        'data-media-type' => 'images'
    ]
]);
```

#### Templates - Garder les miniatures optimisées :
```twig
{% if media.isImage %}
    {% set thumbnailUrl = path('admin_media_thumbnail', {'id': media.id, 'w': 150, 'h': 150}) %}
    <img src="{{ thumbnailUrl }}" 
         alt="{{ media.alt ?? media.originalName }}" 
         class="w-100 h-100" 
         style="object-fit: cover;"
         onerror="this.onerror=null; this.src='{{ media.url }}';">  {# IMPORTANT: fallback #}
{% else %}
```

4. **Supprimer tous les marqueurs** `<<<<<<<`, `=======`, `>>>>>>>`

5. **Sauvegarder tous les fichiers**

6. **Finaliser :**
   ```bash
   git add .
   git commit -m "Résolution manuelle conflits média"
   git push origin dev
   ```

## 🔍 VÉRIFICATIONS POST-RÉSOLUTION

### Tests Critiques
1. **Accéder à l'admin Symfpress**
2. **Créer/modifier un article**
3. **Tester la sélection d'image mise en avant**
4. **Vérifier la bibliothèque média**
5. **Contrôler l'affichage des miniatures**

### Points de Contrôle
- ✅ Sélecteur d'images fonctionne
- ✅ Miniatures s'affichent correctement
- ✅ Fallback d'images activé
- ✅ Pas d'erreurs JavaScript
- ✅ Interface responsive

## 🆘 EN CAS DE PROBLÈME

### Si la résolution échoue :
```bash
# Annuler le merge
git merge --abort

# Revenir à l'état précédent
git reset --hard HEAD

# Réessayer avec force
git pull origin dev --strategy-option=ours
```

### Si des fonctionnalités sont cassées :
1. Vérifier que nos corrections sont présentes
2. Consulter `CORRECTIONS_APPLIQUEES.md`
3. Réappliquer les corrections manuellement

## 📞 SUPPORT

**Contact :** Prudence ASSOGBA <jprud67@gmail.com>
**Documentation :** `RESOLUTION_CONFLITS_MEDIA.md`
**Script automatique :** `resolve_media_conflicts.sh`

---

## 🚨 NOTE IMPORTANTE

Ces corrections résolvent des bugs critiques :
- Sélection d'images mise en avant
- Affichage des fichiers média
- Gestion d'erreurs robuste

**Il est ESSENTIEL de préserver ces corrections lors de la résolution des conflits.**

---
*Procédure d'urgence créée le 2025-09-14 12:53:42*