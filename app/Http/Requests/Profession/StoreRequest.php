<?php

namespace App\Http\Requests\Profession;

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
            'profesion' => 'required|unique:professions|max:255',
            'abreviatura' => 'required|unique:professions|max:255',

        ];
    }

    public function messages(){
        return [
            'profesion.required' => 'Nombre requerido',
            'profesion.unique' => 'El nombre ya ha sido registrado',
            'abreviatura.required' => 'Abreviatura requerida',
            'abreviatura.unique' => 'La abreviatura ya ha sido registrado',
        ];
    }
}
