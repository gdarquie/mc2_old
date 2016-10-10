<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161011004115 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stageNumber DROP FOREIGN KEY FK_9BA3443A7AC68360');
        $this->addSql('DROP INDEX fk_stagenumber_stageshow1_idx ON stageNumber');
        $this->addSql('CREATE INDEX IDX_9BA3443A7AC68360 ON stageNumber (stageShow_id)');
        $this->addSql('ALTER TABLE stageNumber ADD CONSTRAINT FK_9BA3443A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF37AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF3FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF3217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F07CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F0FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F0217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6EA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F07CD7D24A');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F0FDEF8996');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F0217BBB47');
        $this->addSql('ALTER TABLE stageNumber DROP FOREIGN KEY FK_9BA3443A7AC68360');
        $this->addSql('DROP INDEX idx_9ba3443a7ac68360 ON stageNumber');
        $this->addSql('CREATE INDEX fk_stageNumber_stageShow1_idx ON stageNumber (stageShow_id)');
        $this->addSql('ALTER TABLE stageNumber ADD CONSTRAINT FK_9BA3443A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF37AC68360');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF3FDEF8996');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF3217BBB47');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6EA76ED395');
    }
}
