<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoSaidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_saida', function (Blueprint $table) {
            $table->uuid('id_produto');
            $table->uuid('id_saida');
            $table->foreign('id_produto')->references('id')->on('produto')->onDelete('cascade');           
            $table->foreign('id_saida')->references('id')->on('saida')->onDelete('cascade');
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
        Schema::dropIfExists('produto_saida');
    }
}
