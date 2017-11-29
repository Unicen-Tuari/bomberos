<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Reemplazo;
use App\Bombero;

class ReemplazoTest extends TestCase
{
    public function testGetActivos()
    {
        $fecha = date('Y-m-d H:i:s');
        $fechaFin = strtotime('-2day' , strtotime($fecha));
        $fechaFin = date('Y-m-d H:i:s' , $fechaFin);
        $reemplazoActivo = factory(Reemplazo::class)->create();
        $reemplazoActivo2 = factory(Reemplazo::class)->create();
        $reemplazoTerminado = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazosActivos = Reemplazo::getActivos();
        $this->assertEquals($reemplazosActivos->count(),2);
    }

    public function testGetTerminados()
    {
        $fecha = date('Y-m-d H:i:s');
        $fechaFin = strtotime('-2day' , strtotime($fecha));
        $fechaFin = date('Y-m-d H:i:s' , $fechaFin);
        $reemplazoTerminado = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazoTerminado2 = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazoActivo = factory(Reemplazo::class)->create();
        $reemplazosTerminados = Reemplazo::getTerminados();
        $this->assertEquals($reemplazosTerminados->count(),2);
    }
}
