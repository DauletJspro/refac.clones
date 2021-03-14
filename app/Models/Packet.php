<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packet extends Model
{
    use SoftDeletes;

    const CLASSIC = 1;
    const PREMIUM = 2;
    const VIP = 3;
    const GAP = 4;
    const GAPTechno = 5;
    const GAPAuto = 6;
    const GAPHome = 7;

    const STANDARD_PACKETS = [self::CLASSIC, self::PREMIUM, self::VIP];
    const GAP_PACKETS = [ self::GAPTechno, self::GAPAuto, self::GAPHome];



    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }

    public function userPacket()
    {
        return $this->hasMany(UserPacket::class);
    }

    public function willBeImplemented($bonus_type)
    {
        var_dump($this->id);
    }

}
