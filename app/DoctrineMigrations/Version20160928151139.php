<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160928151139 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54CEDB68F4');
        $this->addSql('DROP INDEX IDX_96901F54CEDB68F4 ON number');
        $this->addSql('ALTER TABLE number DROP integoptions_id');
        $this->addSql('ALTER TABLE number_has_thesaurus DROP FOREIGN KEY FK_56AA620F7D2DB431');
        $this->addSql('DROP INDEX IDX_56AA620F7D2DB431 ON number_has_thesaurus');
        $this->addSql('ALTER TABLE number_has_thesaurus DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE number_has_thesaurus CHANGE thesaurus_id integoptions_id INT NOT NULL');
        $this->addSql('ALTER TABLE number_has_thesaurus ADD CONSTRAINT FK_56AA620FCEDB68F4 FOREIGN KEY (integoptions_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_56AA620FCEDB68F4 ON number_has_thesaurus (integoptions_id)');
        $this->addSql('ALTER TABLE number_has_thesaurus ADD PRIMARY KEY (number_id, integoptions_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD integoptions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54CEDB68F4 FOREIGN KEY (integoptions_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54CEDB68F4 ON number (integoptions_id)');
        $this->addSql('ALTER TABLE number_has_thesaurus DROP FOREIGN KEY FK_56AA620FCEDB68F4');
        $this->addSql('DROP INDEX IDX_56AA620FCEDB68F4 ON number_has_thesaurus');
        $this->addSql('ALTER TABLE number_has_thesaurus DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE number_has_thesaurus CHANGE integoptions_id thesaurus_id INT NOT NULL');
        $this->addSql('ALTER TABLE number_has_thesaurus ADD CONSTRAINT FK_56AA620F7D2DB431 FOREIGN KEY (thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_56AA620F7D2DB431 ON number_has_thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_thesaurus ADD PRIMARY KEY (number_id, thesaurus_id)');
    }
}
