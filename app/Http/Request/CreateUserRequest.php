<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize()
    {
        return 'true';
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "name" обязательно к заполнению',
            'name.min' => 'Минимальное количество символов 5',
            'name.max' => 'Максимальное количество элементов 20',
            'surname.required' => 'Поле "surname" обязательно к заполнению',
            'surname.min' => 'Минимальное количество элементов 5',
            'surname.max' => 'Максимальное количество элементов 20',
            'phone.required' => 'Поле "phone" обязательное к заполению',
            'phone.max' => 'Максимальное количество элементов 13',
            'email.required' => 'Поле "email обязательно" к заполению',
            'password.required' => 'Поле "password" обязателен к заполнению',
            'password.min' => 'Минимальное количество символов 6',
            'password.max' => 'Максимальное количество символов 50',
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:20'],
            'surname' => ['required', 'string', 'min:5', 'max:20'],
            'phone' => ['required', 'max:13'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:50'],
        ];
    }
}
