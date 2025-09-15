<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration SQLite pour SymfPress
 * Crée toutes les tables nécessaires au fonctionnement du CMS
 */
final class Version20241210000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création des tables initiales pour SymfPress CMS (SQLite)';
    }

    public function up(Schema $schema): void
    {
        // Création de la table language
        $this->addSql('CREATE TABLE language (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            code VARCHAR(10) NOT NULL,
            name VARCHAR(100) NOT NULL,
            is_default BOOLEAN NOT NULL DEFAULT 0,
            is_active BOOLEAN NOT NULL DEFAULT 1
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CODE ON language (code)');

        // Création de la table user
        $this->addSql('CREATE TABLE "user" (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            email VARCHAR(180) NOT NULL,
            username VARCHAR(100) NOT NULL,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            roles CLOB NOT NULL,
            password VARCHAR(255) NOT NULL,
            is_active BOOLEAN NOT NULL DEFAULT 1,
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            last_login_at DATETIME DEFAULT NULL,
            bio CLOB DEFAULT NULL,
            website VARCHAR(255) DEFAULT NULL,
            avatar VARCHAR(255) DEFAULT NULL
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EMAIL ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_USERNAME ON "user" (username)');

        // Création de la table media
        $this->addSql('CREATE TABLE media (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            uploaded_by_id INTEGER NOT NULL,
            filename VARCHAR(255) NOT NULL,
            original_name VARCHAR(255) NOT NULL,
            mime_type VARCHAR(100) NOT NULL,
            file_size INTEGER NOT NULL,
            path VARCHAR(255) NOT NULL,
            url VARCHAR(255) DEFAULT NULL,
            alt VARCHAR(255) DEFAULT NULL,
            description CLOB DEFAULT NULL,
            caption CLOB DEFAULT NULL,
            width INTEGER DEFAULT NULL,
            height INTEGER DEFAULT NULL,
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            FOREIGN KEY (uploaded_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_UPLOADED_BY ON media (uploaded_by_id)');

        // Création de la table category
        $this->addSql('CREATE TABLE category (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            parent_id INTEGER DEFAULT NULL,
            slug VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            menu_order INTEGER NOT NULL DEFAULT 0,
            color VARCHAR(255) DEFAULT NULL,
            icon VARCHAR(255) DEFAULT NULL,
            FOREIGN KEY (parent_id) REFERENCES category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SLUG ON category (slug)');
        $this->addSql('CREATE INDEX IDX_PARENT ON category (parent_id)');

        // Création de la table category_translation
        $this->addSql('CREATE TABLE category_translation (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            category_id INTEGER NOT NULL,
            language_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            description CLOB DEFAULT NULL,
            meta_title VARCHAR(255) DEFAULT NULL,
            meta_description CLOB DEFAULT NULL,
            FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_CATEGORY ON category_translation (category_id)');
        $this->addSql('CREATE INDEX IDX_LANGUAGE ON category_translation (language_id)');
        $this->addSql('CREATE UNIQUE INDEX category_language_unique ON category_translation (category_id, language_id)');

        // Création de la table tag
        $this->addSql('CREATE TABLE tag (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            slug VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            color VARCHAR(255) DEFAULT NULL
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SLUG_TAG ON tag (slug)');

        // Création de la table tag_translation
        $this->addSql('CREATE TABLE tag_translation (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            tag_id INTEGER NOT NULL,
            language_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            description CLOB DEFAULT NULL,
            meta_title VARCHAR(255) DEFAULT NULL,
            meta_description CLOB DEFAULT NULL,
            FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_TAG ON tag_translation (tag_id)');
        $this->addSql('CREATE INDEX IDX_LANGUAGE_TAG ON tag_translation (language_id)');
        $this->addSql('CREATE UNIQUE INDEX tag_language_unique ON tag_translation (tag_id, language_id)');

        // Création de la table post
        $this->addSql('CREATE TABLE post (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            author_id INTEGER NOT NULL,
            featured_image_id INTEGER DEFAULT NULL,
            slug VARCHAR(255) NOT NULL,
            status VARCHAR(20) NOT NULL DEFAULT "draft",
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            published_at DATETIME DEFAULT NULL,
            comment_status BOOLEAN NOT NULL DEFAULT 1,
            view_count INTEGER NOT NULL DEFAULT 0,
            is_featured BOOLEAN NOT NULL DEFAULT 0,
            menu_order INTEGER NOT NULL DEFAULT 0,
            FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (featured_image_id) REFERENCES media (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SLUG_POST ON post (slug)');
        $this->addSql('CREATE INDEX IDX_AUTHOR_POST ON post (author_id)');
        $this->addSql('CREATE INDEX IDX_FEATURED_IMAGE_POST ON post (featured_image_id)');
        $this->addSql('CREATE INDEX IDX_STATUS_POST ON post (status)');
        $this->addSql('CREATE INDEX IDX_PUBLISHED_AT_POST ON post (published_at)');

        // Création de la table post_translation
        $this->addSql('CREATE TABLE post_translation (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            post_id INTEGER NOT NULL,
            language_id INTEGER NOT NULL,
            title VARCHAR(255) NOT NULL,
            content CLOB DEFAULT NULL,
            excerpt CLOB DEFAULT NULL,
            meta_title VARCHAR(255) DEFAULT NULL,
            meta_description CLOB DEFAULT NULL,
            meta_keywords CLOB DEFAULT NULL,
            FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_POST_TRANS ON post_translation (post_id)');
        $this->addSql('CREATE INDEX IDX_LANGUAGE_POST_TRANS ON post_translation (language_id)');
        $this->addSql('CREATE UNIQUE INDEX post_language_unique ON post_translation (post_id, language_id)');

        // Création de la table page
        $this->addSql('CREATE TABLE page (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            parent_id INTEGER DEFAULT NULL,
            author_id INTEGER NOT NULL,
            featured_image_id INTEGER DEFAULT NULL,
            slug VARCHAR(255) NOT NULL,
            status VARCHAR(20) NOT NULL DEFAULT "draft",
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            published_at DATETIME DEFAULT NULL,
            comment_status BOOLEAN NOT NULL DEFAULT 0,
            menu_order INTEGER NOT NULL DEFAULT 0,
            template VARCHAR(50) NOT NULL DEFAULT "default",
            FOREIGN KEY (parent_id) REFERENCES page (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (featured_image_id) REFERENCES media (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SLUG_PAGE ON page (slug)');
        $this->addSql('CREATE INDEX IDX_PARENT_PAGE ON page (parent_id)');
        $this->addSql('CREATE INDEX IDX_AUTHOR_PAGE ON page (author_id)');
        $this->addSql('CREATE INDEX IDX_FEATURED_IMAGE_PAGE ON page (featured_image_id)');
        $this->addSql('CREATE INDEX IDX_STATUS_PAGE ON page (status)');

        // Création de la table page_translation
        $this->addSql('CREATE TABLE page_translation (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            page_id INTEGER NOT NULL,
            language_id INTEGER NOT NULL,
            title VARCHAR(255) NOT NULL,
            content CLOB DEFAULT NULL,
            excerpt CLOB DEFAULT NULL,
            meta_title VARCHAR(255) DEFAULT NULL,
            meta_description CLOB DEFAULT NULL,
            meta_keywords CLOB DEFAULT NULL,
            FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_PAGE_TRANS ON page_translation (page_id)');
        $this->addSql('CREATE INDEX IDX_LANGUAGE_PAGE_TRANS ON page_translation (language_id)');
        $this->addSql('CREATE UNIQUE INDEX page_language_unique ON page_translation (page_id, language_id)');

        // Tables de liaison
        $this->addSql('CREATE TABLE post_category (
            post_id INTEGER NOT NULL,
            category_id INTEGER NOT NULL,
            PRIMARY KEY(post_id, category_id),
            FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_POST_CAT ON post_category (post_id)');
        $this->addSql('CREATE INDEX IDX_CATEGORY_POST ON post_category (category_id)');

        $this->addSql('CREATE TABLE post_tag (
            post_id INTEGER NOT NULL,
            tag_id INTEGER NOT NULL,
            PRIMARY KEY(post_id, tag_id),
            FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_POST_TAG ON post_tag (post_id)');
        $this->addSql('CREATE INDEX IDX_TAG_POST ON post_tag (tag_id)');

        // Création de la table comment
        $this->addSql('CREATE TABLE comment (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            author_id INTEGER DEFAULT NULL,
            post_id INTEGER DEFAULT NULL,
            page_id INTEGER DEFAULT NULL,
            parent_id INTEGER DEFAULT NULL,
            content CLOB NOT NULL,
            status VARCHAR(20) NOT NULL DEFAULT "pending",
            created_at DATETIME NOT NULL,
            updated_at DATETIME DEFAULT NULL,
            author_name VARCHAR(100) DEFAULT NULL,
            author_email VARCHAR(180) DEFAULT NULL,
            author_website VARCHAR(255) DEFAULT NULL,
            author_ip VARCHAR(45) DEFAULT NULL,
            user_agent CLOB DEFAULT NULL,
            FOREIGN KEY (author_id) REFERENCES "user" (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE,
            FOREIGN KEY (parent_id) REFERENCES comment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        )');
        $this->addSql('CREATE INDEX IDX_AUTHOR_COMMENT ON comment (author_id)');
        $this->addSql('CREATE INDEX IDX_POST_COMMENT ON comment (post_id)');
        $this->addSql('CREATE INDEX IDX_PAGE_COMMENT ON comment (page_id)');
        $this->addSql('CREATE INDEX IDX_PARENT_COMMENT ON comment (parent_id)');
        $this->addSql('CREATE INDEX IDX_STATUS_COMMENT ON comment (status)');

        // Insertion des langues par défaut
        $this->addSql('INSERT INTO language (code, name, is_default, is_active) VALUES ("fr", "Français", 1, 1)');
        $this->addSql('INSERT INTO language (code, name, is_default, is_active) VALUES ("en", "English", 0, 1)');
    }

    public function down(Schema $schema): void
    {
        // Suppression dans l'ordre inverse pour respecter les contraintes
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE post_tag');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE page_translation');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE post_translation');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE tag_translation');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE category_translation');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE language');
    }
}
