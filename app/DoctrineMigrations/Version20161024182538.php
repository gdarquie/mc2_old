<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161024182538 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE item');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE item (item_id INT AUTO_INCREMENT NOT NULL, thesaurus_id INT DEFAULT NULL, structure INT DEFAULT NULL, timestamp DATETIME NOT NULL, validation_id INT NOT NULL, UNIQUE INDEX structure_2 (structure), INDEX fk_item_Thesaurus (thesaurus_id), PRIMARY KEY(item_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT fk_item_Thesaurus FOREIGN KEY (thesaurus_id) REFERENCES thesaurus (thesaurus_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT fk_item_structure FOREIGN KEY (structure) REFERENCES number (number_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
