<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160928012624 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number CHANGE complete_title complete_title TINYINT(1) DEFAULT NULL, CHANGE complete_tc complete_tc TINYINT(1) DEFAULT NULL, CHANGE complete_structure complete_structure TINYINT(1) DEFAULT NULL, CHANGE complete_shots complete_shots TINYINT(1) DEFAULT NULL, CHANGE complete_performance complete_performance TINYINT(1) DEFAULT NULL, CHANGE complete_backstage complete_backstage TINYINT(1) DEFAULT NULL, CHANGE complete_theme complete_theme TINYINT(1) DEFAULT NULL, CHANGE complete_mood complete_mood TINYINT(1) DEFAULT NULL, CHANGE complete_dance complete_dance TINYINT(1) DEFAULT NULL, CHANGE complete_music complete_music TINYINT(1) DEFAULT NULL, CHANGE complete_director complete_director TINYINT(1) DEFAULT NULL, CHANGE complete_cost complete_cost TINYINT(1) DEFAULT NULL, CHANGE complete_reference complete_reference TINYINT(1) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number CHANGE complete_title complete_title TINYINT(1) NOT NULL, CHANGE complete_tc complete_tc TINYINT(1) NOT NULL, CHANGE complete_structure complete_structure TINYINT(1) NOT NULL, CHANGE complete_shots complete_shots TINYINT(1) NOT NULL, CHANGE complete_performance complete_performance TINYINT(1) NOT NULL, CHANGE complete_backstage complete_backstage TINYINT(1) NOT NULL, CHANGE complete_theme complete_theme TINYINT(1) NOT NULL, CHANGE complete_mood complete_mood TINYINT(1) NOT NULL, CHANGE complete_dance complete_dance TINYINT(1) NOT NULL, CHANGE complete_music complete_music TINYINT(1) NOT NULL, CHANGE complete_director complete_director TINYINT(1) NOT NULL, CHANGE complete_cost complete_cost TINYINT(1) NOT NULL, CHANGE complete_reference complete_reference TINYINT(1) NOT NULL');
    }
}
