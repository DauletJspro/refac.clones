<?php

namespace App;

use App\Models\Comment;
use App\Models\Favorites;
use App\Models\Guide;
use App\Models\Like;
use App\Models\News;
use App\Models\Operation;
use App\Models\Review;
use App\Models\UserInfo;
use App\Models\UserStatus;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var arrays
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'is_active',
        'activated_date',
        'inviter_id',
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
    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }

    public function userGapStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }

    //  Связи для дополнительный таьлицы для партнеров

    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function userSpeakerInfo()
    {
        return $this->hasMany(UserInfo::class, 'speaker_id');
    }

    public function userDirectoryInfo()
    {
        return $this->hasMany(UserInfo::class, 'office_director_id');
    }

    //  Связи для операции пользователи
    public function operationsAuthor()
    {
        return $this->belongsToMany(Operation::class, 'user_operation', 'author_id');
    }

    public function recepientOperation()
    {
        return $this->belongsToMany(Operation::class, 'user_operation', 'recipient_id');
    }

    // Связи

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'author_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'author_id');
    }

    public function news()
    {
        return $this->hasOne(News::class, 'author_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function guides()
    {
        return $this->hasMany(Guide::class);
    }

    public static function getSpeakers()
    {
        return User::join('user_info', 'user_info.user_id', '=', 'users.id')
            ->where(['user_info.is_speaker' => true])
            ->get();
    }

    public static function getOfficeDirectors()
    {
        return User::join('user_info', 'user_info.user_id', '=', 'users.id')
            ->where(['user_info.is_director_office' => true])
            ->get();
    }


}
