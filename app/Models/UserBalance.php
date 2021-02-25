<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBalance extends Model
{
    use SoftDeletes;

    protected $table = 'user_balance';

    public function user(){
        return $this->hasOne(User::class);
    }

}
