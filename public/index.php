<?php

// rest/public/index.php

require_once '../app/init.php';
require_once 'Aston/Loader/ClassLoader.php';

$loader = new \Aston\Loader\ClassLoader();
$api = new \Api\Blog();
$api->process();