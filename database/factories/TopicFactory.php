<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->text(),
        'user_id' => App\User::inRandomOrder()->first()->id,
    ];
});

