<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170929085311 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_validation_title (number_id INT NOT NULL, validation_title INT NOT NULL, INDEX IDX_A02FCCC30A1DE10 (number_id), INDEX IDX_A02FCCCC3257D78 (validation_title), PRIMARY KEY(number_id, validation_title)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_director (number_id INT NOT NULL, validation_director INT NOT NULL, INDEX IDX_BCFC31CE30A1DE10 (number_id), INDEX IDX_BCFC31CEF9397BAA (validation_director), PRIMARY KEY(number_id, validation_director)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_tc (number_id INT NOT NULL, validation_tc INT NOT NULL, INDEX IDX_71E342B230A1DE10 (number_id), INDEX IDX_71E342B2C32FB1EF (validation_tc), PRIMARY KEY(number_id, validation_tc)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_structure (number_id INT NOT NULL, validation_structure INT NOT NULL, INDEX IDX_AEC246A330A1DE10 (number_id), INDEX IDX_AEC246A3E45826A8 (validation_structure), PRIMARY KEY(number_id, validation_structure)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_shots (number_id INT NOT NULL, validation_shots INT NOT NULL, INDEX IDX_6622262030A1DE10 (number_id), INDEX IDX_66222620AF05A794 (validation_shots), PRIMARY KEY(number_id, validation_shots)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_performance (number_id INT NOT NULL, validation_performance INT NOT NULL, INDEX IDX_846EE2A430A1DE10 (number_id), INDEX IDX_846EE2A42A2810AD (validation_performance), PRIMARY KEY(number_id, validation_performance)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_backstage (number_id INT NOT NULL, validation_backstage INT NOT NULL, INDEX IDX_952DA17530A1DE10 (number_id), INDEX IDX_952DA175DFB7C17E (validation_backstage), PRIMARY KEY(number_id, validation_backstage)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_theme (number_id INT NOT NULL, validation_theme INT NOT NULL, INDEX IDX_B64163AF30A1DE10 (number_id), INDEX IDX_B64163AF7F66E21B (validation_theme), PRIMARY KEY(number_id, validation_theme)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_mood (number_id INT NOT NULL, validation_mood INT NOT NULL, INDEX IDX_8349BCC230A1DE10 (number_id), INDEX IDX_8349BCC2A8E88EB1 (validation_mood), PRIMARY KEY(number_id, validation_mood)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_dance (number_id INT NOT NULL, validation_dance INT NOT NULL, INDEX IDX_397F79C830A1DE10 (number_id), INDEX IDX_397F79C8F058F87C (validation_dance), PRIMARY KEY(number_id, validation_dance)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_music (number_id INT NOT NULL, validation_music INT NOT NULL, INDEX IDX_EC66A6ED30A1DE10 (number_id), INDEX IDX_EC66A6ED25412759 (validation_music), PRIMARY KEY(number_id, validation_music)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_reference (number_id INT NOT NULL, validation_reference INT NOT NULL, INDEX IDX_6F60385A30A1DE10 (number_id), INDEX IDX_6F60385A25FA5851 (validation_reference), PRIMARY KEY(number_id, validation_reference)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_cost (number_id INT NOT NULL, validation_cost INT NOT NULL, INDEX IDX_985686C830A1DE10 (number_id), INDEX IDX_985686C8B3F7B4BB (validation_cost), PRIMARY KEY(number_id, validation_cost)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_validation_title ADD CONSTRAINT FK_A02FCCC30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_title ADD CONSTRAINT FK_A02FCCCC3257D78 FOREIGN KEY (validation_title) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_director ADD CONSTRAINT FK_BCFC31CE30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_director ADD CONSTRAINT FK_BCFC31CEF9397BAA FOREIGN KEY (validation_director) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_tc ADD CONSTRAINT FK_71E342B230A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_tc ADD CONSTRAINT FK_71E342B2C32FB1EF FOREIGN KEY (validation_tc) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_structure ADD CONSTRAINT FK_AEC246A330A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_structure ADD CONSTRAINT FK_AEC246A3E45826A8 FOREIGN KEY (validation_structure) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_shots ADD CONSTRAINT FK_6622262030A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_shots ADD CONSTRAINT FK_66222620AF05A794 FOREIGN KEY (validation_shots) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_performance ADD CONSTRAINT FK_846EE2A430A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_performance ADD CONSTRAINT FK_846EE2A42A2810AD FOREIGN KEY (validation_performance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_backstage ADD CONSTRAINT FK_952DA17530A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_backstage ADD CONSTRAINT FK_952DA175DFB7C17E FOREIGN KEY (validation_backstage) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_theme ADD CONSTRAINT FK_B64163AF30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_theme ADD CONSTRAINT FK_B64163AF7F66E21B FOREIGN KEY (validation_theme) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_mood ADD CONSTRAINT FK_8349BCC230A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_mood ADD CONSTRAINT FK_8349BCC2A8E88EB1 FOREIGN KEY (validation_mood) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_dance ADD CONSTRAINT FK_397F79C830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_dance ADD CONSTRAINT FK_397F79C8F058F87C FOREIGN KEY (validation_dance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_music ADD CONSTRAINT FK_EC66A6ED30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_music ADD CONSTRAINT FK_EC66A6ED25412759 FOREIGN KEY (validation_music) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_reference ADD CONSTRAINT FK_6F60385A30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_reference ADD CONSTRAINT FK_6F60385A25FA5851 FOREIGN KEY (validation_reference) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_cost ADD CONSTRAINT FK_985686C830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_cost ADD CONSTRAINT FK_985686C8B3F7B4BB FOREIGN KEY (validation_cost) REFERENCES validation (validation_id)');
        $this->addSql('DROP TABLE number_has_songtype');
        $this->addSql('ALTER TABLE film_has_stageshow DROP FOREIGN KEY FK_9E77580A7AC68360');
        $this->addSql('DROP INDEX idx_9e77580a7ac68360 ON film_has_stageshow');
        $this->addSql('CREATE INDEX IDX_9E77580AB57BBAFC ON film_has_stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE film_has_stageshow ADD CONSTRAINT FK_9E77580A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE number DROP validation_tc, DROP validation_structure, DROP validation_shots, DROP validation_performance, DROP validation_backstage, DROP validation_theme, DROP validation_mood, DROP validation_dance, DROP validation_music, DROP validation_director, DROP validation_cost, DROP validation_reference');
        $this->addSql('ALTER TABLE number_has_stagenumber DROP FOREIGN KEY FK_D5FF714816865F1D');
        $this->addSql('DROP INDEX idx_d5ff71489477ddbe ON number_has_stagenumber');
        $this->addSql('CREATE INDEX IDX_D5FF714816865F1D ON number_has_stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stagenumber DROP FOREIGN KEY FK_8EB31DA316865F1D');
        $this->addSql('DROP INDEX idx_8eb31da39477ddbe ON song_has_stagenumber');
        $this->addSql('CREATE INDEX IDX_8EB31DA316865F1D ON song_has_stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stagenumber ADD CONSTRAINT FK_8EB31DA316865F1D FOREIGN KEY (stageNumber_id) REFERENCES stagenumber (stagenumber_id)');
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
        $this->addSql('ALTER TABLE thesaurus DROP type, DROP category');
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
        $this->addSql('DROP TABLE number_has_validation_title');
        $this->addSql('DROP TABLE number_has_validation_director');
        $this->addSql('DROP TABLE number_has_validation_tc');
        $this->addSql('DROP TABLE number_has_validation_structure');
        $this->addSql('DROP TABLE number_has_validation_shots');
        $this->addSql('DROP TABLE number_has_validation_performance');
        $this->addSql('DROP TABLE number_has_validation_backstage');
        $this->addSql('DROP TABLE number_has_validation_theme');
        $this->addSql('DROP TABLE number_has_validation_mood');
        $this->addSql('DROP TABLE number_has_validation_dance');
        $this->addSql('DROP TABLE number_has_validation_music');
        $this->addSql('DROP TABLE number_has_validation_reference');
        $this->addSql('DROP TABLE number_has_validation_cost');
        $this->addSql('ALTER TABLE film_has_stageshow DROP FOREIGN KEY FK_9E77580AB57BBAFC');
        $this->addSql('DROP INDEX idx_9e77580ab57bbafc ON film_has_stageshow');
        $this->addSql('CREATE INDEX IDX_9E77580A7AC68360 ON film_has_stageshow (stageShow_id)');
        $this->addSql('ALTER TABLE film_has_stageshow ADD CONSTRAINT FK_9E77580AB57BBAFC FOREIGN KEY (stageshow_id) REFERENCES stageshow (stageshow_id)');
        $this->addSql('ALTER TABLE number ADD validation_tc INT DEFAULT NULL, ADD validation_structure INT DEFAULT NULL, ADD validation_shots INT DEFAULT NULL, ADD validation_performance INT DEFAULT NULL, ADD validation_backstage INT DEFAULT NULL, ADD validation_theme INT DEFAULT NULL, ADD validation_mood INT DEFAULT NULL, ADD validation_dance INT DEFAULT NULL, ADD validation_music INT DEFAULT NULL, ADD validation_director INT DEFAULT NULL, ADD validation_cost INT DEFAULT NULL, ADD validation_reference INT DEFAULT NULL');
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
        $this->addSql('ALTER TABLE thesaurus ADD type VARCHAR(255) NOT NULL COLLATE utf8_general_ci, ADD category VARCHAR(500) DEFAULT NULL COLLATE utf8_general_ci');
    }
}
