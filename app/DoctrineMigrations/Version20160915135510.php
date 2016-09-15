<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160915135510 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_completeness (number_id INT NOT NULL, completeness_id INT NOT NULL, INDEX IDX_8527C1D130A1DE10 (number_id), INDEX IDX_8527C1D1B640FBA5 (completeness_id), PRIMARY KEY(number_id, completeness_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_completeness ADD CONSTRAINT FK_8527C1D130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_completeness ADD CONSTRAINT FK_8527C1D1B640FBA5 FOREIGN KEY (completeness_id) REFERENCES completeness (completeness_id)');
        $this->addSql('DROP TABLE completeness_has_number');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE completeness_has_number (completeness_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_46C30D1B640FBA5 (completeness_id), INDEX IDX_46C30D130A1DE10 (number_id), PRIMARY KEY(completeness_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE completeness_has_number ADD CONSTRAINT fk_completeness_has_number_completeness1 FOREIGN KEY (completeness_id) REFERENCES completeness (completeness_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE completeness_has_number ADD CONSTRAINT fk_completeness_has_number_number1 FOREIGN KEY (number_id) REFERENCES number (number_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE number_has_completeness');
    }
}
