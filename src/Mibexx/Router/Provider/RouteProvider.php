<?php

namespace Mibexx\Router\Provider;


use Mibexx\Application\ApplicationFacade;
use Mibexx\Kernel\Business\Locator\Locator;

interface RouteProvider
{
    const ROUTE_GET = 'get';

    const ROUTE_POST = 'post';

    const ROUTE_PUT = 'put';

    const ROUTE_DELETE = 'delete';

    public function defineRoute();

    /**
     * @param string $route
     * @param string $type
     * @param callable $callback
     */
    public function addRoute($route, $type, callable $callback);

    /**
     * @return Locator
     */
    public function getLocator();

    /**
     * @param Locator $locator
     */
    public function setLocator(Locator $locator);

    /**
     * @return ApplicationFacade
     */
    public function getApplicationFacade();

    /**
     * @param ApplicationFacade $applicationFacade
     */
    public function setApplicationFacade(ApplicationFacade $applicationFacade);
}