<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtividadeFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'atividade_id' => [],
            'projeto_id' => ['required', 'integer'],
            'atividade_nome' => ['required', 'string'],
            'atividade_inicio' => ['required', 'string'],
            'atividade_final' => ['required', 'string'],
            'atividade_finalizada' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'projeto_id.required' => 'Projeto obrigatório',
            'atividade_nome_id.required' => 'Nome atividade obrigatório',
            'atividade_inicio.required' => 'Data inicio obrigatório',
            'atividade_final.required' => 'Data final obrigatório',
        ];
    }

}
