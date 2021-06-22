<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisoRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nombre'=>'required|min:3',
            'slug'=>'required|min:3',
            'modulo'=>'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'El nombre es requerido y debe tener un minimo de 3 caracteres.',
            'slug.*'=>'La url amigable es requerida y debe tener un minimo de 3 caracteres.',
            'modulo.*'=>'El modulo  es requerida y debe tener un minimo de 3 caracteres.',
        ];
    }
}
