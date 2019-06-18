<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fecha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->bigInteger('numero')->nullable();
            $table->unsignedBigInteger('etapaSerie_id');
            $table->foreign('etapaSerie_id')->references('id')->on('etapaSerie');
            $table->boolean('estado')->default(false);
             $table->date('fechaInicio')->nullable();
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
        Schema::dropIfExists('fecha');
    }
}
