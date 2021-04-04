<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProcesarTraslado extends FormRequest
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
            'id_traslado' => 'required',
            'cama_solic' => 'required',
            'servicio_solic' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_traslado.required' => 'Seleccione una solicitud de traslado pendiente',
            'cama_solic.required' => 'Asigne una nueva cama para el paciente',
            'servicio_solic.required' => 'Ingrese el servicio solicitado'
        ];
    }
}
