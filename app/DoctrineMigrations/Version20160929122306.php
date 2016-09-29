<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929122306 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_dancemble (number_id INT NOT NULL, dancemble_id INT NOT NULL, INDEX IDX_F72B0BBD30A1DE10 (number_id), INDEX IDX_F72B0BBD9577FDB6 (dancemble_id), PRIMARY KEY(number_id, dancemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_dancemble ADD CONSTRAINT FK_F72B0BBD30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_dancemble ADD CONSTRAINT FK_F72B0BBD9577FDB6 FOREIGN KEY (dancemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F549577FDB6');
        $this->addSql('DROP INDEX IDX_96901F549577FDB6 ON number');
        $this->addSql('ALTER TABLE number DROP dancemble_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_dancemble');
        $this->addSql('ALTER TABLE number ADD dancemble_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F549577FDB6 FOREIGN KEY (dancemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F549577FDB6 ON number (dancemble_id)');
    }
}
