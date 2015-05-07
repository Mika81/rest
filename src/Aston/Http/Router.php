<?php

namespace Aston\Http;

class Router
{
    private $request;
    private $routes = array();

    public function __construct(Request $request = null)
    {
        if ($request === null) {
            $this->setRequest(new Request());
        }
    }

    public function execute()
    {
        $matches = [];
        $request = $this->getRequest();
        $uri     = $request->getUri();

        foreach ($this->getRoutes() as $path => $route) {
            if (preg_match(sprintf("#^%s$#", $path), $uri, $matches) &&
                $request->isMethod($route->getMethod()))
            {

                array_shift($matches);
                $action = $route->getAction();
                return call_user_func_array($action, $matches);
            }
        }
        return false;
    }

    public function addRoute(Route $route)
    {
        $this->routes[$route->getPath()] = $route;
        return $this;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }
}