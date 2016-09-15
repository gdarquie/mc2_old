<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160913162410 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE validation (validation_id INT AUTO_INCREMENT NOT NULL, user VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(validation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE filmDirector');
        $this->addSql('DROP TABLE import_composer');
        $this->addSql('DROP TABLE import_location');
        $this->addSql('DROP TABLE import_quotation');
        $this->addSql('DROP TABLE import_stageShow');
        $this->addSql('ALTER TABLE validation_category ADD title VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE filmDirector (id INT AUTO_INCREMENT NOT NULL, film VARCHAR(500) DEFAULT NULL COLLATE utf8_unicode_ci, imdb VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, name VARCHAR(500) DEFAULT NULL COLLATE utf8_unicode_ci, person_id INT DEFAULT NULL, film_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_composer (id INT AUTO_INCREMENT NOT NULL, song VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, person VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, song_id INT DEFAULT NULL, person_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_location (id INT AUTO_INCREMENT NOT NULL, film INT DEFAULT NULL, timecode INT DEFAULT NULL, location VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_quotation (id INT AUTO_INCREMENT NOT NULL, film INT DEFAULT NULL, timecode INT DEFAULT NULL, title VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, external TEXT DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_stageShow (film_id INT DEFAULT NULL, stageShow_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(500) DEFAULT NULL COLLATE utf8_general_ci, production VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, opening DATE DEFAULT NULL, revival VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, ibdb INT DEFAULT NULL, race VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, status VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, closing DATE DEFAULT NULL, count INT DEFAULT NULL, song VARCHAR(500) DEFAULT NULL COLLATE utf8_general_ci, INDEX fk_stageShow_film1_idx (film_id), PRIMARY KEY(stageShow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE import_stageShow ADD CONSTRAINT fk_stageShow_film1 FOREIGN KEY (film_id) REFERENCES film (film_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE validation');
        $this->addSql('ALTER TABLE validation_category DROP title');
    }
}
