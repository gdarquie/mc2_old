<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170225183428 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE distributor (distributor_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, date_creation DATETIME NOT NULL, last_update DATETIME NOT NULL, PRIMARY KEY(distributor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_has_distributor (film_id INT NOT NULL, distributor_id INT NOT NULL, INDEX IDX_D011CF2D567F5183 (film_id), INDEX IDX_D011CF2D2D863A58 (distributor_id), PRIMARY KEY(film_id, distributor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_has_stageshow (film_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_9E77580A567F5183 (film_id), INDEX IDX_9E77580A7AC68360 (stageShow_id), PRIMARY KEY(film_id, stageShow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song_has_songtype (song_id INT NOT NULL, songtype_id INT NOT NULL, INDEX IDX_C50B10C3A0BDB2F3 (song_id), INDEX IDX_C50B10C33A047A9A (songtype_id), PRIMARY KEY(song_id, songtype_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song_has_lyricist (song_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_3FCF5956A0BDB2F3 (song_id), INDEX IDX_3FCF5956217BBB47 (person_id), PRIMARY KEY(song_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song_has_composer (song_id INT NOT NULL, composer_id INT NOT NULL, INDEX IDX_D30D2E4FA0BDB2F3 (song_id), INDEX IDX_D30D2E4F7A8D2620 (composer_id), PRIMARY KEY(song_id, composer_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageNumber_has_costume (costume_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_9062B0C79477DDBE (stageNumber_id), INDEX IDX_9062B0C7CFCDCFA6 (costume_id), PRIMARY KEY(stageNumber_id, costume_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageNumber_has_musical (musical_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_DA14D4F9477DDBE (stageNumber_id), INDEX IDX_DA14D4F839489F9 (musical_id), PRIMARY KEY(stageNumber_id, musical_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageNumber_has_dancingstyle (dancingstyle_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_24C32FF49477DDBE (stageNumber_id), INDEX IDX_24C32FF4A6C0EA20 (dancingstyle_id), PRIMARY KEY(stageNumber_id, dancingstyle_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageNumber_has_musensemble (musensemble_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_50254C739477DDBE (stageNumber_id), INDEX IDX_50254C73C77C477B (musensemble_id), PRIMARY KEY(stageNumber_id, musensemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageNumber_has_genre (genre_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_E700089477DDBE (stageNumber_id), INDEX IDX_E700084296D31F (genre_id), PRIMARY KEY(stageNumber_id, genre_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageshow_has_composer (person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_10F12A037AC68360 (stageShow_id), INDEX IDX_10F12A03217BBB47 (person_id), PRIMARY KEY(stageShow_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageshow_has_book (person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_B58807737AC68360 (stageShow_id), INDEX IDX_B5880773217BBB47 (person_id), PRIMARY KEY(stageShow_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageshow_has_lyricist (person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_FC335D1A7AC68360 (stageShow_id), INDEX IDX_FC335D1A217BBB47 (person_id), PRIMARY KEY(stageShow_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageshow_has_choreographer (person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_9E451D8A7AC68360 (stageShow_id), INDEX IDX_9E451D8A217BBB47 (person_id), PRIMARY KEY(stageShow_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageshow_has_director (person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_9612FF2B7AC68360 (stageShow_id), INDEX IDX_9612FF2B217BBB47 (person_id), PRIMARY KEY(stageShow_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stageshow_has_design (person_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_DEBB6E2B7AC68360 (stageShow_id), INDEX IDX_DEBB6E2B217BBB47 (person_id), PRIMARY KEY(stageShow_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film_has_distributor ADD CONSTRAINT FK_D011CF2D567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_has_distributor ADD CONSTRAINT FK_D011CF2D2D863A58 FOREIGN KEY (distributor_id) REFERENCES distributor (distributor_id)');
        $this->addSql('ALTER TABLE film_has_stageshow ADD CONSTRAINT FK_9E77580A567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_has_stageshow ADD CONSTRAINT FK_9E77580A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE song_has_songtype ADD CONSTRAINT FK_C50B10C3A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_songtype ADD CONSTRAINT FK_C50B10C33A047A9A FOREIGN KEY (songtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE song_has_lyricist ADD CONSTRAINT FK_3FCF5956A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_lyricist ADD CONSTRAINT FK_3FCF5956217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE song_has_composer ADD CONSTRAINT FK_D30D2E4FA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_composer ADD CONSTRAINT FK_D30D2E4F7A8D2620 FOREIGN KEY (composer_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costume ADD CONSTRAINT FK_9062B0C79477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_costume ADD CONSTRAINT FK_9062B0C7CFCDCFA6 FOREIGN KEY (costume_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musical ADD CONSTRAINT FK_DA14D4F9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musical ADD CONSTRAINT FK_DA14D4F839489F9 FOREIGN KEY (musical_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle ADD CONSTRAINT FK_24C32FF49477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle ADD CONSTRAINT FK_24C32FF4A6C0EA20 FOREIGN KEY (dancingstyle_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble ADD CONSTRAINT FK_50254C739477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble ADD CONSTRAINT FK_50254C73C77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageNumber_has_genre ADD CONSTRAINT FK_E700089477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_genre ADD CONSTRAINT FK_E700084296D31F FOREIGN KEY (genre_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stageshow_has_composer ADD CONSTRAINT FK_10F12A037AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_composer ADD CONSTRAINT FK_10F12A03217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageshow_has_book ADD CONSTRAINT FK_B58807737AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_book ADD CONSTRAINT FK_B5880773217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageshow_has_lyricist ADD CONSTRAINT FK_FC335D1A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_lyricist ADD CONSTRAINT FK_FC335D1A217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageshow_has_choreographer ADD CONSTRAINT FK_9E451D8A7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_choreographer ADD CONSTRAINT FK_9E451D8A217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageshow_has_director ADD CONSTRAINT FK_9612FF2B7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_director ADD CONSTRAINT FK_9612FF2B217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE stageshow_has_design ADD CONSTRAINT FK_DEBB6E2B7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_design ADD CONSTRAINT FK_DEBB6E2B217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('DROP TABLE songType_has_song');
        $this->addSql('DROP TABLE stagenumer_has_musensemble');
        $this->addSql('ALTER TABLE film DROP studio, DROP distributor, DROP adaptation, CHANGE remake remake TINYINT(1) DEFAULT NULL, CHANGE song adapatation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22378DF241 FOREIGN KEY (adapatation) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_8244BE22378DF241 ON film (adapatation)');
        $this->addSql('ALTER TABLE song ADD lyrics MEDIUMTEXT DEFAULT NULL, ADD comment LONGTEXT DEFAULT NULL, CHANGE date date INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stageNumber ADD characters VARCHAR(500) DEFAULT NULL, DROP type, CHANGE group_id type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stageNumber ADD CONSTRAINT FK_9BA3443AC54C8C93 FOREIGN KEY (type_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_9BA3443AC54C8C93 ON stageNumber (type_id)');
        $this->addSql('DROP INDEX fk_stageShow_film1_idx ON stageShow');
        $this->addSql('ALTER TABLE stageShow ADD last_update DATETIME NOT NULL, ADD comment LONGTEXT DEFAULT NULL, DROP film_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE film_has_distributor DROP FOREIGN KEY FK_D011CF2D2D863A58');
        $this->addSql('CREATE TABLE songType_has_song (song_id INT NOT NULL, songType_id INT NOT NULL, INDEX IDX_A30DA208A0BDB2F3 (song_id), INDEX IDX_A30DA208F5B94306 (songType_id), PRIMARY KEY(song_id, songType_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagenumer_has_musensemble (musensemble_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_B67EB77C9477DDBE (stageNumber_id), INDEX IDX_B67EB77CC77C477B (musensemble_id), PRIMARY KEY(stageNumber_id, musensemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE songType_has_song ADD CONSTRAINT FK_A30DA208A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE songType_has_song ADD CONSTRAINT FK_A30DA208F5B94306 FOREIGN KEY (songType_id) REFERENCES songType (songType_id)');
        $this->addSql('ALTER TABLE stagenumer_has_musensemble ADD CONSTRAINT FK_B67EB77C9477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumer_has_musensemble ADD CONSTRAINT FK_B67EB77CC77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE distributor');
        $this->addSql('DROP TABLE film_has_distributor');
        $this->addSql('DROP TABLE film_has_stageshow');
        $this->addSql('DROP TABLE song_has_songtype');
        $this->addSql('DROP TABLE song_has_lyricist');
        $this->addSql('DROP TABLE song_has_composer');
        $this->addSql('DROP TABLE stageNumber_has_costume');
        $this->addSql('DROP TABLE stageNumber_has_musical');
        $this->addSql('DROP TABLE stageNumber_has_dancingstyle');
        $this->addSql('DROP TABLE stageNumber_has_musensemble');
        $this->addSql('DROP TABLE stageNumber_has_genre');
        $this->addSql('DROP TABLE stageshow_has_composer');
        $this->addSql('DROP TABLE stageshow_has_book');
        $this->addSql('DROP TABLE stageshow_has_lyricist');
        $this->addSql('DROP TABLE stageshow_has_choreographer');
        $this->addSql('DROP TABLE stageshow_has_director');
        $this->addSql('DROP TABLE stageshow_has_design');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22378DF241');
        $this->addSql('DROP INDEX IDX_8244BE22378DF241 ON film');
        $this->addSql('ALTER TABLE film ADD studio VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, ADD distributor VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, ADD adaptation VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, CHANGE remake remake VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, CHANGE adapatation song INT DEFAULT NULL');
        $this->addSql('ALTER TABLE song DROP lyrics, DROP comment, CHANGE date date VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE stageNumber DROP FOREIGN KEY FK_9BA3443AC54C8C93');
        $this->addSql('DROP INDEX IDX_9BA3443AC54C8C93 ON stageNumber');
        $this->addSql('ALTER TABLE stageNumber ADD type VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, DROP characters, CHANGE type_id group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stageShow ADD film_id INT DEFAULT NULL, DROP last_update, DROP comment');
        $this->addSql('CREATE INDEX fk_stageShow_film1_idx ON stageShow (film_id)');
    }
}
