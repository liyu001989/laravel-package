<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Searchable;

    protected $indexConfigurator = TopicsIndexConfigurator::class;

    protected $searchRules = [
        TopicSearchRule::class
    ];

    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                'analyzer' => 'ik_smart'
            ],
            'body' => [
                'type' => 'text',
                'analyzer' => 'ik_smart'
            ],
            'user_name' => [
                'type' => 'keyword'
            ]
        ]
    ];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'user_name' => $this->user->name,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
