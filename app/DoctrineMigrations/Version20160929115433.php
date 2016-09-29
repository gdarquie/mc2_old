<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929115433 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_source (number_id INT NOT NULL, source_thesaurus_id INT NOT NULL, INDEX IDX_2D5B131B30A1DE10 (number_id), INDEX IDX_2D5B131BABC76889 (source_thesaurus_id), PRIMARY KEY(number_id, source_thesaurus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_source ADD CONSTRAINT FK_2D5B131B30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_source ADD CONSTRAINT FK_2D5B131BABC76889 FOREIGN KEY (source_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54ABC76889');
        $this->addSql('DROP INDEX IDX_96901F54ABC76889 ON number');
        $this->addSql('ALTER TABLE number DROP source_thesaurus_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_source');
        $this->addSql('ALTER TABLE number ADD source_thesaurus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54ABC76889 FOREIGN KEY (source_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54ABC76889 ON number (source_thesaurus_id)');
    }
}
