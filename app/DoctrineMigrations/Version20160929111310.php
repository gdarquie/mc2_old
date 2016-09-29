<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929111310 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_exoticismthesaurus (number_id INT NOT NULL, exoticism_thesaurus_id INT NOT NULL, INDEX IDX_6E78A2B830A1DE10 (number_id), INDEX IDX_6E78A2B8B1FA28AC (exoticism_thesaurus_id), PRIMARY KEY(number_id, exoticism_thesaurus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_imaginary (number_id INT NOT NULL, imaginary_id INT NOT NULL, INDEX IDX_2951547C30A1DE10 (number_id), INDEX IDX_2951547C88E9D8A6 (imaginary_id), PRIMARY KEY(number_id, imaginary_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_exoticismthesaurus ADD CONSTRAINT FK_6E78A2B830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_exoticismthesaurus ADD CONSTRAINT FK_6E78A2B8B1FA28AC FOREIGN KEY (exoticism_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_imaginary ADD CONSTRAINT FK_2951547C30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_imaginary ADD CONSTRAINT FK_2951547C88E9D8A6 FOREIGN KEY (imaginary_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5488E9D8A6');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B1FA28AC');
        $this->addSql('DROP INDEX IDX_96901F54B1FA28AC ON number');
        $this->addSql('DROP INDEX IDX_96901F5488E9D8A6 ON number');
        $this->addSql('ALTER TABLE number DROP imaginary_id, DROP exoticism_thesaurus_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_exoticismthesaurus');
        $this->addSql('DROP TABLE number_has_imaginary');
        $this->addSql('ALTER TABLE number ADD imaginary_id INT DEFAULT NULL, ADD exoticism_thesaurus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5488E9D8A6 FOREIGN KEY (imaginary_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B1FA28AC FOREIGN KEY (exoticism_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54B1FA28AC ON number (exoticism_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F5488E9D8A6 ON number (imaginary_id)');
    }
}
