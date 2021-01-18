<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201204070559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE servant (id INT AUTO_INCREMENT NOT NULL, photo_servant VARCHAR(255) DEFAULT NULL, nom_servant VARCHAR(255) DEFAULT NULL, prenom_servant VARCHAR(255) DEFAULT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, adresse_servant VARCHAR(255) DEFAULT NULL, fonction_servant VARCHAR(255) DEFAULT NULL, centre_interet VARCHAR(255) DEFAULT NULL, date_adhesion DATETIME NOT NULL, groupe_servant VARCHAR(255) DEFAULT NULL, pere_servant VARCHAR(255) DEFAULT NULL, mere_servant VARCHAR(255) DEFAULT NULL, mail_servant VARCHAR(255) DEFAULT NULL, fb_servant VARCHAR(255) DEFAULT NULL, contact_orange VARCHAR(10) DEFAULT NULL, contact_telma VARCHAR(10) DEFAULT NULL, contact_airtel VARCHAR(10) DEFAULT NULL, date_bapteme DATE DEFAULT NULL, paroisse_bapteme VARCHAR(255) DEFAULT NULL, date_communion DATE DEFAULT NULL, paroisse_communion VARCHAR(255) DEFAULT NULL, date_confirmation DATE DEFAULT NULL, paroisse_confirmation VARCHAR(255) DEFAULT NULL, reference_servant VARCHAR(255) NOT NULL, etat_badge TINYINT(1) NOT NULL, code_qr VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE servant');
    }
}
