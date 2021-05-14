<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'projeto_id' => [],
            'projeto_nome' => ['required', 'string'],
            'projeto_inicio' => ['required', 'string'],
//            'projeto_inicio' => ['required', 'date_format:"Y/m/d"'],
            'projeto_final' => ['required', 'string'],
//            'projeto_final' => ['required', 'date_format:"Y/m/d"'],
        ];
    }

    public function messages()
    {
        return [
            'projeto_nome.required' => 'Nome projeto obrigatório',
            'projeto_inicio.required' => 'Data inicio obrigatório',
            'projeto_final.required' => 'Data final obrigatório',
        ];
    }

}
