<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227172724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE email email VARCHAR(180) NOT NULL, CHANGE name name VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE production CHANGE note_number note_number INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE email email VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE production CHANGE note_number note_number VARCHAR(255) NOT NULL');
    }
}
