<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170406114613 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_stagenumber (number_id INT NOT NULL, stagenumber_id INT NOT NULL, INDEX IDX_D5FF714830A1DE10 (number_id), INDEX IDX_D5FF714816865F1D (stagenumber_id), PRIMARY KEY(number_id, stagenumber_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('DROP TABLE stageNumber_has_number');
        $this->addSql('ALTER TABLE stageNumber_has_costumes DROP FOREIGN KEY FK_381A8CBC9477DDBE');
        $this->addSql('DROP INDEX idx_381a8cbc9477ddbe ON stageNumber_has_costumes');
        $this->addSql('CREATE INDEX IDX_381A8CBC16865F1D ON stageNumber_has_costumes (stagenumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costumes ADD CONSTRAINT FK_381A8CBC9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F19477DDBE');
        $this->addSql('DROP INDEX idx_36ac99f19477ddbe ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F116865F1D ON link (stagenumber_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F19477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE song_has_stageNumber DROP FOREIGN KEY FK_8EB31DA39477DDBE');
        $this->addSql('DROP INDEX idx_8eb31da39477ddbe ON song_has_stageNumber');
        $this->addSql('CREATE INDEX IDX_8EB31DA316865F1D ON song_has_stageNumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stageNumber ADD CONSTRAINT FK_8EB31DA39477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9BA3443A27B5E40F');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9BA3443A7AC68360');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9BA3443AC54C8C93');
        $this->addSql('DROP INDEX idx_9ba3443ac54c8c93 ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9C0F410CC54C8C93 ON stagenumber (type_id)');
        $this->addSql('DROP INDEX idx_9ba3443a7ac68360 ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9C0F410C7AC68360 ON stagenumber (stageShow_id)');
        $this->addSql('DROP INDEX idx_9ba3443a27b5e40f ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9C0F410C27B5E40F ON stagenumber (cast_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9BA3443A27B5E40F FOREIGN KEY (cast_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9BA3443A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9BA3443AC54C8C93 FOREIGN KEY (type_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costume DROP FOREIGN KEY FK_9062B0C79477DDBE');
        $this->addSql('ALTER TABLE stageNumber_has_costume DROP FOREIGN KEY FK_9062B0C7CFCDCFA6');
        $this->addSql('DROP INDEX idx_9062b0c79477ddbe ON stageNumber_has_costume');
        $this->addSql('CREATE INDEX IDX_CD2408F716865F1D ON stageNumber_has_costume (stagenumber_id)');
        $this->addSql('DROP INDEX idx_9062b0c7cfcdcfa6 ON stageNumber_has_costume');
        $this->addSql('CREATE INDEX IDX_CD2408F7CFCDCFA6 ON stageNumber_has_costume (costume_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costume ADD CONSTRAINT FK_9062B0C79477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costume ADD CONSTRAINT FK_9062B0C7CFCDCFA6 FOREIGN KEY (costume_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musical DROP FOREIGN KEY FK_DA14D4F839489F9');
        $this->addSql('ALTER TABLE stageNumber_has_musical DROP FOREIGN KEY FK_DA14D4F9477DDBE');
        $this->addSql('DROP INDEX idx_da14d4f9477ddbe ON stageNumber_has_musical');
        $this->addSql('CREATE INDEX IDX_50E7F57F16865F1D ON stageNumber_has_musical (stagenumber_id)');
        $this->addSql('DROP INDEX idx_da14d4f839489f9 ON stageNumber_has_musical');
        $this->addSql('CREATE INDEX IDX_50E7F57F839489F9 ON stageNumber_has_musical (musical_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musical ADD CONSTRAINT FK_DA14D4F839489F9 FOREIGN KEY (musical_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musical ADD CONSTRAINT FK_DA14D4F9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle DROP FOREIGN KEY FK_24C32FF49477DDBE');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle DROP FOREIGN KEY FK_24C32FF4A6C0EA20');
        $this->addSql('DROP INDEX idx_24c32ff49477ddbe ON stageNumber_has_dancingstyle');
        $this->addSql('CREATE INDEX IDX_2626236C16865F1D ON stageNumber_has_dancingstyle (stagenumber_id)');
        $this->addSql('DROP INDEX idx_24c32ff4a6c0ea20 ON stageNumber_has_dancingstyle');
        $this->addSql('CREATE INDEX IDX_2626236CA6C0EA20 ON stageNumber_has_dancingstyle (dancingstyle_id)');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle ADD CONSTRAINT FK_24C32FF49477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle ADD CONSTRAINT FK_24C32FF4A6C0EA20 FOREIGN KEY (dancingstyle_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_genre DROP FOREIGN KEY FK_E700084296D31F');
        $this->addSql('ALTER TABLE stageNumber_has_genre DROP FOREIGN KEY FK_E700089477DDBE');
        $this->addSql('DROP INDEX idx_e700089477ddbe ON stageNumber_has_genre');
        $this->addSql('CREATE INDEX IDX_17D87B7516865F1D ON stageNumber_has_genre (stagenumber_id)');
        $this->addSql('DROP INDEX idx_e700084296d31f ON stageNumber_has_genre');
        $this->addSql('CREATE INDEX IDX_17D87B754296D31F ON stageNumber_has_genre (genre_id)');
        $this->addSql('ALTER TABLE stageNumber_has_genre ADD CONSTRAINT FK_E700084296D31F FOREIGN KEY (genre_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_genre ADD CONSTRAINT FK_E700089477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancemble DROP FOREIGN KEY FK_ECF1A03E9477DDBE');
        $this->addSql('DROP INDEX idx_ecf1a03e9477ddbe ON stagenumber_has_dancemble');
        $this->addSql('CREATE INDEX IDX_ECF1A03E16865F1D ON stagenumber_has_dancemble (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancemble ADD CONSTRAINT FK_ECF1A03E9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble DROP FOREIGN KEY FK_50254C739477DDBE');
        $this->addSql('DROP INDEX idx_d8badeb09477ddbe ON stageNumber_has_musensemble');
        $this->addSql('CREATE INDEX IDX_D8BADEB016865F1D ON stageNumber_has_musensemble (stagenumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble ADD CONSTRAINT FK_50254C739477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer DROP FOREIGN KEY FK_F2D022999477DDBE');
        $this->addSql('DROP INDEX idx_f2d022999477ddbe ON stagenumber_has_choreographer');
        $this->addSql('CREATE INDEX IDX_F2D0229916865F1D ON stagenumber_has_choreographer (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer ADD CONSTRAINT FK_F2D022999477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stageNumber_has_number (number_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_50D688130A1DE10 (number_id), INDEX IDX_50D68819477DDBE (stageNumber_id), PRIMARY KEY(number_id, stageNumber_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stageNumber_has_number ADD CONSTRAINT FK_50D688130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE stageNumber_has_number ADD CONSTRAINT FK_50D68819477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('DROP TABLE number_has_stagenumber');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F116865F1D');
        $this->addSql('DROP INDEX idx_36ac99f116865f1d ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F19477DDBE ON link (stageNumber_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F116865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE song_has_stagenumber DROP FOREIGN KEY FK_8EB31DA316865F1D');
        $this->addSql('DROP INDEX idx_8eb31da316865f1d ON song_has_stagenumber');
        $this->addSql('CREATE INDEX IDX_8EB31DA39477DDBE ON song_has_stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE song_has_stagenumber ADD CONSTRAINT FK_8EB31DA316865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_costume DROP FOREIGN KEY FK_CD2408F716865F1D');
        $this->addSql('ALTER TABLE stagenumber_has_costume DROP FOREIGN KEY FK_CD2408F7CFCDCFA6');
        $this->addSql('DROP INDEX idx_cd2408f716865f1d ON stagenumber_has_costume');
        $this->addSql('CREATE INDEX IDX_9062B0C79477DDBE ON stagenumber_has_costume (stageNumber_id)');
        $this->addSql('DROP INDEX idx_cd2408f7cfcdcfa6 ON stagenumber_has_costume');
        $this->addSql('CREATE INDEX IDX_9062B0C7CFCDCFA6 ON stagenumber_has_costume (costume_id)');
        $this->addSql('ALTER TABLE stagenumber_has_costume ADD CONSTRAINT FK_CD2408F716865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_costume ADD CONSTRAINT FK_CD2408F7CFCDCFA6 FOREIGN KEY (costume_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_costumes DROP FOREIGN KEY FK_381A8CBC16865F1D');
        $this->addSql('DROP INDEX idx_381a8cbc16865f1d ON stagenumber_has_costumes');
        $this->addSql('CREATE INDEX IDX_381A8CBC9477DDBE ON stagenumber_has_costumes (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_costumes ADD CONSTRAINT FK_381A8CBC16865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancingstyle DROP FOREIGN KEY FK_2626236C16865F1D');
        $this->addSql('ALTER TABLE stagenumber_has_dancingstyle DROP FOREIGN KEY FK_2626236CA6C0EA20');
        $this->addSql('DROP INDEX idx_2626236c16865f1d ON stagenumber_has_dancingstyle');
        $this->addSql('CREATE INDEX IDX_24C32FF49477DDBE ON stagenumber_has_dancingstyle (stageNumber_id)');
        $this->addSql('DROP INDEX idx_2626236ca6c0ea20 ON stagenumber_has_dancingstyle');
        $this->addSql('CREATE INDEX IDX_24C32FF4A6C0EA20 ON stagenumber_has_dancingstyle (dancingstyle_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancingstyle ADD CONSTRAINT FK_2626236C16865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancingstyle ADD CONSTRAINT FK_2626236CA6C0EA20 FOREIGN KEY (dancingstyle_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_genre DROP FOREIGN KEY FK_17D87B7516865F1D');
        $this->addSql('ALTER TABLE stagenumber_has_genre DROP FOREIGN KEY FK_17D87B754296D31F');
        $this->addSql('DROP INDEX idx_17d87b7516865f1d ON stagenumber_has_genre');
        $this->addSql('CREATE INDEX IDX_E700089477DDBE ON stagenumber_has_genre (stageNumber_id)');
        $this->addSql('DROP INDEX idx_17d87b754296d31f ON stagenumber_has_genre');
        $this->addSql('CREATE INDEX IDX_E700084296D31F ON stagenumber_has_genre (genre_id)');
        $this->addSql('ALTER TABLE stagenumber_has_genre ADD CONSTRAINT FK_17D87B7516865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_genre ADD CONSTRAINT FK_17D87B754296D31F FOREIGN KEY (genre_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musensemble DROP FOREIGN KEY FK_D8BADEB016865F1D');
        $this->addSql('DROP INDEX idx_d8badeb016865f1d ON stagenumber_has_musensemble');
        $this->addSql('CREATE INDEX IDX_D8BADEB09477DDBE ON stagenumber_has_musensemble (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musensemble ADD CONSTRAINT FK_D8BADEB016865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musical DROP FOREIGN KEY FK_50E7F57F16865F1D');
        $this->addSql('ALTER TABLE stagenumber_has_musical DROP FOREIGN KEY FK_50E7F57F839489F9');
        $this->addSql('DROP INDEX idx_50e7f57f16865f1d ON stagenumber_has_musical');
        $this->addSql('CREATE INDEX IDX_DA14D4F9477DDBE ON stagenumber_has_musical (stageNumber_id)');
        $this->addSql('DROP INDEX idx_50e7f57f839489f9 ON stagenumber_has_musical');
        $this->addSql('CREATE INDEX IDX_DA14D4F839489F9 ON stagenumber_has_musical (musical_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musical ADD CONSTRAINT FK_50E7F57F16865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musical ADD CONSTRAINT FK_50E7F57F839489F9 FOREIGN KEY (musical_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410CC54C8C93');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410C7AC68360');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410C27B5E40F');
        $this->addSql('DROP INDEX idx_9c0f410c7ac68360 ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9BA3443A7AC68360 ON stagenumber (stageShow_id)');
        $this->addSql('DROP INDEX idx_9c0f410cc54c8c93 ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9BA3443AC54C8C93 ON stagenumber (type_id)');
        $this->addSql('DROP INDEX idx_9c0f410c27b5e40f ON stagenumber');
        $this->addSql('CREATE INDEX IDX_9BA3443A27B5E40F ON stagenumber (cast_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410CC54C8C93 FOREIGN KEY (type_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410C7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410C27B5E40F FOREIGN KEY (cast_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer DROP FOREIGN KEY FK_F2D0229916865F1D');
        $this->addSql('DROP INDEX idx_f2d0229916865f1d ON stagenumber_has_choreographer');
        $this->addSql('CREATE INDEX IDX_F2D022999477DDBE ON stagenumber_has_choreographer (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer ADD CONSTRAINT FK_F2D0229916865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancemble DROP FOREIGN KEY FK_ECF1A03E16865F1D');
        $this->addSql('DROP INDEX idx_ecf1a03e16865f1d ON stagenumber_has_dancemble');
        $this->addSql('CREATE INDEX IDX_ECF1A03E9477DDBE ON stagenumber_has_dancemble (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancemble ADD CONSTRAINT FK_ECF1A03E16865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
    }
}
