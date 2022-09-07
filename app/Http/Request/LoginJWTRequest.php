<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class LoginJWTRequest extends FormRequest
{

    public function authorize()
    {
        return 'true';
    }

    public function messages()
    {
        return [
            'email.required' => 'Email обязателен к заполнению',
            'password.required' => 'Пароль обязателен к заполнению',
            'password.min' => 'Минимальное количество символов 6',
            'password.max' => 'Максимальное количество символов 50',
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:200',
        ];
    }
}
