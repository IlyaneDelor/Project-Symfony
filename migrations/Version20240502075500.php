<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502075500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP CONSTRAINT fk_c82e74e8b7aa4d');
        $this->addSql('DROP INDEX uniq_c82e74e8b7aa4d');
        $this->addSql('ALTER TABLE clients RENAME COLUMN id_utilisateurs_id TO utilisateurs_id');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E741E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C82E741E969C5 ON clients (utilisateurs_id)');
        $this->addSql('ALTER TABLE collaborateurs DROP CONSTRAINT fk_4a340d9e8b7aa4d');
        $this->addSql('DROP INDEX uniq_4a340d9e8b7aa4d');
        $this->addSql('ALTER TABLE collaborateurs RENAME COLUMN id_utilisateurs_id TO utilisateurs_id');
        $this->addSql('ALTER TABLE collaborateurs ADD CONSTRAINT FK_4A340D91E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A340D91E969C5 ON collaborateurs (utilisateurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE clients DROP CONSTRAINT FK_C82E741E969C5');
        $this->addSql('DROP INDEX UNIQ_C82E741E969C5');
        $this->addSql('ALTER TABLE clients RENAME COLUMN utilisateurs_id TO id_utilisateurs_id');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT fk_c82e74e8b7aa4d FOREIGN KEY (id_utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_c82e74e8b7aa4d ON clients (id_utilisateurs_id)');
        $this->addSql('ALTER TABLE collaborateurs DROP CONSTRAINT FK_4A340D91E969C5');
        $this->addSql('DROP INDEX UNIQ_4A340D91E969C5');
        $this->addSql('ALTER TABLE collaborateurs RENAME COLUMN utilisateurs_id TO id_utilisateurs_id');
        $this->addSql('ALTER TABLE collaborateurs ADD CONSTRAINT fk_4a340d9e8b7aa4d FOREIGN KEY (id_utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_4a340d9e8b7aa4d ON collaborateurs (id_utilisateurs_id)');
    }
}
