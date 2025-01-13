<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250113160016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films ADD avis_id INT DEFAULT NULL, ADD genre_id INT DEFAULT NULL, DROP genre');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA51197E709F FOREIGN KEY (avis_id) REFERENCES avis (id)');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA514296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_CEECCA51197E709F ON films (avis_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CEECCA514296D31F ON films (genre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA51197E709F');
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA514296D31F');
        $this->addSql('DROP INDEX IDX_CEECCA51197E709F ON films');
        $this->addSql('DROP INDEX UNIQ_CEECCA514296D31F ON films');
        $this->addSql('ALTER TABLE films ADD genre VARCHAR(255) NOT NULL, DROP avis_id, DROP genre_id');
    }
}
