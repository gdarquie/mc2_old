<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161031134326 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F547BD0F321');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B4DAF94A');
        $this->addSql('DROP INDEX IDX_96901F54B4DAF94A ON number');
        $this->addSql('DROP INDEX IDX_96901F547BD0F321 ON number');
        $this->addSql('ALTER TABLE number ADD tempo_thesaurus_id INT DEFAULT NULL, DROP tempo_thesaurus, DROP mood_thesaurus_id');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54E68C8936 FOREIGN KEY (tempo_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54E68C8936 ON number (tempo_thesaurus_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54E68C8936');
        $this->addSql('DROP INDEX IDX_96901F54E68C8936 ON number');
        $this->addSql('ALTER TABLE number ADD mood_thesaurus_id INT DEFAULT NULL, CHANGE tempo_thesaurus_id tempo_thesaurus INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F547BD0F321 FOREIGN KEY (tempo_thesaurus) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B4DAF94A FOREIGN KEY (mood_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54B4DAF94A ON number (mood_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F547BD0F321 ON number (tempo_thesaurus)');
    }
}
