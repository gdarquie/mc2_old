<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160901195016 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number ADD begin_thesaurus INT DEFAULT NULL, ADD ending_thesaurus INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F547728D617 FOREIGN KEY (begin_thesaurus) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5422915D1C FOREIGN KEY (ending_thesaurus) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F547728D617 ON number (begin_thesaurus)');
        $this->addSql('CREATE INDEX IDX_96901F5422915D1C ON number (ending_thesaurus)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F547728D617');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5422915D1C');
        $this->addSql('DROP INDEX IDX_96901F547728D617 ON number');
        $this->addSql('DROP INDEX IDX_96901F5422915D1C ON number');
        $this->addSql('ALTER TABLE number DROP begin_thesaurus, DROP ending_thesaurus');
    }
}
