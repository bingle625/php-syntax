<?php


/**
 * Iterator interface 구현
 *
 */

class NumberIterator implements Iterator
{

    private $i;

    public function __construct($start, $end, $step=1)
    {
        $this->start = $i = $start;
        $this->end = $end;
        $this->step = $step;
    }

    public function current()
    {
        return $this->i;
    }

    public function next()
    {
        $this->i += $this->step;
    }

    public function key()
    {
        return $this->i;
    }

    public function valid()
    {
        return $this->i < $this->end;
    }

    public function rewind()
    {
        $this->i = 0;
    }
}

foreach (new NumberIterator(0, 10) as $number) {
    var_dump($number);
}