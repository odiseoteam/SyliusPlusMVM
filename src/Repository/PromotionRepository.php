<?php

declare(strict_types=1);

namespace App\Repository;

use Odiseo\SyliusMarketplacePlugin\Repository\PromotionRepositoryInterface;
use Odiseo\SyliusMarketplacePlugin\Repository\PromotionRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\PromotionRepository as BasePromotionRepository;

class PromotionRepository extends BasePromotionRepository implements PromotionRepositoryInterface
{
    use PromotionRepositoryTrait;
}
