<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packet extends Model
{
    use SoftDeletes;

    public function userStatus(){
        return $this->belongsTo(UserStatus::class);
    }
}