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

    public function testBombero()
    {
        $bombero = factory(Bombero::class)->create();
        $reemplazo = factory(Reemplazo::class)->create(['id_bombero'=>$bombero->id]);
        $bomberoReemplazo = Reemplazo::find($reemplazo->id)->bombero;
        $this->assertEquals($bomberoReemplazo->id,$bombero->id);
        $this->assertEquals($bomberoReemplazo->nro_legajo,$bombero->nro_legajo);
    }

    public function testBomberoReemplazo()
    {
      $bombero = factory(Bombero::class)->create();
      $reemplazo = factory(Reemplazo::class)->create(['id_bombero_reemplazo'=>$bombero->id]);
      $bomberoReemplazo = Reemplazo::find($reemplazo->id)->bomberoReemplazo;
      $this->assertEquals($bomberoReemplazo->id,$bombero->id);
      $this->assertEquals($bomberoReemplazo->nro_legajo,$bombero->nro_legajo);
    }
}
