<?php

declare(strict_types=1);

namespace App\Entity\Promotion;

use Doctrine\ORM\Mapping as ORM;
use Odiseo\SyliusVendorPlugin\Entity\VendorAwareInterface;
use Odiseo\SyliusVendorPlugin\Entity\VendorTrait;
use Sylius\Component\Core\Model\Promotion as BasePromotion;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_promotion")
 */
class Promotion extends BasePromotion implements VendorAwareInterface
{
    use VendorTrait;
}
