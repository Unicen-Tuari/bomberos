<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnioToVariable extends Migration
{
    public function up()
    {
      Schema::table('variables', function($table) {
        $table->integer('anio')->unique();
    });
    }

    public function down()
    {
      Schema::table('variables', function($table) {
        $table->dropColumn('anio');
    });
  }
}
