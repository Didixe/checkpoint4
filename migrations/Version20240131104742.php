<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131104742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, other_information VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, object VARCHAR(255) NOT NULL, message VARCHAR(500) NOT NULL, INDEX IDX_9474526C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instrument (id INT AUTO_INCREMENT NOT NULL, rental_id INT DEFAULT NULL, purchase_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, materials VARCHAR(255) NOT NULL, tuning VARCHAR(255) NOT NULL, note_number INT NOT NULL, picture VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_3CBF69DDA7CF2329 (rental_id), INDEX IDX_3CBF69DD558FBEB9 (purchase_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, materials VARCHAR(255) NOT NULL, tuning VARCHAR(255) NOT NULL, note_number VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, INDEX IDX_D3EDB1E019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, delivery_date DATETIME DEFAULT NULL, INDEX IDX_6117D13B19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, duration DATETIME NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_1619C27D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DDA7CF2329 FOREIGN KEY (rental_id) REFERENCES rental (id)');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id)');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C19EB6921');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DDA7CF2329');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD558FBEB9');
        $this->addSql('ALTER TABLE production DROP FOREIGN KEY FK_D3EDB1E019EB6921');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B19EB6921');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D19EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE instrument');
        $this->addSql('DROP TABLE production');
        $this->addSql('DROP TABLE purchase');
        $this->addSql('DROP TABLE rental');
    }
}
