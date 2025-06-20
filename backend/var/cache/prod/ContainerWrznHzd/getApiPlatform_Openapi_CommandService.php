<?php

namespace ContainerWrznHzd;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Openapi_CommandService extends App_KernelProdContainer
{
    /*
     * Gets the private 'api_platform.openapi.command' shared service.
     *
     * @return \ApiPlatform\Symfony\Bundle\Command\OpenApiCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['api_platform.openapi.command'] = $instance = new \ApiPlatform\Symfony\Bundle\Command\OpenApiCommand(($container->privates['api_platform.openapi.factory.legacy'] ?? $container->load('getApiPlatform_Openapi_Factory_LegacyService')), ($container->privates['serializer'] ?? $container->getSerializerService()));

        $instance->setName('api:openapi:export');

        return $instance;
    }
}
