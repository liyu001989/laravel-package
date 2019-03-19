<?php

namespace App;

use ScoutElastic\SearchRule;

class TopicSearchRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        return [
            'fields' => [
                'title' => [
                    'type' => 'plain'
                ]
            ],
            'pre_tags' => '<p class="highlight">',
            'post_tags' => '</p>'
        ];
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'match' => [
                    'title' => $this->builder->query
                ]
            ],
            'must_not' => [
                'match' => [
                    'title' => '补充'
                ]
            ]
        ];
    }
}