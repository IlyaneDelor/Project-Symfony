<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502080210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adresse_interventions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adresse_interventions (id INT NOT NULL, client_id INT DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, codepostal VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_475CC6EA19EB6921 ON adresse_interventions (client_id)');
        $this->addSql('ALTER TABLE adresse_interventions ADD CONSTRAINT FK_475CC6EA19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE adresse_interventions_id_seq CASCADE');
        $this->addSql('ALTER TABLE adresse_interventions DROP CONSTRAINT FK_475CC6EA19EB6921');
        $this->addSql('DROP TABLE adresse_interventions');
    }
}
