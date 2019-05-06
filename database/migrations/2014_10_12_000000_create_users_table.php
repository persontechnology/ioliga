<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            /*extras*/
            $table->string('nombres')->nullable()->comment('nombres de la persona es importante');
            $table->string('apellidos')->nullable();
            $table->string('identificacion')->nullable();
            $table->enum('tipoIdentificacion',['Cédula','RUC de persona natural','RUC de sociedad privada','RUC de sociedad pública','Pasaporte','Consumidor final'])->nullable();
            $table->enum('sexo',['Hombre','Mujer'])->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('detalle')->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('foto')->nullable();
            $table->enum('estadoCivil',['Soltero/a','Casado/a','Divorciado/a','Vuido/a'])->nullable();
            $table->boolean('estado')->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
