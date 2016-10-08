<?php

use Illuminate\Database\Seeder;
use App\TipoServicio;

class TipoServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoServicio::create(['nombre' => 'Incendio']);
        TipoServicio::create(['nombre' => 'Auxilio']);
        TipoServicio::create(['nombre' => 'Especiales']);
        TipoServicio::create(['nombre' => 'Desastre']);
        TipoServicio::create(['nombre' => 'Colaboracion']);
        TipoServicio::create(['nombre' => 'Guardia']);
        TipoServicio::create(['nombre' => 'Comando']);
        TipoServicio::create(['nombre' => 'Tecnico']);
        TipoServicio::create(['nombre' => 'Ceremonial']);
        TipoServicio::create(['nombre' => 'Productos quimicos']);
        TipoServicio::create(['nombre' => 'Forestales']);
    }
}
