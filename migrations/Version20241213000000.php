<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Création des tables pour le système de widgets
 */
final class Version20241213000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création des tables widget_zones et widgets pour le système de widgets';
    }

    public function up(Schema $schema): void
    {
        // Table widget_zones
        $this->addSql('CREATE TABLE widget_zones (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
            name VARCHAR(100) NOT NULL, 
            title VARCHAR(150) NOT NULL, 
            description TEXT DEFAULT NULL, 
            is_active INTEGER DEFAULT 1 NOT NULL, 
            theme VARCHAR(50) DEFAULT NULL, 
            settings TEXT NOT NULL, 
            created_at DATETIME NOT NULL, 
            updated_at DATETIME NOT NULL, 
            UNIQUE(name)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_widget_zones_name ON widget_zones (name)');

        // Table widgets
        $this->addSql('CREATE TABLE widgets (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
            zone_id INTEGER NOT NULL, 
            name VARCHAR(100) NOT NULL, 
            type VARCHAR(50) NOT NULL, 
            content TEXT DEFAULT NULL, 
            settings TEXT NOT NULL, 
            sort_order INTEGER DEFAULT 0 NOT NULL, 
            is_active INTEGER DEFAULT 1 NOT NULL, 
            theme VARCHAR(50) DEFAULT NULL, 
            created_at DATETIME NOT NULL, 
            updated_at DATETIME NOT NULL
        )');
        $this->addSql('CREATE INDEX IDX_widgets_zone_id ON widgets (zone_id)');
        $this->addSql('CREATE INDEX IDX_widgets_type ON widgets (type)');
        $this->addSql('CREATE INDEX IDX_widgets_active ON widgets (is_active)');
        $this->addSql('CREATE INDEX IDX_widgets_sort ON widgets (sort_order)');

        // Clé étrangère - créée séparément pour SQLite
        // SQLite ne supporte pas ALTER TABLE ADD CONSTRAINT, la contrainte sera gérée au niveau application

        // Insertion des zones par défaut
        $this->addSql("INSERT INTO widget_zones (name, title, description, is_active, theme, settings, created_at, updated_at) VALUES ('sidebar', 'Barre laterale', 'Zone laterale principale', 1, NULL, '{}', datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO widget_zones (name, title, description, is_active, theme, settings, created_at, updated_at) VALUES ('header', 'En-tete', 'Zone d''en-tete du site', 1, NULL, '{}', datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO widget_zones (name, title, description, is_active, theme, settings, created_at, updated_at) VALUES ('footer', 'Pied de page', 'Zone de pied de page', 1, NULL, '{}', datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO widget_zones (name, title, description, is_active, theme, settings, created_at, updated_at) VALUES ('content_top', 'Haut du contenu', 'Zone au-dessus du contenu principal', 1, NULL, '{}', datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO widget_zones (name, title, description, is_active, theme, settings, created_at, updated_at) VALUES ('content_bottom', 'Bas du contenu', 'Zone en dessous du contenu principal', 1, NULL, '{}', datetime('now'), datetime('now'))");

        // Insertion de quelques widgets d'exemple
        $this->addSql("INSERT INTO widgets (zone_id, name, type, content, settings, sort_order, is_active, theme, created_at, updated_at) SELECT z.id, 'Widget de recherche', 'search', NULL, '{}', 1, 1, NULL, datetime('now'), datetime('now') FROM widget_zones z WHERE z.name = 'sidebar'");
        
        $this->addSql("INSERT INTO widgets (zone_id, name, type, content, settings, sort_order, is_active, theme, created_at, updated_at) SELECT z.id, 'Articles recents', 'recent_posts', NULL, '{\"limit\": 5, \"show_date\": true, \"show_excerpt\": false}', 2, 1, NULL, datetime('now'), datetime('now') FROM widget_zones z WHERE z.name = 'sidebar'");
        
        $this->addSql("INSERT INTO widgets (zone_id, name, type, content, settings, sort_order, is_active, theme, created_at, updated_at) SELECT z.id, 'Bienvenue', 'text', '<h3>Bienvenue sur notre site</h3><p>Decouvrez nos derniers articles et restez informe de toutes nos actualites.</p>', '{}', 1, 1, NULL, datetime('now'), datetime('now') FROM widget_zones z WHERE z.name = 'content_top'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE widgets');
        $this->addSql('DROP TABLE widget_zones');
    }
}
