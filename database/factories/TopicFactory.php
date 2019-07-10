<?php

use App\User;
use App\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
