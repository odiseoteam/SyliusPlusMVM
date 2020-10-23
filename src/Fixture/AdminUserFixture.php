<?php

declare(strict_types=1);

namespace App\Fixture;

use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Sylius\Plus\Fixture\AdminUserFixture as BaseAdminUserFixture;

class AdminUserFixture extends BaseAdminUserFixture implements FixtureInterface
{
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        parent::configureResourceNode($resourceNode);

        $resourceNode
            ->children()
            ->scalarNode('administration_role')->cannotBeEmpty()->end()
            ->scalarNode('channel')->cannotBeEmpty()->end()
            ->arrayNode('roles')->scalarPrototype()->end()->end()
            ->booleanNode('enable_permission_checker')->end()
        ;
    }

    public function getName(): string
    {
        return 'admin_user';
    }
}
