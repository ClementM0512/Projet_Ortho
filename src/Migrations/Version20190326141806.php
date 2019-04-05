<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190326141806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bilan DROP INDEX UNIQ_F4DF4F446B899279, ADD INDEX IDX_F4DF4F446B899279 (patient_id)');
        $this->addSql('ALTER TABLE patient ADD adresse VARCHAR(255) DEFAULT NULL, CHANGE birthdate date_de_naissance DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bilan DROP INDEX IDX_F4DF4F446B899279, ADD UNIQUE INDEX UNIQ_F4DF4F446B899279 (patient_id)');
        $this->addSql('ALTER TABLE patient DROP adresse, CHANGE date_de_naissance birthdate DATE NOT NULL');
    }
}
