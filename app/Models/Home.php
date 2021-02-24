<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    public static function getItems()
    {
        $result = cache()->remember('test_count', '1000', function () {
            $usersCount = User::all()->count();
            $userPacket = User::join('user_packet', 'user_packet.user_id', '=', 'users.id');
            $userWithClassicCount = $userPacket
                ->where(['packet_id' => Packet::CLASSIC])
                ->count();
            $userWithPremiumCount = $userPacket
                ->where(['packet_id' => Packet::PREMIUM])
                ->count();
            $userWithVipCount = $userPacket
                ->where(['packet_id' => Packet::VIP])
                ->count();

            $userWithGap = $userPacket
                ->whereIn('packet_id', [Packet::GAP,
                    Packet::GAPHome,
                    Packet::GAPAuto,
                    Packet::GAPTechno
                ])
                ->count();

            $packetCount = Packet::where(['is_active' => true])->count();
            $itemCount = Product::all()->count();
            $packetActivationRequestCount = UserPacket::where(['payment_type_id' => PaymentType::REQUEST_TO_ADMIN])
                ->count();

            $bonusesOperationId = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            $income = UserOperation::whereIn('operation_type_id', $bonusesOperationId);


            $incomeDuringDay = $income
                ->whereDay('created_at', '=', date('d'))
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('balance');

            $lastWeekDate = date('Y-m-d', strtotime("+7 day", strtotime('monday this week')));
            $lastWeekDay = date('d', strtotime($lastWeekDate));


            $today = date('d');
            $incomeLastWeek = $income
                ->whereDay('created_at', '>=', $today)
                ->whereDay('created_at', '<', $lastWeekDay)
                ->whereYear('created_at', '=', date('Y'));

            if ($lastWeekDay < $today) {
                $incomeLastWeek
                    ->whereMonth('created_at', '<', date('m', strtotime($lastWeekDate)))
                    ->whereMonth('created_at', '>=', date('m'));
            } else {
                $incomeLastWeek
                    ->whereMonth('created_at', '=', date('m'));
            }
            $incomeLastWeek = $incomeLastWeek->sum('balance');


            $incomeLastMonth = $income->
            whereMonth('created_at', '=', date('m'))
                ->sum('balance');


            $income = $income->sum('balance');


            $withdrawnAmount = UserOperation::where(['operation_id' => Operation::WITHDRAWAL])
                ->sum('balance');

            $transferAmount = UserOperation::where(['operation_type_id' => 17]) // id of operation type transfer money
            ->sum('balance');


            return [
                'commonIndex' =>
                    [
                        'userCount' => $usersCount,
                        'userWithClassicCount' => $userWithClassicCount,
                        'userWithPremiumCount' => $userWithPremiumCount,
                        'userWithVipCount' => $userWithVipCount,
                        'userWithGap' => $userWithGap,
                        'packetCount' => $packetCount,
                        'itemCount' => $itemCount,
                        'packetActivationRequestCount' => $packetActivationRequestCount,
                    ],
                'income' =>
                    [
                        'duringDay' => $incomeDuringDay,
                        'lastWeek' => $incomeLastWeek,
                        'lastMonth' => $incomeLastMonth,
                        'allTime' => $income
                    ],
                'currentBalance' =>
                    [
                        'withdrawnAmount' => $withdrawnAmount,
                        'transferAmount' => $transferAmount,
                    ],

            ];
        });
        return $result;
    }

    public static function getChartData(int $week_number, string $type)
    {
        $weekDays = [];
        $date_string = sprintf("%s weeks last Monday", $week_number);

        if ($week_number == 0) {
            $date_string = "last monday";
        }

        $last_monday = date('d-m-Y', strtotime($date_string));

        $ts = strtotime($last_monday);
        $year = date('o', $ts);
        $week = date('W', $ts);
        for ($i = 1; $i <= 7; $i++) {
            $week_day = strtotime($year . 'W' . $week . $i);
            $week_day = date("Y-m-d", $week_day);
            $weekDays[] = $week_day;
        }

        if ($type == 'registered_count') {
            $object = new User();
        } elseif ($type == 'bought_packet_count') {
            $object = new UserPacket();
            $object = $object::where(['is_active' => true]);
        }


        $registered_count = $object->whereYear('created_at', '=', date('Y', strtotime($weekDays[0])))
            ->whereMonth('created_at', '=', date('m', strtotime($weekDays[0])))
            ->whereDay('created_at', '>=', date('d', strtotime($weekDays[0])))
            ->whereDay('created_at', '<=', date('d', strtotime($weekDays[6])))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as item_count'))
            ->groupBy('date')
            ->get()
            ->pluck('item_count', 'date')
            ->toArray();


        $registered_count = array_map(function ($item) use ($registered_count) {
            return ($registered_count[$item]) ?? 0;
        }, $weekDays);

        return [
            'weekDays' => $weekDays,
            'registered_count' => $registered_count,
            'week_number' => $week_number,
            'type' => $type,
        ];
    }
}
