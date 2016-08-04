<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->increments('conf_id');
            $table->decimal('conf_monto_mens', 13, 2);
            $table->date('conf_fecha_cobro');
            $table->decimal('conf_monto_mora', 13, 2);
            $table->date('conf_fecha_mora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configuracion');
    }
}
