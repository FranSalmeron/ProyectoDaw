<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZRENt0Service extends App_KernelDevContainer
{
    /*
     * Gets the private '.service_locator.zRENt0_' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.zRENt0_'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'chatRepository' => ['privates', 'App\\Repository\\ChatRepository', 'getChatRepositoryService', true],
        ], [
            'chatRepository' => 'App\\Repository\\ChatRepository',
        ]);
    }
}
