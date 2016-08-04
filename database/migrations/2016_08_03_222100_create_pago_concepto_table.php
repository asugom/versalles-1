<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoConceptoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_concepto', function (Blueprint $table) {
            $table->increments('id_concepto');
            $table->string('desc_concepto');
            $table->integer('tipo_concepto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pago_concepto');
    }
}
