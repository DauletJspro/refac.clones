<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representative extends Model
{
    use SoftDeletes;

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
