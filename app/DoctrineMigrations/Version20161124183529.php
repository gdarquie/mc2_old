<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161124183529 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE import_censorship');
        $this->addSql('DROP TABLE import_filmCensorship');
        $this->addSql('DROP TABLE import_studio');
        $this->addSql('ALTER TABLE censorship ADD date_creation DATETIME NOT NULL, ADD last_update DATETIME NOT NULL');
        $this->addSql('ALTER TABLE state ADD date_creation DATETIME NOT NULL, ADD last_update DATETIME NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE import_censorship (titre VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, imdb VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, censorship VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, film_id INT NOT NULL, censorship_id INT NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_filmCensorship (film_id INT NOT NULL, film VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, imdb VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, verdict VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, legion VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, protestant VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, harrison VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, board VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_studio (imdb VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, studio VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci, film_id INT NOT NULL, studio_id INT NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE censorship DROP date_creation, DROP last_update');
        $this->addSql('ALTER TABLE state DROP date_creation, DROP last_update');
    }
}
