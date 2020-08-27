<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarRequest extends FormRequest
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
            'cpf' => 'required|cpf'
        ];
    }

    // PERSONALIZANDO AS MENSAGENS
    // https://laravel.com/docs/7.x/validation#customizing-the-error-messages
    public function messages()
    {
        return [
            'cpf.cpf' => 'CPF inválido.',
            'cpf.required' => 'Digite um CPF válido.'
            

        ];
    }

}
