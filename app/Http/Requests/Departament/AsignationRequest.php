<?php

namespace App\Http\Requests\Departament;

use Illuminate\Foundation\Http\FormRequest;

class AsignationRequest extends FormRequest
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
            'id' => 'required',
            'acom_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'id.required' => 'Depatamento requerido',
            'acom_id.required' => 'ACOM requerido',
        ];
    }
}