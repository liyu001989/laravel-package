<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lorisleiva\LaravelSearchString\Concerns\SearchString;

class Topic extends Model
{
    use SearchString;

    // protected $searchStringColumns = [
    //     'title' => [
    //        'key' => '/^title|标题$/',
    //        'searchable' => true
    //     ],
    //     'body' => [
    //         'key' => 'content',
    //         'searchable' => true
    //     ],
    //     'is_active' => [
    //        'key' => '/^active|激活$/',
    //        'boolean' => true,
    //     ],
    //     'created_at' => [
    //        'key' => '/^created|创建时间$/',
    //        'date' => true,
    //     ]
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
