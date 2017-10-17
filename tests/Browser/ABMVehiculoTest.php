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
    private $vehiculo;
    private $usuario;
    private $password;
    private $vehiculoEdit;
    function setUp()
    {
      parent::setUp();
      $this->vehiculo = factory(Vehiculo::class)->make();
      $this->vehiculoEdit = factory(Vehiculo::class)->make();
      $this->usuario = User::find(1)->usuario;
      $this->password = 'nico1234';
    }

    function tearDown()
    {
        $this->vehiculo->delete();
        $this->vehiculoEdit->delete();
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testCreateVehicle()
    {
        $this->browse(function (Browser $browser) {
        $browser->visit('/vehiculo/create')
                ->type('usuario',$this->usuario)
                ->type('password',$this->password)
                ->press('Iniciar')
                ->type('patente',$this->vehiculo->patente)
                ->type('num_movil',$this->vehiculo->num_movil)
                ->select('estado',$this->vehiculo->estado)
                ->type('detalle',$this->vehiculo->detalle)
                ->press('Registrar')
                ->assertSee('Lista de vehiculos');
        });
    }

    public function testModifyVehicle()
    {
      $this->browse(function (browser $browser){
      $browser->visit('/vehiculo/353/edit')
              ->type('patente', $this->vehiculoEdit->patente)
              ->type('num_movil', $this->vehiculoEdit->num_movil)
              ->select('estado',$this->vehiculoEdit->estado)
              ->type('detalle',$this->vehiculoEdit->detalle)
              ->press('Editar')
              ->assertSee('Lista de vehiculos');
      });
    }

  public function testDeleteVehicle()
   {
     $this->browse(function(browser $browser){
     $browser->visit('/vehiculo')
             ->click('.glyphicon-trash')
             ->with('.table', function ($table) {
             $table->assertSee('Lista de vehiculos');
     });
   });
  }
}
