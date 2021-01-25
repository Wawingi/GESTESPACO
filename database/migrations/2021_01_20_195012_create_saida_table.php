<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saida', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ordenante');
            $table->string('recebedor');
            $table->string('motorista');
            $table->string('matricula');
            $table->string('viatura');
            $table->string('referencia');
            $table->smallInteger('quantidade');
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
        Schema::dropIfExists('saida');
    }
}
