<?php

namespace App\Business;

use App\Http\Requests\AtividadeFormRequest;
use App\Business\Converters\AtividadeRequestConverter;
use App\Business\Models\Atividade;
use App\Business\Repository\AtividadeRepository;
use App\Business\Repository\ProjetoRepository;

class AtividadeBusiness
{
    private $convert;
    protected $repository;

    public function __construct(AtividadeRequestConverter $convert, AtividadeRepository $repository)
    {
        $this->convert = $convert;
        $this->repository = $repository;
    }

    public function save(AtividadeFormRequest $objAtividadeFormRequest)
    {
        $toModel = $this->convert->toModel($objAtividadeFormRequest);
        $this->repository->create($toModel);
        return $toModel;
    }

    public function findAll()
    {
        $arrRepository = $this->repository->all();
        return $this->convert->toRequestList($arrRepository);
    }

    public function findId($intId)
    {
        $arrRepository = $this->repository->find($intId);
        return $this->convert->toRequestList($arrRepository);
    }
    
    public function comboProjeto()
    {
        $objProjetoRepository = new ProjetoRepository();
        return $objProjetoRepository->combo();
    }

}
