<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160926172320 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD imaginary_id INT DEFAULT NULL, DROP imaginary');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5488E9D8A6 FOREIGN KEY (imaginary_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F5488E9D8A6 ON number (imaginary_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5488E9D8A6');
        $this->addSql('DROP INDEX IDX_96901F5488E9D8A6 ON number');
        $this->addSql('ALTER TABLE number ADD imaginary VARCHAR(500) DEFAULT NULL COLLATE utf8_general_ci, DROP imaginary_id');
    }
}
