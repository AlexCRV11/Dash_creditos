<?php

namespace App\Http\Requests\Departament;

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
            'departamento' => 'required|max:255|unique:departaments,departamento,'.$this->route('departament')->id.'',
            'cargo' => 'required',
            'personal_id' => 'unique:departaments,personal_id,'.$this->route('departament')->id.'',
        ];
    }

    public function messages(){
        return [
            'departamento.required' => 'Nombre requerido',
            'departamento.unique' => 'El nombre ya ha sido registrado',
            'cargo.required' => 'Cargo requerido',
            'personal_id.unique' => 'El personal seleccionado ya tiene un departamento a su cargo'
        ];
    }
}
