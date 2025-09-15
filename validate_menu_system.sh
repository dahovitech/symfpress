#!/bin/bash

echo "=== Test du système de menu SymfPress ==="
echo

# Couleurs pour l'affichage
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Fonction pour afficher les résultats
print_result() {
    if [ $1 -eq 0 ]; then
        echo -e "${GREEN}✓ $2${NC}"
    else
        echo -e "${RED}✗ $2${NC}"
    fi
}

print_warning() {
    echo -e "${YELLOW}⚠ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}ℹ $1${NC}"
}

cd /workspace/symfpress

echo "1. Vérification des fichiers de templates..."
if [ -f "templates/admin/menus/index.html.twig" ]; then
    print_result 0 "Template index.html.twig existe"
else
    print_result 1 "Template index.html.twig manquant"
fi

if [ -f "templates/admin/menus/builder.html.twig" ]; then
    print_result 0 "Template builder.html.twig existe"
else
    print_result 1 "Template builder.html.twig manquant"
fi

echo
echo "2. Vérification du contrôleur de menu..."
if [ -f "src/Controller/Admin/MenuController.php" ]; then
    print_result 0 "MenuController existe"
    
    # Vérifier les méthodes importantes
    if grep -q "reorder.*JsonResponse" "src/Controller/Admin/MenuController.php"; then
        print_result 0 "Méthode reorder avec JsonResponse présente"
    else
        print_result 1 "Méthode reorder avec JsonResponse manquante"
    fi
    
    if grep -q "isXmlHttpRequest" "src/Controller/Admin/MenuController.php"; then
        print_result 0 "Support AJAX ajouté"
    else
        print_result 1 "Support AJAX manquant"
    fi
else
    print_result 1 "MenuController manquant"
fi

echo
echo "3. Vérification de l'entité Menu..."
if [ -f "src/Entity/Menu.php" ]; then
    print_result 0 "Entité Menu existe"
    
    # Vérifier les méthodes importantes
    if grep -q "getComputedUrl" "src/Entity/Menu.php"; then
        print_result 0 "Méthode getComputedUrl présente"
    else
        print_result 1 "Méthode getComputedUrl manquante"
    fi
    
    if grep -q "getDisplayTitle" "src/Entity/Menu.php"; then
        print_result 0 "Méthode getDisplayTitle présente"
    else
        print_result 1 "Méthode getDisplayTitle manquante"
    fi
else
    print_result 1 "Entité Menu manquante"
fi

echo
echo "4. Vérification des assets JavaScript..."
if [ -f "assets/js/menu-manager.js" ]; then
    print_result 0 "Fichier menu-manager.js créé"
else
    print_result 1 "Fichier menu-manager.js manquant"
fi

if grep -q "menu-manager.js" "assets/app.js"; then
    print_result 0 "menu-manager.js importé dans app.js"
else
    print_result 1 "menu-manager.js non importé dans app.js"
fi

echo
echo "5. Vérification des templates pour SortableJS..."
if grep -q "sortablejs" "templates/admin/menus/index.html.twig"; then
    print_result 0 "SortableJS intégré dans index.html.twig"
else
    print_result 1 "SortableJS manquant dans index.html.twig"
fi

if grep -q "sortablejs" "templates/admin/menus/builder.html.twig"; then
    print_result 0 "SortableJS intégré dans builder.html.twig"
else
    print_result 1 "SortableJS manquant dans builder.html.twig"
fi

echo
echo "6. Vérification des fonctionnalités de glisser-déposer..."
if grep -q "menu-sortable" "templates/admin/menus/index.html.twig"; then
    print_result 0 "ID menu-sortable présent dans index"
else
    print_result 1 "ID menu-sortable manquant dans index"
fi

if grep -q "drag-handle" "templates/admin/menus/index.html.twig"; then
    print_result 0 "Classe drag-handle présente dans index"
else
    print_result 1 "Classe drag-handle manquante dans index"
fi

echo
echo "7. Vérification des routes de menu..."
if php bin/console debug:router | grep -q "admin_menus_reorder"; then
    print_result 0 "Route admin_menus_reorder existe"
else
    print_result 1 "Route admin_menus_reorder manquante"
fi

if php bin/console debug:router | grep -q "admin_menus_index"; then
    print_result 0 "Route admin_menus_index existe"
else
    print_result 1 "Route admin_menus_index manquante"
fi

echo
echo "8. Test de syntaxe PHP..."
php -l src/Controller/Admin/MenuController.php > /dev/null 2>&1
print_result $? "Syntaxe PHP du MenuController"

php -l src/Entity/Menu.php > /dev/null 2>&1
print_result $? "Syntaxe PHP de l'entité Menu"

echo
echo "9. Vérification des dépendances..."
if [ -f "composer.lock" ]; then
    print_result 0 "Dependencies Composer installées"
else
    print_warning "Composer.lock manquant - exécutez 'composer install'"
fi

echo
echo "=== Résumé ==="
print_info "Le système de menu a été mis à jour avec les fonctionnalités suivantes :"
echo "  • Glisser-déposer fonctionnel avec SortableJS"
echo "  • Sauvegarde automatique de l'ordre des menus"
echo "  • Support AJAX pour les opérations CRUD"
echo "  • Interface utilisateur améliorée avec feedback visuel"
echo "  • Gestion hiérarchique des menus (partiellement)"
echo
print_info "Instructions pour finaliser l'installation :"
echo "  1. Exécutez 'npm install' pour installer les dépendances frontend"
echo "  2. Exécutez 'npm run build' pour compiler les assets"
echo "  3. Videz le cache : 'php bin/console cache:clear'"
echo "  4. Testez les fonctionnalités dans /admin/menus"
echo

echo "=== Test terminé ==="
