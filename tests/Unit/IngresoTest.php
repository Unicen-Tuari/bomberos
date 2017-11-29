<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Ingreso;
use App\Bombero;

class IngresoTest extends TestCase
{
    public function testBombero()
    {
        $bombero = factory(Bombero::class)->create();
        $ingreso = factory(Ingreso::class)->create(['id_bombero'=>$bombero->id]);
        $bomberoIngreso = Ingreso::find($ingreso->id)->bombero;
        $this->assertEquals($bomberoIngreso->id,$bombero->id);
        $this->assertEquals($bomberoIngreso->nro_legajo,$bombero->nro_legajo);
    }

    public function testGetIngresos()
    {
        $ingreso = factory(Ingreso::class)->create();
        $ingreso2 = factory(Ingreso::class)->create();
        $ingresos = Ingreso::getIngresados();
        $this->assertEquals($ingresos->count(),2);
    }
}
