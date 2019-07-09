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

Route::post('alipay', function() {
    $order = [
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
        'http_method' => 'GET'
    ];

    $response = Pay::alipay()->web($order);

    return response()->json(['url' => $response->getTargetUrl()]);
});

Route::post('app/alipay', function() {
    $order = [
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
    ];

    $response = Pay::alipay()->app($order);

    return response()->json(['order_string' => $response->getContent()]);
});
