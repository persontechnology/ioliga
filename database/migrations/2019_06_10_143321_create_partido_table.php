<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->time('hora');
            $table->enum('tipo',['Proceso','Finalizado','Diferido']);
            $table->unsignedBigInteger('fecha_id');
            $table->foreign('fecha_id')->references('id')->on('fecha');
            $table->unsignedBigInteger('asignacion1_id');
            $table->foreign('asignacion1_id')->references('id')->on('asignacion');
            $table->unsignedBigInteger('asignacion2_id');
            $table->foreign('asignacion2_id')->references('id')->on('asignacion');           
            $table->unsignedBigInteger('estadio_id');
            $table->foreign('estadio_id')->references('id')->on('estadio');
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
        Schema::dropIfExists('partido');
    }
}
