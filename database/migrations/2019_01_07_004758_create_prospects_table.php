<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->increments('id_prospect');
            $table->date('data_contato_prospect');
            $table->string('nome_prospect');
            $table->string('meio_contato_prospect');
            $table->string('temperatura_prospect');
            $table->string('genero_prospect');
            $table->string('telefone_prospect',100)->unique();
            $table->string('telefone2_prospect')->nullable();
            $table->string('email_prospect',100)->unique();
            $table->text('descricao_prospect');
            $table->string('consultora_cadastro_prospect');
            $table->string('experimental_prospect');
            $table->string('consultora_atualizacao');
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
        Schema::dropIfExists('prospects');
    }
}
