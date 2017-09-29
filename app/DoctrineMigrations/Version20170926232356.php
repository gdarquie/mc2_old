<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170926232356 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_validation_director (number_id INT NOT NULL, validation_director INT NOT NULL, INDEX IDX_BCFC31CE30A1DE10 (number_id), INDEX IDX_BCFC31CEF9397BAA (validation_director), PRIMARY KEY(number_id, validation_director)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_validation_director ADD CONSTRAINT FK_BCFC31CE30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_director ADD CONSTRAINT FK_BCFC31CEF9397BAA FOREIGN KEY (validation_director) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54F9397BAA');
        $this->addSql('DROP INDEX IDX_96901F54F9397BAA ON number');
        $this->addSql('ALTER TABLE number DROP validation_director');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_validation_director');
        $this->addSql('ALTER TABLE number ADD validation_director INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54F9397BAA FOREIGN KEY (validation_director) REFERENCES validation (validation_id)');
        $this->addSql('CREATE INDEX IDX_96901F54F9397BAA ON number (validation_director)');
    }
}
