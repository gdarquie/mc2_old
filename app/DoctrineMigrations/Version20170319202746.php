<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170319202746 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stageshow_has_film (film_id INT NOT NULL, stageShow_id INT NOT NULL, INDEX IDX_FC291A607AC68360 (stageShow_id), INDEX IDX_FC291A60567F5183 (film_id), PRIMARY KEY(stageShow_id, film_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stageshow_has_film ADD CONSTRAINT FK_FC291A607AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE stageshow_has_film ADD CONSTRAINT FK_FC291A60567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stageshow_has_film');
    }
}
