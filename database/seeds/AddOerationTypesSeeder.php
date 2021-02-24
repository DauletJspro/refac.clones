<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddOerationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')
            ->insert([
                [
                    'title' => 'Рекрутинговый бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Структурный бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Глобальный бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Активационный бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Лидерский бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Спикерский бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Офисный бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Квалификационный бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Cash Back бонус',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Пополнение фонда компании',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Снятие средств',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Пополнение средств онлайн',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Повышение квалификации',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Групповой обьем (gv)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Персональный обьем (pv)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'title' => 'Отправить деньги на другой аккаунт (от админа)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Перевод деньги с другого аккаунта',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Покупка товара',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Покупка пакета с баланса',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Отправкв запроса на подтверждение пакета',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Онлайн покупка пакета',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Пополнение Global Diamond Found',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Ежемесячная обязательная активация 12pv (6000 тг)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Повышение квалификации GAP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Групповой обьем GAP (sv)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Персональный обьем GAP (sv)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
    }
}
