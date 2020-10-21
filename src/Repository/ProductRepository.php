<?php

declare(strict_types=1);

namespace App\Repository;

use Odiseo\SyliusMarketplacePlugin\Repository\ProductRepositoryInterface;
use Odiseo\SyliusMarketplacePlugin\Repository\ProductRepositoryTrait;
use Sylius\Plus\Doctrine\ORM\ProductRepository as BaseProductRepository;

class ProductRepository extends BaseProductRepository implements ProductRepositoryInterface
{
    use ProductRepositoryTrait;
}
