<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222141025 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pax DROP FOREIGN KEY FK_898812AA1D829221');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP INDEX IDX_898812AA1D829221 ON pax');
        $this->addSql('ALTER TABLE pax DROP groupp_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, nombre_p INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pax ADD groupp_id INT NOT NULL');
        $this->addSql('ALTER TABLE pax ADD CONSTRAINT FK_898812AA1D829221 FOREIGN KEY (groupp_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_898812AA1D829221 ON pax (groupp_id)');
    }
}
