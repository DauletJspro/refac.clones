<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')
            ->insert([
                [
                    'id' => 1,
                    'name' => 'from_balance',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'request_to_admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'name' => 'online_payment',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
    }
}
