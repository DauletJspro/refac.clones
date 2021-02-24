<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation')
            ->insert([
                [
                    'title' => 'Снятие',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'title' => 'Начисление',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
    }
}
