<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114092756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, comment LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, avis_id INT DEFAULT NULL, genre_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, autor VARCHAR(255) NOT NULL, summarize LONGTEXT NOT NULL, duration INT NOT NULL, INDEX IDX_CEECCA51197E709F (avis_id), UNIQUE INDEX UNIQ_CEECCA514296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, genres_id INT DEFAULT NULL, avis_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, autor VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, summarize LONGTEXT NOT NULL, duration INT NOT NULL, nbrepisodes INT NOT NULL, nbrseasons INT NOT NULL, INDEX IDX_3A10012D6A3B2603 (genres_id), INDEX IDX_3A10012D197E709F (avis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA51197E709F FOREIGN KEY (avis_id) REFERENCES avis (id)');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA514296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D6A3B2603 FOREIGN KEY (genres_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D197E709F FOREIGN KEY (avis_id) REFERENCES avis (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA51197E709F');
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA514296D31F');
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D6A3B2603');
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012D197E709F');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE series');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
