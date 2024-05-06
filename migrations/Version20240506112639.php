<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506112639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE interventions_vehicules (interventions_id INT NOT NULL, vehicules_id INT NOT NULL, PRIMARY KEY(interventions_id, vehicules_id))');
        $this->addSql('CREATE INDEX IDX_FBC64A2D334423FF ON interventions_vehicules (interventions_id)');
        $this->addSql('CREATE INDEX IDX_FBC64A2D8D8BD7E2 ON interventions_vehicules (vehicules_id)');
        $this->addSql('ALTER TABLE interventions_vehicules ADD CONSTRAINT FK_FBC64A2D334423FF FOREIGN KEY (interventions_id) REFERENCES interventions (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE interventions_vehicules ADD CONSTRAINT FK_FBC64A2D8D8BD7E2 FOREIGN KEY (vehicules_id) REFERENCES vehicules (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE interventions ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7F19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5ADBAD7F19EB6921 ON interventions (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE interventions_vehicules DROP CONSTRAINT FK_FBC64A2D334423FF');
        $this->addSql('ALTER TABLE interventions_vehicules DROP CONSTRAINT FK_FBC64A2D8D8BD7E2');
        $this->addSql('DROP TABLE interventions_vehicules');
        $this->addSql('ALTER TABLE interventions DROP CONSTRAINT FK_5ADBAD7F19EB6921');
        $this->addSql('DROP INDEX IDX_5ADBAD7F19EB6921');
        $this->addSql('ALTER TABLE interventions DROP client_id');
    }
}
