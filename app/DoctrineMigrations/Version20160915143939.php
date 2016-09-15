<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160915143939 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F542A0B8139');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5436BD17BC');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F544CC0A88C');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C3AD66A6');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54DA78DD93');
        $this->addSql('DROP INDEX IDX_96901F5436BD17BC ON number');
        $this->addSql('DROP INDEX IDX_96901F54C3AD66A6 ON number');
        $this->addSql('DROP INDEX IDX_96901F54DA78DD93 ON number');
        $this->addSql('DROP INDEX IDX_96901F544CC0A88C ON number');
        $this->addSql('DROP INDEX IDX_96901F542A0B8139 ON number');
        $this->addSql('ALTER TABLE number ADD integration_thesaurus_id INT DEFAULT NULL, ADD integoptions_id INT DEFAULT NULL, ADD musensemble_id INT DEFAULT NULL, ADD mood_thesaurus_id INT DEFAULT NULL, ADD source_thesaurus_id INT DEFAULT NULL, DROP $source_thesaurus_id, DROP $integoptions_id, DROP $mood_thesaurus_id, DROP $musensemble_id, DROP $integration_thesaurus_id');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54DBE51D1B FOREIGN KEY (integration_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54CEDB68F4 FOREIGN KEY (integoptions_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C77C477B FOREIGN KEY (musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B4DAF94A FOREIGN KEY (mood_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54ABC76889 FOREIGN KEY (source_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54DBE51D1B ON number (integration_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54CEDB68F4 ON number (integoptions_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C77C477B ON number (musensemble_id)');
        $this->addSql('CREATE INDEX IDX_96901F54B4DAF94A ON number (mood_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54ABC76889 ON number (source_thesaurus_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54DBE51D1B');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54CEDB68F4');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C77C477B');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B4DAF94A');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54ABC76889');
        $this->addSql('DROP INDEX IDX_96901F54DBE51D1B ON number');
        $this->addSql('DROP INDEX IDX_96901F54CEDB68F4 ON number');
        $this->addSql('DROP INDEX IDX_96901F54C77C477B ON number');
        $this->addSql('DROP INDEX IDX_96901F54B4DAF94A ON number');
        $this->addSql('DROP INDEX IDX_96901F54ABC76889 ON number');
        $this->addSql('ALTER TABLE number ADD $source_thesaurus_id INT DEFAULT NULL, ADD $integoptions_id INT DEFAULT NULL, ADD $mood_thesaurus_id INT DEFAULT NULL, ADD $musensemble_id INT DEFAULT NULL, ADD $integration_thesaurus_id INT DEFAULT NULL, DROP integration_thesaurus_id, DROP integoptions_id, DROP musensemble_id, DROP mood_thesaurus_id, DROP source_thesaurus_id');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F542A0B8139 FOREIGN KEY ($source_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5436BD17BC FOREIGN KEY ($integoptions_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F544CC0A88C FOREIGN KEY ($mood_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C3AD66A6 FOREIGN KEY ($musensemble_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54DA78DD93 FOREIGN KEY ($integration_thesaurus_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F5436BD17BC ON number ($integoptions_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C3AD66A6 ON number ($musensemble_id)');
        $this->addSql('CREATE INDEX IDX_96901F54DA78DD93 ON number ($integration_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F544CC0A88C ON number ($mood_thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F542A0B8139 ON number ($source_thesaurus_id)');
    }
}
