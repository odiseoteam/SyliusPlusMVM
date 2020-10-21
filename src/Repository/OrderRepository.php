<?php

declare(strict_types=1);

namespace App\Repository;

use Odiseo\SyliusMarketplacePlugin\Repository\OrderRepositoryInterface;
use Odiseo\SyliusMarketplacePlugin\Repository\OrderRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository as BaseOrderRepository;

class OrderRepository extends BaseOrderRepository implements OrderRepositoryInterface
{
    use OrderRepositoryTrait;
}
