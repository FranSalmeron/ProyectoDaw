<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Maker_AutoCommand_MakeStateProvider_LazyService extends App_KernelDevContainer
{
    /*
     * Gets the private '.maker.auto_command.make_state_provider.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.maker.auto_command.make_state_provider.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('make:state-provider', [], 'Creates an API Platform state provider', false, function () use ($container): \Symfony\Bundle\MakerBundle\Command\MakerCommand {
            return ($container->privates['maker.auto_command.make_state_provider'] ?? $container->load('getMaker_AutoCommand_MakeStateProviderService'));
        });
    }
}
