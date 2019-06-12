<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612082141 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE charge (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe01 (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe02 (id INT AUTO_INCREMENT NOT NULL, id_classe01_id INT NOT NULL, data VARCHAR(255) DEFAULT NULL, INDEX IDX_2A8D798AEDB00477 (id_classe01_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lateralite (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE textmotifs (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe02 ADD CONSTRAINT FK_2A8D798AEDB00477 FOREIGN KEY (id_classe01_id) REFERENCES classe01 (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE classe02 DROP FOREIGN KEY FK_2A8D798AEDB00477');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE classe01');
        $this->addSql('DROP TABLE classe02');
        $this->addSql('DROP TABLE lateralite');
        $this->addSql('DROP TABLE textmotifs');
    }
}
