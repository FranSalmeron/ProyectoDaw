<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Doctrine_Orm_QueryExtension_PaginationService extends App_KernelDevContainer
{
    /*
     * Gets the private 'api_platform.doctrine.orm.query_extension.pagination' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService());

        return $container->privates['api_platform.doctrine.orm.query_extension.pagination'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension(($container->services['doctrine'] ?? $container->getDoctrineService()), $a, new \ApiPlatform\Core\DataProvider\Pagination($a, $container->parameters['api_platform.collection.pagination'], $container->parameters['api_platform.graphql.collection.pagination']));
    }
}
