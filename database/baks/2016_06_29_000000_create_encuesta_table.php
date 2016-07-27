<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta');
            $table->timestamp('creado');
            $table->integer('estatus');
        });
        Schema::create('encuesta_opcion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opcion');
            $table->integer('cod_encuesta')->unsigned();

            $table->foreign('cod_encuesta')->references('id')->on('encuesta');
        });
        Schema::create('encuesta_votos', function (Blueprint $table) {
            $table->integer('cod_usuario')->unsigned();
            $table->integer('cod_opcion')->unsigned();
            $table->timestamp('fecha');

            $table->foreign('cod_usuario')->references('id')->on('users');
            $table->foreign('cod_opcion')->references('id')->on('encuesta_opcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('encuesta');
        Schema::drop('encuesta_opcion');
        Schema::drop('encuesta_votos');
    }
}
