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


Route::get('countries', function() {
    $countries = \Rinvex\Country\CountryLoader::where('geo.subregion', 'Eastern Asia');

    $countries = collect($countries)->pluck('name');

    return response()->json($countries);
});

Route::get('countries/{code}', function($code) {
    $country = country($code);

    return response()->json([
        'NativeOfficialName' => $country->getNativeOfficialName(),
        'Language' => $country->getLanguage(),
        'CallingCodes' => $country->getCallingCodes(),
        'Emoji' => $country->getEmoji(),
        'Currency' => $country->getCurrency(),
    ]);
});