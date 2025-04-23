<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423083632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE evolution (id INT AUTO_INCREMENT NOT NULL, pokemon_base_id INT DEFAULT NULL, pokemon_evolue_id INT DEFAULT NULL, `condition` VARCHAR(100) DEFAULT NULL, INDEX IDX_420C289350DA3D0 (pokemon_base_id), INDEX IDX_420C2893D2925F5 (pokemon_evolue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, type1_id INT NOT NULL, type2_id INT DEFAULT NULL, talent_id INT DEFAULT NULL, numero_pokedex INT NOT NULL, nom VARCHAR(100) NOT NULL, pv INT NOT NULL, attaque INT NOT NULL, defense INT NOT NULL, vitesse INT NOT NULL, generation INT NOT NULL, INDEX IDX_62DC90F3BFAFA3E1 (type1_id), INDEX IDX_62DC90F3AD1A0C0F (type2_id), INDEX IDX_62DC90F318777CEF (talent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE talent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_16D902F56C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE type_pokemon (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_4AFDFF066C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE evolution ADD CONSTRAINT FK_420C289350DA3D0 FOREIGN KEY (pokemon_base_id) REFERENCES pokemon (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE evolution ADD CONSTRAINT FK_420C2893D2925F5 FOREIGN KEY (pokemon_evolue_id) REFERENCES pokemon (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3BFAFA3E1 FOREIGN KEY (type1_id) REFERENCES type_pokemon (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3AD1A0C0F FOREIGN KEY (type2_id) REFERENCES type_pokemon (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F318777CEF FOREIGN KEY (talent_id) REFERENCES talent (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE evolution DROP FOREIGN KEY FK_420C289350DA3D0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE evolution DROP FOREIGN KEY FK_420C2893D2925F5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3BFAFA3E1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3AD1A0C0F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F318777CEF
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE evolution
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE pokemon
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE talent
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_pokemon
        SQL);
    }
}
