<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $table = 'cities';

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function userInfo(){
        return $this->hasMany(UserInfo::class);
    }

    public function representative(){
        return $this->belongsTo(Representative::class);
    }
}
