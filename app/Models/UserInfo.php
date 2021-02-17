<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Model
{
    use SoftDeletes;

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function offices(){
        return $this->belongsTo(Office::class);
    }

    public function userSpeaker(){
        return $this->belongsTo(User::class);
    }
    public function userDirector(){
        return $this->belongsTo(User::class);
    }
}
