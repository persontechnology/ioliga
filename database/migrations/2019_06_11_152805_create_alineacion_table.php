<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlineacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alineacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->boolean('estadoEntra')->default(true);
            $table->boolean('estadoSale')->default(false);
            $table->integer('amarillas')->nullable();
            $table->integer('rojas')->nullable();
            $table->integer('goles')->nullable();
            $table->enum('detalle',['Cambio','Inicio']);
            $table->unsignedBigInteger('partido_id');
            $table->foreign('partido_id')->references('id')->on('partido');
            $table->unsignedBigInteger('asignacionNomina_id');
            $table->foreign('asignacionNomina_id')->references('id')->on('asignacionNomina');
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
        Schema::dropIfExists('alineacion');
    }
}
