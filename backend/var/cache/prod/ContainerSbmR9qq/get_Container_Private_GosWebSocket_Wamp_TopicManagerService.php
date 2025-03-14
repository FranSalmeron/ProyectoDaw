<?php

namespace ContainerSbmR9qq;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Wamp_TopicManagerService extends App_KernelProdContainer
{
    /*
     * Gets the public '.container.private.gos_web_socket.wamp.topic_manager' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Topic\TopicManager
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['.container.private.gos_web_socket.wamp.topic_manager'] = $instance = new \Gos\Bundle\WebSocketBundle\Topic\TopicManager();

        $instance->setWampApplication(($container->privates['gos_web_socket.server.application.wamp'] ?? $container->load('getGosWebSocket_Server_Application_WampService')));

        return $instance;
    }
}
