<?php


namespace App\Pattern\Bonus;


use App\Models\UserPacket;
use phpDocumentor\Reflection\Types\Boolean;

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


    }
}
