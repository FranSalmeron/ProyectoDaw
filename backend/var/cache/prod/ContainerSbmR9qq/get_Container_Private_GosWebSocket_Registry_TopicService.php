<?php

namespace ContainerSbmR9qq;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Registry_TopicService extends App_KernelProdContainer
{
    /*
     * Gets the public '.container.private.gos_web_socket.registry.topic' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\App\Registry\TopicRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['.container.private.gos_web_socket.registry.topic'] = $instance = new \Gos\Bundle\WebSocketBundle\Server\App\Registry\TopicRegistry();

        $instance->addTopic(new \App\WebSocket\ChatHub());

        return $instance;
    }
}
