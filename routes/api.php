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
    $request = Omnipay::gateway('alipay_aoppage')->purchase();

    $request->setBizContent([
        'out_trade_no' => date('YmdHis') . mt_rand(1000, 9999),
        'total_amount' => 0.01,
        'subject'      => 'test',
        'product_code' => 'FAST_INSTANT_TRADE_PAY',
    ]);

    $response = $request->send();

    return response()->json(['url' => $response->getRedirectUrl()]);
});


Route::post('app/alipay', function() {
    $request = Omnipay::gateway('alipay_aopapp')->purchase();

    $request->setBizContent([
        'subject'      => 'test',
        'out_trade_no' => date('YmdHis') . mt_rand(1000, 9999),
        'total_amount' => '0.01',
        'product_code' => 'QUICK_MSECURITY_PAY',
    ]);

    $response = $request->send();

    return response()->json(['order_string' => $response->getOrderString()]);
});

