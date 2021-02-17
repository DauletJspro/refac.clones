<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    public function newsCategory(){
        return $this->belongsTo(NewsCategory::class);
    }

    public function newsImage(){
        return $this->hasOne(NewsImage::class);
    }

    public function userNews(){
     return $this->belongsTo(User::class);
    }

}
