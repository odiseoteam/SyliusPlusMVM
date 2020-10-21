<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;
use Sylius\Plus\Entity\ProductVariantInterface;
use Sylius\Plus\Entity\ProductVariantTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_variant")
 */
class ProductVariant extends BaseProductVariant implements ProductVariantInterface
{
    use ProductVariantTrait {
        __construct as private initializeProductVariantTrait;
    }

    public function __construct()
    {
        parent::__construct();

        $this->initializeProductVariantTrait();
    }

    protected function createTranslation(): ProductVariantTranslationInterface
    {
        return new ProductVariantTranslation();
    }
}
