<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Y5b4pHgService extends App_KernelDevContainer
{
    /*
     * Gets the private '.service_locator.Y5b4pHg' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Y5b4pHg'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'carFavoriteRepository' => ['privates', 'App\\Repository\\CarFavoriteRepository', 'getCarFavoriteRepositoryService', true],
            'carRepository' => ['privates', 'App\\Repository\\CarRepository', 'getCarRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'userRepository' => ['services', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'carFavoriteRepository' => 'App\\Repository\\CarFavoriteRepository',
            'carRepository' => 'App\\Repository\\CarRepository',
            'entityManager' => '?',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]);
    }
}
