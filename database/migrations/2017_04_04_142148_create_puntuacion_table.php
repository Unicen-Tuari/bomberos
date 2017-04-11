<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntuacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('puntuacion', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_bombero');
          $table->integer('ao_cant')->unsigned();
          $table->decimal('ao_punt',5,2)->unsigned();
          $table->decimal('ao_acad',5,2)->unsigned();
          $table->integer('accid_cant')->unsigned();
          $table->decimal('accid_punt',5,2)->unsigned();
          $table->decimal('dedicacion',5,2)->unsigned();
          $table->integer('guar_cant')->unsigned();
          $table->decimal('guar_punt',5,2)->unsigned();
          $table->decimal('especiales',5,2)->unsigned();
          $table->decimal('licencia',5,2)->unsigned();
          $table->decimal('castigo',5,2)->unsigned();
          $table->decimal('total',5,2)->unsigned();
          $table->text('detalle');
          $table->dateTime('fecha');
          $table->rememberToken();
          $table->timestamps();
          $table->unique(['id_bombero', 'fecha']);
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
        Schema::drop('puntuacion');
    }
}
