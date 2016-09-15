<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160915173515 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD spectators_thesaurus_id INT DEFAULT NULL, ADD diegetic_thesaurus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54AE679BDE FOREIGN KEY (spectators_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54D4614D3A FOREIGN KEY (diegetic_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54AE679BDE ON number (spectators_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54D4614D3A ON number (diegetic_thesaurus_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54AE679BDE');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54D4614D3A');
        $this->addSql('DROP INDEX IDX_96901F54AE679BDE ON number');
        $this->addSql('DROP INDEX IDX_96901F54D4614D3A ON number');
        $this->addSql('ALTER TABLE number DROP spectators_thesaurus_id, DROP diegetic_thesaurus_id');
    }
}
