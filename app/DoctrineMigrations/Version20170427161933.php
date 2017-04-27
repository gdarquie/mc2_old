<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170427161933 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cart (cartId INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, type INT NOT NULL, PRIMARY KEY(cartId)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_stagenumber DROP FOREIGN KEY FK_D5FF714816865F1D');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stagenumber_id)');
        $this->addSql('ALTER TABLE stagenumber ADD CONSTRAINT FK_9C0F410C7AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cart');
        $this->addSql('ALTER TABLE number_has_stagenumber DROP FOREIGN KEY FK_D5FF714816865F1D');
        $this->addSql('ALTER TABLE number_has_stagenumber ADD CONSTRAINT FK_D5FF714816865F1D FOREIGN KEY (stagenumber_id) REFERENCES stagenumber (stageNumber_id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stagenumber DROP FOREIGN KEY FK_9C0F410C7AC68360');
    }
}
