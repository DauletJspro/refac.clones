<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    $regions = \App\Models\Region::pluck('id')->toArray();
    return [
        'name_kz' => $faker->city,
        'name_ru' => $faker->city,
        'region_id' => $faker->randomElement($regions),
    ];
});
