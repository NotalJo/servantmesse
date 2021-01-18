<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118083303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE archidiocese ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE diocese ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE paroisse ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE pays ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE subdivision_ecclesiastique ADD created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE archidiocese DROP created_at');
        $this->addSql('ALTER TABLE diocese DROP created_at');
        $this->addSql('ALTER TABLE paroisse DROP created_at');
        $this->addSql('ALTER TABLE pays DROP created_at');
        $this->addSql('ALTER TABLE subdivision_ecclesiastique DROP created_at');
    }
}
