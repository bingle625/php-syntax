<?php


/**
 * Magic Methods: Property
 */

class A
{
    public function __isset($name)
    {
        return isset($this->$name);
     }

    public function __unset($name)
    {
        // TODO: Implement __unset() method.
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {

    }
}

$a = new A();

//var_dump(isset($a->message));
//$a-