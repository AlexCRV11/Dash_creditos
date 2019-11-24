<?php

namespace App\Http\Requests\Period;

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
            'nombre' => 'required|max:255',
            'año' => 'required|numeric|min:4',
            'slug' => 'unique:periods,slug,'.$this->route('period')->id.'',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Nombre requerido',
            'año.required' => 'Año requerido',
            'slug.unique' => 'Ya existe el periodo',
        ];
    }
}
