<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170319230637 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1C38F37CA');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F130A1DE10');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F15B94ADD2');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F17AC68360');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F17CD7D24A');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F19477DDBE');
        $this->addSql('DROP INDEX fk_link_stageshow1_idx ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F17AC68360 ON link (stageShow_id)');
        $this->addSql('DROP INDEX fk_link_tv1_idx ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F17CD7D24A ON link (TV_id)');
        $this->addSql('DROP INDEX fk_link_stagenumber1_idx ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F19477DDBE ON link (stageNumber_id)');
        $this->addSql('DROP INDEX fk_link_radio1_idx ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F15B94ADD2 ON link (radio_id)');
        $this->addSql('DROP INDEX fk_link_number1_idx ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F130A1DE10 ON link (number_id)');
        $this->addSql('DROP INDEX fk_link_disc1_idx ON link');
        $this->addSql('CREATE INDEX IDX_36AC99F1C38F37CA ON link (disc_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1C38F37CA FOREIGN KEY (disc_id) REFERENCES disc (disc_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F15B94ADD2 FOREIGN KEY (radio_id) REFERENCES radio (radio_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F17AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F17CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F19477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F17AC68360');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F17CD7D24A');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F19477DDBE');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F15B94ADD2');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F130A1DE10');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1C38F37CA');
        $this->addSql('DROP INDEX idx_36ac99f130a1de10 ON link');
        $this->addSql('CREATE INDEX fk_link_number1_idx ON link (number_id)');
        $this->addSql('DROP INDEX idx_36ac99f17cd7d24a ON link');
        $this->addSql('CREATE INDEX fk_link_TV1_idx ON link (TV_id)');
        $this->addSql('DROP INDEX idx_36ac99f1c38f37ca ON link');
        $this->addSql('CREATE INDEX fk_link_disc1_idx ON link (disc_id)');
        $this->addSql('DROP INDEX idx_36ac99f15b94add2 ON link');
        $this->addSql('CREATE INDEX fk_link_radio1_idx ON link (radio_id)');
        $this->addSql('DROP INDEX idx_36ac99f19477ddbe ON link');
        $this->addSql('CREATE INDEX fk_link_stageNumber1_idx ON link (stageNumber_id)');
        $this->addSql('DROP INDEX idx_36ac99f17ac68360 ON link');
        $this->addSql('CREATE INDEX fk_link_stageShow1_idx ON link (stageShow_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F17AC68360 FOREIGN KEY (stageShow_id) REFERENCES stageShow (stageShow_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F17CD7D24A FOREIGN KEY (TV_id) REFERENCES TV (TV_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F19477DDBE FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F15B94ADD2 FOREIGN KEY (radio_id) REFERENCES radio (radio_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F130A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1C38F37CA FOREIGN KEY (disc_id) REFERENCES disc (disc_id)');
    }
}
