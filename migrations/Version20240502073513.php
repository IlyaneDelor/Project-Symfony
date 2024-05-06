<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502073513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE collaborateurs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE collaborateurs (id INT NOT NULL, poste VARCHAR(255) DEFAULT NULL, date_integration DATE DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, role VARCHAR(25) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formation (id INT NOT NULL, titre_formation VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, date_formation DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formation_collaborateurs (formation_id INT NOT NULL, collaborateurs_id INT NOT NULL, PRIMARY KEY(formation_id, collaborateurs_id))');
        $this->addSql('CREATE INDEX IDX_D3F730545200282E ON formation_collaborateurs (formation_id)');
        $this->addSql('CREATE INDEX IDX_D3F730545BBF76DC ON formation_collaborateurs (collaborateurs_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE formation_collaborateurs ADD CONSTRAINT FK_D3F730545200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formation_collaborateurs ADD CONSTRAINT FK_D3F730545BBF76DC FOREIGN KEY (collaborateurs_id) REFERENCES collaborateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE collaborateurs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formation_id_seq CASCADE');
        $this->addSql('ALTER TABLE formation_collaborateurs DROP CONSTRAINT FK_D3F730545200282E');
        $this->addSql('ALTER TABLE formation_collaborateurs DROP CONSTRAINT FK_D3F730545BBF76DC');
        $this->addSql('DROP TABLE collaborateurs');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_collaborateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
