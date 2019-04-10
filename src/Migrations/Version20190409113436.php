<?php

declare(strict_types=1);

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190409113436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plate VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, register_year INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, birth DATE NOT NULL, sex VARCHAR(255) NOT NULL, phone INTEGER NOT NULL, address CLOB NOT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE journey (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, arrivezone VARCHAR(255) NOT NULL, departurezone VARCHAR(255) NOT NULL, plus_spaces INTEGER DEFAULT NULL, big_spaces INTEGER DEFAULT NULL, medium_spaces INTEGER DEFAULT NULL, small_spaces INTEGER DEFAULT NULL, mini_spaces INTEGER DEFAULT NULL, departure_time DATETIME NOT NULL, arrive_time DATETIME NOT NULL, description CLOB DEFAULT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE journey');
    }
}
