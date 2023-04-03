<?php

function foo(A $a)
{
    return $a->foo();
}

/**
 * 독립적으로 객체 생성 불가
 * 상속받은 클래스 에서는 abstract 함수를 무조건 구현해야한다.
 * Class Abstraction
 */

abstract class A
{
    protected $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract public function foo();

}

class B extends A
{
    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
//var_dump($b->foo());

var_dump(foo($b));