<?php

declare(strict_types=1);

namespace App\Entity\Shipping;

use Doctrine\ORM\Mapping as ORM;
use Odiseo\SyliusVendorPlugin\Entity\VendorAwareInterface;
use Odiseo\SyliusVendorPlugin\Entity\VendorTrait;
use Sylius\Component\Core\Model\ShippingMethod as BaseShippingMethod;
use Sylius\Component\Shipping\Model\ShippingMethodTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_shipping_method")
 */
class ShippingMethod extends BaseShippingMethod implements VendorAwareInterface
{
    use VendorTrait;

    protected function createTranslation(): ShippingMethodTranslationInterface
    {
        return new ShippingMethodTranslation();
    }
}
