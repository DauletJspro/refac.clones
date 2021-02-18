<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\UserInfo;
use Faker\Generator as Faker;

$factory->define(UserInfo::class, function (Faker $faker) {
    $users = \App\User::pluck('id')->toArray();
    $cities = \App\Models\City::pluck('id')->toArray();
    $offices = \App\Models\Office::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'last_name' => $faker->lastName,
        'middle_name' => $faker->firstName,
        'city_id' => $faker->randomElement($cities),
        'speaker_id' => $faker->randomElement($users),
        'office_director_id' => $faker->randomElement($users),
        'office_id' => $faker->randomElement($offices),
    ];
});
