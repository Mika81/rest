<?php

// Sous Windows == \
// Sous Unix    == /
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('SRC_PATH', ROOT_PATH . DS . 'src');
define('APP_PATH', ROOT_PATH . DS . 'app');

// DATABASE ...