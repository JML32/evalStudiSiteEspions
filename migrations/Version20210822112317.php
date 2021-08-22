<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822112317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE missions_specialities (missions_id INT NOT NULL, specialities_id INT NOT NULL, INDEX IDX_93096DF117C042CF (missions_id), INDEX IDX_93096DF1804698D6 (specialities_id), PRIMARY KEY(missions_id, specialities_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE missions_specialities ADD CONSTRAINT FK_93096DF117C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_specialities ADD CONSTRAINT FK_93096DF1804698D6 FOREIGN KEY (specialities_id) REFERENCES specialities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EE1FEFFD');
        $this->addSql('DROP INDEX IDX_34F1D47EE1FEFFD ON missions');
        $this->addSql('ALTER TABLE missions DROP required_speciality_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE missions_specialities');
        $this->addSql('ALTER TABLE missions ADD required_speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47EE1FEFFD FOREIGN KEY (required_speciality_id) REFERENCES specialities (id)');
        $this->addSql('CREATE INDEX IDX_34F1D47EE1FEFFD ON missions (required_speciality_id)');
    }
}
