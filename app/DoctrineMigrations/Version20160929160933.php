<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929160933 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_dancingtype (number_id INT NOT NULL, $dancingtype_id INT NOT NULL, INDEX IDX_9CC2B24630A1DE10 (number_id), INDEX IDX_9CC2B246A0769B1F ($dancingtype_id), PRIMARY KEY(number_id, $dancingtype_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_dancesubgenre (number_id INT NOT NULL, $dancesubgenre_id INT NOT NULL, INDEX IDX_7242E09D30A1DE10 (number_id), INDEX IDX_7242E09DE4FE13D8 ($dancesubgenre_id), PRIMARY KEY(number_id, $dancesubgenre_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_dancecontent (number_id INT NOT NULL, $dancecontent_id INT NOT NULL, INDEX IDX_E14165F330A1DE10 (number_id), INDEX IDX_E14165F31B55AB87 ($dancecontent_id), PRIMARY KEY(number_id, $dancecontent_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_musensemble (number_id INT NOT NULL, musensemble_id INT NOT NULL, INDEX IDX_8910748230A1DE10 (number_id), INDEX IDX_89107482C77C477B (musensemble_id), PRIMARY KEY(number_id, musensemble_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_diegeticplace (number_id INT NOT NULL, diegetic_place_thesaurus_id INT NOT NULL, INDEX IDX_C82EFD6E30A1DE10 (number_id), INDEX IDX_C82EFD6E8410650D (diegetic_place_thesaurus_id), PRIMARY KEY(number_id, diegetic_place_thesaurus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_generalmood (number_id INT NOT NULL, general_mood_id INT NOT NULL, INDEX IDX_A61CCF9530A1DE10 (number_id), INDEX IDX_A61CCF95C9A97E4A (general_mood_id), PRIMARY KEY(number_id, general_mood_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_musicalthesaurus (number_id INT NOT NULL, musical_thesaurus_id INT NOT NULL, INDEX IDX_F4921E6C30A1DE10 (number_id), INDEX IDX_F4921E6C841FF228 (musical_thesaurus_id), PRIMARY KEY(number_id, musical_thesaurus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_dancingtype ADD CONSTRAINT FK_9CC2B24630A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_dancingtype ADD CONSTRAINT FK_9CC2B246A0769B1F FOREIGN KEY ($dancingtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_dancesubgenre ADD CONSTRAINT FK_7242E09D30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_dancesubgenre ADD CONSTRAINT FK_7242E09DE4FE13D8 FOREIGN KEY ($dancesubgenre_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_dancecontent ADD CONSTRAINT FK_E14165F330A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_dancecontent ADD CONSTRAINT FK_E14165F31B55AB87 FOREIGN KEY ($dancecontent_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_musensemble ADD CONSTRAINT FK_8910748230A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_musensemble ADD CONSTRAINT FK_89107482C77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_diegeticplace ADD CONSTRAINT FK_C82EFD6E30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_diegeticplace ADD CONSTRAINT FK_C82EFD6E8410650D FOREIGN KEY (diegetic_place_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_generalmood ADD CONSTRAINT FK_A61CCF9530A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_generalmood ADD CONSTRAINT FK_A61CCF95C9A97E4A FOREIGN KEY (general_mood_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_musicalthesaurus ADD CONSTRAINT FK_F4921E6C30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_musicalthesaurus ADD CONSTRAINT FK_F4921E6C841FF228 FOREIGN KEY (musical_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F541B55AB87');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F548410650D');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54841FF228');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54A0769B1F');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C77C477B');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C9A97E4A');
        $this->addSql('DROP INDEX IDX_96901F54C77C477B ON number');
        $this->addSql('DROP INDEX IDX_96901F54A0769B1F ON number');
        $this->addSql('DROP INDEX IDX_96901F541B55AB87 ON number');
        $this->addSql('DROP INDEX IDX_96901F548410650D ON number');
        $this->addSql('DROP INDEX IDX_96901F54C9A97E4A ON number');
        $this->addSql('DROP INDEX IDX_96901F54841FF228 ON number');
        $this->addSql('ALTER TABLE number DROP $dancecontent_id, DROP diegetic_place_thesaurus_id, DROP musical_thesaurus_id, DROP $dancingtype_id, DROP musensemble_id, DROP general_mood_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_dancingtype');
        $this->addSql('DROP TABLE number_has_dancesubgenre');
        $this->addSql('DROP TABLE number_has_dancecontent');
        $this->addSql('DROP TABLE number_has_musensemble');
        $this->addSql('DROP TABLE number_has_diegeticplace');
        $this->addSql('DROP TABLE number_has_generalmood');
        $this->addSql('DROP TABLE number_has_musicalthesaurus');
        $this->addSql('ALTER TABLE number ADD $dancecontent_id INT DEFAULT NULL, ADD diegetic_place_thesaurus_id INT DEFAULT NULL, ADD musical_thesaurus_id INT DEFAULT NULL, ADD $dancingtype_id INT DEFAULT NULL, ADD musensemble_id INT DEFAULT NULL, ADD general_mood_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F541B55AB87 FOREIGN KEY ($dancecontent_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F548410650D FOREIGN KEY (diegetic_place_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54841FF228 FOREIGN KEY (musical_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54A0769B1F FOREIGN KEY ($dancingtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C9A97E4A FOREIGN KEY (general_mood_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C77C477B ON number (musensemble_id)');
        $this->addSql('CREATE INDEX IDX_96901F54A0769B1F ON number ($dancingtype_id)');
        $this->addSql('CREATE INDEX IDX_96901F541B55AB87 ON number ($dancecontent_id)');
        $this->addSql('CREATE INDEX IDX_96901F548410650D ON number (diegetic_place_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C9A97E4A ON number (general_mood_id)');
        $this->addSql('CREATE INDEX IDX_96901F54841FF228 ON number (musical_thesaurus_id)');
    }
}
