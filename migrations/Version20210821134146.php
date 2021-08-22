<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210821134146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hideouts (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, code INT NOT NULL, address VARCHAR(255) NOT NULL, INDEX IDX_99509BAC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideouts_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hideouts ADD CONSTRAINT FK_99509BAC54C8C93 FOREIGN KEY (type_id) REFERENCES hideouts_type (id)');
        $this->addSql('ALTER TABLE agents CHANGE birth_date birthdate DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hideouts DROP FOREIGN KEY FK_99509BAC54C8C93');
        $this->addSql('DROP TABLE hideouts');
        $this->addSql('DROP TABLE hideouts_type');
        $this->addSql('ALTER TABLE agents CHANGE birthdate birth_date DATE NOT NULL');
    }
}
