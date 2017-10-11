<?php

namespace Mibexx\Router;


use Mibexx\Application\ApplicationFacade;
use Mibexx\Kernel\Business\Locator\Module\AbstractFactory;
use Mibexx\Router\Business\Router;
use Mibexx\Router\Provider\RouteProviderCollection;
use Mibexx\Router\Shared\RouterConstants;

class RouterFactory extends AbstractFactory
{
    /**
     * @return Router
     */
    public function createRouter()
    {
        return new Router(
            $this->getLocator(),
            $this->getRouteProviderCollection(),
            $this->getApplicationFacade()
        );
    }

    /**
     * @return RouteProviderCollection
     */
    public function getRouteProviderCollection()
    {
        return $this->getProvidedDependency(RouterConstants::ROUTER_ROUTE_PROVIDER);
    }

    /**
     * @return ApplicationFacade
     */
    public function getApplicationFacade()
    {
        return $this->getProvidedDependency(RouterConstants::APPLICATION_FACADE);
    }
}