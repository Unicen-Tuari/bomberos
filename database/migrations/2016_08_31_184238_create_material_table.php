<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('material', function (Blueprint $table) {
          $table->increments('id');
          $table->rememberToken();
          $table->string('nombre', 100);
          $table->integer('vehiculo_id')->nullable()->unsigned()->default(null);
          $table->boolean('mantenimiento')->default(0);
          $table->text('detalle')->nullable();
          $table->integer('reparado')->unsigned()->default(0);
          $table->integer('rubro')->unsigned()->default(1);
          $table->timestamps();
          $table->foreign('vehiculo_id')->references('id')->on('vehiculo')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('material');
    }
}
