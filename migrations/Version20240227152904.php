<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227152904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD558FBEB9');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DDA7CF2329');
        $this->addSql('DROP INDEX IDX_3CBF69DDA7CF2329 ON instrument');
        $this->addSql('DROP INDEX IDX_3CBF69DD558FBEB9 ON instrument');
        $this->addSql('ALTER TABLE instrument DROP rental_id, DROP purchase_id');
        $this->addSql('ALTER TABLE purchase ADD instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13BCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE INDEX IDX_6117D13BCF11D9C ON purchase (instrument_id)');
        $this->addSql('ALTER TABLE rental ADD instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE INDEX IDX_1619C27DCF11D9C ON rental (instrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DCF11D9C');
        $this->addSql('DROP INDEX IDX_1619C27DCF11D9C ON rental');
        $this->addSql('ALTER TABLE rental DROP instrument_id');
        $this->addSql('ALTER TABLE instrument ADD rental_id INT DEFAULT NULL, ADD purchase_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DDA7CF2329 FOREIGN KEY (rental_id) REFERENCES rental (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3CBF69DDA7CF2329 ON instrument (rental_id)');
        $this->addSql('CREATE INDEX IDX_3CBF69DD558FBEB9 ON instrument (purchase_id)');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13BCF11D9C');
        $this->addSql('DROP INDEX IDX_6117D13BCF11D9C ON purchase');
        $this->addSql('ALTER TABLE purchase DROP instrument_id');
    }
}
