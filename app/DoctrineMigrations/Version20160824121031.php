<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160824121031 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE completeness CHANGE title title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE costumes CHANGE title title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE dancing CHANGE type type VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE disc CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE obc obc VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE effects CHANGE type type VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE ensemble CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE film CHANGE color color VARCHAR(255) DEFAULT NULL, CHANGE contract contract VARCHAR(255) DEFAULT NULL, CHANGE rights rights INT DEFAULT NULL, CHANGE negative negative INT DEFAULT NULL, CHANGE pna pna INT DEFAULT NULL, CHANGE us_rentals us_rentals INT DEFAULT NULL, CHANGE foreign_rentals foreign_rentals INT DEFAULT NULL, CHANGE total_rentals total_rentals INT DEFAULT NULL, CHANGE us_boxoffice us_boxoffice INT DEFAULT NULL, CHANGE foreign_boxoffice foreign_boxoffice INT DEFAULT NULL, CHANGE total_boxoffice total_boxoffice INT DEFAULT NULL, CHANGE archives archives MEDIUMTEXT DEFAULT NULL, CHANGE deleted deleted MEDIUMTEXT DEFAULT NULL, CHANGE adaptation adaptation VARCHAR(255) DEFAULT NULL, CHANGE remake remake VARCHAR(45) DEFAULT NULL, CHANGE verdict verdict VARCHAR(255) DEFAULT NULL, CHANGE legion legion VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE import_stageShow CHANGE revival revival VARCHAR(45) DEFAULT NULL, CHANGE count count INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item CHANGE timestamp timestamp DATETIME NOT NULL');
        $this->addSql('ALTER TABLE mood CHANGE text text TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE musical CHANGE title title VARCHAR(45) NOT NULL, CHANGE type type VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE number ADD timestamp DATETIME NOT NULL, CHANGE film_id film_id INT NOT NULL, CHANGE length length INT DEFAULT NULL, CHANGE performance performance VARCHAR(255) DEFAULT NULL, CHANGE validation_performance validation_performance INT DEFAULT NULL, CHANGE spectators spectators VARCHAR(255) DEFAULT NULL, CHANGE diegetic diegetic VARCHAR(45) DEFAULT NULL, CHANGE musician musician VARCHAR(255) DEFAULT NULL, CHANGE integration_id integration_id INT DEFAULT NULL, CHANGE dubbing dubbing VARCHAR(500) DEFAULT NULL, CHANGE tempo tempo VARCHAR(255) DEFAULT NULL, CHANGE lyrics lyrics MEDIUMTEXT DEFAULT NULL, CHANGE source source VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE person CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE firstShow firstShow INT DEFAULT NULL, CHANGE type type VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE place CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE lat lat DOUBLE PRECISION DEFAULT NULL, CHANGE `long` `long` DOUBLE PRECISION DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE `real` `real` VARCHAR(45) DEFAULT NULL, CHANGE fiction fiction VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE title title VARCHAR(45) DEFAULT NULL, CHANGE external external TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE radio CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE shots CHANGE timestamp timestamp DATETIME NOT NULL');
        $this->addSql('ALTER TABLE socialPlace CHANGE title title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE song CHANGE timestamp timestamp DATETIME NOT NULL');
        $this->addSql('ALTER TABLE stageNumber CHANGE `order` `order` INT DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stageShow CHANGE count count INT DEFAULT NULL, CHANGE timestamp timestamp DATETIME NOT NULL');
        $this->addSql('ALTER TABLE state CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE `long` `long` DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE thesaurus CHANGE type type VARCHAR(255) NOT NULL, CHANGE link link VARCHAR(255) DEFAULT NULL, CHANGE category category VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE TV CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE tv_show tv_show VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE underscoring CHANGE title title VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE TV CHANGE title title VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Le nom éventuel du spectacle adapté
        \', CHANGE tv_show tv_show VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Le nom  de l’émission\', CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Type d’émission:\'');
        $this->addSql('ALTER TABLE completeness CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8_general_ci COMMENT \'Complete/ incomplete/ partial reprise / pause / …\'');
        $this->addSql('ALTER TABLE costumes CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8_general_ci COMMENT \'Le nom du costume est tiré de la liste costume / select\'');
        $this->addSql('ALTER TABLE dancing CHANGE type type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Style of dancing/ Dance sub-genre/ Content\'');
        $this->addSql('ALTER TABLE disc CHANGE title title VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Titre du disque (pas  de la chanson)\', CHANGE obc obc VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Original Broadway Cast (Y/N)\'');
        $this->addSql('ALTER TABLE effects CHANGE type type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'

        Visual ou spécial\'');
        $this->addSql('ALTER TABLE ensemble CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Musical ou Dance\'');
        $this->addSql('ALTER TABLE film CHANGE color color VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Essayer de le faire remonter techniquement via les couleurs des numéros\', CHANGE contract contract VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Date d’acquisition
        \', CHANGE rights rights INT DEFAULT NULL COMMENT \'Somme en dollars\', CHANGE negative negative INT DEFAULT NULL COMMENT \'Negative cost : budget de production en dollar\', CHANGE pna pna INT DEFAULT NULL COMMENT \'Print and advertising cost, valeur en $
        \', CHANGE us_rentals us_rentals INT DEFAULT NULL COMMENT \'Dollars\', CHANGE foreign_rentals foreign_rentals INT DEFAULT NULL COMMENT \'dollars\', CHANGE total_rentals total_rentals INT DEFAULT NULL COMMENT \'Worldwide rentals en dollar
        \', CHANGE us_boxoffice us_boxoffice INT DEFAULT NULL COMMENT \'dollars\', CHANGE foreign_boxoffice foreign_boxoffice INT DEFAULT NULL COMMENT \'dollars\', CHANGE total_boxoffice total_boxoffice INT DEFAULT NULL COMMENT \'Dollars\', CHANGE archives archives MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Archive et commentaires\', CHANGE deleted deleted MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Indication des numéros supprimés
        \', CHANGE adaptation adaptation VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Adaptation de Broadway, voir thésaurus?
        \', CHANGE remake remake VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Yes/ No
        \', CHANGE verdict verdict VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'PCA verdict (unacceptable/ acceptable)\', CHANGE legion legion VARCHAR(5) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'A, B, C ou D\'');
        $this->addSql('ALTER TABLE import_stageShow CHANGE revival revival VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Yes / No\', CHANGE count count INT DEFAULT NULL COMMENT \'Le nombre de dates
        \'');
        $this->addSql('ALTER TABLE item CHANGE timestamp timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE mood CHANGE text text TEXT DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Définition\'');
        $this->addSql('ALTER TABLE musical CHANGE title title VARCHAR(45) NOT NULL COLLATE utf8_general_ci COMMENT \'nom du micro-style\', CHANGE type type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Selon le thésaurus, on saura la grande famille à laquelle appartient le micro-style :
        -American jazz and popular
        -Historical popular stage\'');
        $this->addSql('ALTER TABLE number DROP timestamp, CHANGE film_id film_id INT DEFAULT NULL, CHANGE length length INT DEFAULT NULL COMMENT \'Calcul de la durée à partir de end_tc - begin_tc\', CHANGE performance performance VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Parmi des mots prédéfinis - voir thesaurus\', CHANGE validation_performance validation_performance INT DEFAULT NULL COMMENT \'Outlines et form\', CHANGE spectators spectators VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Pondération de l’importance du statut réel ou imaginaire du lieu.
        Si 0 : les deux (real et fiction) sont à égalité
        Si 1 : real prime
        Si 2 : fiction prime\', CHANGE diegetic diegetic VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'OnStage/voir thesaurus (1 réponse parmi  choix)\', CHANGE musician musician VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Une seule réponse possible par liste de mots (en cours de définition) / select\', CHANGE integration_id integration_id INT DEFAULT NULL COMMENT \'Lien vers la table integration (many to many) - IntegrationOptions dans le thesaurus\', CHANGE dubbing dubbing VARCHAR(500) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'probablement yes / no\', CHANGE tempo tempo VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Voir thesaurus, un seule réponse
        Select\', CHANGE lyrics lyrics MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Texte des lyrics qui ont été censurés\', CHANGE source source VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'
        1 réponse parmi les 4 :
        -original
        - broadway
        …\'');
        $this->addSql('ALTER TABLE person CHANGE lastname lastname VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Si c’est un pseudo, devient le nom complet (il n’y aura pas de nom)\', CHANGE firstShow firstShow INT DEFAULT NULL COMMENT \'Premier spectacle que la personne a réalisé\', CHANGE type type VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'
        Singulier ou pluriel (pour savoir si c’est un groupe ou non)

        Si c’est un groupe, on ne garde que le lastname.\'');
        $this->addSql('ALTER TABLE place CHANGE title title VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Table place  = les lieux géolocalisés qu’ils soient réels ou imaginaires\', CHANGE lat lat DOUBLE PRECISION DEFAULT NULL COMMENT \'

        Géolocalisation x\', CHANGE `long` `long` DOUBLE PRECISION DEFAULT NULL COMMENT \'

        Géolocalisation y\', CHANGE size size INT DEFAULT NULL COMMENT \'Taille de la zone, est-ce qu’il s’agit d’un point, précis, d’une ville ou d’un pays (de 1 à 6 par exemple- a définir : précis/ rue/ville/ état/ pays/ continent)\', CHANGE `real` `real` VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Lieu réel ou non (oui/Non), Lichtenborg? Oz? Des lieux non réels mais dont on attribuera arbitrairement une géolocalisation
        \', CHANGE fiction fiction VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Est-ce que les personnages sont vraiment dans le lieu ou est-ce qu’ils s’y projettent? (oui/non)\'');
        $this->addSql('ALTER TABLE quotation CHANGE title title VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Par exemple parody de valse Viennoise
        \', CHANGE external external TEXT DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Description de l’œuvre de référence\'');
        $this->addSql('ALTER TABLE radio CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Type d’émission
        - adaptation de Broadway
        - variété\'');
        $this->addSql('ALTER TABLE shots CHANGE timestamp timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE socialPlace CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8_general_ci COMMENT \'Select à partir du thésaurus  lieu générique\'');
        $this->addSql('ALTER TABLE song CHANGE timestamp timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE stageNumber CHANGE `order` `order` INT DEFAULT NULL COMMENT \'Place du numéro dans le show\', CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Voir thesaurus\'');
        $this->addSql('ALTER TABLE stageShow CHANGE count count INT DEFAULT NULL COMMENT \'Le nombre de dates
        \', CHANGE timestamp timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE state CHANGE nom nom VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Les lieux où le film a été censuré.\', CHANGE `long` `long` DOUBLE PRECISION DEFAULT NULL COMMENT \'Géolocalisation au cas où (ne sera pas à remplir manuellement)\'');
        $this->addSql('ALTER TABLE thesaurus CHANGE type type VARCHAR(255) NOT NULL COLLATE utf8_general_ci COMMENT \'table correspondante\', CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'Exemple\', CHANGE category category VARCHAR(500) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'famille de l\'\'item\'');
        $this->addSql('ALTER TABLE underscoring CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8_general_ci COMMENT \'Reprise d’un thème musical\'');
    }
}
