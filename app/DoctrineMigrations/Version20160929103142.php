<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929103142 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_costume (number_id INT NOT NULL, costume_id INT NOT NULL, INDEX IDX_78158BDD30A1DE10 (number_id), INDEX IDX_78158BDDCFCDCFA6 (costume_id), PRIMARY KEY(number_id, costume_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_stereotype (number_id INT NOT NULL, stereotype_id INT NOT NULL, INDEX IDX_C7F1544F30A1DE10 (number_id), INDEX IDX_C7F1544FBB26A68D (stereotype_id), PRIMARY KEY(number_id, stereotype_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_generallocalisation (number_id INT NOT NULL, general_localisation_id INT NOT NULL, INDEX IDX_23D0AAE530A1DE10 (number_id), INDEX IDX_23D0AAE5BF30111 (general_localisation_id), PRIMARY KEY(number_id, general_localisation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_costume ADD CONSTRAINT FK_78158BDD30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_costume ADD CONSTRAINT FK_78158BDDCFCDCFA6 FOREIGN KEY (costume_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_stereotype ADD CONSTRAINT FK_C7F1544F30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_stereotype ADD CONSTRAINT FK_C7F1544FBB26A68D FOREIGN KEY (stereotype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number_has_generallocalisation ADD CONSTRAINT FK_23D0AAE530A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_generallocalisation ADD CONSTRAINT FK_23D0AAE5BF30111 FOREIGN KEY (general_localisation_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54BB26A68D');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54BF30111');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54CFCDCFA6');
        $this->addSql('DROP INDEX IDX_96901F54CFCDCFA6 ON number');
        $this->addSql('DROP INDEX IDX_96901F54BB26A68D ON number');
        $this->addSql('DROP INDEX IDX_96901F54BF30111 ON number');
        $this->addSql('ALTER TABLE number DROP stereotype_id, DROP general_localisation_id, DROP costume_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_costume');
        $this->addSql('DROP TABLE number_has_stereotype');
        $this->addSql('DROP TABLE number_has_generallocalisation');
        $this->addSql('ALTER TABLE number ADD stereotype_id INT DEFAULT NULL, ADD general_localisation_id INT DEFAULT NULL, ADD costume_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54BB26A68D FOREIGN KEY (stereotype_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54BF30111 FOREIGN KEY (general_localisation_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54CFCDCFA6 FOREIGN KEY (costume_id) REFERENCES thesaurus (thesaurus_id)');
        $this->addSql('CREATE INDEX IDX_96901F54CFCDCFA6 ON number (costume_id)');
        $this->addSql('CREATE INDEX IDX_96901F54BB26A68D ON number (stereotype_id)');
        $this->addSql('CREATE INDEX IDX_96901F54BF30111 ON number (general_localisation_id)');
    }
}
