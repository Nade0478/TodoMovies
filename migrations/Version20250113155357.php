<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250113155357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, comment LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE series ADD genres_id INT DEFAULT NULL, ADD avis_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D6A3B2603 FOREIGN KEY (genres_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D197E709F FOREIGN KEY (avis_id) REFERENCES avis (id)');
        $this->addSql('CREATE INDEX IDX_3A10012D6A3B2603 ON series (genres_id)');
        $this->addSql('CREATE INDEX IDX_3A10012D197E709F ON series (avis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D197E709F');
        $this->addSql('DROP TABLE avis');
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D6A3B2603');
        $this->addSql('DROP INDEX IDX_3A10012D6A3B2603 ON series');
        $this->addSql('DROP INDEX IDX_3A10012D197E709F ON series');
        $this->addSql('ALTER TABLE series DROP genres_id, DROP avis_id');
    }
}
