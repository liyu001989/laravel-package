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

Route::get('/', function () {
    return view('welcome');
});

use Tightenco\Collect\Support\Collection;
use Rodenastyle\StreamParser\StreamParser;

Route::get('xml', function() {
    StreamParser::xml("https://www.w3schools.com/xml/plant_catalog.xml")->each(function(Collection $item){
        dump($item);
    });
});

Route::get('json', function() {
    StreamParser::json("https://unpkg.com/province-city-china@2.0.5/dist/data.json")->each(function(Collection $item){
        dump($item);
    });
});

Route::get('csv', function() {
    StreamParser::csv("https://unpkg.com/province-city-china@2.0.5/dist/data.csv")->each(function(Collection $item){
        dump($item);
    });
});