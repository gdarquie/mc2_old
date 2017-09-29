<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170926223907 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F542A2810AD');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54AF05A794');
        $this->addSql('DROP INDEX fk_96901f54af05a794 ON number');
        $this->addSql('CREATE INDEX IDX_96901F54AF05A794 ON number (validation_shots)');
        $this->addSql('DROP INDEX fk_96901f542a2810ad ON number');
        $this->addSql('CREATE INDEX IDX_96901F542A2810AD ON number (validation_performance)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F542A2810AD FOREIGN KEY (validation_performance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54AF05A794 FOREIGN KEY (validation_shots) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE validation ADD title VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54AF05A794');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F542A2810AD');
        $this->addSql('DROP INDEX idx_96901f54af05a794 ON number');
        $this->addSql('CREATE INDEX FK_96901F54AF05A794 ON number (validation_shots)');
        $this->addSql('DROP INDEX idx_96901f542a2810ad ON number');
        $this->addSql('CREATE INDEX FK_96901F542A2810AD ON number (validation_performance)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54AF05A794 FOREIGN KEY (validation_shots) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F542A2810AD FOREIGN KEY (validation_performance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE validation DROP title');
    }
}
