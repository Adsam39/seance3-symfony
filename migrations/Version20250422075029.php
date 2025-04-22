<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422075029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, location VARCHAR(100) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, length_km NUMERIC(5, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE driver (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, birthdate DATE DEFAULT NULL, nationality VARCHAR(100) DEFAULT NULL, INDEX IDX_11667CD9296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, circuit_id INT DEFAULT NULL, season_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, race_date DATE NOT NULL, INDEX IDX_DA6FBBAFCF2182C8 (circuit_id), INDEX IDX_DA6FBBAF4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, race_id INT DEFAULT NULL, driver_id INT DEFAULT NULL, position INT NOT NULL, points NUMERIC(4, 1) NOT NULL, fastest_lap TINYINT(1) NOT NULL, INDEX IDX_136AC1136E59D40D (race_id), INDEX IDX_136AC113C3423909 (driver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, year VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F0E45BA9BB827337 (year), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, country VARCHAR(100) DEFAULT NULL, founded_year VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE driver ADD CONSTRAINT FK_11667CD9296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAFCF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuit (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result ADD CONSTRAINT FK_136AC1136E59D40D FOREIGN KEY (race_id) REFERENCES race (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result ADD CONSTRAINT FK_136AC113C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE driver DROP FOREIGN KEY FK_11667CD9296CD8AE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAFCF2182C8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF4EC001D1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result DROP FOREIGN KEY FK_136AC1136E59D40D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result DROP FOREIGN KEY FK_136AC113C3423909
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE circuit
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE driver
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE race
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE result
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE season
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE team
        SQL);
    }
}
