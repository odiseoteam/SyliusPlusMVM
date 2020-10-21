<?php

declare(strict_types=1);

namespace App\Entity\User;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Odiseo\SyliusRbacPlugin\Entity\AdministrationRoleAwareInterface;
use Odiseo\SyliusRbacPlugin\Entity\AdministrationRoleAwareTrait;
use Odiseo\SyliusVendorPlugin\Entity\VendorAwareInterface;
use Odiseo\SyliusVendorPlugin\Entity\VendorTrait;
use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;
use Sylius\Plus\Entity\AdminUserInterface;
use Sylius\Plus\Entity\AdminUserTrait;
use Sylius\Plus\Rbac\Domain\Model\RoleableTrait;
use Sylius\Plus\Rbac\Domain\Model\ToggleablePermissionCheckerTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_admin_user")
 */
class AdminUser extends BaseAdminUser implements AdminUserInterface, AdministrationRoleAwareInterface, VendorAwareInterface
{
    use AdminUserTrait;
    use ToggleablePermissionCheckerTrait;
    use RoleableTrait;
    use AdministrationRoleAwareTrait;
    use VendorTrait;

    public function __construct()
    {
        parent::__construct();

        $this->rolesResources = new ArrayCollection();
    }
}
