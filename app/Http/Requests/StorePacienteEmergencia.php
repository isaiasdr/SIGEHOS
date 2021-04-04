<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteEmergencia extends FormRequest
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
            'Tipo_cedula_paciente' => 'required',
            'cedula_paciente' => 'required',
            'numero_hijo' => 'nullable',
            'Apellidos_paciente' => 'nullable',
            'Nombres_paciente' => 'nullable',
            'sexo_paciente' => 'required',
            'edo_civil_paciente' => 'nullable',
            'dia_nacimiento' => 'nullable',
            'mes_nacimiento' => 'nullable',
            'año_nacimiento' => 'nullable',
            'numero_historia' => 'required',
            'fecha_actual' => 'required',
            'nacionalidad_paciente' => 'required',
            'lugar_nacimiento_paciente' => 'nullable',
            'zona_paciente' => 'required',
            'ocupacion_paciente' => 'required',
            'religion_paciente' => 'required',
            'profesion_paciente' => 'required',
            'domicilio_paciente' => 'nullable',
            'trabajo_paciente' => 'nullable',
            'telefono_paciente' => 'nullable',
            'telefono_trabajo_paciente' => 'nullable',
            'acompañante_nombres' => 'nullable',
            'acompañante_apellidos' => 'nullable',
            'acompañante_parentesco_id' => 'nullable',
            'acompañante_cedula' => 'nullable',
            'acompañante_telefono' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'Tipo_cedula_paciente.required' => 'Seleccione el tipo de cedula del paciente',
            'cedula_paciente.required'  => 'Ingrese o mantenga el numero de identificacion del paciente',
            'sexo_paciente.required' => 'Seleccione el sexo del paciente',
            'numero_historia.required' => 'Ingrese el numero de historia del paciente',
            'fecha_actual.required' => 'La fecha actual es obligatoria',
            'nacionalidad_paciente.required' => 'Seleccione la nacionalidad del paciente o "Desconocido"',
            'zona_paciente.required' => 'Ingrese la zona en que vive el paciente o "Desconocido"',
            'ocupacion_paciente.required' => 'Ingrese la ocupacion del paciente o "Desconocido"',
            'religion_paciente.required' => 'Seleccione la religion del paciente o "Desconocido"',
            'profesion_paciente.required' => 'Seleccione la profesion del paciente o "Desconocido"'
        ];
    }
}
