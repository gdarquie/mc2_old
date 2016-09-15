<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160915143623 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD $completeness_id INT DEFAULT NULL, ADD $completoptions_id INT DEFAULT NULL, DROP completeness_thesaurus, DROP complet_options');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F544E2684ED FOREIGN KEY ($completeness_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54416CF6AD FOREIGN KEY ($completoptions_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F544E2684ED ON number ($completeness_id)');
        $this->addSql('CREATE INDEX IDX_96901F54416CF6AD ON number ($completoptions_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F544E2684ED');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54416CF6AD');
        $this->addSql('DROP INDEX IDX_96901F544E2684ED ON number');
        $this->addSql('DROP INDEX IDX_96901F54416CF6AD ON number');
        $this->addSql('ALTER TABLE number ADD completeness_thesaurus VARCHAR(255) NOT NULL COLLATE utf8_general_ci, ADD complet_options VARCHAR(255) NOT NULL COLLATE utf8_general_ci, DROP $completeness_id, DROP $completoptions_id');
    }
}
