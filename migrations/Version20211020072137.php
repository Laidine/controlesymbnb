<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211020072137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638EEF3311');
        $this->addSql('DROP INDEX IDX_4C62E638EEF3311 ON contact');
        $this->addSql('ALTER TABLE contact DROP catego_id, CHANGE categorie catego VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD catego_id INT NOT NULL, CHANGE catego categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638EEF3311 FOREIGN KEY (catego_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638EEF3311 ON contact (catego_id)');
    }
}
