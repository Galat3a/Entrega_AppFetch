<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:alumnos,email',
            'edad' => 'required|integer|min:1|max:120',
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}