<?php

/**
 * Generator
 */

function gen()
{
    yield 1;
    yield 2;
    yield 3;
}

$gen = gen();
//var_dump($gen->current());
//var_dump($gen->next());
//var_dump($gen->current());

//foreach ($gen as $number) {
//    var_dump($number);
//}

function gen2()
{
    yield 1;
    yield from gen();
    yield 2;
}

//foreach (gen2() as $number) {
//    var_dump($number);
//}


function gen3()
{
    yield 'message' => 'Hello, world';
}

//foreach (gen3() as $key => $value) {
//    var_dump($key);
//    var_dump($value);
//}


function gen4()
{
    $data = yield;
    yield $data;
}

$gen4 = gen4();

var_dump($gen4->current());
var_dump($gen4->send('Hello world'));

/**
 * generator 왜 쓰는가?
 */

function __range($start, $end, $step = 1)
{
    for ($i = 0; $i < $end; $i++) {
        yield $i;
    }
}

$s = microtime(true);

foreach (__range(0, 100000) as $number) {}

var_dump(microtime(true) - $s, memory_get_peak_usage());