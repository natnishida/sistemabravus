<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreepassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freepass', function (Blueprint $table) {
            $table->increments('id_freepass');
            $table->unsignedInteger('id_prospect');
            $table->string('nome_prospect');
            $table->date('data_freepass');
            $table->string('hora_freepass');
            $table->string('nome_modalidade');
            $table->string('anamnese_feita_freepass');
            $table->string('status_freepass');
            $table->text('detalhes_negociacao_freepass');
            $table->string('consultora_cadastro_freepass');
            $table->string('consultora_atualizacao_freepass');
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
        Schema::dropIfExists('freepass');
    }
}
