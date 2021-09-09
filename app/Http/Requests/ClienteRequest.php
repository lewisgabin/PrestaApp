<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'apellidos'=>'required',
            'nacionalidad'=>'required',
            'sexo'=>'required|boolean',
            'whatsapp'=>'required',
        ];
    }

    public function messages(){
        return [
            'nombre.*'=>'El nombre es requerido y debe tener un minimo de 3 caracteres.',
            'apellidos.*'=>'El apellido es requerido.',
            'nacionalidad.*'=>'La nacionalidad es requerida.',
            'sexo.*'=>'El sexo es requerido.',
            'whatsapp.*'=>'El numero de whatsapp es requerido.',
        ];
    }
}
