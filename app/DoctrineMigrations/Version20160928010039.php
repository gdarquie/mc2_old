<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160928010039 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD complete_title TINYINT(1) NOT NULL, ADD complete_tc TINYINT(1) NOT NULL, ADD complete_structure TINYINT(1) NOT NULL, ADD complete_shots TINYINT(1) NOT NULL, ADD complete_performance TINYINT(1) NOT NULL, ADD complete_backstage TINYINT(1) NOT NULL, ADD complete_theme TINYINT(1) NOT NULL, ADD complete_mood TINYINT(1) NOT NULL, ADD complete_dance TINYINT(1) NOT NULL, ADD complete_music TINYINT(1) NOT NULL, ADD complete_director TINYINT(1) NOT NULL, ADD complete_cost TINYINT(1) NOT NULL, ADD complete_reference TINYINT(1) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP complete_title, DROP complete_tc, DROP complete_structure, DROP complete_shots, DROP complete_performance, DROP complete_backstage, DROP complete_theme, DROP complete_mood, DROP complete_dance, DROP complete_music, DROP complete_director, DROP complete_cost, DROP complete_reference');
    }
}
