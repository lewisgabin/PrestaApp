<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'nombre'=>'required|min:3',
            'telefono'=>'required|min:10',
            'rnc'=>'required|min:11',
            'direccion'=>'required',
            
        ];
    }

    public function messages(){
        return [
            'nombre.*'=>'El nombre es requerido y debe tener un minimo de 3 caracteres.',
            'telefono.*'=>'El telefono es requerido y debe tener al menos 10 digitos.',
            'rnc.*'=>'El rnc es requerido y debe tener el formato correcto.',
            'direccion.*'=>'La direccion es requerida.',
        ];
    }
}
