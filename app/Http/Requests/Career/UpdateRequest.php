<?php

namespace App\Http\Requests\Career;

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
            'nombre' => 'required|max:255|unique:careers,nombre,'.$this->route('career')->id.'',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Nombre requerido',
            'nombre.unique' => 'El nombre ya ha sido registrado',
        ];
    }
}
