<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlta extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'motivo_alta' => 'required',
            'fecha_alta' => 'required',
            'num_ingreso' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'motivo_alta.required' => 'Seleccione el motivo de la alta',
            'fecha_alta.required' => 'Seleccione la fecha de la alta',
            'num_ingreso.required' => 'Seleccione el numero de ingreso del paciente'
        ];
    }
}
