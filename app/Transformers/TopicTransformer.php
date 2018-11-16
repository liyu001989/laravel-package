<?php

namespace App\Transformers;

use App\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['user'];

    public function transform(Topic $topic)
    {
        return [
            'id'      => (int) $topic->id,
            'user_id'   => (int) $topic->user_id,
            'title'   => $topic->title,
            'content'   => $topic->content,
            'created_at'   => (string) $topic->created_at,
            'updated_at'   => (string) $topic->updated_at,
        ];
    }

    public function includeUser(Topic $topic)
    {
        return $this->item($topic->user, new UserTransformer(), 'user');
    }
}