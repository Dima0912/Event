<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class FilterEventRequest extends FormRequest
{
    public function rules()
    {
        return [

            'date_start' => 'date',
            'date_end' => 'date',
        ];
    }
}
