<?php

namespace ContainerDjI0Wfz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_Jwt_ChatCreateService extends App_KernelCLOUDINARY_CLOUD_NAMEContainer
{
    /*
     * Gets the private 'security.authenticator.jwt.ChatCreate' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->services['lexik_jwt_authentication.jwt_manager'] ?? $container->load('getLexikJwtAuthentication_JwtManagerService'));

        if (isset($container->privates['security.authenticator.jwt.ChatCreate'])) {
            return $container->privates['security.authenticator.jwt.ChatCreate'];
        }
        $b = ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService());

        if (isset($container->privates['security.authenticator.jwt.ChatCreate'])) {
            return $container->privates['security.authenticator.jwt.ChatCreate'];
        }

        return $container->privates['security.authenticator.jwt.ChatCreate'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator($a, $b, ($container->privates['lexik_jwt_authentication.extractor.chain_extractor'] ?? $container->load('getLexikJwtAuthentication_Extractor_ChainExtractorService')), ($container->privates['security.user.provider.concrete.app_user_provider'] ?? $container->load('getSecurity_User_Provider_Concrete_AppUserProviderService')), ($container->services['translator'] ?? $container->getTranslatorService()));
    }
}
