<?php

namespace ContainerSbmR9qq;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosWebSocket_Server_Application_WampService extends App_KernelProdContainer
{
    /*
     * Gets the private 'gos_web_socket.server.application.wamp' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\App\WampApplication
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->services['.container.private.gos_web_socket.dispatcher.topic'] ?? $container->load('get_Container_Private_GosWebSocket_Dispatcher_TopicService'));

        if (isset($container->privates['gos_web_socket.server.application.wamp'])) {
            return $container->privates['gos_web_socket.server.application.wamp'];
        }
        $b = ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService());

        if (isset($container->privates['gos_web_socket.server.application.wamp'])) {
            return $container->privates['gos_web_socket.server.application.wamp'];
        }
        $c = new \Gos\Bundle\WebSocketBundle\Router\WampRouter(($container->privates['gos_pubsub_router.router.websocket'] ?? $container->load('getGosPubsubRouter_Router_WebsocketService')));

        $d = ($container->privates['monolog.logger.websocket'] ?? $container->load('getMonolog_Logger_WebsocketService'));

        $c->setLogger($d);

        $container->privates['gos_web_socket.server.application.wamp'] = $instance = new \Gos\Bundle\WebSocketBundle\Server\App\WampApplication(($container->services['.container.private.gos_web_socket.dispatcher.rpc'] ?? $container->load('get_Container_Private_GosWebSocket_Dispatcher_RpcService')), $a, $b, ($container->privates['gos_web_socket.client.storage'] ?? $container->load('getGosWebSocket_Client_StorageService')), $c);

        $instance->setLogger($d);

        return $instance;
    }
}
