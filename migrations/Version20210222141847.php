<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222141847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pax ADD grp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pax ADD CONSTRAINT FK_898812AAD51E9150 FOREIGN KEY (grp_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_898812AAD51E9150 ON pax (grp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pax DROP FOREIGN KEY FK_898812AAD51E9150');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP INDEX IDX_898812AAD51E9150 ON pax');
        $this->addSql('ALTER TABLE pax DROP grp_id');
    }
}
