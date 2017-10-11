<?php

namespace Mibexx\Router;


use Mibexx\Kernel\Business\Locator\Module\AbstractFacade;

/**
 * @method RouterFactory getFactory()
 */
class RouterFacade extends AbstractFacade
{
    /**
     * Load all RouteProvider and register the routings
     */
    public function defineRoutings()
    {
        $this->getFactory()->createRouter()->defineRoutings();
    }
}