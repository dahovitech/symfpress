<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration pour créer la table setting
 */
final class Version20241212000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table setting pour stocker les paramètres de configuration';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE setting (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
            setting_key VARCHAR(255) NOT NULL, 
            setting_value TEXT DEFAULT NULL, 
            description TEXT DEFAULT NULL, 
            created_at DATETIME NOT NULL, 
            updated_at DATETIME DEFAULT NULL
        )');
        
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SETTING_KEY ON setting (setting_key)');
        
        // Insérer le paramètre de thème par défaut
        $this->addSql("INSERT INTO setting (setting_key, setting_value, description, created_at) 
                      VALUES ('active_theme', 'modern-blog', 'Nom du thème actuellement actif', datetime('now'))");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE setting');
    }
}
