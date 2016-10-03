<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160930152214 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD comment_title LONGTEXT DEFAULT NULL, ADD comment_tc LONGTEXT DEFAULT NULL, ADD comment_structure LONGTEXT DEFAULT NULL, ADD comment_shots LONGTEXT DEFAULT NULL, ADD comment_performance LONGTEXT DEFAULT NULL, ADD comment_backstage LONGTEXT DEFAULT NULL, ADD comment_theme LONGTEXT DEFAULT NULL, ADD comment_mood LONGTEXT DEFAULT NULL, ADD comment_dance LONGTEXT DEFAULT NULL, ADD comment_music LONGTEXT DEFAULT NULL, ADD comment_director LONGTEXT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP comment_title, DROP comment_tc, DROP comment_structure, DROP comment_shots, DROP comment_performance, DROP comment_backstage, DROP comment_theme, DROP comment_mood, DROP comment_dance, DROP comment_music, DROP comment_director');
    }
}
