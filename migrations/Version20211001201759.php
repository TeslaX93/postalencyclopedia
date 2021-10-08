<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001201759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE androidapp_todo');
        $this->addSql('DROP TABLE androidapp_users');
        $this->addSql('ALTER TABLE provider CHANGE website website VARCHAR(255) DEFAULT NULL, CHANGE tracking_website tracking_website VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE territory CHANGE postal_code_format postal_code_format VARCHAR(255) DEFAULT NULL, CHANGE upu_shortcut upu_shortcut VARCHAR(3) DEFAULT NULL, CHANGE iso3166 iso3166 VARCHAR(5) DEFAULT NULL, CHANGE emoji emoji VARCHAR(32) DEFAULT NULL, CHANGE address_format address_format VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE androidapp_todo (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, taskName VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, taskDate DATETIME NOT NULL, priority TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE androidapp_users (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, pass VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, device VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE provider CHANGE website website VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE tracking_website tracking_website VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE territory CHANGE postal_code_format postal_code_format VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE address_format address_format VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE upu_shortcut upu_shortcut VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE iso3166 iso3166 VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE emoji emoji VARCHAR(32) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
