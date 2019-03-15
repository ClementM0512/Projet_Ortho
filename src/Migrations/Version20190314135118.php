<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190314135118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bilan (id INT AUTO_INCREMENT NOT NULL, od VARCHAR(255) DEFAULT NULL, og VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD bilan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB705F7C57 FOREIGN KEY (bilan_id) REFERENCES bilan (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB705F7C57 ON patient (bilan_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB705F7C57');
        $this->addSql('DROP TABLE bilan');
        $this->addSql('DROP INDEX IDX_1ADAD7EB705F7C57 ON patient');
        $this->addSql('ALTER TABLE patient DROP bilan_id');
    }
}
