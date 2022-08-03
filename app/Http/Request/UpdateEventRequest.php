<?php

namespace App\Http\Request;

use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return 'false';
    }

    public function messages()
    {
        return [
            'title.required' => 'Заголовок обязателен к заполнению',
            'title.min' => 'Минимальное количество символов 10',
            'title.max' => 'Максимальное количество символов 50',
            'date_start.required' => 'Поле date start обязателен к заполнению',
            'date_end.required' => 'Поле date end обязательно к заполению',
        ];
    }

    public function rules()
    {

        return [
            'title' => 'min:5|max:50',
            'date_start' => 'date',
            'date_end' => 'date',
            'users.*' => 'exists:users,id'
        ];
    }


}
