<?php

namespace ContainerDjI0Wfz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Listener_ExceptionService extends App_KernelCLOUDINARY_CLOUD_NAMEContainer
{
    /*
     * Gets the private 'api_platform.listener.exception' shared service.
     *
     * @return \ApiPlatform\Symfony\EventListener\ExceptionListener
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['api_platform.listener.exception'] = new \ApiPlatform\Symfony\EventListener\ExceptionListener('api_platform.action.exception', ($container->privates['monolog.logger.request'] ?? $container->getMonolog_Logger_RequestService()), false, new \ApiPlatform\Symfony\EventListener\ErrorListener('api_platform.action.exception', ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()), false));
    }
}
