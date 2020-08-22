<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence(),
        'created_at' => $faker->dateTimeThisMonth(),
        'updated_at' => $faker->dateTimeThisMonth(),
        'topic_id' => rand(1, 100),
        'user_id' => rand(1, 15)
    ];
});
