<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Office;
use Faker\Generator as Faker;

$factory->define(Office::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'limit' => 100,
        'registered_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
