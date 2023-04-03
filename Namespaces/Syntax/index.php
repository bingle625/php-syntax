<?php

/**
 * Namespaces
 * 같은 이름의 클래스가 있을 경우, 이를 구분하기 위해 사용되는 문법
 * 모던 PHP의 '오토로딩' 이라는 부분에서 굉장히 중요하게 사용됨.
 * 보통은 파일당 하나의 네임스페이스가 권장되나, 본 강의에서는 강의를 위해 여러개가 사용됨.
 */
namespace A
{
    const MESSAGE = __NAMESPACE__;
    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }

    function foo()
    {
        return __FUNCTION__;
    }

    function var_dump()
    {
        return __FUNCTION__;
    }
}
namespace A\B
{

    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }

    function var_dump($message)
    {
        echo __FUNCTION__;
    }

    var_dump('hello world');
    \var_dump('hello world');
}

namespace{

    use A\B\A;
    use A\B\A as AB;

    $a = new A();

    var_dump($a->foo());
}