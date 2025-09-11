# Guide de Démarrage SymfPress

## 🚀 Démarrage Rapide

### Prérequis
- PHP 8.2+
- Composer
- SQLite (intégré à PHP)

### Installation

1. **Démarrer le serveur de développement**
   ```bash
   cd /workspace/symfpress
   php -S 127.0.0.1:8000 -t public/
   ```

2. **Accéder à l'administration**
   - URL : http://127.0.0.1:8000/admin/
   - Email : admin@symfpress.local
   - Mot de passe : admin123

## 📋 Fonctionnalités Disponibles

### Interface d'Administration
- **Dashboard** - Vue d'ensemble avec statistiques
- **Articles** - Rédaction et publication de contenu
- **Pages** - Création de pages statiques
- **Médias** - Gestionnaire de fichiers
- **Commentaires** - Modération des commentaires
- **Catégories** - Organisation hiérarchique du contenu
- **Tags** - Étiquetage du contenu
- **Menus** - Construction de menus de navigation
- **Utilisateurs** - Gestion des comptes et rôles

### Support Multilingue
- **Français** (par défaut)
- **Anglais**
- **Espagnol**

Changement de langue via le sélecteur dans l'interface admin.

## 👥 Système de Rôles

### Hiérarchie des Permissions
1. **Abonné** - Lecture seule
2. **Contributeur** - Création de contenu (brouillons)
3. **Auteur** - Publication de ses propres articles
4. **Éditeur** - Gestion complète du contenu
5. **Administrateur** - Gestion des utilisateurs et configuration
6. **Super Administrateur** - Accès total

### Comptes de Test
- **admin@symfpress.local** / admin123 (Super Admin)
- **author@symfpress.local** / author123 (Auteur) - *Si configuré*

## 🏗️ Architecture

### Base de Données
- **Type** : SQLite
- **Fichier** : `var/data.db`
- **Migration** : Automatique au premier accès

### Structure des Fichiers
```
symfpress/
├── src/
│   ├── Controller/Admin/     # Contrôleurs d'administration
│   ├── Entity/              # Entités Doctrine
│   └── Repository/          # Repositories Doctrine
├── templates/admin/         # Templates d'administration
├── public/uploads/          # Fichiers uploadés
└── var/data.db             # Base de données SQLite
```

## 🎨 Personnalisation

### Thème Administration
- **Framework** : Bootstrap 5
- **Fichiers** : `templates/admin/`
- **Styles** : Intégrés dans les templates

### Configuration
- **Langues** : `src/Entity/Language.php`
- **Rôles** : `src/Entity/User.php`
- **Menus** : Interface admin `/admin/menus`

## 🔧 Développement

### Commandes Utiles
```bash
# Démarrer le serveur
php -S 127.0.0.1:8000 -t public/

# Console Symfony
php bin/console

# Cache
php bin/console cache:clear

# Migrations
php bin/console doctrine:migrations:migrate
```

### Structure MVC
- **Modèles** : Entités Doctrine dans `src/Entity/`
- **Vues** : Templates Twig dans `templates/`
- **Contrôleurs** : Classes dans `src/Controller/`

## 📚 Utilisation

### Créer du Contenu
1. **Article** : Admin → Articles → Nouveau
2. **Page** : Admin → Pages → Nouvelle
3. **Catégorie** : Admin → Catégories → Nouvelle

### Gérer les Menus
1. Admin → Menus
2. Sélectionner l'emplacement
3. Ajouter des éléments
4. Réorganiser par glisser-déposer

### Gérer les Utilisateurs
1. Admin → Utilisateurs
2. Créer/modifier des comptes
3. Attribuer des rôles
4. Activer/désactiver

## 🛠️ Dépannage

### Problèmes Courants

**Base de données introuvable**
```bash
# Vérifier les permissions
chmod 755 var/
chmod 664 var/data.db
```

**Erreur de permissions**
```bash
# Recréer le cache
php bin/console cache:clear
chmod -R 755 var/cache/
```

**Assets manquants**
```bash
# Compiler les assets
npm install
npm run build
```

### Logs
- **Fichiers** : `var/log/`
- **Niveau** : Configuré dans `.env`

## 🔒 Sécurité

### Bonnes Pratiques
- Changer les mots de passe par défaut
- Utiliser HTTPS en production
- Sauvegarder régulièrement la base
- Mettre à jour les dépendances

### Configuration Production
```env
APP_ENV=prod
APP_DEBUG=false
```

## 📖 Documentation

### Ressources
- **Symfony** : https://symfony.com/doc/
- **Doctrine** : https://www.doctrine-project.org/
- **Twig** : https://twig.symfony.com/
- **Bootstrap** : https://getbootstrap.com/

### Support
Pour toute question technique, consulter la documentation Symfony ou créer une issue sur le projet.

---

**Version** : 1.0.0  
**Dernière mise à jour** : 10 septembre 2025