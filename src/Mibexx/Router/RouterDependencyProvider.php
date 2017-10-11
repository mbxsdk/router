<?php

namespace Mibexx\Router;


use Mibexx\Dependency\Business\ContainerInterface;
use Mibexx\Dependency\Business\Provider\AbstractDependencyProvider;
use Mibexx\Router\Provider\RouteProviderCollection;
use Mibexx\Router\Shared\RouterConstants;

class RouterDependencyProvider extends AbstractDependencyProvider
{
    public function defineDependencies(ContainerInterface $container)
    {
        $container[RouterConstants::ROUTER_ROUTE_PROVIDER] = function () {
            return new RouteProviderCollection();
        };

        $container[RouterConstants::APPLICATION_FACADE] = function () use ($container) {
            return $container->getLocator()->Application()->Facade();
        };
    }

}