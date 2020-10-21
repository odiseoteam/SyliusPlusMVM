<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021170927 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE odiseo_vendor (id INT AUTO_INCREMENT NOT NULL, default_payment_method_id INT DEFAULT NULL, plan_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, logo_name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_B506F54F5E237E06 (name), UNIQUE INDEX UNIQ_B506F54F989D9B62 (slug), UNIQUE INDEX UNIQ_B506F54FE7927C74 (email), UNIQUE INDEX UNIQ_B506F54FAF212FD0 (default_payment_method_id), INDEX IDX_B506F54FE899029B (plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_email (id INT AUTO_INCREMENT NOT NULL, vendor_id INT NOT NULL, value VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F58E945BF603EE73 (vendor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_gateway_config (id INT AUTO_INCREMENT NOT NULL, gateway_name VARCHAR(255) NOT NULL, factory_name VARCHAR(255) NOT NULL, config JSON NOT NULL COMMENT \'(DC2Type:json_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D721EC707E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_payment (id INT AUTO_INCREMENT NOT NULL, method_id INT DEFAULT NULL, order_id INT NOT NULL, vendor_id INT NOT NULL, currency_code VARCHAR(3) NOT NULL, amount INT NOT NULL, state VARCHAR(255) NOT NULL, details JSON NOT NULL COMMENT \'(DC2Type:json_array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D1E5C43619883967 (method_id), INDEX IDX_D1E5C4368D9F6D38 (order_id), INDEX IDX_D1E5C436F603EE73 (vendor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_payment_method (id INT AUTO_INCREMENT NOT NULL, gateway_config_id INT DEFAULT NULL, vendor_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_987C877AF23D6140 (gateway_config_id), INDEX IDX_987C877AF603EE73 (vendor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_plan (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, fee DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_765B242477153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_5F5AE1AB2C2AC5D3 (translatable_id), UNIQUE INDEX odiseo_vendor_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odiseo_vendor_channels (channel_id INT NOT NULL, vendor_id INT NOT NULL, INDEX IDX_42A3C6D272F5A1AA (channel_id), INDEX IDX_42A3C6D2F603EE73 (vendor_id), PRIMARY KEY(channel_id, vendor_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_rbac_administration_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, permissions JSON NOT NULL, UNIQUE INDEX UNIQ_3333A12E5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE odiseo_vendor ADD CONSTRAINT FK_B506F54FAF212FD0 FOREIGN KEY (default_payment_method_id) REFERENCES odiseo_vendor_payment_method (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE odiseo_vendor ADD CONSTRAINT FK_B506F54FE899029B FOREIGN KEY (plan_id) REFERENCES odiseo_vendor_plan (id)');
        $this->addSql('ALTER TABLE odiseo_vendor_email ADD CONSTRAINT FK_F58E945BF603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odiseo_vendor_image ADD CONSTRAINT FK_D721EC707E3C61F9 FOREIGN KEY (owner_id) REFERENCES odiseo_vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odiseo_vendor_payment ADD CONSTRAINT FK_D1E5C43619883967 FOREIGN KEY (method_id) REFERENCES odiseo_vendor_payment_method (id)');
        $this->addSql('ALTER TABLE odiseo_vendor_payment ADD CONSTRAINT FK_D1E5C4368D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odiseo_vendor_payment ADD CONSTRAINT FK_D1E5C436F603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odiseo_vendor_payment_method ADD CONSTRAINT FK_987C877AF23D6140 FOREIGN KEY (gateway_config_id) REFERENCES odiseo_vendor_gateway_config (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE odiseo_vendor_payment_method ADD CONSTRAINT FK_987C877AF603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odiseo_vendor_translation ADD CONSTRAINT FK_5F5AE1AB2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES odiseo_vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odiseo_vendor_channels ADD CONSTRAINT FK_42A3C6D272F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id)');
        $this->addSql('ALTER TABLE odiseo_vendor_channels ADD CONSTRAINT FK_42A3C6D2F603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id)');
        $this->addSql('ALTER TABLE sylius_admin_user ADD vendor_id INT DEFAULT NULL, ADD administration_role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_admin_user ADD CONSTRAINT FK_88D5CC4DF603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id)');
        $this->addSql('ALTER TABLE sylius_admin_user ADD CONSTRAINT FK_88D5CC4D913437BF FOREIGN KEY (administration_role_id) REFERENCES sylius_rbac_administration_role (id)');
        $this->addSql('CREATE INDEX IDX_88D5CC4DF603EE73 ON sylius_admin_user (vendor_id)');
        $this->addSql('CREATE INDEX IDX_88D5CC4D913437BF ON sylius_admin_user (administration_role_id)');
        $this->addSql('ALTER TABLE sylius_channel CHANGE customer_pool_id customer_pool_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_customer CHANGE customer_pool_id customer_pool_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_product ADD vendor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B74F603EE73 FOREIGN KEY (vendor_id) REFERENCES odiseo_vendor (id)');
        $this->addSql('CREATE INDEX IDX_677B9B74F603EE73 ON sylius_product (vendor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE odiseo_vendor_email DROP FOREIGN KEY FK_F58E945BF603EE73');
        $this->addSql('ALTER TABLE odiseo_vendor_image DROP FOREIGN KEY FK_D721EC707E3C61F9');
        $this->addSql('ALTER TABLE odiseo_vendor_payment DROP FOREIGN KEY FK_D1E5C436F603EE73');
        $this->addSql('ALTER TABLE odiseo_vendor_payment_method DROP FOREIGN KEY FK_987C877AF603EE73');
        $this->addSql('ALTER TABLE odiseo_vendor_translation DROP FOREIGN KEY FK_5F5AE1AB2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_admin_user DROP FOREIGN KEY FK_88D5CC4DF603EE73');
        $this->addSql('ALTER TABLE odiseo_vendor_channels DROP FOREIGN KEY FK_42A3C6D2F603EE73');
        $this->addSql('ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B74F603EE73');
        $this->addSql('ALTER TABLE odiseo_vendor_payment_method DROP FOREIGN KEY FK_987C877AF23D6140');
        $this->addSql('ALTER TABLE odiseo_vendor DROP FOREIGN KEY FK_B506F54FAF212FD0');
        $this->addSql('ALTER TABLE odiseo_vendor_payment DROP FOREIGN KEY FK_D1E5C43619883967');
        $this->addSql('ALTER TABLE odiseo_vendor DROP FOREIGN KEY FK_B506F54FE899029B');
        $this->addSql('ALTER TABLE sylius_admin_user DROP FOREIGN KEY FK_88D5CC4D913437BF');
        $this->addSql('DROP TABLE odiseo_vendor');
        $this->addSql('DROP TABLE odiseo_vendor_email');
        $this->addSql('DROP TABLE odiseo_vendor_gateway_config');
        $this->addSql('DROP TABLE odiseo_vendor_image');
        $this->addSql('DROP TABLE odiseo_vendor_payment');
        $this->addSql('DROP TABLE odiseo_vendor_payment_method');
        $this->addSql('DROP TABLE odiseo_vendor_plan');
        $this->addSql('DROP TABLE odiseo_vendor_translation');
        $this->addSql('DROP TABLE odiseo_vendor_channels');
        $this->addSql('DROP TABLE sylius_rbac_administration_role');
        $this->addSql('DROP INDEX IDX_88D5CC4DF603EE73 ON sylius_admin_user');
        $this->addSql('DROP INDEX IDX_88D5CC4D913437BF ON sylius_admin_user');
        $this->addSql('ALTER TABLE sylius_admin_user DROP vendor_id, DROP administration_role_id');
        $this->addSql('ALTER TABLE sylius_channel CHANGE customer_pool_id customer_pool_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_customer CHANGE customer_pool_id customer_pool_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_677B9B74F603EE73 ON sylius_product');
        $this->addSql('ALTER TABLE sylius_product DROP vendor_id');
    }
}
