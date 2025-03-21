<?php

namespace ContainerSbmR9qq;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Server_LauncherService extends App_KernelProdContainer
{
    /*
     * Gets the public '.container.private.gos_web_socket.server.launcher' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\ServerLauncher
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['.container.private.gos_web_socket.server.launcher'] = new \Gos\Bundle\WebSocketBundle\Server\ServerLauncher(($container->services['.container.private.gos_web_socket.registry.server'] ?? $container->load('get_Container_Private_GosWebSocket_Registry_ServerService')));
    }
}
