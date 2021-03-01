<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model
{
    use SoftDeletes;
   protected $table = 'operation';
    const WITHDRAWAL = 1;
    const ACCRUAL = 2;

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_operation');
    }
}
