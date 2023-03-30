<?php

/**
 * class 정의
 *
 */

class A
{
    public $message = 'Hello World';

    public function foo()
    {
        return $this->message;
    }
}

/**
 * 새로운 인스턴스 생성 -> heap영역에 저장
 * -> call by address
 */
$a = new A();
//var_dump($a->foo());

class B extends A
{

}

$b = new B();

//var_dump($b->foo());

/**
 * Context
 */
class C extends A
{
    public function foo()
    {
        // class C (함수가 바인딩된 곳에서의 객체를 return?)
//        return new self();
//         class D (함수를 호출하는 인스턴스를 return)
//        return new static();
        // class A (함수가 바인딩된 곳에서의 부모 객체를 return
        return new parent();
    }
}

class D extends C
{

}

$d = new D();

//var_dump($d->foo());

/**
 * Constants
 */
class E
{
    const MESSAGE = 'Hello, World';

    public function getConstants()
    {
        return self::MESSAGE;
    }

    // 매직 메서드
    public function getClassName()
    {
        return __CLASS__;
    }
}

$e = new E();
//var_dump($e->getConstants());
//var_dump(E::MESSAGE);
//var_dump($e->getClassName());

/**
 * instanceof
 */
$d = new D();
//var_dump($d instanceof C);

/**
 * Anonymous Classes
 */
class F
{
    public function create()
    {
        return new class extends A{
        };
    }
}

$f = new F();
//var_dump($f->create());

// php의 메소드 체이닝 기능
var_dump($f->create()->foo());