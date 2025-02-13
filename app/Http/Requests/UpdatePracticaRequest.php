<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePracticaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'alumno_id' => 'required|exists:alumnos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la práctica es obligatorio',
            'descripcion.required' => 'La descripción es obligatoria',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'fecha_fin.required' => 'La fecha de fin es obligatoria',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio',
            'alumno_id.required' => 'Debe seleccionar un alumno',
            'alumno_id.exists' => 'El alumno seleccionado no existe',
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}