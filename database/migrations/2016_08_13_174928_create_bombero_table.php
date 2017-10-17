<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBomberoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bombero', function (Blueprint $table) {
            $table->increments('id');
            $table->rememberToken();
            $table->boolean('activo');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('nro_legajo', 100)->unique();
            $table->integer('jerarquia')->unsigned();
            $table->string('direccion', 100);
            $table->string('telefono', 100);
            $table->date('fecha_nacimiento');
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
        Schema::drop('bombero');
    }
}
