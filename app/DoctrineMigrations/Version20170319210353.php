<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170319210353 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stageNumber_has_musensemble DROP FOREIGN KEY FK_50254C739477DDBE');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble DROP FOREIGN KEY FK_50254C73C77C477B');
        $this->addSql('DROP INDEX idx_50254c739477ddbe ON stageNumber_has_musensemble');
        $this->addSql('CREATE INDEX IDX_D8BADEB09477DDBE ON stageNumber_has_musensemble (stageNumber_id)');
        $this->addSql('DROP INDEX idx_50254c73c77c477b ON stageNumber_has_musensemble');
        $this->addSql('CREATE INDEX IDX_D8BADEB0C77C477B ON stageNumber_has_musensemble (musensemble_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble ADD CONSTRAINT FK_50254C739477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stageNumber_has_musensemble ADD CONSTRAINT FK_50254C73C77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stagenumber_has_musensemble DROP FOREIGN KEY FK_D8BADEB09477DDBE');
        $this->addSql('ALTER TABLE stagenumber_has_musensemble DROP FOREIGN KEY FK_D8BADEB0C77C477B');
        $this->addSql('DROP INDEX idx_d8badeb09477ddbe ON stagenumber_has_musensemble');
        $this->addSql('CREATE INDEX IDX_50254C739477DDBE ON stagenumber_has_musensemble (stageNumber_id)');
        $this->addSql('DROP INDEX idx_d8badeb0c77c477b ON stagenumber_has_musensemble');
        $this->addSql('CREATE INDEX IDX_50254C73C77C477B ON stagenumber_has_musensemble (musensemble_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musensemble ADD CONSTRAINT FK_D8BADEB09477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_musensemble ADD CONSTRAINT FK_D8BADEB0C77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
    }
}
