<?php


namespace App\Http\Controllers\Admin;


use App\Pattern\Bonus\RecruitingBonus;

class PacketPurchaseController extends BaseController
{
    public function byBalance()
    {

    }

    public function online()
    {

    }

    public function requestToAdmin()
    {

    }

    public function implementBonus($userPacket)
    {
        new RecruitingBonus($userPacket);
    }
}
