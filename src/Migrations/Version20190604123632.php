<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190604123632 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE parinaud (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rossano (id INT AUTO_INCREMENT NOT NULL, data VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bilan ADD corrections TINYINT(1) NOT NULL, ADD all_c VARCHAR(255) DEFAULT NULL, ADD optotypes VARCHAR(255) DEFAULT NULL, ADD echelle VARCHAR(255) DEFAULT NULL, ADD affichages VARCHAR(255) DEFAULT NULL, ADD distance VARCHAR(255) DEFAULT NULL, ADD all_vl VARCHAR(255) DEFAULT NULL, ADD all_vp VARCHAR(255) DEFAULT NULL, ADD all_po VARCHAR(255) DEFAULT NULL, DROP od, DROP og');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE parinaud');
        $this->addSql('DROP TABLE rossano');
        $this->addSql('ALTER TABLE bilan ADD od VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD og VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP corrections, DROP all_c, DROP optotypes, DROP echelle, DROP affichages, DROP distance, DROP all_vl, DROP all_vp, DROP all_po');
    }
}
