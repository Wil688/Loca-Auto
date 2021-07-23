<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723090438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, categorie_car_id INT NOT NULL, brand_car_id INT NOT NULL, engine_car_id INT NOT NULL, seat_car_id INT NOT NULL, plate VARCHAR(10) NOT NULL, INDEX IDX_773DE69D45E05CA6 (categorie_car_id), INDEX IDX_773DE69D404E8A91 (brand_car_id), INDEX IDX_773DE69D22E50653 (engine_car_id), INDEX IDX_773DE69DFF128EC5 (seat_car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, user_contract_id INT NOT NULL, car_contract_id INT NOT NULL, release_date DATETIME NOT NULL, return_date DATETIME NOT NULL, INDEX IDX_E98F28598C6D2968 (user_contract_id), INDEX IDX_E98F28594FF41F81 (car_contract_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, engine_type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seat (id INT AUTO_INCREMENT NOT NULL, seat_number SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, phone VARCHAR(20) NOT NULL, birth_date DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D45E05CA6 FOREIGN KEY (categorie_car_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D404E8A91 FOREIGN KEY (brand_car_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D22E50653 FOREIGN KEY (engine_car_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DFF128EC5 FOREIGN KEY (seat_car_id) REFERENCES seat (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28598C6D2968 FOREIGN KEY (user_contract_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28594FF41F81 FOREIGN KEY (car_contract_id) REFERENCES car (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D404E8A91');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F28594FF41F81');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D45E05CA6');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D22E50653');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DFF128EC5');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F28598C6D2968');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE seat');
        $this->addSql('DROP TABLE `user`');
    }
}
