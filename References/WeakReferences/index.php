<?php
/**
 * WeakReference
 */

$class = new stdClass();
$messages = [
    'sayHello' => 'Hello, world',
];

var_dump((object) $messages);
$weakRef = WeakReference::create($class);
var_dump($weakRef->get());

/**
 *
 */