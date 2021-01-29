<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaRecebersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_recebers', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->boolean('recorrente');
            $table->foreign('periodo_id')->references('id')->on('movimentacaos')->onDelete('cascade');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('categoria_id');
            $table->decimal('valor', 9,2)->nullable();
            $table->decimal('valor_recebido', 9,2)->nullable();
            $table->date('data_recebimento')->format('d-m-Y')->nullable();
            $table->date('data_pagamento')->format('d-m-Y')->nullable();
            $table->unsignedInteger('periodo_id');
            
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('conta_recebers');
    }
}
