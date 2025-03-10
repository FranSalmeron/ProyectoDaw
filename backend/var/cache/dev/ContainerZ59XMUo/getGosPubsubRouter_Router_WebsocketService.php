<?php

namespace ContainerZ59XMUo;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosPubsubRouter_Router_WebsocketService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'gos_pubsub_router.router.websocket' shared service.
     *
     * @return \Gos\Bundle\PubSubRouterBundle\Router\Router
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Matcher/MatcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Generator/GeneratorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Router/RouterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Router/Router.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/LoaderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/Loader.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/DelegatingLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/LoaderResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/LoaderResolver.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/CompatibilityLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/ClosureLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/ObjectLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/ContainerLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/FileLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/CompatibilityFileLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/GlobFileLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/PhpFileLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/XmlFileLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/gos/pubsub-router-bundle/src/Loader/YamlFileLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/FileLocatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/FileLocator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Config/FileLocator.php';

        $a = new \Symfony\Component\Config\Loader\LoaderResolver();

        $b = ($container->privates['file_locator'] ?? ($container->privates['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator(($container->services['kernel'] ?? $container->get('kernel', 1)))));

        $a->addLoader(new \Gos\Bundle\PubSubRouterBundle\Loader\ClosureLoader());
        $a->addLoader(new \Gos\Bundle\PubSubRouterBundle\Loader\ContainerLoader(($container->privates['api_platform.filter_locator'] ?? ($container->privates['api_platform.filter_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [], [])))));
        $a->addLoader(new \Gos\Bundle\PubSubRouterBundle\Loader\GlobFileLoader($b));
        $a->addLoader(new \Gos\Bundle\PubSubRouterBundle\Loader\PhpFileLoader($b));
        $a->addLoader(new \Gos\Bundle\PubSubRouterBundle\Loader\XmlFileLoader($b));
        $a->addLoader(new \Gos\Bundle\PubSubRouterBundle\Loader\YamlFileLoader($b));

        $container->privates['gos_pubsub_router.router.websocket'] = $instance = new \Gos\Bundle\PubSubRouterBundle\Router\Router('websocket', new \Symfony\Component\Config\Loader\DelegatingLoader($a), [], ['cache_dir' => $container->targetDir.'', 'debug' => true, 'generator_class' => 'Gos\\Bundle\\PubSubRouterBundle\\Generator\\CompiledGenerator', 'generator_dumper_class' => 'Gos\\Bundle\\PubSubRouterBundle\\Generator\\Dumper\\CompiledGeneratorDumper', 'matcher_class' => 'Gos\\Bundle\\PubSubRouterBundle\\Matcher\\CompiledMatcher', 'matcher_dumper_class' => 'Gos\\Bundle\\PubSubRouterBundle\\Matcher\\Dumper\\CompiledMatcherDumper']);

        $instance->setConfigCacheFactory(($container->privates['config_cache_factory'] ?? $container->getConfigCacheFactoryService()));

        return $instance;
    }
}
