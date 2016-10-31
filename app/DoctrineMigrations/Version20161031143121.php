<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161031143121 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE costumes_has_number');
        $this->addSql('DROP TABLE number_has_person');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE costumes_has_number (costumes_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_C3953BECD80B7637 (costumes_id), INDEX IDX_C3953BEC30A1DE10 (number_id), PRIMARY KEY(costumes_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_person (profession_id INT NOT NULL, person_id INT NOT NULL, number_id INT NOT NULL, INDEX fk_number_has_person_person1_idx (person_id), INDEX fk_number_has_person_number1_idx (number_id), INDEX fk_number_has_person_profession1_idx (profession_id), PRIMARY KEY(profession_id, person_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_person ADD CONSTRAINT FK_460DBD1E217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE number_has_person ADD CONSTRAINT FK_460DBD1E30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_person ADD CONSTRAINT FK_460DBD1EFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (profession_id)');
    }
}
