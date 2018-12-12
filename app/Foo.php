<?php

namespace App;

class Foo
{
    public $foo = 'foo';

    public $bar = 'bar';

    public function test(int $test): int
    {
        return $test;
    }
}