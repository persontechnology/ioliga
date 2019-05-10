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
            $table->text('resenaHistorico')->nullable();
            $table->string('localidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('anioCreacion')->nullable();
            $table->string('fraseIdentificacion')->nullable();
            $table->string('color')->nullable();
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(true)->nullable();
            $table->bigInteger('usuarioCreado')->nullable();
            $table->bigInteger('usuarioActualizado')->nullable();
            
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('generoEquipo_id');
            $table->foreign('generoEquipo_id')->references('id')->on('generoEquipo');

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
