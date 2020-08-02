<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Programme::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'description' => $faker->text(50),
        'thumbnail' => $faker->unique()->url,
        'start_time' => now(),
        'end_time' => now()->addHours(2),
    ];
});
