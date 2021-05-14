<?php

namespace App\Business\Converters;

use App\Http\Requests\AtividadeFormRequest;
use App\Business\Models\Atividade;
use Illuminate\Support\Collection;

class AtividadeRequestConverter
{
    public function toModel(AtividadeFormRequest $objAtividadeFormRequest)
    {
        $objAtividade = new Atividade();
        $objAtividade->atividade_nome = $objAtividadeFormRequest->atividade_nome;
        $objAtividade->atividade_inicio = $objAtividadeFormRequest->atividade_inicio;
        $objAtividade->atividade_final = $objAtividadeFormRequest->atividade_final;
        return $objAtividade;
    }

    public function toRequestList($objRepositoryAtividade)
    {
        $objCollection = new Collection();
        $objAtividadeFormRequest = new AtividadeFormRequest();
        foreach ($objRepositoryAtividade as $rowAtividade) {
            $objAtividadeFormRequest->atividade_id = $rowAtividade->atividade_id;
            $objAtividadeFormRequest->projeto_id = $rowAtividade->projeto_id;
            $objAtividadeFormRequest->atividade_nome = $rowAtividade->nome_projeto;
            $objAtividadeFormRequest->atividade_inicio = $rowAtividade->atividade_inicio;
            $objAtividadeFormRequest->atividade_final = $rowAtividade->atividade_final;
            $objAtividadeFormRequest->atividade_finalizada = $rowAtividade->atividade_finalizada;
            $objCollection->push($objAtividadeFormRequest);
        }

        return $objCollection;
    }

}
