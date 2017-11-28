<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReemplazosTable extends Migration
{
    public function up()
    {
        Schema::create('reemplazos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bombero')->unsigned();
            $table->integer('id_bombero_reemplazo')->unsigned();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->text('razon');
            $table->timestamps();
            $table->foreign('id_bombero')->references('id')->on('bombero')->onDelete('restrict');
            $table->foreign('id_bombero_reemplazo')->references('id')->on('bombero')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reemplazos');
    }
}
