<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325105731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bilan ADD patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bilan ADD CONSTRAINT FK_F4DF4F446B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4DF4F446B899279 ON bilan (patient_id)');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB705F7C57');
        $this->addSql('DROP INDEX IDX_1ADAD7EB705F7C57 ON patient');
        $this->addSql('ALTER TABLE patient DROP bilan_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bilan DROP FOREIGN KEY FK_F4DF4F446B899279');
        $this->addSql('DROP INDEX UNIQ_F4DF4F446B899279 ON bilan');
        $this->addSql('ALTER TABLE bilan DROP patient_id');
        $this->addSql('ALTER TABLE patient ADD bilan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB705F7C57 FOREIGN KEY (bilan_id) REFERENCES bilan (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB705F7C57 ON patient (bilan_id)');
    }
}
