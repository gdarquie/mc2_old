<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161122181801 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE person_has_radio');
        $this->addSql('DROP TABLE person_has_song');
        $this->addSql('DROP TABLE person_has_stageNumber');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE person_has_radio (radio_id INT NOT NULL, profession_id INT NOT NULL, person_id INT NOT NULL, INDEX fk_person_has_radio_radio1_idx (radio_id), INDEX fk_person_has_radio_person1_idx (person_id), INDEX fk_person_has_radio_profession1_idx (profession_id), PRIMARY KEY(radio_id, profession_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_has_song (profession_id INT NOT NULL, song_id INT NOT NULL, person_id INT NOT NULL, INDEX fk_person_has_song_song1_idx (song_id), INDEX fk_person_has_song_person1_idx (person_id), INDEX fk_person_has_song_profession1_idx (profession_id), PRIMARY KEY(profession_id, song_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_has_stageNumber (profession_id INT NOT NULL, person_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX fk_person_has_stageNumber_stageNumber1_idx (stageNumber_id), INDEX fk_person_has_stageNumber_person1_idx (person_id), INDEX fk_person_has_stageNumber_profession1_idx (profession_id), PRIMARY KEY(stageNumber_id, profession_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person_has_radio ADD CONSTRAINT FK_A3E6E81B217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE person_has_radio ADD CONSTRAINT FK_A3E6E81B5B94ADD2 FOREIGN KEY (radio_id) REFERENCES radio (radio_id)');
        $this->addSql('ALTER TABLE person_has_radio ADD CONSTRAINT FK_A3E6E81BFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('ALTER TABLE person_has_song ADD CONSTRAINT FK_FAF790C9217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE person_has_stageNumber ADD CONSTRAINT FK_33C704A6217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE person_has_stageNumber ADD CONSTRAINT FK_33C704A69477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE person_has_stageNumber ADD CONSTRAINT FK_33C704A6FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
    }
}
