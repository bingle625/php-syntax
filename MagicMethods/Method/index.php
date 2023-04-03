<?php

/**
 * Magic Methods: Methods
 */

class A
{
    public function __call($name, $arguments)
    {
        var_dump($name,$arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        var_dump($name,$arguments);
    }

    public function __invoke($args)
    {
        var_dump($args);
    }

}

$a = new A();
//$a('hello, World,');

//
//$a = new A();
//$a->foo();
//$a::foo();