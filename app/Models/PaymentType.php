<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_types';

    const  FROM_BALANCE = 1;
    const REQUEST_TO_ADMIN  = 2;
    const ONLINE_PAYMENT = 3;

}
