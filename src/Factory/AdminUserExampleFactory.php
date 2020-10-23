<?php

declare(strict_types=1);

namespace App\Factory;

use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Plus\Fixture\Factory\AdminUserExampleFactory as BaseAdminUserExampleFactory;
use Odiseo\SyliusRbacPlugin\Entity\AdministrationRoleInterface;
use Sylius\Plus\Rbac\Infrastructure\Doctrine\ORM\RoleRepositoryInterface;
use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class AdminUserExampleFactory extends BaseAdminUserExampleFactory implements ExampleFactoryInterface
{
    /** @var AdministrationRoleInterface $administrationRole */
    private $administrationRoleRepository;

    /** @var OptionsResolver */
    private $optionsResolver;

    public function __construct(
        FactoryInterface $userFactory,
        RepositoryInterface $administrationRoleRepository,
        string $localeCode,
        FileLocatorInterface $fileLocator,
        ImageUploaderInterface $imageUploader,
        ChannelRepositoryInterface $channelRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->administrationRoleRepository = $administrationRoleRepository;

        parent::__construct($userFactory, $channelRepository, $roleRepository, $fileLocator, $imageUploader, $localeCode);

        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefined('administration_role')
            ->setAllowedTypes('administration_role', ['string', AdministrationRoleInterface::class, 'null'])
            ->setNormalizer('administration_role', LazyOption::findOneBy($this->administrationRoleRepository, 'name'))
        ;
    }

    public function create(array $options = []): AdminUserInterface
    {
        $user = parent::create($options);

        $options = $this->optionsResolver->resolve($options);

        if (!isset($options['administration_role'])) {
            return $user;
        }

        $user->setAdministrationRole($options['administration_role']);

        return $user;
    }
}
