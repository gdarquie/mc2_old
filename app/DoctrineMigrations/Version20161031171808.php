<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161031171808 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE integration_has_number DROP FOREIGN KEY fk_integration_has_number_integration1');
        $this->addSql('DROP TABLE integration');
        $this->addSql('DROP TABLE integration_has_number');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE integration (integration_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(integration_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE integration_has_number (integration_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_F52D374C9E82DDEA (integration_id), INDEX IDX_F52D374C30A1DE10 (number_id), PRIMARY KEY(integration_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE integration_has_number ADD CONSTRAINT fk_integration_has_number_integration1 FOREIGN KEY (integration_id) REFERENCES integration (integration_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE integration_has_number ADD CONSTRAINT fk_integration_has_number_number1 FOREIGN KEY (number_id) REFERENCES number (number_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
