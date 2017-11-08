<?php

namespace Tests\Browser;

use Illuminate\Database\Seeder;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Vehiculo;
use App\User;

class VehicleTest extends DuskTestCase
{
    private $vehiculo;
    private $usuarioAdmin;
    private $password;
    private $vehiculoEdit;

  public function setUp()
  {
      parent::setUp();
      $this->vehiculo = factory(Vehiculo::class)->make();
      $this->vehiculoEdit = factory(Vehiculo::class)->make();
      $this->usuarioAdmin=factory(User::class)->create(['admin'=> '1', 'password'=> bcrypt('123456')]);
      $this->password = '123456';
  }

    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
          $patente = strtoupper($this->vehiculo->patente);
          $browser->loginAs($this->usuarioAdmin)
                  ->visit('/vehiculo/create')
                  ->type('patente',$this->vehiculo->patente)
                  ->type('num_movil',$this->vehiculo->num_movil)
                  ->select('estado',$this->vehiculo->estado)
                  ->type('detalle',$this->vehiculo->detalle)
                  ->press('Registrar')
                  ->type('patente',$patente)
                  ->press('Buscar')
                  ->assertSee($this->vehiculo->num_movil);
          });
    }

    public function testUpdate()
    {
      $this->browse(function (browser $browser){
        $patente = strtoupper($this->vehiculoEdit->patente);
        $browser->loginAs($this->usuarioAdmin)
                ->visit('/vehiculo')
                ->click('.glyphicon-edit')
                ->type('patente', $this->vehiculoEdit->patente)
                ->type('num_movil', $this->vehiculoEdit->num_movil)
                ->select('estado',$this->vehiculoEdit->estado)
                ->type('detalle',$this->vehiculoEdit->detalle)
                ->press('Editar')
                ->type('patente', $patente)
                ->press('Buscar')
                ->assertSee($this->vehiculoEdit->num_movil);
        });
    }

  public function testDelete()
  {
     $this->browse(function(browser $browser){
       $patente = strtoupper($this->vehiculo->patente);
       $browser->loginAs($this->usuarioAdmin)
               ->visit('/vehiculo')
               ->click('.glyphicon-edit')
               ->type('patente',$this->vehiculo->patente)
               ->press('Editar')
               ->type('patente',$this->vehiculo->patente)
               ->press('Buscar')
               ->click('.glyphicon-trash')
               ->type('patente',$patente)
               ->press('Buscar')
               ->assertDontSee($this->vehiculo->num_movil);
     });
   }

  public function tearDown()
  {
   $this->vehiculoEdit->delete();
   $this->vehiculo->delete();
   $this->usuarioAdmin->delete();
  }
}
