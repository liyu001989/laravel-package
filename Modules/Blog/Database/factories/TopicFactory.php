<?php

use Faker\Generator as Faker;
use Modules\Blog\Entities\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
    ];
});
