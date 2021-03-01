<?php


namespace App\Pattern\Bonus;


use App\Models\Operation;
use App\User;
use App\Models\UserOperation;
use App\Models\UserPacket;
use phpDocumentor\Reflection\Types\Boolean;

class RecruitingBonus implements Bonus
{
    public $userPacket;

    function __construct(UserPacket $userPacket)
    {
        $this->userPacket = $userPacket;
    }

    public function run(): Boolean
    {
        $packet = $this->userPacket->packet;
        $user = $this->userPacket->user;

        $inviter = $user->inviter;
        $bonus = $packet->price * (15 / 100);

        $inviter->cash->balance = $inviter->cash->balance + $bonus;
        $inviter->save();

        $data = [
            'operation_id' => Operation::ACCRUAL,
            'author_id' => $user->id,
            'recipient_id' => $inviter->id,
            'operation_type_id' => 1, // recruiting type id
            'balance' => $bonus,
            'deleted_at' => now(),
            'updated_at' => now(),
        ];
        UserOperation::record($data);
    }
}
