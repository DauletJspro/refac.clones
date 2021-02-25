<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_genders')->insert([
            "name_ru" => 'Мужской',
            "name_kz" => 'Ер'
        ]);
        DB::table('user_genders')->insert([
            "name_ru" => 'Женский',
            "name_kz" => 'Қыз'
        ]);
    }
}
