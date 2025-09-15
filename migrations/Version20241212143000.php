<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration pour créer la table settings
 * Ajout du système de paramètres de configuration pour SymfPress
 */
final class Version20241212143000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table settings pour la configuration de l\'application et la gestion des thèmes';
    }

    public function up(Schema $schema): void
    {
        // Création de la table settings
        $this->addSql('
            CREATE TABLE settings (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                setting_key VARCHAR(100) NOT NULL,
                setting_value TEXT DEFAULT NULL,
                category VARCHAR(50) DEFAULT NULL,
                description TEXT DEFAULT NULL,
                value_type VARCHAR(20) DEFAULT \'string\' NOT NULL,
                is_public INTEGER DEFAULT 0 NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                UNIQUE(setting_key)
            )
        ');
        
        $this->addSql('CREATE INDEX idx_setting_key ON settings (setting_key)');
        $this->addSql('CREATE INDEX idx_setting_category ON settings (category)');

        // Insertion des paramètres par défaut
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('active_theme', 'modern-blog', 'theme', 'Theme actif de l''application', 'string', 0, datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('site_name', 'SymfPress', 'general', 'Nom du site', 'string', 1, datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('site_description', 'Un CMS moderne base sur Symfony', 'general', 'Description du site', 'string', 1, datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('site_language', 'fr', 'general', 'Langue principale du site', 'string', 1, datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('theme_supports', '[\"menus\",\"widgets\",\"post-thumbnails\"]', 'theme', 'Fonctionnalites supportees par le theme', 'json', 0, datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('widgets_sidebar', '[]', 'theme', 'Configuration des widgets de la sidebar', 'json', 0, datetime('now'), datetime('now'))");
        $this->addSql("INSERT INTO settings (setting_key, setting_value, category, description, value_type, is_public, created_at, updated_at) VALUES ('widgets_footer', '[]', 'theme', 'Configuration des widgets du footer', 'json', 0, datetime('now'), datetime('now'))");
    }

    public function down(Schema $schema): void
    {
        // Suppression de la table settings
        $this->addSql('DROP TABLE settings');
    }
}
