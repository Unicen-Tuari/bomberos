<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Puntuacion;
use App\Bombero;

class PuntuacionTest extends TestCase
{
    public function testBombero()
    {
        $bombero = factory(Bombero::class)->create();
        $puntuacion = factory(Puntuacion::class)->create(['id_bombero'=>$bombero->id]);
        $bomberoPuntuacion = Puntuacion::find($puntuacion->id)->bombero;
        $this->assertEquals($bomberoPuntuacion->id,$bombero->id);
        $this->assertEquals($bomberoPuntuacion->nro_legajo,$bombero->nro_legajo);
    }
}
