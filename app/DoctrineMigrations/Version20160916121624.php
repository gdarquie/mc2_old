<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160916121624 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_choregraph (number_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_42F4E26230A1DE10 (number_id), INDEX IDX_42F4E262217BBB47 (person_id), PRIMARY KEY(number_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_arranger (number_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_39EC201330A1DE10 (number_id), INDEX IDX_39EC2013217BBB47 (person_id), PRIMARY KEY(number_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_director (number_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_F7B06DFD30A1DE10 (number_id), INDEX IDX_F7B06DFD217BBB47 (person_id), PRIMARY KEY(number_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_choregraph ADD CONSTRAINT FK_42F4E26230A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_choregraph ADD CONSTRAINT FK_42F4E262217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE number_has_arranger ADD CONSTRAINT FK_39EC201330A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_arranger ADD CONSTRAINT FK_39EC2013217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE number_has_director ADD CONSTRAINT FK_F7B06DFD30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_director ADD CONSTRAINT FK_F7B06DFD217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE number ADD exoticism_thesaurus_id INT DEFAULT NULL, ADD dancemble_id INT DEFAULT NULL, ADD quotation_texte VARCHAR(255) NOT NULL, ADD general_localisation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B1FA28AC FOREIGN KEY (exoticism_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F549577FDB6 FOREIGN KEY (dancemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54B1FA28AC ON number (exoticism_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F549577FDB6 ON number (dancemble_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_choregraph');
        $this->addSql('DROP TABLE number_has_arranger');
        $this->addSql('DROP TABLE number_has_director');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B1FA28AC');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F549577FDB6');
        $this->addSql('DROP INDEX IDX_96901F54B1FA28AC ON number');
        $this->addSql('DROP INDEX IDX_96901F549577FDB6 ON number');
        $this->addSql('ALTER TABLE number DROP exoticism_thesaurus_id, DROP dancemble_id, DROP quotation_texte, DROP general_localisation');
    }
}
