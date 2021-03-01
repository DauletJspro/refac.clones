<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOperation extends Model
{
    use SoftDeletes;

    protected $table = 'user_operation';

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }

    public function operationType()
    {
        return $this->belongsTo(OperationType::class);
    }

    // For common record operation
    public static function record($data )
    {
//        $data['created_at'] = now();
//        $data['updated_at'] = now();
//        $operation = UserOperation::create($data);
//
//        if ($operation) {
//            return true;
//        }
//        return false;

    }


}
