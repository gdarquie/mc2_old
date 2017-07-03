<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170622144116 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE selection (selection_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, type INT NOT NULL, PRIMARY KEY(selection_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE selection_has_number (selection_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_A27D9FD4E48EFE78 (selection_id), INDEX IDX_A27D9FD430A1DE10 (number_id), PRIMARY KEY(selection_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE selection_has_number ADD CONSTRAINT FK_A27D9FD4E48EFE78 FOREIGN KEY (selection_id) REFERENCES selection (selection_id)');
        $this->addSql('ALTER TABLE selection_has_number ADD CONSTRAINT FK_A27D9FD430A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('DROP TABLE stagenumber_has_choreographer');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE selection_has_number DROP FOREIGN KEY FK_A27D9FD4E48EFE78');
        $this->addSql('CREATE TABLE stagenumber_has_choreographer (person_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_F2D0229916865F1D (stageNumber_id), INDEX IDX_F2D02299217BBB47 (person_id), PRIMARY KEY(stageNumber_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer ADD CONSTRAINT FK_F2D0229916865F1D FOREIGN KEY (stageNumber_id) REFERENCES stagenumber (stageNumber_id)');
        $this->addSql('ALTER TABLE stagenumber_has_choreographer ADD CONSTRAINT FK_F2D02299217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('DROP TABLE selection');
        $this->addSql('DROP TABLE selection_has_number');
    }
}
