<?php

$uri = $_SERVER['REQUEST_URI'];

echo $uri . "<br>";

$routes = array(
    '/test' => 'Toto',
    '/mon/dossier' => 'oki !!',
);

if(array_key_exists($uri, $routes)){
    echo $routes[$uri];
}