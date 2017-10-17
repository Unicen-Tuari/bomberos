<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_id')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->boolean('primero')->default(0);
            $table->timestamps();
            $table->unique(['servicio_id', 'vehiculo_id']);
            $table->foreign('servicio_id')->references('id')->on('servicio')->onDelete('restrict');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculo_servicio');
    }
}
