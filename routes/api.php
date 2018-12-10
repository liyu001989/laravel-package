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

Route::post('media', function(Request $request) {
    // $user = $request->user();
    $user = App\User::find(2);

    $user->addMediaFromRequest('photo')->toMediaCollection('photo');

    return response()->json([], 201);
});