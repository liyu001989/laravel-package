<?php

return [

	// The default gateway to use
	'default' => 'alipay_aoppage',

	// Add in each gateway here
	'gateways' => [
		// 'paypal' => [
		// 	'driver'  => 'PayPal_Express',
		// 	'options' => [
		// 		'solutionType'   => '',
		// 		'landingPage'    => '',
		// 		'headerImageUrl' => ''
		// 	]
		// ]
        'alipay_aoppage' => [
            'driver'  => 'Alipay_AopPage',
            'options' => [
                'appId' => env('ALIPAY_APPID'),
                'notifyUrl' => env('ALIPAY_NOTIFY_URL'),
                'privateKey' => env('ALIPAY_PRIVATE_KEY'),
                'alipayPublicKey' => env('ALIPAY_PUBLIC_KEY'),
                'environment' => env('ALIPAY_ENVIRONMENT', 'production'),
                'signType' => 'RSA2',
            ]
        ],
        'alipay_aopapp' => [
            'driver'  => 'Alipay_AopApp',
            'options' => [
                'appId' => env('ALIPAY_APPID'),
                'notifyUrl' => env('ALIPAY_NOTIFY_URL'),
                'privateKey' => env('ALIPAY_PRIVATE_KEY'),
                'alipayPublicKey' => env('ALIPAY_PUBLIC_KEY'),
                'environment' => env('ALIPAY_ENVIRONMENT', 'production'),
                'signType' => 'RSA2',
            ]
        ]
	]

];
