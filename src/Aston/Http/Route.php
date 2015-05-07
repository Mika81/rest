<?php

namespace Aston\Http;

class Route
{
    private $path;
    private $method;
    private $action;

    public function __construct($path, $method, callable $action)
    {
        $this->setPath($path)
             ->setMethod($method)
             ->setAction($action);
    }

    public function setPath($path)
    {
        $this->path = (string) $path;
        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setMethod($method)
    {
        $this->method = (string) $method;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setAction(callable $action)
    {
        $this->action = $action;
        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }
}