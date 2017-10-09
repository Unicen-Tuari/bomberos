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
      $this->vehiculo = Vehiculo::create(['patente' => 'AAA 999','num_movil' => '30','estado'=>'2','detalle'=>'autobomba']);
      $this->vehiculoEdit = Vehiculo::create(['patente' => 'EEE 999','num_movil' => '31','estado'=>'2','detalle'=>'autobomba']);
      //$this->vehiculo = factory(Vehiculo::class)->create(['patente' => 'WR 98 PO','num_movil' => '30','estado'=>'1','detalle'=>'autobomba']);
      //$this->vehiculoEdit = factory(Vehiculo::class)->create(['patente' => 'WRO 988','num_movil' => '27','estado'=>'2','detalle'=>'autobomba']);
      //Vehiculo::create(['patente' => 'WR 989 PO','num_movil' => '11','estado'=>'1','detalle'=>'autobomba']);
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

     /*public function testLoginUser()
     {
       $user = User::find(1);
       $this->browse(function ($browser) use ($user) {
       $browser->loginAs($user)
               ->visit('/vehiculo/create')
               ->assertSee('vehiculo');
     });
   }*/


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
                ->assertSee('Buscar');
        });
    }

    public function testModifyVehicle()
    {
      $this->browse(function (browser $browser){
      $browser->visit('/vehiculo/9/edit')
              ->type('usuario', $this->usuario)
              ->type('password', $this->password)
              ->press('Iniciar')
              ->type('patente', $this->vehiculoEdit->patente)
              ->type('num_movil', $this->vehiculoEdit->num_movil)
              ->select('estado',$this->vehiculoEdit->estado)
              ->type('detalle',$this->vehiculoEdit->detalle)
              ->press('Editar')
              ->assertSee('Buscar');
      });
    }

   /*public function testDeleteVehicle()
   {
     $this->browse(function(browser $browser){
     $browser->visit('/vehiculo/9/delete')
              ->assertSee('Buscar');
     });
   }*/
}
