<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207145555 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE archidiocese (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, nom_archidiocese VARCHAR(255) NOT NULL, nom_archeveque VARCHAR(255) DEFAULT NULL, INDEX IDX_69861259A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diocese (id INT AUTO_INCREMENT NOT NULL, archidiocese_id INT NOT NULL, nom_diocese VARCHAR(255) NOT NULL, eveque_actuelle VARCHAR(255) NOT NULL, vicaire_generale VARCHAR(255) DEFAULT NULL, INDEX IDX_8849E742790386A0 (archidiocese_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom_pays VARCHAR(255) NOT NULL, nom_cardinale VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subdivision_ecclesiastique (id INT AUTO_INCREMENT NOT NULL, diocese_subdivision_id INT NOT NULL, nom_subdivision VARCHAR(255) NOT NULL, niveau_subdivision VARCHAR(255) NOT NULL, lieu_subdivision VARCHAR(255) NOT NULL, INDEX IDX_BF386FED86B12E09 (diocese_subdivision_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE archidiocese ADD CONSTRAINT FK_69861259A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE diocese ADD CONSTRAINT FK_8849E742790386A0 FOREIGN KEY (archidiocese_id) REFERENCES archidiocese (id)');
        $this->addSql('ALTER TABLE subdivision_ecclesiastique ADD CONSTRAINT FK_BF386FED86B12E09 FOREIGN KEY (diocese_subdivision_id) REFERENCES diocese (id)');
        $this->addSql('ALTER TABLE paroisse ADD subdivision_ecclesiastique_id INT NOT NULL');
        $this->addSql('ALTER TABLE paroisse ADD CONSTRAINT FK_9068949CD1C498A FOREIGN KEY (subdivision_ecclesiastique_id) REFERENCES subdivision_ecclesiastique (id)');
        $this->addSql('CREATE INDEX IDX_9068949CD1C498A ON paroisse (subdivision_ecclesiastique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE diocese DROP FOREIGN KEY FK_8849E742790386A0');
        $this->addSql('ALTER TABLE subdivision_ecclesiastique DROP FOREIGN KEY FK_BF386FED86B12E09');
        $this->addSql('ALTER TABLE archidiocese DROP FOREIGN KEY FK_69861259A6E44244');
        $this->addSql('ALTER TABLE paroisse DROP FOREIGN KEY FK_9068949CD1C498A');
        $this->addSql('DROP TABLE archidiocese');
        $this->addSql('DROP TABLE diocese');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE subdivision_ecclesiastique');
        $this->addSql('DROP INDEX IDX_9068949CD1C498A ON paroisse');
        $this->addSql('ALTER TABLE paroisse DROP subdivision_ecclesiastique_id');
    }
}
