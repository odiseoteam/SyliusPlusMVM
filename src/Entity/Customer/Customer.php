<?php

declare(strict_types=1);

namespace App\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Customer as BaseCustomer;
use Sylius\Plus\Entity\CustomerInterface;
use Sylius\Plus\Entity\CustomerTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_customer")
 */
class Customer extends BaseCustomer implements CustomerInterface
{
    use CustomerTrait;
}
