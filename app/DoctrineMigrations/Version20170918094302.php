<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170918094302 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE validation');
        $this->addSql('DROP INDEX IDX_96901F54A2274850 ON number');
        $this->addSql('ALTER TABLE number CHANGE validation_id validation_tc INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE validation (validation_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_creation DATETIME NOT NULL, last_update DATETIME NOT NULL, INDEX IDX_16AC5B6EA76ED395 (user_id), PRIMARY KEY(validation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6EA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE number CHANGE validation_tc validation_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_96901F54A2274850 ON number (validation_id)');
    }
}
