<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOperation extends Model
{
    use SoftDeletes;

    public function operation(){
        return $this->belongsTo(Operation::class);
    }

    public function operationType(){
        return $this->belongsTo(OperationType::class);
    }

}
