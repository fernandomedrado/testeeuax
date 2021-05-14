<?php 

namespace App\Business\Repository;

use App\Business\Models\Atividade;

class AtividadeRepository
{

    public function all()
    {
        return Atividade::all();
    }

    public function find($id)
    {
        return Atividade::find($id);
    }
 
    public function create($objModel)
    {
        return $objModel->save();
    }

}
