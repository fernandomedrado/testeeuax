<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Business\Models\Atividade;

class Projeto extends Model
{
    use HasFactory;

    protected $table = "tb_projeto";

    protected $primaryKey = "projeto_id";

    public $timestamps = false;

    protected $fillable = [
        'projeto_nome',
        'projeto_inicio',
        'projeto_final',
    ];

    public function getAtividade()
    {
        return $this->belongsTo('App\Business\Models\Atividade', 'projeto_id', 'projeto_id');
    }

}
