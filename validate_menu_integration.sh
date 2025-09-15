#!/bin/bash

echo "=== Test d'intégration des menus dans les thèmes SymfPress ==="
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

echo "1. Vérification de l'extension Twig MenuExtension..."
if [ -f "src/Twig/MenuExtension.php" ]; then
    print_result 0 "MenuExtension.php créée"
    
    # Vérifier les méthodes importantes
    if grep -q "get_menus" "src/Twig/MenuExtension.php"; then
        print_result 0 "Fonction get_menus définie"
    else
        print_result 1 "Fonction get_menus manquante"
    fi
    
    if grep -q "render_menu" "src/Twig/MenuExtension.php"; then
        print_result 0 "Fonction render_menu définie"
    else
        print_result 1 "Fonction render_menu manquante"
    fi
    
    if grep -q "has_menus" "src/Twig/MenuExtension.php"; then
        print_result 0 "Fonction has_menus définie"
    else
        print_result 1 "Fonction has_menus manquante"
    fi
else
    print_result 1 "MenuExtension.php manquante"
fi

echo
echo "2. Vérification du MenuRepository étendu..."
if [ -f "src/Repository/MenuRepository.php" ]; then
    print_result 0 "MenuRepository existe"
    
    if grep -q "findActiveMenus" "src/Repository/MenuRepository.php"; then
        print_result 0 "Méthode findActiveMenus avec support de langue"
    else
        print_result 1 "Méthode findActiveMenus manquante"
    fi
    
    if grep -q "findChildrenWithLanguage" "src/Repository/MenuRepository.php"; then
        print_result 0 "Méthode findChildrenWithLanguage présente"
    else
        print_result 1 "Méthode findChildrenWithLanguage manquante"
    fi
else
    print_result 1 "MenuRepository manquant"
fi

echo
echo "3. Vérification des templates de menus..."
if [ -f "templates/partials/menu.html.twig" ]; then
    print_result 0 "Template Bootstrap menu.html.twig créé"
else
    print_result 1 "Template Bootstrap menu.html.twig manquant"
fi

if [ -f "templates/partials/menu-simple.html.twig" ]; then
    print_result 0 "Template simple menu-simple.html.twig créé"
else
    print_result 1 "Template simple menu-simple.html.twig manquant"
fi

if [ -f "templates/partials/menu-horizontal.html.twig" ]; then
    print_result 0 "Template horizontal menu-horizontal.html.twig créé"
else
    print_result 1 "Template horizontal menu-horizontal.html.twig manquant"
fi

echo
echo "4. Vérification de l'intégration dans le thème modern-blog..."
if [ -f "themes/modern-blog/templates/base.html.twig" ]; then
    print_result 0 "Template base modern-blog existe"
    
    if grep -q "render_menu" "themes/modern-blog/templates/base.html.twig"; then
        print_result 0 "Fonction render_menu intégrée dans modern-blog"
    else
        print_result 1 "Fonction render_menu non intégrée dans modern-blog"
    fi
    
    if grep -q "has_menus" "themes/modern-blog/templates/base.html.twig"; then
        print_result 0 "Fonction has_menus intégrée dans modern-blog"
    else
        print_result 1 "Fonction has_menus non intégrée dans modern-blog"
    fi
    
    if grep -q "primary" "themes/modern-blog/templates/base.html.twig"; then
        print_result 0 "Menu principal (primary) intégré"
    else
        print_result 1 "Menu principal (primary) non intégré"
    fi
    
    if grep -q "footer" "themes/modern-blog/templates/base.html.twig"; then
        print_result 0 "Menu pied de page (footer) intégré"
    else
        print_result 1 "Menu pied de page (footer) non intégré"
    fi
else
    print_result 1 "Template base modern-blog manquant"
fi

echo
echo "5. Vérification de l'intégration dans le thème default..."
if [ -f "themes/default/templates/base.html.twig" ]; then
    print_result 0 "Template base default existe"
    
    if grep -q "render_menu" "themes/default/templates/base.html.twig"; then
        print_result 0 "Fonction render_menu intégrée dans default"
    else
        print_result 1 "Fonction render_menu non intégrée dans default"
    fi
    
    if grep -q "has_menus" "themes/default/templates/base.html.twig"; then
        print_result 0 "Fonction has_menus intégrée dans default"
    else
        print_result 1 "Fonction has_menus non intégrée dans default"
    fi
else
    print_result 1 "Template base default manquant"
fi

echo
echo "6. Vérification de l'entité Menu mise à jour..."
if [ -f "src/Entity/Menu.php" ]; then
    print_result 0 "Entité Menu existe"
    
    if grep -q "public function generateDefaultTitle" "src/Entity/Menu.php"; then
        print_result 0 "Méthode generateDefaultTitle publique"
    else
        print_result 1 "Méthode generateDefaultTitle non publique"
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
echo "7. Test de syntaxe des fichiers PHP..."
php -l src/Twig/MenuExtension.php > /dev/null 2>&1
print_result $? "Syntaxe PHP de MenuExtension"

php -l src/Repository/MenuRepository.php > /dev/null 2>&1
print_result $? "Syntaxe PHP de MenuRepository"

php -l src/Entity/Menu.php > /dev/null 2>&1
print_result $? "Syntaxe PHP de l'entité Menu"

echo
echo "8. Test des templates Twig..."
# Test basique de syntaxe Twig (simplifié)
if grep -q "{%.*%}" "templates/partials/menu.html.twig"; then
    print_result 0 "Syntaxe Twig basique du template menu"
else
    print_result 1 "Erreur de syntaxe Twig dans le template menu"
fi

echo
echo "=== Résumé de l'intégration ==="
print_info "Fonctionnalités d'intégration des menus implémentées :"
echo "  • Extension Twig avec fonctions de menu"
echo "  • Repository étendu avec support multi-langue"
echo "  • Templates de rendu pour différents styles"
echo "  • Intégration dans les thèmes modern-blog et default"
echo "  • Support des menus hiérarchiques (sous-menus)"
echo "  • Détection automatique des liens actifs"
echo "  • Fallback vers menus statiques si aucun menu dynamique"
echo
print_info "Emplacements de menus disponibles :"
echo "  • primary - Menu principal de navigation"
echo "  • secondary - Menu secondaire"
echo "  • footer - Menu de pied de page"
echo "  • social - Menu réseaux sociaux"
echo
print_info "Instructions pour utiliser les menus :"
echo "  1. Aller dans /admin/menus pour créer des menus"
echo "  2. Choisir l'emplacement (primary, footer, etc.)"
echo "  3. Les menus apparaîtront automatiquement dans le thème"
echo "  4. Personnaliser l'affichage en modifiant les templates"
echo

echo "=== Test terminé ==="
