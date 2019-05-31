<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionNominaTable extends Migration
{
 
    public function up()
    {
        Schema::create('asignacion_nomina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('nomina_id');
            $table->foreign('nomina_id')->references('id')->on('nomina');
            $table->unsignedBigInteger('asignacion_id');
            $table->foreign('asignacion_id')->references('id')->on('asignacion');
            $table->boolean('estado')->default(false);
            $table->string('detalle')->nullable();
            $table->bigInteger('numero')->nullable();
            $table->bigInteger('usuarioCreado')->nullable();
            $table->bigInteger('usuarioActualizado')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('asignacion_nomina');
    }
}
