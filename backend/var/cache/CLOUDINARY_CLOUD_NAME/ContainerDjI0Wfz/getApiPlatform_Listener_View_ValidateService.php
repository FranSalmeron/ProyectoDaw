<?php

namespace ContainerDjI0Wfz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Listener_View_ValidateService extends App_KernelCLOUDINARY_CLOUD_NAMEContainer
{
    /*
     * Gets the private 'api_platform.listener.view.validate' shared service.
     *
     * @return \ApiPlatform\Symfony\EventListener\ValidateListener
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['api_platform.listener.view.validate'] = new \ApiPlatform\Symfony\EventListener\ValidateListener(new \ApiPlatform\Symfony\Validator\Validator(($container->privates['validator'] ?? $container->getValidatorService()), $container), ($container->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }
}
