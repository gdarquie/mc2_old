<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161024174836 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number_has_completeness DROP FOREIGN KEY FK_8527C1D1B640FBA5');
        $this->addSql('DROP TABLE completeness');
        $this->addSql('DROP TABLE number_has_completeness');
        $this->addSql('ALTER TABLE stageNumber_has_costumes ADD CONSTRAINT FK_381A8CBCD80B7637 FOREIGN KEY (costumes_id) REFERENCES costumes (costumes_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costumes ADD CONSTRAINT FK_381A8CBC9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE TV_has_dancing ADD CONSTRAINT FK_3BF2424139A9F94C FOREIGN KEY (dancing_id) REFERENCES dancing (dancing_id)');
        $this->addSql('ALTER TABLE TV_has_dancing ADD CONSTRAINT FK_3BF242417CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE stageNumber_has_ensemble ADD CONSTRAINT FK_BE6506E8B268ECB1 FOREIGN KEY (ensemble_id) REFERENCES ensemble (ensemble_id)');
        $this->addSql('ALTER TABLE stageNumber_has_ensemble ADD CONSTRAINT FK_BE6506E89477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_number ADD CONSTRAINT FK_50D688130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE stageNumber_has_number ADD CONSTRAINT FK_50D68819477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE socialPlace_has_number ADD CONSTRAINT FK_F6842EA830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE socialPlace_has_number ADD CONSTRAINT FK_F6842EA8F69596F9 FOREIGN KEY (socialplace_id) REFERENCES socialplace (socialplace_id)');
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
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6EA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE completeness (completeness_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(completeness_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_completeness (number_id INT NOT NULL, completeness_id INT NOT NULL, INDEX IDX_8527C1D130A1DE10 (number_id), INDEX IDX_8527C1D1B640FBA5 (completeness_id), PRIMARY KEY(number_id, completeness_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_completeness ADD CONSTRAINT FK_8527C1D130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_completeness ADD CONSTRAINT FK_8527C1D1B640FBA5 FOREIGN KEY (completeness_id) REFERENCES completeness (completeness_id)');
        $this->addSql('ALTER TABLE tv_has_dancing DROP FOREIGN KEY FK_3BF2424139A9F94C');
        $this->addSql('ALTER TABLE tv_has_dancing DROP FOREIGN KEY FK_3BF242417CD7D24A');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F07CD7D24A');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F0FDEF8996');
        $this->addSql('ALTER TABLE TV_has_person DROP FOREIGN KEY FK_53363F0217BBB47');
        $this->addSql('ALTER TABLE socialplace_has_number DROP FOREIGN KEY FK_F6842EA830A1DE10');
        $this->addSql('ALTER TABLE socialplace_has_number DROP FOREIGN KEY FK_F6842EA8F69596F9');
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
        $this->addSql('ALTER TABLE stagenumber_has_ensemble DROP FOREIGN KEY FK_BE6506E8B268ECB1');
        $this->addSql('ALTER TABLE stagenumber_has_ensemble DROP FOREIGN KEY FK_BE6506E89477DDBE');
        $this->addSql('ALTER TABLE stagenumber_has_number DROP FOREIGN KEY FK_50D688130A1DE10');
        $this->addSql('ALTER TABLE stagenumber_has_number DROP FOREIGN KEY FK_50D68819477DDBE');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF37AC68360');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF3FDEF8996');
        $this->addSql('ALTER TABLE stageShow_has_person DROP FOREIGN KEY FK_AFEDDBF3217BBB47');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6EA76ED395');
    }
}
