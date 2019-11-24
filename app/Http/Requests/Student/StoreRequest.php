<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'matricula' => 'required|unique:users,name|max:9|min:9',
            'curp' => 'required|unique:students|max:18|min:18',
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:users,email',
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
            'email.unique' => 'Correo ya ha sido registrado',
            'career_id.required' => 'Carrera requerido',
            'period_id.required' => 'Periodo requerido',
        ];
    }
}
