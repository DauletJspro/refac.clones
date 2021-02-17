<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationType extends Model
{
    use SoftDeletes;

    public function userOperation(){
        return $this->hasMany(UserOperation::class);
    }
}
