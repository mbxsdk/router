<?php

namespace Mibexx\Router\Business;


use Mibexx\Application\ApplicationFacade;
use Mibexx\Kernel\Business\Locator\Locator;
use Mibexx\Router\Provider\RouteProviderCollection;

class Router
{
    /**
     * @var Locator
     */
    private $locator;

    /**
     * @var RouteProviderCollection
     */
    private $routeProviderCollection;

    /**
     * @var ApplicationFacade
     */
    private $applicationFacade;

    /**
     * Router constructor.
     *
     * @param Locator $locator
     * @param RouteProviderCollection $routeProviderCollection
     * @param ApplicationFacade $applicationFacade
     */
    public function __construct(
        Locator $locator,
        RouteProviderCollection $routeProviderCollection,
        ApplicationFacade $applicationFacade
    ) {
        $this->locator = $locator;
        $this->routeProviderCollection = $routeProviderCollection;
        $this->applicationFacade = $applicationFacade;
    }


    public function defineRoutings()
    {
        foreach ($this->routeProviderCollection as $routeProvider)
        {
            $routeProvider->setLocator($this->locator);
            $routeProvider->setApplicationFacade($this->applicationFacade);
            $routeProvider->defineRoute();
        }
    }
}