<?php

namespace ContainerVkfqJT7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosWebSocket_DataCollector_WebsocketService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'gos_web_socket.data_collector.websocket' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\DataCollector\WebsocketDataCollector
     *
     * @deprecated Since gos/web-socket-bundle 3.1: The "gos_web_socket.data_collector.websocket" service is deprecated and will be removed in GosWebSocketBundle 4.0.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('gos/web-socket-bundle', '3.1', 'The "gos_web_socket.data_collector.websocket" service is deprecated and will be removed in GosWebSocketBundle 4.0.');

        return new \Gos\Bundle\WebSocketBundle\DataCollector\WebsocketDataCollector();
    }
}
