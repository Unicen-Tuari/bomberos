<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('asistencia', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_bombero');
          $table->date('fecha_reunion');
          $table->timestamps();
          $table->foreign('id_bombero')->references('id')->on('bombero')->onDelete('restrict');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asistencia');
    }
}
