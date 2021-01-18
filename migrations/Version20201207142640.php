<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207142640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE paroisse (id INT AUTO_INCREMENT NOT NULL, nom_paroisse VARCHAR(255) NOT NULL, adresse_paroisse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE servant ADD paroisse_servant_id INT NOT NULL');
        $this->addSql('ALTER TABLE servant ADD CONSTRAINT FK_309095D5A107F3F5 FOREIGN KEY (paroisse_servant_id) REFERENCES paroisse (id)');
        $this->addSql('CREATE INDEX IDX_309095D5A107F3F5 ON servant (paroisse_servant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servant DROP FOREIGN KEY FK_309095D5A107F3F5');
        $this->addSql('DROP TABLE paroisse');
        $this->addSql('DROP INDEX IDX_309095D5A107F3F5 ON servant');
        $this->addSql('ALTER TABLE servant DROP paroisse_servant_id');
    }
}
