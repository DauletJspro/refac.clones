<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    protected $table = 'user_status';
    use SoftDeletes;

    const CONSULTANT = 2;
    const PREMIUM_MANGER = 3;
    const VIP_MANAGER = 4;
    const ACTIV1 = 13;
    const ACTIV2 = 14;
    const ACTIV3 = 15;
    const PASSIV = 16;


    public function userStatus()
    {
        return $this->hasMany(User::class, 'status_id');
    }

    public function userGapStatus()
    {
        return $this->hasMany(User::class, 'gap_status_id');
    }

    public function packet()
    {
        return $this->hasMany(Packet::class);
    }
}
