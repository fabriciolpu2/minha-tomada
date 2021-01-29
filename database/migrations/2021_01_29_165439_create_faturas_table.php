<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('periodo');
            $table->date('data_vencimento')->format('d-m-Y')->nullable();
            $table->decimal('valor_final', 9,2)->nullable();
            $table->boolean('pago')->nullable();
            $table->unsignedInteger('cartao_id');
            $table->foreign('cartao_id')->references('id')->on('cartaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
}
