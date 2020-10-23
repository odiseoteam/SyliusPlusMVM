<?php

declare(strict_types=1);

namespace App\Access\Checker;

use Odiseo\SyliusRbacPlugin\Access\Checker\RouteNameCheckerInterface;

final class HardcodedRouteNameChecker implements RouteNameCheckerInterface
{
    /**
     * @param string $routeName
     * @return bool
     */
    public function isAdminRoute(string $routeName): bool
    {
        return
            strpos($routeName, 'sylius_admin') !== false ||
            strpos($routeName, 'sylius_rbac_admin') !== false ||
            strpos($routeName, 'sylius_admin_admin_user') !== false ||
            strpos($routeName, 'sylius_plus_admin_role') !== false ||
            strpos($routeName, 'odiseo_sylius_marketplace_plugin_admin_vendor') !== false ||
            strpos($routeName, 'odiseo_sylius_vendor_plugin_admin_vendor') !== false
        ;
    }
}
