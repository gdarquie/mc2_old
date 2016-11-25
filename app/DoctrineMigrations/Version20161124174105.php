<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161124174105 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE film_has_studio (film_id INT NOT NULL, studio_id INT NOT NULL, INDEX IDX_D9EDBD65567F5183 (film_id), INDEX IDX_D9EDBD65446F285F (studio_id), PRIMARY KEY(film_id, studio_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film_has_studio ADD CONSTRAINT FK_D9EDBD65567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_has_studio ADD CONSTRAINT FK_D9EDBD65446F285F FOREIGN KEY (studio_id) REFERENCES studio (studio_id)');
        $this->addSql('DROP TABLE import_studio');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE import_studio (imdb VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, studio VARCHAR(500) NOT NULL COLLATE latin1_swedish_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE film_has_studio');
    }
}
