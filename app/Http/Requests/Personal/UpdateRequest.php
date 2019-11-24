<?php

namespace App\Http\Requests\Personal;

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
            'RFC' => 'required|unique:personals,RFC,'.$this->route('personal')->id.'|max:13|min:13',
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'especialidad' => 'required',
            'profession_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'RFC.required' => 'RFC requerido',
            'RFC.unique' => 'Ya existe el RFC',
            'nombre.required' => 'Nombre requerido',
            'paterno.required' => 'Apellido paterno requerido',
            'materno.required' => 'Apellido materno requerido',
            'telefono.required' => 'Telefono requerido',
            'email.required' => 'Correo requerido',
            'especialidad.required' => 'Especialidad requerida',
            'profession_id.required' => 'Seleccione una profesion',
        ];
    }
}
