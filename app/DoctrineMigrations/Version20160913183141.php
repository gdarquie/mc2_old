<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160913183141 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD $integoptions_id INT DEFAULT NULL, ADD $musensemble_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5436BD17BC FOREIGN KEY ($integoptions_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C3AD66A6 FOREIGN KEY ($musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F5436BD17BC ON number ($integoptions_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C3AD66A6 ON number ($musensemble_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5436BD17BC');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C3AD66A6');
        $this->addSql('DROP INDEX IDX_96901F5436BD17BC ON number');
        $this->addSql('DROP INDEX IDX_96901F54C3AD66A6 ON number');
        $this->addSql('ALTER TABLE number DROP $integoptions_id, DROP $musensemble_id');
    }
}
