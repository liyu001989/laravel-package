<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foo;

class TestController extends Controller
{
    public function index(Request $request, Foo $foo)
    {

        $protected = $foo->foo;
        $public = $foo->bar;

        $foo->test(123);

        $test = ['test'];
        return $request->only($test);
    }
}
