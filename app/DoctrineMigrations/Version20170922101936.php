<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170922101936 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_songtype');
        $this->addSql('ALTER TABLE film_has_stageshow DROP FOREIGN KEY FK_9E77580A7AC68360');
        $this->addSql('DROP INDEX idx_9e77580a7ac68360 ON film_has_stageshow');
        $this->addSql('CREATE INDEX IDX_9E77580AB57BBAFC ON film_has_stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE film_has_stageshow ADD CONSTRAINT FK_9E77580A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE number_has_stagenumber DROP FOREIGN KEY FK_D5FF714816865F1D');
        $this->addSql('DROP INDEX idx_d5ff71489477ddbe ON number_has_stagenumber');
        $this->addSql('CREATE INDEX IDX_D5FF714816865F1D ON number_has_stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stageNumber DROP FOREIGN KEY FK_8EB31DA316865F1D');
        $this->addSql('DROP INDEX idx_8eb31da39477ddbe ON song_has_stageNumber');
        $this->addSql('CREATE INDEX IDX_8EB31DA316865F1D ON song_has_stageNumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stageNumber ADD CONSTRAINT FK_8EB31DA316865F1D FOREIGN KEY (stageNumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410C7AC68360');
        $this->addSql('ALTER TABLE stagenumber DROP type_id, CHANGE stageShow_id stageshow_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_9c0f410c7ac68360 ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9C0F410CB57BBAFC ON stagenumber (stageshow_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410C7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stagenumber_has_editor DROP FOREIGN KEY FK_5F6C866F9477DDBE');
        $this->addSql('DROP INDEX idx_5f6c866f9477ddbe ON stagenumber_has_editor');
        $this->addSql('CREATE INDEX IDX_5F6C866F16865F1D ON stagenumber_has_editor (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_editor ADD CONSTRAINT FK_5F6C866F9477DDBE FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stageshow_has_film DROP FOREIGN KEY FK_FC291A607AC68360');
        $this->addSql('DROP INDEX idx_fc291a607ac68360 ON stageshow_has_film');
        $this->addSql('CREATE INDEX IDX_FC291A60B57BBAFC ON stageshow_has_film (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_film ADD CONSTRAINT FK_FC291A607AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_composer DROP FOREIGN KEY FK_10F12A037AC68360');
        $this->addSql('DROP INDEX idx_10f12a037ac68360 ON stageshow_has_composer');
        $this->addSql('CREATE INDEX IDX_10F12A03B57BBAFC ON stageshow_has_composer (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_composer ADD CONSTRAINT FK_10F12A037AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_book DROP FOREIGN KEY FK_B58807737AC68360');
        $this->addSql('DROP INDEX idx_b58807737ac68360 ON stageshow_has_book');
        $this->addSql('CREATE INDEX IDX_B5880773B57BBAFC ON stageshow_has_book (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_book ADD CONSTRAINT FK_B58807737AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_lyricist DROP FOREIGN KEY FK_FC335D1A7AC68360');
        $this->addSql('DROP INDEX idx_fc335d1a7ac68360 ON stageshow_has_lyricist');
        $this->addSql('CREATE INDEX IDX_FC335D1AB57BBAFC ON stageshow_has_lyricist (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_lyricist ADD CONSTRAINT FK_FC335D1A7AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_choreographer DROP FOREIGN KEY FK_9E451D8A7AC68360');
        $this->addSql('DROP INDEX idx_9e451d8a7ac68360 ON stageshow_has_choreographer');
        $this->addSql('CREATE INDEX IDX_9E451D8AB57BBAFC ON stageshow_has_choreographer (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_choreographer ADD CONSTRAINT FK_9E451D8A7AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_director DROP FOREIGN KEY FK_9612FF2B7AC68360');
        $this->addSql('DROP INDEX idx_9612ff2b7ac68360 ON stageshow_has_director');
        $this->addSql('CREATE INDEX IDX_9612FF2BB57BBAFC ON stageshow_has_director (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_director ADD CONSTRAINT FK_9612FF2B7AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_design DROP FOREIGN KEY FK_DEBB6E2B7AC68360');
        $this->addSql('DROP INDEX idx_debb6e2b7ac68360 ON stageshow_has_design');
        $this->addSql('CREATE INDEX IDX_DEBB6E2BB57BBAFC ON stageshow_has_design (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_design ADD CONSTRAINT FK_DEBB6E2B7AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_editor DROP FOREIGN KEY FK_57C0FB3F30766468');
        $this->addSql('ALTER TABLE stageshow_has_editor DROP FOREIGN KEY FK_57C0FB3F7AC68360');
        $this->addSql('DROP INDEX idx_57c0fb3f7ac68360 ON stageshow_has_editor');
        $this->addSql('CREATE INDEX IDX_DF05C5A1B57BBAFC ON stageshow_has_editor (stageshow_id)');
        $this->addSql('DROP INDEX idx_57c0fb3f30766468 ON stageshow_has_editor');
        $this->addSql('CREATE INDEX IDX_DF05C5A130766468 ON stageshow_has_editor (editors)');
        $this->addSql('ALTER TABLE stageshow_has_editor ADD CONSTRAINT FK_57C0FB3F30766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE stageshow_has_editor ADD CONSTRAINT FK_57C0FB3F7AC68360 FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_songtype (song_id INT NOT NULL, songtype_id INT NOT NULL, INDEX IDX_67558659A0BDB2F3 (song_id), INDEX IDX_675586593A047A9A (songtype_id), PRIMARY KEY(song_id, songtype_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_songtype ADD CONSTRAINT FK_675586593A047A9A FOREIGN KEY (songtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_songtype ADD CONSTRAINT FK_67558659A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE film_has_stageshow DROP FOREIGN KEY FK_9E77580AB57BBAFC');
        $this->addSql('DROP INDEX idx_9e77580ab57bbafc ON film_has_stageshow');
        $this->addSql('CREATE INDEX IDX_9E77580A7AC68360 ON film_has_stageshow (stageShow_id)');
        $this->addSql('ALTER TABLE film_has_stageshow ADD CONSTRAINT FK_9E77580AB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE number_has_stagenumber DROP FOREIGN KEY FK_D5FF714816865F1D');
        $this->addSql('DROP INDEX idx_d5ff714816865f1d ON number_has_stagenumber');
        $this->addSql('CREATE INDEX IDX_D5FF71489477DDBE ON number_has_stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stagenumber DROP FOREIGN KEY FK_8EB31DA316865F1D');
        $this->addSql('DROP INDEX idx_8eb31da316865f1d ON song_has_stagenumber');
        $this->addSql('CREATE INDEX IDX_8EB31DA39477DDBE ON song_has_stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE song_has_stagenumber ADD CONSTRAINT FK_8EB31DA316865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410CB57BBAFC');
        $this->addSql('ALTER TABLE stagenumber ADD type_id INT DEFAULT NULL, CHANGE stageshow_id stageShow_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_9c0f410cb57bbafc ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9C0F410C7AC68360 ON stagenumber (stageShow_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410CB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stagenumber_has_editor DROP FOREIGN KEY FK_5F6C866F16865F1D');
        $this->addSql('DROP INDEX idx_5f6c866f16865f1d ON stagenumber_has_editor');
        $this->addSql('CREATE INDEX IDX_5F6C866F9477DDBE ON stagenumber_has_editor (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_editor ADD CONSTRAINT FK_5F6C866F16865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stageshow_has_book DROP FOREIGN KEY FK_B5880773B57BBAFC');
        $this->addSql('DROP INDEX idx_b5880773b57bbafc ON stageshow_has_book');
        $this->addSql('CREATE INDEX IDX_B58807737AC68360 ON stageshow_has_book (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_book ADD CONSTRAINT FK_B5880773B57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_choreographer DROP FOREIGN KEY FK_9E451D8AB57BBAFC');
        $this->addSql('DROP INDEX idx_9e451d8ab57bbafc ON stageshow_has_choreographer');
        $this->addSql('CREATE INDEX IDX_9E451D8A7AC68360 ON stageshow_has_choreographer (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_choreographer ADD CONSTRAINT FK_9E451D8AB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_composer DROP FOREIGN KEY FK_10F12A03B57BBAFC');
        $this->addSql('DROP INDEX idx_10f12a03b57bbafc ON stageshow_has_composer');
        $this->addSql('CREATE INDEX IDX_10F12A037AC68360 ON stageshow_has_composer (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_composer ADD CONSTRAINT FK_10F12A03B57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_design DROP FOREIGN KEY FK_DEBB6E2BB57BBAFC');
        $this->addSql('DROP INDEX idx_debb6e2bb57bbafc ON stageshow_has_design');
        $this->addSql('CREATE INDEX IDX_DEBB6E2B7AC68360 ON stageshow_has_design (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_design ADD CONSTRAINT FK_DEBB6E2BB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_director DROP FOREIGN KEY FK_9612FF2BB57BBAFC');
        $this->addSql('DROP INDEX idx_9612ff2bb57bbafc ON stageshow_has_director');
        $this->addSql('CREATE INDEX IDX_9612FF2B7AC68360 ON stageshow_has_director (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_director ADD CONSTRAINT FK_9612FF2BB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_editor DROP FOREIGN KEY FK_DF05C5A1B57BBAFC');
        $this->addSql('ALTER TABLE stageshow_has_editor DROP FOREIGN KEY FK_DF05C5A130766468');
        $this->addSql('DROP INDEX idx_df05c5a1b57bbafc ON stageshow_has_editor');
        $this->addSql('CREATE INDEX IDX_57C0FB3F7AC68360 ON stageshow_has_editor (stageshow_id)');
        $this->addSql('DROP INDEX idx_df05c5a130766468 ON stageshow_has_editor');
        $this->addSql('CREATE INDEX IDX_57C0FB3F30766468 ON stageshow_has_editor (editors)');
        $this->addSql('ALTER TABLE stageshow_has_editor ADD CONSTRAINT FK_DF05C5A1B57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_editor ADD CONSTRAINT FK_DF05C5A130766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE stageshow_has_film DROP FOREIGN KEY FK_FC291A60B57BBAFC');
        $this->addSql('DROP INDEX idx_fc291a60b57bbafc ON stageshow_has_film');
        $this->addSql('CREATE INDEX IDX_FC291A607AC68360 ON stageshow_has_film (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_film ADD CONSTRAINT FK_FC291A60B57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_lyricist DROP FOREIGN KEY FK_FC335D1AB57BBAFC');
        $this->addSql('DROP INDEX idx_fc335d1ab57bbafc ON stageshow_has_lyricist');
        $this->addSql('CREATE INDEX IDX_FC335D1A7AC68360 ON stageshow_has_lyricist (stageshow_id)');
        $this->addSql('ALTER TABLE stageshow_has_lyricist ADD CONSTRAINT FK_FC335D1AB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
    }
}
