<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Puntuacion;
use App\Bombero;
use App\Variables;
class PuntuacionTest extends TestCase
{
    public function testBombero()
    {
        $bombero = factory(Bombero::class)->create();
        $puntuacion = factory(Puntuacion::class)->create(['id_bombero'=>$bombero->id]);
        $bomberoPuntuacion = Puntuacion::find($puntuacion->id)->bombero;
        $this->assertEquals($bomberoPuntuacion->id,$bombero->id);
        $this->assertEquals($bomberoPuntuacion->nro_legajo(),$bombero->nro_legajo());
    }

    public function testPuntacionYear(){
        $variable= factory(Variables::class)->create(['year'=>2018]);
        $variableYear= Variables::getVarByYear('2018');
        $variableDesc= Variables::getVar();
        $this->assertEquals($variable->year,$variableYear->year);
        $this->assertEquals($variable->year,$variableDesc->year);
    }
}
