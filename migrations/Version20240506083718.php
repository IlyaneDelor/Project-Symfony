<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506083718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adresse_facturation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE site_de_depot_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicules_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adresse_facturation (id INT NOT NULL, rue VARCHAR(255) DEFAULT NULL, codepostal VARCHAR(10) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE site_de_depot (id INT NOT NULL, rue VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vehicules (id INT NOT NULL, type_vehicule VARCHAR(255) DEFAULT NULL, date_circulation DATE DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, debut_controletechnique DATE DEFAULT NULL, fin_controletechnique DATE DEFAULT NULL, pdf_controletechnique VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE clients ADD facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE clients ADD description TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74DBC5F284 FOREIGN KEY (facturation_id) REFERENCES adresse_facturation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C82E74DBC5F284 ON clients (facturation_id)');
        $this->addSql('ALTER TABLE formations ADD fin_validite DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE formations ADD attestation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE formations RENAME COLUMN date_formation TO debut_validite');
        $this->addSql('ALTER TABLE utilisateurs ADD mail VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD motdepasse VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE clients DROP CONSTRAINT FK_C82E74DBC5F284');
        $this->addSql('DROP SEQUENCE adresse_facturation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE site_de_depot_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicules_id_seq CASCADE');
        $this->addSql('DROP TABLE adresse_facturation');
        $this->addSql('DROP TABLE site_de_depot');
        $this->addSql('DROP TABLE vehicules');
        $this->addSql('DROP INDEX IDX_C82E74DBC5F284');
        $this->addSql('ALTER TABLE clients DROP facturation_id');
        $this->addSql('ALTER TABLE clients DROP description');
        $this->addSql('ALTER TABLE formations ADD date_formation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE formations DROP debut_validite');
        $this->addSql('ALTER TABLE formations DROP fin_validite');
        $this->addSql('ALTER TABLE formations DROP attestation');
        $this->addSql('ALTER TABLE utilisateurs DROP mail');
        $this->addSql('ALTER TABLE utilisateurs DROP motdepasse');
    }
}
