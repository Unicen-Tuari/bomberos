<?php

namespace Tests\Browser;

use Illuminate\Database\Seeder;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Vehiculo;
use App\User;

class ABMVehiculoTest extends DuskTestCase
{
    public function testVehicleCreate()
    {
        $this->browse(function (Browser $browser) {
        $vehicle = factory(Vehiculo::class)->make();
        $browser->loginAs(User::find(1))
                ->visit('/vehiculo/create')
                ->type('patente', $vehicle->patente)
                ->type('num_movil', $vehicle->num_movil)
                ->select('estado', $vehicle->estado)
                ->type('detalle', $vehicle->detalle)
                ->press('Registrar')
                ->assertSee($vehicle->patente())
                ->assertSee($vehicle->num_movil);
        });
    }

    public function testVehicleModify()
    {
      $this->browse(function (browser $browser){
      $vehicle = factory(Vehiculo::class)->create();
      $vehicleEdit = factory(Vehiculo::class)->make();
      $browser->loginAs(User::find(1))
              ->visit('/vehiculo')
              ->click('.glyphicon-edit')
              ->type('patente', $vehicleEdit->patente)
              ->type('num_movil', $vehicleEdit->num_movil)
              ->select('estado',$vehicleEdit->estado)
              ->type('detalle',$vehicleEdit->detalle)
              ->press('Editar')
              ->assertSee($vehicleEdit->patente());
      });
    }

  public function testDeleteVehicle()
   {
     $this->browse(function(browser $browser){
       $vehicle = factory(Vehiculo::class)->create();
       $browser->loginAs(User::find(1))
               ->visit('/vehiculo')
               ->click('.glyphicon-trash')
               ->assertDontSee($vehicle->patente());
    });
  }
}
