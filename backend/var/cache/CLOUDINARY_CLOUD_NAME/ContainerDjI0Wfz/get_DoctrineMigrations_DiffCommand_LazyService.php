<?php

namespace ContainerDjI0Wfz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_DoctrineMigrations_DiffCommand_LazyService extends App_KernelCLOUDINARY_CLOUD_NAMEContainer
{
    /*
     * Gets the private '.doctrine_migrations.diff_command.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.doctrine_migrations.diff_command.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('doctrine:migrations:diff', [], 'Generate a migration by comparing your current database to your mapping information.', false, function () use ($container): \Doctrine\Migrations\Tools\Console\Command\DiffCommand {
            return ($container->privates['doctrine_migrations.diff_command'] ?? $container->load('getDoctrineMigrations_DiffCommandService'));
        });
    }
}
