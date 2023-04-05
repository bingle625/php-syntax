<?php

/**
 * Closure
 */
$foo = fn () => 'Hello, world';
var_dump($foo);

function foo2()
{
    return 'Hello, world';
}

var_dump(Closure::fromCallable('foo2'));

// 사용 예시
class A
{
    private $message = 'Hello, world';
}

$foo = fn() => $this->message;
var_dump($foo->call(new A()));

$a = new A();

// Function call
// $foo->call(new A());
//var_dump();

$foo2 = $foo->bindTo($a, $a);
var_dump($foo2());

function foo3(Closure $callback)
{
    var_dump($callback());
}

foo3(fn() => 'Hello, world');