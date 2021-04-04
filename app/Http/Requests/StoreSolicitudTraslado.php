<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitudTraslado extends FormRequest
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
            'numero_ingreso' => 'required',
            'tipo_traslado' => 'required',
            'tipo_habitacion_solicitado' => 'required',
            'servicio_solicitado' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'numero_ingreso.required' => 'Ingrese el numero de ingreso del paciente',
            'tipo_traslado.required' => 'Seleccione el tipo de traslado',
            'tipo_habitacion_solicitado.required' => 'Seleccione el tipo de habitacion seleccionado',
            'servicio_solicitado.required' => 'Seleccione el servicio solicitado'
        ];
    }
}
