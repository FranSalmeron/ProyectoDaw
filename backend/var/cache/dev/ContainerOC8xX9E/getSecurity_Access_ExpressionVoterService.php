<?php

namespace ContainerOC8xX9E;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Access_ExpressionVoterService extends App_KernelDevContainer
{
    /*
     * Gets the private 'security.access.expression_voter' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['security.authorization_checker'] ?? $container->getSecurity_AuthorizationCheckerService());

        if (isset($container->privates['security.access.expression_voter'])) {
            return $container->privates['security.access.expression_voter'];
        }

        return $container->privates['security.access.expression_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter(($container->privates['security.expression_language'] ?? $container->getSecurity_ExpressionLanguageService()), ($container->privates['security.authentication.trust_resolver'] ?? ($container->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), $a, ($container->privates['security.role_hierarchy'] ?? ($container->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]))));
    }
}
