<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model
{
    use SoftDeletes;



    public function user(){
        return $this->belongsToMany(User::class,'user_operation');
    }
}