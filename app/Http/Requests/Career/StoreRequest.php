<?php

namespace App\Http\Requests\Career;

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
            'nombre' => 'required|unique:Careers|max:255',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Nombre requerido',
            'nombre.unique' => 'El nombre ya ha sido registrado',
        ];
    }
}
