<?php

namespace Aston\Http\Response;

use Aston\Http\Response;

class Json extends Response
{
    public function setBody($body)
    {
        if (!is_array($body) && !$body instanceof \Traversable) {
            throw new \InvalidArgumentException("Body must be traversable");
        }

        return parent::setBody($body);
    }

    public function output()
    {
        $this->addHeader('Content-Type', 'application/json');
        $output = parent::output();
        return json_encode($output);
    }
}