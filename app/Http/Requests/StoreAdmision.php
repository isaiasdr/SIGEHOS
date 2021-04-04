<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmision extends FormRequest
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
            'id_paciente' => 'required',
            'referido' => 'required',
            'servicio_tratante' => 'required',
            'causa_atencion' => 'required',
            'diagnostico_general' => 'nullable',
            'codigo_clasificacion_causa' => 'required',
            'id_diagnosticos_paciente' => 'required',
            'diagnostico_paciente' => 'required',
            'id_cama' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'numero_ingreso.required' => 'El numero de ingreso es obligatorio',
            'id_paciente.required'  => 'El id del paciente es obligatorio',
            'referido.required' => 'El campo referido es obligatorio',
            'servicio_tratante.required' => 'Seleccione el servicio tratante',
            'causa_atencion.required' => 'Seleccione la causa de atencion',
            'codigo_clasificacion_causa.required' => 'Seleccione la clasificacion de la causa de atencion',
            'id_diagnosticos_paciente.required' => 'Añada los diagnisticos del paciente',
            'diagnostico_paciente.required' => 'Añada los diagnisticos del paciente',
            'id_cama.required' => 'Asigne una cama para el usuario'
        ];
    }
}
