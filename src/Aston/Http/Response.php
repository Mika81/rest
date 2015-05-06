<?php

namespace Aston\Http;

class Response
{
    private $statusCode = 200;
    private $headers = array();
    private $body;

    public function setStatusCode($code)
    {
        $this->statusCode = (int) $code;
        return $this;
    }

    public function getStatutCode()
    {
        return $this->statusCode;
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function redirect($uri, $statusCode = 301)
    {
        $this->setStatusCode($statusCode);
        $this->addHeader('Location', $uri);
        return $this;
    }

    public function output()
    {
        http_response_code($this->getStatutCode());

        foreach ($this->getHeaders() as $key => $value) {
            header($key.': '.$value);
        }

        return $this->getBody();
    }
}