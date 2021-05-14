<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadeTable extends Migration
{
    public function up()
    {
        Schema::create('tb_atividade', function (Blueprint $table) {
            $table->integerIncrements('atividade_id')->unique()->nullable();
            $table->integer('projeto_id')->nullable();
            $table->string('atividade_nome')->unique()->nullable();
            $table->timestamp('atividade_inicio')->nullable();
            $table->timestamp('atividade_final')->nullable();
            $table->boolean('atividade_finalizada')->default('0')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_atividade');
    }    
}
