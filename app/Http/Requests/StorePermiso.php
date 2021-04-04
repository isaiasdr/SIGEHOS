<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermiso extends FormRequest
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
            'motivo_permiso' => 'required',
            'num_ingreso' => 'required',
            'fecha_permiso' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'motivo_permiso.required' => 'Seleccione el motivo de permiso',
            'num_ingreso.required' => 'Ingrese el numero de ingreso',
            'fecha_permiso.required' => 'Seleccione la fecha del permiso'
        ];
    }
}
