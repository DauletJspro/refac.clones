<?php

namespace App\Rules;

use App\Models\UserPacket;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class higher implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $userPacket = UserPacket::where('user_id', '=', Auth::user()->id)
                ->get()
                ->pluck('packet_id');
        $userPacket = max($userPacket);

        if ($value > $userPacket){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
