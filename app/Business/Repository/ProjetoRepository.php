<?php 

namespace App\Business\Repository;

use App\Business\Models\Projeto;

class ProjetoRepository
{

    public function all()
    {
        return Projeto::all();
    }

    public function find($id)
    {
        return Projeto::find($id);
    }
 
    public function create($objModel)
    {
        return $objModel->save();
    }

    public function combo()
    {
        $arrData = [];
        foreach (Projeto::all() as $intkey => $arrValue) {
            $arrData[$arrValue->projeto_id] = $arrValue->projeto_nome;
        }

        return $arrData;
    }

}
