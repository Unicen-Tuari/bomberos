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
      //Modelo a probar
       $vehiculoModel = Vehiculo::movil($vehiculo->patente)->first();
      //Assert
       $this->assertEquals($vehiculoModel->first()->patente, $vehiculo->patente);
       $this->assertEquals($vehiculoModel->count(),1);
    }

    public function testScopeMovil()
    {
      //setUp
      $vehiculo = factory(Vehiculo::class)->create();
      //Modelo para probar
      $vehiculoModel = Vehiculo::movil($vehiculo->num_movil);
      //Assert
      $this->assertEquals($vehiculo->first()->num_movil, $vehiculoModel->num_movil);
      $this->assertEquals($vehiculo->count(),1);
    }
}
