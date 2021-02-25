<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:8',
            'confirm_password' => 'same:password'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Введите новый пароль',
            'password.min' => 'Ваш новый пароль не можеть быть меньше восьми символов',
            'confirm_password.same' => 'Ваши пароли не совпадают',
        ];
    }
}
