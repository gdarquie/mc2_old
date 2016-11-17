<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161118005206 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE film_has_director (film_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_9F318C78567F5183 (film_id), INDEX IDX_9F318C78217BBB47 (person_id), PRIMARY KEY(film_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_has_producer (film_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_16C51654567F5183 (film_id), INDEX IDX_16C51654217BBB47 (person_id), PRIMARY KEY(film_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio (studio_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(studio_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film_has_director ADD CONSTRAINT FK_9F318C78567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_has_director ADD CONSTRAINT FK_9F318C78217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE film_has_producer ADD CONSTRAINT FK_16C51654567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_has_producer ADD CONSTRAINT FK_16C51654217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('DROP TABLE import');
        $this->addSql('DROP TABLE shots');
        $this->addSql('ALTER TABLE number CHANGE comment_tc comment_tc LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE state CHANGE nom title VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE import (id VARCHAR(33) NOT NULL COLLATE latin1_swedish_ci, studio VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shots (shots_id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, validation_id INT NOT NULL, timestamp DATETIME NOT NULL, PRIMARY KEY(shots_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE film_has_director');
        $this->addSql('DROP TABLE film_has_producer');
        $this->addSql('DROP TABLE studio');
        $this->addSql('ALTER TABLE number CHANGE comment_tc comment_tc INT DEFAULT NULL');
        $this->addSql('ALTER TABLE state CHANGE title nom VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci');
    }
}
