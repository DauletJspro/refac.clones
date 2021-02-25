<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name_kz' => 'Алматы',
            'name_ru' => 'Алматы',
            'region_id' => 3
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Нұр-сұлтан',
            'name_ru' => 'Нур-султан',
            'region_id' => 1
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Ақтөбе',
            'name_ru' => 'Актобе',
            'region_id' => 2
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Шымкент',
            'name_ru' => 'Шымкент',
            'region_id' => 14
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Қарағанда',
            'name_ru' => 'Караганда',
            'region_id' => 8
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Тараз',
            'name_ru' => 'Тараз',
            'region_id' => 6
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Павлодар',
            'name_ru' => 'Павлодар',
            'region_id' => 12
        ]);


        DB::table('cities')->insert([
            'name_kz' => 'Усть-Каменогорск',
            'name_ru' => 'Усть-Каменогорск',
            'region_id' => 5
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Семей',
            'name_ru' => 'Семей',
            'region_id' => 5
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Қостанай',
            'name_ru' => 'Костанай',
            'region_id' => 9
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Орал',
            'name_ru' => 'Уральск',
            'region_id' => 7
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Петропавловск',
            'name_ru' => 'Петропавловск',
            'region_id' => 13
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Қызылорда',
            'name_ru' => 'Кызылорда',
            'region_id' => 10
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Атырау',
            'name_ru' => 'Атырау',
            'region_id' => 4
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Ақтау',
            'name_ru' => 'Актау',
            'region_id' => 11
        ]);


        DB::table('cities')->insert([
            'name_kz' => 'Талдықорған',
            'name_ru' => 'Талдыкорган',
            'region_id' => 3
        ]);


        DB::table('cities')->insert([
            'name_kz' => 'Жезқазған',
            'name_ru' => 'Жезказган',
            'region_id' => 8
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Теміртау',
            'name_ru' => 'Темиртау',
            'region_id' => 8
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Балхаш',
            'name_ru' => 'Балхаш',
            'region_id' => 8
        ]);

        DB::table('cities')->insert([
            'name_kz' => 'Байқоңыр',
            'name_ru' => 'Байконур',
            'region_id' => 10
        ]);

    }
}
