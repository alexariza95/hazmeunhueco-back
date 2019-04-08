<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190408164233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plate VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, register_year INTEGER NOT NULL)');
        $this->addSql('ALTER TABLE user ADD COLUMN birth DATE NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN sex VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN phone INTEGER NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN address CLOB NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN description CLOB DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE car');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO user (id, email, roles, password) SELECT id, email, roles, password FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }
}
