<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Messenger_DataPersisterService extends App_KernelDevContainer
{
    /*
     * Gets the private 'api_platform.messenger.data_persister' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Messenger\DataPersister
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->services['messenger.default_bus'] ?? $container->getMessenger_DefaultBusService());

        if (isset($container->privates['api_platform.messenger.data_persister'])) {
            return $container->privates['api_platform.messenger.data_persister'];
        }

        return $container->privates['api_platform.messenger.data_persister'] = new \ApiPlatform\Core\Bridge\Symfony\Messenger\DataPersister(($container->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), $a);
    }
}
