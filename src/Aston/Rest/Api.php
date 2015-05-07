<?php

namespace Aston\Rest;

use Aston\Http\Request;
use Aston\Http\Route;
use Aston\Http\Router;
use Aston\Http\Response;

class Api
{
    private $request;
    private $router;
    private $response;

    public function __construct()
    {
        $this->setRouter(new Router());
        $this->setResponse(new Response\Json(array()));
    }

    public function process()
    {
        $response = $this->getRouter()->execute();

        if (!$response instanceof Response) {
            $response = $this->getResponse()->setStatusCode(404);
        }

        echo $response->output();
    }

    public function get($path, $action)
    {
        return $this->createRoute($path, 'GET', $action);
    }

    public function post($path, $action)
    {
        return $this->createRoute($path, 'POST', $action);
    }

    public function put($path, $action)
    {
        return $this->createRoute($path, 'PUT', $action);
    }

    public function delete($path, $action)
    {
        return $this->createRoute($path, 'DELETE', $action);
    }

    protected function createRoute($path, $method, callable $action)
    {
        $route = new Route($path, $method, $action);
        $this->getRouter()->addRoute($route);
        return $this;
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

    public function setRouter(Router $router)
    {
        $this->router = $router;
        return $this;
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }
}