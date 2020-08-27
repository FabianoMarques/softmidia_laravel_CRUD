<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // NÃO NECESSITO DE AUTORIZAÇÕES NO MOMENTO
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // EU HAVIA COLOCADO A FOTO COMO REQUERIDA MAS TIREI POIS 
        // POIS ELE PODE NÃO SER POSTADA APROVEITANDO ASSIM A FOTO ATUAL
        // VER EM "UPDATE" de "PacientesController".
        return [
            'nome' => 'required',
            'idade' => 'required|numeric',
            'cpf' => 'required|cpf'
        ];
    }


    // PERSONALIZANDO AS MENSAGENS
    // https://laravel.com/docs/7.x/validation#customizing-the-error-messages
    public function messages()
    {
        return [
            'nome.required' => 'O campo "nome" é obrigatório.',
            'idade.required' => 'A "idade" é obrigatória.',
            'idade.numeric' => 'A "idade" precisa ser um número.',
            'cpf.cpf' => 'CPF inválido.',
            'cpf.required' => 'Digite um CPF válido.'
            

        ];
    }


    
}
