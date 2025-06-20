<?php

namespace ContainerWrznHzd;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getArgumentResolver_ServiceService extends App_KernelProdContainer
{
    /*
     * Gets the private 'argument_resolver.service' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['argument_resolver.service'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\CarController::delete' => ['privates', '.service_locator.BA3xq_G', 'get_ServiceLocator_BA3xqGService', true],
            'App\\Controller\\CarController::edit' => ['privates', '.service_locator.BA3xq_G', 'get_ServiceLocator_BA3xqGService', true],
            'App\\Controller\\CarController::index' => ['privates', '.service_locator.hIoLI2S', 'get_ServiceLocator_HIoLI2SService', true],
            'App\\Controller\\CarController::indexByUser' => ['privates', '.service_locator.hIoLI2S', 'get_ServiceLocator_HIoLI2SService', true],
            'App\\Controller\\CarController::new' => ['privates', '.service_locator.oZJDMQi', 'get_ServiceLocator_OZJDMQiService', true],
            'App\\Controller\\CarController::showById' => ['privates', '.service_locator.hIoLI2S', 'get_ServiceLocator_HIoLI2SService', true],
            'App\\Controller\\CarFavoriteController::delete' => ['privates', '.service_locator..TQpnPv', 'get_ServiceLocator__TQpnPvService', true],
            'App\\Controller\\CarFavoriteController::edit' => ['privates', '.service_locator.6JWk_Yv', 'get_ServiceLocator_6JWkYvService', true],
            'App\\Controller\\CarFavoriteController::getUserFavorites' => ['privates', '.service_locator.TuQ5fRx', 'get_ServiceLocator_TuQ5fRxService', true],
            'App\\Controller\\CarFavoriteController::index' => ['privates', '.service_locator.TuQ5fRx', 'get_ServiceLocator_TuQ5fRxService', true],
            'App\\Controller\\CarFavoriteController::new' => ['privates', '.service_locator.Y5b4pHg', 'get_ServiceLocator_Y5b4pHgService', true],
            'App\\Controller\\CarFavoriteController::show' => ['privates', '.service_locator.162ian2', 'get_ServiceLocator_162ian2Service', true],
            'App\\Controller\\ChatController::createChat' => ['privates', '.service_locator.PLZrMx9', 'get_ServiceLocator_PLZrMx9Service', true],
            'App\\Controller\\ChatController::delete' => ['privates', '.service_locator.uWQT4Qu', 'get_ServiceLocator_UWQT4QuService', true],
            'App\\Controller\\ChatController::getUserChats' => ['privates', '.service_locator.zRENt0_', 'get_ServiceLocator_ZRENt0Service', true],
            'App\\Controller\\ChatController::show' => ['privates', '.service_locator.zRENt0_', 'get_ServiceLocator_ZRENt0Service', true],
            'App\\Controller\\ChatMessageController::loadMessages' => ['privates', '.service_locator.Wv2AWrw', 'get_ServiceLocator_Wv2AWrwService', true],
            'App\\Controller\\ChatMessageController::sendMessage' => ['privates', '.service_locator.vQ105EG', 'get_ServiceLocator_VQ105EGService', true],
            'App\\Controller\\ChatMessageController::show' => ['privates', '.service_locator.HKN.4cP', 'get_ServiceLocator_HKN_4cPService', true],
            'App\\Controller\\TransactionController::delete' => ['privates', '.service_locator.Dhg828p', 'get_ServiceLocator_Dhg828pService', true],
            'App\\Controller\\TransactionController::edit' => ['privates', '.service_locator.Dhg828p', 'get_ServiceLocator_Dhg828pService', true],
            'App\\Controller\\TransactionController::new' => ['privates', '.service_locator._nS7eWw', 'get_ServiceLocator_NS7eWwService', true],
            'App\\Controller\\TransactionController::show' => ['privates', '.service_locator.3PHq.pi', 'get_ServiceLocator_3PHq_PiService', true],
            'App\\Controller\\TransactionController::statistics' => ['privates', '.service_locator.xu0jtj3', 'get_ServiceLocator_Xu0jtj3Service', true],
            'App\\Controller\\UserController::changePassword' => ['privates', '.service_locator.akmE0pX', 'get_ServiceLocator_AkmE0pXService', true],
            'App\\Controller\\UserController::delete' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Controller\\UserController::edit' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Controller\\UserController::getUserInfo' => ['privates', '.service_locator.Q1F27w5', 'get_ServiceLocator_Q1F27w5Service', true],
            'App\\Controller\\UserController::index' => ['privates', '.service_locator.Q1F27w5', 'get_ServiceLocator_Q1F27w5Service', true],
            'App\\Controller\\UserController::new' => ['privates', '.service_locator.mK6IRPJ', 'get_ServiceLocator_MK6IRPJService', true],
            'App\\Controller\\UserController::prueba' => ['privates', '.service_locator.Q1F27w5', 'get_ServiceLocator_Q1F27w5Service', true],
            'App\\Controller\\UserController::show' => ['privates', '.service_locator.4T4EJFR', 'get_ServiceLocator_4T4EJFRService', true],
            'App\\Controller\\UserController::toggleAdmin' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Controller\\UserController::toggleBanned' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Controller\\CarController:delete' => ['privates', '.service_locator.BA3xq_G', 'get_ServiceLocator_BA3xqGService', true],
            'App\\Controller\\CarController:edit' => ['privates', '.service_locator.BA3xq_G', 'get_ServiceLocator_BA3xqGService', true],
            'App\\Controller\\CarController:index' => ['privates', '.service_locator.hIoLI2S', 'get_ServiceLocator_HIoLI2SService', true],
            'App\\Controller\\CarController:indexByUser' => ['privates', '.service_locator.hIoLI2S', 'get_ServiceLocator_HIoLI2SService', true],
            'App\\Controller\\CarController:new' => ['privates', '.service_locator.oZJDMQi', 'get_ServiceLocator_OZJDMQiService', true],
            'App\\Controller\\CarController:showById' => ['privates', '.service_locator.hIoLI2S', 'get_ServiceLocator_HIoLI2SService', true],
            'App\\Controller\\CarFavoriteController:delete' => ['privates', '.service_locator..TQpnPv', 'get_ServiceLocator__TQpnPvService', true],
            'App\\Controller\\CarFavoriteController:edit' => ['privates', '.service_locator.6JWk_Yv', 'get_ServiceLocator_6JWkYvService', true],
            'App\\Controller\\CarFavoriteController:getUserFavorites' => ['privates', '.service_locator.TuQ5fRx', 'get_ServiceLocator_TuQ5fRxService', true],
            'App\\Controller\\CarFavoriteController:index' => ['privates', '.service_locator.TuQ5fRx', 'get_ServiceLocator_TuQ5fRxService', true],
            'App\\Controller\\CarFavoriteController:new' => ['privates', '.service_locator.Y5b4pHg', 'get_ServiceLocator_Y5b4pHgService', true],
            'App\\Controller\\CarFavoriteController:show' => ['privates', '.service_locator.162ian2', 'get_ServiceLocator_162ian2Service', true],
            'App\\Controller\\ChatController:createChat' => ['privates', '.service_locator.PLZrMx9', 'get_ServiceLocator_PLZrMx9Service', true],
            'App\\Controller\\ChatController:delete' => ['privates', '.service_locator.uWQT4Qu', 'get_ServiceLocator_UWQT4QuService', true],
            'App\\Controller\\ChatController:getUserChats' => ['privates', '.service_locator.zRENt0_', 'get_ServiceLocator_ZRENt0Service', true],
            'App\\Controller\\ChatController:show' => ['privates', '.service_locator.zRENt0_', 'get_ServiceLocator_ZRENt0Service', true],
            'App\\Controller\\ChatMessageController:loadMessages' => ['privates', '.service_locator.Wv2AWrw', 'get_ServiceLocator_Wv2AWrwService', true],
            'App\\Controller\\ChatMessageController:sendMessage' => ['privates', '.service_locator.vQ105EG', 'get_ServiceLocator_VQ105EGService', true],
            'App\\Controller\\ChatMessageController:show' => ['privates', '.service_locator.HKN.4cP', 'get_ServiceLocator_HKN_4cPService', true],
            'App\\Controller\\TransactionController:delete' => ['privates', '.service_locator.Dhg828p', 'get_ServiceLocator_Dhg828pService', true],
            'App\\Controller\\TransactionController:edit' => ['privates', '.service_locator.Dhg828p', 'get_ServiceLocator_Dhg828pService', true],
            'App\\Controller\\TransactionController:new' => ['privates', '.service_locator._nS7eWw', 'get_ServiceLocator_NS7eWwService', true],
            'App\\Controller\\TransactionController:show' => ['privates', '.service_locator.3PHq.pi', 'get_ServiceLocator_3PHq_PiService', true],
            'App\\Controller\\TransactionController:statistics' => ['privates', '.service_locator.xu0jtj3', 'get_ServiceLocator_Xu0jtj3Service', true],
            'App\\Controller\\UserController:changePassword' => ['privates', '.service_locator.akmE0pX', 'get_ServiceLocator_AkmE0pXService', true],
            'App\\Controller\\UserController:delete' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Controller\\UserController:edit' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Controller\\UserController:getUserInfo' => ['privates', '.service_locator.Q1F27w5', 'get_ServiceLocator_Q1F27w5Service', true],
            'App\\Controller\\UserController:index' => ['privates', '.service_locator.Q1F27w5', 'get_ServiceLocator_Q1F27w5Service', true],
            'App\\Controller\\UserController:new' => ['privates', '.service_locator.mK6IRPJ', 'get_ServiceLocator_MK6IRPJService', true],
            'App\\Controller\\UserController:prueba' => ['privates', '.service_locator.Q1F27w5', 'get_ServiceLocator_Q1F27w5Service', true],
            'App\\Controller\\UserController:show' => ['privates', '.service_locator.4T4EJFR', 'get_ServiceLocator_4T4EJFRService', true],
            'App\\Controller\\UserController:toggleAdmin' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'App\\Controller\\UserController:toggleBanned' => ['privates', '.service_locator.GPGtF8v', 'get_ServiceLocator_GPGtF8vService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
        ], [
            'App\\Controller\\CarController::delete' => '?',
            'App\\Controller\\CarController::edit' => '?',
            'App\\Controller\\CarController::index' => '?',
            'App\\Controller\\CarController::indexByUser' => '?',
            'App\\Controller\\CarController::new' => '?',
            'App\\Controller\\CarController::showById' => '?',
            'App\\Controller\\CarFavoriteController::delete' => '?',
            'App\\Controller\\CarFavoriteController::edit' => '?',
            'App\\Controller\\CarFavoriteController::getUserFavorites' => '?',
            'App\\Controller\\CarFavoriteController::index' => '?',
            'App\\Controller\\CarFavoriteController::new' => '?',
            'App\\Controller\\CarFavoriteController::show' => '?',
            'App\\Controller\\ChatController::createChat' => '?',
            'App\\Controller\\ChatController::delete' => '?',
            'App\\Controller\\ChatController::getUserChats' => '?',
            'App\\Controller\\ChatController::show' => '?',
            'App\\Controller\\ChatMessageController::loadMessages' => '?',
            'App\\Controller\\ChatMessageController::sendMessage' => '?',
            'App\\Controller\\ChatMessageController::show' => '?',
            'App\\Controller\\TransactionController::delete' => '?',
            'App\\Controller\\TransactionController::edit' => '?',
            'App\\Controller\\TransactionController::new' => '?',
            'App\\Controller\\TransactionController::show' => '?',
            'App\\Controller\\TransactionController::statistics' => '?',
            'App\\Controller\\UserController::changePassword' => '?',
            'App\\Controller\\UserController::delete' => '?',
            'App\\Controller\\UserController::edit' => '?',
            'App\\Controller\\UserController::getUserInfo' => '?',
            'App\\Controller\\UserController::index' => '?',
            'App\\Controller\\UserController::new' => '?',
            'App\\Controller\\UserController::prueba' => '?',
            'App\\Controller\\UserController::show' => '?',
            'App\\Controller\\UserController::toggleAdmin' => '?',
            'App\\Controller\\UserController::toggleBanned' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\CarController:delete' => '?',
            'App\\Controller\\CarController:edit' => '?',
            'App\\Controller\\CarController:index' => '?',
            'App\\Controller\\CarController:indexByUser' => '?',
            'App\\Controller\\CarController:new' => '?',
            'App\\Controller\\CarController:showById' => '?',
            'App\\Controller\\CarFavoriteController:delete' => '?',
            'App\\Controller\\CarFavoriteController:edit' => '?',
            'App\\Controller\\CarFavoriteController:getUserFavorites' => '?',
            'App\\Controller\\CarFavoriteController:index' => '?',
            'App\\Controller\\CarFavoriteController:new' => '?',
            'App\\Controller\\CarFavoriteController:show' => '?',
            'App\\Controller\\ChatController:createChat' => '?',
            'App\\Controller\\ChatController:delete' => '?',
            'App\\Controller\\ChatController:getUserChats' => '?',
            'App\\Controller\\ChatController:show' => '?',
            'App\\Controller\\ChatMessageController:loadMessages' => '?',
            'App\\Controller\\ChatMessageController:sendMessage' => '?',
            'App\\Controller\\ChatMessageController:show' => '?',
            'App\\Controller\\TransactionController:delete' => '?',
            'App\\Controller\\TransactionController:edit' => '?',
            'App\\Controller\\TransactionController:new' => '?',
            'App\\Controller\\TransactionController:show' => '?',
            'App\\Controller\\TransactionController:statistics' => '?',
            'App\\Controller\\UserController:changePassword' => '?',
            'App\\Controller\\UserController:delete' => '?',
            'App\\Controller\\UserController:edit' => '?',
            'App\\Controller\\UserController:getUserInfo' => '?',
            'App\\Controller\\UserController:index' => '?',
            'App\\Controller\\UserController:new' => '?',
            'App\\Controller\\UserController:prueba' => '?',
            'App\\Controller\\UserController:show' => '?',
            'App\\Controller\\UserController:toggleAdmin' => '?',
            'App\\Controller\\UserController:toggleBanned' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]));
    }
}
