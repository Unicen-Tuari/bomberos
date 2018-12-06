<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenglonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renglons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planilla_id')->unsigned();
            $table->string('descripcion_responsabilidad',200);
            $table->integer('responsable')->unsigned();
            $table->integer('ayudante')->unsigned();
            $table->timestamps();
            $table->foreign('responsable')->references('id')->on('bombero')->onDelete('cascade');
            $table->foreign('ayudante')->references('id')->on('bombero')->onDelete('cascade');
            $table->foreign('planilla_id')->references('id')->on('planillas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renglons');
    }
}
