<?php

use Illuminate\Http\Request;

Route::post('alipay/notify', function(Request $request) {

    logger($request->all());

    $gateway = Omnipay::gateway('alipay_aoppage');
    $omnipayRequest = $gateway->completePurchase();
    $omnipayRequest->setParams($request->all());

    try {
        $response = $omnipayRequest->send();

        if($response->isPaid()){
            /**
             * Payment is successful
             */
            return response('success');
        }else{
            /**
             * Payment is not successful
             */
            return response('fail');
        }
    } catch (Exception $e) {
        /**
         * Payment is not successful
         */
        return response('fail');
    }
});
