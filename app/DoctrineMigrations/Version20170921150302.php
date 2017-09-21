<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170921150302 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stagenumber_has_dancingtype (stagenumber_id INT NOT NULL, dancingtype_id INT NOT NULL, INDEX IDX_CD68187416865F1D (stagenumber_id), INDEX IDX_CD681874A4A7BAC2 (dancingtype_id), PRIMARY KEY(stagenumber_id, dancingtype_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagenumber_has_dancesubgenre (stagenumber_id INT NOT NULL, dancesubgenre_id INT NOT NULL, INDEX IDX_A931AFB016865F1D (stagenumber_id), INDEX IDX_A931AFB09C01BC05 (dancesubgenre_id), PRIMARY KEY(stagenumber_id, dancesubgenre_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagenumber_has_dancecontent (stagenumber_id INT NOT NULL, dancecontent_id INT NOT NULL, INDEX IDX_29C79ED916865F1D (stagenumber_id), INDEX IDX_29C79ED9E333D4CF (dancecontent_id), PRIMARY KEY(stagenumber_id, dancecontent_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagenumber_has_generalmood (stagenumber_id INT NOT NULL, general_mood_id INT NOT NULL, INDEX IDX_F7B665A716865F1D (stagenumber_id), INDEX IDX_F7B665A7C9A97E4A (general_mood_id), PRIMARY KEY(stagenumber_id, general_mood_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagenumber_has_dancingtype ADD CONSTRAINT FK_CD68187416865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancingtype ADD CONSTRAINT FK_CD681874A4A7BAC2 FOREIGN KEY (dancingtype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancesubgenre ADD CONSTRAINT FK_A931AFB016865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancesubgenre ADD CONSTRAINT FK_A931AFB09C01BC05 FOREIGN KEY (dancesubgenre_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancecontent ADD CONSTRAINT FK_29C79ED916865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_dancecontent ADD CONSTRAINT FK_29C79ED9E333D4CF FOREIGN KEY (dancecontent_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE stagenumber_has_generalmood ADD CONSTRAINT FK_F7B665A716865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_generalmood ADD CONSTRAINT FK_F7B665A7C9A97E4A FOREIGN KEY (general_mood_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE stageNumber_has_dancingstyle');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410CC54C8C93');
        $this->addSql('DROP INDEX IDX_9C0F410CC54C8C93 ON stagenumber');
        $this->addSql('ALTER TABLE stagenumber DROP type_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stageNumber_has_dancingstyle (dancingstyle_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_2626236CA6C0EA20 (dancingstyle_id), INDEX IDX_2626236C9477DDBE (stageNumber_id), PRIMARY KEY(stageNumber_id, dancingstyle_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle ADD CONSTRAINT FK_2626236C16865F1D FOREIGN KEY (stageNumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_dancingstyle ADD CONSTRAINT FK_2626236CA6C0EA20 FOREIGN KEY (dancingstyle_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE stagenumber_has_dancingtype');
        $this->addSql('DROP TABLE stagenumber_has_dancesubgenre');
        $this->addSql('DROP TABLE stagenumber_has_dancecontent');
        $this->addSql('DROP TABLE stagenumber_has_generalmood');
        $this->addSql('ALTER TABLE stagenumber ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410CC54C8C93 FOREIGN KEY (type_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_9C0F410CC54C8C93 ON stagenumber (type_id)');
    }
}
