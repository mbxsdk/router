<?php

namespace Mibexx\Router\Provider;


use Mibexx\Application\ApplicationFacade;
use Mibexx\Kernel\Business\Locator\Locator;

abstract class AbstractRouteProvider implements RouteProvider
{
    /**
     * @var Locator
     */
    private $locator;

    /**
     * @var ApplicationFacade
     */
    private $applicationFacade;

    /**
     * @return Locator
     */
    public function getLocator()
    {
        return $this->locator;
    }

    /**
     * @param Locator $locator
     */
    public function setLocator(Locator $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return ApplicationFacade
     */
    public function getApplicationFacade()
    {
        return $this->applicationFacade;
    }

    /**
     * @param ApplicationFacade $applicationFacade
     */
    public function setApplicationFacade(ApplicationFacade $applicationFacade)
    {
        $this->applicationFacade = $applicationFacade;
    }

    /**
     * @param string $route
     * @param string $type
     * @param callable $callback
     */
    public function addRoute($route, $type, callable $callback)
    {
        $this->applicationFacade->addRoute($route, $type, $callback);
    }


}