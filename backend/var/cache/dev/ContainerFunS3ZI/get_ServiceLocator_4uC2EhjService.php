<?php

namespace ContainerFunS3ZI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_4uC2EhjService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.4uC2Ehj' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.4uC2Ehj'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'event_dispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
            'security.event_dispatcher.api' => ['privates', 'security.event_dispatcher.api', 'getSecurity_EventDispatcher_ApiService', true],
        ], [
            'event_dispatcher' => '?',
            'security.event_dispatcher.api' => 'Symfony\\Component\\EventDispatcher\\EventDispatcher',
        ]);
    }
}
