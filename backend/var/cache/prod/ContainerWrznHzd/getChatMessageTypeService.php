<?php

namespace ContainerWrznHzd;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChatMessageTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\ChatMessageType' shared autowired service.
     *
     * @return \App\Form\ChatMessageType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Form\\ChatMessageType'] = new \App\Form\ChatMessageType();
    }
}
