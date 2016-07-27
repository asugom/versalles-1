<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deuda', function (Blueprint $table) {
            $table->increments('deuda_id');
            $table->integer('deuda_tipo_id');
            $table->string('deuda_concepto');
            $table->integer('deuda_ref');
            $table->integer('deuda_usuario_id');
            $table->decimal('deuda_monto', 13, 2);
            $table->integer('deuda_usuario_reg');
            $table->timestamps();
            $table->index('deuda_tipo_id');
            $table->index('deuda_usuario_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deuda');
    }
}
