<?php

namespace App\Business\Converters;

use App\Http\Requests\ProjetoFormRequest;
use App\Business\Models\Projeto;
use Illuminate\Support\Collection;

class ProjetoRequestConverter
{
    public function toModel(ProjetoFormRequest $objProjetoFormRequest)
    {
        $objProjeto = new Projeto();
        $objProjeto->projeto_nome = $objProjetoFormRequest->projeto_nome;
        $objProjeto->projeto_inicio = $objProjetoFormRequest->projeto_inicio;
        $objProjeto->projeto_final = $objProjetoFormRequest->projeto_final;
        return $objProjeto;
    }

    public function toRequestList($objRepositoryProjeto)
    {
        $objCollection = new Collection();
        $objProjetoFormRequest = new ProjetoFormRequest();
        foreach ($objRepositoryProjeto as $rowProjeto) {
            $objProjetoFormRequest->projeto_id = $rowProjeto->projeto_id;
            $objProjetoFormRequest->projeto_nome = $rowProjeto->projeto_nome;
            $objProjetoFormRequest->projeto_inicio = $rowProjeto->projeto_inicio;
            $objProjetoFormRequest->projeto_final = $rowProjeto->projeto_final;
            $objCollection->push($objProjetoFormRequest);
        }

        return $objCollection;
    }

}
