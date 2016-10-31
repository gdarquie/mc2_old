<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161031145143 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE person_has_editor (person_id INT NOT NULL, editors INT NOT NULL, INDEX IDX_D6688534217BBB47 (person_id), INDEX IDX_D668853430766468 (editors), PRIMARY KEY(person_id, editors)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person_has_editor ADD CONSTRAINT FK_D6688534217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE person_has_editor ADD CONSTRAINT FK_D668853430766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE person ADD date_creation DATETIME NOT NULL, ADD last_update DATETIME NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE person_has_editor');
        $this->addSql('ALTER TABLE person DROP date_creation, DROP last_update');
    }
}
