<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('foobar', function() {
    Log::info('info 日志');
    Log::error('error 日志');

    $user = App\User::first();
    $user->name = 'foobar';
    $user->save();

    Mail::raw('Test Email', function($message) {
        $message->to('admin@gmail.com')->subject('welcome');
    });

    dump('test dump');

    abort(403, 'test Exception');
});