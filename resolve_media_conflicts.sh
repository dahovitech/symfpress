#!/bin/bash

# Script de résolution automatique des conflits média
# Auteur: Prudence ASSOGBA <jprud67@gmail.com>
# Date: 2025-09-14 12:53:42

echo "🔧 Résolution automatique des conflits de merge - Corrections Média"
echo "================================================================"

# Vérifier si on est dans un état de merge
if [ ! -f .git/MERGE_HEAD ]; then
    echo "❌ Aucun merge en cours détecté."
    echo "💡 Si vous avez des conflits, exécutez d'abord:"
    echo "   git pull origin dev"
    exit 1
fi

echo "📁 Conflits détectés dans les fichiers média..."

# Lister les fichiers en conflit
echo "📋 Fichiers en conflit:"
git diff --name-only --diff-filter=U

echo ""
echo "🚀 Résolution automatique en cours..."

# Résoudre les conflits en gardant NOTRE version (corrections)
FILES_TO_RESOLVE=(
    "src/Form/PostType.php"
    "templates/admin/media/index.html.twig"
    "templates/admin/media/selector.html.twig"
    "templates/admin/posts/form.html.twig"
)

for file in "${FILES_TO_RESOLVE[@]}"; do
    if git diff --name-only --diff-filter=U | grep -q "$file"; then
        echo "✅ Résolution de $file (garde nos corrections)"
        git checkout --ours "$file"
        git add "$file"
    else
        echo "ℹ️  $file - pas de conflit détecté"
    fi
done

# Vérifier s'il reste des conflits
REMAINING_CONFLICTS=$(git diff --name-only --diff-filter=U | wc -l)

if [ $REMAINING_CONFLICTS -eq 0 ]; then
    echo ""
    echo "✅ Tous les conflits média ont été résolus automatiquement!"
    echo "📝 Création du commit de résolution..."
    
    git commit -m "Résolution conflits : Préservation corrections bugs média
    
    - Correction query builder PostType (mimeType, createdAt)
    - Miniatures optimisées avec fallback
    - Interface de sélection améliorée
    - Gestion d'erreurs robuste
    
    Co-authored-by: Prudence ASSOGBA <jprud67@gmail.com>"
    
    echo "🚀 Push vers la branche dev..."
    git push origin dev
    
    echo ""
    echo "🎉 Résolution terminée avec succès!"
    echo "📊 Vérifications recommandées:"
    echo "   - Tester la sélection d'images mise en avant"
    echo "   - Vérifier l'affichage des miniatures"
    echo "   - Contrôler les fallbacks d'images"
    
else
    echo ""
    echo "⚠️  Il reste $REMAINING_CONFLICTS conflit(s) à résoudre manuellement:"
    git diff --name-only --diff-filter=U
    echo ""
    echo "📖 Consultez RESOLUTION_CONFLITS_MEDIA.md pour la résolution manuelle"
    echo "🔧 Ou utilisez votre éditeur pour résoudre les marqueurs <<<<<<< ======= >>>>>>>"
fi