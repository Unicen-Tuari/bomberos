<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Bombero;

class SplitNroLegajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // 1: Agregar columnas nuevas cuartel y legajo
        Schema::table('bombero', function(Blueprint $table) {
            $table->string('cuartel', 6)->nullable();
            $table->string('legajo', 6)->nullable();
           // $table->unique(['cuartel', 'legajo']);
        });
        
        // 2: Pasar los datos anteriores a los nuevos campos
        Bombero::all()->each(function ($b){
            $b->cuartel = substr($b->nro_legajo, 0, 3);
            $b->legajo = substr($b->nro_legajo, 3, 3);
            $b->save();
        });
        
        // 3: Borrar columna nro_legajo y quitar nullables
        Schema::table('bombero', function(Blueprint $table) {
            $table->dropColumn('nro_legajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        // 1. Deshacer el borrado de la columna nro_legajo
        Schema::table('bombero', function(Blueprint $table) {
            $table->string('nro_legajo', 100)->nullable()->unique();
        });
        // 2. Juntar los datos
        Bombero::all()->each(function ($b){
            $b->nro_legajo = $b->cuartel . $b->legajo;
            $b->save();
        });
        // 3. Borrar las dos columnas legajo y cuartel
        Schema::table('bombero', function(Blueprint $table) {
            $table->dropColumn(['cuartel','legajo']);
        });
    }
}
