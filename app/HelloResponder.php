<?php

namespace App;

use Closure;
use Illuminate\Http\Request;
use Spatie\Honeypot\SpamResponder\SpamResponder;

class HelloResponder implements SpamResponder
{
    public function respond(Request $request, Closure $next)
    {
        return response('hello spam');
    }
}
