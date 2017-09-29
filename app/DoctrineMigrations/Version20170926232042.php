<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170926232042 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_validation_title (number_id INT NOT NULL, validation_title INT NOT NULL, INDEX IDX_A02FCCC30A1DE10 (number_id), INDEX IDX_A02FCCCC3257D78 (validation_title), PRIMARY KEY(number_id, validation_title)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_validation_title ADD CONSTRAINT FK_A02FCCC30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_title ADD CONSTRAINT FK_A02FCCCC3257D78 FOREIGN KEY (validation_title) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C3257D78');
        $this->addSql('DROP INDEX IDX_96901F54C3257D78 ON number');
        $this->addSql('ALTER TABLE number DROP validation_title');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_validation_title');
        $this->addSql('ALTER TABLE number ADD validation_title INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C3257D78 FOREIGN KEY (validation_title) REFERENCES validation (validation_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C3257D78 ON number (validation_title)');
    }
}
