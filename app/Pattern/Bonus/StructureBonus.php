<?php


namespace App\Pattern\Bonus;


use App\Models\Operation;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\User;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\True_;

class StructureBonus implements Bonus
{
    public $userPacket;

    public function __construct(UserPacket $userPacket)
    {
        $this->userPacket = $userPacket;
    }

    public function run(): Boolean
    {
        $packet = $this->userPacket->packet;
        $user = $this->userPacket->user;
        $inviter = User::where(['user_id' => $user->inviter_id])->first();

        $bonus = $packet->price * (5 / 100);
        $counter = 1;

        while ($inviter)
        {
        if($this->checkParents($inviter, $counter))
        {
            $inviter = $inviter->cash->balance + $bonus;
            $inviter->save();
            $data = [
                'operation_id' => Operation::ACCRUAL,
                'author_id' => $user->id,
                'recipient_id' => $inviter->id,
                'operation_type_id' => 2,
                'balance' => $bonus,
                'deleted_at' => now(),
                'updated_at' => now(),
            ];
            UserOperation::record($data);
            $inviter = User::where(['user_id' => $inviter->inviter_id])->first();
            $counter++;

        }

        if ($counter >= 9)
        {
            break;
        }
        }
    }

    public static function checkParents($parent, $counter){
        $parentPackets = UserPacket::where('user_id', '=', $parent)->where('is_active', '=', true)
            ->whereIn('packet_id', Packet::STANDARD_PACKETS)
            ->pluck('packet_id')->toArray();
        $parentPacket = max($parentPackets);
        $check = false;
        if ($counter > 1 && $counter <= 4 && $parentPacket >= Packet::CLASSIC){
            $check = True;
        }
        elseif ($counter > 4 && $counter <= 6 && $parentPacket >= Packet::PREMIUM){
            $check = True;
        }

        elseif ($counter > 6 && $counter <= 8 && $parentPacket == Packet::VIP){
            $check = true;
        }

        return $check;
    }
}
