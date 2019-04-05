<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190326153304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoire_exercice (histoire_id INT NOT NULL, exercice_id INT NOT NULL, INDEX IDX_7DEB0D889B94373 (histoire_id), INDEX IDX_7DEB0D8889D40298 (exercice_id), PRIMARY KEY(histoire_id, exercice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE histoire_exercice ADD CONSTRAINT FK_7DEB0D889B94373 FOREIGN KEY (histoire_id) REFERENCES histoire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE histoire_exercice ADD CONSTRAINT FK_7DEB0D8889D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE histoire_exercice DROP FOREIGN KEY FK_7DEB0D8889D40298');
        $this->addSql('ALTER TABLE histoire_exercice DROP FOREIGN KEY FK_7DEB0D889B94373');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE histoire');
        $this->addSql('DROP TABLE histoire_exercice');
    }
}
