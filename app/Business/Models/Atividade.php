<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Business\Models\Projeto;

class Atividade extends Model
{
    use HasFactory;

    protected $table = "tb_atividade";

    protected $primaryKey = "atividade_id";

    public $timestamps = false;

    protected $fillable = [
        'projeto_id',
        'atividade_nome',
        'atividade_inicio',
        'atividade_final',
        'atividade_finalizada',
    ];

    public function getProjeto()
    {
        return $this->hasOne('App\Business\Models\Projeto', 'projeto_id', 'projeto_id');
    }

}
