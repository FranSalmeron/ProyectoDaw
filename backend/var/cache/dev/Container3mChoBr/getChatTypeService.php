<?php

namespace Container3mChoBr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChatTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\ChatType' shared autowired service.
     *
     * @return \App\Form\ChatType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/ChatType.php';

        return $container->privates['App\\Form\\ChatType'] = new \App\Form\ChatType();
    }
}
