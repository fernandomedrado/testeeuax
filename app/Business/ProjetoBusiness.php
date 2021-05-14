<?php

namespace App\Business;

use App\Http\Requests\ProjetoFormRequest;
use App\Business\Converters\ProjetoRequestConverter;
use App\Business\Models\Projeto;
use App\Business\Repository\ProjetoRepository;

class ProjetoBusiness
{
    private $convert;
    protected $repository;

    public function __construct(ProjetoRequestConverter $convert, ProjetoRepository $repository)
    {
        $this->convert = $convert;
        $this->repository = $repository;
    }

    public function save(ProjetoFormRequest $objProjetoFormRequest)
    {
        $toModel = $this->convert->toModel($objProjetoFormRequest);
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

}
