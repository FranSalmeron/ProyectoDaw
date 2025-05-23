<?php

namespace Container3mChoBr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCarFavoriteControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\CarFavoriteController' shared autowired service.
     *
     * @return \App\Controller\CarFavoriteController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/CarFavoriteController.php';

        $container->services['App\\Controller\\CarFavoriteController'] = $instance = new \App\Controller\CarFavoriteController();

        $instance->setContainer(($container->privates['.service_locator.jIxfAsi'] ?? $container->load('get_ServiceLocator_JIxfAsiService'))->withContext('App\\Controller\\CarFavoriteController', $container));

        return $instance;
    }
}
