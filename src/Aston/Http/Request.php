<?php


namespace Aston\Http;

class Request {
    private $uri;
    private $params = array();
    private $rawBody;

    public function __construct()
    {
        $this->setUri($uri);
    }

    /**
     *
     * GET, POST, DELETE, PUT, HEAD
     * @param $method
     * @return bool
     */
    public function isMethod($method)
    {
        return $this->getMethod() === $method;
    }

    public function getMethod()
    {
        return $this->getServer('REQUEST_METHOD');  
    }

    public function setUri($uri)
    {
        if($uri === null)
        {
            $uri = $this->getServer('REQUEST_URI');
        }
        $this->uri = (string) $uri;
        return $this;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getServer($key = null)
    {
        if(null === $key)
        {
            return $_SERVER;
        }

        if(isset($_SERVER[$key]))
        {
            return $_SERVER[$key];
        }

        return null;
    }
}