<?php


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    $websocket->emit('message', 'connected');
});

Websocket::on('disconnect', function ($websocket) {
    // called while socket on disconnect
});

Websocket::on('test', function ($websocket, $data) {
    $websocket->emit('message', $data);
});
