<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161031143446 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE song_has_editor (song_id INT NOT NULL, editors INT NOT NULL, INDEX IDX_5A7B7C31A0BDB2F3 (song_id), INDEX IDX_5A7B7C3130766468 (editors), PRIMARY KEY(song_id, editors)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE song_has_editor ADD CONSTRAINT FK_5A7B7C31A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (song_id)');
        $this->addSql('ALTER TABLE song_has_editor ADD CONSTRAINT FK_5A7B7C3130766468 FOREIGN KEY (editors) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE song ADD date_creation DATETIME NOT NULL, ADD last_update DATETIME NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE song_has_editor');
        $this->addSql('ALTER TABLE song DROP date_creation, DROP last_update');
    }
}
