<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161031183620 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number_has_ensemble DROP FOREIGN KEY FK_656BFEBDB268ECB1');
        $this->addSql('ALTER TABLE integration_has_number DROP FOREIGN KEY fk_integration_has_number_integration1');
        $this->addSql('CREATE TABLE person_has_editor (person_id INT NOT NULL, editors INT NOT NULL, INDEX IDX_D6688534217BBB47 (person_id), INDEX IDX_D668853430766468 (editors), PRIMARY KEY(person_id, editors)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song_has_editor (song_id INT NOT NULL, editors INT NOT NULL, INDEX IDX_5A7B7C31A0BDB2F3 (song_id), INDEX IDX_5A7B7C3130766468 (editors), PRIMARY KEY(song_id, editors)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagenumer_has_musensemble (musensemble_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_B67EB77C9477DDBE (stageNumber_id), INDEX IDX_B67EB77CC77C477B (musensemble_id), PRIMARY KEY(stageNumber_id, musensemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagenumber_has_dancemble (dancemble_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_ECF1A03E9477DDBE (stageNumber_id), INDEX IDX_ECF1A03E9577FDB6 (dancemble_id), PRIMARY KEY(stageNumber_id, dancemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person_has_editor ADD CONSTRAINT FK_D6688534217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE person_has_editor ADD CONSTRAINT FK_D668853430766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE song_has_editor ADD CONSTRAINT FK_5A7B7C31A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_editor ADD CONSTRAINT FK_5A7B7C3130766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE stagenumer_has_musensemble ADD CONSTRAINT FK_B67EB77C9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumer_has_musensemble ADD CONSTRAINT FK_B67EB77CC77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancemble ADD CONSTRAINT FK_ECF1A03E9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancemble ADD CONSTRAINT FK_ECF1A03E9577FDB6 FOREIGN KEY (dancemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE costumes_has_number');
        $this->addSql('DROP TABLE ensemble');
        $this->addSql('DROP TABLE integration');
        $this->addSql('DROP TABLE integration_has_number');
        $this->addSql('DROP TABLE mood');
        $this->addSql('DROP TABLE musical');
        $this->addSql('DROP TABLE musical_has_TV');
        $this->addSql('DROP TABLE musical_has_disc');
        $this->addSql('DROP TABLE musical_has_number');
        $this->addSql('DROP TABLE musical_has_radio');
        $this->addSql('DROP TABLE musical_has_stageNumber');
        $this->addSql('DROP TABLE number_has_ensemble');
        $this->addSql('DROP TABLE number_has_mood');
        $this->addSql('DROP TABLE number_has_person');
        $this->addSql('DROP TABLE socialPlace');
        $this->addSql('DROP TABLE socialPlace_has_number');
        $this->addSql('DROP TABLE stageNumber_has_ensemble');
        $this->addSql('ALTER TABLE stageNumber_has_costumes ADD CONSTRAINT FK_381A8CBCD80B7637 FOREIGN KEY (costumes_id) REFERENCES costumes (costumes_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costumes ADD CONSTRAINT FK_381A8CBC9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE TV_has_dancing ADD CONSTRAINT FK_3BF2424139A9F94C FOREIGN KEY (dancing_id) REFERENCES dancing (dancing_id)');
        $this->addSql('ALTER TABLE TV_has_dancing ADD CONSTRAINT FK_3BF242417CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B4DAF94A');
        $this->addSql('DROP INDEX IDX_96901F54B4DAF94A ON number');
        $this->addSql('ALTER TABLE number DROP mood_thesaurus_id, DROP diegetic, DROP musician, DROP integration_id, DROP tempo, CHANGE complete_title complete_title INT DEFAULT NULL, CHANGE complete_tc complete_tc INT DEFAULT NULL, CHANGE complete_structure complete_structure INT DEFAULT NULL, CHANGE complete_shots complete_shots INT DEFAULT NULL, CHANGE complete_performance complete_performance INT DEFAULT NULL, CHANGE complete_backstage complete_backstage INT DEFAULT NULL, CHANGE complete_theme complete_theme INT DEFAULT NULL, CHANGE complete_mood complete_mood INT DEFAULT NULL, CHANGE complete_dance complete_dance INT DEFAULT NULL, CHANGE complete_music complete_music INT DEFAULT NULL, CHANGE complete_director complete_director INT DEFAULT NULL, CHANGE complete_cost complete_cost INT DEFAULT NULL, CHANGE complete_reference complete_reference INT DEFAULT NULL, CHANGE comment_tc comment_tc INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stageNumber_has_number ADD CONSTRAINT FK_50D688130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE stageNumber_has_number ADD CONSTRAINT FK_50D68819477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE person ADD date_creation DATETIME NOT NULL, ADD last_update DATETIME NOT NULL');
        $this->addSql('ALTER TABLE song ADD date_creation DATETIME NOT NULL, ADD last_update DATETIME NOT NULL');
        $this->addSql('ALTER TABLE song_has_radio ADD CONSTRAINT FK_63631E45A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_radio ADD CONSTRAINT FK_63631E455B94ADD2 FOREIGN KEY (radio_id) REFERENCES radio (radio_id)');
        $this->addSql('ALTER TABLE song_has_stageNumber ADD CONSTRAINT FK_8EB31DA3A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_stageNumber ADD CONSTRAINT FK_8EB31DA39477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE song_has_quotation ADD CONSTRAINT FK_296AF576A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_quotation ADD CONSTRAINT FK_296AF576B4EA4E60 FOREIGN KEY (quotation_id) REFERENCES quotation (quotation_id)');
        $this->addSql('ALTER TABLE song_has_disc ADD CONSTRAINT FK_F42FD827A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_disc ADD CONSTRAINT FK_F42FD827C38F37CA FOREIGN KEY (disc_id) REFERENCES disc (disc_id)');
        $this->addSql('ALTER TABLE songType_has_song ADD CONSTRAINT FK_A30DA208A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE songType_has_song ADD CONSTRAINT FK_A30DA208F5B94306 FOREIGN KEY (songType_id) REFERENCES songType (songType_id)');
        $this->addSql('ALTER TABLE song_has_TV ADD CONSTRAINT FK_1B136DE7A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_TV ADD CONSTRAINT FK_1B136DE77CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE stageNumber ADD CONSTRAINT FK_9BA3443A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF37AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF3FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('ALTER TABLE stageShow_has_person ADD CONSTRAINT FK_AFEDDBF3217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F07CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F0FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('ALTER TABLE TV_has_person ADD CONSTRAINT FK_53363F0217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE fos_user CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6EA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE costumes_has_number (costumes_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_C3953BECD80B7637 (costumes_id), INDEX IDX_C3953BEC30A1DE10 (number_id), PRIMARY KEY(costumes_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ensemble (ensemble_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_general_ci, type VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(ensemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE integration (integration_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(integration_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE integration_has_number (integration_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_F52D374C9E82DDEA (integration_id), INDEX IDX_F52D374C30A1DE10 (number_id), PRIMARY KEY(integration_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mood (mood_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_general_ci, text TEXT DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(mood_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical (musical_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(45) NOT NULL COLLATE utf8_general_ci, type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(musical_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_TV (musical_id INT NOT NULL, TV_id INT NOT NULL, INDEX IDX_BAB1696B839489F9 (musical_id), INDEX IDX_BAB1696B7CD7D24A (TV_id), PRIMARY KEY(musical_id, TV_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_disc (musical_id INT NOT NULL, disc_id INT NOT NULL, INDEX IDX_64746ADB839489F9 (musical_id), INDEX IDX_64746ADBC38F37CA (disc_id), PRIMARY KEY(musical_id, disc_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_number (musical_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_9D7C7E95839489F9 (musical_id), INDEX IDX_9D7C7E9530A1DE10 (number_id), PRIMARY KEY(musical_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_radio (musical_id INT NOT NULL, radio_id INT NOT NULL, INDEX IDX_D7F8FBC0839489F9 (musical_id), INDEX IDX_D7F8FBC05B94ADD2 (radio_id), PRIMARY KEY(musical_id, radio_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_stageNumber (musical_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_88ECE00E839489F9 (musical_id), INDEX IDX_88ECE00E9477DDBE (stageNumber_id), PRIMARY KEY(musical_id, stageNumber_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_ensemble (ensemble_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_656BFEBDB268ECB1 (ensemble_id), INDEX IDX_656BFEBD30A1DE10 (number_id), PRIMARY KEY(ensemble_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_mood (number_id INT NOT NULL, mood_id INT NOT NULL, INDEX IDX_DE77805630A1DE10 (number_id), INDEX IDX_DE778056B889D33E (mood_id), PRIMARY KEY(number_id, mood_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_person (profession_id INT NOT NULL, person_id INT NOT NULL, number_id INT NOT NULL, INDEX fk_number_has_person_person1_idx (person_id), INDEX fk_number_has_person_number1_idx (number_id), INDEX fk_number_has_person_profession1_idx (profession_id), PRIMARY KEY(profession_id, person_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socialPlace (socialPlace_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(socialPlace_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socialPlace_has_number (number_id INT NOT NULL, socialPlace_id INT NOT NULL, INDEX IDX_F6842EA830A1DE10 (number_id), INDEX IDX_F6842EA8F69596F9 (socialPlace_id), PRIMARY KEY(number_id, socialPlace_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageNumber_has_ensemble (ensemble_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_BE6506E8B268ECB1 (ensemble_id), INDEX IDX_BE6506E89477DDBE (stageNumber_id), PRIMARY KEY(ensemble_id, stageNumber_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE integration_has_number ADD CONSTRAINT fk_integration_has_number_integration1 FOREIGN KEY (integration_id) REFERENCES integration (integration_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE integration_has_number ADD CONSTRAINT fk_integration_has_number_number1 FOREIGN KEY (number_id) REFERENCES number (number_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_TV ADD CONSTRAINT fk_musical_has_TV_TV1 FOREIGN KEY (TV_id) REFERENCES TV (TV_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_disc ADD CONSTRAINT fk_musical_has_disc_disc1 FOREIGN KEY (disc_id) REFERENCES disc (disc_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_number ADD CONSTRAINT fk_musical_has_number_number1 FOREIGN KEY (number_id) REFERENCES number (number_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_radio ADD CONSTRAINT fk_musical_has_radio_radio1 FOREIGN KEY (radio_id) REFERENCES radio (radio_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_stageNumber ADD CONSTRAINT fk_musical_has_stageNumber_stageNumber1 FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE number_has_ensemble ADD CONSTRAINT FK_656BFEBD30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_ensemble ADD CONSTRAINT FK_656BFEBDB268ECB1 FOREIGN KEY (ensemble_id) REFERENCES ensemble (ensemble_id)');
        $this->addSql('ALTER TABLE number_has_person ADD CONSTRAINT FK_460DBD1E217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE number_has_person ADD CONSTRAINT FK_460DBD1E30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_person ADD CONSTRAINT FK_460DBD1EFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
        $this->addSql('DROP TABLE person_has_editor');
        $this->addSql('DROP TABLE song_has_editor');
        $this->addSql('DROP TABLE stagenumer_has_musensemble');
        $this->addSql('DROP TABLE stagenumber_has_dancemble');
        $this->addSql('ALTER TABLE tv_has_dancing DROP FOREIGN KEY FK_3BF2424139A9F94C');
        $this->addSql('ALTER TABLE tv_has_dancing DROP FOREIGN KEY FK_3BF242417CD7D24A');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F07CD7D24A');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F0FDEF8996');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F0217BBB47');
        $this->addSql('ALTER TABLE fos_user CHANGE confirmation_token confirmation_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE number ADD mood_thesaurus_id INT DEFAULT NULL, ADD diegetic VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, ADD musician VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, ADD integration_id INT DEFAULT NULL, ADD tempo VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, CHANGE complete_title complete_title TINYINT(1) DEFAULT NULL, CHANGE complete_tc complete_tc TINYINT(1) DEFAULT NULL, CHANGE comment_tc comment_tc LONGTEXT DEFAULT NULL COLLATE utf8_general_ci, CHANGE complete_structure complete_structure TINYINT(1) DEFAULT NULL, CHANGE complete_shots complete_shots TINYINT(1) DEFAULT NULL, CHANGE complete_performance complete_performance TINYINT(1) DEFAULT NULL, CHANGE complete_backstage complete_backstage TINYINT(1) DEFAULT NULL, CHANGE complete_theme complete_theme TINYINT(1) DEFAULT NULL, CHANGE complete_mood complete_mood TINYINT(1) DEFAULT NULL, CHANGE complete_dance complete_dance TINYINT(1) DEFAULT NULL, CHANGE complete_music complete_music TINYINT(1) DEFAULT NULL, CHANGE complete_director complete_director TINYINT(1) DEFAULT NULL, CHANGE complete_cost complete_cost TINYINT(1) DEFAULT NULL, CHANGE complete_reference complete_reference TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B4DAF94A FOREIGN KEY (mood_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54B4DAF94A ON number (mood_thesaurus_id)');
        $this->addSql('ALTER TABLE person DROP date_creation, DROP last_update');
        $this->addSql('ALTER TABLE song DROP date_creation, DROP last_update');
        $this->addSql('ALTER TABLE songtype_has_song DROP FOREIGN KEY FK_A30DA208A0BDB2F3');
        $this->addSql('ALTER TABLE songtype_has_song DROP FOREIGN KEY FK_A30DA208F5B94306');
        $this->addSql('ALTER TABLE song_has_tv DROP FOREIGN KEY FK_1B136DE7A0BDB2F3');
        $this->addSql('ALTER TABLE song_has_tv DROP FOREIGN KEY FK_1B136DE77CD7D24A');
        $this->addSql('ALTER TABLE song_has_disc DROP FOREIGN KEY FK_F42FD827A0BDB2F3');
        $this->addSql('ALTER TABLE song_has_disc DROP FOREIGN KEY FK_F42FD827C38F37CA');
        $this->addSql('ALTER TABLE song_has_quotation DROP FOREIGN KEY FK_296AF576A0BDB2F3');
        $this->addSql('ALTER TABLE song_has_quotation DROP FOREIGN KEY FK_296AF576B4EA4E60');
        $this->addSql('ALTER TABLE song_has_radio DROP FOREIGN KEY FK_63631E45A0BDB2F3');
        $this->addSql('ALTER TABLE song_has_radio DROP FOREIGN KEY FK_63631E455B94ADD2');
        $this->addSql('ALTER TABLE song_has_stagenumber DROP FOREIGN KEY FK_8EB31DA3A0BDB2F3');
        $this->addSql('ALTER TABLE song_has_stagenumber DROP FOREIGN KEY FK_8EB31DA39477DDBE');
        $this->addSql('ALTER TABLE stageNumber DROP FOREIGN KEY FK_9BA3443A7AC68360');
        $this->addSql('ALTER TABLE stagenumber_has_costumes DROP FOREIGN KEY FK_381A8CBCD80B7637');
        $this->addSql('ALTER TABLE stagenumber_has_costumes DROP FOREIGN KEY FK_381A8CBC9477DDBE');
        $this->addSql('ALTER TABLE stagenumber_has_number DROP FOREIGN KEY FK_50D688130A1DE10');
        $this->addSql('ALTER TABLE stagenumber_has_number DROP FOREIGN KEY FK_50D68819477DDBE');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF37AC68360');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF3FDEF8996');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF3217BBB47');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6EA76ED395');
    }
}
