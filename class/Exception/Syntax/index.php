<?php

/**
 * Exception
 * 예외는 보통 런타임 도중에 발생함.
 * 에러는 보통 컴파일 상에서 발생한다.
 * 보통 try catch로 작성한다.
 */

try {
    throw new Exception('Hello, world');
} catch (Exception $exception) {
    var_dump($exception->getMessage());
} finally {
    var_dump('hi');
}

set_error_handler(function ($errorNo, $errorStr) {
    throw new ErrorException($errorStr, $errorNo);
});

set_exception_handler(fn(Exception $e) => var_dump($e->getMessage()));

/**
 * Error
 */

try {
    new Myclass();
} catch (Error $e) {
    \var_dump($e->getMessage());
}
