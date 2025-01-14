<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114143835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D6A3B2603');
        $this->addSql('DROP INDEX IDX_3A10012D6A3B2603 ON series');
        $this->addSql('ALTER TABLE series DROP genre, CHANGE genres_id genre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_3A10012D4296D31F ON series (genre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D4296D31F');
        $this->addSql('DROP INDEX IDX_3A10012D4296D31F ON series');
        $this->addSql('ALTER TABLE series ADD genre VARCHAR(255) NOT NULL, CHANGE genre_id genres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D6A3B2603 FOREIGN KEY (genres_id) REFERENCES genre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3A10012D6A3B2603 ON series (genres_id)');
    }
}
