<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearToVariable extends Migration
{
    public function up()
    {
      Schema::table('variables', function($table) {
        $table->integer('year')->unique();
    });
    }

    public function down()
    {
      Schema::table('variables', function($table) {
        $table->dropColumn('year');
    });
  }
}
