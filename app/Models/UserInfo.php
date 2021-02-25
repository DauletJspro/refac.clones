<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   UserInfo extends Model
{
    use SoftDeletes;

    protected $table = 'user_info';

    protected $fillable = [
        'user_id',
        'last_name',
        'middle_name',
        'city_id',
        'speaker_id',
        'office_director_id',
        'sponsor_id',
        'is_speaker',
        'is_director_office',
        'office_id',
        'is_document_verified',
        'instagram',
        'wallet_password',
        'card_number',
        'document_number',
        'address',
        'is_male',
        'iban',
        'card_name',
        'social_id'
    ];

    protected $hidden = [
        'wallet_password',
        'card_number',
        'document_number',
        'iban'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function offices()
    {
        return $this->belongsTo(Office::class);
    }

    public function userSpeaker()
    {
        return $this->belongsTo(User::class);
    }

    public function userDirector()
    {
        return $this->belongsTo(User::class);
    }

    public function userGender()
    {
        return $this->belongsTo(UserGender::class, 'is_male');
    }
}
