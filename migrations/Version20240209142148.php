<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209142148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opening_time (id INT AUTO_INCREMENT NOT NULL, evening_id INT DEFAULT NULL, days VARCHAR(255) NOT NULL, morning VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_89115E6E2277C05C (evening_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE opening_time ADD CONSTRAINT FK_89115E6E2277C05C FOREIGN KEY (evening_id) REFERENCES garage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_time DROP FOREIGN KEY FK_89115E6E2277C05C');
        $this->addSql('DROP TABLE opening_time');
    }
}
