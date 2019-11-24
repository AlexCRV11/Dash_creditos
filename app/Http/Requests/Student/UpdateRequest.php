<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'matricula' => 'required|max:9|min:9|unique:students,matricula,'.$this->route('student')->id.'',
            'curp' => 'required|max:18|min:18|unique:students,curp,'.$this->route('student')->id.'',
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->route('student')->id.'',
            'career_id' => 'required',
            'period_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'matricula.required' => 'Matricula requerida',
            'matricula.unique' => 'Matricula ya ha sido registrada',
            'curp.required' => 'CURP requerida',
            'curp.unique' => 'La CURP ya ha sido registrada',
            'nombre.required' => 'Nombre requerido',
            'peterno.required' => 'Apellido peterno requerido',
            'materno.required' => 'Apellido materno requerido',
            'telefono.required' => 'Telefono requerido',
            'email.required' => 'Correo requerido',
            'email.required' => 'Correo ya ha sido registrado',
            'career_id.required' => 'Carrera requerido',
            'period_id.required' => 'Periodo requerido',
        ];
    }
}
