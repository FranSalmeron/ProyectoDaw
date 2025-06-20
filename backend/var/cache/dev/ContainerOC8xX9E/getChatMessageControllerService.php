<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChatMessageControllerService extends App_KernelDevContainer
{
    /*
     * Gets the public 'App\Controller\ChatMessageController' shared autowired service.
     *
     * @return \App\Controller\ChatMessageController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\ChatMessageController'] = $instance = new \App\Controller\ChatMessageController(($container->services['cache.app'] ?? $container->load('getCache_AppService')), ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        $instance->setContainer(($container->privates['.service_locator.jIxfAsi'] ?? $container->load('get_ServiceLocator_JIxfAsiService'))->withContext('App\\Controller\\ChatMessageController', $container));

        return $instance;
    }
}
