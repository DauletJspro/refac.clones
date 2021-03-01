<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPacket extends Model
{
    protected $table = 'user_packet';

    public function packet()
    {
        return $this->belongsTo(Packet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
