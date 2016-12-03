<?php

use Illuminate\Database\Seeder;
use App\TipoAsistencia;

class TipoAsistenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoAsistencia::create(['nombre' => 'Guardia - Comando - Tecnico - Ceremonial - Asistencia programada']);
        TipoAsistencia::create(['nombre' => 'En primera dotacion']);
        TipoAsistencia::create(['nombre' => 'En otra dotacion']);
        TipoAsistencia::create(['nombre' => 'En el cuartel']);
        TipoAsistencia::create(['nombre' => 'En comision']);
        TipoAsistencia::create(['nombre' => 'Licencia']);
        TipoAsistencia::create(['nombre' => 'Enfermo']);
        TipoAsistencia::create(['nombre' => 'Cumpliendo castigo']);
        TipoAsistencia::create(['nombre' => 'Con aviso']);
        TipoAsistencia::create(['nombre' => 'Sin aviso']); 
        //1 a 5 presente
        //6 a 10 ausentes
        //en servicios accidentales los ausentes se deben tachar con una raya
    }
}
