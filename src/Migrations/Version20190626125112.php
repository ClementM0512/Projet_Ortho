<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190626125112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE a13 (id INT AUTO_INCREMENT NOT NULL, age_equiv VARCHAR(255) NOT NULL, eh VARCHAR(255) NOT NULL, ps VARCHAR(255) NOT NULL, co VARCHAR(255) NOT NULL, fg VARCHAR(255) NOT NULL, sr VARCHAR(255) NOT NULL, vc VARCHAR(255) NOT NULL, vms VARCHAR(255) NOT NULL, fc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accomodation (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affichages (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bilan01 (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, corrections TINYINT(1) NOT NULL, all_c VARCHAR(255) DEFAULT NULL, optotypes VARCHAR(255) DEFAULT NULL, echelle VARCHAR(255) DEFAULT NULL, affichages VARCHAR(255) DEFAULT NULL, distance VARCHAR(255) DEFAULT NULL, all_vl VARCHAR(255) DEFAULT NULL, all_vp VARCHAR(255) DEFAULT NULL, all_po VARCHAR(255) DEFAULT NULL, stereoscopique VARCHAR(255) DEFAULT NULL, couleurs VARCHAR(255) DEFAULT NULL, contrastes VARCHAR(255) DEFAULT NULL, accomodation VARCHAR(255) DEFAULT NULL, confrontation VARCHAR(255) DEFAULT NULL, fixation VARCHAR(255) DEFAULT NULL, create_at DATETIME NOT NULL, INDEX IDX_BD3706E96B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge2 (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE college (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE confrontation (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrastes (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleurs (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleurs2 (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_odg (id INT AUTO_INCREMENT NOT NULL, odg VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE distance (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echelle (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoire_exercice (histoire_id INT NOT NULL, exercice_id INT NOT NULL, INDEX IDX_7DEB0D889B94373 (histoire_id), INDEX IDX_7DEB0D8889D40298 (exercice_id), PRIMARY KEY(histoire_id, exercice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lateralite (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lycee (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE optotypes (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parinaud (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, adresse VARCHAR(255) DEFAULT NULL, classe VARCHAR(255) DEFAULT NULL, optn_classe VARCHAR(255) DEFAULT NULL, antecedent LONGTEXT DEFAULT NULL, autre_bilan VARCHAR(255) DEFAULT NULL, charge VARCHAR(255) DEFAULT NULL, traitement LONGTEXT DEFAULT NULL, lateralite VARCHAR(255) DEFAULT NULL, motifs TINYTEXT DEFAULT NULL, create_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_E04992AA79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE primaire (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, id_exercice_id INT NOT NULL, id_patient_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, id_bilan01_id INT DEFAULT NULL, score VARCHAR(400) NOT NULL, INDEX IDX_E7DB5DE291C6CF6F (id_exercice_id), INDEX IDX_E7DB5DE2CE0312AE (id_patient_id), INDEX IDX_E7DB5DE279F37AE5 (id_user_id), INDEX IDX_E7DB5DE28B1FACFC (id_bilan01_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rossano (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE security (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, password VARCHAR(255) NOT NULL, change_pass TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_C59BD5C179F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serret (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stereo (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stereoscopique (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE textmotifs (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bilan01 ADD CONSTRAINT FK_BD3706E96B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE histoire_exercice ADD CONSTRAINT FK_7DEB0D889B94373 FOREIGN KEY (histoire_id) REFERENCES histoire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE histoire_exercice ADD CONSTRAINT FK_7DEB0D8889D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE permission ADD CONSTRAINT FK_E04992AA79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE291C6CF6F FOREIGN KEY (id_exercice_id) REFERENCES exercice (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2CE0312AE FOREIGN KEY (id_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE279F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE28B1FACFC FOREIGN KEY (id_bilan01_id) REFERENCES bilan01 (id)');
        $this->addSql('ALTER TABLE security ADD CONSTRAINT FK_C59BD5C179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE28B1FACFC');
        $this->addSql('ALTER TABLE histoire_exercice DROP FOREIGN KEY FK_7DEB0D8889D40298');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE291C6CF6F');
        $this->addSql('ALTER TABLE histoire_exercice DROP FOREIGN KEY FK_7DEB0D889B94373');
        $this->addSql('ALTER TABLE bilan01 DROP FOREIGN KEY FK_BD3706E96B899279');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2CE0312AE');
        $this->addSql('ALTER TABLE permission DROP FOREIGN KEY FK_E04992AA79F37AE5');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE279F37AE5');
        $this->addSql('ALTER TABLE security DROP FOREIGN KEY FK_C59BD5C179F37AE5');
        $this->addSql('DROP TABLE a13');
        $this->addSql('DROP TABLE accomodation');
        $this->addSql('DROP TABLE affichages');
        $this->addSql('DROP TABLE bilan01');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE charge2');
        $this->addSql('DROP TABLE college');
        $this->addSql('DROP TABLE confrontation');
        $this->addSql('DROP TABLE contrastes');
        $this->addSql('DROP TABLE couleurs');
        $this->addSql('DROP TABLE couleurs2');
        $this->addSql('DROP TABLE data_odg');
        $this->addSql('DROP TABLE distance');
        $this->addSql('DROP TABLE echelle');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE histoire');
        $this->addSql('DROP TABLE histoire_exercice');
        $this->addSql('DROP TABLE lateralite');
        $this->addSql('DROP TABLE lycee');
        $this->addSql('DROP TABLE optotypes');
        $this->addSql('DROP TABLE parinaud');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE primaire');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE rossano');
        $this->addSql('DROP TABLE security');
        $this->addSql('DROP TABLE serret');
        $this->addSql('DROP TABLE stereo');
        $this->addSql('DROP TABLE stereoscopique');
        $this->addSql('DROP TABLE textmotifs');
        $this->addSql('DROP TABLE user');
    }
}
