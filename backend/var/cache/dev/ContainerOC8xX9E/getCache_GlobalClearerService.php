<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_GlobalClearerService extends App_KernelDevContainer
{
    /*
     * Gets the public 'cache.global_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache.global_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(['cache.app' => ($container->services['cache.app'] ?? $container->load('getCache_AppService')), 'cache.system' => ($container->services['cache.system'] ?? $container->load('getCache_SystemService')), 'cache.validator' => ($container->privates['cache.validator'] ?? $container->getCache_ValidatorService()), 'cache.serializer' => ($container->privates['cache.serializer'] ?? $container->getCache_SerializerService()), 'cache.annotations' => ($container->privates['cache.annotations'] ?? $container->getCache_AnnotationsService()), 'cache.property_info' => ($container->privates['cache.property_info'] ?? $container->getCache_PropertyInfoService()), 'cache.messenger.restart_workers_signal' => ($container->privates['cache.messenger.restart_workers_signal'] ?? $container->load('getCache_Messenger_RestartWorkersSignalService')), 'cache.property_access' => ($container->privates['cache.property_access'] ?? $container->getCache_PropertyAccessService()), 'cache.validator_expression_language' => ($container->services['cache.validator_expression_language'] ?? $container->load('getCache_ValidatorExpressionLanguageService')), 'cache.doctrine.orm.default.result' => ($container->privates['cache.doctrine.orm.default.result'] ?? ($container->privates['cache.doctrine.orm.default.result'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())), 'cache.doctrine.orm.default.query' => ($container->privates['cache.doctrine.orm.default.query'] ?? ($container->privates['cache.doctrine.orm.default.query'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())), 'cache.security_expression_language' => ($container->privates['cache.security_expression_language'] ?? $container->getCache_SecurityExpressionLanguageService()), 'api_platform.cache.route_name_resolver' => ($container->privates['api_platform.cache.route_name_resolver'] ?? $container->load('getApiPlatform_Cache_RouteNameResolverService')), 'api_platform.cache.metadata.resource' => ($container->privates['api_platform.cache.metadata.resource'] ?? $container->getApiPlatform_Cache_Metadata_ResourceService()), 'api_platform.cache.metadata.resource.legacy' => ($container->privates['api_platform.cache.metadata.resource.legacy'] ?? $container->getApiPlatform_Cache_Metadata_Resource_LegacyService()), 'api_platform.cache.metadata.property.legacy' => ($container->privates['api_platform.cache.metadata.property.legacy'] ?? $container->getApiPlatform_Cache_Metadata_Property_LegacyService()), 'api_platform.cache.subresource_operation_factory' => ($container->privates['api_platform.cache.subresource_operation_factory'] ?? $container->getApiPlatform_Cache_SubresourceOperationFactoryService()), 'api_platform.cache.identifiers_extractor' => ($container->privates['api_platform.cache.identifiers_extractor'] ?? $container->getApiPlatform_Cache_IdentifiersExtractorService())]);
    }
}
