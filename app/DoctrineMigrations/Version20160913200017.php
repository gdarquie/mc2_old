<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160913200017 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5496A3DD98');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54F068F42D');
        $this->addSql('DROP INDEX IDX_96901F54F068F42D ON number');
        $this->addSql('DROP INDEX IDX_96901F5496A3DD98 ON number');
        $this->addSql('ALTER TABLE number ADD $mood_thesaurus_id INT DEFAULT NULL, ADD $source_thesaurus_id INT DEFAULT NULL, DROP $source_theasurus_id, DROP $mood_theasurus_id');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F544CC0A88C FOREIGN KEY ($mood_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F542A0B8139 FOREIGN KEY ($source_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F544CC0A88C ON number ($mood_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F542A0B8139 ON number ($source_thesaurus_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F544CC0A88C');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F542A0B8139');
        $this->addSql('DROP INDEX IDX_96901F544CC0A88C ON number');
        $this->addSql('DROP INDEX IDX_96901F542A0B8139 ON number');
        $this->addSql('ALTER TABLE number ADD $source_theasurus_id INT DEFAULT NULL, ADD $mood_theasurus_id INT DEFAULT NULL, DROP $mood_thesaurus_id, DROP $source_thesaurus_id');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5496A3DD98 FOREIGN KEY ($source_theasurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54F068F42D FOREIGN KEY ($mood_theasurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54F068F42D ON number ($mood_theasurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F5496A3DD98 ON number ($source_theasurus_id)');
    }
}
