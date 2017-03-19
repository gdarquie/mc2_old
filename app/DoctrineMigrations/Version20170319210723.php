<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170319210723 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stagenumber_has_choreographer (person_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_F2D022999477DDBE (stageNumber_id), INDEX IDX_F2D02299217BBB47 (person_id), PRIMARY KEY(stageNumber_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer ADD CONSTRAINT FK_F2D022999477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer ADD CONSTRAINT FK_F2D02299217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stagenumber_has_choreographer');
    }
}
