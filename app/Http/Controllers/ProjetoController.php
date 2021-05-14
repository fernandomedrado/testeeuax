<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Business\Models\Projeto;
use App\Business\ProjetoBusiness;
use App\Http\Requests\ProjetoFormRequest;
use App\Http\Requests\ResponseBody;

class ProjetoController extends Controller
{
    private $projetoBusiness;

    public function __construct(ProjetoBusiness $objProjetoBusiness)
    {
        $this->projetoBusiness = $objProjetoBusiness;
    }

    public function listar()
    {
        $arrFindAll = $this->projetoBusiness->findAll();
        $arrView = [
            'action' => 'Listar',
            'arrFindAll' => $arrFindAll,
        ];
        return view('projeto.listar', $arrView);
    }

    public function form(Request $objRequest)
    {
        if ($objRequest->filled('projeto_id')) {
            $arrFindId = $this->projetoBusiness->findId($objRequest->input('projeto_id'));
            $arrView = [
                'action' => 'Alterar',
                'arrDataPost' => $arrFindId,
            ];
        } else {
            $arrView = [
                'action' => 'Inserir',
                'arrDataPost' => [],
            ];
        }

        return view('projeto.form', $arrView);
    }

    public function atualizar(ProjetoFormRequest $objProjetoFormRequest)
    {
        $arrValidate = $objProjetoFormRequest->validated($objProjetoFormRequest);
        if ($objProjetoFormRequest->filled('projeto_id')) {
            $this->projetoBusiness->update($objProjetoFormRequest);
            $strMensagem = "Registro alterado sucesso.";
        } else {
            $this->projetoBusiness->save($objProjetoFormRequest);
            $strMensagem = "Registro inserido sucesso.";
        }

        $objResponseBody = new ResponseBody();
        $objResponseBody->message = $strMensagem;
        return redirect()->route('/projeto/listar');
    }

}
