<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509121239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient CHANGE classe classe VARCHAR(255) DEFAULT NULL, CHANGE optn_classe optn_classe VARCHAR(255) DEFAULT NULL, CHANGE antecedent antecedent LONGTEXT DEFAULT NULL, CHANGE autre_bilan autre_bilan VARCHAR(255) DEFAULT NULL, CHANGE charge charge VARCHAR(255) DEFAULT NULL, CHANGE traitement traitement LONGTEXT DEFAULT NULL, CHANGE lateralite lateralite VARCHAR(255) DEFAULT NULL, CHANGE motifs motifs VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient CHANGE classe classe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE optn_classe optn_classe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE antecedent antecedent LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE autre_bilan autre_bilan VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE charge charge VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE traitement traitement LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE lateralite lateralite VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE motifs motifs VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
