<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170927005418 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE number_has_validation_tc (number_id INT NOT NULL, validation_tc INT NOT NULL, INDEX IDX_71E342B230A1DE10 (number_id), INDEX IDX_71E342B2C32FB1EF (validation_tc), PRIMARY KEY(number_id, validation_tc)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_structure (number_id INT NOT NULL, validation_structure INT NOT NULL, INDEX IDX_AEC246A330A1DE10 (number_id), INDEX IDX_AEC246A3E45826A8 (validation_structure), PRIMARY KEY(number_id, validation_structure)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_shots (number_id INT NOT NULL, validation_shots INT NOT NULL, INDEX IDX_6622262030A1DE10 (number_id), INDEX IDX_66222620AF05A794 (validation_shots), PRIMARY KEY(number_id, validation_shots)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_performance (number_id INT NOT NULL, validation_performance INT NOT NULL, INDEX IDX_846EE2A430A1DE10 (number_id), INDEX IDX_846EE2A42A2810AD (validation_performance), PRIMARY KEY(number_id, validation_performance)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_backstage (number_id INT NOT NULL, validation_backstage INT NOT NULL, INDEX IDX_952DA17530A1DE10 (number_id), INDEX IDX_952DA175DFB7C17E (validation_backstage), PRIMARY KEY(number_id, validation_backstage)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_theme (number_id INT NOT NULL, validation_theme INT NOT NULL, INDEX IDX_B64163AF30A1DE10 (number_id), INDEX IDX_B64163AF7F66E21B (validation_theme), PRIMARY KEY(number_id, validation_theme)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_mood (number_id INT NOT NULL, validation_mood INT NOT NULL, INDEX IDX_8349BCC230A1DE10 (number_id), INDEX IDX_8349BCC2A8E88EB1 (validation_mood), PRIMARY KEY(number_id, validation_mood)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_dance (number_id INT NOT NULL, validation_dance INT NOT NULL, INDEX IDX_397F79C830A1DE10 (number_id), INDEX IDX_397F79C8F058F87C (validation_dance), PRIMARY KEY(number_id, validation_dance)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_music (number_id INT NOT NULL, validation_music INT NOT NULL, INDEX IDX_EC66A6ED30A1DE10 (number_id), INDEX IDX_EC66A6ED25412759 (validation_music), PRIMARY KEY(number_id, validation_music)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_reference (number_id INT NOT NULL, validation_reference INT NOT NULL, INDEX IDX_6F60385A30A1DE10 (number_id), INDEX IDX_6F60385A25FA5851 (validation_reference), PRIMARY KEY(number_id, validation_reference)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number_has_validation_cost (number_id INT NOT NULL, validation_cost INT NOT NULL, INDEX IDX_985686C830A1DE10 (number_id), INDEX IDX_985686C8B3F7B4BB (validation_cost), PRIMARY KEY(number_id, validation_cost)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE number_has_validation_tc ADD CONSTRAINT FK_71E342B230A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_tc ADD CONSTRAINT FK_71E342B2C32FB1EF FOREIGN KEY (validation_tc) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_structure ADD CONSTRAINT FK_AEC246A330A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_structure ADD CONSTRAINT FK_AEC246A3E45826A8 FOREIGN KEY (validation_structure) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_shots ADD CONSTRAINT FK_6622262030A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_shots ADD CONSTRAINT FK_66222620AF05A794 FOREIGN KEY (validation_shots) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_performance ADD CONSTRAINT FK_846EE2A430A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_performance ADD CONSTRAINT FK_846EE2A42A2810AD FOREIGN KEY (validation_performance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_backstage ADD CONSTRAINT FK_952DA17530A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_backstage ADD CONSTRAINT FK_952DA175DFB7C17E FOREIGN KEY (validation_backstage) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_theme ADD CONSTRAINT FK_B64163AF30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_theme ADD CONSTRAINT FK_B64163AF7F66E21B FOREIGN KEY (validation_theme) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_mood ADD CONSTRAINT FK_8349BCC230A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_mood ADD CONSTRAINT FK_8349BCC2A8E88EB1 FOREIGN KEY (validation_mood) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_dance ADD CONSTRAINT FK_397F79C830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_dance ADD CONSTRAINT FK_397F79C8F058F87C FOREIGN KEY (validation_dance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_music ADD CONSTRAINT FK_EC66A6ED30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_music ADD CONSTRAINT FK_EC66A6ED25412759 FOREIGN KEY (validation_music) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_reference ADD CONSTRAINT FK_6F60385A30A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_reference ADD CONSTRAINT FK_6F60385A25FA5851 FOREIGN KEY (validation_reference) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number_has_validation_cost ADD CONSTRAINT FK_985686C830A1DE10 FOREIGN KEY (number_id) REFERENCES number (number_id)');
        $this->addSql('ALTER TABLE number_has_validation_cost ADD CONSTRAINT FK_985686C8B3F7B4BB FOREIGN KEY (validation_cost) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5425412759');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F5425FA5851');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F542A2810AD');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F547F66E21B');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54A8E88EB1');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54AF05A794');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54B3F7B4BB');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54C32FB1EF');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54DFB7C17E');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54E45826A8');
        $this->addSql('ALTER TABLE number DROP FOREIGN KEY FK_96901F54F058F87C');
        $this->addSql('DROP INDEX IDX_96901F54C32FB1EF ON number');
        $this->addSql('DROP INDEX IDX_96901F54E45826A8 ON number');
        $this->addSql('DROP INDEX IDX_96901F54DFB7C17E ON number');
        $this->addSql('DROP INDEX IDX_96901F547F66E21B ON number');
        $this->addSql('DROP INDEX IDX_96901F54A8E88EB1 ON number');
        $this->addSql('DROP INDEX IDX_96901F54F058F87C ON number');
        $this->addSql('DROP INDEX IDX_96901F5425412759 ON number');
        $this->addSql('DROP INDEX IDX_96901F5425FA5851 ON number');
        $this->addSql('DROP INDEX IDX_96901F54B3F7B4BB ON number');
        $this->addSql('DROP INDEX IDX_96901F54AF05A794 ON number');
        $this->addSql('DROP INDEX IDX_96901F542A2810AD ON number');
        $this->addSql('ALTER TABLE number DROP validation_music, DROP validation_reference, DROP validation_performance, DROP validation_theme, DROP validation_mood, DROP validation_shots, DROP validation_cost, DROP validation_tc, DROP validation_backstage, DROP validation_structure, DROP validation_dance');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE number_has_validation_tc');
        $this->addSql('DROP TABLE number_has_validation_structure');
        $this->addSql('DROP TABLE number_has_validation_shots');
        $this->addSql('DROP TABLE number_has_validation_performance');
        $this->addSql('DROP TABLE number_has_validation_backstage');
        $this->addSql('DROP TABLE number_has_validation_theme');
        $this->addSql('DROP TABLE number_has_validation_mood');
        $this->addSql('DROP TABLE number_has_validation_dance');
        $this->addSql('DROP TABLE number_has_validation_music');
        $this->addSql('DROP TABLE number_has_validation_reference');
        $this->addSql('DROP TABLE number_has_validation_cost');
        $this->addSql('ALTER TABLE number ADD validation_music INT DEFAULT NULL, ADD validation_reference INT DEFAULT NULL, ADD validation_performance INT DEFAULT NULL, ADD validation_theme INT DEFAULT NULL, ADD validation_mood INT DEFAULT NULL, ADD validation_shots INT DEFAULT NULL, ADD validation_cost INT DEFAULT NULL, ADD validation_tc INT DEFAULT NULL, ADD validation_backstage INT DEFAULT NULL, ADD validation_structure INT DEFAULT NULL, ADD validation_dance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5425412759 FOREIGN KEY (validation_music) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F5425FA5851 FOREIGN KEY (validation_reference) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F542A2810AD FOREIGN KEY (validation_performance) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F547F66E21B FOREIGN KEY (validation_theme) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54A8E88EB1 FOREIGN KEY (validation_mood) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54AF05A794 FOREIGN KEY (validation_shots) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54B3F7B4BB FOREIGN KEY (validation_cost) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54C32FB1EF FOREIGN KEY (validation_tc) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54DFB7C17E FOREIGN KEY (validation_backstage) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54E45826A8 FOREIGN KEY (validation_structure) REFERENCES validation (validation_id)');
        $this->addSql('ALTER TABLE number ADD CONSTRAINT FK_96901F54F058F87C FOREIGN KEY (validation_dance) REFERENCES validation (validation_id)');
        $this->addSql('CREATE INDEX IDX_96901F54C32FB1EF ON number (validation_tc)');
        $this->addSql('CREATE INDEX IDX_96901F54E45826A8 ON number (validation_structure)');
        $this->addSql('CREATE INDEX IDX_96901F54DFB7C17E ON number (validation_backstage)');
        $this->addSql('CREATE INDEX IDX_96901F547F66E21B ON number (validation_theme)');
        $this->addSql('CREATE INDEX IDX_96901F54A8E88EB1 ON number (validation_mood)');
        $this->addSql('CREATE INDEX IDX_96901F54F058F87C ON number (validation_dance)');
        $this->addSql('CREATE INDEX IDX_96901F5425412759 ON number (validation_music)');
        $this->addSql('CREATE INDEX IDX_96901F5425FA5851 ON number (validation_reference)');
        $this->addSql('CREATE INDEX IDX_96901F54B3F7B4BB ON number (validation_cost)');
        $this->addSql('CREATE INDEX IDX_96901F54AF05A794 ON number (validation_shots)');
        $this->addSql('CREATE INDEX IDX_96901F542A2810AD ON number (validation_performance)');
    }
}
