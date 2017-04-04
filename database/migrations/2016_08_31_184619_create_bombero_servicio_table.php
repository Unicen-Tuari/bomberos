<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBomberoServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bombero_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_id')->unsigned();
            $table->integer('bombero_id')->unsigned();
            $table->integer('tipo_id')->unsigned();
            $table->boolean('a_cargo')->default(0);;
            $table->timestamps();
            $table->unique(['servicio_id', 'bombero_id']);
            $table->foreign('servicio_id')->references('id')->on('servicio')->onDelete('restrict');
            $table->foreign('bombero_id')->references('id')->on('bombero')->onDelete('restrict');
            $table->foreign('tipo_id')->references('id')->on('tipo_asistencia')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bombero_servicio');
    }
}
