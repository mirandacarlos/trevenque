<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamenRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'curso_id' => 'required',
            'convocatoria' => [
                'required',
                'integer',
                Rule::in([1, 2])
            ],
            'calificacion' => [
                'required',
                'integer',
                'between:0,20'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'curso_id.required' => 'El curso es obligatorio',
            'convocatoria.required' => 'La convocatoria es obligatoria',
            'nacimiento.required' => 'El año es obligatorio',
            'nacimiento.numeric' => 'El año debe ser numérico',
            'calificacion.required' => 'La calificación es obligatoria',
            'calificacion.integer' => 'La calificación debe ser un número',
            'calificacion.between' => 'La calificación debe ser entre 0 y 20'
        ];
    }
}
