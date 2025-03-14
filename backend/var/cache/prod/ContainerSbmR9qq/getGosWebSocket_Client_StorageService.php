<?php

namespace ContainerSbmR9qq;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosWebSocket_Client_StorageService extends App_KernelProdContainer
{
    /*
     * Gets the private 'gos_web_socket.client.storage' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Client\ClientStorage
     *
     * @deprecated Since gos/web-socket-bundle 3.11: The "gos_web_socket.client.storage" service is deprecated and will be removed in GosWebSocketBundle 4.0.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('gos/web-socket-bundle', '3.11', 'The "gos_web_socket.client.storage" service is deprecated and will be removed in GosWebSocketBundle 4.0.');

        $container->privates['gos_web_socket.client.storage'] = $instance = new \Gos\Bundle\WebSocketBundle\Client\ClientStorage($container->load('getGosWebSocket_Client_Driver_InMemoryService'), 900);

        $instance->setLogger(($container->privates['monolog.logger.websocket'] ?? $container->load('getMonolog_Logger_WebsocketService')));

        return $instance;
    }
}
