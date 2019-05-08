<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre')->unique();
            $table->text('resenaHistorico');
            $table->string('localidad');
            $table->string('telefono');
            $table->string('anioCreacion');
            $table->string('fraseIdentificacion');
            $table->string('color');
            $table->string('color1');
            $table->string('color2');
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(true)->nullable();
            $table->unsignedBigInteger('repre_id');
            $table->foreign('repre_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo');
    }
}