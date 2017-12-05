<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAsistenciaTable extends Migration
{
    public function up()
    {
      Schema::create('tipo_asistencia', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 100);
          $table->timestamps();
      });
    }

    public function down()
    {
        Schema::drop('tipo_asistencia');
    }
}
