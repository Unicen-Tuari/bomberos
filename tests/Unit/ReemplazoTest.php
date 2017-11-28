<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Reemplazo;
use App\Bombero;

class ReemplazoTest extends TestCase
{
    public function testReemplazosActivos()
    {
        $fecha = date('Y-m-d H:i:s');
        $fechaFin = strtotime('+2day' , strtotime($fecha));
        $fechaFin = date('Y-m-d H:i:s' , $fechaFin);
        $reemplazo = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazo2 = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazosActivos = Reemplazo::reemplazosActivos();
        $this->assertEquals($reemplazosActivos->count(),2);
    }

    public function testReemplazosTerminados()
    {
        $fecha = date('Y-m-d H:i:s');
        $fechaFin = strtotime('-2day' , strtotime($fecha));
        $fechaFin = date('Y-m-d H:i:s' , $fechaFin);
        $reemplazo = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazo2 = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin]);
        $reemplazosTerminados = Reemplazo::reemplazosTerminados();
        $this->assertEquals($reemplazosTerminados->count(),2);
    }
}
