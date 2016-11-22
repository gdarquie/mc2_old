<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161122181929 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE TV_has_person');
        $this->addSql('DROP TABLE stageShow_has_person');
        $this->addSql('DROP TABLE validation_category');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE TV_has_person (profession_id INT NOT NULL, person_id INT NOT NULL, TV_id INT NOT NULL, INDEX fk_TV_has_person_person1_idx (person_id), INDEX fk_TV_has_person_TV1_idx (TV_id), INDEX fk_TV_has_person_profession1_idx (profession_id), PRIMARY KEY(TV_id, profession_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageShow_has_person (profession_id INT NOT NULL, person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX fk_stageShow_has_person_person1_idx (person_id), INDEX fk_stageShow_has_person_stageShow1_idx (stageShow_id), INDEX fk_stageShow_has_person_profession1_idx (profession_id), PRIMARY KEY(stageShow_id, profession_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE validation_category (validation_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(validation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F0217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F07CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F0FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF3217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF37AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF3FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
    }
}
