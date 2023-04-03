<?php

/**
 * Static
 */
class A
{
    public static $message = 'Hello, world';

    public static function foo()
    {
        return self::$message;
    }
}

// 정적 프로퍼티, 메서드는 클래스 이름으로 바로 호출 가능
//var_dump(A::$message);

$className = 'A';

$a = new $className();

// 인스턴스에서 정적 메서드 호출으 가능하지만, 정적 프로퍼티 호출은 불가능함. 권장하는 방법은 아님.
var_dump($a->foo());
//var_dump($a->message);