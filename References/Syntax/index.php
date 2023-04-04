<?php

/**
 * References
 */
$message = 'Hello, world';
$sayHello =& $message;

$sayHello = 'who are you';
var_dump($message);
var_dump($sayHello);

/**
 * Functions and Methods
 */

function foo()
{
    // global $message;
    $message =& $GLOBALS['message'];
    $message = 'Bye';
}

foo();
//var_dump($message);

function foo2(&$message)
{
    $message = 'Hello, world';
}

foo2($message);
var_dump($message);