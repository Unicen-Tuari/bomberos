<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database;
use App\Bombero;
use App\User;
use App\Reemplazo;

class SubstitutionTest extends DuskTestCase
{
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $bombero = factory(Bombero::class)->create();
            $bomberoReemplazo = factory(Bombero::class)->create();
            $reemplazo = factory(Reemplazo::class)->make();
            list($anio, $mes, $dia) = explode('-', $reemplazo->fecha_inicio);
            $fechaInicio = $dia.$mes.$anio;
            list($anio, $mes, $dia) = explode('-', $reemplazo->fecha_fin);
            $fechaFin = $dia.$mes.$anio;
            $browser->loginAs(User::find(1))
                    ->visit('/reemplazo/create')
                    ->select('id_bombero', $bombero->id)
                    ->select('id_bombero_reemplazo', $bomberoReemplazo->id)
                    ->keys('#fecha_inicio', $fechaInicio)
                    ->keys('#fecha_fin', $fechaFin)
                    ->type('razon', $reemplazo->razon)
                    ->press('Registrar')
                    ->assertSee($bombero->nombre)
                    ->assertSee($bomberoReemplazo->nombre);
        });
    }

    public function testUpdate()
    {
        $this->browse(function (Browser $browser){
            $reemplazo = factory(Reemplazo::class)->create();
            $newBombero = factory(Bombero::class)->create();
            $newBomberoReemplazo = factory(Bombero::class)->create();
            $reemplazoEdit = factory(Reemplazo::class)->make();
            list($year, $month, $day) = explode('-', $reemplazoEdit->fecha_inicio);
            $newFechaInicio = $day. $month.$year;
            list($year, $month, $day) = explode('-', $reemplazoEdit->fecha_fin);
            $newFechaFin = $day. $month.$year;
            $browser->loginAs(User::find(1))
                    ->visit('/reemplazo')
                    ->click('.glyphicon-edit')
                    ->select('id_bombero', $newBombero->id)
                    ->select('id_bombero_reemplazo', $newBomberoReemplazo->id)
                    ->keys('#fecha_inicio', $newFechaInicio)
                    ->keys('#fecha_fin', $newFechaFin)
                    ->type('razon', $reemplazoEdit->razon)
                    ->press('Editar')
                    ->assertSee($newBombero->nombre)
                    ->assertSee($newBomberoReemplazo->nombre);
        });
    }

    public function testDelete()
    {
        $this->browse(function (Browser $browser){
            $bombero = factory(Bombero::class)->create();
            $reemplazo = factory(Reemplazo::class)->create(['id_bombero'=>$bombero->id]);
            $browser->loginAs(User::find(1))
                    ->visit('/reemplazo')
                    ->click('.glyphicon-trash')
                    ->assertDontSee($bombero->nombre);
        });
    }

    public function testTerminados()
    {
      $this->browse(function (Browser $browser){
          $fecha = date('Y-m-d H:i:s');
          $fechaFin = strtotime('-2day' , strtotime($fecha));
          $fechaFin = date('Y-m-d H:i:s' , $fechaFin);
          $bombero = factory(Bombero::class)->create();
          $reemplazoTerminado = factory(Reemplazo::class)->create(['fecha_fin'=>$fechaFin, 'id_bombero'=>$bombero->id]);
          $browser->loginAs(User::find(1))
                  ->visit('/reemplazo')
                  ->assertDontSee($bombero->nombre)
                  ->press('terminados')
                  ->assertSee($bombero->nombre);
      });
    }
}
