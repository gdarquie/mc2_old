<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160915150414 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5417DBE4BB');
        $this->addSql('DROP INDEX IDX_96901F5417DBE4BB ON number');
        $this->addSql('ALTER TABLE number ADD comment_title LONGTEXT NOT NULL, DROP comment_title_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD comment_title_id INT DEFAULT NULL, DROP comment_title');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5417DBE4BB FOREIGN KEY (comment_title_id) REFERENCES comment (comment_id)');
        $this->addSql('CREATE INDEX IDX_96901F5417DBE4BB ON number (comment_title_id)');
    }
}
