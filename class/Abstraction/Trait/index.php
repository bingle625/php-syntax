<?php


/**
 * Trait
 */

trait A
{
    public $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract protected function foo();
}

trait AA
{
    public function sayHello()
    {
        return __TRAIT__;
    }
}

trait AAA
{
    use A, AA {
        AA::sayHello insteadof A;
        A::sayHello as protected h;
    }

}
class B
{
    use AAA;

    public function foo()
    {
        // TODO: Implement foo() method.
    }

}

$b = new B();

var_dump($b->sayHello());

/**
 * 동일 함수 충돌시에 우선순위
 * self > trait > 부모 class
 */