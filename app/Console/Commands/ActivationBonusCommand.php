<?php

namespace App\Console\Commands;

use App\Models\Packet;
use App\Models\Record;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ActivationBonusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activation:bonus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activation bonus every month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $users = User::whereNotIn('user_id', [0, 1])->get();
            foreach ($users as $user) {
                $check_date = date("Y-m-d", strtotime("+1 month", strtotime($user->activated_date))) <= date("Y-m-d");
                if ($check_date && ($user->cash->balance >= 12)) {
                    $user = $this->get_money($user);
                    $this->bonus_for_invitation($user);
                    $this->activation_bonus($user);
                    $user->is_active = true;

                } elseif ($user->cash->balance < 12) {
                    $user->is_active = false;
                }
                $user->activated_date = date('Y-m-d');
                $user->save();
            }
        } catch (\Exception $exception) {
            var_dump($exception->getMessage() . ' / ' . $exception->getFile() . ' / ' . $exception->getLine());
        }

    }

    public function get_money($user)
    {
            $user->cash->balance = $user->cash->balance - 12;
            $user->cash->save();
            $userOperation = new UserOperation();
            $userOperation->operation_id = 2;
            $userOperation->balance = 12;
            $userOperation->author_id = $user->id;
            $userOperation->recipient_id = null;
            $userOperation->created_at = date('Y-m-d H:i:s');
            $userOperation->updated_at = date('Y-m-d H:i:s');
            $userOperation->operation_type_id = 37;
            $userOperation->operation_comment = 'Ежемесячная обязательная активация 12pv (6000 тг)';
            $userOperation->save();
            return $user;

    }

    public function bonus_for_invitation($user)
    {
        $inviter = User::where(['user_id' => $user->inviter_id])->first();
        $inviter->cash->balance = $inviter->cash->balance + 1.8;

        $userOperation = new UserOperation();
        $userOperation->operation_id = 1;
        $userOperation->balance = 1.8;
        $userOperation->author_id = $user->id;
        $userOperation->recipient_id = $inviter->id;
        $userOperation->created_at = date('Y-m-d H:i:s');
        $userOperation->updated_at = date('Y-m-d H:i:s');
        $userOperation->operation_type_id = 36;
        $userOperation->operation_comment = 'Бонус за приглашение';
        $userOperation->save();
    }

    public function activation_bonus($user)
    {
        $parent = User::where(['user_id' => $user->inviter_id])->first();
        $counter = 1;
        while ($parent) {
            if ($this->getAvailableLevel($parent, $counter)) {
                $parent->cash->balance = $parent->cash->balance + 0.6;
                $userOperation = new UserOperation();
                $userOperation->operation_id = 1;
                $userOperation->balance = 0.6;
                $userOperation->author_id = $user->id;
                $userOperation->recipient_id = $parent->id;
                $userOperation->created_at = date('Y-m-d H:i:s');
                $userOperation->updated_at = date('Y-m-d H:i:s');
                $userOperation->operation_type_id = 35;
                $userOperation->operation_comment = 'Активационный бонус, пользователь ' . $counter;
                $userOperation->save();

                $parent->save();
            }
            $parent = User::where(['user_id' => $parent->inviter_id])->first();
            $counter++;
            if ($counter >= 9) {
                break;
            }

        }
    }

    public function getAvailableLevel($parent, $counter = null){
        $parentPacket = UserPacket::where('user_id', '=', $parent->id)->where(['is_active' => true])
            ->whereIn('packet_id', [Packet::CLASSIC, Packet::PREMIUM, Packet::VIP])
            ->get()
            ->pluck('packet_id');
        $parentPacket = $parentPacket->toArray();
        $parentPacket = max($parentPacket);
        $check = false;
        if ($counter <= 4 && $parentPacket >= Packet::CLASSIC){
            $check = true;
        }
        if ($counter >= 5 && $counter <= 6 && $parentPacket >= Packet::PREMIUM){
            $check = true;
        }
        if ($counter >= 7 && $counter <= 8 && $parentPacket == Packet::VIP){
            $check = true;
        }
        return $check;
    }
}
