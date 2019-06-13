<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('bonificacion')->default(0);
            $table->unsignedBigInteger('etapaSerie_id');
            $table->foreign('etapaSerie_id')->references('id')->on('etapaSerie');            
            $table->unsignedBigInteger('asignacion_id');
            $table->foreign('asignacion_id')->references('id')->on('asignacion');
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
        Schema::dropIfExists('tabla');
    }
}
