<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_UpgradeResource_CommandService extends App_KernelDevContainer
{
    /*
     * Gets the private 'api_platform.upgrade_resource.command' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Bundle\Command\UpgradeApiResourceCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['api_platform.upgrade_resource.command'] = $instance = new \ApiPlatform\Core\Bridge\Symfony\Bundle\Command\UpgradeApiResourceCommand(($container->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), ($container->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($container->privates['api_platform.subresource_operation_factory.cached'] ?? $container->getApiPlatform_SubresourceOperationFactory_CachedService()), new \ApiPlatform\Core\Upgrade\SubresourceTransformer(), ($container->privates['api_platform.identifiers_extractor.cached'] ?? $container->getApiPlatform_IdentifiersExtractor_CachedService()), ($container->privates['annotations.reader'] ?? $container->getAnnotations_ReaderService()));

        $instance->setName('api:upgrade-resource');

        return $instance;
    }
}
