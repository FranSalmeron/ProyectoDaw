<?php

namespace Container3mChoBr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChatMessageControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ChatMessageController' shared autowired service.
     *
     * @return \App\Controller\ChatMessageController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ChatMessageController.php';

        $container->services['App\\Controller\\ChatMessageController'] = $instance = new \App\Controller\ChatMessageController(($container->services['messenger.default_bus'] ?? $container->getMessenger_DefaultBusService()), ($container->services['cache.app'] ?? $container->getCache_AppService()), ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        $instance->setContainer(($container->privates['.service_locator.jIxfAsi'] ?? $container->load('get_ServiceLocator_JIxfAsiService'))->withContext('App\\Controller\\ChatMessageController', $container));

        return $instance;
    }
}
