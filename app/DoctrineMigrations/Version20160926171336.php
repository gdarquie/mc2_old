<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160926171336 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD diegetic_place_thesaurus_id INT DEFAULT NULL, ADD general_localisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F548410650D FOREIGN KEY (diegetic_place_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54BF30111 FOREIGN KEY (general_localisation_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F548410650D ON number (diegetic_place_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54BF30111 ON number (general_localisation_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F548410650D');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54BF30111');
        $this->addSql('DROP INDEX IDX_96901F548410650D ON number');
        $this->addSql('DROP INDEX IDX_96901F54BF30111 ON number');
        $this->addSql('ALTER TABLE number DROP diegetic_place_thesaurus_id, DROP general_localisation_id');
    }
}
