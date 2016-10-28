<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161028101242 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE musical_has_TV DROP FOREIGN KEY fk_musical_has_TV_musical1');
        $this->addSql('ALTER TABLE musical_has_disc DROP FOREIGN KEY fk_musical_has_disc_musical1');
        $this->addSql('ALTER TABLE musical_has_number DROP FOREIGN KEY fk_musical_has_number_musical1');
        $this->addSql('ALTER TABLE musical_has_radio DROP FOREIGN KEY fk_musical_has_radio_musical1');
        $this->addSql('ALTER TABLE musical_has_stageNumber DROP FOREIGN KEY fk_musical_has_stageNumber_musical1');
        $this->addSql('ALTER TABLE socialPlace_has_number DROP FOREIGN KEY FK_F6842EA8F69596F9');
        $this->addSql('DROP TABLE mood');
        $this->addSql('DROP TABLE musical');
        $this->addSql('DROP TABLE musical_has_TV');
        $this->addSql('DROP TABLE musical_has_disc');
        $this->addSql('DROP TABLE musical_has_number');
        $this->addSql('DROP TABLE musical_has_radio');
        $this->addSql('DROP TABLE musical_has_stageNumber');
        $this->addSql('DROP TABLE number_has_mood');
        $this->addSql('DROP TABLE socialPlace');
        $this->addSql('DROP TABLE socialPlace_has_number');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mood (mood_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_general_ci, text TEXT DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(mood_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical (musical_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(45) NOT NULL COLLATE utf8_general_ci, type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(musical_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_TV (musical_id INT NOT NULL, TV_id INT NOT NULL, INDEX IDX_BAB1696B839489F9 (musical_id), INDEX IDX_BAB1696B7CD7D24A (TV_id), PRIMARY KEY(musical_id, TV_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_disc (musical_id INT NOT NULL, disc_id INT NOT NULL, INDEX IDX_64746ADB839489F9 (musical_id), INDEX IDX_64746ADBC38F37CA (disc_id), PRIMARY KEY(musical_id, disc_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_number (musical_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_9D7C7E95839489F9 (musical_id), INDEX IDX_9D7C7E9530A1DE10 (number_id), PRIMARY KEY(musical_id, number_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_radio (musical_id INT NOT NULL, radio_id INT NOT NULL, INDEX IDX_D7F8FBC0839489F9 (musical_id), INDEX IDX_D7F8FBC05B94ADD2 (radio_id), PRIMARY KEY(musical_id, radio_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musical_has_stageNumber (musical_id INT NOT NULL, stageNumber_id INT NOT NULL, INDEX IDX_88ECE00E839489F9 (musical_id), INDEX IDX_88ECE00E9477DDBE (stageNumber_id), PRIMARY KEY(musical_id, stageNumber_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_mood (number_id INT NOT NULL, mood_id INT NOT NULL, INDEX IDX_DE77805630A1DE10 (number_id), INDEX IDX_DE778056B889D33E (mood_id), PRIMARY KEY(number_id, mood_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socialPlace (socialPlace_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(socialPlace_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socialPlace_has_number (number_id INT NOT NULL, socialPlace_id INT NOT NULL, INDEX IDX_F6842EA830A1DE10 (number_id), INDEX IDX_F6842EA8F69596F9 (socialPlace_id), PRIMARY KEY(number_id, socialPlace_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE musical_has_TV ADD CONSTRAINT fk_musical_has_TV_musical1 FOREIGN KEY (musical_id) REFERENCES musical (musical_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_TV ADD CONSTRAINT fk_musical_has_TV_TV1 FOREIGN KEY (TV_id) REFERENCES TV (TV_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_disc ADD CONSTRAINT fk_musical_has_disc_disc1 FOREIGN KEY (disc_id) REFERENCES disc (disc_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_disc ADD CONSTRAINT fk_musical_has_disc_musical1 FOREIGN KEY (musical_id) REFERENCES musical (musical_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_number ADD CONSTRAINT fk_musical_has_number_musical1 FOREIGN KEY (musical_id) REFERENCES musical (musical_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_number ADD CONSTRAINT fk_musical_has_number_number1 FOREIGN KEY (number_id) REFERENCES number (number_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_radio ADD CONSTRAINT fk_musical_has_radio_musical1 FOREIGN KEY (musical_id) REFERENCES musical (musical_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_radio ADD CONSTRAINT fk_musical_has_radio_radio1 FOREIGN KEY (radio_id) REFERENCES radio (radio_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_stageNumber ADD CONSTRAINT fk_musical_has_stageNumber_musical1 FOREIGN KEY (musical_id) REFERENCES musical (musical_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE musical_has_stageNumber ADD CONSTRAINT fk_musical_has_stageNumber_stageNumber1 FOREIGN KEY (stageNumber_id) REFERENCES stageNumber (stageNumber_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE socialPlace_has_number ADD CONSTRAINT FK_F6842EA830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE socialPlace_has_number ADD CONSTRAINT FK_F6842EA8F69596F9 FOREIGN KEY (socialPlace_id) REFERENCES socialplace (socialPlace_id)');
    }
}
