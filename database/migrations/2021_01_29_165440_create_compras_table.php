<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->unsignedInteger('periodo_id');
            $table->date('data_compra')->format('d-m-Y')->nullable();
            $table->string('local_compra');
            $table->integer('qtd_parcela');
            $table->integer('n_parcela');
            $table->decimal('valor_parcela', 9,2)->nullable();
            $table->decimal('valor_final', 9,2)->nullable();
            $table->decimal('valor_pago', 9,2)->nullable();
            $table->date('data_pagamento')->format('d-m-Y')->nullable();
            $table->unsignedInteger('cartao_id');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('fatura_id');
            $table->unsignedInteger('conta_id');

            $table->foreign('cartao_id')->references('id')->on('cartaos')->onDelete('cascade');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('fatura_id')->references('id')->on('faturas')->onDelete('cascade');
            $table->foreign('fatura_id')->references('id')->on('faturas')->onDelete('cascade');
            
            $table->foreign('periodo_id')->references('id')->on('movimentacaos')->onDelete('cascade');
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
        Schema::dropIfExists('compras');
    }
}
