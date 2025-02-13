<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:alumnos,email,' . $this->route('alumno')->id,
            'edad' => 'required|integer|min:18|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del alumno es obligatorio',
            'email.required' => 'El email del alumno es obligatorio',
            'email.email' => 'El email debe ser una dirección válida',
            'email.unique' => 'El email ya está registrado',
            'edad.required' => 'La edad del alumno es obligatoria',
            'edad.min' => 'La edad mínima es 18',
            'edad.max' => 'La edad máxima es 100',
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}