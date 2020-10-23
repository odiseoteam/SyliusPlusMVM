<?php

declare(strict_types=1);

namespace App\Access\Checker;

use Odiseo\SyliusRbacPlugin\Access\Checker\AdministratorAccessCheckerInterface;
use Odiseo\SyliusRbacPlugin\Access\Model\AccessRequest;
use Sylius\Component\Core\Model\AdminUserInterface;

final class AdministratorAccessChecker implements AdministratorAccessCheckerInterface
{
    /** @var AdministratorAccessCheckerInterface */
    private $baseAdministratorAccessChecker;

    public function __construct(
        AdministratorAccessCheckerInterface $baseAdministratorAccessChecker
    ) {
        $this->baseAdministratorAccessChecker = $baseAdministratorAccessChecker;
    }

    /**
     * @param AdminUserInterface $admin
     * @param AccessRequest $accessRequest
     * @return bool
     */
    public function canAccessSection(AdminUserInterface $admin, AccessRequest $accessRequest): bool
    {
        return $this->baseAdministratorAccessChecker->canAccessSection($admin, $accessRequest);
    }
}
