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

    public static function record(array $data)
    {
        if (!empty($data)) {
            self::create($data);
        }
    }

}
