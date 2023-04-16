<?php

/**
 * Classes Autoloading (PSR-4)
 */

//include './Classes/MyClass.php';

use Classes\MyClass;


spl_autoload_register(function ($classname) {
    $result = './' . str_replace('\\', '/', $classname . '.php');
    var_dump($result);
    include $result;

});

new MyClass();
