<?php

namespace ContainerWrznHzd;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Repository\UserRepository' shared autowired service.
     *
     * @return \App\Repository\UserRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['App\\Repository\\UserRepository'] = new \App\Repository\UserRepository(($container->services['doctrine'] ?? $container->getDoctrineService()));
    }
}
