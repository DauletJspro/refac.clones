<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    use SoftDeletes;

    protected $table = 'user_status';
    public function userStatus(){
        return $this->hasMany(User::class,'status_id');
    }

    public function userGapStatus(){
        return $this->hasMany(User::class,'gap_status_id');
    }

    public function packet(){
        return $this->hasMany(Packet::class);
    }
}
