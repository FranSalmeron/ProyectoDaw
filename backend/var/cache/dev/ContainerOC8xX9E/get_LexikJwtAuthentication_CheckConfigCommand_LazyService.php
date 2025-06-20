<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_LexikJwtAuthentication_CheckConfigCommand_LazyService extends App_KernelDevContainer
{
    /*
     * Gets the private '.lexik_jwt_authentication.check_config_command.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.lexik_jwt_authentication.check_config_command.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('lexik:jwt:check-config', [], 'Checks that the bundle is properly configured.', false, function () use ($container): \Lexik\Bundle\JWTAuthenticationBundle\Command\CheckConfigCommand {
            return ($container->privates['lexik_jwt_authentication.check_config_command'] ?? $container->load('getLexikJwtAuthentication_CheckConfigCommandService'));
        });
    }
}
