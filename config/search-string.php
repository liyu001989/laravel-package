<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Invalid search string handling
    |--------------------------------------------------------------------------
    |
    | - all-results: (Default) Silently fail with a query containing everything.
    | - no-results: Silently fail with a query containing nothing.
    | - exceptions: Throw an `InvalidSearchStringException`.
    |
    */

    'fail' => 'exceptions',

    /*
    |--------------------------------------------------------------------------
    | Default options
    |--------------------------------------------------------------------------
    |
    | When options are missing from your models, this array will be used
    | to fill the gaps. You can also define a set of options specific
    | to a model, using its class name as a key, e.g. 'App\User'.
    |
    */

    'default' => [
        'keywords' => [
            'order_by' => 'sort',
            'select' => 'fields',
            'limit' => 'limit',
            'offset' => 'from',
        ],
    ],
    App\Topic::class => [
        'columns'=> [
            'title' => [
               'key' => '/^title|标题$/',
               'searchable' => true
            ],
            'body' => [
                'key' => 'content',
                'searchable' => true
            ],
            'is_active' => [
               'key' => '/^active|激活$/',
               'boolean' => true,
            ],
            'created_at' => [
               'key' => '/^created|创建时间$/',
               'date' => true,
            ]
        ]
    ]
];