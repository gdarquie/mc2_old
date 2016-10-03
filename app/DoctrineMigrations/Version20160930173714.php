<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160930173714 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number_has_editor DROP FOREIGN KEY FK_BE209DD26995AC4C');
        $this->addSql('DROP INDEX IDX_BE209DD26995AC4C ON number_has_editor');
        $this->addSql('ALTER TABLE number_has_editor DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE number_has_editor CHANGE editor_id editors INT NOT NULL');
        $this->addSql('ALTER TABLE number_has_editor ADD CONSTRAINT FK_BE209DD230766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_BE209DD230766468 ON number_has_editor (editors)');
        $this->addSql('ALTER TABLE number_has_editor ADD PRIMARY KEY (number_id, editors)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number_has_editor DROP FOREIGN KEY FK_BE209DD230766468');
        $this->addSql('DROP INDEX IDX_BE209DD230766468 ON number_has_editor');
        $this->addSql('ALTER TABLE number_has_editor DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE number_has_editor CHANGE editors editor_id INT NOT NULL');
        $this->addSql('ALTER TABLE number_has_editor ADD CONSTRAINT FK_BE209DD26995AC4C FOREIGN KEY (editor_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_BE209DD26995AC4C ON number_has_editor (editor_id)');
        $this->addSql('ALTER TABLE number_has_editor ADD PRIMARY KEY (number_id, editor_id)');
    }
}
