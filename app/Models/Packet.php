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


    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }
}
