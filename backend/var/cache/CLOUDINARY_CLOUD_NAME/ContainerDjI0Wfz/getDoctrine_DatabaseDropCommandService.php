<?php

namespace ContainerDjI0Wfz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_DatabaseDropCommandService extends App_KernelCLOUDINARY_CLOUD_NAMEContainer
{
    /*
     * Gets the private 'doctrine.database_drop_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['doctrine.database_drop_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand(($container->services['doctrine'] ?? $container->getDoctrineService()));

        $instance->setName('doctrine:database:drop');

        return $instance;
    }
}
