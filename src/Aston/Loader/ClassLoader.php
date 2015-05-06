<?php

namespace Aston\Loader;

class ClassLoader {
    public function __construct()
    {
        spl_autoload_register(
            function($classname){
                $filename = str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
                require_once $filename;
            }
        );
    }
}