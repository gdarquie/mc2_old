<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161123101008 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_thesaurus (number_id INT NOT NULL, thesaurus_id INT NOT NULL, INDEX IDX_56AA620F30A1DE10 (number_id), INDEX IDX_56AA620F7D2DB431 (thesaurus_id), PRIMARY KEY(number_id, thesaurus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_thesaurus ADD CONSTRAINT FK_56AA620F30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_thesaurus ADD CONSTRAINT FK_56AA620F7D2DB431 FOREIGN KEY (thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE disc_has_person');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE disc_has_person (profession_id INT NOT NULL, person_id INT NOT NULL, disc_id INT NOT NULL, INDEX fk_disc_has_person_person1_idx (person_id), INDEX fk_disc_has_person_disc1_idx (disc_id), INDEX fk_disc_has_person_profession1_idx (profession_id), PRIMARY KEY(profession_id, person_id, disc_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disc_has_person ADD CONSTRAINT fk_disc_has_person_disc1 FOREIGN KEY (disc_id) REFERENCES disc (disc_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE disc_has_person ADD CONSTRAINT fk_disc_has_person_person1 FOREIGN KEY (person_id) REFERENCES person (person_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE disc_has_person ADD CONSTRAINT fk_disc_has_person_profession1 FOREIGN KEY (profession_id) REFERENCES profession (profession_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE number_has_thesaurus');
    }
}
