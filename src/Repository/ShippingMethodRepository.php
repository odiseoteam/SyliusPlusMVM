<?php

declare(strict_types=1);

namespace App\Repository;

use Odiseo\SyliusMarketplacePlugin\Repository\ShippingMethodRepositoryInterface;
use Odiseo\SyliusMarketplacePlugin\Repository\ShippingMethodRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ShippingMethodRepository as BaseShippingMethodRepository;

class ShippingMethodRepository extends BaseShippingMethodRepository implements ShippingMethodRepositoryInterface
{
    use ShippingMethodRepositoryTrait;
}
