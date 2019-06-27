<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', function() {
    return view('form');
});

Route::post('form', function() {
    return app('request')->all();
})->middleware(ProtectAgainstSpam::class);
