<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class UserGender extends Model
{
    use Notifiable, SoftDeletes, HasRoles;

    protected $table = 'user_genders';

    public function ismale(){
        return $this->hasMany(UserInfo::class);
    }

}
