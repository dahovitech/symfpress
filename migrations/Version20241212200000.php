<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration pour corriger le thème actif par défaut
 * Change 'default' vers 'modern-blog' pour la cohérence
 */
final class Version20241212200000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Correction du thème actif par défaut : default -> modern-blog';
    }

    public function up(Schema $schema): void
    {
        // Mettre à jour la valeur du thème actif si elle est 'default'
        $this->addSql("UPDATE settings SET setting_value = 'modern-blog', updated_at = datetime('now') WHERE setting_key = 'active_theme' AND setting_value = 'default'");
        
        // Au cas où la table s'appelle 'setting' (ancienne version)
        $this->addSql("UPDATE setting SET setting_value = 'modern-blog' WHERE setting_key = 'active_theme' AND setting_value = 'default'");
    }

    public function down(Schema $schema): void
    {
        // Restaurer la valeur par défaut
        $this->addSql("UPDATE settings SET setting_value = 'default', updated_at = datetime('now') WHERE setting_key = 'active_theme' AND setting_value = 'modern-blog'");
        
        $this->addSql("UPDATE setting SET setting_value = 'default' WHERE setting_key = 'active_theme' AND setting_value = 'modern-blog'");
    }
}
