<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
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
            'slug'=>'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'El nombre es requerido y debe tener un minimo de 3 caracteres.',
            'slug.*'=>'El slug es requerido y debe tener un minimo de 3 caracteres.',
        ];
    }
}
