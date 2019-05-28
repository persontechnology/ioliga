<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominaTable extends Migration
{
     public function up()
    {
        Schema::create('nomina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipo');
            $table->string('lugarProcedencia')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->boolean('estado')->default(false);
            $table->string('detalle')->nullable();
            $table->bigInteger('usuarioCreado')->nullable();
            $table->bigInteger('usuarioActualizado')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nomina');
      
    }
}
