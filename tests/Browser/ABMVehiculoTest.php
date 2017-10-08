<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database;
use App\Vehiculo;

class ABMVehiculoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function createVehiculoTest()
    {
      $vehiculo = factory(App\vehiculo::class)->create(['patente' => 'KJD 456', 'num_movil' => '12', 'estado' => '1', 'detalle' => 'autobomba']);
            $this->browse(function (Browser $browser) {
            $browser->visit('/vehiculo/create')
                    ->type('Patente',$vehiculo->patente)
                    ->type('num_movil',$vehiculo->num_movil)
                    ->type('estado',$vehiculo->estado)
                    ->type('detalle',$vehiculo->detalle)
                    ->press('Registrar')
                    ->assertSee('Vehiculo');
        });
    }
}
