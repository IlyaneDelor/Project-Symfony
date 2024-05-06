<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502075058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE formation_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE clients_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateurs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE clients (id INT NOT NULL, id_utilisateurs_id INT NOT NULL, type VARCHAR(100) NOT NULL, rue VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C82E74E8B7AA4D ON clients (id_utilisateurs_id)');
        $this->addSql('CREATE TABLE formations (id INT NOT NULL, titre_formation VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, date_formation DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formations_collaborateurs (formations_id INT NOT NULL, collaborateurs_id INT NOT NULL, PRIMARY KEY(formations_id, collaborateurs_id))');
        $this->addSql('CREATE INDEX IDX_FB191E0E3BF5B0C2 ON formations_collaborateurs (formations_id)');
        $this->addSql('CREATE INDEX IDX_FB191E0E5BBF76DC ON formations_collaborateurs (collaborateurs_id)');
        $this->addSql('CREATE TABLE utilisateurs (id INT NOT NULL, nom_prenom VARCHAR(255) DEFAULT NULL, telephone VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74E8B7AA4D FOREIGN KEY (id_utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formations_collaborateurs ADD CONSTRAINT FK_FB191E0E3BF5B0C2 FOREIGN KEY (formations_id) REFERENCES formations (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formations_collaborateurs ADD CONSTRAINT FK_FB191E0E5BBF76DC FOREIGN KEY (collaborateurs_id) REFERENCES collaborateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formation_collaborateurs DROP CONSTRAINT fk_d3f730545200282e');
        $this->addSql('ALTER TABLE formation_collaborateurs DROP CONSTRAINT fk_d3f730545bbf76dc');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_collaborateurs');
        $this->addSql('ALTER TABLE collaborateurs ADD id_utilisateurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE collaborateurs ADD CONSTRAINT FK_4A340D9E8B7AA4D FOREIGN KEY (id_utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A340D9E8B7AA4D ON collaborateurs (id_utilisateurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE collaborateurs DROP CONSTRAINT FK_4A340D9E8B7AA4D');
        $this->addSql('DROP SEQUENCE clients_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateurs_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE formation (id INT NOT NULL, titre_formation VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, date_formation DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formation_collaborateurs (formation_id INT NOT NULL, collaborateurs_id INT NOT NULL, PRIMARY KEY(formation_id, collaborateurs_id))');
        $this->addSql('CREATE INDEX idx_d3f730545bbf76dc ON formation_collaborateurs (collaborateurs_id)');
        $this->addSql('CREATE INDEX idx_d3f730545200282e ON formation_collaborateurs (formation_id)');
        $this->addSql('ALTER TABLE formation_collaborateurs ADD CONSTRAINT fk_d3f730545200282e FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formation_collaborateurs ADD CONSTRAINT fk_d3f730545bbf76dc FOREIGN KEY (collaborateurs_id) REFERENCES collaborateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE clients DROP CONSTRAINT FK_C82E74E8B7AA4D');
        $this->addSql('ALTER TABLE formations_collaborateurs DROP CONSTRAINT FK_FB191E0E3BF5B0C2');
        $this->addSql('ALTER TABLE formations_collaborateurs DROP CONSTRAINT FK_FB191E0E5BBF76DC');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE formations_collaborateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP INDEX UNIQ_4A340D9E8B7AA4D');
        $this->addSql('ALTER TABLE collaborateurs DROP id_utilisateurs_id');
    }
}
