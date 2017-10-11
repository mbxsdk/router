<?php

namespace Mibexx\Router\Provider;


class RouteProviderCollection implements \Iterator, \Countable
{
    /**
     * @var array
     */
    private $route;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * @param RouteProvider $routeProvider
     *
     * @return $this
     */
    public function add(RouteProvider $routeProvider)
    {
        $this->route[] = $routeProvider;

        return $this;
    }

    public function current()
    {
        return $this->route[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->route[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function count()
    {
        return count($this->route);
    }


}