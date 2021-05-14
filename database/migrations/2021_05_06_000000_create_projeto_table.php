<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_projeto', function (Blueprint $table) {
            $table->integerIncrements('projeto_id')->unique()->nullable();
            $table->string('projeto_nome')->unique()->nullable();
            $table->timestamp('projeto_inicio')->nullable();
            $table->timestamp('projeto_final')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_projeto');
    }    
}
