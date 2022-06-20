<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class PersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'nombres' => ['required'],
            'apellidos' => ['required'],
            'fecha_nacimiento' => ['required'],
             'dui' => ['required'],
            'estado_civil' => ['required'],

        ];
    }
    protected function messages(): array{
        return[
            'nombres.required'=>'El nombre es obligatorio',
            'apellidos.required'=>'Los apellidos son obligatorios',
            'fecha_nacimiento.required'=>'La fecha de nacimiento es obligatoria',
            'dui.required'=>'El dui es obligatorio',
            'estado_civil.required'=>'El estado civil es obligatorio',
        ];
    }
}
