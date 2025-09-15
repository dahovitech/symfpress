# SymfPress - CMS Multilingue Symfony

![SymfPress Logo](https://img.shields.io/badge/SymfPress-CMS-blue?style=for-the-badge)
![Symfony](https://img.shields.io/badge/Symfony-7.3-green?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.2-purple?style=for-the-badge)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-pink?style=for-the-badge)

SymfPress est un système de gestion de contenu (CMS) moderne et multilingue, développé avec Symfony 7.3. Il s'inspire de WordPress tout en apportant la robustesse, la sécurité et les performances de Symfony.

## 🚀 Caractéristiques principales

### ✨ Fonctionnalités CMS
- **Articles et Pages** : Gestion complète du contenu avec éditeur riche
- **Système multilingue natif** : Support complet de plusieurs langues
- **Gestion des médias** : Upload, organisation et optimisation automatique
- **Système de commentaires** : Modération et gestion des commentaires
- **Catégories et tags** : Organisation flexible du contenu
- **Menus dynamiques** : Création et gestion de menus hiérarchiques
- **SEO optimisé** : Meta tags, sitemap, URLs personnalisables

### 🎨 Interface d'administration
- **Design moderne** : Interface élégante avec Bootstrap 5
- **Dashboard informatif** : Statistiques et aperçu du contenu
- **Gestion des utilisateurs** : Système de rôles WordPress-like
- **Éditeur WYSIWYG** : Quill.js intégré pour l'édition de contenu
- **Responsive** : Compatible mobile et tablette
- **Traduction en temps réel** : Interface multilingue pour l'administration

### 🔧 Architecture technique
- **Symfony 7.3** : Framework PHP moderne et performant
- **Doctrine ORM** : Gestion de base de données avancée
- **Bootstrap 5** : Framework CSS responsive
- **Webpack Encore** : Compilation et optimisation des assets
- **Système de cache** : Performance optimisée
- **Sécurité intégrée** : Protection CSRF, XSS, injections SQL

## 📋 Prérequis

- **PHP 8.2+** avec extensions : `pdo_mysql`, `mbstring`, `xml`, `zip`, `gd`
- **Composer** : Gestionnaire de dépendances PHP
- **Node.js & NPM** : Pour la compilation des assets
- **MySQL 8.0+** ou **PostgreSQL 13+** ou **SQLite 3**
- **Apache/Nginx** : Serveur web

## 🛠 Installation

### Méthode 1 : Installation avec Docker (Recommandée)

1. **Cloner le projet**
```bash
git clone https://github.com/dahovitech/symfpress.git
cd symfpress
```

2. **Lancer avec Docker Compose**
```bash
docker-compose up -d
```

3. **Accéder à l'application**
- **Site web** : http://localhost:8080
- **Administration** : http://localhost:8080/admin
- **PhpMyAdmin** : http://localhost:8081

4. **Connexion par défaut**
- **Email** : admin@symfpress.local
- **Mot de passe** : admin123 ⚠️ *À modifier en production*

### Méthode 2 : Installation manuelle

1. **Installation des dépendances**
```bash
composer install
npm install
```

2. **Configuration de l'environnement**
```bash
cp .env .env.local
# Éditer .env.local avec vos paramètres de base de données
```

3. **Création de la base de données**
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

4. **Compilation des assets**
```bash
npm run build
```

5. **Lancement du serveur de développement**
```bash
symfony server:start
# ou
php -S localhost:8000 -t public/
```

## 🏗 Structure du projet

```
symfpress/
├── assets/                 # Sources JS/CSS
├── config/                 # Configuration Symfony
├── docker/                 # Configuration Docker
├── migrations/             # Migrations de base de données
├── public/                 # Point d'entrée web
│   ├── uploads/           # Fichiers uploadés
│   └── build/             # Assets compilés
├── src/
│   ├── Controller/        # Contrôleurs
│   │   ├── Admin/        # Administration
│   │   └── Frontend/     # Site public
│   ├── Entity/           # Entités Doctrine
│   ├── Repository/       # Repositories
│   ├── Service/          # Services métier
│   ├── EventListener/    # Écouteurs d'événements
│   └── Security/         # Authentification
├── templates/            # Templates Twig
│   ├── admin/           # Interface d'administration
│   └── frontend/        # Site public
└── translations/        # Fichiers de traduction
```

## 🗄 Modèle de données

### Entités principales
- **Language** : Gestion des langues
- **User** : Utilisateurs avec rôles WordPress-like
- **Post/PostTranslation** : Articles multilingues
- **Page/PageTranslation** : Pages statiques multilingues
- **Category/CategoryTranslation** : Catégories multilingues
- **Tag/TagTranslation** : Tags multilingues
- **Comment** : Système de commentaires
- **Media** : Gestion des fichiers
- **Menu/MenuTranslation** : Menus de navigation
- **PostMeta** : Métadonnées flexibles

### Pattern multilingue
Tous les contenus utilisent le pattern **Entity/EntityTranslation** :
- Entité principale : données non-traduisibles
- Entité de traduction : contenus spécifiques à chaque langue
- Contrainte unique sur (entity_id, language_id)

## 👥 Système de rôles

| Rôle | Permissions |
|------|-------------|
| **SUBSCRIBER** | Lecture seule, commentaires |
| **CONTRIBUTOR** | Écriture d'articles (brouillons) |
| **AUTHOR** | Publication de ses propres articles |
| **EDITOR** | Gestion complète du contenu |
| **ADMIN** | Administration complète |
| **SUPER_ADMIN** | Accès système complet |

## 🌐 Gestion multilingue

### Configuration des langues
1. Accéder à l'administration
2. Aller dans **Langues**
3. Ajouter/modifier les langues
4. Définir la langue par défaut

### Traduction du contenu
1. Créer un contenu dans la langue par défaut
2. Utiliser le sélecteur de langue dans l'administration
3. Ajouter les traductions pour chaque langue active

### URLs multilingues
- Langue par défaut : `/article/mon-slug`
- Autres langues : `/en/article/my-slug`

## 🎨 Personnalisation

### Thèmes et templates
- **Templates Twig** : `templates/frontend/`
- **Styles CSS** : `assets/styles/`
- **JavaScript** : `assets/js/`

### Templates de pages disponibles
- `default` : Template par défaut
- `full-width` : Pleine largeur
- `sidebar-left` : Barre latérale à gauche
- `sidebar-right` : Barre latérale à droite
- `landing` : Page d'atterrissage
- `contact` : Page de contact

### Hooks et événements
Utilisez les événements Symfony pour étendre les fonctionnalités :
```php
// EventListener personnalisé
class CustomEntityListener
{
    #[AsEntityListener(event: Events::prePersist)]
    public function prePersist(PrePersistEventArgs $args): void
    {
        // Votre logique personnalisée
    }
}
```

## 📈 Performance

### Optimisations incluses
- **Cache Symfony** : Cache des templates et services
- **Optimisation des images** : Génération automatique de miniatures
- **Compilation des assets** : Minification CSS/JS
- **Cache de base de données** : Optimisation des requêtes

### Monitoring
- **Profiler Symfony** : Disponible en mode développement
- **Logs** : Système de logs détaillé
- **Métriques** : Compteurs de vues, statistiques d'utilisation

## 🔒 Sécurité

### Mesures de sécurité
- **Authentification** : Système sécurisé avec remember-me
- **CSRF Protection** : Protection contre les attaques CSRF
- **XSS Prevention** : Échappement automatique des données
- **SQL Injection** : Protection via Doctrine ORM
- **Validation** : Validation stricte des données
- **Headers de sécurité** : Configuration automatique

### Recommandations production
1. Changer les mots de passe par défaut
2. Utiliser HTTPS
3. Configurer un firewall
4. Mettre en place des sauvegardes régulières
5. Surveiller les logs de sécurité

## 🚀 Déploiement

### Déploiement avec Docker
```bash
# Production
docker-compose -f docker-compose.prod.yml up -d
```

### Déploiement traditionnel
1. **Upload des fichiers** sur le serveur
2. **Configuration** de la base de données
3. **Installation des dépendances** :
```bash
composer install --no-dev --optimize-autoloader
npm run build
```
4. **Configuration du serveur web**
5. **Permissions** :
```bash
chmod -R 775 var/ public/uploads/
chown -R www-data:www-data var/ public/uploads/
```

## 🧪 Tests

```bash
# Tests unitaires
php bin/phpunit

# Tests d'intégration
php bin/phpunit --group integration

# Analyse statique
vendor/bin/phpstan analyse
```

## 📚 Documentation API

### Endpoints principaux
- `GET /api/posts` : Liste des articles
- `GET /api/posts/{slug}` : Détail d'un article
- `GET /api/pages/{slug}` : Détail d'une page
- `GET /api/categories` : Liste des catégories
- `GET /api/tags` : Liste des tags

### Services principaux
- **LanguageService** : Gestion des langues
- **MediaService** : Gestion des médias
- **SlugService** : Génération de slugs

## 🤝 Contribution

1. Fork du projet
2. Créer une branche feature (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commit des changements (`git commit -am 'Ajout nouvelle fonctionnalité'`)
4. Push vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Créer une Pull Request

### Standards de code
- **PSR-12** : Standard de codage PHP
- **Symfony Coding Standards** : Conventions Symfony
- **Tests** : Couverture minimale de 80%
- **Documentation** : Commentaires PHPDoc obligatoires

## 📜 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🆘 Support

- **Documentation** : [Wiki du projet](wiki)
- **Issues** : [GitHub Issues](issues)
- **Discussions** : [GitHub Discussions](discussions)
- **Email** : support@symfpress.local

## 👨‍💻 Auteur

**Prudence ASSOGBA**  
*Développeur Full-Stack & Architecte Symfony*  
*Société: dahovi*

📧 Email: jprud67@gmail.com  
🐙 GitHub: [@dahovitech](https://github.com/dahovitech)

## 🙏 Remerciements

- **Symfony** : Framework PHP extraordinaire
- **WordPress** : Inspiration pour l'expérience utilisateur
- **Bootstrap** : Framework CSS
- **Doctrine** : ORM puissant
- **Twig** : Moteur de templates élégant

---

**Développé avec ❤️ en utilisant Symfony 7.3**

*SymfPress - Là où Symfony rencontre la simplicité de WordPress*