<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcoescrmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoescrm', function (Blueprint $table) {
            $table->increments('id_acoes');
            $table->unsignedInteger('id_prospect');
            $table->unsignedInteger('id_freepass')->nullable();
            $table->string('nome_prospect');
            $table->date('data_acao');
            $table->string('nome_acao');
            $table->string('status_acao');
            $table->string('obs_acao')->nullable();
            $table->string('consultora_responsavel_ligacao_futura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acoescrm');
    }
}
