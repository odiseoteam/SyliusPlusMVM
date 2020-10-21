<?php

declare(strict_types=1);

namespace App\Entity\Order;

use Doctrine\ORM\Mapping as ORM;
use Odiseo\SyliusVendorPlugin\Entity\VendorAwareInterface;
use Odiseo\SyliusVendorPlugin\Entity\VendorTrait;
use Sylius\Component\Order\Model\Adjustment as BaseAdjustment;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_adjustment")
 */
class Adjustment extends BaseAdjustment implements VendorAwareInterface
{
    use VendorTrait;
}
