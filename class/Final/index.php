<?php

/**
 * Final
 */
class A
{
    public $message;

    public final function foo()
    {
        return 'ho';
    }
}

class B extends A
{
//    public function foo(
//    )
}

$b = new B();
var_dump($b->foo());