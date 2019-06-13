<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->enum('estado',['Ganado','Empate','Perdido']);
            $table->integer('golesFavor')->nullable();
            $table->integer('golesContra')->nullable();
            $table->unsignedBigInteger('tabla_id');
            $table->foreign('tabla_id')->references('id')->on('tabla');
            $table->unsignedBigInteger('partido_id');
            $table->foreign('partido_id')->references('id')->on('partido');
            $table->bigInteger('usuarioCreado')->nullable();
            $table->bigInteger('usuarioActualizado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultado');
    }
}
