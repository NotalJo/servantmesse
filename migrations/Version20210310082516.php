<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310082516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE archidiocese (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, nom_archidiocese VARCHAR(255) NOT NULL, nom_archeveque VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_69861259A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diocese (id INT AUTO_INCREMENT NOT NULL, archidiocese_id INT NOT NULL, nom_diocese VARCHAR(255) NOT NULL, eveque_actuelle VARCHAR(255) NOT NULL, vicaire_generale VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8849E742790386A0 (archidiocese_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paroisse (id INT AUTO_INCREMENT NOT NULL, subdivision_ecclesiastique_id INT NOT NULL, nom_paroisse VARCHAR(255) NOT NULL, adresse_paroisse VARCHAR(255) DEFAULT NULL, abbreviation_paroisse VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9068949CD1C498A (subdivision_ecclesiastique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom_pays VARCHAR(255) NOT NULL, nom_cardinale VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servant (id INT AUTO_INCREMENT NOT NULL, paroisse_servant_id INT NOT NULL, photo_servant VARCHAR(255) DEFAULT NULL, nom_servant VARCHAR(255) DEFAULT NULL, prenom_servant VARCHAR(255) DEFAULT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, adresse_servant VARCHAR(255) DEFAULT NULL, fonction_servant VARCHAR(255) DEFAULT NULL, centre_interet VARCHAR(255) DEFAULT NULL, date_adhesion DATETIME NOT NULL, groupe_servant VARCHAR(255) DEFAULT NULL, pere_servant VARCHAR(255) DEFAULT NULL, mere_servant VARCHAR(255) DEFAULT NULL, mail_servant VARCHAR(255) DEFAULT NULL, fb_servant VARCHAR(255) DEFAULT NULL, contact_orange VARCHAR(10) DEFAULT NULL, contact_telma VARCHAR(10) DEFAULT NULL, contact_airtel VARCHAR(10) DEFAULT NULL, date_bapteme DATE DEFAULT NULL, paroisse_bapteme VARCHAR(255) DEFAULT NULL, date_communion DATE DEFAULT NULL, paroisse_communion VARCHAR(255) DEFAULT NULL, date_confirmation DATE DEFAULT NULL, paroisse_confirmation VARCHAR(255) DEFAULT NULL, reference_servant VARCHAR(255) NOT NULL, etat_badge TINYINT(1) NOT NULL, code_qr VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_309095D5A107F3F5 (paroisse_servant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subdivision_ecclesiastique (id INT AUTO_INCREMENT NOT NULL, diocese_subdivision_id INT NOT NULL, nom_subdivision VARCHAR(255) NOT NULL, niveau_subdivision VARCHAR(255) NOT NULL, lieu_subdivision VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_BF386FED86B12E09 (diocese_subdivision_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE archidiocese ADD CONSTRAINT FK_69861259A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE diocese ADD CONSTRAINT FK_8849E742790386A0 FOREIGN KEY (archidiocese_id) REFERENCES archidiocese (id)');
        $this->addSql('ALTER TABLE paroisse ADD CONSTRAINT FK_9068949CD1C498A FOREIGN KEY (subdivision_ecclesiastique_id) REFERENCES subdivision_ecclesiastique (id)');
        $this->addSql('ALTER TABLE servant ADD CONSTRAINT FK_309095D5A107F3F5 FOREIGN KEY (paroisse_servant_id) REFERENCES paroisse (id)');
        $this->addSql('ALTER TABLE subdivision_ecclesiastique ADD CONSTRAINT FK_BF386FED86B12E09 FOREIGN KEY (diocese_subdivision_id) REFERENCES diocese (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE diocese DROP FOREIGN KEY FK_8849E742790386A0');
        $this->addSql('ALTER TABLE subdivision_ecclesiastique DROP FOREIGN KEY FK_BF386FED86B12E09');
        $this->addSql('ALTER TABLE servant DROP FOREIGN KEY FK_309095D5A107F3F5');
        $this->addSql('ALTER TABLE archidiocese DROP FOREIGN KEY FK_69861259A6E44244');
        $this->addSql('ALTER TABLE paroisse DROP FOREIGN KEY FK_9068949CD1C498A');
        $this->addSql('DROP TABLE archidiocese');
        $this->addSql('DROP TABLE diocese');
        $this->addSql('DROP TABLE paroisse');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE servant');
        $this->addSql('DROP TABLE subdivision_ecclesiastique');
    }
}
