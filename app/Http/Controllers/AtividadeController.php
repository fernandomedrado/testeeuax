<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Business\Models\Atividade;
use App\Business\AtividadeBusiness;
use App\Http\Requests\AtividadeFormRequest;
use App\Http\Requests\ResponseBody;
use App\Business\ProjetoBusiness;

class AtividadeController extends Controller
{
    private $atividadeBusiness;

    public function __construct(AtividadeBusiness $objAtividadeBusiness)
    {
        $this->atividadeBusiness = $objAtividadeBusiness;
    }

    public function listar()
    {
        $arrFindAll = $this->atividadeBusiness->findAll();
        $arrView = [
            'action' => 'Listar',
            'arrFindAll' => $arrFindAll,
        ];
        return view('atividade.listar', $arrView);
    }

    public function form(Request $objRequest)
    {
        $arrComboProjeto = $this->atividadeBusiness->comboProjeto();
        if ($objRequest->filled('atividade_id')) {
            $arrFindId = $this->atividadeBusiness->findId($objRequest->input('atividade_id'));
            $arrView = [
                'action' => 'Alterar',
                'arrDataPost' => $arrFindId,
                'arrComboProjeto' => $arrComboProjeto,
            ];
        } else {
            $arrView = [
                'action' => 'Inserir',
                'arrDataPost' => [],
                'arrComboProjeto' => $arrComboProjeto,
            ];
        }

        return view('atividade.form', $arrView);
    }

    public function atualizar(AtividadeFormRequest $objAtividadeFormRequest)
    {
        $arrValidate = $objAtividadeFormRequest->validated($objAtividadeFormRequest);
        if ($objAtividadeFormRequest->filled('atividade_id')) {
            $this->projetoBusiness->update($objAtividadeFormRequest);
            $strMensagem = "Registro alterado sucesso.";
        } else {
            $this->projetoBusiness->save($objAtividadeFormRequest);
            $strMensagem = "Registro inserido sucesso.";
        }
        echo "<pre>";
        var_dump($strMensagem);
        echo "</pre>";
        $objResponseBody = new ResponseBody();
        $objResponseBody->message = $strMensagem;
        return redirect()->route('/atividade/listar');
    }

}
