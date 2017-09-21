<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170921103112 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_songtype (song_id INT NOT NULL, songtype_id INT NOT NULL, INDEX IDX_67558659A0BDB2F3 (song_id), INDEX IDX_675586593A047A9A (songtype_id), PRIMARY KEY(song_id, songtype_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_songtype ADD CONSTRAINT FK_67558659A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE number_has_songtype ADD CONSTRAINT FK_675586593A047A9A FOREIGN KEY (songtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE song DROP type');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_songtype');
        $this->addSql('ALTER TABLE song ADD type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci');
    }
}
