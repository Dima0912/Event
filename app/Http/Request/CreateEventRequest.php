<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{

    public function authorize()
    {
        return true;
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

            'title' => 'required|max:50',
            'date_start' => 'required|date',
            'date_end' => 'required|date'
        ];
    }

}
