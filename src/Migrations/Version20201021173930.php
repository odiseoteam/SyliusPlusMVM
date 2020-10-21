<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021173930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_promotion ADD vendor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion ADD CONSTRAINT FK_F1573963F603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id)');
        $this->addSql('CREATE INDEX IDX_F1573963F603EE73 ON sylius_promotion (vendor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_promotion DROP FOREIGN KEY FK_F1573963F603EE73');
        $this->addSql('DROP INDEX IDX_F1573963F603EE73 ON sylius_promotion');
        $this->addSql('ALTER TABLE sylius_promotion DROP vendor_id');
    }
}
