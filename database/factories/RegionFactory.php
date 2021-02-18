<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Region;
use Faker\Generator as Faker;

$factory->define(Region::class, function (Faker $faker) {
    return [
        'name_kz' => $faker->name,
        'name_ru' => $faker->name,
    ];
});
