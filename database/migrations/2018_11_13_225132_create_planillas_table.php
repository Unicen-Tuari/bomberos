<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jefe_guardia')->unsigned();
            $table->integer('nro_guardia')->unsigned();
            $table->integer('inicio_semana')->unsigned();
            $table->integer('fin_semana')->unsigned();
            $table->string('mes',20);
            $table->integer('year')->unsigned();
            $table->timestamps();
            $table->foreign('jefe_guardia')->references('id')->on('bombero')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planillas');
    }
}
