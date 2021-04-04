<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRegular extends FormRequest
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
            'numero_hijo' => 'required',
            'Apellidos_paciente' => 'required',
            'Nombres_paciente' => 'required',
            'sexo_paciente' => 'required',
            'edo_civil_paciente' => 'required',
            'fecha_nacimiento' => 'required',
            'numero_historia' => 'required',
            'fecha_actual' => 'required',
            'nacionalidad_paciente' => 'required',
            'lugar_nacimiento_paciente' => 'required',
            'zona_paciente' => 'required',
            'ocupacion_paciente' => 'required',
            'religion_paciente' => 'required',
            'profesion_paciente' => 'required',
            'domicilio_paciente' => 'required',
            'trabajo_paciente' => 'nullable',
            'telefono_paciente' => 'required',
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
            'cedula_paciente.required'  => 'Ingrese el numero de cedula del paciente',
            'numero_hijo.required' => 'Ingrese el correlativo de la cedula',
            'Apellidos_paciente.required' => 'Ingrese los apellidos del paciente',
            'Nombres_paciente.required' => 'Ingrese los nombres del paciente',
            'sexo_paciente.required' => 'Seleccione el sexo del paciente',
            'edo_civil_paciente.required' => 'Seleccione el estado civil del paciente',
            'fecha_nacimiento.required' => 'Seleccione la fecha de nacimiento del paciente',
            'numero_historia.required' => 'Ingrese el numero de historia del paciente',
            'fecha_actual.required' => 'La fecha actual es obligatoria',
            'nacionalidad_paciente.required' => 'Seleccione la nacionalidad del paciente',
            'lugar_nacimiento_paciente.required' => 'Ingrese el lugar de nacimiento del paciente',
            'zona_paciente.required' => 'Ingrese la zona en que vive el paciente',
            'ocupacion_paciente.required' => 'Ingrese la ocupacion del paciente',
            'religion_paciente.required' => 'Seleccione la religion del paciente',
            'profesion_paciente.required' => 'Seleccione la profesion del paciente',
            'domicilio_paciente.required' => 'Ingrese el domicilio del paciente',
            'trabajo_paciente.required' => 'Ingrese el sitio de trabajo del paciente',
            'telefono_paciente.required' => 'Ingrese el telefono del paciente',
        ];
    }
}
