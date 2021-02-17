<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqStatus extends Model
{
    use SoftDeletes;

    public function faqs(){
        return $this->hasMany(Faq::class,'status_id');
    }
}
