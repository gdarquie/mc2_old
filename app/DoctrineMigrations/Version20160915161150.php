<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160915161150 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_performer (number_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_697957E830A1DE10 (number_id), INDEX IDX_697957E8217BBB47 (person_id), PRIMARY KEY(number_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_performer ADD CONSTRAINT FK_697957E830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_performer ADD CONSTRAINT FK_697957E8217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE number DROP performers');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_performer');
        $this->addSql('ALTER TABLE number ADD performers VARCHAR(255) NOT NULL COLLATE utf8_general_ci');
    }
}
