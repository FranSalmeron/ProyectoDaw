<?php

namespace ContainerWrznHzd;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCloudinaryServiceService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Service\CloudinaryService' shared autowired service.
     *
     * @return \App\Service\CloudinaryService
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Service\\CloudinaryService'] = new \App\Service\CloudinaryService($container->getEnv('CLOUDINARY_CLOUD_NAME'), $container->getEnv('CLOUDINARY_API_KEY'), $container->getEnv('CLOUDINARY_API_SECRET'));
    }
}
