<?php


class A
{
    private static $message = 'Hello, world';

    public function __construct(string $message)
    {
        $this->message = $message;
    }
}

class B extends A
{

}

/**
 * ReflectionClass
 */

$refClass = new ReflectionClass('\A');
var_dump($refClass->getProperties(ReflectionProperty::IS_PRIVATE));

$refClassB = new ReflectionClass('\B');
var_dump($refClassB->isSubclassOf('\A'));
/**
 * ReflectionProperty
 */
$messageProperty = $refClass->getProperty('message');
var_dump($messageProperty->isProtected());