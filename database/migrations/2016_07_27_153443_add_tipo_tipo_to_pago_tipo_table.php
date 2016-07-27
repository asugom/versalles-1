<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoTipoToPagoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pago_tipo', function (Blueprint $table) {
            //
            $table->integer('tipo_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pago_tipo', function (Blueprint $table) {
            //
            $table->dropColumns('tipo_tipo');
        });
    }
}
