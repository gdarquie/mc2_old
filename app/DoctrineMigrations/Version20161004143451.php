<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161004143451 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_quotationthesaurus (number_id INT NOT NULL, quotation_id INT NOT NULL, INDEX IDX_EC3BD90F30A1DE10 (number_id), INDEX IDX_EC3BD90FB4EA4E60 (quotation_id), PRIMARY KEY(number_id, quotation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_quotationthesaurus ADD CONSTRAINT FK_EC3BD90F30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_quotationthesaurus ADD CONSTRAINT FK_EC3BD90FB4EA4E60 FOREIGN KEY (quotation_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B9664D28');
        $this->addSql('DROP INDEX IDX_96901F54B9664D28 ON number');
        $this->addSql('ALTER TABLE number DROP quotation_thesaurus');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_quotationthesaurus');
        $this->addSql('ALTER TABLE number ADD quotation_thesaurus INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B9664D28 FOREIGN KEY (quotation_thesaurus) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54B9664D28 ON number (quotation_thesaurus)');
    }
}
