<?php

// rest/public/index.php

require '../app/init.php';

require_once 'Aston/Loader/ClassLoader.php';
$loader = new Aston\Loader\ClassLoader();

$request = new \Aston\Http\Request();
if ($request->isMethod('PUT')) {
    var_dump($request->getPut());
}

$response = new \Aston\Http\Response();
$response->setBody('<html><h1>Hello</h1></html>');
echo $response->output();