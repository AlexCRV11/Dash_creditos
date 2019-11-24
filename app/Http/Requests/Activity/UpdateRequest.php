<?php

namespace App\Http\Requests\Activity;

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
            'nombre' => 'required|max:255|unique:activities,nombre,'.$this->route('activity')->id.'',
            'acom_id' => 'required',
            'creditos' => 'required|max:9|numeric',
            'duracion' => 'required|max:9|numeric',
            'descripcion' => 'required',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Nombre requerido',
            'nombre.unique' => 'El nombre ya ha sido registrado',
            'acom_id.required' => 'ACOM requerido',
            'creditos.required' => 'Número de creditos requerido',
            'duracion.required' => 'Número de períodos requerido',
            'descripcion.required' => 'Descripcion requerida',
        ];
    }
}
