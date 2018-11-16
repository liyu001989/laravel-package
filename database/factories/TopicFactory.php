<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'user_id' => App\User::inRandomOrder()->first()->id,
    ];
});
