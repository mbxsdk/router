<?php

namespace Mibexx\Router\Business;


use Mibexx\Application\ApplicationFacade;
use Mibexx\Kernel\Business\Locator\Locator;
use Mibexx\Router\Provider\RouteProvider;
use Mibexx\Router\Provider\RouteProviderCollection;

class RouterTest extends \Codeception\Test\Unit
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

    protected function _before()
    {
        $this->locator = $this->getMockBuilder(Locator::class)
                              ->setMethods(null)
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->routeProviderCollection = $this->getMockBuilder(RouteProviderCollection::class)
                                                   ->setMethods(null)
                                                   ->disableOriginalConstructor()
                                                   ->getMock();

        $this->applicationFacade = $this->getMockBuilder(ApplicationFacade::class)
                                        ->setMethods(null)
                                        ->disableOriginalConstructor()
                                        ->getMock();


    }


    public function testDefineRoutings()
    {
        $routeProvider = $this->getMockBuilder(RouteProvider::class)
                                   ->setMethods(
                                       [
                                           'defineRoute',
                                           'addRoute',
                                           'getLocator',
                                           'setLocator',
                                           'getApplicationFacade',
                                           'setApplicationFacade'
                                       ]
                                   )
                                   ->getMock();


        $routeProvider->expects($this->once())
                           ->method('setLocator')
                           ->with($this->equalTo($this->locator));

        $routeProvider->expects($this->once())
                           ->method('setApplicationFacade')
                           ->with($this->applicationFacade);

        $routeProvider->expects($this->once())
                           ->method('defineRoute');

        $this->routeProviderCollection->add($routeProvider);
        $router = new Router($this->locator, $this->routeProviderCollection, $this->applicationFacade);
        $router->defineRoutings();
    }
}