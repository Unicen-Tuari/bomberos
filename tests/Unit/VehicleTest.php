<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Vehiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleTest extends TestCase
{
    public function testScopePatente()
    {
      //setUp
       $vehiculo = factory(Vehiculo::class)->create();
       $vehiculo->patente = strtoupper($vehiculo->patente);
      //Modelo a probar
       $vehiculoModel = Vehiculo::patente($vehiculo->patente);
       //Funciona con ::movil pero no con ::patente (trae vacio)
      //Assert
       $this->assertEquals($vehiculoModel->first()->patente, $vehiculo->patente);
       //$this->assertEquals($vehiculoModel->count(),1);
    }

    public function testScopeMovil()
    {
      //setUp
      $vehiculo = factory(Vehiculo::class)->create();
      //Modelo para probar
      $vehiculoModel = Vehiculo::movil($vehiculo->num_movil);
      //Assert
      $this->assertEquals($vehiculoModel->first()->num_movil, $vehiculo->num_movil);
      $this->assertEquals($vehiculoModel->count(),1);
    }

    public function testScopeEstado()
    {
      //setUp
      $vehiculo = factory(Vehiculo::class)->create(['estado' => 2]);
      //Modelo para probar
      $vehiculoModel = Vehiculo::estado($vehiculo->estado);
      //Assert
      $this->assertEquals($vehiculoModel->first()->estado, $vehiculo->estado);
      $this->assertEquals($vehiculoModel->count(),1);
    }
}
