<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Связи  для статуса клиента
    public function userStatus(){
        return $this->belongsTo(UserStatus::class);
    }

    public function userGapStatus(){
        return $this->belongsTo(UserStatus::class);
    }

   //  Связи для дополнительный таьлицы для партнеров
   public function userSpeakerInfo(){
        return $this->hasMany(UserInfo::class, 'speaker_id');
   }

   public function userDirectoryInfo(){
        return $this->hasMany(UserInfo::class, 'office_director_id');
   }

   //  Связи для операции пользователи
   public function operationsAuthor(){
        return $this->belongsToMany(Operation::class,'user_operation','author_id');
   }

    public function recepientOperation(){
        return $this->belongsToMany(Operation::class,'user_operation','recipient_id');
    }

    //  Связи для операции пользователи с документами

    public function userGroup(){
        return $this->belongsTo(Group::class,'user_groups');
    }

    public function document(){
        return $this->belongsToMany(DocumentType::class,'user_document');
    }

    // Связи

    public function comments(){
        return $this->hasMany(Comment::class,'author_id');
    }

    public function likes(){
        return $this->hasMany(Like::class,'author_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'author_id');
    }

    public function news(){
        return $this->hasOne(News::class,'author_id');
    }

    public function favorites(){
        return $this->hasMany(Favorites::class);
    }

    public function guides(){
        return $this->hasMany(Guide::class);
    }

    public function userConfirmDocument(){
        return $this->belongsTo(UserConfirmDocument::class);
    }


}
