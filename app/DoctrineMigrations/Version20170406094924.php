<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170406094924 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stagenumber ADD cast_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9BA3443A27B5E40F FOREIGN KEY (cast_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_9BA3443A27B5E40F ON stagenumber (cast_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stageNumber DROP FOREIGN KEY FK_9BA3443A27B5E40F');
        $this->addSql('DROP INDEX IDX_9BA3443A27B5E40F ON stageNumber');
        $this->addSql('ALTER TABLE stageNumber DROP cast_id');
    }
}
