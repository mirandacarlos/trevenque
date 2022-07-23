<?php

namespace App\Http\Requests;

use App\Models\Asignatura;
use Illuminate\Foundation\Http\FormRequest;

class AsignaturaRequest extends FormRequest
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
            'nombre' => [
                'required',
                function ($attribute, $value, $fail) {
                    $aux = Asignatura::where('nombre', $value)
                        ->where('titulacion_id', $this->titulacion_id)
                        ->first();
                    if (!empty($aux) && $aux->id != $this->id) {
                        return $fail('Ya existe la asignatura para la titulación seleccionada');
                    }
                }
            ],
            'creditos' => 'required|numeric',
            'curso_academico' => [
                'required',
                function ($attribute, $value, $fail) {
                    $parts = explode('-', $value);
                    if (count($parts) != 2) {
                        return $fail('Formato no válido');
                    }
                    if ($parts[1] < $parts[0]) {
                        return $fail('Debe ser hacia el futuro');
                    }
                }
            ],
            'maximo' => 'required|numeric',
            'matricula' => 'required|numeric|digits:8',
            'titulacion_id' => 'required'
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
            'titulacion_id.required' => 'La titulación es obligatoria',
            'nombre.required' => 'El nombre es obligatorio',
            'creditos.required' => 'Los créditos son obligatorios',
            'creditos.numeric' => 'Los créditos deben ser un número',
            'maximo.required' => 'La capacidad es obligatoria',
            'maximo.numeric' => 'La capacidad debe ser un número',
            'matricula.required' =>  'La matrícula es obligatoria',
            'matricula.numeric' => 'La matricula debe ser númerica',
            'matricula.digits' => 'La matrícula debe ser de 8 dígitos',
            'curso_academico.required' => 'El curso académico es obligatorio'
        ];
    }
}
