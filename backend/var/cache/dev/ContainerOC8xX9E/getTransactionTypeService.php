<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTransactionTypeService extends App_KernelDevContainer
{
    /*
     * Gets the private 'App\Form\TransactionType' shared autowired service.
     *
     * @return \App\Form\TransactionType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Form\\TransactionType'] = new \App\Form\TransactionType();
    }
}
