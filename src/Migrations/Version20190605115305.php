<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190605115305 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2208490C2');
        $this->addSql('CREATE TABLE bilan01 (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, corrections TINYINT(1) NOT NULL, all_c VARCHAR(255) DEFAULT NULL, optotypes VARCHAR(255) DEFAULT NULL, echelle VARCHAR(255) DEFAULT NULL, affichages VARCHAR(255) DEFAULT NULL, distance VARCHAR(255) DEFAULT NULL, all_vl VARCHAR(255) DEFAULT NULL, all_vp VARCHAR(255) DEFAULT NULL, all_po VARCHAR(255) DEFAULT NULL, stereoscopique VARCHAR(255) DEFAULT NULL, couleurs VARCHAR(255) DEFAULT NULL, contrastes VARCHAR(255) DEFAULT NULL, accomodation VARCHAR(255) DEFAULT NULL, confrontation VARCHAR(255) DEFAULT NULL, fixation VARCHAR(255) DEFAULT NULL, INDEX IDX_BD3706E96B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bilan01 ADD CONSTRAINT FK_BD3706E96B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('DROP TABLE bilan');
        $this->addSql('ALTER TABLE patient CHANGE motifs motifs TINYTEXT DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_E7DB5DE2208490C2 ON resultat');
        $this->addSql('ALTER TABLE resultat CHANGE id_bilan_id id_bilan01_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE28B1FACFC FOREIGN KEY (id_bilan01_id) REFERENCES bilan01 (id)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE28B1FACFC ON resultat (id_bilan01_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE28B1FACFC');
        $this->addSql('CREATE TABLE bilan (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, corrections TINYINT(1) NOT NULL, all_c VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, optotypes VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, echelle VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, affichages VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, distance VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, all_vl VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, all_vp VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, all_po VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, couleurs VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, contrastes VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, accomodation VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, confrontation VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, fixation VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_F4DF4F446B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bilan ADD CONSTRAINT FK_F4DF4F446B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE bilan01');
        $this->addSql('ALTER TABLE patient CHANGE motifs motifs VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('DROP INDEX IDX_E7DB5DE28B1FACFC ON resultat');
        $this->addSql('ALTER TABLE resultat CHANGE id_bilan01_id id_bilan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2208490C2 FOREIGN KEY (id_bilan_id) REFERENCES bilan (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2208490C2 ON resultat (id_bilan_id)');
    }
}
