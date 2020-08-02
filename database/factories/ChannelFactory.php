<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'icon' => $faker->unique()->url,
    ];
});
