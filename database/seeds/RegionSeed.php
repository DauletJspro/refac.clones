<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'id'      => 1,
            'name_kz' => 'Ақмола',
            'name_ru' => 'Акмолинская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 2,
            'name_kz' => 'Ақтөбе',
            'name_ru' => 'Актюбинская область',
        ]);

        DB::table('regions')->insert([
            'id'      => 3,
            'name_kz' => 'Алматы',
            'name_ru' => 'Алматинская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 4,
            'name_kz' => 'Атырау',
            'name_ru' => 'Атырауская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 5,
            'name_kz' => 'Шығыс Қазақстан',
            'name_ru' => 'Восточно-Казахстанская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 6,
            'name_kz' => 'Жамбыл',
            'name_ru' => 'Жамбылская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 7,
            'name_kz' => 'Батыс Қазақстан',
            'name_ru' => 'Западно-Казахстанская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 8,
            'name_kz' => 'Қарағанды',
            'name_ru' => 'Карагандинская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 9,
            'name_kz' => 'Қостанай',
            'name_ru' => 'Костанайская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 10,
            'name_kz' => 'Қызылорда',
            'name_ru' => 'Кызылординская область',
        ]);
        DB::table('regions')->insert([
            'id'      => 11,
            'name_kz' => 'Маңғыстау',
            'name_ru' => 'Мангистауская область',
        ]);

        DB::table('regions')->insert([
            'id'      => 12,
            'name_kz' => 'Павлодар',
            'name_ru' => 'Павлодарская область',
        ]);

        DB::table('regions')->insert([
            'id'      => 13,
            'name_kz' => 'Солтүстік Қазақстан',
            'name_ru' => 'Северо-Казахстанская область',
        ]);

        DB::table('regions')->insert([
            'id'      => 14,
            'name_kz' => 'Оңтүстік Қазақстан',
            'name_ru' => 'Туркестанская область',
        ]);
    }
}
