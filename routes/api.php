<?php

use Illuminate\Http\Request;
use App\Enums\UserStatus;

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

Route::patch('/users/{user}', function(App\User $user, Request $request) {
    $request->validate([
        'status' => 'enum_key:'.UserStatus::class
    ]);

    $user->status = UserStatus::getInstance(UserStatus::getValue($request->status));
    $user->save();

    return $user->status->description;
});
