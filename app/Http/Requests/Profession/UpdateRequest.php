<?php

namespace App\Http\Requests\Profession;

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
            'profesion' => 'required|max:255|unique:professions,profesion,'.$this->route('profession')->id.'',
            'abreviatura' => 'required|max:255|unique:professions,abreviatura,'.$this->route('profession')->id.'',
        ];    }

    public function messages(){
        return [
            'profesion.required' => 'Nombre requerido',
            'profesion.unique' => 'El nombre ya ha sido registrado',
            'abreviatura.required' => 'Abreviatura requerida',
            'abreviatura.unique' => 'La abreviatura ya ha sido registrado',
        ];
    }
}
