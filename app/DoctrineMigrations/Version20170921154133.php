<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170921154133 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stagenumber_has_musicalthesaurus (stagenumber_id INT NOT NULL, musical_thesaurus_id INT NOT NULL, INDEX IDX_7AEAB84816865F1D (stagenumber_id), INDEX IDX_7AEAB848841FF228 (musical_thesaurus_id), PRIMARY KEY(stagenumber_id, musical_thesaurus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagenumber_has_musicalthesaurus ADD CONSTRAINT FK_7AEAB84816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musicalthesaurus ADD CONSTRAINT FK_7AEAB848841FF228 FOREIGN KEY (musical_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE stageNumber_has_musical');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stageNumber_has_musical (musical_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_50E7F57F839489F9 (musical_id), INDEX IDX_50E7F57F9477DDBE (stageNumber_id), PRIMARY KEY(stageNumber_id, musical_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stageNumber_has_musical ADD CONSTRAINT FK_50E7F57F16865F1D FOREIGN KEY (stageNumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musical ADD CONSTRAINT FK_50E7F57F839489F9 FOREIGN KEY (musical_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('DROP TABLE stagenumber_has_musicalthesaurus');
    }
}
