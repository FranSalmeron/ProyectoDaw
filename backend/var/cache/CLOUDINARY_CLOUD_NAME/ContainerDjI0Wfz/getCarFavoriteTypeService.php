<?php

namespace ContainerDjI0Wfz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCarFavoriteTypeService extends App_KernelCLOUDINARY_CLOUD_NAMEContainer
{
    /*
     * Gets the private 'App\Form\CarFavoriteType' shared autowired service.
     *
     * @return \App\Form\CarFavoriteType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Form\\CarFavoriteType'] = new \App\Form\CarFavoriteType();
    }
}
