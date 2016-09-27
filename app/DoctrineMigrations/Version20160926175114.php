<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160926175114 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD general_mood_id INT DEFAULT NULL, ADD genre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C9A97E4A FOREIGN KEY (general_mood_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F544296D31F FOREIGN KEY (genre_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C9A97E4A ON number (general_mood_id)');
        $this->addSql('CREATE INDEX IDX_96901F544296D31F ON number (genre_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C9A97E4A');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F544296D31F');
        $this->addSql('DROP INDEX IDX_96901F54C9A97E4A ON number');
        $this->addSql('DROP INDEX IDX_96901F544296D31F ON number');
        $this->addSql('ALTER TABLE number DROP general_mood_id, DROP genre_id');
    }
}
