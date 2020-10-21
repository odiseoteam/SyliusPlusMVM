<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021173000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_adjustment ADD vendor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F2F603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id)');
        $this->addSql('CREATE INDEX IDX_ACA6E0F2F603EE73 ON sylius_adjustment (vendor_id)');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD vendor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT FK_5FB0EE11F603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id)');
        $this->addSql('CREATE INDEX IDX_5FB0EE11F603EE73 ON sylius_shipping_method (vendor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_adjustment DROP FOREIGN KEY FK_ACA6E0F2F603EE73');
        $this->addSql('DROP INDEX IDX_ACA6E0F2F603EE73 ON sylius_adjustment');
        $this->addSql('ALTER TABLE sylius_adjustment DROP vendor_id');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP FOREIGN KEY FK_5FB0EE11F603EE73');
        $this->addSql('DROP INDEX IDX_5FB0EE11F603EE73 ON sylius_shipping_method');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP vendor_id');
    }
}
