<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsImage extends Model
{
    use SoftDeletes;

    public function news(){
        return $this->belongsTo(News::class);
    }
}
