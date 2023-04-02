<?php

/**
 * Magic Methods: Serialize
 */

class A
{
    private $message = 'Hello World';

    public function __sleep()
    {
        return [
            'message',
        ];
    }

    public function __wakeup()
    {
        var_dump(__METHOD__);
    }
}

$a = new A();

$serialized = serialize($a);
var_dump($serialized);