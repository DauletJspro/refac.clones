<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddUserStatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_status')
            ->insert([
                [
                    'id' => 1,
                    'title' => 'Клиент',
                    'sort_num' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'title' => 'Консультант',
                    'sort_num' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'title' => 'Premium Менеджер',
                    'sort_num' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'title' => 'VIP Менеджер',
                    'sort_num' => 4,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 5,
                    'title' => 'Бронзовый Менеджер',
                    'sort_num' => 5,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 6,
                    'title' => 'Серебряный Менеджер',
                    'sort_num' => 6,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 7,
                    'title' => 'Золотой Менеджер',
                    'sort_num' => 7,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 8,
                    'title' => 'Платиновый Менеджер',
                    'sort_num' => 8,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 9,
                    'title' => 'Рубиновый Директор',
                    'sort_num' => 9,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 10,
                    'title' => 'Сапфировый Директор',
                    'sort_num' => 10,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 11,
                    'title' => 'Изумрудный Директор',
                    'sort_num' => 11,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 12,
                    'title' => 'Бриллиантовый Директор',
                    'sort_num' => 12,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 13,
                    'title' => 'Актив 1',
                    'sort_num' => 13,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 14,
                    'title' => 'Актив 2',
                    'sort_num' => 14,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 15,
                    'title' => 'Актив 3',
                    'sort_num' => 15,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 16,
                    'title' => 'Пассив',
                    'sort_num' => 16,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 17,
                    'title' => 'GAP Менеджер 1ур',
                    'sort_num' => 17,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 18,
                    'title' => 'GAP Менеджер 2ур',
                    'sort_num' => 18,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 19,
                    'title' => 'GAP Менеджер 3ур',
                    'sort_num' => 19,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 20,
                    'title' => 'GAP Менеджер 4ур',
                    'sort_num' => 20,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 21,
                    'title' => 'GAP Менеджер 5ур',
                    'sort_num' => 21,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
    }
}
