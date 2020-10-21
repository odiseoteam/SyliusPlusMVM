<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021152018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_channel CHANGE customer_pool_id customer_pool_id INT NULL');
        $this->addSql('ALTER TABLE sylius_customer CHANGE customer_pool_id customer_pool_id INT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_channel CHANGE customer_pool_id customer_pool_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_customer CHANGE customer_pool_id customer_pool_id INT NOT NULL');
    }
}
