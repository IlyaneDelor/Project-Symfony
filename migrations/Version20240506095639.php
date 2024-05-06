<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506095639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE interventions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plein_vehicule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE site_utilitaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE interventions (id INT NOT NULL, site_utilitaire_id INT DEFAULT NULL, debut_intervention TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, fin_intervention TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, duree DOUBLE PRECISION DEFAULT NULL, cr TEXT DEFAULT NULL, facture TEXT DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, description TEXT DEFAULT NULL, bon_de_commande VARCHAR(255) DEFAULT NULL, pjajout TEXT DEFAULT NULL, public BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5ADBAD7FF1080E9C ON interventions (site_utilitaire_id)');
        $this->addSql('CREATE TABLE plein_vehicule (id INT NOT NULL, vehicules_id INT DEFAULT NULL, litres DOUBLE PRECISION DEFAULT NULL, km_vehicules DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1A3D80928D8BD7E2 ON plein_vehicule (vehicules_id)');
        $this->addSql('CREATE TABLE site_utilitaire (id INT NOT NULL, rue VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(10) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vehicules_site_utilitaire (vehicules_id INT NOT NULL, site_utilitaire_id INT NOT NULL, PRIMARY KEY(vehicules_id, site_utilitaire_id))');
        $this->addSql('CREATE INDEX IDX_E2BAE1908D8BD7E2 ON vehicules_site_utilitaire (vehicules_id)');
        $this->addSql('CREATE INDEX IDX_E2BAE190F1080E9C ON vehicules_site_utilitaire (site_utilitaire_id)');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7FF1080E9C FOREIGN KEY (site_utilitaire_id) REFERENCES site_utilitaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plein_vehicule ADD CONSTRAINT FK_1A3D80928D8BD7E2 FOREIGN KEY (vehicules_id) REFERENCES vehicules (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicules_site_utilitaire ADD CONSTRAINT FK_E2BAE1908D8BD7E2 FOREIGN KEY (vehicules_id) REFERENCES vehicules (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicules_site_utilitaire ADD CONSTRAINT FK_E2BAE190F1080E9C FOREIGN KEY (site_utilitaire_id) REFERENCES site_utilitaire (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collaborateurs ADD description TEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE interventions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plein_vehicule_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE site_utilitaire_id_seq CASCADE');
        $this->addSql('ALTER TABLE interventions DROP CONSTRAINT FK_5ADBAD7FF1080E9C');
        $this->addSql('ALTER TABLE plein_vehicule DROP CONSTRAINT FK_1A3D80928D8BD7E2');
        $this->addSql('ALTER TABLE vehicules_site_utilitaire DROP CONSTRAINT FK_E2BAE1908D8BD7E2');
        $this->addSql('ALTER TABLE vehicules_site_utilitaire DROP CONSTRAINT FK_E2BAE190F1080E9C');
        $this->addSql('DROP TABLE interventions');
        $this->addSql('DROP TABLE plein_vehicule');
        $this->addSql('DROP TABLE site_utilitaire');
        $this->addSql('DROP TABLE vehicules_site_utilitaire');
        $this->addSql('ALTER TABLE collaborateurs DROP description');
    }
}
