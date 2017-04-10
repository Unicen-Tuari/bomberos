<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vehiculo', function (Blueprint $table) {
          $table->increments('id');
          $table->rememberToken();
          $table->integer('estado')->unsigned()->default(1);
          $table->integer('num_movil')->unsigned()->unique();
          $table->string('patente', 20)->unique()->nullable();
          $table->text('detalle')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculo');
    }
}
