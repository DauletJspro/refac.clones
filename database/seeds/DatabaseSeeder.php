<?php

use App\Models\Region;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $regions = factory(Region::class, 10)->create();
        $cities = factory(\App\Models\City::class, 10)->create();
        $users = factory(\App\User::class, 10)->create();
        $offices = factory(\App\Models\Office::class, 10)->create();
        $user_infos = factory(UserInfo::class, 10)->create();


    }
}
