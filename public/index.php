<?php
// rest/public/index.php

require '../app/init.php';

require_once 'Aston/Loader/ClassLoader.php';
$loader = new Aston\Loader\ClassLoader();

$request = new \Aston\Http\Request();

echo $request->getMethod();
echo "<br>";
echo $request->getUri();
echo "<br>";

if($request->isMethod('PUT')) {
    var_dump($request->getPut());
}