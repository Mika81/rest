<?php


namespace Aston\Http;

class Request
{
    private $uri;
    private $params = array();
    private $rawBody;

    public function __construct($uri = null)
    {
        $this->setUri($uri);
    }

    public function getGet($key = null)
    {
        if($key === null){
            return $_GET;
        }
        if (isset($_GET[$key])){
            return $_GET[$key];
        }
        return null;
    }

    public function getPost($key = null)
    {
        if($key === null){
            return $_POST;
        }
        if (isset($_POST[$key])){
            return $_POST[$key];
        }
        return null;
    }

    public function getPut()
    {
        return $this->getRawBody();
    }

    public function getRawBody()
    {
        $body = file_get_contents('php://input');
        if(strlen($body) > 0){
            parse_str($body, $this->rawBody);
        }
        return $this->rawBody;
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