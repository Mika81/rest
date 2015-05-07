<?php

namespace Api;

use Aston\Rest\Api;
use Aston\Http\Response\Json;

class Blog extends Api
{
    public function __construct()
    {
        parent::__construct();

        $this->get('/blog/article', function () {
            $data = array(
                'prenom' => 'toto',
                'nom'    => 'foo',
                'age'    => 2,
            );
            return new Json($data);
        });

        $this->get('/blog/article/([0-9]+)', function ($id) {
            $data = array('id' => $id);
            return new Json($data);
        });
    }
}