<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160923100334 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5465D64EDD');
        $this->addSql('DROP INDEX IDX_96901F5465D64EDD ON number');
        $this->addSql('ALTER TABLE number ADD $dancecontent_id INT DEFAULT NULL, CHANGE dance_id $dancingtype_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54A0769B1F FOREIGN KEY ($dancingtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F541B55AB87 FOREIGN KEY ($dancecontent_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54A0769B1F ON number ($dancingtype_id)');
        $this->addSql('CREATE INDEX IDX_96901F541B55AB87 ON number ($dancecontent_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54A0769B1F');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F541B55AB87');
        $this->addSql('DROP INDEX IDX_96901F54A0769B1F ON number');
        $this->addSql('DROP INDEX IDX_96901F541B55AB87 ON number');
        $this->addSql('ALTER TABLE number ADD dance_id INT DEFAULT NULL, DROP $dancingtype_id, DROP $dancecontent_id');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5465D64EDD FOREIGN KEY (dance_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F5465D64EDD ON number (dance_id)');
    }
}
