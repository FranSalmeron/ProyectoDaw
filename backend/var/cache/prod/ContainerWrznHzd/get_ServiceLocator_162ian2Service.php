<?php

namespace ContainerWrznHzd;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_162ian2Service extends App_KernelProdContainer
{
    /*
     * Gets the private '.service_locator.162ian2' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.162ian2'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'carFavorite' => ['privates', '.errored..service_locator.162ian2.App\\Entity\\CarFavorite', NULL, 'Cannot autowire service ".service_locator.162ian2": it references class "App\\Entity\\CarFavorite" but no such service exists.'],
        ], [
            'carFavorite' => 'App\\Entity\\CarFavorite',
        ]);
    }
}
