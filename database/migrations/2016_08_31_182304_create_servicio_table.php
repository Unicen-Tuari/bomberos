<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_servicio_id')->unsigned();
            $table->integer('lesionados')->unsigned()->default(0);
            $table->integer('muertos')->unsigned()->default(0);
            $table->integer('quemados')->unsigned()->default(0);
            $table->integer('ilesos')->unsigned()->default(0);
            $table->double('combustible', 10, 4)->default(0);
            $table->integer('otros')->unsigned()->default(0);
            $table->string('direccion', 100);
            $table->text('reconocimiento')->nullable();
            $table->text('descripcion');
            $table->text('disposiciones')->nullable();
            $table->dateTime('hora_alarma');
            $table->dateTime('hora_salida')->nullable();
            $table->dateTime('hora_regreso')->nullable();
            $table->timestamps();
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicio');
    }
}
