<?php

function foo(A $a)
{
    return $a->foo();
}

/**
 * 인터페이스의 경우에는 추상클래스처럼 구현부가 섞여 잇는것이 아니라, 무조건 추상화 상태만 나타난다.
 * 또한, protected, private 을 사용할 수 없고, public 만 사용 가능하다.
 */
interface A
{
    public function foo();
}

interface AA extends A
{
    public function sayHello();
}
class B implements AA
{
    public function foo()
    {
        return __CLASS__;
    }

    public function sayHello()
    {
        // TODO: Implement sayHello() method.
    }
}

$b = new B();
var_dump(foo($b));
