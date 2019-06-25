<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNosotroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nosotro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->text('resena')->nullable();
            $table->string('presidente')->nullable();
            $table->string('vocala')->nullable();
            $table->string('vocalb')->nullable();
            $table->integer('numeroJugadoresNomina')->nullable();
            $table->integer('numeroJugadoresEncuentro')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('istagram')->nullable();
            $table->string('logo')->nullable();
            $table->text('acerca')->nullable();
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nosotro');
    }
}
